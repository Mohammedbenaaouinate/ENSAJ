<?php 

function list_category(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM category_book");
    $query->execute();
    return $query;
}


function add_category_book($cat){
    $conn=connect_database();
    $query=$conn->prepare("INSERT INTO category_book(name_category) VALUES(:cat)");
    $query->bindParam("cat",$cat);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete_category_book($id){
    $conn=connect_database();
    $query=$conn->prepare("DELETE FROM category_book WHERE category_id =:ide");
    $query->bindParam("ide",$id);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }

}

function one_categorie($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM category_book WHERE category_id =:ide");
    $query->bindParam("ide",$id);
    $query->execute();
    $res=$query->fetch(PDO::FETCH_ASSOC);
    return $res;
}

function edit_book_category($cate,$id){

    $conn=connect_database();

    $query=$conn->prepare("UPDATE category_book SET name_category=:name WHERE category_id=:ide");
    $query->bindParam("name",$cate);
    $query->bindParam("ide",$id);
    $query->execute();
    return $query;
}




?>