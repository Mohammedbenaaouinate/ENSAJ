<?php 

function view_schedule_student(){
    $conn = connect_database();
    
    $id_class=$_SESSION['student']['class_id'];

    $query=$conn->prepare("SELECT schedule.day,schedule.time,schedule.type,schedule.de,schedule.a,schedule.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule` join professeur on professeur.prof_id=schedule.prof_id join classroom on classroom.classroom_id=schedule.classroom_id WHERE schedule.classe=:ide");
    $query->bindParam("ide",$id_class);
    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

function name_class_student(){
    $conn = connect_database();
    $id_class=$_SESSION['student']['class_id'];
    $query=$conn->prepare("SELECT * FROM classe join specialization on specialization.specialization_id=classe.specialization_id WHERE class_id=:ide");
    $query->bindParam("ide",$id_class);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}
function  select_semester_student(){
    $conn = connect_database();
    $id_class=$_SESSION['student']['class_id'];
    $query=$conn->prepare("SELECT * FROM schedule join semester on semester.semester_id=schedule.semester_id WHERE classe=:ide GROUP BY schedule.semester_id");
    $query->bindParam("ide",$id_class);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function  select_semester_student_normal(){
    $conn = connect_database();
    $id_class=$_SESSION['student']['class_id'];
    $type="normal";
    $query=$conn->prepare("SELECT * FROM schedule_exam join semester on semester.semester_id=schedule_exam.semester_id WHERE classe=:ide AND type=:type GROUP BY schedule_exam.semester_id");
    $query->bindParam("ide",$id_class);
    $query->bindParam("type", $type);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function view_schedule_student_normal(){
    $conn = connect_database();
    //select id of class
    $id_class=$_SESSION['student']['class_id'];
    $type="normal";

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.time,schedule_exam.type,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:ide AND schedule_exam.type=:type");
    $query->bindParam("ide",$id_class);
    $query->bindParam("type", $type);


    $query->execute();
    $query=$query->fetchAll();
    return $query;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function  select_semester_student_ratt(){
    $conn = connect_database();
    $id_class=$_SESSION['student']['class_id'];
    $type="ratt";
    $query=$conn->prepare("SELECT * FROM schedule_exam join semester on semester.semester_id=schedule_exam.semester_id WHERE classe=:ide AND type=:type GROUP BY schedule_exam.semester_id");
    $query->bindParam("ide",$id_class);
    $query->bindParam("type", $type);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function view_schedule_student_ratt(){
    $conn = connect_database();
    //select id of class
    $id_class=$_SESSION['student']['class_id'];
    $type="ratt";

    $query=$conn->prepare("SELECT schedule_exam.day,schedule_exam.prof_id,schedule_exam.first_prof,schedule_exam.second_prof,schedule_exam.time,schedule_exam.type,schedule_exam.modul_code,professeur.firstname,professeur.lastname,classroom.classroom_name FROM `schedule_exam` join professeur on professeur.prof_id=schedule_exam.prof_id join classroom on classroom.classroom_id=schedule_exam.classroom_id WHERE schedule_exam.classe=:ide AND schedule_exam.type=:type");
    $query->bindParam("ide",$id_class);
    $query->bindParam("type", $type);


    $query->execute();
    $query=$query->fetchAll();
    return $query;
}
?>