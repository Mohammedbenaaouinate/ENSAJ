<?php
// Function Connect ToDB Aleardy exist On Index for The first Include the usersController.php and this file INCLUDE users.php whicg contains ConncetTo DB
// function to get All departement FROM Data Base
function getallldepartement()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM departement");
    $stm->execute();
    $departements = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $departements;
}

// Function To get All professeur in the same departement
function getprofesseurinsamedepartement($departement_id)
{
    $role_prof = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM professeur WHERE `departement_id`=:departement_id AND `role_prof`=:role_prof");
    $stm->bindParam(":departement_id", $departement_id);
    $stm->bindParam(":role_prof", $role_prof);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//function To add Specialization INTO DATA BASE 
// function addSpecialization($short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id)
// {
//     $second_role = "filiere";
//     $conn = ConnectToDB();
//     $stm = $conn->prepare("INSERT INTO specialization(`short_name`,`fullname`,`coordonnateur_id`,`description_field`,`departement_id`)
//             VALUES(:short_name,:fullname,:coordonnateur_id,:description_field,:departement_id)");
//     $stm->bindParam(":short_name", $short_name);
//     $stm->bindParam(":fullname", $fullname);
//     $stm->bindParam(":coordonnateur_id", $coordonnateur_id);
//     $stm->bindParam(":description_field", $desciption_field);
//     $stm->bindParam(":departement_id", $departement_id);
//     $stm->execute();
//     $stm2 = $conn->prepare("UPDATE professeur SET `second_role`=:second_role WHERE `prof_id`=:prof_id");
//     $stm2->bindParam(":second_role", $second_role);
//     $stm2->bindParam(":prof_id", $coordonnateur_id);
//     $stm2->execute();
//     return $stm->rowCount() > 0;
// }
function addSpecialization($short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id)
{
    $second_role = "filiere";
    $conn = ConnectToDB();
    try {
        $conn->beginTransaction();
        $stm = $conn->prepare("INSERT INTO specialization(`short_name`,`fullname`,`coordonnateur_id`,`description_field`,`departement_id`)
            VALUES(:short_name,:fullname,:coordonnateur_id,:description_field,:departement_id)");
        $stm->bindParam(":short_name", $short_name);
        $stm->bindParam(":fullname", $fullname);
        $stm->bindParam(":coordonnateur_id", $coordonnateur_id);
        $stm->bindParam(":description_field", $desciption_field);
        $stm->bindParam(":departement_id", $departement_id);
        $stm->execute();
        $stm2 = $conn->prepare("UPDATE professeur SET `second_role`=:second_role WHERE `prof_id`=:prof_id");
        $stm2->bindParam(":second_role", $second_role);
        $stm2->bindParam(":prof_id", $coordonnateur_id);
        $stm2->execute();

        $conn->commit();

        return $stm->rowCount() > 0 && $stm2->rowCount() > 0;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}

// Function to GET  all Specialization from the database
function getsepcializations()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT specialization.specialization_id, specialization.short_name,
                specialization.fullname,specialization.description_field, professeur.firstname,
                professeur.lastname,professeur.email,professeur.phone_number,departement.short_name AS d_short_name
                 FROM specialization INNER JOIN professeur ON specialization.coordonnateur_id=professeur.prof_id 
                 INNER JOIN departement ON specialization.departement_id=departement.departement_id");
    $stm->execute();
    $specializations = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $specializations;
}
// Function To DELETE Specialization FROM DATA BASE

// function deleteSpecialization($specialization_id)
// {
//     $conn = ConnectToDB();
//     $stm = $conn->prepare("DELETE FROM specialization WHERE `specialization_id`=:specialization_id");
//     $stm->bindParam(":specialization_id", $specialization_id);
//     $stm->execute();
//     return $stm->rowCount() > 0;
// }
function deleteSpecialization($specialization_id)
{
    $conn = ConnectToDB();
    $role_prof = NULL;
    try {
        $conn->beginTransaction();
        $stm_one = $conn->prepare("SELECT * FROM specialization WHERE specialization_id=:specialization_id LIMIT 1");
        $stm_one->bindParam(":specialization_id", $specialization_id);
        $stm_one->execute();
        $result = $stm_one->fetch(PDO::FETCH_ASSOC);
        $prof_id = $result['coordonnateur_id'];
        $stm_two = $conn->prepare("UPDATE professeur SET `second_role`=:second_role WHERE `prof_id`=:prof_id");
        $stm_two->bindParam(":second_role", $role_prof);
        $stm_two->bindParam(":prof_id", $prof_id);
        $stm_two->execute();
        $stm_three = $conn->prepare("DELETE FROM specialization WHERE `specialization_id`=:specialization_id");
        $stm_three->bindParam(":specialization_id", $specialization_id);
        $stm_three->execute();
        $conn->commit();
        return $stm_two->rowCount() > 0 && $stm_three->rowCount() > 0;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}



// Function to get Information About a single specialization
function getsepcializationInformation($specialization_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM specialization WHERE `specialization_id`=:specialization_id LIMIT 1");
    $stm->bindParam(":specialization_id", $specialization_id);
    $stm->execute();
    $specialization = $stm->fetch(PDO::FETCH_ASSOC);
    return $specialization;
}



// Function To Get All Professeurs belongs The same departement
function professeurcontainsdepartement($departement_id)
{
    $role_prof = 1;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM professeur WHERE `departement_id`=:departement_id AND `role_prof`=:role_prof");
    $stm->bindParam(":departement_id", $departement_id);
    $stm->bindParam(":role_prof", $role_prof);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



// Function to Modifier Les informations concernant un 
function updatespecialization($specialization_id, $short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE specialization SET `short_name`=:short_name,`fullname`=:fullname,`coordonnateur_id`=:coordonnateur_id
        ,`description_field`=:description_field,`departement_id`=:departement_id WHERE `specialization_id`=:specialization_id");
    $stm->bindParam(":short_name", $short_name);
    $stm->bindParam(":fullname", $fullname);
    $stm->bindParam(":coordonnateur_id", $coordonnateur_id);
    $stm->bindParam(":description_field", $desciption_field);
    $stm->bindParam(":departement_id", $departement_id);
    $stm->bindParam(":specialization_id", $specialization_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To Update Specialization  With Change  the previous coordinator

function updatespecializationwithchangingCoordonnateur(
    $specialization_id,
    $short_name,
    $fullname,
    $coordonnateur_id,
    $desciption_field,
    $departement_id,
    $previous_coor_id
) {
    $conn = ConnectToDB();
    $role_prof = "filiere";
    $null = NULL;
    try {
        $conn->beginTransaction();
        $stm_one = $conn->prepare("UPDATE professeur SET `second_role`=:second_role WHERE `prof_id`=:previous_coor_id");
        $stm_one->bindParam(":second_role", $null);
        $stm_one->bindParam(":previous_coor_id", $previous_coor_id);
        $stm_one->execute();
        $stm_two = $conn->prepare("UPDATE professeur SET `second_role`=:second_role WHERE `prof_id`=:coordonnateur_id");
        $stm_two->bindParam(":second_role", $role_prof);
        $stm_two->bindParam(":coordonnateur_id", $coordonnateur_id);
        $stm_two->execute();
        $stm_three = $conn->prepare("UPDATE specialization SET `short_name`=:short_name,`fullname`=:fullname,`coordonnateur_id`=:coordonnateur_id
        ,`description_field`=:description_field,`departement_id`=:departement_id WHERE `specialization_id`=:specialization_id");
        $stm_three->bindParam(":short_name", $short_name);
        $stm_three->bindParam(":fullname", $fullname);
        $stm_three->bindParam(":coordonnateur_id", $coordonnateur_id);
        $stm_three->bindParam(":description_field", $desciption_field);
        $stm_three->bindParam(":departement_id", $departement_id);
        $stm_three->bindParam(":specialization_id", $specialization_id);
        $stm_three->execute();
        $conn->commit();
        return $stm_one->rowCount() > 0 && $stm_two->rowCount() > 0 && $stm_three->rowCount() > 0;
    } catch (Exception $e) {
        $conn->rollBack();
        return false;
    }
}
