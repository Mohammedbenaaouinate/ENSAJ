<?php

// Function To Get Information About Departement

use FTP\Connection;
use LDAP\Result;

function getdepartement($leader_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM departement WHERE `departement_leader`=:leader_id LIMIT 1");
    $stm->bindParam(":leader_id", $leader_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function to GET ALL Specializations for A Specific Département
function getallspecializationsforspecificDepartement($departement_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT specialization.specialization_id,specialization.departement_id,specialization.short_name,
    specialization.fullname,professeur.firstname,professeur.lastname
    FROM specialization 
    INNER JOIN professeur ON professeur.prof_id=specialization.coordonnateur_id 
    WHERE specialization.departement_id=:departement_id");
    $stm->bindParam(":departement_id", $departement_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET All Classes For Specific departement

function getallclassesforspecificdepartement($departement_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT classe.class_id,classe.class_name,
                    classe.class_year,classe.specialization_id FROM classe
                    INNER JOIN specialization ON specialization.specialization_id=classe.specialization_id
                    INNER JOIN departement ON departement.departement_id=specialization.departement_id
                    WHERE departement.departement_id=:departement_id
            ");
    $stm->bindParam(":departement_id", $departement_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Get All Students 
function listallstudents($departement_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.student_id,student.firstname,
    student.lastname,student.massar_student,student.student_apoge,
    student.email,student.class_id,student.phone_number,student.image_path,
    student.cv_path,classe.class_name,classe.responsable_id 
    FROM student
    INNER JOIN classe ON classe.class_id=student.class_id
    INNER JOIN specialization ON specialization.specialization_id=classe.specialization_id
    INNER JOIN  departement ON specialization.departement_id=departement.departement_id
    WHERE departement.departement_id=:departement_id");
    $stm->bindParam(":departement_id", $departement_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Get Information about Specific Specialization
function getspecificspecialization($chef_filiere_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM specialization 
        WHERE coordonnateur_id=:coordonnateur_id LIMIT 1");
    $stm->bindParam(":coordonnateur_id", $chef_filiere_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Coonnect To DATABASE To Get All Classes For Specific Spécialization
function getallclassesforspecificSpecialization($specialization_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe 
        WHERE specialization_id=:specialization_id");
    $stm->bindParam(":specialization_id", $specialization_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Get ALL Studnets in specific Spécialization
function getallstudentsinspecificSpecialization($specialization_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.student_id,student.firstname,
                student.lastname,student.massar_student,student.student_apoge,
                student.email,student.phone_number,student.class_id,student.student_adress,
                student.image_path,student.cv_path,classe.class_name,specialization.specialization_id
                FROM student 
                INNER JOIN classe ON student.class_id=classe.class_id 
                INNER JOIN specialization ON specialization.specialization_id= classe.specialization_id
                WHERE specialization.specialization_id=:specialization_id");
    $stm->bindParam(":specialization_id", $specialization_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Get All Student In same Classes
function selectallstudentinsameclasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE `class_id`=:class_id");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET Information for Specific Classe

function getclassInfo($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT classe.class_id,classe.class_name,classe.class_year,
            classe.specialization_id,specialization.fullname
            FROM classe
            INNER JOIN specialization ON specialization.specialization_id=classe.specialization_id
            WHERE classe.class_id=:class_id");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET ALL student For Specific Specialization

function getallstudentsforspecificClasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student
        INNER JOIN classe ON classe.class_id=student.class_id
        WHERE student.class_id=:class_id
        ");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Get The Name Of Classe
function getnameofclasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE class_id=:class_id LIMIT 1");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['class_name'];
}
