<?php 

require_once "./models/loginModel.php";

function show_loginAction(){
    require_once "views/admin/login/login.php";
}
function verify_loginAction(){
    if(isset($_POST["connect"])){
        $mail=$_POST["email"];
        $pass=$_POST["password"];

        if($mail !="" && $pass !=""){
            if($authentication=verify_login($mail,$pass)){
                $_SESSION["admin_id"]=$authentication["prof_id"];
                $_SESSION["family_name"]=$authentication["lastname"];
                $_SESSION["first"]=$authentication["firstname"];
                $_SESSION["img"]=$authentication["image_path"];

                $_SESSION['message'] = "Bienvenu dans votre Espace admin ! Monsieur ".$authentication["lastname"]." ".$authentication["firstname"];
                $_SESSION['message_type'] = "success";
                header("location:index.php?action=dashboard");
            }else{
                $_SESSION['message'] = "Echec d'authentification!";
                $_SESSION['message_type'] = "error";
                header("location:index.php?action=login");
            }   
        }else{
            $_SESSION['message'] = "Vous devez remplir les champs";
            $_SESSION['message_type'] = "error";
            header("location:index.php?action=login");
        }
    }
}
?>