<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function select_absent_classes(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM attendance join classe on classe.class_id=attendance.class_id GROUP BY attendance.class_id");
    $query->execute();
    return $query;


}

function select_semester_for_attendance(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM semester");
    $query->execute();
    return $query;
}

// function select_specific_class_for_attendance($class){
//     $conn=connect_database();
//     $query=$conn->prepare("SELECT * FROM classe WHERE class_id=:class");
//     $query->bindParam("class",$class);
//     $query->execute();
//     $query=$query->fetch(PDO::FETCH_ASSOC);
//     $id_class=$query["class_id"];
//     return $id_class;
// }
function select_module_without_element_Attendance($class){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM module WHERE class_id=:class");
    $query->bindParam("class",$class);
    $query->execute();
    return $query;

}

function select_module_with_element_Attendance($class){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM module_with_element WHERE class_id=:class");
    $query->bindParam("class",$class);
    $query->execute();
    return $query;

}


function select_module_with_semester($class,$semester){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM module WHERE class_id=:class and semester_id=:semes");
    $query->bindParam("class",$class);
    $query->bindParam("semes",$semester);
    $query->execute();
    return $query;
}

function select_module_without_element_with_semester($class,$semester){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM module_with_element WHERE class_id=:class and semester_id=:semes");
    $query->bindParam("class",$class);
    $query->bindParam("semes",$semester);
    $query->execute();
    return $query;
}
//filter

function select_statistic_attendance_of_class($class){
    $conn=connect_database();
    $query=$conn->prepare("SELECT student.student_id,student.firstname,student.lastname, student.massar_student, student.email, student.phone_number, COUNT(CASE WHEN attendance.justified = 0 THEN 1 END) AS nombre_heure FROM student JOIN attendance ON student.student_id = attendance.student_id WHERE student.class_id =:class GROUP BY student.student_id having nombre_heure!=0;");
    $query->bindParam("class",$class);
    $query->execute();
    return $query;
}

function select_student_semester_attendance($class,$semester){
    $conn=connect_database();
    $query=$conn->prepare("SELECT student.firstname, student.lastname, student.massar_student, student.email, student.phone_number, COUNT(CASE WHEN attendance.justified = 0 THEN 1 END) AS nombre_heure FROM student JOIN attendance ON student.student_id = attendance.student_id WHERE student.class_id = :class AND attendance.semester_id=:semester GROUP BY student.student_id having nombre_heure!=0;");
    $query->bindParam("class",$class);
    $query->bindParam("semester",$semester);
    $query->execute();
    // $query->fetchAll();
    $query=$query->fetchAll();
    send_Mail_to_student($query);
    return $query;
}

function send_Mail_to_student($query){
    require 'assets/plugins/phpmailer/src/Exception.php';
    require 'assets/plugins/phpmailer/src/PHPMailer.php';
    require 'assets/plugins/phpmailer/src/SMTP.php';

    foreach($query as $result){
        if($result['nombre_heure']==5){
            $mail = new PHPMailer(true);

            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'scolarité@gmail.com';                     //gmail sender
            $mail->Password   = 'password';                          //password sender
            $mail->SMTPSecure = 'ssl';            
            $mail->Port       = 465;              
            
            $mail->setFrom('scolarité@gmail.com'); // gmail sender
            $mail->addAddress($result["email"]); //email destination
            $mail->isHTML(true);   

            $mail->Subject = 'Notification d\'absence';
            $mail->Body    = 'Nous vous informons que vous avez accumulé '.$result['nombre_heure'].' absences non justifiées au cours des dernières séances. Conformément au règlement intérieur de l’établissement, ces absences peuvent entraîner des sanctions, notamment une éventuelle exclusion de l\'examen ou une note de présence impactée.<br><br> Nous vous encourageons à rattraper votre retard et à rester à jour dans vos cours.<br><br>Si vous avez des justificatifs pour ces absences, merci de bien vouloir les fournir dès que possible.<br><br>Cordialement,<br><br>Service Scolarité ENSAJ';
            $mail->send();
        }
    }

}

