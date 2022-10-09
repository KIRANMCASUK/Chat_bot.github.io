<?php
session_start();
include_once 'db_conn.php';
// Music Delete
if(isset($_POST['delete_chat'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $questions = mysqli_real_escape_string($conn, $_POST['questions']);
    $answers = mysqli_real_escape_string($conn, $_POST['answers']);
    $query = "DELETE FROM `chats` WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){

        $_SESSION['status'] = "Chat Data Deleted <b class='text-success'>Successfully</b>";
    }else{
        $_SESSION['status'] = "Chat Data Deletion <b class='text-danger'>Failed</b>";

    }
}
?>