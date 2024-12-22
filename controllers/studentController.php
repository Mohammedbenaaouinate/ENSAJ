<?php
// Include The Student Model    
require_once("models/studentModel.php");
// Function to check the information entred in the  student login  Page
function checkstudentloginController()
{
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = checkloginInformation($email, $password);
        if ($result === false) {
            $_SESSION['message'] = "Les informations saisies sont incorrectes.";
            $_SESSION['message_type'] = "error";
            Redirect("index.php?action=show_users_login");
            exit();
        } else {
            $_SESSION['student'] = $result;
            if (empty($_SESSION['student']['student_adress']) || $_SESSION['student']['student_adress'] == "NULL") {
                $_SESSION['continue'] = true;
                Redirect("index.php?action=student_attestation_scolarite");
                exit();
            } else {
                Redirect("index.php?action=student_attestation_scolarite");
                exit();
            }
        }
    } else {
        Redirect("index.php?action=show_users_login");
        exit();
    }
}

// Function To GET ALL STUDENT CERTIFICATE (Attestation Scolaire) FROM DATA BASE


function getallstudentschoolcertificateController()
{
    if (isset($_SESSION['student'])) {
        $service_type = 1;
        $student_id = $_SESSION['student']['student_id'];
        $requests = getallstudentresquestforsepecificService($service_type, $student_id);
        require("views/etudiant/all_request_school_certificate.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Print Student Certifcate After Accepted
function printschoolcertificateforStudent()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['servcie_id'])) {
            $serive_id = $_POST['servcie_id'];
            $student_info = getallschoolcerficateInfo($serive_id);
            require("views/etudiant/print_student_school_certificate.php");
            exit();
        } else {
            redirectwithPost("index.php?action=student_attestation_scolarite", 0, "Des informations nécessaires pour le traitement de cette requête sont manquantes.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function TO ADD studen Request FROM DATA BASE 

function requestattestationscolaireController()
{
    if (isset($_SESSION['student'])) {
        if (isset($_POST['btn_att_scolaire'])) {
            $service_type = 1;
            $service_status = 0;
            $student_id = $_SESSION['student']['student_id'];
            $result = insertstudentrequesintodataBase($service_type, $service_status, $student_id);
            if ($result) {
                redirectwithPost("index.php?action=student_attestation_scolarite", 1, "Votre demande a été envoyée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=student_attestation_scolarite", 0, "Une erreur est survenue lors de l'envoi de votre demande.");
                exit();
            }
        } else {
            Redirect("index.php?action=student_attestation_scolarite");
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To GET all request of student For retrait Provisoie
function getallrequeststudentretraitprovisoireController()
{
    if (isset($_SESSION['student'])) {
        $service_type = 2;
        $student_id = $_SESSION['student']['student_id'];
        $requests = getallstudentresquestforsepecificService($service_type, $student_id);
        require("views/etudiant/all_request_retrait_provisoire.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller To GET INSERT THE REQUEST OF RETRAIT PROVISOIRE OF the Document

function requestretraitprovisoireController()
{
    if (isset($_SESSION['student'])) {
        if (isset($_POST['btn_retrait_provisoire'])) {
            $service_type = 2;
            $service_status = 0;
            $student_id = $_SESSION['student']['student_id'];
            $result = insertstudentrequesintodataBase($service_type, $service_status, $student_id);
            if ($result) {
                redirectwithPost("index.php?action=student_retrait_provisoire", 1, "Votre demande a été envoyée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=student_retrait_provisoire", 0, "Une erreur est survenue lors de l'envoi de votre demande.");
                exit();
            }
        } else {
            Redirect("index.php?action=student_retrait_provisoire");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To GET all Student Request of Relvé de note

function getallrequestsstudentrelvenoteController()
{
    if (isset($_SESSION['student'])) {
        $service_type = 4;
        $student_id = $_SESSION['student']['student_id'];
        $requests = getallstudentresquestforsepecificService($service_type, $student_id);
        require("views/etudiant/all_request_relve_notes.php");
    } else {
        echo "Accès non autorisé";
    }
}




// Function OF CONTROLLER TO REQUEST RELVE DE NOTES 
function requestrelvedenotesController()
{
    if (isset($_SESSION['student'])) {
        if (isset($_POST['btn_relve_notes'])) {
            $service_type = 4;
            $service_status = 0;
            $student_id = $_SESSION['student']['student_id'];
            $result = insertstudentrequesintodataBase($service_type, $service_status, $student_id);
            if ($result) {
                redirectwithPost("index.php?action=student_relve_note", 1, "Votre demande a été envoyée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=student_relve_note", 0, "Une erreur est survenue lors de l'envoi de votre demande.");
                exit();
            }
        } else {
            Redirect("index.php?action=student_relve_note");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller To Display School the Form Of School Agremeent Certificate
function displayformtorequestsSchoolAgreementCertificate()
{
    if (isset($_SESSION['student'])) {
        $s_class_id = $_SESSION['student']['class_id'];
        $required = false;
        $classes = gelallClasse();
        $end_year_classe_id = [];
        foreach ($classes as $classe) {
            $year_class = explode("-", $classe['class_name']);
            if ($year_class[1] == 3) {
                $end_year_classe_id[] = $classe['class_id'];
            }
        }
        if (in_array($s_class_id, $end_year_classe_id)) {
            $required = true;
        }
        require_once("views/etudiant/convention_stage/ajouter_convention_stage.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller to Add New Request for School Agreement

function ajouterdemandeconventionstageController()
{
    if (isset($_SESSION['student'])) {
        if ($_FILES['assurance_image']['size'] != 0) {
            $student_id = $_SESSION['student']['student_id'];
            $company_name = $_POST['company_name'];
            $company_service = $_POST['company_service'];
            $company_address = $_POST['company_address'];
            $company_phone = $_POST['company_phone'];
            $company_fax = $_POST['company_fax'];
            $extensions_allowed = ["png", "jpg", "jpeg"];
            $exploded_name = explode(".", $_FILES['assurance_image']['name']);
            $extention = strtolower(end($exploded_name));
            $path_img = uniqid() . time() . "." . $extention;
            $s_class_id = $_SESSION['student']['class_id'];
            $end_year_student = false;
            $classes = gelallClasse();
            $end_year_classe_id = [];
            foreach ($classes as $classe) {
                $year_class = explode("-", $classe['class_name']);
                if ($year_class[1] == 3) {
                    $end_year_classe_id[] = $classe['class_id'];
                }
            }
            if (in_array($s_class_id, $end_year_classe_id)) {
                $end_year_student  = true;
            }
            if ($end_year_student) {
                if (
                    empty($_POST['company_name']) || empty($_POST['company_service'])
                    || empty($_POST['company_address']) || empty($_POST['company_phone'])
                    || empty($_POST['company_fax'])
                ) {
                    redirectwithPost("index.php?action=ajouter_convention_stage", 0, "Tous les champs doivent être remplis");
                    exit();
                }
            }
            if ($_FILES['assurance_image']['size'] == 0) {
                redirectwithPost("index.php?action=student_convention_stage", 0, "Vous devez choisir une image");
                exit();
            }
            if ($_FILES['assurance_image']['size'] > 400 * 1024) {
                redirectwithPost("index.php?action=student_convention_stage", 0, "La taille de l'image ne peut pas dépasser 400 Ko.");
                exit();
            }
            if (!in_array($extention, $extensions_allowed)) {
                redirectwithPost("index.php?action=student_convention_stage", 0, "L'extension du fichier choisi n'est pas convenable. Elle doit être : png, jpg, ou jpeg");
                exit();
            }
            move_uploaded_file($_FILES['assurance_image']['tmp_name'], "assets/assurance_image/" . $path_img);
            $result = insertagreementRequest($company_name, $company_service, $company_address, $company_phone, $company_fax, $path_img, $student_id);
            if ($result) {
                redirectwithPost("index.php?action=student_convention_stage", 1, "Votre demande a été envoyée avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=student_convention_stage", 0, "Une erreur est survenue lors de l'envoi de votre demande.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=student_convention_stage", 0, "Il faut remplir Tous les champs");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To GET ALL student Agreement Request From agreement Table In Data Base

function getallrequeststudentagreementinternshipController()
{
    if (isset($_SESSION['student'])) {
        $student_id = $_SESSION['student']['student_id'];
        $requests = getagreementrequestforspecificstudent($student_id);
        require("views/etudiant/convention_stage/all_convention_stage.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function of Controller To Display Student Information

function getinformationforstudentprofileController()
{
    if (isset($_SESSION['student'])) {
        $student_id = $_SESSION['student']['student_id'];
        $student = getinformationforprofileStudent($student_id);
        require("views/etudiant/student_profile.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of  Controller  To Update the password of Student

function  updatepasswordstudentController()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            $student_id = $_SESSION['student']['student_id'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if ($password != $confirm_password) {
                redirectwithPost("index.php?action=view_student_profile", 0, "Le mot de passe et sa confirmation ne sont pas identiques.");
                exit();
            } else {
                $result = updatestudentPassword($password, $student_id);
                if ($result) {
                    redirectwithPost("index.php?action=view_student_profile", 1, "Le mot de passe a été modifié avec succès.");
                    exit();
                } else {
                    Redirect("index.php?action=view_student_profile");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=view_student_profile", 0, "Les informations nécessaires pour le traitement de cette requête sont manquantes.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}



// Controller To update Pesonal Student Information


function updatestudentpersonalinformationController()
{
    if (isset($_SESSION['student'])) {
        if (
            !empty($_POST['birth_date']) && !empty($_POST['sexe'])
            && !empty($_POST['nationality']) && !empty($_POST['phone_number'])
            && !empty($_POST['student_adress'])
        ) {
            $student_id = $_SESSION['student']['student_id'];
            $birth_date = $_POST['birth_date'];
            $sexe = $_POST['sexe'];
            $nationality = $_POST['nationality'];
            $phone_number = $_POST['phone_number'];
            $student_adress = $_POST['student_adress'];
            $old_path = $_POST['old_path'];
            $new_path = "default_image.jpg";
            if (empty($_POST['old_path']) && $_FILES['student_img']['size'] == 0) {
                $new_path = "default_image.jpg";
            }
            if (!empty($_POST['old_path']) && $_FILES['student_img']['size'] != 0) {
                if ($_POST['old_path'] != "default_image.jpg") {
                    $old_path = $_POST['old_path'];
                    unlink("assets/students/" . $old_path);
                    $exploded_name = explode(".", $_FILES['student_img']['name']);
                    $extention = strtolower(end($exploded_name));
                    $new_path = uniqid() . time() . "." . $extention;
                    move_uploaded_file($_FILES['student_img']['tmp_name'], "assets/students/" . $new_path);
                } else {
                    $exploded_name = explode(".", $_FILES['student_img']['name']);
                    $extention = strtolower(end($exploded_name));
                    $new_path = uniqid() . time() . "." . $extention;
                    move_uploaded_file($_FILES['student_img']['tmp_name'], "assets/students/" . $new_path);
                }
            }
            if (!empty($_POST['old_path']) && $_FILES['student_img']['size'] == 0) {
                $new_path = $old_path;
            }
            $result = updatestudentpersonalInformation($birth_date, $nationality, $phone_number, $sexe, $student_adress, $new_path, $student_id);
            $_SESSION['student']['image_path'] = $new_path;
            if ($result) {
                redirectwithPost("index.php?action=view_student_profile", 1, "Vos informations ont été modifiées avec succès.");
                exit();
            } else {
                Redirect("index.php?action=view_student_profile");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=view_student_profile", 0, "Merci de remplir tous les champs.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To GET all Courses From Data Base
function getallcoursesforstudentController()
{
    if (isset($_SESSION['student'])) {
        $class_id = $_SESSION['student']['class_id'];
        $modules = getallModule($class_id);
        $elements = getelementsforspecificClasse($class_id);
        require("views/etudiant/course/courses.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function To Read pdf Course Controller
function readcoursepdfController()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['course_path'])) {
            require("views/etudiant/course/read_course.php");
        } else {
            Redirect("index.php?action=courses");
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function To GET ALL Student in The Same Classe
function getstudentinsameclasseController()
{
    if (isset($_SESSION['student'])) {
        $class_id = $_SESSION['student']['class_id'];
        $students = getallstudentinsameClasse($class_id);
        require("views/etudiant/student_list.php");
    } else {
        echo "Accès non autorisé";
    }
}



// Function To GET all books Controller
function getallbooksController()
{
    if (isset($_SESSION['student'])) {
        $categories = getallCategories();
        $all_book = getavailableBook();
        require("views/etudiant/books/all_books.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function of Controller To Filter book in Student Part

function studentsearchbookController()
{
    if (isset($_SESSION['student'])) {
        if (isset($_POST['search']) && (!empty($_POST['category']) || !empty($_POST['isbn']) || !empty($_POST['name']))) {
            echo "Code executed <br><br>";
            $category = "nulle";
            $isbn = "nulle";
            $name = "nulle";
            if (!empty($_POST['category'])) {
                $category = $_POST['category'];
            }
            if (!empty($_POST['isbn'])) {
                $isbn = $_POST['isbn'];
            }
            if (!empty($_POST['name'])) {
                $name = $_POST['name'];
            }
            $all_book = filterbookforspecificTerms($category, $isbn, $name);
            $categories = getallCategories();
            require("views/etudiant/books/search_book.php");
        } else {
            Redirect("index.php?action=all_books");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function to Set Request Book From Student Into Data Base

function studentrequestbookController()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['expiration_date']) && !empty($_POST['book_id'])) {
            $expiration_date = $_POST['expiration_date'];
            $book_id = $_POST['book_id'];
            $student_id = $_SESSION['student']['student_id'];
            $check_accept_request_one = checkonestudentaccepeterequestinlastweek($student_id);
            if ($check_accept_request_one > 3) {
                redirectwithPost("index.php?action=all_books", 0, "Vous avez dépassé le nombre de demandes autorisées : vous ne pouvez pas faire plus de trois demandes au cours des 7 derniers jours.");
                exit();
            }
            $result = addrequeststudentbookaction($student_id, $book_id, $expiration_date);
            if ($result) {
                redirectwithPost("index.php?action=all_books", 1, "Votre demande a été envoyée avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=all_books", 0, "Une erreur est Survenue lors de l'envoi de votre demande");
                exit();
            }
        } else {
            Redirect("index.php?action=all_books");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function of Controller  To View the Status Of My Request book
function allmyrequestbookController()
{
    if (isset($_SESSION['student'])) {
        $student_id = $_SESSION['student']['student_id'];
        $results = getallmyrequestbook($student_id);
        require("views/etudiant/books/request_books.php");
    } else {
        echo "Accès non autorisé";
    }
}



//Function OF Controller To Uplad CV
function uploadcvController()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['myresume'])) {
            $link_not_clear = $_POST['myresume'];
            $link_clear = str_replace("view?usp=sharing", "preview", $link_not_clear);
            $student_id = $_SESSION['student']['student_id'];
            $result = updatestudnetCV($link_clear, $student_id);
            if ($result) {
                $_SESSION['student']['cv_path'] = $link_clear;
                redirectwithPost("index.php?action=Myresume", 1, "Votre CV a été ajouté avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=Myresume", 0, "Aucune modification efféctue sur votre CV.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=Myresume", 0, "Aucune modification effectuée sur votre CV.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

function MyresumeviewController()
{
    if (isset($_SESSION['student'])) {
        include("views/etudiant/CV/uploadCV.php");
    } else {
        echo "Accès non autorisé";
    }
}

function studentplanningannuelleController()
{
    if (isset($_SESSION['student'])) {
        include("views/etudiant/planning_annuelle.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To View My Linden 
function viewMyLinkdenController()
{
    if (isset($_SESSION['student'])) {
        include("views/etudiant/Linkden/viewMyLinkden.php");
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
// Contrommer To Upload my Linkedin Profile
function uploadMyLinkedinProfileController()
{
    if (isset($_SESSION['student'])) {
        if (!empty($_POST['myAccountLinkden'])) {
            $linkedin_path = $_POST['myAccountLinkden'];
            $student_id = $_SESSION['student']['student_id'];
            $result = updatelinkedinPathintostudentTable($student_id, $linkedin_path);
            if ($result) {
                $_SESSION['student']['linkedin_path'] = $linkedin_path;
                redirectwithPost("index.php?action=viewMyLinkden", 1, "Votre compte LinkedIn a été ajouté avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=viewMyLinkden", 0, "Aucune modification n'a été effectuée.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=viewMyLinkden", 0, "Aucune modification effectuée.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
