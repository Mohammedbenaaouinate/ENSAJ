<?php
require_once("models/newstudentclasseModel.php");
function changeclasseofstudentController()
{
    if (isset($_SESSION["admin_id"])) {
        if ($_FILES['list_student']['size'] != 0) {
            $file_type = $_FILES['list_student']['type'];
            $extention_exploded = explode("/", $file_type);
            $extention = strtolower(end($extention_exploded));
            $tmp_name = $_FILES['list_student']['tmp_name'];
            if ($extention == "csv") {
                $start_row = 1;
                $all_student = [];
                if (($csv_file = fopen($tmp_name, "r")) !== FALSE) {
                    while (($read_data = fgetcsv($csv_file, null, ",")) !== FALSE) {
                        $column_count = count($read_data);
                        if ($start_row == 1) {
                            $start_row++;
                            continue;
                        }
                        if (
                            !isset($read_data[0]) || !isset($read_data[1])
                            || !isset($read_data[2]) || !isset($read_data[3])
                            || !isset($read_data[4]) || !isset($read_data[5])
                        ) {
                            redirectwithPost("index.php?action=student_status", 0, "Une erreur de format du fichier CSV sélectionné.");
                            break;
                            exit();
                        }
                        $first_name = $read_data[0];
                        $last_name = $read_data[1];
                        $massar = $read_data[2];
                        $apogee = $read_data[3];
                        $classe = $read_data[4];
                        $decision = $read_data[5];
                        if ($decision == "ADM") {
                            $full_classe_name = explode("-", $classe);
                            $class_name = $full_classe_name[0];
                            $class_year = $full_classe_name[1];
                            $new_classe_name = $class_name;
                            $new_classe_year = (int)$class_year + 1;
                            $new_classe_full_name = $new_classe_name . "-" . $new_classe_year;
                            $class_info = getnewclassInfo($new_classe_full_name);
                            $new_class_id = $class_info['class_id'];
                            if (empty($new_class_id)) {
                                redirectwithPost("index.php?action=student_status", 0, "Une erreur dans la classe de l'année suivante d'un des étudiants : vérifier si la classe existe.");
                                break;
                                exit();
                            }
                            $student = ["firstname" => $first_name, "lastname" => $last_name, "massar_student" => $massar, "student_apoge" => $apogee, "class_id" => $new_class_id];
                            $all_student[] = $student;
                        }
                    }
                    fclose($csv_file);
                }
                $result = updatestudentclasseattheendofyear($all_student);
                if ($result) {
                    redirectwithPost("index.php?action=student_status", 1, "La modification de la classe des étudiants a été effectuée avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=student_status", 0, "Une erreur est survenue lors de la modification de la classe des étudiants.");
                    exit();
                }
            } else {
                redirectwithPost("index.php?action=student_status", 0, "L'extension du fichier doit être CSV.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=student_status", 0, "Le fichier est vide.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Second Year Student View
function secondyearstudentviewController()
{
    if (isset($_SESSION["admin_id"])) {
        $class_id = "";
        $second_year = getsecondyearclassInfo();
        if (!empty($second_year)) {
            $class_id = $second_year['class_id'];
        }
        if (empty($class_id)) {
            redirectwithPost("index.php?action=student_status", 0, "Il n'existe aucune classe CP-2.");
            exit();
        }
        $students = getallsecondyearstudents($class_id);
        $classes = getallfirstyearClasses();
        require("views/admin/newyear/second_year_students.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To change the Second Year Of Stadies
function changemycurrentclasseController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['class_id']) && !empty($_POST['student_id'])) {
            $student_id = $_POST['student_id'];
            $new_class_id = $_POST['class_id'];
            $result = updatethestudentClasse($student_id, $new_class_id);
            if ($result) {
                redirectwithPost("index.php?action=second_year_student", 1, "La classe de l'étudiant a été changée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=second_year_student", 0, "Une erreur est survenue lors du traitement de cette opération.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=second_year_student", 0, "Des informations manquantes pour le traitement de cette opération.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To view the upload Page 
function viewuploadstudentfileCSV()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/newyear/newstudentclasse.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Controller To To Display the end year students
function viewendyearstudentsController()
{
    if (isset($_SESSION["admin_id"])) {
        $end_year_classes = getallendyearstudentsClasses();
        require("views/admin/newyear/end_year_students.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Get end year Student Classe
function getendyearstudentsforspecificlasseController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['class_id'])) {
            $class_id = $_POST['class_id'];
            $end_year_classes = getallendyearstudentsClasses();
            $students = getallendyearstudentsinsameClasse($class_id);
            require("views/admin/newyear/filter_end_year_students.php");
        } else {
            redirectwithPost("index.php?action=end_year_student", 0, "Des informations nécessaires pour le traitement de cette requête sont manquante.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function  Of Controller To Archive end Year Students
function archiveradmendyearstudentsController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['ADM'])) {
            $ADMS = $_POST['ADM'];
            $result = archivenedyearstudents($ADMS);
            if ($result) {
                redirectwithPost("index.php?action=end_year_student", 1, "Les étudiants sont enregistrés avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=end_year_student", 0, "Une erreur est survenue lors de l'enregistrement des étudiants.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=end_year_student", 0, "La liste est vide");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// LE DISPLAY DES ENCIENS LAUREAT DANS UN TABLE
// function of Controller To  Dispaly All Lauréat
function  DisplayAllLaureatController()
{
    if (isset($_SESSION["admin_id"])) {
        $years = getalloldyear();
        $classes = getallendyearstudentsClasses();
        $students = getallarchiveStudents();
        require("views/admin/newyear/old_laureat_student.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function OF controller To Filter Old Laurat
function filteroldLaureatController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['class_id']) && !empty($_POST['year'])) {
            $class_id = $_POST['class_id'];
            $selected_year = $_POST['year'];
            $years = getalloldyear();
            $classes = getallendyearstudentsClasses();
            $students = getallstudentscriteria($class_id, $selected_year);
            require("views/admin/newyear/filter_old_laureat_student.php");
        } else {
            redirectwithPost("index.php?action=old_year_winner", 0, "Des informations nécessaires pour le traitement de cette demande sont manquantes");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
