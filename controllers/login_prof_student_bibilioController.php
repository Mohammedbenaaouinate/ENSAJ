<?php
require_once "./models/login_prof_student_bibilioModel.php";

function show_all_users_login_Action()
{

    require_once "views/login_prof_student_bibilio/login.php";
}

function verify_login_userAction()
{

    if (isset($_POST["connect_user"])) {
        $mail_user = $_POST["email_users"];
        $pass_user = $_POST["password_users"];

        if ($mail_user != "" && $pass_user != "") {

            if ($auth = verify_login_user($mail_user, $pass_user)) {

                if (isset($auth["role_employee"])) {
                    if ($auth["role_employee"] == 1) {
                        // role:bibliothécaire";
                        $_SESSION["biblio_id"] = $auth["employee_id"];
                        $_SESSION["fname"] = $auth["lastname"];
                        $_SESSION["firstname"] = $auth["firstname"];
                        $_SESSION["img_biblio"] = $auth["image_path"];

                        $_SESSION['message'] = "Bienvenu dans votre Espace Bibliothécaire";
                        $_SESSION['message_type'] = "success";
                        header("location:index.php?action=dashboard_bibliothecaire");
                    } elseif ($auth["role_employee"] == 2) {
                        $_SESSION['scolarite_id'] = $auth["employee_id"];
                        $_SESSION['prenom'] = $auth['firstname'];
                        $_SESSION['nom'] = $auth['lastname'];
                        $_SESSION['img_scolarite'] = $auth["image_path"];
                        header("location:index.php?action=scolarite_dashboard");
                    }
                } elseif (isset($auth["role_prof"]) && $auth["role_prof"] == 1 && $auth["second_role"] != NULL && $auth["second_role"] != "filiere") {
                    //  role:chef departement";

                    $_SESSION["chef_id"] = $auth["prof_id"];
                    $_SESSION["fname_chef"] = $auth["lastname"];
                    $_SESSION["firstname_chef"] = $auth["firstname"];
                    $_SESSION["img_chef"] = $auth["image_path"];
                    $_SESSION["department_chef"] = $auth["second_role"];

                    $_SESSION['message'] = "Bienvenu dans votre Espace Mr/Mme: " . $_SESSION["firstname_chef"] . " " . $_SESSION["fname_chef"];
                    $_SESSION['message_type'] = "success";
                    header("location:index.php?action=dashboard_chef");
                } elseif (isset($auth["role_prof"]) && $auth["role_prof"] == 1 && $auth["second_role"] == NULL) {
                    // role:professeur";

                    $_SESSION["prof_id"] = $auth["prof_id"];
                    $_SESSION["fname_prof"] = $auth["lastname"];
                    $_SESSION["firstname_prof"] = $auth["firstname"];
                    $_SESSION["img_prof"] = $auth["image_path"];
                    $_SESSION["department_chef"] = $auth["second_role"];

                    $_SESSION['message'] = "Bienvenu dans votre Espace Mr/Mme: " . $_SESSION["firstname_prof"] . " " . $_SESSION["fname_prof"];
                    $_SESSION['message_type'] = "success";
                    header("location:index.php?action=dashboard_prof");
                } elseif (isset($auth["role_prof"]) && $auth["role_prof"] == 1 && $auth["second_role"] == "filiere") {
                    //  role:chef filiere";

                    $_SESSION["chef_filiere_id"] = $auth["prof_id"];
                    $_SESSION["lastname_filiere"] = $auth["lastname"];
                    $_SESSION["firstname_filiere"] = $auth["firstname"];
                    $_SESSION["img_filiere"] = $auth["image_path"];
                    // $_SESSION["department_chef"]=$auth["second_role"];

                    $_SESSION['message'] = "Bienvenu dans votre Espace Mr/Mme: " . $_SESSION["firstname_filiere"] . " " . $_SESSION["lastname_filiere"];
                    $_SESSION['message_type'] = "success";
                    header("location:index.php?action=dashboard_filiere");
                } else {
                    $_SESSION['message'] = "Echec d'authentification!";
                    $_SESSION['message_type'] = "error";
                    header("location:index.php?action=show_users_login");
                }
            } else {
                $_SESSION['message'] = "Echec d'authentification!";
                $_SESSION['message_type'] = "error";
                header("location:index.php?action=show_users_login");
            }
        } else {
            $_SESSION['message'] = "Vous devez remplir les champs";
            $_SESSION['message_type'] = "error";
            header("location:index.php?action=show_users_login");
        }
    }
}
