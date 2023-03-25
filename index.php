<?php

include('C:\xampp\htdocs\helpingelements\partials-front\menu.php'); ?>
   
    <!-- Navbar Section Ends Here -->

    <!-- Service SEARCH Section Starts Here -->
    <section class="service-search text-center">

        <div class="container">
            
            <form action="<?php echo SITEURL;?>service-search.php" method="POST">

                <input type="search" name="search" placeholder="Search for a Service." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Service SeARCH Section Ends Here -->

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Our trending services of the week</h2>

            <?php
                //create a sql query to display categories from database
                //2 ROW DATA WITH LIMIT
                $sql = "SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 2";
                //execute the query
                $res = mysqli_query($conn, $sql);
                //count rows to check whether the category avaialable or not 
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    //category avaialable
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the value like title,image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                         <a href="category-services.html">
                            <div class="box-3 float-container">
                                <?php 

                                //check whether image is avilable or not
                                        if($image_name=="")
                                        {
                                            //display message
                                            echo "<div class='error'>Image not avaialable</div>";
                                        }  
                                        else
                                        {
                                                //image available
                                                ?>
                                                 <img src="<?php echo SITEURL;?>photos/category/<?php echo $image_name;?>" height="400" alt="" class="img-responsive img-curve">
                                                <?php
                                                 
                                        }
                                ?>
                               
                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                            </a>

                        <?php

                    }
                }
                else
                {
                    //category avaialable not
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>

           
           
            
<!-- 
            <a href="#">
                <div class="box-3 float-container">
                    <img src="../helpingelements/photos/Car Clean and Wash.jpg" height="400" alt="Car wash" class="img-responsive img-curve">
    
                    <h3 class="float-text text-white">Car wash</h3>
                </div>
                </a> -->

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Service Menu Section Starts Here -->
    <section class="service-menu">
        <div class="container">
            <h2 class="text-center">services list</h2>

            <?php
                //getting services from database that are active and featured  
                //sql query
                $sql2 = "SELECT * FROM tbl_service WHERE active='Yes' AND featured='Yes' LIMIT 6";
                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //count rows
                $count2 = mysqli_num_rows($res2);

                //check the whether service avaialable or not 
                if($count2>0)
                {
                    //service available
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        //get all the value
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $$image_name = $row['image_name'];
                        ?>

                            <div class="service-menu-box">
                                 <div class="service-menu-img">
                                <img src="../helpingelements/photos/vector car wash.jpg" alt="car wash" class="img-responsive img-curve">
                                </div>

                                 <div class="service-menu-desc">
                                <h4>car washing</h4>
                                <p class="service-price">₹250/-</p>
                                <p class="service-detail">
                                    Giving best quality of the washing  
                                </p>
                                <br>

                                <a href="http://localhost/helpingelements/booking.php" class="btn btn-primary">Book Now</a>
                                 </div>
                            </div>
                        <?php 
                    }

                }
                else
                {
                   //service not available
                   echo "<div class='error'>Service not available.</div>";        
                }
            ?>

           



            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="../helpingelements/category.php">See all remaining services</a>
        </p>
    </section>
    <!-- Service Menu Section Ends Here -->

   
  <?php

include('C:\xampp\htdocs\helpingelements\partials-front\footer.php'); ?>
   