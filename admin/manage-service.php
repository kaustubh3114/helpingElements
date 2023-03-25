<?php include('partials/menu.php')?>

<div class="main-content">
<div class="wrapper">
    <h1>Manage service</h1>
    <br/> <br/>
      <!--button to add admin -->
      <a href="<?php echo SITEURL;?>admin/add-service.php" class="btn-primary">Add service</a>
      <br/>
      <br/> <br/>

      <?php
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>

      <table class="tbl-full">
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
         </tr>

          <?php 
            //create a food query to get all service 
            $sql = "SELECT * FROM tbl_service";
            
            //execute the query 
            $res = mysqli_query($conn, $sql);

            //COUNT rows to check whether we have food or not
            $count = mysqli_num_rows($res);

            //create a variable and assign the value
            $sn=1; 
            
            if($count>0)
            {
              //we have service in database
              //get the service from databse and display
              while($row = mysqli_fetch_assoc($res))
              {
                //get the value from individuals columns
                  $id  = $row['id'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $image_name = $row['image_name'];
                  $featured = $row['featured'];
                  $active = $row['active'];
                  ?>

                  <tr>
                  <td><?php echo $sn++;?>.</td>
                  <td><?php echo $title;?></td>
                  <td><?php echo $price;?></td>
                  <td>
                  <?php echo $image_name;?>
                  <?php
                    //check image name available or not
                    if($image_name!="")
                    {
                      //diplay the image
                      ?>
                      <img src="<?php echo SITEURL;?>photos/category/<?php echo $image_name;?>" width="100px">

                      <?php
                                    
                    }
                    else
                    {
                      //display messaage
                      echo "<div class='error'>Image not added</div>";
                    }
                    ?>
                  </td>
                  <td><?php echo $featured;?></td>
                  <td><?php echo $active;?></td>
                  <td>
                    <a href="<?php echo SITEURL;?>update-service.php?id=<?php echo $id;?>" class="btn-secondary">Update Service</a>

                    <a href="<?php echo SITEURL;?>admin/delete-service.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Service</a>

                  </td>
                  </tr>


                  <?php

              }
            }
            else
            {
                //service not added in database
                echo "<tr><td colspan='7'>Service not added yet.</td> </tr>";
            }
            ?>
      
      </table>
</div>
</div>
<?php include('partials/footer.php')?>