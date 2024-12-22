<?php

// Function To Count The Number Of Request For Each serive(attestation scolaire,relvé de note, Retré Provisoire)
function gatnumberofRequests($service_type)
{
    $service_status = 0;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT COUNT(service_id) as nbr FROM service
             WHERE 
             service_type=:service_type 
             AND 
             service_status=:service_status
             ");
    $stm->bindParam(":service_type", $service_type);
    $stm->bindParam(":service_status", $service_status);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['nbr'];
}

// Function To GET The Number Of Agreement internship
function getnumberagreementinternship()
{
    $agreement_status = 0;
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT COUNT(agreement_id) as nbr FROM agreement
            WHERE agreement_status=:agreement_status");
    $stm->bindParam(":agreement_status", $agreement_status);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['nbr'];
}

// Function To GET the Information Of The User Profile 
function getscolariteprofileInformation($employee_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM employee
                WHERE employee_id=:employee_id LIMIT 1");
    $stm->bindParam(":employee_id", $employee_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function To update Profile information In Database

function updatescolariteprofileinfo($scolarite_id, $first_name, $last_name, $email, $phone_number, $path)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE employee 
                        SET `firstname`=:firstname,`lastname`=:lastname,
                        `email`=:email,`phone_number`=:phone_number,
                        `image_path`=:image_path
                        WHERE `employee_id`=:employee_id");
    $stm->bindParam(":firstname", $first_name);
    $stm->bindParam(":lastname", $last_name);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":image_path", $path);
    $stm->bindParam(":employee_id", $scolarite_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}


// Function To update The Password

function updatePassword($password,$scolarite_id){
                $password=password_hash($password,PASSWORD_DEFAULT);
                $conn=ConnectToDB();
                $stm=$conn->prepare("UPDATE employee SET `password`=:password
                WHERE `employee_id`=:employee_id");
                $stm->bindParam(":password",$password);
                $stm->bindParam(":employee_id",$scolarite_id);
                $stm->execute();
                return $stm->rowCount() >0;
}