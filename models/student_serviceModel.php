<?php

// Function To get ALL records For Specific Type Of Service
function getallrecordsofspecifictypeofService($service_status, $service_type)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("
                SELECT student.student_id,student.massar_student,.student.firstname,student.lastname,
                student.image_path,student.class_id,student.phone_number,student.email,classe.class_name,
                service.service_id,service.service_date,service.service_type FROM service 
                INNER JOIN student ON service.student_id=student.student_id 
                INNER JOIN classe ON student.class_id=classe.class_id 
                WHERE
                service.service_status=:service_status AND service.service_type=:service_type");
    $stm->bindParam(":service_status", $service_status);
    $stm->bindParam(":service_type", $service_type);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Update Service Status(change service_status To 1) After treatment by the school staff
function updateserviceStatus($service_status, $service_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE service SET `service_status`=:service_status 
    WHERE `service_id`=:service_id");
    $stm->bindParam(":service_status", $service_status);
    $stm->bindParam("service_id", $service_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To SET The Approuved Date For School Certificate
function setapproveddateforschoolCerticate($service_id, $approved_date)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE service SET `approved_date`=:approved_date
        WHERE `service_id`=:service_id
        ");
    $stm->bindParam(":approved_date", $approved_date);
    $stm->bindParam(":service_id", $service_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To get More Information For A specific Student
function getstudentInfo($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.firstname,student.lastname,student.massar_student,
    student.class_id,classe.class_year,student.cin_student,specialization.fullname FROM student
    INNER JOIN classe ON student.class_id=classe.class_id
    INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id
    WHERE student.student_id=:student_id LIMIT 1");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// Function To set service status 2 (refused) AND set the reason of Reject
function updatestatusendsetrjectionReason($service_id, $service_status, $rejection_reason)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE service 
                        SET `service_status`=:service_status,
                        `rejection_reason`=:rejection_reason
                        WHERE `service_id`=:service_id
                ");
    $stm->bindParam(":service_status", $service_status);
    $stm->bindParam(":rejection_reason", $rejection_reason);
    $stm->bindParam(":service_id", $service_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}


// Function To get ALL Services aleardy Served (ontenir Les informations sur tous les dervices qui sont déja servi)

function getallservicesaleardyServed($service_type)
{
    $service_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM service 
                    WHERE `service_type`=:service_type AND `service_status`=:service_status");
    $stm->bindParam(":service_type", $service_type);
    $stm->bindParam(":service_status", $service_status);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// New Part Of InternShipt Agreement Requests
// Function To GET ALL Requests InternShip requests And With Infromation Student

function getallagreementRequests()
{
    $agreement_status = 0;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.student_id,student.massar_student,student.cin_student,
                student.firstname,student.lastname,student.image_path,student.class_id,student.phone_number,
                student.email,classe.class_name,agreement.agreement_id,agreement.insurance_path,
                agreement.request_date
                FROM agreement 
                INNER JOIN student ON agreement.student_id=student.student_id
                INNER JOIN classe ON student.class_id=classe.class_id
                WHERE agreement.agreement_status=:agreement_status");
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET Information About All Agreement Aleardy Served

function getallagreementaleardyserved()
{
    $agreement_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM agreement 
                WHERE agreement.agreement_status=:agreement_status");
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Refuse Argeement internship Request From Data Base That mean to SET 1 In Agreement_status

function refuseagreementinternshipRequest($agremeent_id, $rejection_reason)
{
    $agreement_status = 2;
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE agreement SET rejection_reason=:rejection_reason,
                  agreement_status=:agreement_status WHERE agreement_id=:agreement_id");
    $stm->bindParam(":rejection_reason", $rejection_reason);
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->bindParam(":agreement_id", $agremeent_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To get A specific Information For A specific Agreement internship

function getagreementinternshipInfo($agreement_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM agreement WHERE agreement_id=:agreement_id LIMIT 1");
    $stm->bindParam(":agreement_id", $agreement_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// Function To get More Information For A specific Student to Fill the Agreement internship
function getstudentmoreInfo($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT student.firstname,student.lastname,student.massar_student,
    student.class_id,student.cin_student,student.birth_date,student.nationality,
    student.phone_number,student.student_adress,
    classe.class_year,specialization.fullname FROM student
    INNER JOIN classe ON student.class_id=classe.class_id
    INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id
    WHERE student.student_id=:student_id LIMIT 1");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

/// Function To Set Agreement status To After Printing Agreement internship

function acceptagreementinternshipRequest($agreement_id)
{
    $agreement_status = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE agreement SET agreement_status=:agreement_status
            WHERE agreement_id=:agreement_id");
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->bindParam(":agreement_id", $agreement_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function To Get All Spécializations From Data Base

function getallSpecilizations()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM specialization");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET All Classes For Specific Spécialization

function getclasseforoneSpecialization($field_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE specialization_id=:specialization_id");
    $stm->bindParam(":specialization_id", $field_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To GET all Students For A Specific Classe

function getallstudents($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE class_id=:class_id ORDER BY lastname");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function To get Information To Display in the page of schedule
function getallinformationofseance($class_id, $day, $period_time)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT schedule.id_schedule,schedule.modul_code,classe.class_name, semester.semester_name,
    classroom.classroom_name FROM schedule 
    INNER JOIN classroom ON schedule.classroom_id=classroom.classroom_id 
    INNER JOIN classe ON schedule.classe=classe.class_id 
    INNER JOIN semester ON schedule.semester_id=semester.semester_id
    WHERE schedule.classe=:class_id 
    AND schedule.day=:jour 
    AND schedule.time=:period_time  LIMIT 1");
    $stm->bindParam(":class_id", $class_id);
    $stm->bindParam(":jour", $day);
    $stm->bindParam(":period_time", $period_time);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if ($stm->rowCount() > 0) {
        return $result;
    } else {
        return false;
    }
}

// Function To GET Information About the head of School

function getheadofschoolinfo()
{
    $second_role = "directeur";
    $role_prof = 2;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM `professeur`
             WHERE `role_prof`=:role_prof AND `second_role`=:second_role LIMIT 1");
    $stm->bindParam(":role_prof", $role_prof);
    $stm->bindParam(":second_role", $second_role);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}


// Function To GET Infomration About Interveneant of module OR Element

function getintervenantofmoduleorelement($module_or_element_name, $class_id)
{
    $conn = ConnectToDB();
    $stm_one = $conn->prepare("SELECT modul_id,intervenant FROM module WHERE modul_name=:module_name AND class_id=:class_id LIMIT 1");
    $stm_one->bindParam(":module_name", $module_or_element_name);
    $stm_one->bindParam(":class_id", $class_id);
    $stm_one->execute();
    $result = $stm_one->fetch(PDO::FETCH_ASSOC);
    if ($stm_one->rowCount() > 0) {
        return $result;
    } else {
        $stm_two = $conn->prepare("SELECT element_id,intervenant_name AS intervenant FROM element
        INNER JOIN module_with_element ON module_with_element.module_id=element.module_id 
        WHERE element.element_name=:element_name AND module_with_element.class_id=:class_id LIMIT 1");
        $stm_two->bindParam(":element_name", $module_or_element_name);
        $stm_two->bindParam(":class_id", $class_id);
        $stm_two->execute();
        $result = $stm_two->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
// Start The Absence ManaGement Controller
function getallsemesters()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM semester");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function GET ALL Module For Specific classe in Specific Semester
function getallmoduleforspecificClasse($semester_id, $class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM module
             WHERE semester_id=:semester_id AND class_id=:class_id");
    $stm->bindParam(":semester_id", $semester_id);
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Get All Module With Element For Specific classe in Specific Semester
function getallmodulewithelementforspecificClasse($semester_id, $class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM module_with_element WHERE 
    semester_id=:semester_id AND class_id=:class_id");
    $stm->bindParam(":semester_id", $semester_id);
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To INSERT THE LIST OF ABSENCE FOR SPECIFIC CLASSES IN SPECIFIC MODULE(Module Without Element)
function insertmoduleAbsence($seance_time, $seance_date, $abs_justify, $class_id, $module_id, $semester_id, $abs_unjustified)
{
    $conn = ConnectToDB();
    $nbr_justify = count($abs_justify);
    $nbr_unjustified = count($abs_unjustified);
    $unjustified = 0;
    $justufy = 1;

    try {
        $conn->beginTransaction();
        for ($i = 0; $i < $nbr_justify; $i++) {
            $stm = $conn->prepare("INSERT INTO attendance(`seance_time`,`record_date`,`student_id`,
                    `class_id`,`modul_id`,`semester_id`,`justified`)
                    VALUES (:seance_time,:record_date,:student_id,:class_id,:modul_id,:semester_id,:justified)
                    ");
            $stm->bindParam(":seance_time", $seance_time);
            $stm->bindParam(":record_date", $seance_date);
            $stm->bindParam(":student_id", $abs_justify[$i]);
            $stm->bindParam(":class_id", $class_id);
            $stm->bindParam(":modul_id", $module_id);
            $stm->bindParam(":semester_id", $semester_id);
            $stm->bindParam(":justified", $justufy);
            $stm->execute();
            if ($stm->rowCount() <= 0) {
                $conn->rollBack();
                return false;
            }
        }
        for ($i = 0; $i < $nbr_unjustified; $i++) {
            $stm = $conn->prepare("INSERT INTO attendance(`seance_time`,`record_date`,`student_id`,
                    `class_id`,`modul_id`,`semester_id`,`justified`)
                    VALUES (:seance_time,:record_date,:student_id,:class_id,:modul_id,:semester_id,:justified)
                    ");
            $stm->bindParam(":seance_time", $seance_time);
            $stm->bindParam(":record_date", $seance_date);
            $stm->bindParam(":student_id", $abs_unjustified[$i]);
            $stm->bindParam(":class_id", $class_id);
            $stm->bindParam(":modul_id", $module_id);
            $stm->bindParam(":semester_id", $semester_id);
            $stm->bindParam(":justified", $unjustified);
            $stm->execute();
            if ($stm->rowCount() <= 0) {
                $conn->rollBack();
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
// Function To Insert THE LIST OF ABSENCE FOR SPECIFIC CLASSES IN SPECIFIC MODULE WITH ELEMENT
function insertmodule_with_elementAbsence($seance_time, $seance_date, $abs_justify, $class_id, $module_with_element_id, $semester_id,  $abs_unjustified)
{
    $conn = ConnectToDB();
    $nbr_justify = count($abs_justify);
    $nbr_unjustified = count($abs_unjustified);
    $unjustified = 0;
    $justufy = 1;

    try {
        $conn->beginTransaction();
        if ($nbr_justify != 0) {
            for ($i = 0; $i < $nbr_justify; $i++) {
                $stm = $conn->prepare("INSERT INTO attendance(`seance_time`,`record_date`,`student_id`,
                        `class_id`,`modul_element_id`,`semester_id`,`justified`)
                        VALUES (:seance_time,:record_date,:student_id,:class_id,:modul_element_id,:semester_id,:justified)
                        ");
                $stm->bindParam(":seance_time", $seance_time);
                $stm->bindParam(":record_date", $seance_date);
                $stm->bindParam(":student_id", $abs_justify[$i]);
                $stm->bindParam(":class_id", $class_id);
                $stm->bindParam(":modul_element_id", $module_with_element_id);
                $stm->bindParam(":semester_id", $semester_id);
                $stm->bindParam(":justified", $justufy);
                $stm->execute();
                if ($stm->rowCount() <= 0) {
                    $conn->rollBack();
                    return false;
                }
            }
        }
        if ($nbr_unjustified != 0) {
            for ($i = 0; $i < $nbr_unjustified; $i++) {
                $stm = $conn->prepare("INSERT INTO attendance(`seance_time`,`record_date`,`student_id`,
                        `class_id`,`modul_element_id`,`semester_id`,`justified`)
                        VALUES (:seance_time,:record_date,:student_id,:class_id,:modul_element_id,:semester_id,:justified)
                        ");
                $stm->bindParam(":seance_time", $seance_time);
                $stm->bindParam(":record_date", $seance_date);
                $stm->bindParam(":student_id", $abs_unjustified[$i]);
                $stm->bindParam(":class_id", $class_id);
                $stm->bindParam(":modul_element_id", $module_with_element_id);
                $stm->bindParam(":semester_id", $semester_id);
                $stm->bindParam(":justified", $unjustified);
                $stm->execute();
                if ($stm->rowCount() <= 0) {
                    $conn->rollBack();
                    return false;
                }
            }
        }

        $conn->commit();
        return true;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}

// Function To Get Specific Absence For Specific Classe
function getstudentsAbsenceforspecificSession($seance_time, $seance_date, $class_id, $semester_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM attendance
    INNER JOIN student ON student.student_id =attendance.student_id
    WHERE attendance.seance_time=:seance_time AND attendance.record_date=:record_date
    AND attendance.class_id=:class_id AND attendance.semester_id=:semester_id");
    $stm->bindParam(":seance_time", $seance_time);
    $stm->bindParam(":record_date", $seance_date);
    $stm->bindParam(":class_id", $class_id);
    $stm->bindParam(":semester_id", $semester_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    if ($stm->rowCount() > 0) {
        return $result;
    } else {
        return false;
    }
}
// Function Get Module Info From the  Module_id

function getmoduleInfo($module_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM module
    WHERE `modul_id`=:modul_id LIMIT 1");
    $stm->bindParam(":modul_id", $module_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// Function Get Module With Element From The Module With Element
function getmodulewithelementINFO($module_with_element_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM module_with_element
    WHERE module_id=:module_id LIMIT 1");
    $stm->bindParam(":module_id", $module_with_element_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Update the Student Absence To Justify
function updatestudentabsenceTojustify($abs_justify)
{
    $justified = 1;
    $conn = ConnectToDB();
    $nbr_justify = count($abs_justify);
    if ($nbr_justify != 0) {
        for ($i = 0; $i < $nbr_justify; $i++) {
            $stm = $conn->prepare("UPDATE attendance SET justified=:justified 
                WHERE attendance_id=:attendance_id");
            $stm->bindParam(":justified", $justified);
            $stm->bindParam(":attendance_id", $abs_justify[$i]);
            $stm->execute();
        }
        return true;
    } else {
        return false;
    }
}
// Function To Update Student Absence To Unjustified
function updatestudentabsenceToUnjustified($abs_unjustified)
{
    $unjustified = 0;
    $conn = ConnectToDB();
    $nbr_unjustified = count($abs_unjustified);
    if ($nbr_unjustified != 0) {
        for ($i = 0; $i < $nbr_unjustified; $i++) {
            $stm = $conn->prepare("UPDATE attendance SET justified=:justified 
                WHERE attendance_id=:attendance_id");
            $stm->bindParam(":justified", $unjustified);
            $stm->bindParam(":attendance_id", $abs_unjustified[$i]);
            $stm->execute();
        }
        return true;
    } else {
        return false;
    }
}
