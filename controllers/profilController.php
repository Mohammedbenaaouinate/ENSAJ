<?php

require_once "./models/profilModel.php";
function show_profilAction()
{
    if (isset($_SESSION["admin_id"])) {
        $profil_admin = list_profil_admin();
        require_once "views/admin/profile/profile.php";
    } else {
        echo "Accès non autorisé";
    }
}

function edit_profilAction()
{
    if (isset($_SESSION["admin_id"])) {
        $id = $_POST["admin_id"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        if (!empty($id) && !empty($fname) && !empty($lname) && !empty($mail) && !empty($phone)) {
            if (edit_profil_admin($id, $fname, $lname, $mail, $phone)) {
                $_SESSION['message'] = "Les informations sont modifiées avec succés";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Erreur lors de la modification";
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Vous ne devez pas vider les champs";
            $_SESSION['message_type'] = "error";
        }

        header("location:index.php?action=profil");
    } else {
        echo "Accès non autorisé";
    }
}

function edit_passAction()
{
    if (isset($_SESSION["admin_id"])) {
        $old = $_POST["old_password"];
        $new = $_POST["new_password"];
        $confirm = $_POST["confirm_password"];
        $id = $_POST["admin_id"];

        if (isset($_POST["modifier"])) {
            if (!empty($old) && !empty($new) && !empty($confirm)) {
                $verify_pass = edit_password_admin($id, $old, $new, $confirm);
                if ($verify_pass == 555) {
                    $_SESSION['message'] = "Le mot de passe est modifié avec succés.";
                    $_SESSION['message_type'] = "success";
                } elseif ($verify_pass == 410) {
                    $_SESSION['message'] = "Le nouveau mot de passe est incompatible avec le mot de passe de confirmation.";
                    $_SESSION['message_type'] = "warning";
                } elseif ($verify_pass == 444) {
                    $_SESSION['message'] = "Erreur lors de la modification du mot de passe";
                    $_SESSION['message_type'] = "error";
                } else {
                    $_SESSION['message'] = "L' ancien mot de passe est erroné";
                    $_SESSION['message_type'] = "error";
                }
            } else {
                $_SESSION['message'] = "Tous les champs sont requis!";
                $_SESSION['message_type'] = "error";
            }
        }


        header("location:index.php?action=profil");
    } else {
        echo "Accès non autorisé";
    }
}
function logout_adminAction()
{
    if (isset($_SESSION["admin_id"])) {
        session_unset();
        session_destroy();
        header("location:index.php?action=login");
    } else {
        echo "Accès non autorisé";
    }
}
