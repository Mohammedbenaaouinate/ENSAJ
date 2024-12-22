<?php
// Function To get All Classes Of Students 
function getallstudentsClasses()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT classe.class_id,classe.class_year,classe.	class_name,specialization.short_name FROM classe
                 INNER JOIN specialization
                  ON classe.specialization_id=specialization.specialization_id");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//Function to get all student Specializations
function getallstudentsSpecialization()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM specialization");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To ADD Student In DATA BASE
function addStudent($firstname, $lastname, $massar_student, $student_apge, $email, $cin_student, $natinnality, $password, $phone_number, $sexe, $student_adress, $birth_date, $class_id, $image_path)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO student (`firstname`,`lastname`,`massar_student`,`student_apoge`,
            `email`,`cin_student`,`nationality`,`password`,`phone_number`,`sexe`,`student_adress`
            ,`birth_date`,`class_id`,`image_path`) VALUES (:firstname,:lastname,:massar_student,:student_apoge,
            :email,:cin_student,:nationality,:password,:phone_number,:sexe,:student_adress,:birth_date,:class_id,
            :image_path)");
    $stm->bindParam(":firstname", $firstname);
    $stm->bindParam(":lastname", $lastname);
    $stm->bindParam(":massar_student", $massar_student);
    $stm->bindParam(":student_apoge", $student_apge);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":cin_student", $cin_student);
    $stm->bindParam(":nationality", $natinnality);
    $stm->bindParam(":password", $hashed_password);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":sexe", $sexe);
    $stm->bindParam(":student_adress", $student_adress);
    $stm->bindParam(":birth_date", $birth_date);
    $stm->bindParam(":class_id", $class_id);
    $stm->bindParam(":image_path", $image_path);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// function to get Students in Same Classe
function getstudentsinsameClasse($class_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student INNER JOIN classe ON student.class_id=classe.class_id 
                WHERE student.class_id=:class_id");
    $stm->bindParam(":class_id", $class_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// Function To get Classes of Same Specialization
function getclassesofsamespecialization($specialization_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM classe WHERE `specialization_id`=:specialization_id");
    $stm->bindParam(":specialization_id", $specialization_id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// function to get ALL students FROM DATA BASE
function getStudents()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student 
    INNER JOIN classe ON student.class_id=classe.class_id
    ORDER BY `student_id` DESC");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Function to DELETE student FROM DATA BASE
function deleteStudent($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("DELETE FROM student WHERE `student_id`=:student_id");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}


// Function To get information about a single student (from its identifier[student_id])
function getsudentInformation($student_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM student WHERE `student_id`=:student_id LIMIT 1");
    $stm->bindParam(":student_id", $student_id);
    $stm->execute();
    $student = $stm->fetch(PDO::FETCH_ASSOC);
    return $student;
}
// Function to update Student IN Data Base 
function updateStudent($student_id, $firstname, $lastname, $massar_student, $student_apge, $email, $cin_student, $natinnality, $password, $phone_number, $sexe, $student_adress, $birth_date, $class_id, $new_image_path)
{
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE student SET `firstname`=:firstname,`lastname`=:lastname,`massar_student`=:massar_student,`student_apoge`=:student_apoge,
                `email`=:email,`cin_student`=:cin_student,`nationality`=:nationality,`password`=:password,`phone_number`=:phone_number,`sexe`=:sexe,`student_adress`=:student_adress
                ,`birth_date`=:birth_date,`class_id`=:class_id,`image_path`=:image_path WHERE `student_id`=:student_id");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":massar_student", $massar_student);
        $stm->bindParam(":student_apoge", $student_apge);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":cin_student", $cin_student);
        $stm->bindParam(":nationality", $natinnality);
        $stm->bindParam(":password", $hashed_password);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":sexe", $sexe);
        $stm->bindParam(":student_adress", $student_adress);
        $stm->bindParam(":birth_date", $birth_date);
        $stm->bindParam(":class_id", $class_id);
        $stm->bindParam(":image_path", $new_image_path);
        $stm->bindParam(":student_id", $student_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    } else {
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE student SET `firstname`=:firstname,`lastname`=:lastname,`massar_student`=:massar_student,`student_apoge`=:student_apoge,
                `email`=:email,`cin_student`=:cin_student,`nationality`=:nationality,`phone_number`=:phone_number,`sexe`=:sexe,`student_adress`=:student_adress
                ,`birth_date`=:birth_date,`class_id`=:class_id,`image_path`=:image_path WHERE `student_id`=:student_id");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":massar_student", $massar_student);
        $stm->bindParam(":student_apoge", $student_apge);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":cin_student", $cin_student);
        $stm->bindParam(":nationality", $natinnality);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":sexe", $sexe);
        $stm->bindParam(":student_adress", $student_adress);
        $stm->bindParam(":birth_date", $birth_date);
        $stm->bindParam(":class_id", $class_id);
        $stm->bindParam(":image_path", $new_image_path);
        $stm->bindParam(":student_id", $student_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    }
}
// Function To GET all Departement That Teacher Can caints
function getallldepartements()
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM departement");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Add Administartor|| teachers || bibliothécaire INTO DATA BASE 
function addteacheradmin($firstname, $lastname, $email, $phone_number, $grade, $departement_id, $specialite, $password, $role_prof, $image_path)
{
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO professeur(`firstname`,`lastname`,`email`,`phone_number`,`grade`,
                    `departement_id`,`specialite`,`password`,`role_prof`,`image_path`)
                    VALUES (:firstname,:lastname,:email,:phone_number,:grade,:departement_id,
                    :specialite,:password,:role_prof,:image_path)");
    $stm->bindParam(":firstname", $firstname);
    $stm->bindParam(":lastname", $lastname);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":grade", $grade);
    $stm->bindParam(":departement_id", $departement_id);
    $stm->bindParam(":specialite", $specialite);
    $stm->bindParam(":password", $hash_password);
    $stm->bindParam(":role_prof", $role_prof);
    $stm->bindParam(":image_path", $image_path);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// function to get all_teachers OR all biblithécaire OR all admins

function getalladminTeachers($role_prof)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM professeur INNER JOIN departement
    ON professeur.departement_id=departement.departement_id
    WHERE `role_prof`=:role_prof");
    $stm->bindParam(":role_prof", $role_prof);
    $stm->execute();
    $teachers = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $teachers;
}

