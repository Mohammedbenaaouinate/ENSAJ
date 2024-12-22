<?php
session_start();
require_once "controllers/departmentController.php";
require_once "controllers/classController.php";
require_once "controllers/dashboardController.php";
require_once "controllers/classroomController.php";
require_once "controllers/loginController.php";
require_once "controllers/profilController.php";
require_once("controllers/usersController.php");
require_once("controllers/specializationsController.php");
require_once("controllers/modulemanagementController.php");
require_once("controllers/planningController.php");
require_once("controllers/schedule_adminController.php");
require_once("controllers/admin_cv_Controller.php");
require_once("controllers/newstudentclasseController.php");

//section bibliothecaire
require_once "controllers/bookController.php";
require_once "controllers/dashboard_biblioController.php";
require_once "controllers/login_prof_student_bibilioController.php";
require_once "controllers/profil_biblioController.php";
require_once "controllers/category_bookController.php";
//Section chef departement
require_once "controllers/dashboard_chefController.php";
require_once "controllers/scheduleController.php";
require_once "controllers/schedule_ExamController.php";
require_once "controllers/schedule_RattController.php";
require_once "controllers/profil_chefController.php";
require_once "controllers/reste_actionController.php";
require_once("controllers/student_listController.php");
//Section professeur
require_once "controllers/prof_actionController.php";
require_once "controllers/profil_profController.php";
//Section chef filiere
require_once "controllers/schedule_cordonnateurController.php";
require_once "controllers/profil_chef_filiereController.php";
//Section Scolarité
require_once("controllers/student_service_Controller.php");
require_once("controllers/scolarite_dashboard_profileController.php");
require_once("controllers/statistic_attendanceController.php");
// Student Section
require_once("controllers/studentController.php");
require_once("controllers/student_scheduleController.php");


