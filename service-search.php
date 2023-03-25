<?php
include('C:\xampp\htdocs\helpingelements\partials-front\menu.php'); ?>




<section class="service-search text-center">
        <div class="container">
            <div class="container">
                <h2>Foods on <a href="#" class="text-white">"Search for home cleaning"</a></h2>
            </div>

        </div>
    </section>
<!-- Service Menu Section Starts Here -->
<section class="service-menu">
        <div class="container">
            <h2 class="text-center">services list</h2>

            <?php
            
            //get the search keyword
            $search = $_POST['search'];
            
            //sql query to get service based on search keyword
           //get the search keyword
           $search = $_POST['search'];

           //sQL Query to Get Foods based on search keyword
    $sql = "SELECT FROM tbl_service WHERE title LIKE '%$search%' OR description LIKE '$search%'";

    //exexcute the query
    $res = mysqli_query($conn, $sql);

    //count rows 
    $count = mysqli_num_rows($res);

    //check whether service available or not 
    if($count>0)
    {
        //service available 
        while($row=mysqli_fetch_assoc($res))
        {
            //get the details
            $id = $row['id'];
            $title = $row['title'];
            $price = $rowl[ 'price'];
            $description = $row['$description'];
            $image_name['id'];
             $image_name =
            
        }
    }
        else
        {
            //service not available 
            echo "<div class='error'>Service not found.>/</div>"
        }
    

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

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="service-menu-box">
                <div class="service-menu-img">
                    <img src="../helpingelements/photos/vector house cleaning.jpg" alt="reload" class="img-responsive img-curve">
                </div>

                <div class="service-menu-desc">
                    <h4>house cleaning</h4>
                    <p class="service-price">₹230/-</p>
                    <p class="service-detail">
                        Giving best quality of the cleaning 
                        
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="service-menu-box">
                <div class="service-menu-img">
                    <img src="../helpingelements/photos/vector fan repair.jpg" alt="Reload" class="img-responsive img-curve">
                </div>

                <div class="service-menu-desc">
                    <h4>fan repair</h4>
                    <p class="service-price">₹200/-</p>
                    <p class="service-detail">
                       at home Giving best quality of the repairing a fan
                    <br>

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="service-menu-box">
                <div class="service-menu-img">
                    <img src="../helpingelements/photos/vector men.jpg" alt="Reload" class="img-responsive img-curve">
                </div>

                <div class="service-menu-desc">
                    <h4>hair cut (men)</h4>
                    <p class="service-price">₹170/-</p>
                    <p class="service-detail">
                        Giving best quality serives of hair cuting 
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="service-menu-box">
                <div class="service-menu-img">
                    <img src="../helpingelements/photos/vector women.png" alt="reload" class="img-responsive img-curve">
                </div>

                <div class="service-menu-desc">
                    <h4>hair cut (women)</h4>
                    <p class="service-price">₹190/-</p>
                    <p class="service-detail">
                        Giving best quality service in women saloon
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="service-menu-box">
                <div class="service-menu-img">                    
                    <img src="../helpingelements/photos/vector care taker.webp" alt="reload" class="img-responsive img-curve">
                </div>

                <div class="service-menu-desc">
                    <h4>care taker (a day)</h4>
                    <p class="service-price">₹300/-</p>
                    <p class="service-detail">
                       Providing service for take caker at home at any time
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Book Now</a>
                </div>
            </div>


            <div class="clearfix"></div>
           <?php include('C:\xampp\htdocs\helpingelements\partials-front\footer.php'); ?>