// Function To delete teacher OR administrator OR librarian FROM DATA BASE
function deleteadminteacher($profid)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("DELETE FROM professeur WHERE `prof_id`=:prof_id");
    $stm->bindParam(":prof_id", $profid);
    $stm->execute();
    return $stm->rowCount() > 0;
}

// Function  To get Information About Teacher OR Adminidtrator OR librarian
function getadminteacherInformation($profid)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM professeur WHERE `prof_id`=:prof_id LIMIT 1");
    $stm->bindParam(":prof_id", $profid);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// Function to update the Information Of administrator OR teacher 


function  updateadminTeacher(
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
) {
    if (!empty($password)) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE professeur SET `firstname`=:firstname,`lastname`=:lastname,
            `password`=:password,`email`=:email,`phone_number`=:phone_number,`role_prof`=:role_prof,
            `grade`=:grade,`specialite`=:specialite,`departement_id`=:departement_id,
            `image_path`=:image_path WHERE `prof_id`=:prof_id
             ");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":password", $hash_password);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":role_prof", $role_prof);
        $stm->bindParam(":grade", $grade);
        $stm->bindParam(":specialite", $specialite);
        $stm->bindParam(":departement_id", $departement_id);
        $stm->bindParam(":image_path", $image_path);
        $stm->bindParam(":prof_id", $prof_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    } else {
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE professeur SET `firstname`=:firstname,`lastname`=:lastname,
            `email`=:email,`phone_number`=:phone_number,`role_prof`=:role_prof,
                `grade`=:grade,`specialite`=:specialite,`departement_id`=:departement_id,
                `image_path`=:image_path WHERE `prof_id`=:prof_id
                 ");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":role_prof", $role_prof);
        $stm->bindParam(":grade", $grade);
        $stm->bindParam(":specialite", $specialite);
        $stm->bindParam(":departement_id", $departement_id);
        $stm->bindParam(":image_path", $image_path);
        $stm->bindParam(":prof_id", $prof_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    }
}

// Function to Connect into data base
function ConnectToDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=school", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// Function To Add Librarian Into Data Base  OR Responsable Of Scolarité

function addlibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $role_employee, $image_path)
{
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO employee(`firstname`,`lastname`,`email`,
                    `phone_number`,`password`,`role_employee`,`image_path`)
                    VALUES (:firstname,:lastname,:email,:phone_number,:password,:role_employee,:image_path)");
    $stm->bindParam(":firstname", $firstname);
    $stm->bindParam(":lastname", $lastname);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":password", $hash_password);
    $stm->bindParam(":role_employee", $role_employee);
    $stm->bindParam(":image_path", $image_path);
    $stm->execute();
    return $stm->rowCount() > 0;
}
// function TO select All Libriaran OR Responsable Of scholarité from Data Base

