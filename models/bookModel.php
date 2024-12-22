<?php

function list_all_book(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `book` ORDER BY date_pub desc");
    $query->execute();
    return $query;
}

function list_category_book(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `category_book`");
    $query->execute();
    return $query;
}

function add_book($name_book,$quantity,$isbn,$description,$image_name,$category,$author){
    $conn=connect_database();
    $image_path=$_FILES["image_book"]["tmp_name"];
    $new_name_book_image=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
       
    move_uploaded_file($image_path,"assets/bibliothecaires/book/".$new_name_book_image);
    $status=1;//activer
    $query=$conn->prepare("INSERT INTO book(isbn,book_title,description,quantity,book_image,status,date_pub,quantity_taken,category_id,author) VALUES(:isbn,:title,:description,:quantity,:image,:status,NOW(),:taken,:cate,:author)");
    $query->bindParam("isbn",$isbn);
    $query->bindParam("title",$name_book);
    $query->bindParam("description",$description);
    $query->bindParam("quantity",$quantity);
    $query->bindParam("image",$new_name_book_image);
    $query->bindParam("status",$status);
    $query->bindParam("taken",$quantity);
    $query->bindParam("cate",$category);
    $query->bindParam("author",$author);
    $query->execute();
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete_book($id){
    $conn=connect_database();

    $sql=$conn->prepare("SELECT * FROM book WHERE book_id=:book");
    $sql->bindParam("book",$id);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);

    $query=$conn->prepare("DELETE FROM book WHERE book_id =:book");
    $query->bindParam("book",$id);
    $query->execute();
    unlink("assets/bibliothecaires/book/".$sql["book_image"]);
    if($query){
        return true;
    }else{
        return false;
    }

}

function select_single_book($id){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM book WHERE book_id=:book");
    $query->bindParam("book",$id);
    $query->execute();
    $res=$query->fetch(PDO::FETCH_ASSOC);
    return $res;
}


function edit_book($id,$name_book,$quantity,$isbn,$description,$category,$author){

    $conn=connect_database();

    $image_name=$_FILES["image_book"]["name"];
    $image_size=$_FILES["image_book"]["size"];
    $image_path=$_FILES["image_book"]["tmp_name"];

    //select a book for testing if the quantity has been increased or not

    $sql=$conn->prepare("SELECT * FROM `book` WHERE book_id=:id");
    $sql->bindParam("id",$id);
    $sql->execute();
    $sql=$sql->fetch(PDO::FETCH_ASSOC);
    $q_b=$sql["quantity"];
    $quantity_taken_book=$sql["quantity_taken"];

    if($quantity > $q_b){
        $result=$quantity-$q_b;
        $quantity_update=$quantity_taken_book+$result;
        $sql_query=$conn->prepare("UPDATE book SET quantity_taken=:q_taken WHERE book_id=:id");
        $sql_query->bindParam("q_taken",$quantity_update);
        $sql_query->bindParam("id",$id);
        $sql_query->execute();
    }


    if($image_name==""){
        //,quantity_taken=:taken
        $query=$conn->prepare("UPDATE book SET isbn=:isbn,book_title=:title,description=:description,quantity=:quant,category_id=:cat,author=:author WHERE book_id=:ide");

    }else{
        if($image_size!=0){
            //,quantity_taken=:taken
            $new_name_book_image=uniqid().time().".".pathinfo($image_name, PATHINFO_EXTENSION);
            $query=$conn->prepare("UPDATE book SET isbn=:isbn,book_title=:title,description=:description,quantity=:quant,book_image=:image,category_id=:cat,author=:author WHERE book_id=:ide");
            $query->bindparam("image",$new_name_book_image);

            $sql=$conn->prepare("SELECT * FROM book WHERE book_id=:ide");
            $sql->bindParam("ide",$id);
            $sql->execute();
            $sql=$sql->fetch(PDO::FETCH_ASSOC);

            move_uploaded_file($image_path,"assets/bibliothecaires/book/".$new_name_book_image);
            unlink("assets/bibliothecaires/book/".$sql["book_image"]);
        }else{
            return false;
        }
    }

    // $query=$conn->prepare("UPDATE book SET isbn=:isbn,book_title=:title,description=:description,quantity=:quant WHERE book_id=:ide");
    $query->bindParam("isbn",$isbn);
    $query->bindParam("title",$name_book);
    $query->bindParam("description",$description);
    $query->bindParam("quant",$quantity);
    $query->bindParam("cat",$category);
    $query->bindParam("author",$author);
    $query->bindParam("ide",$id);
    $query->execute();
    return $query;


}

function search_book($name,$isbn,$cate){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `book` WHERE book_title like :title OR isbn like :isbn OR category_id like :cat");
    $query->bindParam("isbn",$isbn);
    $query->bindParam("title",$name);
    $query->bindParam("cat",$cate);
    $query->execute();
    return $query;

}

function list_request(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM `request_book` join student on request_book.student_id=student.student_id join book on book.book_id=request_book.book_id join classe on classe.class_id=student.class_id");
    $query->execute();
    return $query;

}

