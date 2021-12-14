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
        <div>
        <div class= "navbar">
                <div class="header">
                
                
                    <div>
                        <li><a class= title href='index.php'>CS:GO Skin Index </a></li>
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
            </div>

            <div class= 'login-page'>
                <!-- makes a form box -->
                <div class= "form-box">
                <form id= 'register' class= 'input-group-register' method= 'post' action= './register.php'>
                        <input name= 'fullname' type= 'text' class= 'input-field' placeholder= 'Full name' required>
                        <!-- makes a box for the user to enter their full name -->
                        <input name= 'email' type= 'text' class= 'input-field' placeholder= 'Email address' required>
                        <!-- same as for the login section -->
                        <input name= 'pass' type= 'password' class= 'input-field' placeholder= 'Enter a Password' required>
                        <!-- same as for the login section above -->
                        <button type= 'submit' class= 'register-btn'>Register</button>
                        <a class= 'alreadyaccount'href= "index.php">Already have an account? login here!</a>
                        

                </form>       
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
error_reporting(E_ERROR | E_PARSE);

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

$user = $_POST["fullname"];
$email = $_POST["email"];
$pass = $_POST["pass"];
// user input for the database

if ($user and $email != "NULL")
// checking if the feilds have been filled out
{
    $sql = "SELECT * FROM users WHERE Username='$user' or Email='$email'";
    $result = $dbconnection->query($sql);
    // cheching to see if there is already a former entry with the same credentials

    if ($result->num_rows >= 1)
    {
 
        echo "<h1>Username or Email taken.</h1>";
    } 
    // telling the user that the info is taken
    else 
    {
    
        $SQL_INSERT = "INSERT INTO users (Username, Email, Password) VALUES (?,?,?)";
        $statment = $dbconnection->prepare($SQL_INSERT);
        // where the info entered by the user is entered into the database

        if($statment = $dbconnection->prepare($SQL_INSERT))
        {        
            $statment->bind_param('sss', $user, $email, $pass);
            $statment->execute();
            // putting the user inointo the SQL quirie 
            header("location:http://localhost/uni/index.php");
            // redirects to the next page
        }
        else
        {
            $error = $db_found->errno . ' ' . $db_found->error;
            echo $error;
        }
        // if there is an error with anything this comes into effect
    }
}
$dbconnection->close();
// closes the SQL connection
?>