function getlibrarianResponsable($role_employee)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM employee WHERE `role_employee`=:role_employee");
    $stm->bindParam(":role_employee", $role_employee);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To delelet Librarian OR Responsable Of scholarité From Data Base

function deletelibrarianResponsable($employee_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("DELETE FROM employee WHERE `employee_id`=:employee_id");
    $stm->bindParam(":employee_id", $employee_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}

//  Function To get Information For Specifici Librarian OR Responsaple
function getlibrarianresponsableInfromation($employee_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM employee WHERE `employee_id`=:employee_id LIMIT 1");
    $stm->bindParam(":employee_id", $employee_id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// Function To Update Librarian OR Responsable of Scolarité 

function updatelibrarianResponsable($firstname, $lastname, $email, $phone_number, $password, $image_path, $employee_id)
{
    if(!empty($password)){
        $hash_password=password_hash($password,PASSWORD_DEFAULT);
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE employee SET `firstname`=:firstname,`lastname`=:lastname,
                            `email`=:email,`phone_number`=:phone_number,`password`=:password,
                            `image_path`=:image_path WHERE `employee_id`=:employee_id");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":password", $hash_password);
        $stm->bindParam(":image_path", $image_path);
        $stm->bindParam(":employee_id", $employee_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    }else{
        $conn = ConnectToDB();
        $stm = $conn->prepare("UPDATE employee SET `firstname`=:firstname,`lastname`=:lastname,
                            `email`=:email,`phone_number`=:phone_number,
                            `image_path`=:image_path WHERE `employee_id`=:employee_id");
        $stm->bindParam(":firstname", $firstname);
        $stm->bindParam(":lastname", $lastname);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":phone_number", $phone_number);
        $stm->bindParam(":image_path", $image_path);
        $stm->bindParam(":employee_id", $employee_id);
        $stm->execute();
        return $stm->rowCount() > 0;
    }
}

// Function To Add the head of School Into Data Base 

function addheadofSchool($firstname, $lastname, $email, $phone_number, $grade, $specialite, $password, $path)
{
    $role_prof = 2;
    $second_role = "directeur";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $conn = ConnectToDB();
    $stm = $conn->prepare("INSERT INTO professeur(`firstname`,`lastname`,
            `email`,`phone_number`,`grade`,`specialite`,`password`,`role_prof`,
            `image_path`,`second_role`) 
             VALUES (:firstname,:lastname,:email,:phone_number,:grade,
             :specialite,:password,:role_prof,:image_path,:second_role)            
            ");
    $stm->bindParam(":firstname", $firstname);
    $stm->bindParam(":lastname", $lastname);
    $stm->bindParam(":email", $email);
    $stm->bindParam(":phone_number", $phone_number);
    $stm->bindParam(":grade", $grade);
    $stm->bindParam(":specialite", $specialite);
    $stm->bindParam(":password", $password);
    $stm->bindParam(":role_prof", $role_prof);
    $stm->bindParam(":image_path", $path);
    $stm->bindParam(":second_role", $second_role);
    $stm->execute();
    return $stm->rowCount() > 0;
}


// Function To GET All Head Of School Information

function getallheadofschool()
{
    $role_prof = 2;
    $second_role = "directeur";
    $conn = ConnectToDB();
    $stm = $conn->prepare("SELECT * FROM professeur WHERE `role_prof`=:role_prof 
            AND `second_role`=:second_role");
    $stm->bindParam(":role_prof", $role_prof);
    $stm->bindParam(":second_role", $second_role);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Function To Delete The Head of School Form Data base

function deletedirecteurAction($directeur_id)
{
    $conn = ConnectToDB();
    $stm = $conn->prepare("DELETE FROM professeur WHERE `prof_id`=:directeur_id");
    $stm->bindParam(":directeur_id", $directeur_id);
    $stm->execute();
    return $stm->rowCount() > 0;
}
