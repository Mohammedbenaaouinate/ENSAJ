<?php

require_once "./models/scheduleModel.php";

function show_scheduleAction()
{
    if (isset($_SESSION["chef_id"])) {
        $list_specialisation = list_specialization();
        $name_department = departement_show_name_exam();

        require_once "views/chef_departement/schedule/schedule.php";
    } else {
        echo "Accès non autorisé";
    }
}

function show_schedule_tableAction()
{
    if (isset($_SESSION["chef_id"])) {
        $class_name = $_GET["classe"];
        $semester = $_GET["semestre"];
        $name_departments = departement_show_name();
        $view_schedule = view_schedule($class_name, $semester);
        $name_class = name_class($class_name);
        require_once "views/chef_departement/schedule/view_schedule.php";
    } else {
        echo "Accès non autorisé";
    }
}
function show_add_scheduleAction()
{
    if (isset($_SESSION["chef_id"])) {
        $day = $_GET["day"];
        $hour = $_GET["hour"];
        $semstre = $_GET["semestre"];
        $classe = $_GET["classe"];
        ////
        $list_rooms = list_rooms($classe);
        $list_profs = list_profs();
        //  $list_modules=list_modules();
        $verify = verify_desponibility($semstre, $classe);

        require_once "views/chef_departement/schedule/add_schedule.php";
    } else {
        echo "Accès non autorisé";
    }
}

function get_list_moduleAction()
{
    $id_prof = $_POST["prof_id"];
    $module = list_module_element($id_prof);
    echo json_encode($module);
}
function add_scheduleAction()
{
    if (isset($_SESSION["chef_id"])) {
        $classe = $_POST["classe"];
        $semestre = $_POST["semestre"];
        if (add_schedule($classe, $semestre)) {
            $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=schedule_table&classe=" . $classe . "&semestre=" . $semestre);
    } else {
        echo "Accès non autorisé";
    }
}

// function list_scheduleAction(){
//     $list_schedule=list_schedule();
//     require_once "views/admin/schedule/List.php";
// }

// function view_scheduleAction(){
//     $id=$_GET["id"];
//     $view_schedule=view_schedule($id);
//     $name_class=name_class($id);
//     require_once "views/admin/schedule/view_schedule.php";

// }
function delete_scheduleAction()
{
    if (isset($_SESSION["chef_id"])) {
        $classe = $_GET["classe"];
        $semestre = $_GET["semestre"];
        if (delete_schedule($classe, $semestre)) {
            $_SESSION['message'] = "L'emploi de temps a été vidé avec succés";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps";
            $_SESSION['message_type'] = "error";
        }
        header("location:index.php?action=schedule_table&classe=" . $classe . "&semestre=" . $semestre);
    } else {
        echo "Accès non autorisé";
    }
}
