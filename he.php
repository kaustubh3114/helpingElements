<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/ele.css">
</head>
<div class="form-modal">
    
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">log in</button>
        <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
    </div>

    <div id="login-form">
        <form action="login&register.php" method = "post">
            <input type="hidden" name="work" value="login">
            <input type="email" name="email" placeholder="Enter email" required >
            <input type="password" name="pass" placeholder="Enter password" required>
            <input type="submit" value="Login" class="btn login"></input>
            <p><a href="javascript:void(0)">Forgotten account</a></p>
            <hr/>
        </form>
    </div>

    <div id="signup-form">
        <form action="login&register.php" method = "post">
            <input type="hidden" name="work" value="register">
            <input type="email" name="email" placeholder="Enter your email" required >
            <input type="text" name="userName" placeholder="Choose username" required>
            <input type="password" name="pass" placeholder="Create password" required  >
            <input type="submit" value="create account" class="btn signup"></button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
            <hr/>
        </form>
    </div>
</div>

<script>
    function toggleSignup(){
   document.getElementById("login-toggle").style.backgroundColor="#fff";
    document.getElementById("login-toggle").style.color="black";
    document.getElementById("signup-toggle").style.backgroundColor="#b85f28";
    document.getElementById("signup-toggle").style.color="#fff";
    document.getElementById("login-form").style.display="none";
    document.getElementById("signup-form").style.display="block";
}

function toggleLogin(){
    document.getElementById("login-toggle").style.backgroundColor="#b85f28";
    document.getElementById("login-toggle").style.color="#fff";
    document.getElementById("signup-toggle").style.backgroundColor="#fff";
    document.getElementById("signup-toggle").style.color="#222";
    document.getElementById("signup-form").style.display="none";
    document.getElementById("login-form").style.display="block";
}

</script>
</html>