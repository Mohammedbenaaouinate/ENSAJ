<?php

use function PHPSTORM_META\elementType;

require_once("models/subSubject.php");
// Fonction pour Voir La page Ajouter Modèle qui va contenir des éléments
function ajoutermoduleController()
{
    $filieres = obtenirFilieres();
    $semestres = obtenirSemestres();
    require("views/admin/subsubject/addmodule.php");
}
//  Fonction pour Ajouter un Modèle Qui va contenir Des élements  a la base de données
function ajoutermoduleactionController()
{
    if (isset($_POST['modul_code']) && !empty($_POST['modul_code']
        && isset($_POST['modul_name']) && !empty($_POST['modul_name'])
        && isset($_POST['class_id']) && !empty($_POST['class_id'])
        && isset($_POST['semester_id']) && !empty($_POST['semester_id']))) {

        $modul_code = $_POST['modul_code'];
        $modul_name = $_POST['modul_name'];
        $class_id = $_POST['class_id'];
        $semester_id = $_POST['semester_id'];
        $result = ajouterModule($modul_code, $modul_name, $class_id, $semester_id);
        if ($result) {
            redirectwithPost("index.php?action=subsubjects", 1, "Le modèle qui va contenir les éléments est ajouté avec succès");
            exit();
        } else {
            redirectwithPost("index.php?action=subsubjects", 0, "Une erreur est survenue lors de l'ajout du module");
            exit();
        }
    } else {
        redirectwithPost("index.php?action=subsubjects", 0, "Il faut remplir les champs nécessaires qui sont marqués d'une étoile rouge");
        exit();
    }
}

// Controller pour obtenir Tous Les Modules et Sous Module Enregistrer dans la base données 
function obtenirmodulesetelementsController()
{
    $modules_elements = obtenirmodulesElements();
    $modules_information = obtenirmodulesInformation();
    require("views/admin/subsubject/subsubjects.php");
}
//  Function Pour Supprimer un Element en la base de données

function supprimerelementController()
{
    if (isset($_POST['sub_module_code']) && !empty($_POST['sub_module_code'])) {
        $sub_module_code = $_POST['sub_module_code'];
        $result = supprimerElement($sub_module_code);
        if ($result) {
            redirectwithPost("index.php?action=subsubjects", 1, "l'élément est supprimé avec succès.");
            exit();
        } else {
            redirectwithPost("index.php?action=subsubjects", 0, "Une erreur est survenue lors de la suppression de l'élément");
            exit();
        }
    } else {
        redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
        exit();
    }
}
// Un Controlleur Pour voir la page de Ajouter un élément
function ajouterelementController()
{
    if (isset($_POST['modul_code']) && !empty($_POST['modul_code'])) {
        $modul_code = $_POST['modul_code'];
        $professeurs = obtenirProffesseurs();
        require("views/admin/subsubject/addelement.php");
    } else {
        redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
        exit();
    }
}
// Un Controlleur Pour Ajouter Un élement a la base de données

function ajouterelementactionController()
{
    if (
        isset($_POST['sub_module_code']) && !empty($_POST['sub_module_code'])
        && isset($_POST['sub_module_name']) && !empty($_POST['sub_module_name'])
        && isset($_POST['prof_id']) && !empty($_POST['prof_id'])
        && isset($_POST['modul_code']) && !empty($_POST['modul_code'])
    ) {
        $sub_module_code = $_POST['sub_module_code'];
        $sub_module_name = $_POST['sub_module_name'];
        $prof_id = $_POST['prof_id'];
        $modul_code = $_POST['modul_code'];
        $result = ajouterelementAction($sub_module_code, $sub_module_name, $prof_id, $modul_code);
        if ($result) {
            redirectwithPost("index.php?action=subsubjects", 1, "L'élement de Module est ajouté Avec succès");
            exit();
        } else {
            redirectwithPost("index.php?action=subsubjects", 0, "Une Erreur est Survenue lors de l'ajout de L'élement du module");
            exit();
        }
    } else {
        redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
        exit();
    }
}
// Controller pour Supprimer un Modèle qui contient des éléments dans la base de données

function supprimermoduleactionController()
{

    if (isset($_POST['modul_code']) && !empty($_POST['modul_code'])) {
        $modul_code = $_POST['modul_code'];
        $result = sumpprimermoduleaction($modul_code);
        if ($result) {
            redirectwithPost("index.php?action=subsubjects", 1, "Le modèle a été supprimé avec succès");
            exit();
        } else {
            redirectwithPost("index.php?action=subsubjects", 0, "Une modèle est survenue lors de la suppression du Module");
            exit();
        }
    } else {
        redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
        exit();
    }
}

// Fonction  de Controlleur Pour Afiicher Les Information A modifier  pour un Modole

function modifiermoduleController(){
                        if(isset($_POST['modul_code']) && !empty($_POST['modul_code'])){
                                    $modul_code=$_POST['modul_code'];
                                    $modul_information=obetenirinformationmodule($modul_code);
                                    $classes=obtenirClasses($modul_information['specialization_id']);
                                    $specializations=obtenirSpecialization();
                                    $semestres=obtenirSemestres();
                                    require("views/admin/subsubject/editmodule.php");

                        }else{
                                redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
                                exit();
                        }
}


//  Fonction de Controlleur pour effectue le mise à jour d'un module qui contient les éléments

function miseajourmoduleactionController(){
                    if(
                        isset($_POST['modul_code']) && !empty($_POST['modul_code']
                        && isset($_POST['modul_name']) && !empty($_POST['modul_name'])
                        && isset($_POST['class_id'])  && !empty($_POST['class_id'])
                        && isset($_POST['semester_id']) && !empty($_POST['semester_id'])
                    )){
                                $modul_code=$_POST['modul_code'];
                                $modul_name=$_POST['modul_name'];
                                $class_id=$_POST['class_id'];
                                $semester_id=$_POST['semester_id'];
                                $result=miseajourmoduleaction($modul_code,$modul_name,$class_id,$semester_id);
                                if($result){
                                    redirectwithPost("index.php?action=subsubjects", 1, "Les informations du Module sont modifiée avec succès");
                                    exit();  
                                }
                                else{
                                        redirectwithPost("index.php?action=subsubjects", 0, "Une erreur est Survenue lors de la modification des informations du module");
                                        exit(); 
                                }
                    }else{
                                 redirectwithPost("index.php?action=subsubjects", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes");
                                 exit();
                    }
}