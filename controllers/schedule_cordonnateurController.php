<?php

require_once "./models/schedule_cordonnateurModel.php";
function show_dashboard_chef_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $lists_course = list_course_filiere();
      $lists_number_student_chef = lists_classes_chef_filiere();
      require_once "views/chef_filiere/dashboard/dashboard_chef.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_schedule_chef_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_specialisation = list_specialization_chef_filiere();

      require_once "views/chef_filiere/schedule/schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_table_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name_filiere();
      $view_schedule = view_schedule_filiere($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_filiere/schedule/view_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_add_schedule_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      ////
      $list_rooms = list_rooms($classe);
      $list_profs = list_profs();
      //  $list_modules=list_modules();
      $verify = verify_desponibility($semstre, $classe);

      require_once "views/chef_filiere/schedule/add_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}


function add_schedule_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=schedule_table_filiere&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

// // function list_scheduleAction(){
// //     $list_schedule=list_schedule();
// //     require_once "views/admin/schedule/List.php";
// // }

// // function view_scheduleAction(){
// //     $id=$_GET["id"];
// //     $view_schedule=view_schedule($id);
// //     $name_class=name_class($id);
// //     require_once "views/admin/schedule/view_schedule.php";

// // }
function delete_schedule_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule($classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=schedule_table_filiere&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function show_schedule_exam_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_specialisation = list_specialization_chef_filiere();
      require_once "views/chef_filiere/exam/schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_table_normal_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name_filiere();
      $view_schedule = view_schedule_exam_filiere($class_name, $semester);
      $name_class = name_class_exam($class_name);
      require_once "views/chef_filiere/exam/view_schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_add_schedule_exam_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      $list_rooms = list_rooms_exam($classe);
      $list_profs = list_profs_exam();

      $list_module = list_module_element_for_class($classe);

      $verify = verify_desponibility_exam($semstre);

      require_once "views/chef_filiere/exam/add_schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}


function add_schedule_exam_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule_exam($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=schedule_table_normal_filiere&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}



function delete_schedule_normal_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $name_classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule_normal($name_classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps de la session normale a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps de la session normale";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=schedule_table_normal_filiere&classe=" . $name_classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function show_schedule_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_specialisation = list_specialization_chef_filiere();

      require_once "views/chef_filiere/ratt/schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_table_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name_filiere();
      $view_schedule = view_schedule_ratt_filiere($class_name, $semester);
      $name_class = name_class_ratt($class_name);
      require_once "views/chef_filiere/ratt/view_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_add_schedule_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      $list_rooms = list_rooms_ratt($classe);
      $list_profs = list_profs_ratt();
      $list_module = list_module_element_for_class($classe);

      $verify = verify_desponibility_ratt($semstre);

      require_once "views/chef_filiere/ratt/add_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}


function add_schedule_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule_ratt($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=schedule_table_ratt_filiere&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}




function delete_schedule_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $name_classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule_ratt($name_classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps la session normale a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps de la session normale";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=schedule_table_ratt_filiere&classe=" . $name_classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function show_schedule_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_shown = list_of_shown_schedule_filiere();

      require_once "views/chef_filiere/action_reste/my_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_schedule_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name();
      $view_schedule = view_my_schedule_filiere($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_filiere/action_reste/my_view_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}
function show_schedule_filiere_normalAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_shown = list_of_shown_schedule_normal_filiere();
      require_once "views/chef_filiere/action_reste/my_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_schedule_normal_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name_filiere();
      $view_schedule = view_my_schedule_normal_filiere($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_filiere/action_reste/my_view_schedule_normal.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_schedule_filiere_rattAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_shown = list_of_shown_schedule_ratt_filiere();

      require_once "views/chef_filiere/action_reste/my_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_my_schedule_ratt_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $name_departments = departement_show_name_filiere();
      $view_schedule = view_my_schedule_ratt_filiere($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/chef_filiere/action_reste/my_view_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//course
function show_course_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $lists_courses = lists_courses_filiere();
      require_once "views/chef_filiere/cour/cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_add_cour_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $list_modul_element = lists_of_modul_element_filiere();
      $lists_classes = list_schedule_class_filiere();
      $lists_semester = list_schedule_semestre_filiere();
      require_once "views/chef_filiere/cour/add_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}
function add_cour_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];

      $status = $_POST["status"];
      if (isset($_POST["btnadd_cour"])) {
         if ($class != "Séléctionner la classe" && $semestre != "Séléctionner la semestre" && !empty($name_cour) && $module != "Séléctionner le Module/élément" && $status != "Séléctionner la Visibilité de cour" &&  $_FILES["file_cour"]["name"] != "") {
            if ($_FILES["file_cour"]["size"] != 0) {
               if (add_course_filiere($class, $semestre, $name_cour, $module, $status)) {
                  $_SESSION['message'] = "Le cour a été ajouté avec succès";
                  $_SESSION['message_type'] = "success";
                  header("location:index.php?action=upload_cour_filiere");
               } else {

                  $_SESSION['message'] = "Error lors de l'insertion de cour!";
                  $_SESSION['message_type'] = "error";
                  header("location:index.php?action=show_add_cour_filiere");
               }
            } else {
               $_SESSION['message'] = "Vous avez séléctionner un fichier vide!";
               $_SESSION['message_type'] = "error";

               header("location:index.php?action=show_add_cour_filiere");
            }
         } else {
            $_SESSION['message'] = "Vous devez remplir les champs obligatoire!";
            $_SESSION['message_type'] = "error";
            header("location:index.php?action=show_add_cour_filiere");
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}

function delete_cour_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $id_cour = $_GET["course_id"];
      if (delete_course($id_cour)) {
         $_SESSION['message'] = "Le cour a été supprimé avec succès";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Error lors de la suppression de cour!";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=upload_cour_filiere");
   } else {
      echo "Accès non autorisé";
   }
}
function show_edit_cour_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $id_cour = $_GET["course_id"];
      $list_modul_element = lists_of_modul_element_filiere();
      $lists_classes = list_schedule_class_filiere();
      $lists_semester = list_schedule_semestre_filiere();

      $one_course = lists_single_course($id_cour);
      require_once "views/chef_filiere/cour/edit_cour.php";
   } else {
      echo "Accès non autorisé";
   }
}

function edit_cour_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $class = $_POST["classe"];
      $semestre = $_POST["semestre"];
      $name_cour = $_POST["name_cour"];
      $module = $_POST["module"];
      $course_id = $_POST["course_id"];
      $status = $_POST["status"];
      if (isset($_POST["btnedit_cour"])) {
         if ($class != "" && $semestre != "" && !empty($name_cour) && $module != "" && $status != "") {
            if (edit_course_filiere($class, $semestre, $name_cour, $module, $status, $course_id)) {
               $_SESSION['message'] = "Le cour a été modifié avec succès";
               $_SESSION['message_type'] = "success";
               header("location:index.php?action=upload_cour_filiere");
            } else {

               $_SESSION['message'] = "Error lors de la modification de cour!";
               $_SESSION['message_type'] = "error";
               header("location:index.php?action=show_edit_course_filiere");
            }
         }
      }
   } else {
      echo "Accès non autorisé";
   }
}

function show_available_salle_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $lists_available_classroom = lists_available_classroom();
      $lists_schedule_classroom = lists_available_classroom_schedule();
      require_once "views/chef_filiere/available_classroom/view_salle.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_lists_professeur_filiereAction()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      $lists_professor = lists_all_professor();
      require_once "views/chef_filiere/professeur/professor.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_planning_filiere()
{
   if (isset($_SESSION["chef_filiere_id"])) {
      require_once "views/chef_filiere/planning_annuel/planning.php";
   } else {
      echo "Accès non autorisé";
   }
}
