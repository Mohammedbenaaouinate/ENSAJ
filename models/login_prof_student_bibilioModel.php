<?php 

function verify_login_user($mail_user,$pass_user){
    $conn=connect_database();
    $result=null;
    $tables=['professeur','employee'];
    foreach($tables as $table){
        $query=$conn->prepare("SELECT * FROM $table WHERE email=:mail");
        $query->bindparam("mail",$mail_user);
        $query->execute();
        if($query->rowCount()>0){
            $result=$query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pass_user, $result['password'])) {
                return $result;
            }
        }
    }
    
        return false;
    
   
}







?>