<?php include('../config/constants.php');?>
<html>
    <head>
        <title> Helping elements-admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>

    <div class="login">
        <h1 class="text-center">Login</h1>
<br><br>
    <?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
    <br><br>


            <!-- login form starts from here -->
            <form action="" method="POST" class="text-center">
                Username:
              
                <input type="text" name="username" placeholder="Enter Username">
                <br><br>
                Password:
              
                <input type="password" name="password" placeholder="Enter a password">
                <br> <br>

                <input type="submit" name="submit" value="login" class="btn-primary">
                
            </form>
            <br>

        <p class="text-center"> created by- <a href="www.helpinelements.com">helping elements</a></p>
    </div>
    </body>
</html>

<?php
        //whether the submit button clicked or not

        if(isset($_POST['submit']))
        {
            //process for login
            //1.get the data from login form 

            $username = $_POST['username'];
            $password = $_POST['password'];
            

            //2. whether the sql check the user with username and password exists or not
            $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password ='$password'";

            //3. execute the querry 
            $res = mysqli_query($conn, $sql);

            //4. count rows whether rows exists or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                        //user available
                        $_SESSION['login'] = "<div class='success'>login sucessfull.</div>";
                        //redirect to the home page or desktop 
                        header('location:'.SITEURL.'admin/');
            }
            else
            {
                        //user unavailable or fail
                         $_SESSION['login'] = "<div class='error text-center'>username and password not match.</div>";
                         //redirect to the home page or desktop 
                         header('location:'.SITEURL.'admin/login.php');
            }
        }
?>