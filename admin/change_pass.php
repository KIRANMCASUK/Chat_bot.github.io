

  <!-- ======= Header ======= -->
  <?php include ('TopBar.php'); ?>

  <!-- End Header -->
  <?php
  // Change Password code
if (isset($_POST['update_password'])) {
    $id = $_POST['id'];
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $c_pass = mysqli_real_escape_string($conn, md5($_POST['c_pass']));

    if (!empty($update_pass) || !empty($new_pass) || !empty($c_pass)) {
        if ($update_pass != $old_pass) {
            $_SESSION['status'] = "Old Password Not <b class='text-danger'>Matched!!</b>";
        } else if ($new_pass != $c_pass) {
            $_SESSION['status'] = "Confirm Password Not <b class='text-danger'>Matched!!</b>";
        } else {
            mysqli_query($conn, "UPDATE users SET password='$c_pass' WHERE id='$id'");
            $_SESSION['status'] = "Password Updated <b class='text-success'>Successfully!!</b>
                                <span>You will be redirected to login..</span>";
            header('refresh:3; logout');
        }
    }
}
?>

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
        <div class="container shadow mb-5 bg-white rounded p-3 border-5 border-top border-primary">


        <form action="" method="POST" enctype="multipart/form-data" class="my-2">
        <?php
                    $select = mysqli_query($conn, "SELECT * FROM Users WHERE id='$user_id'");
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                        $username = $fetch['username'];
                    }
                    ?>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $fetch['id']; ?>">
                    <input type="hidden" name="old_pass" class="form-control" value="<?php echo $fetch['password'] ?>">
                    <div class="form-group my-3">
                        <label for="update_pass">Old Password</label>
                        <input type="password" name="update_pass" class="form-control" placeholder="Enter Your Previous Password" value="" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="new_pass">New Password</label>
                        <input type="password" name="new_pass" class="form-control" placeholder="Enter New Password" value="" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="c_pass">Confirm Password</label>
                        <input type="password" name="c_pass" class="form-control" placeholder="Confirm New Password" value="" required>
                    </div>
                    <center class="mt-3">
                        <input type="submit" name="update_password" class="btn btn-primary" value="Change Password">
                        <a href="index" class="btn btn-secondary">Go To Home</a>
                    </center>
                </form>



        </div>
    </div>



</div>  
</section>

</main>
<!-- End #main -->



  <!-- ======= Footer ======= -->
  <?php include ('footer.php'); ?>
  <!-- End Footer -->

  