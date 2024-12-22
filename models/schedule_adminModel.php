<?php

function list_schedule_admin(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `schedule` join classe on classe.class_id=schedule.classe join semester on semester.semester_id=schedule.semester_id GROUP by schedule.classe");
    $query->execute();
    return $query;
}

function view_schedule_admin($id){
    $conn = connect_database();
    $query=$conn->prepare("SELECT schedule.day,schedule.time,professeur.lastname,professeur.firstname,classroom.classroom_name,schedule.modul_code,schedule.type,schedule.de,schedule.a FROM `schedule` join professeur on professeur.prof_id=schedule.prof_id join classroom on classroom.classroom_id=schedule.classroom_id  WHERE schedule.classe=:ide");
    $query->bindParam("ide",$id);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}



function name_class_admin($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT specialization.fullname,classe.class_year FROM `classe` JOIN specialization on classe.specialization_id=specialization.specialization_id WHERE classe.class_id=:ide");
    $query->bindParam("ide",$id);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function list_schedule_admin_normal(){
    $conn=connect_database();
    $type="normal";
    $query=$conn->prepare("SELECT * FROM `schedule_exam` join classe on classe.class_id=schedule_exam.classe join semester on semester.semester_id=schedule_exam.semester_id WHERE schedule_exam.type=:type GROUP by schedule_exam.classe");
    $query->bindParam("type",$type);
    $query->execute();
    return $query;
}

function view_schedule_admin_normal($id){
    $conn = connect_database();
    $type="normal";

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.time,professeur.lastname,professeur.firstname,classroom.classroom_name,schedule_exam.modul_code FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id  WHERE schedule_exam.classe=:ide and type=:type");
    $query->bindParam("ide",$id);
    $query->bindParam("type",$type);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}


function list_schedule_admin_ratt(){
    $conn=connect_database();
    $type="ratt";
    $query=$conn->prepare("SELECT * FROM `schedule_exam` join classe on classe.class_id=schedule_exam.classe join semester on semester.semester_id=schedule_exam.semester_id WHERE schedule_exam.type=:type GROUP by schedule_exam.classe");
    $query->bindParam("type",$type);
    $query->execute();
    return $query;
}

function view_schedule_admin_ratt($id){
    $conn = connect_database();
    $type="ratt";

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.time,professeur.lastname,professeur.firstname,classroom.classroom_name,schedule_exam.modul_code FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id  WHERE schedule_exam.classe=:ide and type=:type");
    $query->bindParam("ide",$id);
    $query->bindParam("type",$type);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}
////////////////////////////////////////////////////////////////////////////////////////////
function list_specializations_for_admin(){

    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM specialization");
    $query->execute();
    return $query;
}

function view_schedule_exam_admin($class_name,$sem){
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

function view_schedule_ratt_admin($class_name,$semstre){
    $conn = connect_database();
    //select id of class
    $sql=$conn->prepare("SELECT * FROM classe WHERE class_name=:classe");
    $sql->bindParam("classe",$class_name);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    $id=$sql["class_id"];
    $type="ratt"; 
    $id_semester=select_id_semestre($semstre);

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.time,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.type,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:ide AND schedule_exam.type=:type AND schedule_exam.semester_id=:semes");
    $query->bindParam("ide",$id);
    $query->bindParam("type",$type);
    $query->bindParam("semes", $id_semester);

    $query->execute();
    $query=$query->fetchAll();
    return $query;
}