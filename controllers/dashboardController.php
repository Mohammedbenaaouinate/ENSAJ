<?php

require_once "./models/dashboardModel.php";
function show_adminDashboardAction()
{
    if (isset($_SESSION["admin_id"])) {
        $count_prof = count_prof();
        $count_etud = count_etud();
        $count_classroom = count_classroom();
        $count_classes = count_classes();
        $count_admins = count_admins();
        $count_department = count_department();
        $count_specialization = count_specialization();
        $count_modules = count_modules();
        $chart = graph_number_student();
        $field = $chart['spec'];
        $number = $chart['number'];
        include "views/admin/dashboard/admin-dashboard.php";
    } else {
        echo "Accès non autorisé";
    }
}
function add_excel_profAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST["btnprof"])) {
            if (isset($_FILES["excel_prof"]) && $_FILES["excel_prof"]["error"] == UPLOAD_ERR_OK) {
                $fileName = $_FILES["excel_prof"]["name"];
                $verify_file = pathinfo($fileName);

                if (isset($verify_file["extension"])) {
                    $extension = strtolower($verify_file["extension"]);

                    if ($extension == "csv") {
                        if ($_FILES['excel_prof']['size'] != 0) {
                            $tmp = $_FILES["excel_prof"]["tmp_name"];
                            if (add_excel_prof($fileName, $tmp)) {
                                $_SESSION['message'] = "Les données ont été importées avec succès.";
                                $_SESSION['message_type'] = "success";
                            } else {
                                $_SESSION['message'] = "Erreur d'ouverture de fichier CSV.";
                                $_SESSION['message_type'] = "error";
                            }
                        } else {
                            $_SESSION['message'] = "Vous devez sélectionner un fichier non vide.";
                            $_SESSION['message_type'] = "warning";
                        }
                    } else {
                        $_SESSION['message'] = "Vous devez sélectionner un fichier CSV.";
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Erreur lors de la vérification du fichier. Veuillez réessayer.";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Aucun fichier sélectionné.";
                $_SESSION['message_type'] = "warning";
            }
        }

        header("location:index.php?action=dashboard");
    } else {
        echo "Accès non autorisé";
    }
}



function add_excel_etudAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST["btnetud"])) {
            if (isset($_FILES["excel_etud"]) && $_FILES["excel_etud"]["error"] == UPLOAD_ERR_OK) {
                $fileName = $_FILES["excel_etud"]["name"];
                $verify_file = pathinfo($fileName);

                if (isset($verify_file["extension"])) {
                    $extension = strtolower($verify_file["extension"]);

                    if ($extension == "csv") {
                        if ($_FILES['excel_etud']['size'] != 0) {
                            $tmp = $_FILES["excel_etud"]["tmp_name"];
                            if (add_excel_etud($fileName, $tmp)) {
                                $_SESSION['message'] = "Les données ont été importées avec succès.";
                                $_SESSION['message_type'] = "success";
                            } else {
                                $_SESSION['message'] = "Erreur d'ouverture de fichier CSV.";
                                $_SESSION['message_type'] = "error";
                            }


                            // header("location:index.php?action=dashboard");
                        } else {
                            $_SESSION['message'] = "Vous devez sélectionner un fichier non vide.";
                            $_SESSION['message_type'] = "warning";
                        }
                    } else {
                        $_SESSION['message'] = "Vous devez sélectionner un fichier CSV.";
                        $_SESSION['message_type'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Erreur lors de la vérification du fichier. Veuillez réessayer.";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Aucun fichier sélectionné.";
                $_SESSION['message_type'] = "warning";
            }
        }
        header("location:index.php?action=dashboard");
    } else {
        echo "Accès non autorisé";
    }
}
