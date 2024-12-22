<?php

// Function to check the student's information. If it exists, return it.

use LDAP\Connection as LDAPConnection;
use PgSql\Connection;

function checkloginInformation($email, $password)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE email=:email");
    $stm->bindParam(":email", $email);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password,$result['password'])){
                return $result;
        }else{
            return false;
        }
    } else {
        return false;
    }
}

// Function To GET All Students Requests For A Specific Service

function getallstudentresquestforsepecificService($service_type, $student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM service
     WHERE `service_type`=:service_type AND `student_id`=:student_id ORDER BY `service_date`");
    $stm->bindParam(":service_type", $service_type);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


// Function to Insert Request Into Data Base 

function insertstudentrequesintodataBase($service_type, $service_status, $student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO `service` (`service_type`,`service_status`,`service_date`,`student_id`)
            VALUES (:service_type,:service_status,NOW(),:student_id)");
    $stm->bindParam(":service_type", $service_type);
    $stm->bindParam(":service_status", $service_status);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To GET ALL Students Classe
function gelallClasse()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Insert Student Request For Agreement InternShip Into DataBase

function insertagreementRequest($company_name, $company_service, $company_address, $company_phone, $company_fax, $path_img, $student_id)
{
    $agreement_status = 0;
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO `agreement`(`company_name`,`company_service`,
                `company_address`,`company_phone`,`company_fax`,`insurance_path`,`request_date`,
                `agreement_status`,`student_id`) VALUES (:company_name,:company_service,
                :company_address,:company_phone,:company_fax,:insurance_path,NOW(),
                :agreement_status,:student_id)");
    $stm->bindParam(":company_name", $company_name);
    $stm->bindParam(":company_service", $company_service);
    $stm->bindParam(":company_address", $company_address);
    $stm->bindParam(":company_phone", $company_phone);
    $stm->bindParam(":company_fax", $company_fax);
    $stm->bindParam(":insurance_path", $path_img);
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function To GET ALL Agreement Request For A Specific Student 

function getagreementrequestforspecificstudent($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM agreement WHERE `student_id`=:student_id");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function to Get Information for profile Student
function getinformationforprofileStudent($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student 
                INNER JOIN classe ON student.class_id=classe.class_id 
                INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id
                WHERE student_id=:student_id LIMIT 1");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//  Function To Update The Student Password

function updatestudentPassword($password, $student_id)
{
    $password=password_hash($password,PASSWORD_DEFAULT);
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE student SET `password`=:password
            WHERE `student_id`=:student_id");
    $stm->bindParam(":password",$password);
    $stm->bindParam(":student_id",$student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function To Update Pesrsonal Infomration Of Student

function updatestudentpersonalInformation($birth_date, $nationality, $phone_number, $sexe, $student_adress, $new_path, $student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE student SET 
                `birth_date`=:birth_date,`nationality`=:nationality,
                `phone_number`=:phone_number,`sexe`=:sexe,
                `student_adress`=:student_adress,`image_path`=:image_path
                WHERE `student_id`=:student_id");
    $stm->bindParam(":birth_date", $birth_date);
    $stm->bindParam(":nationality", $nationality);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":sexe", $sexe);
    $stm->bindParam(":student_adress", $student_adress);
    $stm->bindParam(":image_path", $new_path);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}


// Function To GET all Information About the Module 

function getallModule($class_id)
{
    $cours_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT `course_name`,`date_pub`,`file_course`,`file_image`,
            `status_cour`,`firstname`,`lastname`,`image_path`,`modul_name`
            FROM course
            INNER JOIN professeur ON professeur.prof_id=course.prof_id
            INNER JOIN module ON module.modul_id=course.id_module
            WHERE `id_element` IS NULL AND `status_cour`=:status_cour
            AND `classe`=:classe_id ORDER BY `date_pub` DESC");
    $stm->bindParam(":status_cour", $cours_status);
    $stm->bindParam(":classe_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET ALL ELEMENTS FOR SPECIFIC classes
function getelementsforspecificClasse($class_id)
{
    $cours_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT `course_name`,`date_pub`,`file_course`,`file_image`,
            `status_cour`,`firstname`,`lastname`,`image_path`,`element_name`
            FROM course
            INNER JOIN professeur ON professeur.prof_id=course.prof_id
            INNER JOIN element ON element.element_id =course.id_element
            WHERE `id_module` IS NULL AND `status_cour`=:status_cour
            AND `classe`=:classe_id ORDER BY `date_pub` DESC");
    $stm->bindParam(":status_cour", $cours_status);
    $stm->bindParam(":classe_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET All Student In same Classroom
function getallstudentinsameClasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE class_id=:class_id ORDER BY `lastname`");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET All Categories 

function getallCategories()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM category_book");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET All Availble books

function getavailableBook()
{
    $book_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM book WHERE `status`=:book_status");
    $stm->bindParam(":book_status", $book_status);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Filter book From Database

function filterBookForSpecificTerms($category, $isbn, $name)
{
    $conn = ConnectToDB();
    $query = "SELECT * FROM book WHERE 1=1";
    $params = [];

    if ($category != "nulle") {
        $query .= " AND `category_id` = :category";
        $params[':category'] = $category;
    }
    if ($isbn != "nulle") {
        $query .= " AND `isbn` = :isbn";
        $params[':isbn'] = $isbn;
    }
    if ($name != "nulle") {
        $query .= " AND `book_title` = :book_title";
        $params[':book_title'] = $name;
    }

    $query .= " AND `status` = :book_status";
    $stm = $conn->prepare($query);
    $stm->bindValue(':book_status', 1, PDO::PARAM_INT);

    foreach ($params as $key => $value) {
        $stm->bindParam($key, $value);
    }
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Check Student Request before Accept Request
function checkonestudentaccepeterequestinlastweek($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("
        SELECT COUNT(*) AS total_requests 
        FROM request_book 
        WHERE student_id = :student_id 
        AND request_date BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() + INTERVAL 1 DAY
    ");
    $stm->bindParam(':student_id', $student_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['total_requests'];
}


// Function to Add book Requesting Into Data Base 
function addrequeststudentbookaction($student_id, $book_id, $expiration_date)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO `request_book`(`student_id`,`book_id`,
            `request_date`,`expiration_date`) 
            VALUES (:student_id,:book_id,NOW(),:expiration_date)");
    $stm->bindParam(":student_id", $student_id);
    $stm->bindParam(":book_id", $book_id);
    $stm->bindParam(":expiration_date", $expiration_date);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To Get All My Request book

function getallmyrequestbook($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM accept_refuse WHERE `etudiant`=:student_id");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Update the CV PATH IN DATABASE
function updatestudnetCV($link_clear, $student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE `student` SET `cv_path`=:cv_path WHERE `student_id`=:student_id");
    $stm->bindParam(":cv_path", $link_clear);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To Update the Linkden PATH
function updatelinkedinPathintostudentTable($student_id, $linkedin_path)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE `student` SET `linkedin_path`=:linkedin_path 
        WHERE `student_id`=:student_id");
    $stm->bindParam(":linkedin_path", $linkedin_path);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function To GET Info About School Certificate Lors de L'impression de la cerficate
function getallschoolcerficateInfo($serive_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT service.service_id,service.approved_date,service.student_id,
    student.firstname,student.lastname,student.massar_student,student.class_id, 
    classe.class_name,classe.class_year,specialization.fullname
    FROM service
    INNER JOIN student ON student.student_id=service.student_id
    INNER JOIN classe ON classe.class_id=student.class_id
    INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id
    WHERE service.service_id=:service_id");
    $stm->bindParam(":service_id", $serive_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
