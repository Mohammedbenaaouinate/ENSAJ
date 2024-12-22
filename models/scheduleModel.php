<?php

function list_specialization(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM specialization WHERE departement_id=:dep");
    $query->bindParam("dep",$_SESSION["department_chef"]);
    $query->execute();
    return $query;
}

function list_rooms($classe){

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
function list_profs(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `professeur` where role_prof=:role");
    $role=1;
    $query->bindParam("role",$role);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function departement_show_name(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `departement` WHERE departement_id=:dep");
    $query->bindParam("dep",$_SESSION["department_chef"]);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}
function list_module_element($id_prof){
    $conn=connect_database();

    $query=$conn->prepare("SELECT module.modul_id,module.modul_name,module.prof_id FROM `module` WHERE module.prof_id=:prof UNION SELECT element.element_id as modul_id,element.element_name as modul_name,element.prof_id from element WHERE element.prof_id=:prof");
    $query->bindParam("prof",$id_prof);
    $query->execute();
    $query=$query->fetchAll(PDO::FETCH_ASSOC);
    return $query;
}

function add_schedule($classe,$semestre) {
    $conn = connect_database();

    $module = $_POST["module"];
    $professeur = $_POST["professeur"];
    $salle = $_POST["salle"];
    $type=$_POST["type"];
    $de=$_POST["de"];
    $a=$_POST["a"];

    $day=$_POST["day"];
    $hour=$_POST["hour"];
    

    //select id of class
    $query=$conn->prepare("SELECT * FROM classe WHERE class_name=:classe");
    $query->bindParam("classe", $classe);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    $id_class=$query["class_id"];
    //select id of semester
    $query_semestre=$conn->prepare("SELECT * FROM semester WHERE semester_name=:semester");
    $query_semestre->bindParam("semester", $semestre);
    $query_semestre->execute();
    $query_semestre=$query_semestre->fetch(PDO::FETCH_ASSOC);
    $id_semester=$query_semestre["semester_id"];

    $length = count($professeur);

        for ($i = 0; $i < $length; $i++) {
            if($classe!="" && $semestre!="" && $module[$i]!="Sélectionner le Module/élement" && $professeur[$i]!="Sélectionner le professeur" && $salle[$i]!="Sélectionner une salle"){
                $sql = $conn->prepare("INSERT INTO schedule (semester_id, prof_id, modul_code, classroom_id, classe, day, time,date,type,de,a) VALUES (:sem, :pr, :mod, :room, :cla, :d, :t,NOW(),:type,:de,:a)");
                $sql->bindParam("sem", $id_semester);
                $sql->bindParam("pr",$professeur[$i]);
                $sql->bindParam("mod", $module[$i]);
                $sql->bindParam("room",$salle[$i]);
                $sql->bindParam("cla", $id_class);
                $sql->bindParam("d", $day);
                $sql->bindParam("t",$hour);
                $sql->bindParam("type", $type[$i]);
                $sql->bindParam("de",$de[$i]);
                $sql->bindParam("a",$a[$i]);
                $sql->execute();
            }else{
                break;
            }
    }
        if($sql){
            return true;
        }else{
            return false;
        }
        
}
function view_schedule($class_name,$semestre){
    $conn = connect_database();
    //select id of class
    $sql=$conn->prepare("SELECT * FROM classe WHERE class_name=:classe");
    $sql->bindParam("classe",$class_name);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    $id=$sql["class_id"];
    $id_semester=select_id_semestre($semestre);

    $query=$conn->prepare("SELECT schedule.day,schedule.time,schedule.type,schedule.de,schedule.a,schedule.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule` join professeur on professeur.prof_id=schedule.prof_id join classroom on classroom.classroom_id=schedule.classroom_id WHERE schedule.classe=:ide AND schedule.semester_id=:semes");
    $query->bindParam("ide",$id);
    $query->bindParam("semes", $id_semester);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function verify_desponibility($semestre,$classe){
    
    $conn = connect_database();
    

    $query=$conn->prepare("SELECT schedule.day,schedule.classe,schedule.semester_id,schedule.time,professeur.lastname,professeur.firstname,classroom.classroom_name FROM `schedule` join professeur on professeur.prof_id=schedule.prof_id join classroom on classroom.classroom_id=schedule.classroom_id");
    // $query->bindParam("id_classe",$id_class);
    $query->execute();
    $query=$query->fetchAll();
    return $query;

}



function name_class($name){
    $conn=connect_database();
    $query=$conn->prepare("SELECT specialization.fullname,classe.class_year,classe.class_name FROM `classe` JOIN specialization on classe.specialization_id=specialization.specialization_id WHERE classe.class_name=:cl_name");
    $query->bindParam("cl_name",$name);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function delete_schedule($classe,$semestre){
    $conn=connect_database();
    $id_class=select_id_class($classe);
    $id_semester=select_id_semestre($semestre);

    $query=$conn->prepare("DELETE FROM `schedule` WHERE classe=:ide AND semester_id=:semes");
    $query->bindParam("ide",$id_class);
    $query->bindParam("semes", $id_semester);
    $query->execute();
    return $query;

}