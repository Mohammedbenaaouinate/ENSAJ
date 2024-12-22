<?php
//emploi horraire de travail
function list_of_shown_schedule(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM schedule join semester on semester.semester_id=schedule.semester_id join classe on classe.class_id=schedule.classe WHERE prof_id=:id group by schedule.classe");
    $query->bindParam("id",$_SESSION["chef_id"]);
    $query->execute();
    return $query;
}

function view_my_schedule($class_name,$semestre){
    $conn = connect_database();
    $id_semester=select_id_semestre($semestre);
    $id_class=select_id_class($class_name);

    $query=$conn->prepare("SELECT schedule.day,schedule.time,schedule.type,schedule.de,schedule.a,schedule.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule` join professeur on professeur.prof_id=schedule.prof_id join classroom on classroom.classroom_id=schedule.classroom_id WHERE schedule.classe=:ide AND schedule.semester_id=:semes AND schedule.prof_id=:id");
    $query->bindParam("ide",$id_class);
    $query->bindParam("id",$_SESSION["chef_id"]);
    $query->bindParam("semes", $id_semester);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}
function select_name_professor($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM professeur WHERE prof_id=:ide");
    $query->bindParam("ide",$id);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    $name=$query['firstname']." ".$query['lastname'];
    return $name;
}
//emploi ratt
function list_of_shown_schedule_ratt(){

    $conn=connect_database();
    $type="ratt"; 
    $id=$_SESSION["chef_id"];
    $name_professeur=select_name_professor($id);
    $query=$conn->prepare("SELECT * FROM schedule_exam join semester on semester.semester_id=schedule_exam.semester_id join classe on classe.class_id=schedule_exam.classe WHERE schedule_exam.type=:type AND (schedule_exam.prof_id=:id OR schedule_exam.first_prof=:name OR schedule_exam.second_prof=:name) group by schedule_exam.classe");
    $query->bindParam("id",$id);
    $query->bindParam("type",$type);
    $query->bindParam("name",$name_professeur);
    $query->execute();
    return $query;
}


