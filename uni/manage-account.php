<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("location:http://localhost/uni/index.php");
}
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\">\n";
echo "<head>\n";
echo "    <link rel=\"icon\" href=\"./cs_icon.ico\">\n";
echo "    <!-- this makes and icon in the tab -->\n";
echo "    <meta charset=\"utf-8\">\n";
echo "    <title>CS:GO Skin Index</title>\n";
echo "        <!--this changes the tab name to CS:GO skin directory-->\n";
echo "    <link rel=\"stylesheet\" href=\"CSGO.css\">\n";
echo "    \n";
echo "</head>\n";
echo "<body>\n";
echo "    <section>\n";
echo "        <!-- this is the background to the website -->\n";
echo "        <div class= \"navbar\">\n";
echo "            <div class=\"header\">\n";
echo "            \n";
echo "            \n";
echo "                <div>\n";
echo "                    \n";
echo "                    <li><a class= title href='weapons.php'>CS:GO Skin Index </a></li>\n";
echo "                    <!-- will be used for a logo -->\n";
echo "                    <li><a class= title> logged in as: ". $_SESSION['email']."</a></li>";
echo "                    <li><a class= title href='manage-account.php'>Manage Account</a></li>\n";
echo "                    <li><a class= title href='loggedout.php'>Logout </a></li>\n";

echo "                </div>\n";
echo "                    \n";
echo "            </div>\n";
echo "        </div>\n";
?>
                <div class= 'login-page'>
                <!-- makes a form box -->
                <div class= "form-box">
                <form id= 'register' class= 'input-group-register' method= 'POST' action= 'manage-account.php'>
                        <input name= 'email' type= 'text' class= 'input-field' placeholder= 'Email address' required>
                        <!-- same as for the login section -->
                        <input name= 'password' type= 'password' class= 'input-field' placeholder= 'Old Password' required>
                        <input name= 'newpass' type= 'password' class= 'input-field' placeholder= 'New Password' required>
                        <input name= 'confpass' type= 'password' class= 'input-field' placeholder= 'Confirm new Password' required>
                        
                        <!-- same as for the login section above -->
                        <button type= 'submit' class= 'change-btn'>Change Password</button>
                </form>
                </div>
                <div class= "form-box-del">
                <form id= 'delete' class= 'input-group-register' method= 'POST'>
                    <lable for = 'del_account' class = 'col-w' >Want to delete your account?</lable>
                    <button type= 'submit' class= 'del-btn' placeholder = 'delete account' name= del_account>Delete account</button>    
                    <input type= 'hidden' name = delete>
                    
                </form>

                        
                </div>
                    
                </div>
            </div>
        </section>


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

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $newpass = $_POST['newpass'];
    $confpass = $_POST['confpass'];
    // user input to check against the database
    if ($newpass != $confpass)
    {
        echo "new passwords dont match";
    }
    else 
    {
    // $sql = "UPDATE users SET Password = '$newpass' WHERE Email = '$email' AND Password = '$pass'";
    $sql= "UPDATE users SET Password = '$newpass' WHERE Email = '$email' AND Password='$pass'";
    $result = $dbconnection->query($sql);
    echo "password updated successfully";
    }

    if(isset($_POST['delete']))
    {
        $email= $_SESSION['email'];

        $sql="DELETE FROM users where Email = '$email'";
        $result = $dbconnection->query($sql);
        session_unset();
        session_write_close();
    }

    $dbconnection->close();


?>