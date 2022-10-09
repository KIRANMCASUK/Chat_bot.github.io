
  <!-- ======= Header ======= -->
  <?php include ('TopBar.php'); 
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
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 <?php include ('sideBar.php'); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

<div class="pagetitle">
  
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
     
      <li class="breadcrumb-item active">Chat List</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
<?php include 'alert.php'; ?>

  <div class="row">
  <div class="container-fluid">
        <!-- Button trigger modal -->
        <div class="container shadow mb-5 bg-white rounded p-3 border-5 border-top border-primary">
            <div class="d-flex w-100">
                <h3 class="card-title col-auto flex-grow-1 flex-shrink-1 text-primary">Uploaded Music</h3>
                <!-- Button trigger modal -->
                <button class="btn btn-primary rounded-0 btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#chat_modal"
                type="button"> Add</button>
            </div>
            <div class="table-responsive ">
                <table id="table" class="display  table table-bordered table-striped text-center" style="width:100%">
                    <thead class="p-3 mb-2 bg-dark text-white bordered">
                        <tr>
                            <th>ID</th>
                            <th>QUESTIONS</th>
                            <th>ANSWERS</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody class="bg-light">
                    <?php
                    include_once 'db_conn.php';
                  
                    $sql = "SELECT * FROM chats ORDER BY id ASC";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {
                      
                    while ($row = mysqli_fetch_assoc($res)) {
                    
                        echo 
                        "
                        <tr>
                      <td>".$row['id']."</td>
                      <td>".$row['questions']."</td>
                      <td>".$row['answers']."</td>
                   <td>
                      <a class='btn btn-outline-primary' href='chat_edit.php?id=$row[id]'>Edit</a>
                      </td> 
                      <td>
                      <form action='' method='POST' class='mb-1'>
                      <input type='hidden' name='id' value='$row[id]'>
                      <input type='hidden' name='questions' value='$row[questions]'>
                      <input type='hidden' name='answers' value='$row[answers]'>
                      <button class='btn btn-outline-danger' onclick='return confirmation(Are you sure?)' type='submit' name='delete_chat'>Remove</button>
                      </td>
                </form>


</tbody>";
                    }
                }
?>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>QUESTIONS</th>
                            <th>ANSWERS</th>
                            <th>ACTIONS</th>
                           
                        </tr>
                    </tfoot>
                </table>






            </div>
        </div>
    </div>



</div>  
</section>

</main>
<!-- End #main -->




<script>
    function confirmation(){
    var result = confirm("Are you sure to delete?");
    if(result){
        // Delete logic goes here
    }
}
</script>


























        
                     <!-- Add New chat Modal Starts-->
                     <div class="modal fade" id="chat_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="chat_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chat_modalLabel">New chat Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="" method="post" enctype="multipart/form-data" class="container"  autocomplete="off">
                <div class="modal-body">
                <div class="mb-3">
                        <label for="questions" class="form-label">Questions:</label>
                        <input type="text" name="questions" class="form-control my-2" placeholder="Enter questions" required>
                    </div>
                    <div class="mb-3">
                        <label for="answers" class="form-label">Answers:</label>
                        <input type="text"  name="answers" class="form-control my-2" placeholder="Enter answers" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save_chat">Save</button>
                </div>
                </form>

            </div>
        </div>
</div>















  <!-- ======= Footer ======= -->
  <?php include ('footer.php'); ?>
  <!-- End Footer -->

  