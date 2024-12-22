<?php


// Function To Get All Spécialization 
function obtainallspecialization()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM specialization");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Get All students Information
function getallstudentsinfo()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.student_id,student.firstname,student.lastname,
        student.massar_student,student.student_apoge,student.email,student.phone_number,student.image_path,
        student.cv_path,student.linkedin_path,student.class_id,classe.class_name FROM student
        INNER JOIN classe ON classe.class_id=student.class_id");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Obtain Classes For A Specific Specialization

function obtainclassesforspecificSpecilization($field_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE specialization_id=:specialization_id");
    $stm->bindParam(":specialization_id", $field_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Get All Students For A Specific Classe
function obtainstudentsforspecificClasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE class_id=:class_id");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET the Information for Specific Classe 
function obtainclasseInfo($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE class_id=:class_id LIMIT 1");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
