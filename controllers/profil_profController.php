<?php

require_once "./models/profil_profModel.php";
function show_prof_profilAction()
{
    if (isset($_SESSION["prof_id"])) {
        $profil_prof = list_profil_prof();
        require_once "views/professeur/profil/profil.php";
    } else {
        echo "Accès non autorisé";
    }
}

function edit_profil_profAction()
{
    if (isset($_SESSION["prof_id"])) {
        $id = $_POST["prof_id"];
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        if (!empty($id) && !empty($fname) && !empty($lname) && !empty($mail) && !empty($phone)) {
            if (edit_profil_prof($id, $fname, $lname, $mail, $phone)) {
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

        header("location:index.php?action=show_profil_prof");
    } else {
        echo "Accès non autorisé";
    }
}

function edit_pass_profAction()
{
    if (isset($_SESSION["prof_id"])) {
        $old = $_POST["old_password"];
        $new = $_POST["new_password"];
        $confirm = $_POST["confirm_password"];
        $id = $_POST["prof_id"];

        if (isset($_POST["edit_pass"])) {
            if (!empty($old) && !empty($new) && !empty($confirm)) {
                $verify_pass = edit_password_prof($id, $old, $new, $confirm);
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

        header("location:index.php?action=show_profil_prof");
    } else {
        echo "Accès non autorisé";
    }
}
