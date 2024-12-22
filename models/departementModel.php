<?php


function connect_database(){
    return new PDO("mysql:host=localhost;dbname=school;","root","");
}
function list_departement(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT departement.departement_id,lastname,firstname,email,phone_number,short_name,departement_name,description FROM departement left join professeur on departement.departement_leader=professeur.prof_id");
    $query->execute();
    return $query;
}

function add_department(){
    $conn=connect_database();
    $short_name=$_POST["short_name"];
    $departement_name=$_POST["departement_name"];
    $description=$_POST["description"];
    

    $query=$conn->prepare("INSERT INTO departement(short_name,departement_name,description) VALUES(:short_name,:name,:description)");
    $query->bindParam("short_name",$short_name);
    $query->bindParam("name",$departement_name);
    $query->bindParam("description",$description);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete_department($id){
    $conn=connect_database();
    $query=$conn->prepare("DELETE FROM departement WHERE departement_id=:dep_id");
    $query->bindParam("dep_id",$id);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }
    // return $query;

}
function select_professor(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:role");
    $role=1;
    $query->bindParam("role",$role);
    $query->execute();
    return $query;

}
function select_single_department($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM departement WHERE departement_id=:dep_id");
    $query->bindParam("dep_id",$id);
    $query->execute();
    $res=$query->fetch(PDO::FETCH_ASSOC);
    return $res;
}



function edit_department(){
    $conn=connect_database();
    $id=$_POST["id"];
    $short_name=$_POST["short_name"];
    $departement_name=$_POST["departement_name"];
    $departement_leader=$_POST["departement_leader"];
    $description=$_POST["description"];

    $sqlState=$conn->prepare("SELECT * FROM departement left join professeur on professeur.departement_id=professeur.departement_id WHERE departement.departement_id=:dep");
    $sqlState->bindParam("dep",$id);
    $sqlState->execute();
    $sqlState=$sqlState->fetch(PDO::FETCH_ASSOC);
    $n=NULL;
    
    if($sqlState["departement_leader"] !=NULL && $sqlState["departement_leader"] !=$departement_leader){
        $sql2=$conn->prepare("UPDATE professeur set second_role=:second_role WHERE prof_id=:id");
        $sql2->bindParam("id",$sqlState["departement_leader"]);
        $sql2->bindParam("second_role",$n);
        $sql2->execute();
    }



    $query=$conn->prepare("UPDATE departement SET short_name=:short_name,departement_name=:name,departement_leader=:leader,description=:description WHERE departement_id=:ide");

    $query->bindParam("short_name",$short_name);
    $query->bindParam("name",$departement_name);
    $query->bindParam("leader",$departement_leader);
    $query->bindParam("description",$description);
    $query->bindParam("ide",$id);
    $query->execute();

    $sql=$conn->prepare("UPDATE professeur set second_role=:second_role WHERE prof_id=:id");
    $sql->bindParam("id",$departement_leader);
    $sql->bindParam("second_role",$id);
    $sql->execute();

    if($query){
        return true;
    }else{
        return false;
    }



}

?>