<?php

require_once "./models/departementModel.php";
function show_departementAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list = list_departement();
        require_once "views/admin/departement/departments.php";
    } else {
        echo "Accès non autorisé";
    }
}
function show_add_departementAction()
{
    if (isset($_SESSION["admin_id"])) {
        require_once "views/admin/departement/add-department.php";
    } else {
        echo "Accès non autorisé";
    }
}
function add_departementAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST["short_name"]) && !empty($_POST["departement_name"]) && !empty($_POST["description"])) {
            if (add_department()) {
                $_SESSION['message'] = "Le Département a été ajouté avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur d'insertion";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=departement");
    } else {
        echo "Accès non autorisé";
    }
}

function delete_departementAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        if (delete_department($id)) {
            $_SESSION['message'] = "Le Département a été supprimé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de département";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=departement");
    } else {
        echo "Accès non autorisé";
    }
}

function show_edit_departementAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        $all_dep = select_professor();
        $dep = select_single_department($id);
        require_once "views/admin/departement/edit-department.php";
    } else {
        echo "Accès non autorisé";
    }
}
function edit_departmentAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST["short_name"]) && !empty($_POST["departement_name"]) && !empty($_POST["departement_leader"]) && !empty($_POST["description"])) {
            if (edit_department()) {
                $_SESSION['message'] = "Le Département a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=departement");
    } else {
        echo "Accès non autorisé";
    }
}
