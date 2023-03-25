<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Services</h1>
        <br><br>

        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="title of the service">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="25" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="File" name="image_name">
                    </td>
                </tr>



                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                            //Create the code to display categories from database         
                            //1. create sql to get the active categories from database

                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            $res = mysqli_query($conn, $sql);

                            //count rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //if count is greater than zero else we have categories else we do not have categories
                            if ($count > 0) {
                                // we have categories
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of categories
                                    $id = $row['id'];
                                    $title = $row['title'];

                            ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                <?php
                                }
                            } else {
                                // we do not have categories
                                ?>
                                <option value="0">No category Found</option>
                            <?php
                            }
                            ?>

                        </select>
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
                        <input type="Submit" name="Submit" value="Add Service" class="btn-secondary">
                    </td>
                </tr>


            </table>
        </form>
        <?php

        //check whether the button is clicked pr not
        if (isset($_POST['Submit'])) {
            //add to the service in database
            //echo "clicked";


            //1. get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];


            //check whether radio button featured and active or not
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No"; //setting the defualt value

            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No"; //setting deafault value
            }

            //2. upload the image if selected
            //check whether the select image is clicked and upload image only if the image is selected
            if (isset($_FILES['image']['name'])) {
                ///get the deatils of the selected image
                $image_name = $_FILES['image']['name'];
                ?>
                <script>
                alert("<?php echo $image_name; ?>") ;
                </script>
                <?php

                //check the whether the image is selected or not and upload image only if selected 

                if ($image_name != " ") {
                    //image is selected
                    //A. rename the image
                    //get the exetesion of selected image(jpg,gif,png,etc..) "kaustubh-savalia.jpg"
                    $ext = end(explode('.', $image_name));

                    //create new name for image
                    $image_name = "service-name-" . rand(0000, 9999) . "." . $ext; //new image name may be "servie-name-"

                    //B. upload the image
                    //get the source file and destination path



                    $src = $_FILES['image']['tmp_name'];

                    $dst = "../photos/service/" . $image_name;

                    //finally upload the image 
                    $upload = move_uploaded_file($src, $dst);
                    //check the whether the image uploaded or not

                    if ($upload == false) {
                        //failed to upload the image
                        //redirect the add service page with errror messageg
                        $_SESSION['upload'] = "<div class='error'>Fail to upload image</div>";
                        header('location:' . SITEURL . 'admin/add-service.php');
                        //stop process
                        die();
                    }
                }
            } else {
                $image_name = ""; //setting deafult value as a blank
            }

            //3. insert into database

            //create a sql query to save or add service
            //for numerical we do not need to pass value inside quotes '' but for string is is complusory to add quotes ''  
            $sql2 = "INSERT INTO tbl_service SET
                title = '$title',
                description = '$description',
                price = '$price',
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'             
                ";

            //execute the query 
            $res2 = mysqli_query($conn, $sql2);
            //check whether data inserted or not
            //4. redirect with massage to manage service image
            if ($res2 == true) {
                //data inserted successfully
                $_SESSION['add'] = "<div class='success'>Service Added Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-service.php');
            } else {
                //failed to add category
                $_SESSION['add'] = "<div class='error'> Fail to Add Service.</div>";
                //redirect to manage category page
                header('location:' . SITEURL . 'admin/manage-service.php');
            }
        }


        ?>

    </div>
</div>

<?php include('partials/footer.php') ?>