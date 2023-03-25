<?php

include('C:\xampp\htdocs\helpingelements\partials-front\menu.php'); ?>
   
   
   <section class="service-search text-center">
        <div class="container">
            
            <form action="service-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for a Service." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Services</h2>

            <?php 
            
            //display all the categories that are active
            //sql query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            //execute the query
            $res = mysqli_query($conn , $sql);

            //count rows
            $count = mysqli_num_rows($res);

            //check whether categories available or not
            if($count>0)
            {
                //categories avivalable
                while($row = mysqli_fetch_assoc($res))
                {
                    //get the valuess
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <a href="#">
                          <div class="box-3 float-container">

                          <?php 
                          if($image_name=="")
                          {
                            //image not available

                          }
                          else
                          {
                            //image available
                            ?>
                        <img src="<?php echo SITEURL;?>photos/category/<?php echo $image_name;?>" height="400" alt="" class="img-responsive img-curve">
                            <?php
                          }
                          
                          ?>
                   

                  <h3 class="float-text text-white"></h3>
                           </div>
                    </a>

                    <?php
                }
            }
            
            ?>

           
          

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


   
    <?php

include('C:\xampp\htdocs\helpingelements\partials-front\footer.php'); ?>
   

