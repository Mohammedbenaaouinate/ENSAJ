<?php
require_once("models/student_serviceModel.php");


// Function Of Controlller to Display All School Certificate Requests
function getallcertificaterequestsController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $service_status = 0;
        $service_type = 1;
        $requests = getallrecordsofspecifictypeofService($service_status, $service_type);
        $services_already_served = getallservicesaleardyServed($service_type);
        require("views/scolarite/school_certificate/all_school_certificate.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function Of Controller When We Click on View we shoud Change the status to up And Diplay The Print Page

function viewstudentcertificateController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['student_id']) && !empty($_POST['service_id'])) {
            $student_id = $_POST['student_id'];
            $service_id = $_POST['service_id'];
            // $result = updateserviceStatus($service_id)
            $student_info = getstudentInfo($student_id);
            require("views/scolarite/school_certificate/view_school_certificate.php");
        } else {
            Redirect("index.php?action=all_school_certificate");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Update The service_status after printung the school certificate

function updaterequestafterprintController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id'])) {
            $service_status = 1;
            $service_id = $_POST['service_id'];
            $approved_date = $_POST['approved_date'];
            $result = updateserviceStatus($service_status, $service_id);
            $set_approved_date = setapproveddateforschoolCerticate($service_id, $approved_date);
            if ($result && $set_approved_date) {
                redirectwithPost("index.php?action=all_school_certificate", 1, "La demande a été traitée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=all_school_certificate", 0, "Une erreur est survenue lors de la modification dans la base de données");
                exit();
            }
        } else {
            Redirect("index.php?action=all_school_certificate");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To Update The service status to 2 And Insert cause (That's Mean refused)

function  updaterequestcertifacateaftersetrefused()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id']) && !empty($_POST['rejection_reason'])) {
            $service_status = 2;
            $service_id = $_POST['service_id'];
            $rejection_reason = $_POST['rejection_reason'];
            $result = updatestatusendsetrjectionReason($service_id, $service_status, $rejection_reason);
            if ($result) {
                redirectwithPost("index.php?action=all_school_certificate", 1, "La demande a été rejté");
                exit();
            } else {
                redirectwithPost("index.php?action=all_school_certificate", 0, "Une erreur est survenue lors de le traitement de cette requête.");
                exit();
            }
        } else {
            Redirect("index.php?action=all_school_certificate");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}






/////   New Part (TemporarilyWithdrawn)
// Function To get All requets of TemporarilyWithdrawn Requests From Data Base 
function getalltemporarilywithdrawnrequestsController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $service_status = 0;
        $service_type = 2;
        $requests = getallrecordsofspecifictypeofService($service_status, $service_type);
        $services_already_served = getallservicesaleardyServed($service_type);
        require("views/scolarite/temporarily_withdrawn/all_temporarily_withdrawn.php");
    } else {
        echo "Accès non autorisé";
    }
}


// Function To Update The service status to 2 And Insert cause (That's Mean refused)

function updaterequesttemporarilywithdrawnaftersetrefused()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id']) && !empty($_POST['rejection_reason'])) {
            $service_status = 2;
            $service_id = $_POST['service_id'];
            $rejection_reason = $_POST['rejection_reason'];
            $result = updatestatusendsetrjectionReason($service_id, $service_status, $rejection_reason);
            if ($result) {
                redirectwithPost("index.php?action=all_temporarily_withdrawn", 1, "La demande a été rejté");
                exit();
            } else {
                redirectwithPost("index.php?action=all_temporarily_withdrawn", 0, "Une erreur est survenue lors de le traitement de cette requête.");
                exit();
            }
        } else {
            Redirect("index.php?action=all_temporarily_withdrawn");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To view The Views the Stdudent Information Before Printing
function viewstudenttemporarilywithdrawnController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['student_id']) && !empty($_POST['service_id'])) {
            $student_id = $_POST['student_id'];
            $service_id = $_POST['service_id'];
            $student_info = getstudentInfo($student_id);
            require("views/scolarite/temporarily_withdrawn/show_temporarily_withdrawn.php");
        } else {
            Redirect("index.php?action=all_temporarily_withdrawn");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To Update The Status of temporarily_with drawn After Printing The Page

function changestatustemporarilyafterprintingController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id'])) {
            $service_status = 1;
            $service_id = $_POST['service_id'];
            $result = updateserviceStatus($service_status, $service_id);
            if ($result) {
                redirectwithPost("index.php?action=all_temporarily_withdrawn", 1, "La demande a été traitée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=all_temporarily_withdrawn", 0, "Une erreur est survenue lors de la modification dans la base de données");
                exit();
            }
        } else {
            Redirect("index.php?action=all_temporarily_withdrawn");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function get All Marks Request from Data Base 

function getallmarksrequestsController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $service_status = 0;
        $service_type = 4;
        $requests = getallrecordsofspecifictypeofService($service_status, $service_type);
        $services_already_served = getallservicesaleardyServed($service_type);
        require("views/scolarite/marks/all_marks_requests.php");
    } else {
        echo "Accès non autorisé";
    }
}


