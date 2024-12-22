<?php

require_once "./models/dashboard_chefModel.php";

function show_dashboard_chefAction()
{
    if (isset($_SESSION["chef_id"])) {
        $total_classe = select_number_student_of_classe_in_department();
        $lists_prof_department = select_professor_of_department();
        $count_total_professor = count_prof();
        $student = count_etud();
        include "views/chef_departement/dashboard/dashboard_chef.php";
    } else {
        echo "Accès non autorisé";
    }
}
