<?php
require("models/student_list.php");
//Controller Chef Département
function getstudentforspecificdepartementController()
{
    if (isset($_SESSION["chef_id"])) {
        $leader_id = $_SESSION['chef_id'];
        $departement = getdepartement($leader_id);
        $departement_id = $departement['departement_id'];
        $specializations = getallspecializationsforspecificDepartement($departement_id);
        $students = listallstudents($departement_id);
        require("views/chef_departement/student_lists/student_lists.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Filter Students With Specific Conditions Controller 
function filterstudentswithspecificconditionsController()
{
    if (isset($_SESSION["chef_id"])) {
        if (!empty($_POST['class_id'])) {
            $specialization_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $leader_id = $_SESSION['chef_id'];
            $departement = getdepartement($leader_id);
            $departement_id = $departement['departement_id'];
            $specializations = getallspecializationsforspecificDepartement($departement_id);
            $classes = getallclassesforspecificSpecialization($specialization_id);
            $students = getallstudentsforspecificClasse($class_id);
            $classe_name = getnameofclasse($class_id);
            require("views/chef_departement/student_lists/filter_students_head_departement.php");
        } else {
            Redirect("index.php?action=student_list_head_departement");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function Of Controller To GET All Students In Same Specialization [chef filière]
function getstudentforspecificspecializationController()
{
    if (isset($_SESSION["chef_filiere_id"])) {
        $chef_filiere_id = $_SESSION['chef_filiere_id'];
        $specialization = getspecificspecialization($chef_filiere_id);
        $specialization_id = $specialization['specialization_id'];
        $classes = getallclassesforspecificSpecialization($specialization_id);
        $responsable_class = [];
        foreach ($classes as $classe) {
            $responsable_class[] = $classe['responsable_id'];
        }
        $students = getallstudentsinspecificSpecialization($specialization_id);
        require("views/chef_filiere/student_lists/student_lists.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Get All Student For Specific Classe [chefi filière]
function getlisteofstudentinsameclasseController()
{
    if (isset($_SESSION["chef_filiere_id"])) {
        if (!empty($_POST['class_id']) && !empty($_POST['specialization_id'])) {
            $class_id = $_POST['class_id'];
            $specialization_id = $_POST['specialization_id'];
            if ($class_id == "all") {
                getstudentforspecificspecializationController();
                exit();
            } else {
                $classes = getallclassesforspecificSpecialization($specialization_id);
                $responsable_class = [];
                foreach ($classes as $classe) {
                    $responsable_class[] = $classe['responsable_id'];
                }
                $students = selectallstudentinsameclasse($class_id);
                $class_info = getclassInfo($class_id);
                require("views/chef_filiere/student_lists/filter_student.php");
            }
        } else {
            Redirect("index.php?action=chef_emploi_filiere");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