// Function To Get Accept to Change the request mark To Accepet SET 1 ON service_status

function acceptrequestmarkController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id'])) {
            $service_status = 1;
            $service_id = $_POST['service_id'];
            $result = updateserviceStatus($service_status, $service_id);
            if ($result) {
                redirectwithPost("index.php?action=all_marks_requests", 1, "La demande a été traitée avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=all_marks_requests", 0, "Une erreur est survenue lors de la modification dans la base de données");
                exit();
            }
        } else {
            Redirect("index.php?action=all_marks_requests");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}



/// Function Of Controller To Refuse marks Request 
function refusemarkrequestController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['service_id']) && !empty($_POST['rejection_reason'])) {
            $service_status = 2;
            $service_id = $_POST['service_id'];
            $rejection_reason = $_POST['rejection_reason'];
            $result = updatestatusendsetrjectionReason($service_id, $service_status, $rejection_reason);
            if ($result) {
                redirectwithPost("index.php?action=all_marks_requests", 1, "La demande a été rejté");
                exit();
            } else {
                redirectwithPost("index.php?action=all_marks_requests", 0, "Une erreur est survenue lors de le traitement de cette requête.");
                exit();
            }
        } else {
            Redirect("index.php?action=all_marks_requests");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


/// New Part To Get All Agreement For InternShip Requests

function getallinternshiprequestsController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $requests = getallagreementRequests();
        $agreement_aleardy_served = getallagreementaleardyserved();
        require("views/scolarite/internship_agreement/all_internship_agreement.php");
    } else {
        echo "Accès non autorisé";
    }
}


/// Controller To Change the Argeement internship to refused SET 1 IN DATA BASE

function changeargeementinternshiptorefusedController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['agreement_id']) && !empty($_POST['rejection_reason'])) {
            $agremeent_id = $_POST['agreement_id'];
            $rejection_reason = $_POST['rejection_reason'];
            $result = refuseagreementinternshipRequest($agremeent_id, $rejection_reason);
            if ($result) {
                redirectwithPost("index.php?action=all_internship_agreement", 1, "la demande a été refusée.");
                exit();
            } else {
                redirectwithPost("index.php?action=all_internship_agreement", 0, "Une erreur est Survenue Lors de la modification de la status de la base de données");
                exit();
            }
        } else {
            Redirect("index.php?action=all_internship_agreement");
        }
    } else {
        echo "Accès non autorisé";
    }
}



// Function Of Controller To view Internship agreeement With Student Information And Company Infotmation