if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
            // Admin Part
        case "test":
            include("views/admin/test.php");
            break;
        case "departement":
            show_departementAction();
            break;
        case "show_add_departement":
            show_add_departementAction();
            break;
        case "add_departement":
            add_departementAction();
            break;
        case "delete_departement":
            delete_departementAction();
            break;
        case "show_edit_departement":
            show_edit_departementAction();
            break;
        case "edit_department":
            edit_departmentAction();
            break;

        case "class":
            show_classAction();
            break;
        case "show_add_class":
            show_add_classAction();
            break;
        case "add_class":
            add_classAction();
            break;
        case "delete_class":
            delete_classAction();
            break;
        case "show_edit_class":
            show_edit_classAction();
            break;
        case "edit_class":
            edit_classAction();
            break;
        case "add_excel_prof":
            add_excel_profAction();
            break;
        case "add_excel_etud":
            add_excel_etudAction();
            break;
        case "dashboard":
            show_adminDashboardAction();
            break;
        case "salle":
            show_salleAction();
            break;
        case "show_add_salle":
            showaddsalleController();
            break;
        case "add_salle":
            add_salleAction();
            break;
        case "delete_salle":
            delete_salleAction();
            break;
        case "show_edit_salle":
            show_edit_salleAction();
            break;
        case "edit_salle":
            edit_salleAction();
            break;
        case "available_salle_admin":
            show_available_salle_adminAction();
            break;


            //login & profil==> admin
        case "login":
            show_loginAction();
            break;
        case "verify_login":
            verify_loginAction();
            break;
        case "profil":
            show_profilAction();
            break;
        case "edit_profil":
            edit_profilAction();
            break;
        case "part_pass":
            edit_passAction();
            break;
        case "logout_admin":
            logout_adminAction();
            break;
            ///
        case "students":
            getstudentinformationsController();
            break;
        case "add-student":
            addstudentController();
            break;
        case "add-student-action";
            addstudentactionController();
            break;
        case "edit-student":
            editstudentController();
            break;
        case "update-student-action":
            updatestudentactionController();
            break;
        case "delete-student-action":
            deletestudentactionController();
            break;
        case "filter_students":
            filiterstudentController();
            break;
        case "teachers":
            getalladminteachersController(1);
            break;
        case "admins":
            getalladminteachersController(2);
            break;
        case "librarians":
            getlibrariansController();
            break;
        case "add-librarian":
            addlibrarianController();
            break;
        case "add-librarian-action":
            addlibrarianactionController();
            break;
        case "add-teacher-admin":
            addteacheradminController();
            break;
        case "add-teacher-admin-action":
            addteacheradminactionController();
            break;
        case "delete-teacher-action":
            deleteadminteacheractionController();
            break;
        case "delete-admin-action":
            deleteadminteacheractionController();
            break;
        case "delete-librarian-action":
            deletelibrarianactionController();
            break;
        case "edit-librarian":
            editlibrarianController();
            break;
        case "update-librarian-action":
            updatelibarianactionController();
            break;
        case "scolarite":
            getscolaritesController();
            break;
        case "add-scolarite":
            addscolariteController();
            break;
        case "add-scolarite-action":
            addscolariteactionController();
            break;
        case "delete-scolarite-action":
            deletescolariteactionController();
            break;
        case "edit-scolarite":
            editscolariteController();
            break;
        case "update-scolarite-action":
            updatescolariteactionController();
            break;
        case "edit-admin-teacher":
            editadminteacherController();
            break;
        case "update-admin-teacher-action":
            updateadminteacherAction();
            break;
        case "specializations":
            getallspecializationsController();
            break;
        case "add-specialization":
            getalldepartementController();
            break;
        case "add-specialization-action":
            addspecializationactionController();
            break;
        case "delete-specialization-action":
            deletespecializationactionController();
            break;
        case "edit-specialization":
            editspecializationController();
            break;
        case "update-specialization-action":
            updatespecializationactionController();
            break;
        case "module_management":
            displayallsubjectanddmoduleController();
            break;
        case "add-subject":
            addsubjectController();
            break;
        case "add-subject-action":
            addsubjectactionController();
            break;
        case "ajouter-module":
            ajoutermoduleController();
            break;
        case "ajouter-module-action":
            ajoutermoduleactionController();
            break;
        case "delete_subject_action":
            deletesubjectactionController();
            break;
        case "edit-subject":
            editsubjectController();
            break;
        case "update-subject-action":
            updatesubjectactionController();
            break;
        case "supprimer_module_action":
            deletemoduleactionController();
            break;
        case "modifier_module_page":
            modifiermoduleController();
            break;
        case "modifier-module-action":
            modifiermoduleactionController();
            break;
        case "supprimer-element-action":
            supprimerelementactionController();
            break;
        case "ajouter-element":
            ajouterelementController();
            break;
        case "ajouter-element-action":
            ajouterelementactionController();
            break;
        case "filter_module":
            filtermoduleController();
            break;
            //using Ajax To get Classes of Specefic Specialization used in filiter student based on of specialization and classe(definded in ModuleController)
        case "get_classes_of_one_specification":
            getclassesforspecificspcializationController();
            break;

            // using Ajax TO get All professeur belongs to the same department used in add and edit specialization(defined in specializationController)
        case "get_professeurs_of_same_departement":
            getProfesseursforsamedepartementController();
            break;
            //
        case "planning":
            planningviewController();
            break;
        case "displayEvents":
            displayalleventsController();
            break;
        case "delete_event":
            deleteeventactionController();
            break;
        case "add_event":
            addeventactionController();
            break;
        case "edit_event":
            editeventController();
            break;
        case "update_event":
            updateeventactionController();
            break;
        case "print":
            printController();
            break;
        case "pdf_planning":
            pdfplanningController();
            break;
        case "save_planning":
            savefileController();
            break;
            //  ADD AND DELETE PART OF Head of school Part (directeur)
        case "head_of_school":
            gettheheadofschoolController();
            break;
        case "add_head_of_school":
            addheadofschoolController();
            break;
        case "add_head_of_school_action":
            addheadofschoolactionController();
            break;
        case "delete-directeur-action":
            deletedirecteuractionController();
            break;
            // Liste des CV pour l'ensemble des étudiant
        case "cv_list":
            getallstudentsinfoController();
            break;
        case "filter_cv_students":
            filterstudentscvController();
            break;
        case "student_status":
            viewuploadstudentfileCSV();
            break;
        case "changeclasseofStudent":
            changeclasseofstudentController();
            break;
        case "second_year_student":
            secondyearstudentviewController();
            break;
        case "change_my_class":
            changemycurrentclasseController();
            break;
        case "end_year_student":
            viewendyearstudentsController();
            break;
        case "get_end_year_student":
            getendyearstudentsforspecificlasseController();
            break;
        case "archiver_adm_students":
            archiveradmendyearstudentsController();
            break;
        case "old_year_winner":
            DisplayAllLaureatController();
            break;
        case "filter_old_laureat":
            filteroldLaureatController();
            break;

            //emploi admin

        case "schedule_admin_classes":
            list_specializations_for_adminAction();
            break;
        case "show_view_schedule_for_admin":
            show_view_schedule_for_adminAction();
            break;
        case "show_add_schedule_for_admin":
            show_add_schedule_for_adminAction();
            break;

        case "insert_schedule_admin":
            insert_schedule_adminAction();
            break;
        case "delete_schedule_for_admin":
            delete_schedule_for_adminAction();
            break;

            //EXAM SCHEDULE
        case "schedule_admin_classes_exam":
            schedule_admin_classes_examAction();
            break;
        case "show_view_schedule_for_admin_exam":
            show_view_schedule_for_admin_examAction();
            break;
        case "show_add_schedule_exam_for_admin":
            show_add_schedule_exam_for_adminAction();
            break;

        case "add_schedule_exam_for_admin":
            add_schedule_exam_for_adminAction();
            break;

        case "delete_schedule_normal_for_admin":
            delete_schedule_normal_for_adminAction();
            break;


            //RATT SCHEDULE
        case "schedule_admin_classes_ratt":
            schedule_admin_classes_rattAction();
            break;
        case "show_view_schedule_for_admin_ratt":
            show_view_schedule_for_admin_rattAction();
            break;
        case "show_add_schedule_ratt_for_admin":
            show_add_schedule_ratt_for_adminAction();
            break;
        case "add_schedule_ratt_for_admin":
            add_schedule_ratt_for_adminAction();
            break;

        case "delete_schedule_ratt_for_admin":
            delete_schedule_ratt_for_adminAction();
            break;








            //section bibliothécaire
        case "show_add_book":
            show_add_book_Action();
            break;
        case "add_book":
            add_book_Action();
            break;
        case "show_all_book":
            all_book_Action("all");
            break;
        case "delete_book":
            delete_book_Action();
            break;
        case "show_edit_book":
            show_edit_book_Action();
            break;
        case "edit_book":
            edit_book_Action();
            break;
        case "search_book":
            all_book_Action("search");
            break;
        case "list_request":
            all_request_Action();
            break;
        case "accept_request":
            accept_request_Action();
            break;
        case "refuse_request":
            refuse_request_Action();
            break;
        case "taken_book":
            all_accepted_book_Action();
            break;
        case "returned":
            book_returned_Action();
            break;
        case "book_available":
            available_book_Action("all");
            break;
        case "search_available_book":
            available_book_Action("search");
            break;
            //
            // case "show_image_book":
            //     show_image_bookAction();
            // break;
            //
        case "dashboard_bibliothecaire":
            show_biblioDashboardAction();
            break;
        case "show_profile_biblio":
            show_biblioprofilAction();
            break;

        case "edit_profil_biblio":
            edit_profil_biblioAction();
            break;

        case "edit_pass_biblio":
            edit_pass_biblioAction();
            break;
        case "category_list":
            show_list_categoryAction();
            break;
        case "show_add_category_book":
            show_add_category_book_Controller();
            break;
        case "add_category_book":
            add_category_bookAction();
            break;
        case "delete_category_book":
            delete_category_bookAction();
            break;
        case "show_edit_category_book":
            show_edit_category_bookAction();
            break;
        case "edit_category_book":
            edit_category_bookAction();
            break;
        case "list_rejet":
            lists_student_rejectAction();
            break;
            //login_users(prof,student,biblio)
        case "show_users_login":
            show_all_users_login_Action();
            break;
        case "verify_login_user":
            verify_login_userAction();
            break;
        case "logout_users":
            logout_student_biblio_profAction();
            break;



            //chef departement section
        case "dashboard_chef":
            show_dashboard_chefAction();
            break;

        case "schedule":
            show_scheduleAction();
            break;
        case "schedule_table":
            show_schedule_tableAction();
            break;
        case "show_add_schedule":
            show_add_scheduleAction();
            break;
        case "get_list_module":
            get_list_moduleAction();
            break;
        case "add_schedule":
            add_scheduleAction();
            break;
        case "delete_schedule":
            delete_scheduleAction();
            break;

        case "list_schedule":
            list_scheduleAction();
            break;
        case "view_schedule_admin":
            view_schedule_adminAction();
            break;
        case "schedule_normal_admin":
            list_schedule_admin_normalAction();
            break;
        case "view_schedule_admin_normal":
            view_schedule_admin_normalAction();
            break;
        case "schedule_ratt_admin":
            list_schedule_admin_rattAction();
            break;
        case "view_schedule_admin_ratt":
            view_schedule_admin_rattAction();
            break;
            //EXAM SCHEDULE
        case "schedule_exam":
            show_schedule_examAction();
            break;
        case "schedule_table_normal":
            show_schedule_table_normalAction();
            break;
        case "show_add_schedule_exam":
            show_add_schedule_examAction();
            break;
        case "add_schedule_exam":
            add_schedule_examAction();
            break;
        case "show_edit_schedule_exam":
            show_edit_schedule_examAction();
            break;
        case "edit_schedule_exam":
            edit_schedule_examAction();
            break;
        case "delete_schedule_normal":
            delete_schedule_normalAction();
            break;
            //RATT SCHEDULE
        case "schedule_ratt":
            show_schedule_rattAction();
            break;
        case "schedule_table_ratt":
            show_schedule_table_rattAction();
            break;
        case "show_add_schedule_ratt":
            show_add_schedule_rattAction();
            break;
        case "add_schedule_ratt":
            add_schedule_rattAction();
            break;
        case "show_edit_schedule_ratt":
            show_edit_schedule_rattAction();
            break;
        case "edit_schedule_ratt":
            edit_schedule_rattAction();
            break;
        case "delete_schedule_ratt":
            delete_schedule_rattAction();
            break;
            //Profile
        case "show_profile_chef":
            show_chefprofilAction();
            break;

        case "edit_profil_chef":
            edit_profil_chefAction();
            break;

        case "edit_pass_chef":
            edit_pass_chefAction();
            break;
            //votre emploi
        case "user_emploi":
            show_schedule_chefAction();
            break;
        case "show_my_schedule":
            show_my_scheduleAction();
            break;
        case "user_emploi_ratt":
            show_schedule_chef_rattAction();
            break;
        case "show_my_schedule_ratt":
            show_my_schedule_rattAction();
            break;
        case "user_emploi_normal":
            show_schedule_chef_normalAction();
            break;
        case "show_my_schedule_normal":
            show_my_schedule_normalAction();
            break;

            //course chef
        case "upload_cour":
            show_courseAction();
            break;
        case "show_add_cour":
            show_add_courAction();
            break;
        case "add_cour":
            add_courAction();
            break;
        case "delete_course":
            delete_courAction();
            break;
        case "show_edit_course":
            show_edit_courAction();
            break;
        case "edit_cour":
            edit_courAction();
            break;
            //available classroom
        case "available":
            show_available_salleAction();
            break;
        case "lists_professeur":
            show_lists_professeurAction();
            break;

        case "planning_chef":
            show_planning_chef();
            break;
            // Liste des étudiants chef de département
        case "student_list_head_departement":
            getstudentforspecificdepartementController();
            break;
        case "head_of_departement_filter_student":
            filterstudentswithspecificconditionsController();
            break;

            //Section professeur 
        case "dashboard_prof":
            show_dashboard_prof();
            break;

        case "prof_emploi":
            show_schedule_profAction();
            break;
        case "show_prof_schedule":
            show_prof_scheduleAction();
            break;
        case "prof_emploi_ratt":
            show_schedule_prof_rattAction();
            break;
        case "show_prof_schedule_ratt":
            show_prof_schedule_rattAction();
            break;
        case "prof_emploi_normal":
            show_schedule_prof_normalAction();
            break;
        case "show_prof_schedule_normal":
            show_prof_schedule_normalAction();
            break;

        case "upload_cour_prof":
            show_course_profAction();
            break;
        case "show_add_prof_cour":
            show_add_cour_prof_Action();
            break;
        case "add_cour_prof":
            add_cour_profAction();
            break;
        case "delete_course_prof":
            delete_cour_profAction();
            break;
        case "show_edit_course_prof":
            show_edit_cour_profAction();
            break;
        case "edit_cour_prof":
            edit_cour_profAction();
            break;
        case "lists_professeur_of_prof":
            show_lists_professeur_of_profAction();
            break;
        case "show_profil_prof":
            show_prof_profilAction();
            break;
        case "edit_profil_prof":
            edit_profil_profAction();
            break;
        case "edit_pass_prof":
            edit_pass_profAction();
            break;
        case "planning_prof":
            show_planning_prof();
            break;
            //liste des étudiants professeur
        case "student_classes":
            showmyclasssesController();
            break;
        case "student_in_same_class":
            getallstudentsinsameclassesController();
            break;



            //Chef de filiere
        case "dashboard_filiere":
            show_dashboard_chef_filiereAction();
            break;

        case "schedule_chef_filiere":
            show_schedule_chef_filiereAction();
            break;
        case "schedule_table_filiere":
            show_schedule_table_filiereAction();
            break;
        case "show_add_schedule_filiere":
            show_add_schedule_filiereAction();
            break;

        case "add_schedule_filiere":
            add_schedule_filiereAction();
            break;
        case "delete_schedule_filiere":
            delete_schedule_filiereAction();
            break;

            //EXAM SCHEDULE
        case "schedule_exam_filiere":
            show_schedule_exam_filiereAction();
            break;
        case "schedule_table_normal_filiere":
            show_schedule_table_normal_filiereAction();
            break;
        case "show_add_schedule_exam_filiere":
            show_add_schedule_exam_filiereAction();
            break;
        case "add_schedule_exam_filiere":
            add_schedule_exam_filiereAction();
            break;

        case "delete_schedule_normal_filiere":
            delete_schedule_normal_filiereAction();
            break;
            //RATT SCHEDULE
        case "schedule_ratt_filiere":
            show_schedule_ratt_filiereAction();
            break;
        case "schedule_table_ratt_filiere":
            show_schedule_table_ratt_filiereAction();
            break;
        case "show_add_schedule_ratt_filiere":
            show_add_schedule_ratt_filiereAction();
            break;
        case "add_schedule_ratt_filiere":
            add_schedule_ratt_filiereAction();
            break;

        case "delete_schedule_ratt_filiere":
            delete_schedule_ratt_filiereAction();
            break;

            //votre emploi
        case "user_emploi_filiere":
            show_schedule_filiereAction();
            break;
        case "show_my_schedule_filiere":
            show_my_schedule_filiereAction();
            break;

        case "user_emploi_ratt_filiere":
            show_schedule_filiere_rattAction();
            break;
        case "show_my_schedule_ratt_filiere":
            show_my_schedule_ratt_filiereAction();
            break;

        case "user_emploi_normal_filiere":
            show_schedule_filiere_normalAction();
            break;
        case "show_my_schedule_normal_filiere":
            show_my_schedule_normal_filiereAction();
            break;

            //course 

        case "upload_cour_filiere":
            show_course_filiereAction();
            break;
        case "show_add_cour_filiere":
            show_add_cour_filiereAction();
            break;
        case "add_cour_filiere":
            add_cour_filiereAction();
            break;
        case "delete_course_filiere":
            delete_cour_filiereAction();
            break;
        case "show_edit_course_filiere":
            show_edit_cour_filiereAction();
            break;
        case "edit_cour_filiere":
            edit_cour_filiereAction();
            break;
            //available classroom
        case "available_filiere":
            show_available_salle_filiereAction();
            break;
        case "lists_professeur_filiere":
            show_lists_professeur_filiereAction();
            break;

        case "planning_filiere":
            show_planning_filiere();
            break;
            //profile
        case "show_profile_filiere":
            show_filiereprofilAction();
            break;

        case "edit_profil_filiere":
            edit_profil_filiereAction();
            break;

        case "edit_pass_filiere":
            edit_pass_filiereAction();
            break;
            //  Liste des étudiant dans la même filière
        case "chef_emploi_filiere":
            getstudentforspecificspecializationController();
            break;
            // Liste des étudiant dans le même classe
        case "chef_filiere_student_same_classe_filter":
            getlisteofstudentinsameclasseController();
            break;



            // Start Scolarité Section 
        case "scolarite_dashboard":
            viewscolaritedashboardController();
            break;

        case "view_profile_scolarite":
            viewprofilescolariteController();
            break;
        case "update_profile_action":
            updateprofilescolariteController();
            break;
        case "update_password_scolarite":
            updatepasswordscolariteController();
            break;


        case "all_school_certificate":
            getallcertificaterequestsController();
            break;
        case "view-student-certificate":
            viewstudentcertificateController();
            break;
        case "print_update_status":
            updaterequestafterprintController();
            break;
        case "delete_school_certificate":
            updaterequestcertifacateaftersetrefused();
            break;


        case "all_temporarily_withdrawn":
            getalltemporarilywithdrawnrequestsController();
            break;
        case "view_temporarily_withdrawn";
            viewstudenttemporarilywithdrawnController();
            break;
        case "change_status_temporarily_after_printing":
            changestatustemporarilyafterprintingController();
            break;
        case "delete_temporarily_withdrawn":
            updaterequesttemporarilywithdrawnaftersetrefused();
            break;


        case "all_marks_requests":
            getallmarksrequestsController();
            break;
        case "accept-mark-request":
            acceptrequestmarkController();
            break;
        case "refuse_mark_request":
            refusemarkrequestController();
            break;

        case "all_internship_agreement":
            getallinternshiprequestsController();
            break;
        case "refuse-agreement-request":
            changeargeementinternshiptorefusedController();
            break;
        case "view_assurance_image":
            include("views/scolarite/internship_agreement/view_assurance_student.php");
            break;
        case "view_internship_agreement":
            viewinternshipagreementController();
            break;
        case "update_status_agreement":
            changeagreementinternshiptoacceptedController();
            break;

        case "absence_list":
            absencelistController();
            break;
        case "get_specific_student_absence_list":
            getspecificstudentabsencelistController();
            break;
            // Start Save Absence Part
        case "generate_absence_list";
            getviewforabsencemanagementController();
            break;
        case "get_class_student_save_absence":
            getclassstudentsaveabsenceController();
            break;
            // Ajax Request To GET Module For Specific Classe on Specific Semester 
        case "get_all_module_without_element":
            getallmodulewithElementforspecificClasseController();
            break;
            // AJAX Request To GET Module With Elements For Specific Classe On Specific Semester
        case "get_all_module_with_element":
            getmoduleswithelementController();
            break;
        case "save_absence_list":
            saveabsencelistController();
            break;
        case "edit_student_absence":
            editviewabsenceliststudentController();
            break;
        case "search_student_absence":
            searchstudentabsenceController();
            break;
        case "update_absence_list":
            updateabsencelistController();
            break;
            // End Save Absence Part
        case "scolarite_planning":
            scolariteplanningController();
            break;
        case "abs_statistique":
            show_class_AbsentAction();
            break;
        case "select_statistic_attendance_of_class":
            select_statistic_attendance_of_classAction();
            break;
        case "filter_attendance_scolarity":
            filter_attendance_scolarityAction();
            break;
        case "visualize_attendance_of_student":
            visualize_attendance_of_studentAction();
            break;
            // END  Scolarité Section


            // Start Student Section

        case "check_student_login":
            checkstudentloginController();
            break;
        case "view_student_profile":
            getinformationforstudentprofileController();
            break;
        case "update_password_student_action":
            updatepasswordstudentController();
            break;
        case "update_student_personal_information_action":
            updatestudentpersonalinformationController();
            break;
        case "student_attestation_scolarite":
            getallstudentschoolcertificateController();
            break;
        case "student_request_attestation_scolaire":
            requestattestationscolaireController();
            break;
        case "printed_school_certicate_by_student":
            printschoolcertificateforStudent();
            break;
        case "student_retrait_provisoire":
            getallrequeststudentretraitprovisoireController();
            break;
        case "student_request_retrait_provisoire":
            requestretraitprovisoireController();
            break;
        case "student_relve_note":
            getallrequestsstudentrelvenoteController();
            break;
        case "student_request_relve_notes":
            requestrelvedenotesController();
            break;
        case "student_convention_stage":
            getallrequeststudentagreementinternshipController();
            break;
        case "ajouter_convention_stage":
            displayformtorequestsSchoolAgreementCertificate();
            break;
        case "ajouter_convention_stage_action":
            ajouterdemandeconventionstageController();
            break;
        case "student_planning_annuelle":
            studentplanningannuelleController();
            break;
        case "courses":
            getallcoursesforstudentController();
            break;
        case "read_course_pdf":
            readcoursepdfController();
            break;
        case "student_list":
            getstudentinsameclasseController();
            break;
        case "all_books":
            getallbooksController();
            break;
        case "student_search_book":
            studentsearchbookController();
            break;
        case "student_request_book":
            studentrequestbookController();
            break;
        case "request_books":
            allmyrequestbookController();
            break;

        case "show_schedule_student":
            show_schedule_studentAction();
            break;
        case "student_planning_ds_normale":
            show_schedule_student_normalAction();
            break;
        case "student_planning_ds_ratt":
            show_schedule_student_rattAction();
            break;
        case "Myresume":
            MyresumeviewController();
            break;
        case "uploadMyresume":
            uploadcvController();
            break;
        case "viewMyLinkden":
            viewMyLinkdenController();
            break;
        case "uploadMylinkden";
            uploadMyLinkedinProfileController();
            break;
            // END student Section
    }
} else {
    header("location:index.php?action=login");
}
