<?php
        //authorization and access control
        //check whether the user is logged in or not 
        if(isset($_SESSION['user']))
        {
            //user is not logged in
            //redirect to login page with message
            $_SESSION['no-login-message'] = "<div class='error'>please login to access Admin pannel.</div>";
            //redirect to login php
            header('location:'.SITEURL.'admin/login.php');
        }
    ?>
