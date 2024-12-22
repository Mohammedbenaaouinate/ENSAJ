<?php
require_once("models/users.php");
require_once("functions/functions.php");
// Function To get All Classes of  School for Adding Students(to see the form)
function addstudentController()
{
    if (isset($_SESSION["admin_id"])) {
        $allclasses = getallstudentsClasses();
        require("views/admin/users/add-student.php");
    } else {
        echo "Accès non autorisé";
    }
}


// Function To ADD A New Student Into Data Base 
function addstudentactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname'])  && !empty($_POST['lastname'])
            && !empty($_POST['massar_student'])
            && !empty($_POST['student_apoge'])
            && !empty($_POST['cin_student'])
            && !empty($_POST['password'])
            && !empty($_POST['birth_date'])
            && !empty($_POST['email'])
        ) {

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $massar_student = $_POST['massar_student'];
            $student_apge = $_POST['student_apoge'];
            $email = $_POST['email'] . "@ensaj.ma";
            $cin_student = $_POST['cin_student'];
            $natinnality = $_POST['nationality'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];
            $sexe = $_POST['sexe'];
            $student_adress = $_POST['student_adress'];
            $birth_date = $_POST['birth_date'];
            $class_id = $_POST['class_id'];
            if ($_FILES['image_path']['size'] != 0) {
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/students/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = addStudent(
                    $firstname,
                    $lastname,
                    $massar_student,
                    $student_apge,
                    $email,
                    $cin_student,
                    $natinnality,
                    $password,
                    $phone_number,
                    $sexe,
                    $student_adress,
                    $birth_date,
                    $class_id,
                    $image_path
                );
                if ($result) {
                    redirectwithPost("index.php?action=students", 1, "L'étudiant est  ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=students", 0, "Une erreur est survenue lors de l'ajout de l'étudiant");
                    exit();
                }
            } else {
                $result = addStudent(
                    $firstname,
                    $lastname,
                    $massar_student,
                    $student_apge,
                    $email,
                    $cin_student,
                    $natinnality,
                    $password,
                    $phone_number,
                    $sexe,
                    $student_adress,
                    $birth_date,
                    $class_id,
                    "default_image.jpg"
                );
                if ($result) {
                    redirectwithPost("index.php?action=students", 1, "L'étudiant est  ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=students", 0, "Une erreur est survenue lors de l'ajout de l'étudiant");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=students", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}




// Controller to get All Students Informations 
function getstudentinformationsController()
{
    if (isset($_SESSION["admin_id"])) {
        $students = getStudents();
        $specializations = getallstudentsSpecialization();
        require_once("views/admin/users/students.php");
    } else {
        echo "Accès non autorisé";
    }
}
// Controller For Filter Students According to Their Classe 
function filiterstudentController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['class_id']) && !empty($_POST['class_id']) && isset($_POST['field_id']) && !empty($_POST['field_id'])) {
            $specialization_id = $_POST['field_id'];
            $class_id = $_POST['class_id'];
            $specializations = getallstudentsSpecialization();
            $classes = getclassesofsamespecialization($specialization_id);
            $same_students = getstudentsinsameClasse($class_id);
            require("views/admin/users/filter_students.php");
        } else {
            redirectwithPost("index.php?action=students", "null", "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Controller de DELETE STUDENT FROM DATA BASE
function deletestudentactionController()
{
    if (isset($_SESSION["admin_id"])) {
        $student_id = $_POST['student_id'];
        $result = deleteStudent($student_id);
        if ($result) {
            redirectwithPost("index.php?action=students", 1, "L'étudiant a été supprimé avec succès");
            exit();
        } else {
            redirectwithPost("index.php?action=students", 0, "Erreur lors de la Suppression du Etidinat");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
//Controller to edit Student (to see the from with the existing Information)
function editstudentController()
{
    if (isset($_SESSION["admin_id"])) {
        $student_id = $_POST['student_id'];
        $allclasses = getallstudentsClasses();
        $student_information = getsudentInformation($student_id);
        require_once("views/admin/users/edit-student.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Controller to update Student Information In Data Base

function updatestudentactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            isset($_POST['firstname']) && !empty($_POST['firstname'])
            && isset($_POST['lastname']) && !empty($_POST['lastname'])
            && isset($_POST['massar_student']) && !empty($_POST['massar_student'])
            && isset($_POST['student_apoge']) && !empty($_POST['student_apoge'])
            && isset($_POST['cin_student']) && !empty($_POST['cin_student'])&& isset($_POST['password'])
            && isset($_POST['birth_date']) && !empty($_POST['birth_date'])
            && isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['student_id']) && !empty($_POST['student_id'])
        ) {
            $student_id = $_POST['student_id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $massar_student = $_POST['massar_student'];
            $student_apge = $_POST['student_apoge'];
            $email = $_POST['email'] . "@ensaj.ma";
            $cin_student = $_POST['cin_student'];
            $natinnality = $_POST['nationality'];
            $password = $_POST['password'];
            $phone_number = $_POST['phone_number'];
            $sexe = $_POST['sexe'];
            $student_adress = $_POST['student_adress'];
            $birth_date = $_POST['birth_date'];
            $class_id = $_POST['class_id'];
            $old_image_path = $_POST['old_image_path'];
            if ($_FILES['image_path']['size'] != 0) {
                unlink("assets/students/" . $old_image_path);
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/students/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = updateStudent(
                    $student_id,
                    $firstname,
                    $lastname,
                    $massar_student,
                    $student_apge,
                    $email,
                    $cin_student,
                    $natinnality,
                    $password,
                    $phone_number,
                    $sexe,
                    $student_adress,
                    $birth_date,
                    $class_id,
                    $image_path
                );
                if ($result === true) {
                    redirectwithPost("index.php?action=students", 1, "Les informations de L'étudiant sont  modifié avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=students", 0, "Une erreur est survenue lors de la modfication des informations de l'étudiant");
                    exit();
                }
            } else {
                $result = updateStudent(
                    $student_id,
                    $firstname,
                    $lastname,
                    $massar_student,
                    $student_apge,
                    $email,
                    $cin_student,
                    $natinnality,
                    $password,
                    $phone_number,
                    $sexe,
                    $student_adress,
                    $birth_date,
                    $class_id,
                    $old_image_path
                );
                if ($result) {
                    redirectwithPost("index.php?action=students", 1, "Les informations de L'étudiant sont modifier avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=students", 0, "Une erreur est survenue lors de la modification des informations de l'étudiant");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=students", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To Display The Page Of Add Admin Or Add Teacher With All Departement

function addteacheradminController()
{
    if (isset($_SESSION["admin_id"])) {
        $departements = getallldepartements();
        require("views/admin/users/add-teacher-admin.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Controller To add teacher OR bibliothécaire OR Administrator  INTO Data Base
function addteacheradminactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname'])
            && !empty($_POST['password']) && !empty($_POST['email'])
            && !empty($_POST['phone_number']) && !empty($_POST['role_prof'])
            && !empty($_POST['grade']) && !empty($_POST['specialite'])
            && !empty($_POST['departement_id'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $grade = $_POST['grade'];
            $departement_id = $_POST['departement_id'];
            $specialite = $_POST['specialite'];
            $password = $_POST['password'];
            $role_prof = $_POST['role_prof'];
            if ($_FILES['image_path']['size'] != 0) {
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                if ($role_prof == 1) {
                    $destinationPath = "assets/teachers/" . $image_path;
                } elseif ($role_prof == 2) {
                    $destinationPath = "assets/admins/" . $image_path;
                } else {
                    // $destinationPath = "assets/bibliothecaires/" . $image_path;
                    exit();
                }
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = addteacheradmin(
                    $firstname,
                    $lastname,
                    $email,
                    $phone_number,
                    $grade,
                    $departement_id,
                    $specialite,
                    $password,
                    $role_prof,
                    $image_path
                );
                if ($result) {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 1, "Le professeur est  ajouté avec succès");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 1, "L'administrateur est  ajouté avec succès");
                        exit();
                    }
                } else {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de l'ajout du Professeur");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 0, "Une erreur est survenue lors de l'ajout de L'administrateur");
                        exit();
                    }
                }
            } else {
                $result = addteacheradmin(
                    $firstname,
                    $lastname,
                    $email,
                    $phone_number,
                    $grade,
                    $departement_id,
                    $specialite,
                    $password,
                    $role_prof,
                    "default_image.jpg"
                );
                if ($result) {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 1, "Le professeur est  ajouté avec succès");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 1, "L'administrateur est  ajouté avec succès");
                        exit();
                    }
                } else {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de l'ajout du Professeur");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 0, "Une erreur est survenue lors de l'ajout de L'administrateur");
                        exit();
                    }
                }
            }
        } else {
            redirectwithPost("index.php?action=admins", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function TO GET THE teachers OR admins OR librarians FROM DATA BASE 
function getalladminteachersController($role_prof)
{
    if (isset($_SESSION["admin_id"])) {
        if ($role_prof == 1) {
            $teachers = getalladminTeachers($role_prof);
            require_once("views/admin/users/teachers.php");
        } elseif ($role_prof == 2) {
            $admins = getalladminTeachers($role_prof);
            require_once("views/admin/users/admins.php");
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function To DELETE teachers OR admins OR librarians FROM DATA BASE

function deleteadminteacheractionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['teacher_id']) && !empty($_POST['teacher_id'])) {
            $result = deleteadminteacher($_POST['teacher_id']);
            if ($result === true) {
                redirectwithPost("index.php?action=teachers", 1, "Le professeur est supprimé avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de l'ajout de professeur.");
                exit();
            }
        } elseif (isset($_POST['admin_id']) && !empty($_POST['admin_id'])) {
            $result = deleteadminteacher($_POST['admin_id']);
            if ($result === true) {
                redirectwithPost("index.php?action=admins", 1, "L'administrateur est supprimer avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=admins", 0, " Une erreur est survenue lors de la supression de l'administrateur.");
                exit();
            }
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function to Display Edit  Teacher OR admin (showing Infomation)
function editadminteacherController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['admin_teacher_id'])) {
            $prof_id = $_POST['admin_teacher_id'];
            $result = getadminteacherInformation($prof_id);
            $departements = getallldepartements();
            require_once("views/admin/users/edit-admin-teacher.php");
        } else {
            Redirect("index.php?action=teachers");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}


// Function to Update Teacher OR Administrator OR Librarian
function updateadminteacherAction()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])
            && !empty($_POST['phone_number']) && !empty($_POST['role_prof']) &&
            !empty($_POST['grade'])  && !empty($_POST['specialite']) && !empty($_POST['departement_id'])
            && !empty($_POST['old_image_path']) && !empty($_POST['prof_id'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $role_prof = $_POST['role_prof'];
            $grade = $_POST['grade'];
            $specialite = $_POST['specialite'];
            $departement_id = $_POST['departement_id'];
            $prof_id = $_POST['prof_id'];
            $path_old_image = $_POST['old_image_path'];
            $old_role = $_POST['old_role'];
            if ($_FILES['image_path']['size'] != 0) {
                if ($old_role == 1) {
                    unlink("assets/teachers/" . $path_old_image);
                } elseif ($old_role == 2) {
                    unlink("assets/admins/" . $path_old_image);
                }
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                if ($role_prof == 1) {
                    $destinationPath = "assets/teachers/" . $image_path;
                } elseif ($role_prof == 2) {
                    $destinationPath = "assets/admins/" . $image_path;
                }
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = updateadminTeacher(
                    $firstname,
                    $lastname,
                    $password,
                    $email,
                    $phone_number,
                    $role_prof,
                    $grade,
                    $specialite,
                    $departement_id,
                    $image_path,
                    $prof_id
                );
                if ($result) {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 1, "Le professeur est  modifier avec succès");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 1, "L'administrateur est  modifier avec succès");
                        exit();
                    }
                } else {
                    if ($role_prof == 1) {
                        redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de la modification du Professeur");
                        exit();
                    } elseif ($role_prof == 2) {
                        redirectwithPost("index.php?action=admins", 0, "Une erreur est survenue lors de la modification de L'administrateur");
                        exit();
                    }
                }
            } else {
                if ($role_prof == $old_role) {
                    $result = updateadminTeacher(
                        $firstname,
                        $lastname,
                        $password,
                        $email,
                        $phone_number,
                        $role_prof,
                        $grade,
                        $specialite,
                        $departement_id,
                        $path_old_image,
                        $prof_id
                    );

                    if ($result) {
                        if ($role_prof == 1) {
                            redirectwithPost("index.php?action=teachers", 1, "Le professeur est  modifier avec succès");
                            exit();
                        } elseif ($role_prof == 2) {
                            redirectwithPost("index.php?action=admins", 1, "L'administrateur est  modifier avec succès");
                            exit();
                        }
                    } else {
                        if ($role_prof == 1) {
                            redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de la modification du Professeur");
                            exit();
                        } elseif ($role_prof == 2) {
                            redirectwithPost("index.php?action=admins", 0, "Une erreur est survenue lors de la modification de L'administrateur");
                            exit();
                        }
                    }
                } else {
                    // $path_old_image;
                    if ($old_role == 1 && $role_prof == 2) {
                        copy("assets/teachers/" . $path_old_image, "assets/admins/" . $path_old_image);
                        unlink("assets/teachers/" . $path_old_image);
                    } elseif ($old_role == 2 && $role_prof == 1) {
                        copy("assets/admins/" . $path_old_image, "assets/teachers/" . $path_old_image);
                        unlink("assets/admins/" . $path_old_image);
                    }
                    $result = updateadminTeacher(
                        $firstname,
                        $lastname,
                        $password,
                        $email,
                        $phone_number,
                        $role_prof,
                        $grade,
                        $specialite,
                        $departement_id,
                        $path_old_image,
                        $prof_id
                    );
                    if ($result) {
                        if ($role_prof == 1) {
                            redirectwithPost("index.php?action=teachers", 1, "Le professeur est  modifier avec succès");
                            exit();
                        } elseif ($role_prof == 2) {
                            redirectwithPost("index.php?action=admins", 1, "L'administrateur est  modifier avec succès");
                            exit();
                        }
                    } else {
                        if ($role_prof == 1) {
                            redirectwithPost("index.php?action=teachers", 0, "Une erreur est survenue lors de la modification du Professeur");
                            exit();
                        } elseif ($role_prof == 2) {
                            redirectwithPost("index.php?action=admins", 0, "Une erreur est survenue lors de la modification de L'administrateur");
                            exit();
                        }
                    }
                }
            }
        } else {
            redirectwithPost("index.php?action=admins", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Add A new Librarian Into Data Base

function addlibrarianactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname'])
            && !empty($_POST['email']) && !empty($_POST['phone_number'])
            && !empty($_POST['password'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $password = $_POST['password'];
            $role_employee = 1;
            if ($_FILES['image_path']['size'] != 0) {
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/bibliothecaires/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = addlibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $role_employee, $image_path);
                if ($result) {
                    redirectwithPost("index.php?action=librarians", 1, "Le bibliothécaire est ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=librarians", 0, "Une erreur est survenue lors de l'ajout de la bibliothécaire");
                    exit();
                }
            } else {
                $result = addlibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $role_employee, "default_image.jpg");
                if ($result) {
                    redirectwithPost("index.php?action=librarians", 1, "Le bibliothécaire est ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=librarians", 0, "Une erreur est survenue lors de l'ajout de la bibliothécaire");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=librarians", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To Get All librarians From Data Base

function getlibrariansController()
{
    if (isset($_SESSION["admin_id"])) {
        $librarians = getlibrarianResponsable(1);
        require("views/admin/users/librarians.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Controller For DELETING LIBRARIAN OR RESPONSABLE OF SCHOLARITE FROM DATA BASE
function deletelibrarianactionController()
{
    if (isset($_SESSION["admin_id"])) {
        $employee_id = $_POST['librarian_id'];
        if (!empty($employee_id)) {
            $result = deletelibrarianResponsable($employee_id);
            if ($result) {
                redirectwithPost("index.php?action=librarians", 1, "Le bibliothécaire est supprimé avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=librarians", 0, "Une erreur est survenue lors de la suppression de la biblithécaire");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=librarians", 0, "Des informations necessaires pour le traitement de cette requête sont monqué");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller fro edit librarian Information Show Infromation
function editlibrarianController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['libririan_id'])) {
            $librarian_id = $_POST['libririan_id'];
            $librarian = getlibrarianresponsableInfromation($librarian_id);
            require("views/admin/users/edit-librarian.php");
        } else {
            Redirect("index.php?action=librarians");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Controller To Update Infromation For A specific Librarian

function updatelibarianactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone_number'])
            && !empty($_POST['email']) && !empty($_POST['employee_id'])  && !empty($_POST['old_image_path'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $password = $_POST['password'];
            $employee_id = $_POST['employee_id'];
            $old_image_path = $_POST['old_image_path'];
            if ($_FILES['image_path']['size'] != 0) {
                unlink("assets/bibliothecaires/" . $old_image_path);
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/bibliothecaires/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = updatelibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $image_path, $employee_id);
                if ($result) {
                    redirectwithPost("index.php?action=librarians", 1, "Le bibliothécaire est modifier avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=librarians", 0, "Une erreur est survenue lors de la modification de la bibliothécaire");
                    exit();
                }
            } else {
                $result = updatelibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $old_image_path, $employee_id);
                if ($result) {
                    redirectwithPost("index.php?action=librarians", 1, "Le bibliothécaire est modifier avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=librarians", 0, "Une erreur est survenue lors de la modification de la bibliothécaire");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=librarians", 0, "Des informations necessaires pour le traitement de cette requête sont monqué");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Controller Pour ADD NEW Person Of Scolarité INTO DATA BASE
function  addscolariteactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname'])
            && !empty($_POST['email']) && !empty($_POST['phone_number'])
            && !empty($_POST['password'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $password = $_POST['password'];
            $role_employee = 2;
            if ($_FILES['image_path']['size'] != 0) {
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/scolarites/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = addlibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $role_employee, $image_path);
                if ($result) {
                    redirectwithPost("index.php?action=scolarite", 1, "Le membre de la scolarité a été ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=scolarite", 0, "Une erreur est survenue lors de l'ajout d'un membre de la scolarité.");
                    exit();
                }
            } else {
                $result = addlibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $role_employee, "default_image.jpg");
                if ($result) {
                    redirectwithPost("index.php?action=scolarite", 1, "Le membre de la scolarité a été ajouté avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=scolarite", 0, "Une erreur est survenue lors de l'ajout d'un membre de la scolarité.");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=scolarite", 0, "Vous devez remplir Tous Les champs nécessaire qui sont Marqué avec une étoile Rouge");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

//get all personals of Scolarités Controller
function getscolaritesController()
{
    if (isset($_SESSION["admin_id"])) {
        $scolarites = getlibrarianResponsable(2);
        require("views/admin/users/scolarites.php");
    } else {
        echo "Accès non autorisé";
    }
}

// DELETE a PERSON OF SCOLARITE FROM DATA BASE 

function deletescolariteactionController()
{
    if (isset($_SESSION["admin_id"])) {
        $employee_id = $_POST['scolarite_id'];
        if (!empty($employee_id)) {
            $result = deletelibrarianResponsable($employee_id);
            if ($result) {
                redirectwithPost("index.php?action=scolarite", 1, "Le membre de la scolarité a été supprimé avec succès");
                exit();
            } else {
                redirectwithPost("index.php?action=scolarite", 0, "Une erreur est survenue lors de la suppression d'un membre de la scolarité.");
                exit();
            }
        } else {
            redirectwithPost("index.php?action=scolarite", 0, "Des informations necessaires pour le traitement de cette requête sont monqué");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Show Infrmation TO edit Scolarité Members

function editscolariteController()
{
    if (isset($_SESSION["admin_id"])) {
        if (isset($_POST['scolarite_id'])) {
            $scolarite_id = $_POST['scolarite_id'];
            $scolarite = getlibrarianresponsableInfromation($scolarite_id);
            require("views/admin/users/edit-scolarite.php");
        } else {
            Redirect("index.php?action=scolarite");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller To update Information of Specific Scolarité Members 

function updatescolariteactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone_number'])
            && !empty($_POST['email']) && !empty($_POST['employee_id'])  && !empty($_POST['old_image_path'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'] . "@ensaj.ma";
            $phone_number = $_POST['phone_number'];
            $password = $_POST['password'];
            $employee_id = $_POST['employee_id'];
            $old_image_path = $_POST['old_image_path'];
            if ($_FILES['image_path']['size'] != 0) {
                unlink("assets/scolarites/" . $old_image_path);
                $filenameeExplode = explode(".", $_FILES['image_path']['name']);
                $fileExtension = strtolower(end($filenameeExplode));
                $image_path = time() . uniqid() . "." . $fileExtension;
                $destinationPath = "assets/scolarites/" . $image_path;
                move_uploaded_file($_FILES['image_path']['tmp_name'], $destinationPath);
                $result = updatelibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $image_path, $employee_id);
                if ($result) {
                    redirectwithPost("index.php?action=scolarite", 1, "Le membre de scolarité est modifier avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=scolarite", 0, "Une erreur est survenue lors de la modification du membre de la scolarité");
                    exit();
                }
            } else {
                $result = updatelibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $old_image_path, $employee_id);
                if ($result) {
                    redirectwithPost("index.php?action=scolarite", 1, "Le membre de scolarité est modifier avec succès");
                    exit();
                } else {
                    redirectwithPost("index.php?action=scolarite", 0, "Une erreur est survenue lors de la modification du membre de la scolarité");
                    exit();
                }
            }
        } else {
            redirectwithPost("index.php?action=scolarite", 0, "Des informations necessaires pour le traitement de cette requête sont monqué");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function of Controller To Add The head of school (Ajouter le directeur)

function addheadofschoolactionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (
            !empty($_POST['firstname']) && !empty($_POST['lastname'])
            && !empty($_POST['grade']) && !empty($_POST['specialite'])
            && !empty($_POST['phone_number']) && !empty($_POST['email'])
            && !empty($_POST['password'])
        ) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $grade = $_POST['grade'];
            $specialite = $_POST['specialite'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'] . "@ensaj.ma";
            $password = $_POST['password'];
            if ($_FILES['image_path']['size'] != 0) {
                $name_expolded = explode(".", $_FILES['image_path']['name']);
                $extention = end($name_expolded);
                $path = time() . uniqid() . "." . $extention;
                move_uploaded_file($_FILES['image_path']['tmp_name'], "assets/admins/" . $path);
                $result = addheadofSchool($firstname, $lastname, $email, $phone_number, $grade, $specialite, $password, $path);
                if ($result) {
                    redirectwithPost("index.php?action=head_of_school", 1, "Le compte de directeur a été ajouté avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=head_of_school", 0, "Une erreur est survenue lors de l'ajout du compte directeur.");
                    exit();
                }
            } else {
                $path = "default_image.jpg";
                $result = addheadofSchool($firstname, $lastname, $email, $phone_number, $grade, $specialite, $password, $path);
                if ($result) {
                    redirectwithPost("index.php?action=head_of_school", 1, "Le compte de directeur a été ajouté avec succès.");
                    exit();
                } else {
                    redirectwithPost("index.php?action=head_of_school", 0, "Une erreur est survenue lors de l'ajout du compte directeur.");
                    exit();
                }
            }
        } else {
            Redirect("index.php?action=head_of_school");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}

// Function To GET The Head Of School Controller
function gettheheadofschoolController()
{
    if (isset($_SESSION["admin_id"])) {
        $directeurs = getallheadofschool();
        require("views/admin/users/head_of_school.php");
    } else {
        echo "Accès non autorisé";
    }
}

// Function Of Controller To Delete Directeur Form Data Base

function deletedirecteuractionController()
{
    if (isset($_SESSION["admin_id"])) {
        if (!empty($_POST['directeur_id']) && !empty($_POST['old_img_path'])) {
            $directeur_id = $_POST['directeur_id'];
            $old_image_path = $_POST['old_img_path'];
            if ($old_image_path != "default_image.jpg") {
                if (file_exists("assets/admins/" . $old_image_path)) {
                    unlink("assets/admins/" . $old_image_path);
                }
            }
            $result = deletedirecteurAction($directeur_id);
            if ($result) {
                redirectwithPost("index.php?action=head_of_school", 1, "Le compte du directeur a été supprimé avec succès.");
                exit();
            } else {
                redirectwithPost("index.php?action=head_of_school", 0, "Une erreur est survenue lors de la suppression de ce compte.");
                exit();
            }
        } else {
            Redirect("index.php?action=head_of_school");
            exit();
        }
    } else {
        echo "Accès non autorisé";
    }
}
// Add Head of Scholl Controller
function addheadofschoolController()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/users/add_head_of_school.php");
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
// Add Scolarité Controller
function  addscolariteController()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/users/add-scolarite.php");
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
// Add Libririan Controller
function addlibrarianController()
{
    if (isset($_SESSION["admin_id"])) {
        include("views/admin/users/add-librarian.php");
        exit();
    } else {
        echo "Accès non autorisé";
    }
}
