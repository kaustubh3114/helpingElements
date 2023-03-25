<?php include('partials/menu.php')?>
        <!--Main Content Section Starts-->
        <div class="main-content">
        <div class="wrapper">
      <h1>Manage admin</h1>

<br/> 
        <?php 
        if(isset($_SESSION['add']))//check the whether the session is set or not
        {
            echo $_SESSION['add'];//display session
            unset($_SESSION['add']);//removing sesssion message
        }

        if(isset($_SESSION['delete']))
        {
          echo $_SESSION['delete'];//displaying session message
          unset($_SESSION['delete']);//removing session message
        
        }

        ?>
        <br/> <br/>

      <!--button to add admin -->
      <a href="add-admin.php" class="btn-primary">Add Admin</a>
      <br/>
      <br/> <br/>
      <table class="tbl-full">
        <tr>
          <th>S.N</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Actions</th>
         </tr>

      <?php
      //DISPLYING FROM GET ALL DATA FROM ADMIN
          $sql = "SELECT * FROM `tbl_admin`"; 
          //EXECUTE THE QUERRY 
          $res = mysqli_query($conn, $sql);

          //check the whether the querry is extended or not
          if($res==TRUE)
          {
                //COUNT THE ROWS TO WHETHER THE DATA AND DATA BASE NOT
                $count = mysqli_num_rows($res);//function to get all the rows in data base

                $sn=1;//create a variable and assign the value 

                //check the num of in database 
                if($count>0)
                {
                  //we  have the data in database
                  while($rows=mysqli_fetch_assoc($res))
                  {
                    //using while loop to get the all data from data base
                    // and while loop will run as long as we have the data base

                    //get individulas data
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];

                    // display the value in our table 
                    ?>
                    <tr>
                      <td><?php echo $sn++;?></td>
                      <td><?php echo $full_name; ?></td>
                      <td><?php echo $username; ?></td>
                      <td>
                        <!-- <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-secondary">Change password</a> -->
                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>"class="btn-danger">Delete Admin</a>
                      </td>
                    </tr>

                    <?php
                  }
                }
                else
                {
                  //we do not have data in database
                }

          }

      ?> 
      </table>
               
               <div class="clearfix"></div>
            </div>
        </div>
        <!--Main Content Section Ends-->
        <?php include('partials/footer.php')?>
         