function select_student_module_attendance($class,$module,$semester){
    $conn=connect_database();
    $query=$conn->prepare("SELECT student.firstname, student.lastname, student.massar_student, student.email, student.phone_number, COUNT(CASE WHEN attendance.justified = 0 THEN 1 END) AS nombre_heure FROM student JOIN attendance ON student.student_id = attendance.student_id WHERE student.class_id = :class AND attendance.modul_id=:module AND attendance.semester_id=:semester GROUP BY student.student_id having nombre_heure!=0;");
    $query->bindParam("class",$class);
    $query->bindParam("module",$module);
    $query->bindParam("semester",$semester);//
    $query->execute();
    return $query;
}

function select_student_module_with_element_attendance($class,$module_element,$semester){
    $conn=connect_database();
    $query=$conn->prepare("SELECT student.firstname, student.lastname, student.massar_student, student.email, student.phone_number, COUNT(CASE WHEN attendance.justified = 0 THEN 1 END) AS nombre_heure FROM student JOIN attendance ON student.student_id = attendance.student_id WHERE student.class_id = :class AND attendance.modul_element_id=:module_element AND attendance.semester_id=:semester GROUP BY student.student_id having nombre_heure!=0;");
    $query->bindParam("class",$class);
    $query->bindParam("module_element",$module_element);
    $query->bindParam("semester",$semester);//
    $query->execute();
    return $query;
}

function select_student_based_on_date_attendance($class,$start_date,$end_date){
    $conn=connect_database();
    $query=$conn->prepare("SELECT student.firstname, student.lastname, student.massar_student, student.email, student.phone_number, COUNT(CASE WHEN attendance.justified = 0 THEN 1 END) AS nombre_heure FROM student JOIN attendance ON student.student_id = attendance.student_id WHERE student.class_id = :class AND (attendance.record_date BETWEEN :start_date AND :end_date) GROUP BY student.student_id having nombre_heure!=0;");
    $query->bindParam("class",$class);
    $query->bindParam("start_date",$start_date);
    $query->bindParam("end_date",$end_date);
    $query->execute();
    return $query;
}

function filter_attendance_statistic_all($class,$semester,$modul_without_element,$modul_with_element,$start_date,$end_date){
    $conn=connect_database();
    if(!empty($semester) && empty($modul_without_element) && empty($modul_with_element) && empty($start_date) && empty($end_date)){
        $result=select_student_semester_attendance($class,$semester);
        // return $result;
        return [
            'tag'=>"filtrage par semestre",
            'query'=>$result,
        ];
    }else if(!empty($semester) && !empty($modul_without_element) && empty($modul_with_element) && empty($start_date) && empty($end_date)){
        $result=select_student_module_attendance($class,$modul_without_element,$semester);
        // return $result;
        return [
            'tag'=>"filtrage par module sans élements",
            'query'=>$result,
        ];
    }else if(!empty($semester) && !empty($modul_with_element) && empty($modul_without_element) && empty($start_date) && empty($end_date) ){
        $result=select_student_module_with_element_attendance($class,$modul_with_element,$semester);
        // return $result;
        return [
            'tag'=>"filtrage par module avec élements",
            'query'=>$result,
        ];
    }else if(!empty($start_date) && !empty($end_date) && empty($semester)){
        $result=select_student_based_on_date_attendance($class,$start_date,$end_date);
        // return $result;
        return [
            'tag'=>"filtrage par date",
            'query'=>$result,
        ];
    }else{
        return 404;
    }

}

function select_infos_of_student($student_id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM student join classe on classe.class_id=student.class_id WHERE student_id=:student");
    $query->bindParam("student",$student_id);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function select_infos_of_student_detail_absence($student_id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT attendance.attendance_id,attendance.seance_time,attendance.record_date,attendance.justified,semester.semester_name,module.modul_name FROM `attendance` join module on attendance.modul_id=module.modul_id join semester on attendance.semester_id=semester.semester_id WHERE attendance.student_id=:student UNION SELECT attendance.attendance_id,attendance.seance_time,attendance.record_date,attendance.justified,semester.semester_name,module_with_element.module_name as modul_name FROM `attendance` join module_with_element on attendance.modul_element_id=module_with_element.module_id join semester on attendance.semester_id=semester.semester_id WHERE attendance.student_id=:student;");
    $query->bindParam("student",$student_id);
    $query->execute();
    return $query;
}