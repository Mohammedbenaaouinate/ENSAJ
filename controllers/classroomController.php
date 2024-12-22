<?php


require_once "./models/classroomModel.php";

function show_salleAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list_salle = list_salle();
        require_once "views/admin/classroom/salle.php";
    } else {
        echo "Accès non autorisé";
    }
}

function add_salleAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST["name_salle"]) && !empty($_POST["capacity"] && !empty($_POST["bloc"]))) {
            if (add_salle()) {
                $_SESSION['message'] = "La Salle a été ajouté avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de l'insertion de la salle";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=salle");
    } else {
        echo "Accès non autorisé";
    }
}

function delete_salleAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];

        if (delete_salle($id)) {
            $_SESSION['message'] = "La Salle a été supprimé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de la salle";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=salle");
    } else {
        echo "Accès non autorisé";
    }
}

function show_edit_salleAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];

        $salle = select_single_salle($id);
        require_once "views/admin/classroom/edit_salle.php";
    } else {
        echo "Accès non autorisé";
    }
}


function edit_salleAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST["name_salle"]) && !empty($_POST["capacity"] && !empty($_POST["bloc"]))) {
            if (edit_salle()) {
                $_SESSION['message'] = "La salle a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification de la salle";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=salle");
    } else {
        echo "Accès non autorisé";
    }
}


function show_available_salle_adminAction()
{
    if (isset($_SESSION["admin_id"])) {
        $lists_available_classroom = lists_available_classroom();
        $lists_schedule_classroom = lists_available_classroom_schedule();
        require_once "views/admin/classroom/view_salle.php";
    } else {
        echo "Accès non autorisé";
    }
}

function showaddsalleController()
{
    if (isset($_SESSION["admin_id"])) {
        require_once "views/admin/classroom/add_salle.php";
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
