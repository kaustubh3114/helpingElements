

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
      echo $username;
      //echo $hash;

      $sql = "INSERT INTO `tbl_admin`( `full_name`, `username`, `password`) VALUES ('$full_name','$username','$password')";
     
       //3. executing query and saving data into database  
       $res = mysqli_query($conn, $sql);

        //4. check whether the data is inserted or not display apporiate message
        if($res==TRUE)
        {
            header("location:../manage-admin.php");
            //DATA inserted
            echo"DATA INSERTED";  

        } 
        else{
            //failed to insert data
            echo" FAIL TO DATA INSERTED";
        }
    }
    ?>