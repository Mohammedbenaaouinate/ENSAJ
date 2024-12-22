<?php

function count_total_book(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM book");
    $query->execute();
    $book=0;
    foreach($query as $result){
        $book=$book+$result["quantity"];
    }
    return $book;

}

function count_request(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM request_book");
    $query->execute();
    $row=$query->rowCount();
    return $row;

}
function count_available_book(){
    $conn=connect_database();
    $query=$conn->prepare("SELECT * FROM book");
    $query->execute();
    $book=0;
    foreach($query as $result){
        $book=$book+$result["quantity_taken"];
    }
    return $book;


}

function count_emprunted_book(){
    $conn=connect_database();
    $action="accepter";
    $query=$conn->prepare("SELECT * FROM accept_refuse WHERE action=:ac");
    $query->bindParam("ac",$action);
    $query->execute();
    $row=$query->rowCount();
    return $row;
}

function verify_emprunted_book(){
    $conn=connect_database();
    $action="accepter";
    $query=$conn->prepare("SELECT * FROM accept_refuse join student on accept_refuse.etudiant=student.student_id join book on accept_refuse.bouquin=book.book_id WHERE accept_refuse.action=:ac");
    $query->bindParam("ac",$action);
    $query->execute();
    return $query;
}



?>