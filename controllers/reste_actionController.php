<?php


require_once "./models/reste_actionModel.php";

function show_schedule_chefAction()
{
   if (isset($_SESSION["chef_id"])) {
      $list_shown = list_of_shown_schedule();

      require_once "views/chef_departement/action_reste/my_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_scheduleAction()
{
   if (isset($_SESSION["chef_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name();
      $view_schedule = view_my_schedule($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_departement/action_reste/my_view_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_schedule_chef_rattAction()
{
   if (isset($_SESSION["chef_id"])) {
      $list_shown = list_of_shown_schedule_ratt();
      require_once "views/chef_departement/action_reste/my_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_schedule_rattAction()
{
   if (isset($_SESSION["chef_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name();
      $view_schedule = view_my_schedule_ratt($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_departement/action_reste/my_view_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_chef_normalAction()
{
   if (isset($_SESSION["chef_id"])) {
      $list_shown = list_of_shown_schedule_normal();

      require_once "views/chef_departement/action_reste/my_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_schedule_normalAction()
{
   if (isset($_SESSION["chef_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name();
      $view_schedule = view_my_schedule_normal($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_departement/action_reste/my_view_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}
//course
function show_courseAction()
{
   if (isset($_SESSION["chef_id"])) {
      $lists_courses = lists_courses();
      require_once "views/chef_departement/cour/cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_add_courAction()
{
   if (isset($_SESSION["chef_id"])) {
      $list_modul_element = lists_of_modul_element();
      $lists_classes = list_schedule_class();
      $lists_semester = list_schedule_semestre();
      require_once "views/chef_departement/cour/add_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}
function add_courAction()
{
   if (isset($_SESSION["chef_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];

      $status = $_POST["status"];
      if (isset($_POST["btnadd_cour"])) {
         if ($class != "Séléctionner la classe" && $semestre != "Séléctionner la semestre" && !empty($name_cour) && $module != "Séléctionner le Module/élément" && $status != "Séléctionner la Visibilité de cour" &&  $_FILES["file_cour"]["name"] != "") {
            if ($_FILES["file_cour"]["size"] != 0) {
               if (add_course($class, $semestre, $name_cour, $module, $status)) {
                  $_SESSION['message'] = "Le cour a été ajouté avec succès";
                  $_SESSION['message_type'] = "success";
                  header("location:index.php?action=upload_cour");
               } else {

                  $_SESSION['message'] = "Error lors de l'insertion de cour!";
                  $_SESSION['message_type'] = "error";
                  header("location:index.php?action=show_add_cour");
               }
            } else {
               $_SESSION['message'] = "Vous avez séléctionner un fichier vide!";
               $_SESSION['message_type'] = "error";

               header("location:index.php?action=show_add_cour");
            }
         } else {
            $_SESSION['message'] = "Vous devez remplir les champs obligatoire!";
            $_SESSION['message_type'] = "error";
            header("location:index.php?action=show_add_cour");
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}

function delete_courAction()
{
   if (isset($_SESSION["chef_id"])) {
      $id_cour = $_GET["course_id"];
      if (delete_course($id_cour)) {
         $_SESSION['message'] = "Le cour a été supprimé avec succès";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Error lors de la suppression de cour!";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=upload_cour");
   } else {
      echo "Accès non autorisé";
   }
}
function show_edit_courAction()
{
   if (isset($_SESSION["chef_id"])) {
      $id_cour = $_GET["course_id"];
      $list_modul_element = lists_of_modul_element();
      $lists_classes = list_schedule_class();
      $lists_semester = list_schedule_semestre();

      $one_course = lists_single_course($id_cour);
      require_once "views/chef_departement/cour/edit_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function edit_courAction()
{
   if (isset($_SESSION["chef_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];
      $course_id = $_POST["course_id"];
      $status = $_POST["status"];
      if (isset($_POST["btnedit_cour"])) {
         if ($class != "" && $semestre != "" && !empty($name_cour) && $module != "" && $status != "") {
            if (edit_course($class, $semestre, $name_cour, $module, $status, $course_id)) {
               $_SESSION['message'] = "Le cour a été modifié avec succès";
               $_SESSION['message_type'] = "success";
               header("location:index.php?action=upload_cour");
            } else {

               $_SESSION['message'] = "Error lors de la modification de cour!";
               $_SESSION['message_type'] = "error";
               header("location:index.php?action=show_edit_course");
            }
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}

function show_available_salleAction()
{
   if (isset($_SESSION["chef_id"])) {
      $lists_available_classroom = lists_available_classroom();
      $lists_schedule_classroom = lists_available_classroom_schedule();
      require_once "views/chef_departement/available_classroom/view_salle.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_lists_professeurAction()
{
   if (isset($_SESSION["chef_id"])) {
      $lists_professor = lists_all_professor();
      require_once "views/chef_departement/professeur/professor.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_planning_chef()
{
   if (isset($_SESSION["chef_id"])) {
      require_once "views/chef_departement/planning_annuel/planning.php";
   } else {
      echo "Accès non autorisé";
   }
}
