<?php
require_once("models/scolarite_dashboard_profile.php");


// Function To view The Dashboard Requests (Requests that are not processed)

function viewscolaritedashboardController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $nbr_attestation_scolaire = gatnumberofRequests(1);
        $nbr_retrait_provisoire = gatnumberofRequests(2);
        $nbr_relve_note = gatnumberofRequests(4);
        $nbr_convention_stage = getnumberagreementinternship();
        require("views/scolarite/dashboard_profile/dashboard.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function To View The Profile the User

function viewprofilescolariteController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $employee_id = $_SESSION['scolarite_id'];
        $result = getscolariteprofileInformation($employee_id);
        require("views/scolarite/dashboard_profile/view_profil_scolarite.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Update Profile Information of Scolarité
function updateprofilescolariteController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (
            !empty($_POST['scolarite_id'])  && !empty($_POST['lastname'])
            && !empty($_POST['firstname']) && !empty($_POST['email'])
            && !empty($_POST['phone_number'])
        ) {
            $scolarite_id = $_POST['scolarite_id'];
            $last_name = $_POST['lastname'];
            $first_name = $_POST['firstname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $old_img_path = $_POST['old_img_path'];
            $new_image_size = $_FILES['image_scolarite']['size'];
            if ($new_image_size != 0) {
                unlink("assets/scolarites/" . $old_img_path);
                $name_exploded = explode(".", $_FILES['image_scolarite']['name']);
                $img_extention = $name_exploded[1];
                $path = uniqid() . time() . "." . $img_extention;
                move_uploaded_file($_FILES['image_scolarite']['tmp_name'], "assets/scolarites/" . $path);
                $result = updatescolariteprofileinfo($scolarite_id, $first_name, $last_name, $email, $phone_number, $path);
                if ($result) {
                    $_SESSION['prenom'] = $first_name;
                    $_SESSION['nom'] = $last_name;
                    $_SESSION['img_scolarite'] = $path;
                    redirectwithPost("index.php?action=view_profile_scolarite", 1, "Votre profil a été modifié avec succès.");
                    exit();
                } else {
                    Redirect("index.php?action=view_profile_scolarite");
                    exit();
                }
            } else {
                $result = updatescolariteprofileinfo($scolarite_id, $first_name, $last_name, $email, $phone_number, $old_img_path);
                if ($result) {
                    $_SESSION['prenom'] = $first_name;
                    $_SESSION['nom'] = $last_name;
                    redirectwithPost("index.php?action=view_profile_scolarite", 1, "Votre profil a été modifié avec succès.");
                    exit();
                } else {
                    Redirect("index.php?action=view_profile_scolarite");
                    exit();
                }
            }
        } else {
            Redirect("index.php?action=view_profile_scolarite");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function to update  password of student_service (scolarité) Controller
function updatepasswordscolariteController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (
            !empty($_POST['scolarite_id']) && !empty($_POST['new_password'])
            && !empty($_POST['confirm_password'])
        ) {
            $password = $_POST['new_password'];
            $scolarite_id = $_POST['scolarite_id'];
            $result = updatePassword($password, $scolarite_id);
            if ($result) {
                redirectwithPost("index.php?action=view_profile_scolarite", 1, "le mot de passe a été modifié avec succès.");
                exit();
            } else {
                Redirect("index.php?action=view_profile_scolarite");
                exit();
            }
        } else {
            Redirect("index.php?action=view_profile_scolarite");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
