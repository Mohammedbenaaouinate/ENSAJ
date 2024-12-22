<?php

function select_number_student_of_classe_in_department(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT classe.class_id,classe.class_name,classe.class_year,COUNT(student.student_id) as number_student FROM `classe` LEFT JOIN `student` on classe.class_id=student.class_id join specialization on specialization.specialization_id=classe.specialization_id WHERE specialization.departement_id=:ide GROUP BY classe.class_id;");
    $query->bindParam("ide",$_SESSION["department_chef"]);
    $query->execute();
    return $query;

}

function select_professor_of_department(){
    $conn=connect_database();
    $role=1;
    $query=$conn->prepare("SELECT * FROM professeur WHERE departement_id=:ide and role_prof=:role");
    $query->bindParam("ide",$_SESSION["department_chef"]);
    $query->bindParam("role",$role);
    $query->execute();
    $rows=$query->rowCount();
    return $rows;
}







?>