function viewinternshipagreementController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['student_id']) && !empty($_POST['agreement_id'])) {
            $student_id = $_POST['student_id'];
            $agreement_id = $_POST['agreement_id'];
            $student = getstudentmoreInfo($student_id);
            $convention = getagreementinternshipInfo($agreement_id);
            $directeur = getheadofschoolinfo();
            require("views/scolarite/internship_agreement/view_internship_agreement.php");
        } else {
            Redirect("index.php?action=all_internship_agreement");
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller To Update The Agreement status After Accepting

function changeagreementinternshiptoacceptedController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['agreement_id'])) {
            $agreement_id = $_POST['agreement_id'];
            $result = acceptagreementinternshipRequest($agreement_id);
            if ($result) {
                redirectwithPost("index.php?action=all_internship_agreement", 1, "La demande de la convention de stage est acceptée.");
                exit();
            } else {
                redirectwithPost("index.php?action=all_internship_agreement", 0, "Une erreur est Survenue Lors de la modification de la status de la base de données");
                exit();
            }
        } else {
            Redirect("index.php?action=all_internship_agreement");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function Of Controller To Dispaly The Absence List With Specialization

function absencelistController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $specializations = getallSpecilizations();
        require("views/scolarite/absence_list/absence_list.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Get A specific List Of Student And Information Of Model For A specific Classe

function getspecificstudentabsencelistController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['field_id']) && !empty($_POST['class_id']) && !empty($_POST['day']) && !empty($_POST['period_time'])) {
            $field_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $period_time = $_POST['period_time'];
            $day = $_POST['day'];
            $specializations = getallSpecilizations();
            $classes = getclasseforoneSpecialization($field_id);
            $students = getallstudents($class_id);
            $seance_info = getallinformationofseance($class_id, $day, $period_time);

            if ($seance_info === false) {
                redirectwithPost("index.php?action=absence_list", 1, "Cette séance n'existe pas dans l'emploi du temps");
                exit();
            } else {
                $module_or_element_name = $seance_info['modul_code'];
                $result = getintervenantofmoduleorelement($module_or_element_name, $class_id);
                if (!empty($result['intervenant'])) {
                    $intervenant = $result['intervenant'];
                } else {
                    $intervenant = "";
                }
                if (isset($result['element_id'])) {
                    $module = "Element";
                } else {
                    $module = "Module";
                }
                require("views/scolarite/absence_list/get_absence_list.php");
            }
        } else {
            Redirect("index.php?action=absence_list");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// <----------------------------------------------> //

// Function To View The Student absence list  in absence Management Part
function getviewforabsencemanagementController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $specializations = getallSpecilizations();
        require("views/scolarite/absence_management/absence_management_view.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Function To Get Specific classe of Students
function getclassstudentsaveabsenceController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['field_id']) && !empty($_POST['class_id'])) {
            $specialization_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $specializations = getspecializations();
            $classes = getclasseforoneSpecialization($specialization_id);
            $students = getallstudents($class_id);
            $semesters = getallsemesters();
            require("views/scolarite/absence_management/save_classe_of_student.php");
        } else {
            Redirect("index.php?action=generate_absence_list");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller Ajax To GET ALL Module for specific CLasse in Specific Semester

function getallmodulewithElementforspecificClasseController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['semester_id']) && !empty($_POST['class_id'])) {
            $semester_id = $_POST['semester_id'];
            $class_id = $_POST['class_id'];
            $result = getallmoduleforspecificClasse($semester_id, $class_id);
            echo json_encode($result);
        }
    } else {
        echo "Accès non autorisé";
    }
}
//Controller Ajax To GET All Module with Element For Specific Classe Or Semester
function getmoduleswithelementController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (!empty($_POST['semester_id']) && !empty($_POST['class_id'])) {
            $semester_id = $_POST['semester_id'];
            $class_id = $_POST['class_id'];
            $result = getallmodulewithelementforspecificClasse($semester_id, $class_id);
            echo json_encode($result);
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To Save Abasence into Data Base 

function saveabsencelistController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (
            empty($_POST['semester_id']) ||  empty($_POST['seance_date'])
            || empty($_POST['seance_time'])
            || (!empty($_POST['module_id']) && !empty($_POST['module_with_element_id']))
            || (empty($_POST['module_id']) && empty($_POST['module_with_element_id']))
            || empty($_POST['class_id']) || (!isset($_POST['abs_justify']) && !isset($_POST['abs_unjustified']))
        ) {
            redirectwithPost("index.php?action=generate_absence_list", 0, "Il y a des champs importants pour le traitement de cette opération qu'il faut remplir.Erreur dans les informations saisies!");
            exit();
        } else {
            $semester_id = $_POST['semester_id'];
            $seance_date = $_POST['seance_date'];
            $seance_time = $_POST['seance_time'];
            $class_id = $_POST['class_id'];
            $module_id = $_POST['module_id'];
            $module_with_element_id = $_POST['module_with_element_id'];
            if (isset($_POST['abs_justify'])) {
                $abs_justify = $_POST['abs_justify'];
            } else {
                $abs_justify = [];
            }
            if (isset($_POST['abs_unjustified'])) {
                $abs_unjustified = $_POST['abs_unjustified'];
            } else {
                $abs_unjustified = [];
            }

            if (!empty($_POST['module_id'])) {
                $result = insertmoduleAbsence($seance_time, $seance_date, $abs_justify, $class_id, $module_id, $semester_id, $abs_unjustified);
                if ($result) {
                    redirectwithPost("index.php?action=generate_absence_list", 1, "L'absence a été enregistrée avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=generate_absence_list", 0, "Une erreur est survenue lors de l'enregistrement de l'absence.");
                    exit();
                }
            } elseif (!empty($_POST['module_with_element_id'])) {
                $result = insertmodule_with_elementAbsence($seance_time, $seance_date, $abs_justify, $class_id, $module_with_element_id, $semester_id,  $abs_unjustified);
                if ($result) {
                    redirectwithPost("index.php?action=generate_absence_list", 1, "L'absence a été enregistrée avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=generate_absence_list", 0, "Une erreur est survenue lors de l'enregistrement de l'absence.");
                    exit();
                }
            } else {
                redirectwithPost("index.php?action=generate_absence_list", 0, "Le module concerné par l'absence n'a pas été choisi.");
                exit();
            }
        }
    } else {
        echo "Accès non autorisé";
    }
}

