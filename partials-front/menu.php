            <?php
            include('config/constants.php');
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>helpingelements</title>
                <link rel="stylesheet" href="../helpingelements/css/helping elements.css">
            </head>

            <body>
                <!-- Navbar Section Starts Here -->
                <section class="navbar">
                    <div class="container">
                        <div class="logo">
                            <a href="#" title="Logo">
                                <img src="../helpingelements/photos/logobykaustubh.PNG" width="100" alt="service Logo" class="img-responsive" width="225px" height="50">
                            </a>
                        </div>

                        <div class="menu text-right">
                            <ul>
                                <li>
                                    <a href="<?php echo SITEURL; ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>as an employee.php">As an employee</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>categories.php">Catergories</a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>form.php">Contact</a>
                                </li>
                                <li>
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                    ?>
                                        <a href="<?php echo SITEURL; ?>login&register.php?work=logout">Log out</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php echo SITEURL; ?>he.php">Sign in/sign up</a>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php if(isset( $_SESSION['user'])){ echo $_SESSION['user'];} ?>
                                </li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </section>