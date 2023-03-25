<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>
        <br><br>

        <?php 
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }

        ?>

            <br><br>

        <!-- add catrgories form starts -->
        <form action="" method="POST" enctype="multipart/form-data">
        <!-- this allow us to upload file  -->

        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="category title">
                </td>
            </tr>

            <tr>
                <td>Select image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>



            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>

               <tr>
                <td colspan="2">
                <input type="Submit" name="Submit" value="Add Category" class="btn-secondary"> 
                </td>
                </tr>

        </table>

        </form>
        <!-- add categories from end -->

        <?php 
        //check whether the submit button is clicked or not
        if(isset($_POST['Submit']))
        {
            // echo "clicked";

            //1. get the value from categories fomr
            $title = $_POST['title'];

            //for radio input radio type we need to check is button clicked or not
            
            if(isset($_POST['featured']))
            {
                //get the value from form
                $featured = $_POST['featured'];

            }
                else
                {
                    //set the default value
                    $featured =['NO'];

                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];

                }
                else
                {
                            $active = "No";
                }

                //check the whether the image is selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);

                // die(); //break the code here
                if(isset($_FILES['image']['name']))
                {
                        //upload the image 
                        //to upload the image we need image name, source path and destination path 
                        $image_name = $_FILES['image']['name'];


                            //upload the image only if it's selected
                    if($image_name!="")
                    {

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
                            header('location:'.SITEURL.'admin/add-categories.php');
                            //die (stop) process
                            die();
                        }
                    }

                }

                else
                {
                    //do not upload image and the image_name value as blank
                    $image_name="";
                }
              
                //2. sql querry to insert data into category into database
                $sql = "INSERT INTO tbl_category SET title ='$title',
                image_name = '$image_name',
                featured ='$featured',
                active = '$active' 
                ";

                //3. execute the querry and save in database
                $res = mysqli_query($conn, $sql);

                // 1. check the whther the query executes or not data added or not
                if($res==true)
                {
                    //query executed and category added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-categories.php');
                }
                else
                {
                        //failed to add category
                        $_SESSION['add'] = "<div class='error'> Fail to Add Category</div>";
                        //redirect to manage category page
                        header('location:'.SITEURL.'admin/add-categories.php');
                }
            }
        ?>
    </div>
</div>


<?php include('partials/footer.php')?>
