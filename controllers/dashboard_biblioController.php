<?php

require_once "./models/dashboard_biblioModel.php";
function show_biblioDashboardAction()
{
    if (isset($_SESSION["biblio_id"])) {
        $total = count_total_book();
        $request = count_request();
        $available_book = count_available_book();
        $emprunted_book = count_emprunted_book();
        $verify_emprunted_book=verify_emprunted_book();
        include "views/bibliothecaire/dashboard/dashboard_biblio.php";
    } else {
        echo "Accès non autorisé";
    }
}
