<?php

// Function to get All  Specializations From DataBASE

use LDAP\Result;

function getspecializations()
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT * FROM specialization");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Function To get Classes Associated With Specific Specialization
function getclassesforspecificSpecialization($specialization_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT * FROM classe WHERE `specialization_id`=:specialization_id");
        $stm->bindParam(":specialization_id", $specialization_id);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}
// Function To Get All Semster 

function getSemesters()
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT * FROM semester");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Function To get All Professeurs 
function getProfesseurs()
{
        $prof_id = 1;
        $admin_id = 2;
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT `prof_id`,`firstname`,`lastname` FROM professeur 
                WHERE `role_prof`=:role_prof OR `role_prof`=:role_admin");
        $stm->bindParam(":role_prof", $prof_id);
        $stm->bindParam(":role_admin", $admin_id);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Function To Add Subject Without Element Into Data Base (modifier)
function addSubject($modul_code, $modul_name, $intervenant, $intervenant_email, $semester_id, $prof_id, $class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("INSERT INTO module(`modul_code`,`modul_name`,`intervenant`,`intervenant_email`,`semester_id`,`prof_id`,`class_id`)
                        VALUES (:modul_code,:modul_name,:intervenant,:intervenant_email,:semester_id,:prof_id,:class_id)
                ");
        $stm->bindParam(":modul_code", $modul_code);
        $stm->bindParam(":modul_name", $modul_name);
        $stm->bindParam(":intervenant", $intervenant);
        $stm->bindParam(":intervenant_email", $intervenant_email);
        $stm->bindParam(":semester_id", $semester_id);
        $stm->bindParam(":prof_id", $prof_id);
        $stm->bindParam(":class_id", $class_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}

// function to Add Module With Element The Table name is module_with_Element
function ajoutermodule($modul_code, $modul_name, $semester_id, $class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("INSERT INTO module_with_element(`module_code`,`module_name`,
                `semester_id`,`class_id`) VALUES (:module_code,:module_name,:semester_id,:class_id)");
        $stm->bindParam(":module_code", $modul_code);
        $stm->bindParam(":module_name", $modul_name);
        $stm->bindParam(":semester_id", $semester_id);
        $stm->bindParam(":class_id", $class_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}


// Function To get All module Without Element From Data Base 

function getallSubjects()
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT module.modul_id,module.modul_code,module.modul_name,
                                    module.intervenant,module.intervenant_email,
                                    semester.semester_name,professeur.firstname,professeur.lastname,
                                    classe.class_name FROM module
                                    INNER JOIN semester ON module.semester_id=semester.semester_id
                                    INNER JOIN professeur ON professeur.prof_id=module.prof_id
                                    INNER JOIN classe ON classe.class_id=module.class_id");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Function To Get ALL Module With Element From Data Base 

function getallmodulewithElement()
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT module_with_element.module_id,module_with_element.module_code,
        module_with_element.module_name,semester.semester_name,classe.class_name 
        FROM module_with_element
        INNER JOIN semester ON module_with_element.semester_id=semester.semester_id
        INNER JOIN classe ON  module_with_element.class_id=classe.class_id");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Function To Get All Elements From Data Base

function getallElements()
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT element.element_id,element.element_code,element.element_name,
                element.intervenant_name,element.intervenant_email,element.module_id,professeur.firstname,professeur.lastname
                FROM element
                INNER JOIN professeur ON element.prof_id=professeur.prof_id");
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Get Module Name (Module Without Element)
function getnamemodulebyID($modul_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT * FROM module WHERE modul_id=:modul_id");
        $stm->bindParam(":modul_id", $modul_id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
}
// Function To DELETE Function From Data Base
function deletesubject($modul_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("DELETE FROM module WHERE `modul_id`=:modul_id");
        $stm->bindParam(":modul_id", $modul_id);
        $module_info = getnamemodulebyID($modul_id);
        $module_name = $module_info['modul_name'];
        $class_id = $module_info['class_id'];
        deletemodulefromSchedule($module_name, $class_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}

// Function To GET Information About Specific Subject For Editing the Subject
function getsubjectInformation($modul_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT  module.modul_id,module.modul_code,module.modul_name,
                module.intervenant,module.intervenant_email,
                module.semester_id,module.prof_id,module.class_id,specialization.specialization_id 
                FROM module
                 INNER JOIN classe ON module.class_id=classe.class_id
                 INNER JOIN specialization ON specialization.specialization_id=classe.specialization_id
                 WHERE module.modul_id=:modul_id LIMIT 1");
        $stm->bindParam(":modul_id", $modul_id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
}


// Not Modified
// Function To update Information For A Specific Subject

function updatesubjectaction($modul_id, $modul_code, $modul_name, $intervenant, $intervenant_email, $semester_id, $prof_id, $class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE module SET `modul_code`=:modul_code,`modul_name`=:modul_name,`intervenant`=:intervenant,
                `intervenant_email`=:intervenant_email,`semester_id`=:semester_id,`prof_id`=:prof_id,`class_id`=:class_id
                WHERE
                `modul_id`=:modul_id");
        $stm->bindParam(":modul_code", $modul_code);
        $stm->bindParam(":modul_name", $modul_name);
        $stm->bindParam(":intervenant", $intervenant);
        $stm->bindParam(":intervenant_email", $intervenant_email);
        $stm->bindParam(":semester_id", $semester_id);
        $stm->bindParam(":prof_id", $prof_id);
        $stm->bindParam(":class_id", $class_id);
        $stm->bindParam(":modul_id", $modul_id);
        $module_info = getnamemodulebyID($modul_id);
        $module_name = $module_info['modul_name'];
        $class_id = $module_info['class_id'];
        deletemodulefromSchedule($module_name, $class_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}
//

// Function To Delete Module From Schedule
function deletemodulefromSchedule($module_name, $class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("DELETE FROM `schedule` WHERE modul_code=:module_name AND classe=:class_id");
        $stm->bindParam(":module_name", $module_name);
        $stm->bindParam(":class_id", $class_id);
        $stm->execute();
}
//
// Function Pour Supprimer un Module qui contient des élélements dana la base de donnée

function supprimerModule($module_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("DELETE FROM module_with_element WHERE module_id=:module_id");
        $stm->bindParam(":module_id", $module_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}


// Function Pour Obtenir les information Asscocie a un specific Module Avec élements

function obtenirmoduleInformation($module_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT module_with_element.module_id,module_with_element.module_code
                ,module_with_element.module_name,module_with_element.semester_id,
                module_with_element.class_id,specialization.specialization_id 
                FROM module_with_element
                INNER JOIN classe ON module_with_element.class_id=classe.class_id
                INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id
                WHERE module_with_element.module_id=:module_id LIMIT 1
        ");
        $stm->bindParam(":module_id", $module_id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
}

//Function Pour Faire la mise à jour des informations a un Module Specific dans la base de données  

function modifiermoduleaction($module_id, $module_code, $module_name, $semester_id, $class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE module_with_element 
                        SET `module_code`=:module_code,`module_name`=:module_name,
                        `semester_id`=:semester_id,`class_id`=:class_id
                        WHERE `module_id`=:module_id
                ");
        $stm->bindParam(":module_code", $module_code);
        $stm->bindParam(":module_name", $module_name);
        $stm->bindParam(":semester_id", $semester_id);
        $stm->bindParam(":class_id", $class_id);
        $stm->bindParam(":module_id", $module_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}
// Function delete element
function getelementInfo($element_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT * FROM element 
        INNER JOIN module_with_element ON module_with_element.module_id=element.module_id
        WHERE element_id=:element_id");
        $stm->bindParam(":element_id", $element_id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
}

// Fonction Pour Supprimer un élément dans la base de données

function deleteElement($element_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("DELETE FROM element WHERE element_id=:element_id");
        $stm->bindParam(":element_id", $element_id);
        $element_info = getelementInfo($element_id);
        $element_name = $element_info['element_name'];
        $class_id = $element_info['class_id'];
        deletemodulefromSchedule($element_name, $class_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}

// Fonction Pour Ajouter un élément a la base de données

function  ajouterElement($element_code, $element_name, $intervenant_name, $intervenant_email, $prof_id, $module_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("INSERT INTO element(`element_code`,`element_name`,`intervenant_name`,
                `intervenant_email`,`prof_id`,`module_id`)
                VALUES (:element_code,:element_name,:intervenant_name,:intervenant_email,
                :prof_id,:module_id)");
        $stm->bindParam(":element_code", $element_code);
        $stm->bindParam(":element_name", $element_name);
        $stm->bindParam(":intervenant_name", $intervenant_name);
        $stm->bindParam(":intervenant_email", $intervenant_email);
        $stm->bindParam(":prof_id", $prof_id);
        $stm->bindParam(":module_id", $module_id);
        $stm->execute();
        return $stm->rowCount() > 0;
}

// Partie de Filtre

// Function To get all Subject For Aspecific Classe
function getallSubjectsbyclasse($class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT module.modul_id,module.modul_code,module.modul_name,
                                    module.intervenant,module.intervenant_email,
                                    semester.semester_name,professeur.firstname,professeur.lastname,
                                    classe.class_name FROM module
                                    INNER JOIN semester ON module.semester_id=semester.semester_id
                                    INNER JOIN professeur ON professeur.prof_id=module.prof_id
                                    INNER JOIN classe ON classe.class_id=module.class_id
                                    WHERE module.class_id=:class_id
                                    ");
        $stm->bindParam(":class_id", $class_id);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}

// Fonction pour obtenir tous les modèles qui contient des éléments du même classe
function getallmodulewithElementbyclasse($class_id)
{
        $conn = ConnectToDB();
        $stm = $conn->prepare("SELECT module_with_element.module_id,module_with_element.module_code,
        module_with_element.module_name,semester.semester_name,classe.class_name 
        FROM module_with_element
        INNER JOIN semester ON module_with_element.semester_id=semester.semester_id
        INNER JOIN classe ON  module_with_element.class_id=classe.class_id
        WHERE module_with_element.class_id=:class_id
        ");
        $stm->bindParam(":class_id", $class_id);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}
