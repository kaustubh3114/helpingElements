<?php include('partials/menu.php')?>
        <?php 
            //check whether id is set or not
            if(isset($_GET['id']))
            {
                //get all the details
                $id = $_GET['id'];

                //sql query to the selected service
                $sql2 = "SELECT * FROM tbl_service WHERE id=$id";
                //execte the query
                $res2 = mysqli_query($conn, $sql2);

                //get the value based on query executed
                $row2 = mysqli_fetch_assoc($res2);

                //get the value of selected service
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $current_image = $row2['image_name'];
                $current_category = $row2['category_id'];
                $featured = $row2['featured'];
                $active = $row2['active'];

            }
            else
            {
                //redirect to manage service
                header('location:'.SITUERL.'admin/manage-service.php');
            }
        ?>
 <div class="main-content">
    <div class="wrapper">
    <h1>Update Service</h1>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <br>
           
            
            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="22" rows="5"><?php echo $description;?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price;?>">
                </td>
            </tr>

            <tr>
                <td>Current image: </td>
                <td> 
                    <?php
                        if($current_image == "")
                        {
                            //image not avialable
                            echo "<div class='error'>image not available</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL;?>photos/service/<?php echo $current_image;?>" width="150px"alt=""<?php echo $title;?>>
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                   <select name="category">

                   <?php

                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        //execute the query
                        $res = mysqli_query($conn, $sql);
                        //count rows
                        $count = mysqli_num_rows($res);

                        //check whether category avaialable or not
                        if($count>0)
                        {
                            //category avaialable
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                              
                                echo"<option value='$category_id'>$category_title</option>";
                            }
                        }
                        else
                        {
                            //category unavaialable
                            echo "<option value='0'>Category not available</option>";
                        }
                   ?>
                   
                   </select>
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
                    <input type="hidden" name="id" value="<?php echo $id;?>"> 
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>"> 
                    <input type="Submit" name="Submit" value="Update Service" class="btn-secondary"> 
                    </td>
                </tr>

        </table>
    </form>

    <?php
            if(isset($_POST['Submit']))
            {
                // echo "clicked";
                //1. get the all values from form

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //check whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                    {
                      //image available
                      //rename the image
                      $ext = end(explode('.',$image_name));

                      $image_name = "service-name".rand(000, 999).'.'.$ext;

                      $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../photos/service/".$image_name;

                        //finally upload the image 
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check the whether the image uploaded or not
                        //and if not uploaded then stop the process and rediect to the error message

                        if($upload==false)
                        {
                            //set message
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                            //redirect to the add category page
                            header('location:'.SITEURL.'admin/manage-service.php');
                            //die (stop) process
                            die();
                        }
                          //B. remove the current image
                          if($current_image !="")
                          {
                              $remove_path = "../photos/category/".$current_image;
  
                              $remove = unlink();
      
                              //check the whether is image is removed or not
                              // if failed to remove display message and stop the process
                              if($remove==false)
                              {
                                  //failed to remove image
                                  $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                                  header('location:'.SITEURL.'admin/manage-service.php');
                                  die();//stop the process
                              }
                          }
                    }   
            }
                else
                {
                    $image_name = $current_image;
                }
                
                //4. update the Database
                $sql3 = "UPDATE tbl_service SET 
                title='$title',
                description='$description',
                price = $price;
                image_name = '$image_name';
                category_id = '$category';
                featured='$featured',
                active='$active' 
                WHERE id=$id
                ";
                //execute the query
                $res3 = mysqli_query($conn, $sql3);

                //check the whether the query is executed or not
                // if($res3==)
                //redirect to manage category with message

            
    ?>


    </div>
 </div>

<?php include('partials/footer.php')?>




                   