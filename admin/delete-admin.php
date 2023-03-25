<?php

//include constants.php file here
include('../config/constants.php');


//1.get the ID of an admin to be deleted
echo $id = $_GET['id'];

//2.create sql querry to delete admin
$sql ="DELETE FROM tbl_admin WHERE id=$id";

//execute the querry
$res = mysqli_query($conn, $sql);

//check the whether the query executed succesfully or not
if($res==TRUE)
{

    //Querry executed successsfully and admin deleted 
    //echo "Admin deleted";
    //create session variable to display message
    $_SESSION['delete']="<div class='error'>admin deleted successfully.</div>";
    //redirect to manage admin page 
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
   
    // fail to delete admin
    //echo "fail to delete admin";

    $_SESSION['delete'] ="<div class='error'>fail to delete admin. try again later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}

//3. redirect to manage admin page with mesasge (success/error)
?>
