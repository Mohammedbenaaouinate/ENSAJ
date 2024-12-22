<?php
function list_salle()
{

    $conn = connect_database();
    $query = $conn->prepare("SELECT * FROM `classroom`");
    $query->execute();
    return $query;
}

function add_salle()
{
    $conn = connect_database();
    $classroom = $_POST["name_salle"];
    $capacity = $_POST["capacity"];
    $bloc = $_POST["bloc"];


    $query = $conn->prepare("INSERT INTO classroom(classroom_name,classroom_capacity,bloc) VALUES(:room,:cp,:blc)");
    $query->bindParam("room", $classroom);
    $query->bindParam("cp", $capacity);
    $query->bindParam("blc", $bloc);

    $query->execute();
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function delete_salle($id)
{
    $conn = connect_database();
    $query = $conn->prepare("DELETE FROM classroom WHERE classroom_id =:class");
    $query->bindParam("class", $id);
    $query->execute();
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function select_single_salle($id)
{
    $conn = connect_database();

    $query = $conn->prepare("SELECT * FROM classroom WHERE classroom_id=:ide");
    $query->bindParam("ide", $id);
    $query->execute();
    $query = $query->fetch(PDO::FETCH_ASSOC);
    return $query;
}


function edit_salle()
{

    $conn = connect_database();
    $id = $_POST["id"];
    $salle = $_POST["name_salle"];
    $capacity = $_POST["capacity"];
    $bloc = $_POST["bloc"];

    $query = $conn->prepare("UPDATE classroom SET classroom_name=:name,classroom_capacity=:year,bloc=:blc WHERE classroom_id=:id_cl");
    $query->bindParam("name", $salle);
    $query->bindParam("year", $capacity);
    $query->bindParam("id_cl", $id);
    $query->bindParam("blc", $bloc);

    $query->execute();
    return $query;
}