function list_message_for_one_book(){
    $conn=connect_database();
    $one=1;
    $sql_single=$conn->prepare("SELECT * FROM `book` WHERE quantity_taken=:one");
    $sql_single->bindParam("one",$one);
    $sql_single->execute();
    return $sql_single;
}
function accept_request($student_id,$book_id,$date){
    $conn=connect_database();
    
    //query for decrement the book
    $sql_single=$conn->prepare("SELECT * FROM `book` WHERE book_id=:ide");
    $sql_single->bindParam("ide",$book_id);
    $sql_single->execute();
    $sql_single=$sql_single->fetch(PDO::FETCH_ASSOC);
    $book_quant=$sql_single["quantity_taken"];
    $book_taken=$book_quant-1;
   
    if($book_quant > 0){
        // $book_taken=$book_quant-1;
        // echo $book_taken;

        $status="accepter";//activer
        $query=$conn->prepare("INSERT INTO accept_refuse(etudiant,bouquin,action,date_retour) VALUES(:etudiant,:bouquin,:action,:dates)");
        $query->bindParam("etudiant",$student_id);
        $query->bindParam("bouquin",$book_id);
        $query->bindParam("action",$status);
        $query->bindParam("dates",$date);
        $query->execute();

        

        //query for decrement the book
        $sqlState=$conn->prepare("UPDATE `book` set quantity_taken=:taked WHERE book_id=:ide");
        $sqlState->bindParam("taked",$book_taken);
        $sqlState->bindParam("ide",$book_id);
        $sqlState->execute();

        $sql=$conn->prepare("DELETE FROM request_book WHERE student_id=:etudiant AND book_id=:book");
        $sql->bindParam("etudiant",$student_id);
        $sql->bindParam("book",$book_id);
        $sql->execute();

        if($book_taken==0){
            $statut=0;
            $sql_query=$conn->prepare("UPDATE book set `status`=:st WHERE book_id=:bookk");
            $sql_query->bindParam("st",$statut);
            $sql_query->bindParam("bookk",$book_id);
            $sql_query->execute();
        }
        return $sql;

    }
}

function refuse_request($student_id,$book_id,$date,$msg){
    $conn=connect_database();
    
    $status="rejeter";
    $query=$conn->prepare("INSERT INTO accept_refuse(etudiant,bouquin,action,date_retour,message) VALUES(:etudiant,:bouquin,:action,:dates,:msg)");
    $query->bindParam("etudiant",$student_id);
    $query->bindParam("bouquin",$book_id);
    $query->bindParam("action",$status);
    $query->bindParam("dates",$date);
    $query->bindParam("msg",$msg);
    $query->execute();

    $sql=$conn->prepare("DELETE FROM request_book WHERE student_id=:etudiant AND book_id=:book");
    $sql->bindParam("etudiant",$student_id);
    $sql->bindParam("book",$book_id);
    $sql->execute();
    return $sql;
}


function list_accept(){
    $conn=connect_database();
    $action="accepter";
    $query=$conn->prepare("SELECT * FROM `accept_refuse` join student on accept_refuse.etudiant=student.student_id join book on book.book_id=accept_refuse.bouquin join classe on classe.class_id=student.class_id WHERE accept_refuse.action=:action");
    $query->bindParam("action",$action);
    $query->execute();
    return $query;

}

function list_student_reject(){
    $conn=connect_database();
    $action="rejeter";
    $query=$conn->prepare("SELECT * FROM `accept_refuse` join student on accept_refuse.etudiant=student.student_id join book on book.book_id=accept_refuse.bouquin join classe on classe.class_id=student.class_id WHERE accept_refuse.action=:action");
    $query->bindParam("action",$action);
    $query->execute();
    return $query;

}
function book_returned($book_id,$etudiant,$date){
    $conn=connect_database();

    //query for increment the book
    $sql_single=$conn->prepare("SELECT * FROM `book` WHERE book_id=:ide");
    $sql_single->bindParam("ide",$book_id);
    $sql_single->execute();
    $sql_single=$sql_single->fetch(PDO::FETCH_ASSOC);
    $book_quant=$sql_single["quantity_taken"];
    $book_quantity=$sql_single["quantity"];

    $book_taken=$book_quant+1;
    if($book_quantity >=$book_taken){
        $query=$conn->prepare("UPDATE `book` set quantity_taken=:taked WHERE book_id=:ide");
        $query->bindParam("taked",$book_taken);
        $query->bindParam("ide",$book_id);
        $query->execute();
    
        $statut=1;
        $sql_query=$conn->prepare("UPDATE book set `status`=:st WHERE book_id=:bookk");
        $sql_query->bindParam("st",$statut);
        $sql_query->bindParam("bookk",$book_id);
        $sql_query->execute();

        $sql=$conn->prepare("DELETE FROM accept_refuse WHERE bouquin=:book and etudiant=:etud and date_retour=:date_retour");
        $sql->bindParam("book",$book_id);
        $sql->bindParam("etud",$etudiant);
        $sql->bindParam("date_retour",$date);

        $sql->execute();
        return $sql;
    }
    

}

?>