<?php

require_once "./models/schedule_RattModel.php";

function show_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $list_specialisation = list_specialization_ratt();
        $name_department = departement_show_name_exam();
        require_once "views/chef_departement/ratt/schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}

function show_schedule_table_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $class_name = $_GET["classe"];
        $semester = $_GET["semestre"];
        $name_departments = departement_show_name_ratt();
        $view_schedule = view_schedule_ratt($class_name, $semester);
        $name_class = name_class_ratt($class_name);
        require_once "views/chef_departement/ratt/view_schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}
function show_add_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $day = $_GET["day"];
        $hour = $_GET["hour"];
        $semstre = $_GET["semestre"];
        $classe = $_GET["classe"];
        $list_rooms = list_rooms_ratt($classe);
        $list_profs = list_profs_ratt();
        $list_module = list_module_element_for_class($classe);

        $verify = verify_desponibility_ratt($semstre);

        require_once "views/chef_departement/ratt/add_schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}


function add_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $classe = $_POST["classe"];
        $semestre = $_POST["semestre"];
        if (add_schedule_ratt($classe, $semestre)) {
            $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=schedule_table_ratt&classe=" . $classe . "&semestre=" . $semestre);
    } else {
        echo "Accès non autorisé";
    }
}
function show_edit_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $day = $_GET["day"];
        $hour = $_GET["hour"];
        $semstre = $_GET["semestre"];
        $classe = $_GET["classe"];
        $prof = $_GET["prof"];
        $module = $_GET["module"];
        $room = $_GET["room"];
        $id_prof = $_GET["id_prof"];
        $list_rooms = list_rooms_ratt($classe);
        $list_profs = list_profs_ratt();
        $verify = verify_desponibility_ratt($semstre);

        require_once "views/chef_departement/ratt/edit_schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}

function edit_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $day = $_POST["day"];
        $hour = $_POST["hour"];
        $semestre = $_POST["semestre"];
        $classe = $_POST["classe"];
        $prof = $_POST["professeur"];
        $module = $_POST["module"];
        $room = $_POST["salle"];
        if ($classe != "" && $semestre != "" && $module != "Sélectionner le Module/élement" && $prof != "" && $room != "") {
            if (edit_schedule_ratt($classe, $semestre, $day, $hour, $prof, $module, $room)) {
                $_SESSION['message'] = "Le crénau de temps a été modifié avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification de L'emploi de temps";
                $_SESSION['message_type'] = "error";
            }
        }


        header("location:index.php?action=schedule_table_ratt&classe=" . $classe . "&semestre=" . $semestre);
    } else {
        echo "Accès non autorisé";
    }
}



function delete_schedule_rattAction()
{
    if (isset($_SESSION["chef_id"])) {
        $name_classe = $_GET["classe"];
        $semestre = $_GET["semestre"];

        if (delete_schedule_ratt($name_classe, $semestre)) {
            $_SESSION['message'] = "L'emploi de temps la session normale a été vidé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps de la session normale";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=schedule_table_ratt&classe=" . $name_classe . "&semestre=" . $semestre);
    } else {
        echo "Accès non autorisé";
    }
}
