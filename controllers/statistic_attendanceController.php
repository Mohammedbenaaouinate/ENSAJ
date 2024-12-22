<?php

require_once "./models/statistic_attendanceModel.php";

function show_class_AbsentAction()
{
    if (isset($_SESSION['scolarite_id'])) {
        $classes = select_absent_classes();
        include("views/scolarite/attendance/list_class.php");
    } else {
        echo "Accès non autorisé";
    }
}

function select_statistic_attendance_of_classAction()
{
    if (isset($_SESSION['scolarite_id'])) {
        $class = $_GET["class_id"];
        $semester = select_semester_for_attendance();
        $module = select_module_without_element_Attendance($class);
        $module_element = select_module_with_element_Attendance($class);
        $students = select_statistic_attendance_of_class($class);
        include("views/scolarite/attendance/list_student_attendance.php");
    } else {
        echo "Accès non autorisé";
    }
}
function filter_attendance_scolarityAction()
{
    if (isset($_SESSION['scolarite_id'])) {
        $class = $_POST["class_id"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $semestre = $_POST["semester"];
        $modul_without_element = $_POST["modul_without_element"];
        $modul_with_element = $_POST["modul_with_element"];
        if (!empty($class)) {
            if (empty($semestre) && empty($modul_without_element) && empty($modul_with_element) && (empty($start_date) && (empty($end_date)))) {
                header("location:index.php?action=select_statistic_attendance_of_class&class_id=$class");
            } else {
                // $semester=select_semester_for_attendance();
                // $module=select_module_without_element_Attendance($class);
                // $module_element=select_module_with_element_Attendance($class);
                if ($semestre != "" && $modul_without_element != "") {
                    $semester = select_semester_for_attendance();
                    $semester_module = select_module_with_semester($class, $semestre);
                } elseif ($semestre != "" && $modul_with_element != "") {
                    $semester = select_semester_for_attendance();
                    $semester_element = select_module_without_element_with_semester($class, $semestre);
                } elseif ($semestre != "") {
                    $semester = select_semester_for_attendance();
                }
                $result = filter_attendance_statistic_all($class, $semestre, $modul_without_element, $modul_with_element, $start_date, $end_date);
                if ($result != 404) {
                    include("views/scolarite/attendance/list_student_attendanceFilter.php");
                } else {
                    $_SESSION['message'] = "Vous choisissez une option qui n'est pas traité";
                    $_SESSION['message_type'] = "error";
                    header("location:index.php?action=select_statistic_attendance_of_class&class_id=$class");
                }
            }
        } else {
            header("location:index.php?action=abs_statistique");
        }
    } else {
        echo "Accès non autorisé";
    }
}

function visualize_attendance_of_studentAction()
{
    if (isset($_SESSION['scolarite_id'])) {
        $student_id = $_GET["student_id"];
        $student_info = select_infos_of_student($student_id);
        $student_info_details = select_infos_of_student_detail_absence($student_id);
        include("views/scolarite/attendance/show_attendance_of_student.php");
    } else {
        echo "Accès non autorisé";
    }
}
