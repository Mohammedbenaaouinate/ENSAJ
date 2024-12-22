<?php

function list_profil_admin(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:role AND prof_id=:ide");
    $role=2;
    $query->bindparam("role",$role);
    $query->bindparam("ide",$_SESSION["admin_id"]);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}


function edit_profil_admin($id,$fname,$lname,$mail,$phone){

    $conn=connect_database();

    $image_name=$_FILES["image_admin"]["name"];
    $image_size=$_FILES["image_admin"]["size"];
    $image_path=$_FILES["image_admin"]["tmp_name"];
    $role=2;
    if($image_name==""){
        $query=$conn->prepare("UPDATE professeur set firstname=:fname,lastname=:lname,email=:mail,phone_number=:phone WHERE role_prof=:role AND prof_id=:ide");
            $_SESSION["family_name"]=$lname;
            $_SESSION["first"]=$fname;
    }else{
        if($image_size!=0){
            $new_name_admin_image=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
            $query=$conn->prepare("UPDATE professeur set firstname=:fname,lastname=:lname,email=:mail,phone_number=:phone,image_path=:img_path WHERE role_prof=:role AND prof_id=:ide");
            $query->bindparam("img_path",$new_name_admin_image);
            
            $_SESSION["family_name"]=$lname;
            $_SESSION["first"]=$fname;
            $_SESSION["img"]=$new_name_admin_image;

            $sql=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:role AND prof_id=:ide");
            $sql->bindparam("role",$role);
            $sql->bindparam("ide",$id);
            $sql->execute();
            $sql=$sql->fetch(PDO::FETCH_ASSOC);
            move_uploaded_file($image_path,"assets/admins/".$new_name_admin_image);
            if($sql["image_path"] != "default_image.jpg"){
                unlink("assets/admins/".$sql["image_path"]);
            }
        }else{
            return false;
        }
    }

    $query->bindparam("role",$role);
    $query->bindparam("ide",$id);
    $query->bindparam("fname",$fname);
    $query->bindparam("lname",$lname);
    $query->bindparam("mail",$mail);
    $query->bindparam("phone",$phone);

    $query->execute();
    return $query;

}

function edit_password_admin($id,$old,$new,$confirm){
    $conn=connect_database();
    $role=2;
    $sql=$conn->prepare("SELECT * FROM professeur WHERE prof_id=:ide AND role_prof=:role");
    $sql->bindparam("ide",$id);
    $sql->bindparam("role",$role);
    $sql->execute();
    $result=$sql->fetch(PDO::FETCH_ASSOC);

    if($result){
        if (password_verify($old, $result['password'])) {
            if($new==$confirm){
                $new_hashed = password_hash($new, PASSWORD_DEFAULT);
    
                $query=$conn->prepare("UPDATE professeur set `password`=:neww WHERE role_prof=:role AND prof_id=:ide");
                $query->bindparam("neww",$new_hashed);
                $query->bindparam("role",$role);
                $query->bindparam("ide",$id);
                $query->execute();
                if($sql){
                    return 555;
                }else{
                    return 444;
                }
            }else{
                return 410;//code error match password
            }
        }else{
            return 404;//code error match with the old password
        }
        

    }else{
        return 404;//code error match with the old password
    }

}
?>