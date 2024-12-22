<?php
require_once("models/specializations.php");
// Function To get All departement For Showing in the list Of Select Value in Add-specialization

function getalldepartementController()
{
        if (isset($_SESSION["admin_id"])) {
                $departements = getallldepartement();
                require("views/admin/specialization/add-specialization.php");
        } else {
                echo "Accès non autorisé";
        }
}
// Function To Answer the Request belongs the Ajax... To get all teacher contains in the same departement
function  getProfesseursforsamedepartementController()
{
        $departement_id = $_POST['departement_id'];
        $proffesseurs = getprofesseurinsamedepartement($departement_id);
        echo json_encode($proffesseurs);
}
// Function To Display The All Specialization With His Departement
function getallspecializationsController()
{
        if (isset($_SESSION["admin_id"])) {
                $specializations = getsepcializations();
                require("views/admin/specialization/specializations.php");
        } else {
                echo "Accès non autorisé";
        }
}

// Function Of Controller To ADD specialization INTO DATA BASE
function addspecializationactionController()
{
        if (isset($_SESSION["admin_id"])) {
                if (
                        !empty($_POST['short_name']) && !empty($_POST['fullname'])
                        &&  !empty($_POST['coordonnateur_id']) && !empty($_POST['description_field'])
                        && !empty($_POST['departement_id'])
                ) {
                        $short_name = $_POST['short_name'];
                        $fullname = $_POST['fullname'];
                        $coordonnateur_id = $_POST['coordonnateur_id'];
                        $desciption_field = $_POST['description_field'];
                        $departement_id = $_POST['departement_id'];
                        $result = addSpecialization($short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id);
                        if ($result === true) {
                                redirectwithPost("index.php?action=specializations", 1, "La filière est ajoutée avec succès");
                                exit();
                        } else {
                                redirectwithPost("index.php?action=specializations", 0, "Une Erreur est Survenue Lors de l'ajout de La filière");
                                exit();
                        }
                } else {
                        redirectwithPost("index.php?action=specializations", 0, "Vous devez remplir tous les champs nécessaires marqués d'une étoile rouge.");
                        exit();
                }
        } else {
                echo "Accès non autorisé";
        }
}

// Controller For Delete Specialization From DATABASE
function deletespecializationactionController()
{
        if (isset($_SESSION["admin_id"])) {
                if (isset($_POST['specialization_id']) && !empty($_POST['specialization_id'])) {
                        $result = deleteSpecialization($_POST['specialization_id']);
                        if ($result === true) {
                                redirectwithPost("index.php?action=specializations", 1, "La filière est supprimé avec succès");
                                exit();
                        } else {
                                redirectwithPost("index.php?action=specializations", 0, "Une erreur est survenue lors de la suppression de la filière dans la base de données");
                                exit();
                        }
                } else {
                        redirectwithPost("index.php?action=specializations", 0, "Erreur!! Donnée modifiée à partir du code source");
                }
        } else {
                echo "Accès non autorisé";
        }
}


// Function To Edit Specialization (Show Information about specific Specialization)
function editspecializationController()
{
        if (isset($_SESSION["admin_id"])) {
                if (isset($_POST['specialization_id']) && !empty($_POST['specialization_id'])) {
                        $specialization = getsepcializationInformation($_POST['specialization_id']);
                        $departements = getallldepartement();
                        $proffesseurs = professeurcontainsdepartement($specialization['departement_id']);
                        require("views/admin/specialization/edit-specialization.php");
                } else {
                        Redirect("index.php?action=specializations");
                        exit();
                }
        } else {
                echo "Accès non autorisé";
        }
}
// Function Controller to Update Information From Data Base 
function updatespecializationactionController()
{
        if (isset($_SESSION["admin_id"])) {
                if (
                        !empty($_POST['specialization_id']) && !empty($_POST['short_name'])
                        && !empty($_POST['fullname'])  &&  !empty($_POST['departement_id'])
                        &&  !empty($_POST['coordonnateur_id']) && !empty($_POST['description_field'])
                        && !empty($_POST['previous_coord_id'])
                ) {
                        $specialization_id = $_POST['specialization_id'];
                        $short_name = $_POST['short_name'];
                        $fullname = $_POST['fullname'];
                        $coordonnateur_id = $_POST['coordonnateur_id'];
                        $previous_coor_id = $_POST['previous_coord_id'];
                        $desciption_field = $_POST['description_field'];
                        $departement_id = $_POST['departement_id'];
                        if ($coordonnateur_id == $previous_coor_id) {
                                $result = updatespecialization($specialization_id, $short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id);
                        } else {
                                $result = updatespecializationwithchangingCoordonnateur($specialization_id, $short_name, $fullname, $coordonnateur_id, $desciption_field, $departement_id, $previous_coor_id);
                        }

                        if ($result) {
                                redirectwithPost("index.php?action=specializations", 1, "La Filière est modifié avec succès");
                        } else {
                                redirectwithPost("index.php?action=specializations", 0, "Une erreur est survenue lors de la modification de la filière");
                        }
                } else {
                        redirectwithPost("index.php?action=specializations", 0, "Vous devez remplir tous les champs obligatoires qui sont marqués d'une étoile rouge.");
                }
        } else {
                echo "Accès non autorisé";
        }
}
