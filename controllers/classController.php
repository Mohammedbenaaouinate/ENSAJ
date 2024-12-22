<?php
require_once "./models/classModel.php";
function show_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list = list_class();
        require_once "views/admin/class/class.php";
    } else {
        echo "Accès non autorisé";
    }
}
function show_add_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        $field = select_specialization();
        require_once "views/admin/class/add_class.php";
    } else {
        echo "Accès non autorisé";
    }
}
function add_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        $class = $_POST["classe"];
        $ann = $_POST["annee"];
        if ($class != "Séléctionner la Classe" && $ann != "Séléctionner Niveau de la classe") {
            if (add_class()) {
                $_SESSION['message'] = "La Classe a été ajouté avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de l'insertion de la classe";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=class");
    } else {
        echo "Accès non autorisé";
    }
}

function delete_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        if (delete_class($id)) {
            $_SESSION['message'] = "La Classe a été supprimé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de la classe";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=class");
    } else {
        echo "Accès non autorisé";
    }
}

function show_edit_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        $all_class = select_specialization();
        $class = verify_selection($id);
        $student_of_this_classe = student_of_this_classe($id);
        require_once "views/admin/class/edit_class.php";
    } else {
        echo "Accès non autorisé";
    }
}

function edit_classAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST["classe"]) && !empty($_POST["annee"]) && !empty($_POST["id"])) {
            if (edit_class()) {
                $_SESSION['message'] = "La classe a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification de la classe";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=class");
    } else {
        echo "Accès non autorisé";
    }
}
