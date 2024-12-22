<?php


require_once "./models/schedule_adminModel.php";

function list_scheduleAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list_schedule = list_schedule_admin();
        require_once "views/admin/schedule/List.php";
    } else {
        echo "Accès non autorisé";
    }
}

function view_schedule_adminAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        $view_schedule = view_schedule_admin($id);
        $name_class = name_class_admin($id);
        require_once "views/admin/schedule/view_schedule.php";
    } else {
        echo "Accès non autorisé";
    }
}

function list_schedule_admin_normalAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list_schedule_normal = list_schedule_admin_normal();
        require_once "views/admin/schedule/List_normal.php";
    } else {
        echo "Accès non autorisé";
    }
}

function view_schedule_admin_normalAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        $view_schedule_normal = view_schedule_admin_normal($id);
        $name_class = name_class_admin($id);
        require_once "views/admin/schedule/view_schedule_normal.php";
    } else {
        echo "Accès non autorisé";
    }
}

function list_schedule_admin_rattAction()
{
    if (isset($_SESSION["admin_id"])) {
        $list_schedule_ratt = list_schedule_admin_ratt();
        require_once "views/admin/schedule/List_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}

function view_schedule_admin_rattAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_GET["id"];
        $view_schedule_ratt = view_schedule_admin_ratt($id);
        $name_class = name_class_admin($id);
        require_once "views/admin/schedule/view_schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function list_specializations_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $list_specialisation = list_specializations_for_admin();

      require_once "views/admin/manageschedule/schedule/schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_view_schedule_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_schedule_filiere($class_name, $semester);
      $name_class = name_class($class_name);
      require_once "views/admin/manageschedule/schedule/view_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_add_schedule_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      ////
      $list_rooms = list_rooms($classe);
      $list_profs = list_profs();
      //  $list_modules=list_modules();
      $verify = verify_desponibility($semstre, $classe);

      require_once "views/admin/manageschedule/schedule/add_schedule.php";
   } else {
      echo "Accès non autorisé";
   }
}

function insert_schedule_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=show_view_schedule_for_admin&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

function delete_schedule_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule($classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=show_view_schedule_for_admin&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function schedule_admin_classes_examAction()
{
   if (isset($_SESSION["admin_id"])) {
      $list_specialisation = list_specializations_for_admin();
      require_once "views/admin/manageschedule/exam/schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_view_schedule_for_admin_examAction()
{
   if (isset($_SESSION["admin_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_schedule_exam_admin($class_name, $semester);
      $name_class = name_class_exam($class_name);
      require_once "views/admin/manageschedule/exam/view_schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}


function show_add_schedule_exam_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      $list_rooms = list_rooms_exam($classe);
      $list_profs = list_profs_exam();

      $list_module = list_module_element_for_class($classe);

      $verify = verify_desponibility_exam($semstre);

      require_once "views/admin/manageschedule/exam/add_schedule_exam.php";
   } else {
      echo "Accès non autorisé";
   }
}


function add_schedule_exam_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule_exam($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=show_view_schedule_for_admin_exam&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

function delete_schedule_normal_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $name_classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule_normal($name_classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps de la session normale a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps de la session normale";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=show_view_schedule_for_admin_exam&classe=" . $name_classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function schedule_admin_classes_rattAction()
{
   if (isset($_SESSION["admin_id"])) {
      $list_specialisation = list_specializations_for_admin();

      require_once "views/admin/manageschedule/ratt/schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_view_schedule_for_admin_rattAction()
{
   if (isset($_SESSION["admin_id"])) {
      $class_name = $_GET["classe"];
      $semester = $_GET["semestre"];
      $view_schedule = view_schedule_ratt_admin($class_name, $semester);
      $name_class = name_class_ratt($class_name);
      require_once "views/admin/manageschedule/ratt/view_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}

function show_add_schedule_ratt_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $day = $_GET["day"];
      $hour = $_GET["hour"];
      $semstre = $_GET["semestre"];
      $classe = $_GET["classe"];
      $list_rooms = list_rooms_ratt($classe);
      $list_profs = list_profs_ratt();
      $list_module = list_module_element_for_class($classe);

      $verify = verify_desponibility_ratt($semstre);

      require_once "views/admin/manageschedule/ratt/add_schedule_ratt.php";
   } else {
      echo "Accès non autorisé";
   }
}


function add_schedule_ratt_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $classe = $_POST["classe"];
      $semestre = $_POST["semestre"];
      if (add_schedule_ratt($classe, $semestre)) {
         $_SESSION['message'] = "Le crénau de temps a été ajouté avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de l'ajout de L'emploi de temps";
         $_SESSION['message_type'] = "error";
      }

      header("location:index.php?action=show_view_schedule_for_admin_ratt&classe=" . $classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}

function delete_schedule_ratt_for_adminAction()
{
   if (isset($_SESSION["admin_id"])) {
      $name_classe = $_GET["classe"];
      $semestre = $_GET["semestre"];

      if (delete_schedule_ratt($name_classe, $semestre)) {
         $_SESSION['message'] = "L'emploi de temps la session normale a été vidé avec succés";
         $_SESSION['message_type'] = "success";
      } else {
         $_SESSION['message'] = "Erreur lors de la suppression de L'emploi de temps de la session normale";
         $_SESSION['message_type'] = "error";
      }
      header("location:index.php?action=show_view_schedule_for_admin_ratt&classe=" . $name_classe . "&semestre=" . $semestre);
   } else {
      echo "Accès non autorisé";
   }
}