<?php
// Function To Dispaly All Events From Data Base 
function displayallEvents()
{
    $data = array();
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM planning ORDER BY event_id");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $data[] = array(
            'id'    => $row['event_id'],
            'title' => $row['event_title'],
            'start' => $row['start_date'],
            'end'   => $row['end_date'],
            'color' => $row['color'],
            'description' => $row['description']
        );
    }

    return $data;
}
// Function To DELETE EVENT FROM DATA BASE
function deleteEvent($event_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("DELETE FROM planning WHERE `event_id`=:event_id");
    $stm->bindParam(":event_id", $event_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To ADD Event Into Data Base
function addEvent($event_title, $start_date, $end_date, $description, $color)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO planning(`start_date`,`end_date`,`event_title`,`description`,`color`)
                        VALUES (:start_date,ADDDATE(:end_date,INTERVAL 1 DAY),:event_title,:description,:color)
            ");
    $stm->bindParam(":start_date", $start_date);
    $stm->bindParam(":end_date", $end_date);
    $stm->bindParam(":event_title", $event_title);
    $stm->bindParam(":description", $description);
    $stm->bindParam(":color", $color);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// Function To get Information About event From Data Base
function geteventInfromation($event_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT event_id,start_date,DATE_SUB(end_date,INTERVAL 1 DAY) AS end_date,event_title,description,color FROM planning WHERE event_id=:event_id LIMIT 1");
    $stm->bindParam(":event_id", $event_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Update The information
function updateEvent($event_title, $start_date, $end_date, $event_id, $description, $color)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("UPDATE planning SET `event_title`=:event_title,
        `start_date`=:start_date,`end_date`=ADDDATE(:end_date,INTERVAL 1 DAY),`description`=:description,`color`=:color WHERE `event_id`=:event_id");
    $stm->bindParam(":event_title", $event_title);
    $stm->bindParam(":start_date", $start_date);
    $stm->bindParam(":end_date", $end_date);
    $stm->bindParam(":event_id", $event_id);
    $stm->bindParam(":description", $description);
    $stm->bindParam(":color", $color);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Get Information of all events From Planning
function getalleventsfromDatabase()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT event_id,start_date,DATE_SUB(end_date,INTERVAL 1 DAY) AS end_date,event_title,description 
    FROM planning ORDER BY `start_date`");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
