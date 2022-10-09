
  <!-- ======= Header ======= -->
  <?php include ('TopBar.php');


      // Profile Details Update Code
if (isset($_POST['update_chat'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $U_questions = mysqli_real_escape_string($conn, $_POST['U_questions']);
    $U_answers = mysqli_real_escape_string($conn, $_POST['U_answers']);

    $query = "UPDATE `chats` SET questions='$U_questions', answers='$U_answers' WHERE id='$id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['status'] = "Chatlist Details Updated <b class='text-success'>Successfully</b>";
        header('refresh:2; chatlist');
    } else {
        $_SESSION['status'] = "Chatlist Details Updation <b class='text-danger'>Failed</b>";
        header('refresh:2; chatlist');
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
        <?php
            include 'alert.php';
            ?>

            <?php
            include 'db_conn.php';
           $id = $_GET['id'];
           
            $sql = "SELECT * FROM `chats` WHERE id='$id'";
            $query_run = mysqli_query($conn, $sql);

            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row){
                    ?>
        <div class="container shadow mb-5 bg-white rounded p-3 border-5 border-top border-primary">
            <div class="d-flex w-100">
                <h3 class="card-title col-auto flex-grow-1 flex-shrink-1 text-primary">Uploaded Music</h3>
            </div>
            
            <form action="" method="post" enctype="multipart/form-data" class="container"  autocomplete="off">
                <div class="modal-body">
                <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                        <label for="questions" class="form-label">Questions:</label>
                        <input type="text" value="<?php echo $row['questions']; ?>" name="U_questions" class="form-control my-2" placeholder="Enter questions" required>
                    </div>
                    <div class="mb-3">
                        <label for="answers" class="form-label">Answers:</label>
                        <input type="text"  value="<?php echo $row['answers']; ?>" name="U_answers" class="form-control my-2" placeholder="Enter answers" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update_chat">Update</button>
                </div>
            </form>
                <?php
        }   
    }
    ?>

        </div>
    </div>



</div>  
</section>

</main>
<!-- End #main -->






  <!-- ======= Footer ======= -->
  <?php include ('footer.php'); ?>
  <!-- End Footer -->

  