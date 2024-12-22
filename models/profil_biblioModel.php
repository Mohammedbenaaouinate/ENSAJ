<?php

function list_profil_biblio(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM employee WHERE role_employee=:role AND employee_id=:ide");
    $role=1;
    $query->bindparam("role",$role);
    $query->bindparam("ide",$_SESSION["biblio_id"]);
    $query->execute();
    $query=$query->fetch(PDO::FETCH_ASSOC);
    return $query;
}


function edit_profil_biblio($id,$fname,$lname,$mail,$phone){

    $conn=connect_database();

    $image_name=$_FILES["image_biblio"]["name"];
    $image_size=$_FILES["image_biblio"]["size"];
    $image_path=$_FILES["image_biblio"]["tmp_name"];
    $role=1;
    if($image_name==""){
        $query=$conn->prepare("UPDATE employee set firstname=:fname,lastname=:lname,email=:mail,phone_number=:phone WHERE role_employee=:role AND employee_id=:ide");
        $_SESSION["fname"]=$lname;
        $_SESSION["firstname"]=$fname;
    }else{
        if($image_size!=0){
            $new_name_biblio_image=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
            $query=$conn->prepare("UPDATE employee set firstname=:fname,lastname=:lname,email=:mail,phone_number=:phone,image_path=:img_path WHERE role_employee=:role AND employee_id=:ide");
            $query->bindparam("img_path",$new_name_biblio_image);
            $_SESSION["fname"]=$lname;
            $_SESSION["firstname"]=$fname;
            $_SESSION["img_biblio"]=$new_name_biblio_image;

            $sql=$conn->prepare("SELECT * FROM employee WHERE role_employee=:role AND employee_id=:ide");
            $sql->bindparam("role",$role);
            $sql->bindparam("ide",$id);
            $sql->execute();
            $sql=$sql->fetch(PDO::FETCH_ASSOC);
            move_uploaded_file($image_path,"assets/bibliothecaires/".$new_name_biblio_image);
            if($sql["image_path"] != "default_image.jpg"){
                unlink("assets/bibliothecaires/".$sql["image_path"]);
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

function edit_password_biblio($id,$old,$new,$confirm){
    $conn=connect_database();
    $role=1;
    $sql=$conn->prepare("SELECT * FROM employee WHERE role_employee=:role AND employee_id=:ide");
    $sql->bindparam("ide",$id);
    $sql->bindparam("role",$role);
    $sql->execute();
    $result=$sql->fetch(PDO::FETCH_ASSOC);

    if($result){
        if (password_verify($old, $result['password'])) {
            if($new==$confirm){
                $new_hashed = password_hash($new, PASSWORD_DEFAULT);
                $query=$conn->prepare("UPDATE employee set `password`=:neww WHERE role_employee=:role AND employee_id=:ide");
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