<?php

function count_prof(){
    $conn=connect_database();
    $role=1;
    $query=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:rolee");
    $query->bindparam("rolee",$role);
    $query->execute();
    $row=$query->rowCount();
    return $row;

}

function count_etud(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM student");
    $query->execute();
    $row=$query->rowCount();
    return $row;

}
function count_classroom(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM classroom");
    $query->execute();
    $row=$query->rowCount();
    return $row;

}

function count_classes(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM classe");
    $query->execute();
    $row=$query->rowCount();
    return $row;
}

function count_admins(){
    $conn=connect_database();
    $role=2;
    $query=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:rolee ");
    $query->bindparam("rolee",$role);
    $query->execute();
    $row=$query->rowCount();
    return $row;
}

function count_department(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM departement");
    $query->execute();
    $row=$query->rowCount();
    return $row;
}
function count_specialization(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM specialization");
    $query->execute();
    $row=$query->rowCount();
    return $row;
}
function count_modules(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM module");
    $query->execute();
    $row=$query->rowCount();
    return $row;
}

function graph_number_student(){
    $conn=connect_database();
    $sql=$conn->prepare("SELECT specialization.short_name,COUNT(student_id) as nombre_etudiant FROM `classe` left join student on classe.class_id=student.class_id join specialization on specialization.specialization_id=classe.specialization_id GROUP BY specialization.short_name ;");
    $sql->execute();
    if($sql->rowCount()>0){
        foreach($sql as $res){
            $filiere[]=$res["short_name"];
            $number[]=$res["nombre_etudiant"];
          }
      
          return [
              'spec'=>$filiere,
              'number'=>$number,
          ];
    }else{
        return [
            'spec'=>0,
            'number'=>0,
        ];
    }
  
}
function add_excel_prof($fileName,$tmp){

        $conn=connect_database();

        $directory="assets/uploads_excel/" . $fileName;
        move_uploaded_file($tmp,$directory);

        if (($handle = fopen($directory, 'r')) !== FALSE) {

            
            fgetcsv($handle, 1000, ',');

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $query=$conn->prepare("INSERT INTO professeur (firstname,lastname,email,phone_number,grade,departement_id,specialite,password,role_prof,image_path) VALUES (:colonne1, :colonne2, :colonne3,:colonne4, :colonne5, :colonne6,:colonne7, :colonne8, 1, 'default_image.jpg')");
                $query->bindParam(':colonne1',$data[0]);
                $query->bindParam(':colonne2',$data[1]);
                $query->bindParam(':colonne3',$data[2]);
                $query->bindParam(':colonne4',$data[3]);
                $query->bindParam(':colonne5',$data[4]);
                // $query->bindParam(':colonne6',$data[5]);
                $query->bindParam(':colonne7',$data[6]);
                $hashed_password=password_hash($data[7],PASSWORD_DEFAULT);
                $query->bindParam(':colonne8',$hashed_password);

                // $query->execute();

                $sql=$conn->prepare("SELECT * FROM departement WHERE short_name=:dep_short");
                $sql->bindParam(':dep_short',$data[5]);
                $sql->execute();
                $result=$sql->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $id = $result["departement_id"];
                    $query->bindParam(':colonne6', $id);
                    $query->execute();
                }else{
                    return false;
                }
                    
                


            }
            
            fclose($handle);

            return true;
        } else {
            return false;
        }

}



function add_excel_etud($fileName,$tmp){

    $conn=connect_database();
    
    $directory="assets/uploads_excel/" . $fileName;
    move_uploaded_file($tmp,$directory);

    if (($handle = fopen($directory, 'r')) !== FALSE) {

        
        fgetcsv($handle, 1000, ',');

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $query=$conn->prepare("INSERT INTO student(firstname,lastname,massar_student,student_apoge,email,cin_student,password,class_id,birth_date,nationality,phone_number,sexe,student_adress,image_path) VALUES (:colonne0, :colonne1, :colonne2,:colonne3, :colonne4, :colonne5,:colonne6, :colonne7, :colonne8,:colonne9,:colonne10,:colonne11,:colonne12,'default_image.jpg')");
            $query->bindParam(':colonne0',$data[0]);
            $query->bindParam(':colonne1',$data[1]);
            $query->bindParam(':colonne2',$data[2]);
            $query->bindParam(':colonne3',$data[3]);
            $query->bindParam(':colonne4',$data[4]);
            $query->bindParam(':colonne5',$data[5]);
            $hashed_password=password_hash($data[6],PASSWORD_DEFAULT);
            $query->bindParam(':colonne6',$hashed_password);

            $query->bindParam(':colonne8',$data[8]);
            $query->bindParam(':colonne9',$data[9]);
            $query->bindParam(':colonne10',$data[10]);
            $query->bindParam(':colonne11',$data[11]);
            $query->bindParam(':colonne12',$data[12]);
            
            $sql=$conn->prepare("SELECT * FROM classe WHERE class_name=:class");
            $sql->bindParam(':class',$data[7]);
            $sql->execute();
            $result=$sql->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $id = $result["class_id"];
                $query->bindParam(':colonne7', $id);
                $query->execute();
            } else {
                return false;
            }
        }
        
        fclose($handle);

        // echo "Les données ont été importées avec succès.";
        return true;
    } else {
    // echo "Impossible d'ouvrir le fichier CSV.";
    return false;
    }

}













?>