//Controller To Display The View of Edit
function editviewabsenceliststudentController()
{
    if (isset($_SESSION['scolarite_id'])) {
        $specializations = getallSpecilizations();
        $semesters = getallsemesters();
        require("views/scolarite/absence_management/edit_absence_students.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Controller To display the Liste OF of Absnece For Specific Classe
function searchstudentabsenceController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (
            !empty($_POST['class_id']) && !empty($_POST['semester_id'])
            && !empty($_POST['seance_date']) && !empty($_POST['seance_time'])
        ) {
            $specialization_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $semester_id = $_POST['semester_id'];
            $seance_date = $_POST['seance_date'];
            $seance_time = $_POST['seance_time'];
            $specializations = getspecializations();
            $classes = getclasseforoneSpecialization($specialization_id);
            $semesters = getallsemesters();
            $students_absence = getstudentsAbsenceforspecificSession($seance_time, $seance_date, $class_id, $semester_id);
            if ($students_absence === false) {
                redirectwithPost("index.php?action=edit_student_absence", 0, "Aucune absence enregistrée à cette date ou à cette heure pour cette classe.");
                exit();
            } else {
                $firstligne = $students_absence[0];
                if (!empty($firstligne['modul_id'])) {
                    $module_id = $firstligne['modul_id'];
                    $module_info = getmoduleInfo($module_id);
                    $module_name = $module_info['modul_name'];
                    require("views/scolarite/absence_management/absence_list_student_edit.php");
                } elseif (!empty($firstligne['modul_element_id'])) {
                    $module_with_element_id = $firstligne['modul_element_id'];
                    $module_with_element_info = getmodulewithelementINFO($module_with_element_id);
                    $module_with_element_name = $module_with_element_info['module_name'];
                    require("views/scolarite/absence_management/absence_list_student_edit.php");
                }
            }
        } else {
            redirectwithPost("index.php?action=edit_student_absence", 0, "Vous devez sélectionner les informations pour afficher la liste d'absences à modifier.");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To Update The Absence 
function updateabsencelistController()
{
    if (isset($_SESSION['scolarite_id'])) {
        if (
            !empty($_POST['specialization_id']) && !empty($_POST['class_id'])
            && !empty($_POST['semester_id']) && !empty($_POST['seance_date'])
            && !empty($_POST['seance_time'])
        ) {
            if (isset($_POST['abs_justify'])) {
                $abs_justify = $_POST['abs_justify'];
                $result = updatestudentabsenceTojustify($abs_justify);
                if ($result) {
                    redirectwithPost("index.php?action=edit_student_absence", 1, "Les modifications ont été apportées avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=edit_student_absence", 0, "Aucune modification apportée sur la liste des absences.");
                    exit();
                }
            }
            if (isset($_POST['abs_unjustified'])) {
                $abs_unjustified = $_POST['abs_unjustified'];
                $result = updatestudentabsenceToUnjustified($abs_unjustified);
                if ($result) {
                    redirectwithPost("index.php?action=edit_student_absence", 1, "Les modifications ont été apportées avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=edit_student_absence", 0, "Aucune modification apportée sur la liste des absences.");
                    exit();
                }
            } else {
                Redirect("index.php?action=edit_student_absence");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=edit_student_absence", 0, "Des informations pour exécuter ce service sont manquantes");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Planning 
function scolariteplanningController()
{
    if (isset($_SESSION['scolarite_id'])) {
        include("views/scolarite/planning.php");
    } else {
        echo "Accès non autorisé";
    }
}
