<?php
require_once "./models/student_scheduleModel.php";


function show_schedule_studentAction()
{
    if (isset($_SESSION['student'])) {
        $view_schedule = view_schedule_student();
        $name_class = name_class_student();
        $semester = select_semester_student();
        require_once "views/etudiant/schedule/view_schedule.php";
    } else {
        echo "Accès non autorisé";
    }
}


function show_schedule_student_normalAction()
{
    if (isset($_SESSION['student'])) {
        $view_schedule = view_schedule_student_normal();
        $name_class = name_class_student();
        $semester = select_semester_student_normal();
        require_once "views/etudiant/schedule/view_schedule_exam.php";
    } else {
        echo "Accès non autorisé";
    }
}

function show_schedule_student_rattAction()
{
    if (isset($_SESSION['student'])) {
        $view_schedule = view_schedule_student_ratt();
        $name_class = name_class_student();
        $semester = select_semester_student_ratt();
        require_once "views/etudiant/schedule/view_schedule_ratt.php";
    } else {
        echo "Accès non autorisé";
    }
}
