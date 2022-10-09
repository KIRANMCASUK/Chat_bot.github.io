<?php 

if(isset($_SESSION['status']))
    { ?>
        <div class="alert alert-info alert-dismissible fade show text-center container" role="alert">
            <strong>Hey! </strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> 
        <?php
        unset($_SESSION['status']);
    }
?>