<?php

function list_specialization_exam(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM specialization WHERE departement_id=:dep");
    $query->bindParam("dep",$_SESSION["department_chef"]);
    $query->execute();
    return $query;
}

function list_rooms_exam($classe){

    $conn=connect_database();
    $sql=$conn->prepare("SELECT classe.class_id,classe.class_name,classe.class_year,COUNT(student.student_id) as number_student FROM `classe` LEFT JOIN `student` on classe.class_id=student.class_id GROUP BY classe.class_id HAVING class_name=:classe");
    $sql->bindParam("classe",$classe);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    $number=$sql["number_student"];

    ///
    $query=$conn->prepare("SELECT * FROM `classroom` WHERE classroom_capacity>=:capacity");
    $query->bindParam("capacity",$number);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}
function list_profs_exam(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `professeur` where role_prof=:role");
    $role=1;
    $query->bindParam("role",$role);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function departement_show_name_exam(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `departement` WHERE departement_id=:dep");
    $query->bindParam("dep",$_SESSION["department_chef"]);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}


//select id of class
function select_id_class($class){
    $conn = connect_database();
    $query=$conn->prepare("SELECT * FROM classe WHERE class_name=:classe");
    $query->bindParam("classe", $class);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    $id_class=$query["class_id"];
    return $id_class;
}
//select id of semester
function select_id_semestre($semestre){
    $conn = connect_database();
    $query_semestre=$conn->prepare("SELECT * FROM semester WHERE semester_name=:semester");
    $query_semestre->bindParam("semester", $semestre);
    $query_semestre->execute();
    $query_semestre=$query_semestre->fetch(PDO::FETCH_ASSOC);
    $id_semester=$query_semestre["semester_id"];
    return $id_semester;
}

function list_module_element_for_class($classe){
    $conn=connect_database();
    $id_class=select_id_class($classe);
    $query=$conn->prepare("SELECT modul_name FROM module WHERE class_id=:class UNION SELECT element.element_name as modul_name FROM module_with_element join element on module_with_element.module_id=element.module_id WHERE module_with_element.class_id=:class;");
    $query->bindParam("class",$id_class);
    $query->execute();
    return $query;
}
function add_schedule_exam($classe,$semestre) {
    $conn = connect_database();

    $module = $_POST["module"];
    $professeur = $_POST["professeur"];
    $professeur2 = $_POST["professeur2"];
    $professeur3 = $_POST["professeur3"];

    $salle = $_POST["salle"];
    $type="normal";
 
    $day=$_POST["day"];
    $hour=$_POST["hour"];
    
    //select id of class
    $id_class=select_id_class($classe);
    //select id of semester
    $id_semester=select_id_semestre($semestre);

    // $length = count($professeur);
    $n=NULL;
        // for ($i = 0; $i < $length; $i++) {
            if($classe!="" && $semestre!="" && $module!="Sélectionner le module/élement" && $professeur!="Sélectionner le premier professeur" && $salle!="Sélectionner une salle"){
                $sql = $conn->prepare("INSERT INTO schedule_exam (semester_id, prof_id, modul_code, classroom_id, classe, day, time,date,type,first_prof,second_prof) VALUES (:sem, :pr, :mod, :room, :cla, :d, :t,NOW(),:type,:pr2,:pr3)");
                $sql->bindParam("sem", $id_semester);
                $sql->bindParam("pr",$professeur);
                // $sql->bindParam("pr2",$professeur2);
                // $sql->bindParam("pr3",$professeur3);

                if($professeur2 !="Sélectionner le deuxieme professeur" && $professeur3 !="Sélectionner le troixieme professeur"){
                    $sql->bindParam("pr2",$professeur2);
                    $sql->bindParam("pr3",$professeur3);
                }elseif($professeur3 !="Sélectionner le troixieme professeur" && $professeur2 =="Sélectionner le deuxieme professeur"){
                    $sql->bindParam("pr2",$n);
                    $sql->bindParam("pr3",$professeur3);
                }elseif($professeur3 =="Sélectionner le troixieme professeur" && $professeur2 !="Sélectionner le deuxieme professeur"){
                    $sql->bindParam("pr2",$professeur2);
                    $sql->bindParam("pr3",$n);
                }else{
                    $sql->bindParam("pr2",$n);
                    $sql->bindParam("pr3",$n);
                }

                $sql->bindParam("mod", $module);
                $sql->bindParam("room",$salle);
                $sql->bindParam("cla", $id_class);
                $sql->bindParam("d", $day);
                $sql->bindParam("t",$hour);
                $sql->bindParam("type", $type);

                $sql->execute();
            }
            // }else{
            //     break;
            // }
        //  }
         if($sql){
            return true;
        }else{
            return false;
        }
}

function edit_schedule_exam($classe,$semestre,$day,$hour,$prof,$module,$room) {
    $conn = connect_database();

    $type="normal";
 
    //select id of class
    $id_class=select_id_class($classe);
    //select id of semester
    $id_semester=select_id_semestre($semestre);


        $sql = $conn->prepare("UPDATE schedule_exam set semester_id=:sem, prof_id=:pr, modul_code=:mod, classroom_id=:room WHERE classe=:cla AND day=:d AND time=:t AND type=:type");
        $sql->bindParam("sem", $id_semester);
        $sql->bindParam("pr",$prof);
        $sql->bindParam("mod", $module);
        $sql->bindParam("room",$room);
        $sql->bindParam("cla", $id_class);
        $sql->bindParam("d", $day);
        $sql->bindParam("t",$hour);
        $sql->bindParam("type", $type);
        $sql->execute();
        return $sql;
            
        
}
function view_schedule_exam($class_name,$sem){
    $conn = connect_database();
    //select id of class
    $sql=$conn->prepare("SELECT * FROM classe WHERE class_name=:classe");
    $sql->bindParam("classe",$class_name);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    $id=$sql["class_id"];
    $type="normal";
    $id_semester=select_id_semestre($sem);

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.time,schedule_exam.type,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:ide AND schedule_exam.type=:type AND schedule_exam.semester_id=:semes");
    $query->bindParam("ide",$id);
    $query->bindParam("type", $type);
    $query->bindParam("semes", $id_semester);


    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function verify_desponibility_exam($semstre){
    $type="normal";
    $conn = connect_database();

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.time,schedule_exam.modul_code,schedule_exam.first_prof,schedule_exam.second_prof,professeur.lastname,professeur.firstname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.type=:type ");
    $query->bindParam("type",$type);
    $query->execute();
    $query=$query->fetchAll();
    return $query;

}
function name_class_exam($name){
    $conn=connect_database();
    $query=$conn->prepare("SELECT specialization.fullname,classe.class_year,classe.class_name FROM `classe` JOIN specialization on classe.specialization_id=specialization.specialization_id WHERE classe.class_name=:cl_name");
    $query->bindParam("cl_name",$name);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function delete_schedule_normal($name,$semestre){
    $conn=connect_database();
    $id_class=select_id_class($name);
    $id_semester=select_id_semestre($semestre);

    $type="normal";

    $query=$conn->prepare("DELETE FROM `schedule_exam` WHERE classe=:ide AND type=:type AND semester_id=:semes ");
    $query->bindParam("ide",$id_class);
    $query->bindParam("semes", $id_semester);
    $query->bindParam("type",$type);
    $query->execute();
    return $query;
}