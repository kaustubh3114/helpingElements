<!-- <?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
        <br><br>

        <?php
        //1. get id of selected admin
            $id=$_GET['id'];

        //2. create sql querry to get the details
        $sql="SELECT * FROM tbl_admin WHERE id=$id";

        //execute the querry
        $res=mysqli_query($conn, $sql);
        
        //check whether the querry is executed or not
        if($res==TRUE)
        {
            //check whether the querry is exectued or not
            $cont =mysqli_num_rows($res);
            //check whether we have admin data or not
            if($count==1)
            {
                //get the datails
                echo "admin available";
            }
            else{
                //redirect to manage admin page
                header('location:' .SITEURL.'admin/manage-admin.php');

            }
        }

        ?>


        <form action="" method="POST"></form>
    <table class="tbl-30">
        <tr>
            <td>full name:</td>
            <td>
                <input type="text" name="full_name" value="">
            </td>
        </tr>
        <tr>
            <td>username:</td>
            <td>
                <input type="text" name="username" value="">
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="submit" name="submit" value="update admin" class="btn-secondary">
        </td>
    </tr>
    </table>
</form>

    </div>
</div>
<?php include('partials/footer.php')?>
         -->