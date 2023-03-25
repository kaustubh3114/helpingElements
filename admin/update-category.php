<?php

include('partials/menu.php'); ?>
<div class="main-content">
<div class="wrapper">
    <h1>Update Category</h1>

    <br><br>
        <?php
                //check whether the id is set or not
                if(isset($_GET['id']))
                {
                    //get the id and all the other details 
                    // echo "Getting the data";
                    $id = $_GET['id'];
                    //create sql query to get all other details
                    $sql = "SELECT * FROM tbl_category WHERE id=$id";

                    //execute the query 
                    $res = mysqli_query($conn, $sql);

                    //count the rowes whether the is is valid or not
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get all the data
                        $row = mysqli_fetch_assoc($res);
                        $title = $row['title'];
                        $current_image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active']; 
                    }
                    else
                    {
                            //redirect the manage category with session message
                            $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                            header('location:'.SITEURL.'admin/manage-categories.php');
                    }
                }
                else
                {
                    //redirect to manage category
                    header('location:'.SITEURL.'admin/manage-categories.php');
                }

        ?>


    <form action="" method="POST" enctype="multipart/form-data">

    <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title?>">
                </td>
            </tr>
<br>
            <tr>
                <td>Current image: </td>
                <td>
                    <?php 
                    if($current_image !="")
                    {
                        //display the image
                    ?>
                    <img src="<?php echo SITEURL;?>photos/category/<?php echo $current_image;?>"width="100px">
                    <?php
                }
                else 
                {
                    //display message
                    echo "<div class='error'>Image not Added.</div>";
                    
                }
                ?>
                </td>
            </tr>

           <tr>
                <td>New image: </td>
                <td>
                <input type="file" name="image"> 
                </td>
            </tr>

            <tr>
                <td>Featured:  </td>
                <td>
                    <input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">Yes
                    
                    <input <?php if($featured=="No"){echo "checked";} ?>  type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes">Yes
                    
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                </td>
            </tr>

                <tr>
                    <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>"> 
                    <input type="hidden" name="id" value="<?php echo $id;?>"> 
                    <input type="Submit" name="Submit" value="Update Category" class="btn-secondary"> 
                    </td>
                </tr>

        </table>
        </form>
        
        
        <?php
            if(isset($_POST['Submit']))
            {
                //echo "clicked";
                //1. get the all values from form

                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];


                //2. updating the image if selected
                //check whethe image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                    $image_name = $_FILES['image']['name'];

                    //check whether the image is available or not
                    if($image_name !="")
                    {
                        //image available
                        //updload the new image

                         //auto renaming image 
                        //get the extension  of our image (jpg, gif,etc) e.g "Specialservice-1.jpg"
                        $ext = end(explode('.',$image_name));

                        //rename the image

                        $image_name = "service_category_".rand(000, 999).'.'.$ext;//e.g service_category_834.jpg
                        
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../photos/category/".$image_name;

                        //finally upload the image 
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check the whether the image uploaded or not
                        //and if not uploaded then stop the process and rediect to the error message

                        if($upload==false)
                        {
                            //set message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                            //redirect to the add category page
                            header('location:'.SITEURL.'admin/manage-categories.php');
                            //die (stop) process
                            die();
                        }

                        //B. remove the current image
                        if($current_image !="")
                        {
                            $remove_path = "../photos/category/".$current_image;

                            $remove = unlink($remove_path);
    
                            //check the whether is image is removed or not
                            // if failed to remove display message and stop the process
                            if($remove==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                                header('location:'.SITEURL.'admin/manage-categories.php');
                                die();//stop the process
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;

                }

                //3.update the Database
                $sql2 = "UPDATE `tbl_category` SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active' 
                WHERE id=$id
                ";

                //execute the query 
                $res2 = mysqli_query($conn, $sql2);


                //4. redirect to manage category with message
                //check whether query executes or not 
                if($res2==true)
                {
                    //category updated
                    $_SESSION['update'] = "<div class='success'>Category updated succesfully.</div>";
                    header('location:'.SITEURL.'admin/manage-categories.php');
                }
                else
                {
                    // failed to update category
                    $_SESSION['update'] = "<div class='error'>Fail to update Category.</div>";
                    header('location:'.SITEURL.'admin/manage-categories.php');
                }


            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php')?>



