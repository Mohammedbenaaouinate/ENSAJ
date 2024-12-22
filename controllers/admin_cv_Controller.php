<?php
require_once("models/admin_cv.php");
// Function Of Controller  To GET All Students information
function getallstudentsinfoController()
{
    if (isset($_SESSION["admin_id"])) {
        $specializations = obtainallspecialization();
        $students = getallstudentsinfo();
        require("views/admin/list_cv/cv_students.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function To Filter Student Selon La classe ID

function filterstudentscvController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['field_id']) && !empty($_POST['class_id'])) {
            $field_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $class_info = obtainclasseInfo($class_id);
            $class_name = $class_info['class_name'];
            $specializations = obtainallspecialization();
            $classes = obtainclassesforspecificSpecilization($field_id);
            $students = obtainstudentsforspecificClasse($class_id);
            require("views/admin/list_cv/cv_students_filtrer.php");
        } else {
            Redirect("index.php?action=cv_list");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
