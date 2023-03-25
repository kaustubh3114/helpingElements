<?php
//include constant file
include('../config/constants.php'); 
//echo "delete page";
//check whether the id amd image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //get the value and delete
    // echo "Get value and Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    ///remove the physical image file available
    if($image_name !="")

    {
        //image is available. so remove it
        $path = "../photos/service/".$image_name;
        //remove the image
        $remove = unlink($path);

        //if fail to remove image then add an error messge and stop the process
        if($remove==false)
        {
        //set ther session message 
        $_SESSION['remove'] = "<div class='error'>Fail to remove category image.</div>";
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-service.php');
        //stop the process      
        die();
        }
    }
    //delete data from database
    //sql query to delete category
    $sql = "DELETE FROM  tbl_service WHERE id=$id";
    
    //execute the query

    $res = mysqli_query($conn, $sql);

    //check whether the data is delete from database or not
    if($res==true)
    {
        //set succces message and redirect
        $_SESSION['delete'] = "<div class='error'>category deleted successfully.</div>";
        //redirect to manage category
        header('location:'.SITEURL.'admin/manage-service.php');
    }
    else
    {
          //set fail message and redirect
          $_SESSION['delete'] = "<div class='error'>fail to delete category.</div>";
          //redirect to manage category
          header('location:'.SITEURL.'admin/manage-service.php');
    }
   
}
else
{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-categories.php');

}
?>
