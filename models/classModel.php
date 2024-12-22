<?php

function list_class(){
    $conn=connect_database();
    // $query=$conn->prepare("SELECT classe.class_id,classe.class_name,classe.class_year,COUNT(student.student_id) as number_student FROM `classe` LEFT JOIN `student` on classe.class_id=student.class_id GROUP BY classe.class_id");
    $query=$conn->prepare("SELECT classe.class_id,classe.class_name,classe.class_year,classe.responsable_id,st.firstname,st.lastname,st.email,st.phone_number,COUNT(student.student_id) as number_student FROM `classe` LEFT JOIN `student` on classe.class_id=student.class_id left join student as st on classe.responsable_id=st.student_id GROUP BY classe.class_id;");
    $query->execute();
    return $query;
}


function add_class(){
    $conn=connect_database();
    $classe=$_POST["classe"];
    $annee=$_POST["annee"];

    $tab=explode(" ",$annee);
   
    $name_class=$classe."-".$tab[1];

    //query for selectiong id of fiels
    $sql=$conn->prepare("SELECT * FROM specialization WHERE short_name=:name");
    $sql->bindParam("name",$classe);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);

    $query=$conn->prepare("INSERT INTO classe(class_name,class_year,specialization_id) VALUES(:class,:year,:id)");
    $query->bindParam("class",$name_class);
    $query->bindParam("year",$annee);
    $query->bindParam("id",$sql["specialization_id"]);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete_class($id){
    $conn=connect_database();
    $query=$conn->prepare("DELETE FROM classe WHERE class_id =:class");
    $query->bindParam("class",$id);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }

}
function select_specialization(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM specialization");
    $query->execute();
    return $query;

}
function select_single_class($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM classe WHERE class_id=:class");
    $query->bindParam("class",$id);
    $query->execute();
    $res=$query->fetch(PDO::FETCH_ASSOC);
    return $res;
}

function verify_selection($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT specialization.short_name,classe.class_year,classe.class_id,classe.responsable_id FROM `classe` join `specialization` on classe.specialization_id=specialization.specialization_id WHERE classe.class_id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}

function student_of_this_classe($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM student WHERE class_id=:class");
    $query->bindParam("class",$id);
    $query->execute();
    return $query;
}
function edit_class(){

    $conn=connect_database();
    $id=$_POST["id"];
    $classe=$_POST["classe"];
    $annee=$_POST["annee"];
    $id_responsable=$_POST["responsable"];
    $tab=explode(" ",$annee);
    
    $name_class=$classe."-".$tab[1];

    $sql=$conn->prepare("SELECT * FROM specialization WHERE short_name=:name");
    $sql->bindParam("name",$classe);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);

    $query=$conn->prepare("UPDATE classe SET class_name=:name,class_year=:year,specialization_id=:id,responsable_id=:id_stud WHERE class_id=:id_cl");
    $query->bindParam("name",$name_class);
    $query->bindParam("year",$annee);
    $query->bindParam("id",$sql["specialization_id"]);
    $query->bindParam("id_stud",$id_responsable);
    $query->bindParam("id_cl",$id);

    $query->execute();
    return $query;


}

?>