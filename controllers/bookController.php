<?php

require_once "./models/bookModel.php";
function show_add_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $categories = list_category_book();
        require_once("views/bibliothecaire/book/add_book.php");
    } else {
        echo "Accès non autorisé";
    }
}
function add_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $name_book = $_POST["name_book"];
        $quantity = $_POST["quantity"];
        $isbn = $_POST["isbn"];
        $description = $_POST["description"]; //image_book
        $category = $_POST["category"];
        $author=$_POST["author"];
        // echo $name_book."|".$quantity ."|".$_FILES["image_book"]["name"];
        $image_name = $_FILES["image_book"]["name"];
        $image_size = $_FILES["image_book"]["size"];

        if (isset($_POST["btnadd_book"])) {
            if (!empty($name_book) && !empty($quantity) && !empty($isbn) && !empty($description) && !empty($image_name) && !empty($category) && !empty($author)) {
                if ($image_size != 0) {
                    if (add_book($name_book, $quantity, $isbn, $description, $image_name, $category,$author)) {
                        $_SESSION['message'] = "Le Bouquin a été ajouté avec succés";
                        $_SESSION['message_type'] = "success";
                    } else {
                        $_SESSION['message'] = "Erreur lors de l'insertion de Bouquin";
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Vous devez choisir une image non vide";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Tous les champs sont requis";
                $_SESSION['message_type'] = "error";
            }
        }


        header("location:index.php?action=show_all_book");
    } else {
        echo "Accès non autorisé";
    }
}
function all_book_Action($arg)
{
    if (isset($_SESSION["biblio_id"])) {
        $categories = list_category_book();

        if ($arg == "search") {
            if (isset($_POST["search"])) {
                $name = $_POST["name"];
                $isbn = $_POST["isbn"];
                $cate = $_POST["category"];
                if (!empty($name) || !empty($isbn) || $cate != "Rechercher par la catégorie de bouquin") {

                    if ($all_book = search_book($name, $isbn, $cate)) {
                    } else {
                        $_SESSION['message'] = "Le bouquin n'existe pas";
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    header("location:index.php?action=show_all_book");
                }
            }
        } else {
            $all_book = list_all_book();
        }
        require_once("views/bibliothecaire/book/book.php");
    } else {
        echo "Accès non autorisé";
    }
}

function delete_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $id = $_GET["id"];

        if (delete_book($id)) {
            $_SESSION['message'] = "Le Bouquin a été supprimé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de bouquin";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=show_all_book");
    } else {
        echo "Accès non autorisé";
    }
}

function show_edit_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $id = $_GET["id"];
        $categories = list_category_book();
        $select_single_book = select_single_book($id);
        require_once("views/bibliothecaire/book/edit_book.php");
    } else {
        echo "Accès non autorisé";
    }
}

function edit_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $name_book = $_POST["name_book"];
        $quantity = $_POST["quantity"];
        $isbn = $_POST["isbn"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $author=$_POST["author"];
        $id = $_POST["id"];

        if (!empty($name_book) && !empty($isbn) && !empty($quantity) && !empty($description) && !empty($id) && !empty($category) && !empty($author)) {
            if (edit_book($id, $name_book, $quantity, $isbn, $description, $category,$author)) {
                $_SESSION['message'] = "Le bouquin a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification de bouquin";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Tous les champs sont requis";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=show_all_book");
    } else {
        echo "Accès non autorisé";
    }
}
function all_request_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $message_for_inform_biblio=list_message_for_one_book();
        $request = list_request();
        require_once("views/bibliothecaire/request/list.php");
    } else {
        echo "Accès non autorisé";
    }
}


function accept_request_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $student_id = $_GET["etudiant_id"];
        $book_id = $_GET["book_id"];
        $date = $_GET["date_retour"];

        if (accept_request($student_id, $book_id, $date)) {
            $_SESSION['message'] = "La demande a été accepté avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de l'acceptation du demande";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=list_request");
    } else {
        echo "Accès non autorisé";
    }
}
function refuse_request_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $student_id = $_POST["student"];
        $book_id = $_POST["book"];
        $date = $_POST["date_retour"];
        $message = $_POST["message"];
        if (!empty($message)) {
            if (refuse_request($student_id, $book_id, $date, $message)) {
                $_SESSION['message'] = "La demande a été rejeté avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la rejet du demande";
                $_SESSION['message_type'] = "error";
            }
        }

        header("location:index.php?action=list_request");
    } else {
        echo "Accès non autorisé";
    }
}

function all_accepted_book_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $accept = list_accept();
        require_once("views/bibliothecaire/request/book_taken.php");
    } else {
        echo "Accès non autorisé";
    }
}

function book_returned_Action()
{
    if (isset($_SESSION["biblio_id"])) {
        $book_id = $_GET["book_id"];
        $etudiant = $_GET["etudiant"];
        $date = $_GET["date"];
        book_returned($book_id, $etudiant, $date);
        header("location:index.php?action=taken_book");
    } else {
        echo "Accès non autorisé";
    }
}

function available_book_Action($arg)
{
    if (isset($_SESSION["biblio_id"])) {
        $categories = list_category_book();
        if ($arg == "search") {
            if (isset($_POST["search"])) {
                $name = $_POST["name"];
                $isbn = $_POST["isbn"];
                $cate = $_POST["category"];
                if (!empty($name) || !empty($isbn) || $cate != "Rechercher par la catégorie de bouquin") {
                    if ($all_book = search_book($name, $isbn, $cate)) {
                    } else {
                        $_SESSION['message'] = "Le bouquin n'existe pas";
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    header("location:index.php?action=book_available");
                }
            }
        } else {
            $all_book = list_all_book();
        }
        require_once("views/bibliothecaire/book/availabal_book.php");
    } else {
        echo "Accès non autorisé";
    }
}

function lists_student_rejectAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $list = list_student_reject();
        require_once("views/bibliothecaire/request/list_reject.php");
    } else {
        echo "Accès non autorisé";
    }
}
