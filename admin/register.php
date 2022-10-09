
    <!-- ======= Header ======= -->
    <?php include ('TopBar.php');
    
    $conn = mysqli_connect('localhost','root','','chat_bot') or die('connection failed');
    
    if(isset($_POST['register'])){
    
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $c_pass = mysqli_real_escape_string($conn, md5($_POST['c_password']));

    
            // Dublicate Info Checking
            $duplicate=mysqli_query($conn, "SELECT * FROM users where username='$username'");
            $duplicate1=mysqli_query($conn, "SELECT * FROM users where email='$email'");
    
            if (mysqli_num_rows($duplicate)>0){
                $_SESSION['status'] = "Username Name Already <b class='text-danger'>Exists!!</b> $username";
            }else if (mysqli_num_rows($duplicate1)>0){
                $_SESSION['status'] = "Email Address Already <b class='text-danger'>Exists!!</b> $email";
            }else{ 
            if($pass != $c_pass){
                $_SESSION['status'] = "Confirm Password not <b class='text-danger'>Matched!!</b>";
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `users`(name,username,email,password) VALUES
                ('$name','$username','$email','$pass')");
    
                if($insert){
                    $_SESSION['status'] = "Registered <b class='text-success'>Successfully</b>";
                  }else{
                    $_SESSION['status'] = "Registration <b class='text-danger'>Failed</b>";
                }
            }
        }
    }
    
    
    ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include ('sideBar.php'); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">

    <div class="pagetitle">
    
    <!-- <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        
        <li class="breadcrumb-item active">Chat List</li>
        </ol>
    </nav> -->
    </div>
    <!-- End Page Title -->

    <section class="section">
    <?php include 'alert.php'; ?>

    <div class="row">
      <div class="container-fluid">
      <div class="container shadow mb-5 bg-white rounded p-3 border-5 border-top border-primary">

        <form action="" method="POST" enctype="multipart/form-data" class="my-2">
              <div class="d-flex flex-column">
              <div class="row my-1">
                  <div class="col">
                      <label for="">Username</label>
                      <input type="text" class="form-control my-1" placeholder="Enter Username" name="username" required>
                  </div>
                  <div class="col">
                      <label for="">Email Address</label>
                      <input type="email" class="form-control my-1" placeholder="Enter Email Address" name="email" required>
                  </div>
              </div>
              <div class="row my-1">
                  <div class="col">
                      <label for="">Full Name</label>
                      <input type="text" class="form-control my-1" placeholder="Enter Full Name" name="name" required>
                  </div>
              </div>
              <div class="row my-1">
                  <div class="col">
                      <label for="password">Password</label>
                      <input type="password" class="form-control my-1" placeholder="Enter Password" name="password" required>                
                  </div>
                  <div class="col">
                      <label for="password">Confirm Password</label>
                      <input type="password" class="form-control my-1" placeholder="Confirm Password" name="c_password" required>
                  </div>
              </div>
                  <input type="submit" name="register" value="Registration" class="btn btn-primary btn-block my-2" style="width:100%">
                      <div class="d-flex justify-content-between">
                          <span class="text-dark">Already Have an Account ?</span>
                          <a class="text-decoration-none" href="login">Click Here</a>
                      </div>
                  <hr class="text-primary">

          </form>

        </div>

    </div>

    </div>



</div>  
</section>

</main>
<!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('footer.php'); ?>
  <!-- End Footer -->