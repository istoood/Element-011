<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="./cs_icon.ico">
    <!-- this makes and icon in the tab -->
    <meta charset="utf-8">
    <title>CS:GO Skin Index</title>
        <!--this changes the tab name to CS:GO skin directory-->
    <link rel="stylesheet" href="CSGO.css">
    
</head>
<body>
    <section>
        <!-- this is the background to the website -->
        <div class= "navbar">
            <div class="header">
            
            
                <div>
                    <li><a class= title href='weapons.php'>CS:GO Skin Index </a></li>
                    <!-- will be used for a logo -->
                </div>
                    <ul>
                        <li><a class= loginnav href="index.php">Login</a></li>
                        <!-- makes a nav bar to locate to login page -->
                        <li><a class= registernav href="register.php">Register</a></li>
                        <!-- makes a navbar link ot register page -->
                    </ul>
            </div>
        </div>

        <div class= welcome-message>
            
            <h1>Welcome to the CS:GO Index</h1>
            <p> Here you will find a collection of skins available to trade, purches and win within the game.</p>
            <p> Every month CS:GO index will anylyse intrest trends on the skin market and update the site depending on a skins popularity!</p>
            <img src="CSGO.gif" class= "csgo-gif"></img>
        </div>
        <div id class='login-form' class= 'login-page'>
            <!-- makes a form box -->
            <div class= "form-box">
                

                <form id= 'login' class= 'input-group-login' method='post'>
                    <!-- makes the login feild for the user info -->
                        
                        <input type= 'text' class= 'input-field' placeholder= 'Email address' name= 'email' required>
                        <!-- makes a feild for the email adress to be stored -->
                        <input type= 'password' class= 'input-field' placeholder= 'Enter a Password' name= 'password' required>
                        <!-- makes a feild for the password to be entered -->
                        <button type= 'submit' class= 'login-btn'>Log In</button>
                        <!-- creates a login button -->
                        <a class= noaccount href= "register.php">Dont have an account? Register here!</a>
                </form>
                    
                    
            </div>
                
        </div>
        </div>
    
    </section>
</body>
</html>

<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

$server = "localhost";
$user = "root";
$password = "";
$database = "users";
// declare database credentials

$dbconnection = new mysqli($server, $user, $password, $database);
// creating the connection to the database

if ($dbconnection->connect_error)
{
  die("Connection failed: " . $dbconnection->connect_error);
}
// checking for errors when connecting to database

$useremail = $_POST["email"];
$userpass = $_POST["password"];
// user input to check against the database

$sql = "SELECT * FROM users WHERE Password='$userpass' and Email='$useremail'";
    $result = $dbconnection->query($sql);

    if ($result->num_rows >= 1)
    {
        $_SESSION['email'] = $useremail;
        header("location:http://localhost/uni/weapons.php");
    } 

   