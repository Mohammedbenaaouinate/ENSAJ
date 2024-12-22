<?php
require_once("models/moduleManagement.php");
// Controller Get All Specializations to Showing In Adding Module Without Element  (modifier)

function addsubjectController()
{
    if (isset($_SESSION["admin_id"])) {
        $specializations = getspecializations();
        $semesters = getSemesters();
        $professeurs = getProfesseurs();
        require("views/admin/modulemanagement/add-subject.php");
    } else {
        echo "Accès non autorisé";
    }
}


//  Function Of Controller To ADD Module Into DataBase(modifier)

function addsubjectactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['modul_code']) && !empty($_POST['modul_name'])
            && !empty($_POST['intervenant']) && !empty($_POST['intervenant_email'])
            && !empty($_POST['semester_id']) &&  !empty($_POST['class_id'])
            && !empty($_POST['prof_id'])
        ) {
            $modul_code = $_POST['modul_code'];
            $modul_name = $_POST['modul_name'];
            $intervenant = $_POST['intervenant'];
            $intervenant_email = $_POST['intervenant_email'];
            $semester_id = $_POST['semester_id'];
            $class_id = $_POST['class_id'];
            $prof_id = $_POST['prof_id'];
            $result = addSubject($modul_code, $modul_name, $intervenant, $intervenant_email, $semester_id, $prof_id, $class_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Le modèle est ajouté avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est survenue lors de l'ajout du modèle.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Vous devez remplir tous les champs marqués d'une étoile rouge.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To Display The Page For Adding Module With Element
function ajoutermoduleController()
{
    if (isset($_SESSION["admin_id"])) {
        $specializations = getspecializations();
        $semesters = getSemesters();
        require_once("views/admin/modulemanagement/ajouter-module.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function To Add Module With Element Into Data Base

function ajoutermoduleactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['module_code']) && !empty($_POST['module_name'])
            && !empty($_POST['semester_id']) && !empty($_POST['class_id'])
        ) {
            $modul_code = $_POST['module_code'];
            $modul_name = $_POST['module_name'];
            $semester_id = $_POST['semester_id'];
            $class_id = $_POST['class_id'];
            $result = ajoutermodule($modul_code, $modul_name, $semester_id, $class_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Le modèle qui va contenir les éléments a été ajouté avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une Erreur et Survenue lors de l'ajout de ce module dans la base de données");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Vous devez remplir tous les champs marqués d'une étoile rouge.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Display all Subject And Module And Element In module_management

function displayallsubjectanddmoduleController()
{
    if (isset($_SESSION["admin_id"])) {
        $subjects = getallSubjects();
        $modules = getallmodulewithElement();
        $elements = getallElements();
        $specializations = getspecializations();
        require_once("views/admin/modulemanagement/modulemanagement.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function of Controller To get All classes  Associated With a specifique Specialization(For Exemple GTR:Première Année | Deuxième Année | Troisème Année)

function getclassesforspecificspcializationController()
{
    $specialization_id = $_POST['specialization_id'];
    $classes = getclassesforspecificSpecialization($specialization_id);
    echo json_encode($classes);
    exit();
}
// Function Of Controller To DELETE Action From DataBase

function deletesubjectactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['modul_id'])) {
            $modul_id = $_POST['modul_id'];
            $result = deletesubject($modul_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Le module est supprimé avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est Servenue Lors de la suppression du module");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "il Manque une information qui peut-être changé pour exécuté cette partie de code");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To Edit Subject Controller

function editsubjectController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['modul_id'])) {
            $specializations = getspecializations();
            $semesters = getSemesters();
            $professeurs = getProfesseurs();
            $modul_id = $_POST['modul_id'];
            $subjectInformation = getsubjectInformation($modul_id);
            // set of classes associated with a specialization
            $classes = getclassesforspecificSpecialization($subjectInformation['specialization_id']);
            require("views/admin/modulemanagement/edit-subject.php");
        } else {
            Redirect("index.php?action=module_management");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To update the Information Associated with Specific subject From DataBase
function updatesubjectactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['modul_id']) && !empty($_POST['modul_code'])
            && !empty($_POST['modul_name']) && !empty($_POST['intervenant'])
            && !empty($_POST['intervenant_email']) && !empty($_POST['semester_id'])
            && !empty($_POST['prof_id']) && !empty($_POST['class_id'])

        ) {
            $modul_id = $_POST['modul_id'];
            $modul_code = $_POST['modul_code'];
            $modul_name = $_POST['modul_name'];
            $intervenant = $_POST['intervenant'];
            $intervenant_email = $_POST['intervenant_email'];
            $semester_id = $_POST['semester_id'];
            $prof_id = $_POST['prof_id'];
            $class_id = $_POST['class_id'];
            $result = updatesubjectaction($modul_id, $modul_code, $modul_name, $intervenant, $intervenant_email, $semester_id, $prof_id, $class_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Les modifications des informations concernant le module ont été apportées avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est survenue lors de la modification des informations concernant le module");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Il manque des informations pour le traitement de cette opération");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Fonction Pour supprimer un Module Qui contient des éléments a partir de la base de données

function deletemoduleactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['module_id'])) {
            $module_id = $_POST['module_id'];
            $result = supprimerModule($module_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Le module est supprimé avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est Servenue Lors de la suppression du module");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Il manque des informations pour le traitement de cette opération");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// fonction Afficher la page de modification du Module 

function modifiermoduleController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['module_id'])) {
            $module_id = $_POST['module_id'];
            $specializations = getspecializations();
            $semesters = getSemesters();
            $moduleInformation = obtenirmoduleInformation($module_id);
            $classes = getclassesforspecificSpecialization($moduleInformation['specialization_id']);
            require("views/admin/modulemanagement/modifier-module.php");
        } else {
            Redirect("index.php?action=module_management");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

//Fonctio Pour la mise-à-jour des données dans la base de données

function modifiermoduleactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['module_id']) && !empty($_POST['module_code'])
            && !empty($_POST['module_name']) && !empty($_POST['semester_id'])
            && !empty($_POST['class_id'])
        ) {
            $module_id = $_POST['module_id'];
            $module_code = $_POST['module_code'];
            $module_name = $_POST['module_name'];
            $semester_id = $_POST['semester_id'];
            $class_id = $_POST['class_id'];
            $result = modifiermoduleaction($module_id, $module_code, $module_name, $semester_id, $class_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "Les modifications des informations concernant le module ont été apportées avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est Servenue Lors de la suppression du module");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Il manque des informations pour le traitement de cette opération");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Fonction Controller Pour Supprimer Un élement de Module dans la base de donnée

function supprimerelementactionController()
{
    if (isset($_SESSION["admin_id"])) {
        $element_id = $_POST['element_id'];
        if (!empty($element_id)) {
            $result = deleteElement($element_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "L'élément est supprimé avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est survenue lors de la suppression de l'élement");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=module_management", 0, "Il manque des informations pour le traitement de cette opération");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Controller Pour Afficher les champs a remplir pour Ajouter un élément

function ajouterelementController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['module_id'])) {
            $module_id = $_POST['module_id'];
            $professeurs = getProfesseurs();
            require("views/admin/modulemanagement/ajouter-element.php");
        } else {
            Redirect("index.php?action=module_management");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Controlller Pour Ajouter un élémment a la base de donnée 

function ajouterelementactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['element_code']) && !empty($_POST['element_name'])
            && !empty($_POST['intervenant_name']) && !empty($_POST['intervenant_email'])
            && !empty($_POST['prof_id']) && !empty($_POST['module_id'])

        ) {
            $element_code = $_POST['element_code'];
            $element_name = $_POST['element_name'];
            $intervenant_name = $_POST['intervenant_name'];
            $intervenant_email = $_POST['intervenant_email'];
            $prof_id = $_POST['prof_id'];
            $module_id = $_POST['module_id'];
            $result = ajouterElement($element_code, $element_name, $intervenant_name, $intervenant_email, $prof_id, $module_id);
            if ($result) {
                redirectwithPost("index.php?action=module_management", 1, "L'élément est ajouté avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=module_management", 0, "Une erreur est survenue lors de l'ajout de l'élement");
                exit();
            }
        } else {
            Redirect("index.php?action=module_management");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function Pour Filtrer les Modules et les élément seleon leur classe
function filtermoduleController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['class_id'])) {
            $class_id = $_POST['class_id'];
            $specialization_id = $_POST['field_id'];
            $classes = getclassesforspecificSpecialization($specialization_id);
            $subjects = getallSubjectsbyclasse($class_id);
            $modules = getallmodulewithElementbyclasse($class_id);
            $elements = getallElements();
            $specializations = getspecializations();
            require_once("views/admin/modulemanagement/modulemanagement_filter.php");
        } else {
            Redirect("index.php?action=module_management");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
