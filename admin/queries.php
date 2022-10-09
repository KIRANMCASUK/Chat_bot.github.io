
<?php

include 'db_conn.php';

if(isset($_POST['save_chat'])){
 $questions = $_POST['questions'];
 $answers = $_POST['answers'];
 // Dublicate Info Checking
 $duplicate=mysqli_query($conn,"SELECT * FROM chats where 
questions='$questions'");
 if (mysqli_num_rows($duplicate)>0)
 {
 $_SESSION['status'] = "Question Already <b class='text-danger'>Exists!! 
$questions</b>";

 } 
 else
 { 
 // INSERT INTO DATABASE WITH FILE FOLDER
 $query = "INSERT INTO chats 
(questions,answers) 
 VALUES('$questions','$answers')";
 $query_run = mysqli_query($conn, $query);
 if($query_run)
 {
 $_SESSION['status'] = "Data Saved <b class='text-success'>Successfully</b>";
 


 }
 else
 {
 $_SESSION['status'] = "Data <b class='text-danger'>Failed</b> To Save.";


 }
 }
}
?>