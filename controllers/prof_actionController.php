<?php


require_once "./models/prof_actionModel.php";
function show_dashboard_prof()
{
   if (isset($_SESSION["prof_id"])) {
      $lists_course = list_course_prof();
      $list_number = list_number_student_prof();
      require_once "views/professeur/dashboard/dashboard_prof.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $list_shown = list_of_shown_prof_schedule();
      require_once "views/professeur/action_reste/my_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_prof_scheduleAction()
{
   if (isset($_SESSION["prof_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_prof_schedule($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/professeur/action_reste/my_view_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_schedule_prof_rattAction()
{
   if (isset($_SESSION["prof_id"])) {
      $list_shown = list_of_shown_prof_schedule_ratt();
      require_once "views/professeur/action_reste/my_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_prof_schedule_rattAction()
{
   if (isset($_SESSION["prof_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_prof_schedule_ratt($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/professeur/action_reste/my_view_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_prof_normalAction()
{
   if (isset($_SESSION["prof_id"])) {
      $list_shown = list_of_shown_prof_schedule_normal();
      require_once "views/professeur/action_reste/my_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_prof_schedule_normalAction()
{
   if (isset($_SESSION["prof_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_prof_schedule_normal($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/professeur/action_reste/my_view_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}
// //course
function show_course_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $lists_courses = lists_courses_prof();
      require_once "views/professeur/cour/cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_add_cour_prof_Action()
{
   if (isset($_SESSION["prof_id"])) {
      $list_modul_element = lists_of_modul_element_prof();
      $lists_classes = list_schedule_class_prof();
      $lists_semester = list_schedule_semestre_prof();
      require_once "views/professeur/cour/add_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}
function add_cour_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];

      $status = $_POST["status"];
      if (isset($_POST["btnadd_cour"])) {
         if ($class != "Séléctionner la classe" && $semestre != "Séléctionner la semestre" && !empty($name_cour) && $module != "Séléctionner le Module/élément" && $status != "Séléctionner la Visibilité de cour" &&  $_FILES["file_cour"]["name"] != "") {
            if ($_FILES["file_cour"]["size"] != 0) {
               if (add_course_prof($class, $semestre, $name_cour, $module, $status)) {
                  $_SESSION['message'] = "Le cour a été ajouté avec succès";
                  $_SESSION['message_type'] = "success";
                  header("location:index.php?action=upload_cour_prof");
               } else {

                  $_SESSION['message'] = "Error lors de l'insertion de cour!";
                  $_SESSION['message_type'] = "error";
                  header("location:index.php?action=show_add_prof_cour");
               }
            } else {
               $_SESSION['message'] = "Vous avez séléctionner un fichier vide!";
               $_SESSION['message_type'] = "error";

               header("location:index.php?action=show_add_prof_cour");
            }
         } else {
            $_SESSION['message'] = "Vous devez remplir les champs obligatoire!";
            $_SESSION['message_type'] = "error";
            header("location:index.php?action=show_add_prof_cour");
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}

function delete_cour_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $id_cour = $_GET["course_id"];
      if (delete_course_prof($id_cour)) {
         $_SESSION['message'] = "Le cour a été supprimé avec succès";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Error lors de la suppression de cour!";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=upload_cour_prof");
   } else {
      echo "Accès non autorisé";
   }
}
function show_edit_cour_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $id_cour = $_GET["course_id"];
      $list_modul_element = lists_of_modul_element_prof();
      $lists_classes = list_schedule_class_prof();
      $lists_semester = list_schedule_semestre_prof();
      $one_course = lists_single_course_prof($id_cour);
      require_once "views/professeur/cour/edit_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function edit_cour_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];
      $course_id = $_POST["course_id"];
      $status = $_POST["status"];
      if (isset($_POST["btnedit_cour"])) {
         if ($class != "" && $semestre != "" && !empty($name_cour) && $module != "" && $status != "") {
            if (edit_course_prof($class, $semestre, $name_cour, $module, $status, $course_id)) {
               $_SESSION['message'] = "Le cour a été modifié avec succès";
               $_SESSION['message_type'] = "success";
               header("location:index.php?action=upload_cour_prof");
            } else {

               $_SESSION['message'] = "Error lors de la modification de cour!";
               $_SESSION['message_type'] = "error";
               header("location:index.php?action=show_edit_course_prof");
            }
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}


function show_lists_professeur_of_profAction()
{
   if (isset($_SESSION["prof_id"])) {
      $lists_professor = lists_all_professor();
      require_once "views/professeur/professeur/professor.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_planning_prof()
{
   if (isset($_SESSION["prof_id"])) {
      require_once "views/professeur/planning_annuel/planning.php";
   } else {
      echo "Accès non autorisé";
   }
}

// Function OF Controller to Show All Classes
function showmyclasssesController()
{
   if (isset($_SESSION["prof_id"])) {
      $prof_id = $_SESSION['prof_id'];
      $classes = showmyclassses($prof_id);
      require("views/professeur/student_list/student_classes.php");
   } else {
      echo "Accès non autorisé";
   }
}
// Function To GET all Students in the Same Classes

function getallstudentsinsameclassesController()
{
   if (isset($_SESSION["prof_id"])) {
      if (!empty($_POST['class_id'])) {
         $class_id = $_POST['class_id'];
         $students = getallstudentsinsameClasse($class_id);
         require("views/professeur/student_list/all_student_list.php");
      } else {
         Redirect("index.php?action=student_classes");
         exit();
      }
   } else {
      echo "Accès non autorisé";
   }
}
