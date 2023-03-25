<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

<br/><br/>

<?php 
        if(isset($_SESSION['add']))//check the whether the session is set or not
        {
            echo $_SESSION['add'];//display session
            unset($_SESSION['add']);//removing sesssion message
        }
        ?>

        <form action="" method="POST">

    <table class="tbl-30">
    <tr>
        <td>Full Name:</td>
        <td><input type="text" name="full_name" placeholder="enter your name"></td>
    </tr>

    <tr>
        <td>UserName:</td>
        <td><input type="text" name="user_name" placeholder="Your Username"></td>
    </tr>

    <tr>
        <td>Password:</td>
        <td><input type="password" name="password" placeholder="enter your password"></td>
    </tr>

    <tr>
        <td colspan="2">
        <input type="Submit" name="Submit" value="Add Admin" class="btn-secondary"> 
    </td>
    </tr>

    </table>

        </form>
    </div>
</div>

<?php 
//process the value from form and save it in database
//check whether the button is clicked or not

    if(isset($_POST['Submit']))
    {
        //button clicked
       // echo "Button clicked";

       //1.get the data from the form 

      $full_name = $_POST['full_name'];
      $username = $_POST['user_name'];
      $password =$_POST['password'];//password will encryption with MD5
    //   $hash = password_hash($password,PASSWORD_DEFAULT);
      //2. sql query to save the data into data base
      //echo 
      $hash;

      $sql = "INSERT INTO `tbl_admin`( `full_name`, `username`, `password`) VALUES ('$full_name','$username','$password')";
     
       //3. executing query and saving data into database  
       $res = mysqli_query($conn, $sql);

        //4. check whether the data is inserted or not display apporiate message
        if($res==TRUE)
        {
           
            //DATA inserted
            //create a session(to display a message)
            //echo"DATA INSERTED";  
            $_SESSION ['add']= "<div class='success'>Admin added Succesfully.</div>";
            //redirect page to managae ADmin
            header("location:".SITEURL.'admin/manage-admin.php');
        } 
        else{
            //DATA inserted
            //create a session(to display a message)
            //echo" fail to DATA INSERTE ";  
            $_SESSION ['add']= "<div class='error'>Fail to add Admin.</div>";
            //redirect page to managae ADmin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
    ?>

<?php include('partials/footer.php')?>


        
