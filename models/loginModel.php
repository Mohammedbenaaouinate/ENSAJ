<?php


function verify_login($mail,$pass){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:role AND email=:mail");
    $x=2;//role admin
    $query->bindparam("role",$x);
    $query->bindparam("mail",$mail);

    $query->execute();
    if($query->rowCount()>0){
        $query=$query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pass, $query['password'])) {
            return $query;
        }
    }
    return false;
}

?>