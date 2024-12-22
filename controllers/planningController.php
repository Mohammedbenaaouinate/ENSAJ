<?php
require_once("models/planning.php");
//Function of Controller For Display All Events TO the Ajax For Including in The Calendrie

// Requête en prevonance From Ajax
function displayalleventsController()
{
    if (isset($_SESSION["admin_id"])) {
        $data = displayallEvents();
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "Accès non autorisé";
    }
}
// Function To DELETE EVENT FROM DATA BASE
// Requête En provanance FROM AJAX
function deleteeventactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['event_id']) && !empty($_POST['event_id'])) {
            $event_id = $_POST['event_id'];
            $result = deleteEvent($event_id);
            echo $result;
        } else {
            redirectwithPost("index.php?action=planning", 1, "Des information necessaire pour le traitement de cette requête sont manquante");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
//  Controller To add  Event Into Data Base
function addeventactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            isset($_POST['event_title']) && !empty($_POST['event_title'])
            && isset($_POST['start_date']) && !empty($_POST['start_date'])
            && isset($_POST['end_date']) && !empty($_POST['end_date'])
            && !empty($_POST['color'])
        ) {
            $event_title = $_POST['event_title'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $color = $_POST['color'];
            $description = $_POST['description'];
            $result = addEvent($event_title, $start_date, $end_date, $description, $color);
            if ($result) {
                redirectwithPost("index.php?action=planning", 1, "L'événement est ajouté Avec succès au planing");
                exit();
            } else {
                redirectwithPost("index.php?action=planning", 1, "Une Erreur est  Survenue lors de l'ajout de L'événement au base de données");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=planning", 0, "Des information necessaire pour le traitement de cette requête sont manquante");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller For Get Information For A specific event From Data Base 
// REQUEST
function editeventController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['event_id']) && !empty($_POST['event_id'])) {
            $event_id = $_POST['event_id'];
            $result = geteventInfromation($event_id);
            echo json_encode($result);
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Update Event From Data Base 
function updateeventactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            isset($_POST['event_title']) && !empty($_POST['event_title'])
            && isset($_POST['start_date']) && !empty($_POST['start_date'])
            && isset($_POST['end_date']) && !empty($_POST['end_date'])
            && isset($_POST['event_id'])  && !empty($_POST['event_id'])
        ) {
            $event_id = $_POST['event_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $event_title = $_POST['event_title'];
            $description = $_POST['description'];
            $color = $_POST['color'];
            $result = updateEvent($event_title, $start_date, $end_date, $event_id, $description, $color);
            if ($result) {
                redirectwithPost("index.php?action=planning", 1, "L'événement sont modifée Avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=planning", 0, "Une erreur est Survenue Lors de la modifcation de l'événement dans la base de données");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=planning", 0, "Des information necessaire pour le traitement de cette requête sont manquante");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function For PrintController 

function printController()
{
    if (isset($_SESSION["admin_id"])) {
        $events = getalleventsfromDatabase();
        require("views/admin/planning/print.php");
    } else {
        echo "Accès non autorisé";
    }
}


// Controller To save Planning in Locale Folder (assets/planning_pdf)
function savefileController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_FILES)) {
            if (file_exists("assets/planning_pdf/planning.pdf")) {
                unlink("assets/planning_pdf/planning.pdf");
            }
            $file_name = explode(".", $_FILES['planning']['name']);
            $file_exetention = $file_name[1];
            $path = "assets/planning_pdf/planning." . $file_exetention;
            move_uploaded_file($_FILES['planning']['tmp_name'], $path);
            redirectwithPost("index.php?action=pdf_planning", 1, "Le planning a été mise à jour avec succès");
            exit();
        } else {
            Redirect("index.php?action=planning");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function Of Controller to Show Planning
function planningviewController()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/planning/planning.php");
    } else {
        echo "Accès non autorisé";
    }
}
//Function To Show Pdf
function pdfplanningController()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/planning/pdfplanning.php");
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