function view_my_schedule_ratt($class_name,$semstre){
    $conn = connect_database();
    $id_semester=select_id_semestre($semstre);
    $id_class=select_id_class($class_name);
    $type="ratt"; 
    $id=$_SESSION["chef_id"];

    $name_professeur=select_name_professor($id);
    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.time,schedule_exam.type,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:class_id AND schedule_exam.type=:type AND schedule_exam.semester_id=:semes AND (schedule_exam.prof_id=:id OR schedule_exam.first_prof=:name OR schedule_exam.second_prof=:name)");
    $query->bindParam("class_id",$id_class);
    $query->bindParam("type",$type);
    $query->bindParam("id",$id);
    $query->bindParam("name",$name_professeur);
    $query->bindParam("semes", $id_semester);

    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function list_of_shown_schedule_normal(){
    $conn=connect_database();

    $type="normal"; 
    $id=$_SESSION["chef_id"];
    $name_professeur=select_name_professor($id);

    $query=$conn->prepare("SELECT * FROM schedule_exam join semester on semester.semester_id=schedule_exam.semester_id join classe on classe.class_id=schedule_exam.classe WHERE schedule_exam.type=:type AND (schedule_exam.prof_id=:id OR schedule_exam.first_prof=:name OR schedule_exam.second_prof=:name) group by schedule_exam.classe");
    $query->bindParam("id",$id);
    $query->bindParam("type",$type);
    $query->bindParam("name",$name_professeur);

    $query->execute();
    return $query;
}


function view_my_schedule_normal($class_name,$semstre){
    $conn = connect_database();
    $id_semester=select_id_semestre($semstre);
    $id_class=select_id_class($class_name);
    $type="normal"; 
    $id=$_SESSION["chef_id"];

    $name_professeur=select_name_professor($id);

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.time,schedule_exam.type,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:class_id AND schedule_exam.type=:type AND schedule_exam.semester_id=:semes AND (schedule_exam.prof_id=:id OR schedule_exam.first_prof=:name OR schedule_exam.second_prof=:name)");
    $query->bindParam("class_id",$id_class);
    $query->bindParam("type",$type);
    $query->bindParam("id",$id);
    $query->bindParam("name",$name_professeur);
    $query->bindParam("semes", $id_semester);

    $query->execute();
    $query=$query->fetchAll();
    return $query;
}


function lists_of_modul_element(){
    $conn = connect_database();
    $id=$_SESSION["chef_id"];

    $query=$conn->prepare("SELECT modul_code,modul_name FROM module WHERE prof_id=:id UNION SELECT element_code as modul_code,element_name as modul_name FROM element WHERE prof_id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    $query=$query->fetchAll();
    return $query;

}

//select semester of the prof
function list_schedule_semestre(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT semester.semester_name,schedule.semester_id FROM schedule join semester on semester.semester_id=schedule.semester_id join classe on classe.class_id=schedule.classe WHERE prof_id=:id group by schedule.semester_id");
    $query->bindParam("id",$_SESSION["chef_id"]);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function list_schedule_class(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT DISTINCT(schedule.classe),class_name FROM schedule join semester on semester.semester_id=schedule.semester_id join classe on classe.class_id=schedule.classe WHERE prof_id=:id group by schedule.semester_id");
    $query->bindParam("id",$_SESSION["chef_id"]);
    $query->execute();
    $query=$query->fetchAll();

    return $query;
}
function add_course($class,$semestre,$name_cour,$module,$status){
    $conn=connect_database();

    
    $image_name=$_FILES["image_cour"]["name"];
    $image_size=$_FILES["image_cour"]["size"];
    $image_path=$_FILES["image_cour"]["tmp_name"];

    $course_name=$_FILES["file_cour"]["name"];
    $course_size=$_FILES["file_cour"]["size"];
    $course_path=$_FILES["file_cour"]["tmp_name"];
    if($image_name==""){
        $new_name_course_image="cour_default.jpg";

    }else{
        if($image_size!=0){
            $new_name_course_image=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
            move_uploaded_file($image_path,"assets/course/images/".$new_name_course_image);
        }else{
            return false;
        }
    }
    $new_name_course=uniqid().time().".".pathinfo($course_name, PATHINFO_EXTENSION);
    move_uploaded_file($course_path,"assets/course/course/".$new_name_course);
    $n=NULL;
    $id_prof=$_SESSION["chef_id"];

    //select module id
    $sql=$conn->prepare("SELECT * FROM module WHERE modul_code=:mod");
    $sql->bindParam("mod",$module);
    $sql->execute();
    $number=$sql->rowCount();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    
   
    $query=$conn->prepare("INSERT INTO course(course_name,date_pub,file_course,file_image,status_cour,id_module,id_element,semestre_id,classe,prof_id) VALUES(:course_name,NOW(),:file_course,:file_image,:status_cour,:id_module,:id_element,:semestre_id,:class,:prof)");
    $query->bindparam("course_name",$name_cour);
    $query->bindparam("file_course",$new_name_course);
    $query->bindparam("file_image",$new_name_course_image);
    $query->bindparam("status_cour",$status);
    $query->bindparam("class",$class);
    $query->bindparam("prof",$id_prof);

    $query->bindparam("semestre_id",$semestre);

    if($number==0){
        $sql_element=$conn->prepare("SELECT * FROM element WHERE element_code=:elem");
        $sql_element->bindParam("elem",$module);
        $sql_element->execute();
        $sql_element=$sql_element->fetch(PDO::FETCH_ASSOC);
        $id_element=$sql_element["element_id"];
        $query->bindparam("id_element",$id_element);
        $query->bindparam("id_module",$n);
    }else{
        $id_modul=$sql["modul_id"];
        $query->bindparam("id_module",$id_modul);
        $query->bindparam("id_element",$n);
    }
    
    $query->execute();
    return $query;
}

function lists_courses(){
    $conn=connect_database();
    $id=$_SESSION["chef_id"];

    $query=$conn->prepare("SELECT course.id_cour,classe.class_name,semester.semester_name,module.modul_name,element.element_name,course.status_cour,course_name,date_pub,file_course,file_image from course join classe on classe.class_id=course.classe join semester on semester.semester_id=course.semestre_id LEFT join element on element.element_id=course.id_element LEFT join module on module.modul_id=course.id_module WHERE course.prof_id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    return $query;
}
function delete_file_image($id){
    $conn=connect_database();
    $sql=$conn->prepare("SELECT * FROM course WHERE id_cour=:id");
    $sql->bindParam("id",$id);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    

    if($sql["file_image"]=="cour_default.jpg"){
        
    }else{
        unlink("assets/course/images/".$sql["file_image"]);
    }
    unlink("assets/course/course/".$sql["file_course"]);
}
function delete_course($id_cour){
    $conn=connect_database();
    delete_file_image($id_cour);
    $query=$conn->prepare("DELETE FROM course WHERE id_cour=:id");
    $query->bindparam("id",$id_cour);
    $query->execute();
    return $query;
}
function lists_single_course($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT course.id_cour,classe.class_name,semester.semester_name,module.modul_name,element.element_name,course.status_cour,course_name,date_pub,file_course,file_image from course join classe on classe.class_id=course.classe join semester on semester.semester_id=course.semestre_id LEFT join element on element.element_id=course.id_element LEFT join module on module.modul_id=course.id_module WHERE course.id_cour=:id");
    $query->bindparam("id",$id);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function edit_course($class,$semestre,$name_cour,$module,$status,$course_id){
    $conn=connect_database();

    $image_name=$_FILES["image_cour"]["name"];
    $image_size=$_FILES["image_cour"]["size"];
    $image_path=$_FILES["image_cour"]["tmp_name"];

    $course_name=$_FILES["file_cour"]["name"];
    $course_size=$_FILES["file_cour"]["size"];
    $course_path=$_FILES["file_cour"]["tmp_name"];
    $id_prof=$_SESSION["chef_id"];
    
    $sql=$conn->prepare("SELECT * FROM course WHERE id_cour=:id");
    $sql->bindParam("id",$course_id);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);

    if($image_name=="" && $course_name==""){
       
        $image_course=$sql["file_image"];
        $course_name=$sql["file_course"];

    }elseif($image_name!="" && $course_name==""){
        $course_name=$sql["file_course"];

        $image_course=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
        move_uploaded_file($image_path,"assets/course/images/".$image_course);
        unlink("assets/course/images/".$sql["file_image"]);

    }elseif($image_name=="" && $course_name!=""){
        $image_course=$sql["file_image"];

        $course_name=uniqid().time().".".pathinfo($course_name, PATHINFO_EXTENSION);
        move_uploaded_file($course_path,"assets/course/course/".$course_name);
        unlink("assets/course/course/".$sql["file_course"]);

    }else{
        $image_course=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
        move_uploaded_file($image_path,"assets/course/images/".$image_course);
        unlink("assets/course/images/".$sql["file_image"]);

        $course_name=uniqid().time().".".pathinfo($course_name, PATHINFO_EXTENSION);
        move_uploaded_file($course_path,"assets/course/course/".$course_name);
        unlink("assets/course/course/".$sql["file_course"]);
    }

    $sql_state=$conn->prepare("SELECT * FROM module WHERE modul_code=:mod");
    $sql_state->bindParam("mod",$module);
    $sql_state->execute();
    $number=$sql_state->rowCount();
    $sql_state=$sql_state->fetch(PDO::FETCH_ASSOC);
    
    
    $n=NULL;

        $query=$conn->prepare("UPDATE course set course_name=:course_name,status_cour=:status_cour,id_module=:id_module,id_element=:id_element,semestre_id=:semestre_id,classe=:class,file_course=:file_course,file_image=:file_image WHERE id_cour=:id_cour AND prof_id=:prof");

    
        $query->bindparam("course_name",$name_cour);
        $query->bindparam("id_cour",$course_id);
        $query->bindparam("semestre_id",$semestre);
        $query->bindparam("file_course",$course_name);
        $query->bindparam("file_image",$image_course);
        $query->bindparam("status_cour",$status);
        $query->bindparam("class",$class);
        $query->bindparam("prof",$id_prof);
        if($number==0){
            $sql_element=$conn->prepare("SELECT * FROM element WHERE element_code=:elem");
            $sql_element->bindParam("elem",$module);
            $sql_element->execute();
            $sql_element=$sql_element->fetch(PDO::FETCH_ASSOC);
            $id_element=$sql_element["element_id"];
            $query->bindparam("id_element",$id_element);
            $query->bindparam("id_module",$n);
        }else{
            $id_modul=$sql_state["modul_id"];
            $query->bindparam("id_module",$id_modul);
            $query->bindparam("id_element",$n);
    
        }
    
    $query->execute();
    return $query;
}

function lists_available_classroom(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM classroom");
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}
function lists_available_classroom_schedule(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM schedule");
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function lists_all_professor(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM professeur join departement on departement.departement_id=professeur.departement_id");
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}