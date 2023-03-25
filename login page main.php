<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="push.min.js"></script>
    <script src="serviceWorker.min.js"></script>
    <script src="Notification.js"> 
    </script>

    <link rel="stylesheet" href="../helpingelements/css/login.css">

</head>

<body>

    <div id="logo">

        <img src="../helping elements/photos/logobykaustubh.PNG" alt="logo">


        <div class="popup">
            <form class="login_form" action="login.php" method="post" name="formLogin" onsubmit="return validated()">

                <div class="form">

                    <div class="formlabel">
                        <label>Welcome to</label>
                        <div id="cname">
                            <label>Helping Elements</label>

                        </div>
                    </div>
                    <div class="form-element">

                        <div id="fusername">
                            <label>User Name</label>
                            <!-- NAME = email -->
                            <input autocomplete="off" type="text" id="username" name="email" placeholder="User Name">
                            <div id="email_error">Please Fill up your Email or Phone</div>
                        </div>


                        <div id="fpassword">
                            <label>Password</label>
                            <!-- name = password -->
                            <input type="password" id="password" name="password" placeholder="Password">
                            <div id="pass_error">Please Fill up your Password</div>
                        </div>


                    </div>


                    <div class="form-element">

                        <button type="submit" value="submit">Sign in</button>

                    </div>

                </div>

            </form>
        </div>

        <script type="text/javascript">
            
        </script>
        <script src="index.js"></script>

</body>

</html>