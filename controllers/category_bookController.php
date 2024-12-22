<?php

require_once "./models/category_bookModel.php";
function show_list_categoryAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $categorie = list_category();
        require_once "views/bibliothecaire/category/category.php";
    } else {
        echo "Accès non autorisé";
    }
}

function add_category_bookAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $cate = $_POST["name_category"];
        if (!empty($cate)) {
            if (add_category_book($cate)) {
                $_SESSION['message'] = "La Catégorie a été ajouté avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de l'insertion de la Catégorie";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Le champ nom de la catégorie est requis";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=category_list");
    } else {
        echo "Accès non autorisé";
    }
}


function delete_category_bookAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $id = $_GET["id"];

        if (delete_category_book($id)) {
            $_SESSION['message'] = "La Catégorie a été supprimé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de la Catégorie";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=category_list");
    } else {
        echo "Accès non autorisé";
    }
}

function show_edit_category_bookAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $id = $_GET["id"];
        $categorie = one_categorie($id);

        require_once "views/bibliothecaire/category/edit_category.php";
    } else {
        echo "Accès non autorisé";
    }
}


function edit_category_bookAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $cate = $_POST["name_category"];
        $id = $_POST["category_id"];

        if (!empty($cate) && !empty($id)) {
            if (edit_book_category($cate, $id)) {
                $_SESSION['message'] = "La Catégorie a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification de la Catégorie";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Le champ nom de la catégorie est requis";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=category_list");
    } else {
        echo "Accès non autorisé";
    }
}

function  show_add_category_book_Controller()
{
    if (isset($_SESSION["biblio_id"])) {
        require_once "views/bibliothecaire/category/add_category.php";
    } else {
        echo "Accès non autorisé";
    }
}
