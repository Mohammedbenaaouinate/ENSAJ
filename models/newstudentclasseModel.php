<?php
// Function To GET Student Classe Info 
function getnewclassInfo($new_classe_full_name)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe
            WHERE class_name=:class_name LIMIT 1");
    $stm->bindParam(":class_name", $new_classe_full_name);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Update The Student Classe
function updatestudentclasseattheendofyear($all_student)
{
    $conn = ConnectToDB();
    try {
        $conn->beginTransaction();
        foreach ($all_student as $student) {
            $stm = $conn->prepare("UPDATE `student` SET `class_id`=:new_class_id
            WHERE `firstname`=:firstname AND `lastname`=:lastname
            AND `massar_student`=:massar_student
            AND `student_apoge`=:student_apoge");
            $stm->bindParam(":new_class_id", $student['class_id']);
            $stm->bindParam(":firstname", $student['firstname']);
            $stm->bindParam(":lastname", $student['lastname']);
            $stm->bindParam(":massar_student", $student['massar_student']);
            $stm->bindParam(":student_apoge", $student['student_apoge']);
            if (!$stm->execute()) {
                return false;
            }
        }
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}
// Function To Get The Second Year Classe Information
function getsecondyearclassInfo()
{
    $classe_name = "CP-2";
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE class_name=:class_name LIMIT 1");
    $stm->bindParam(":class_name", $classe_name);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// function To Get All Second Year Students
function getallsecondyearstudents($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE class_id=:class_id ORDER BY lastname");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Get All First year students 
function getallfirstyearClasses()
{
    $CP = "CP-1";
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE class_name LIKE '%-1' AND class_name!=:class_name");
    $stm->bindParam(":class_name", $CP);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Update The Student Classe
function updatethestudentClasse($student_id, $new_class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE `student` SET `class_id`=:new_class_id 
    WHERE student_id=:student_id");
    $stm->bindParam(":new_class_id", $new_class_id);
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function To GET ALL END YEAR CLASSES
function getallendyearstudentsClasses()
{
    $class_name_format = "%-3";
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE class_name LIKE :class_format");
    $stm->bindParam(":class_format", $class_name_format);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
// Function To GET All students in same Classe
function getallendyearstudentsinsameClasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE class_id=:class_id");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Archive AND Year Of Students
function archivenedyearstudents($ADMS)
{
    $date_year = date("Y");
    $conn = ConnectToDB();
    try {
        $conn->beginTransaction();
        $stm_one = $conn->prepare("SELECT * FROM `student` WHERE `student_id`=:student_id LIMIT 1");
        $stm_two = $conn->prepare("DELETE FROM `student` WHERE `student_id`=:student_id");
        $stm_three = $conn->prepare("INSERT INTO `archive`(`firstname`,`lastname`,
        `CNE`,`Apoge`,`email`,`CIN`,`class_id`,`birth_date`,`nationality`,`phone_number`,
        `sexe`,`student_adress`,`image_path`,`cv_path`,`school_year`)
        VALUES (:firstname,:lastname,:CNE,:Apoge,:email,:CIN,:class_id,
        :birth_date,:nationality,:phone_number,:sexe,:student_adress,
        :image_path,:cv_path,:school_year)");
        foreach ($ADMS as $ADM) {
            $stm_one->bindParam(":student_id", $ADM);
            $stm_one->execute();
            $result_one = $stm_one->fetch(PDO::FETCH_ASSOC);
            $stm_three->bindParam(":firstname", $result_one['firstname']);
            $stm_three->bindParam(":lastname", $result_one['lastname']);
            $stm_three->bindParam(":CNE", $result_one['massar_student']);
            $stm_three->bindParam(":Apoge", $result_one['student_apoge']);
            $stm_three->bindParam(":email", $result_one['email']);
            $stm_three->bindParam(":CIN", $result_one['cin_student']);
            $stm_three->bindParam(":class_id", $result_one['class_id']);
            $stm_three->bindParam(":birth_date", $result_one['birth_date']);
            $stm_three->bindParam(":nationality", $result_one['nationality']);
            $stm_three->bindParam(":phone_number", $result_one['phone_number']);
            $stm_three->bindParam(":sexe", $result_one['sexe']);
            $stm_three->bindParam(":student_adress", $result_one['student_adress']);
            $stm_three->bindParam(":image_path", $result_one['image_path']);
            $stm_three->bindParam(":cv_path", $result_one['cv_path']);
            $stm_three->bindParam(":school_year", $date_year);
            $stm_three->execute();
            $stm_two->bindParam(":student_id", $ADM);
            $stm_two->execute();
        }
        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}
// Function to Get All END YEAR STUDENT
function getallarchiveStudents()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT firstname,lastname,CNE,Apoge,email,
        phone_number,cv_path,school_year,class_name,image_path
        FROM archive
        INNER JOIN classe ON classe.class_id=archive.class_id");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To GET DISTINCT YEAR FOR OLD LAUREAT
function getalloldyear()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT DISTINCT school_year FROM archive");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To GET ALL Student For Specific Cretaria
function getallstudentscriteria($class_id, $selected_year)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT firstname,lastname,CNE,Apoge,email,
            phone_number,cv_path,school_year,class_name,image_path,
            archive.class_id
            FROM archive
            INNER JOIN classe ON classe.class_id=archive.class_id
            WHERE archive.class_id=:class_id AND archive.school_year=:school_year");
    $stm->bindParam(":class_id", $class_id);
    $stm->bindParam(":school_year", $selected_year);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
