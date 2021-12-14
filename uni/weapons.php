



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
    <div class= "navbar2">
        <form method="post">
            <input type="submit" class= weapons-button name="ak47" value="ak47"/>
            <input type="submit" class= weapons-button name="m4a1s" value="m4a1s"/>
            <input type="submit" class= weapons-button name="m4a4" value="m4a4"/>
            <input type="submit" class= weapons-button name="awp" value="awp"/>
            <input type="submit" class= weapons-button name="glock" value="glock"/>
            <input type="submit" class= weapons-button name="usp" value="usp"/>
            <input type="submit" class= weapons-button name="deagle" value="deagle"/>
            <input type="submit" class= weapons-button name="mac10" value="mac10"/>
            <input type="submit" class= weapons-button name="p90" value="p90"/>
            <input type="submit" class= weapons-button name="mp7" value="mp7"/>
            <input type="submit" class= weapons-button name="mag7" value="mag7"/>
            <input type="submit" class= weapons-button name="nova" value="nova"/>
            <input type="submit" class= weapons-button name="negev" value="negev"/>
        </form>
    </div>
    <div class= "flex">
            <div>
                <?php
                        if(isset($_POST['ak47'])) 
                        {
                            $table = 'ak47';
                        }
                        if(isset($_POST['m4a1s'])) 
                        {
                            $table ='m4a1s';
                        }
                        if(isset($_POST['m4a4'])) 
                        {
                            $table ='m4a4';
                        }
                        if(isset($_POST['awp'])) 
                        {
                            $table ='awp';
                        }
                        if(isset($_POST['usp'])) 
                        {
                            $table ='usp';
                        }
                        if(isset($_POST['glock'])) 
                        {
                            $table ='glock';
                        }
                        if(isset($_POST['deagle'])) 
                        {
                            $table ='deagle';
                        }
                        if(isset($_POST['mac10'])) 
                        {
                            $table ='mac10';
                        }
                        if(isset($_POST['p90'])) 
                        {
                            $table ='p90';
                        }
                        if(isset($_POST['mp7'])) 
                        {
                            $table ='mp7';
                        }
                        if(isset($_POST['mag7'])) 
                        {
                            $table ='mag7';
                        }
                        if(isset($_POST['nova'])) 
                        {
                            $table ='nova';
                        }
                        if(isset($_POST['negev'])) 
                        {
                            $table ='negev';
                        }
                        if(!empty($_POST))
                        {
                        
                        
                            $dbconnection = new mysqli('localhost', 'root', '', 'weapons') or die($dbconnection->connect_error);
                                    
                                    $result = $dbconnection->query("select * from $table ")or die($dbconnection->error);
                                    while($data = $result->fetch_assoc())
                                    {
                                        echo "<div class= 'weapon-window-1'>";
                                        echo "<h4 style='color:white'>{$data['name']}</h4> ";
                                        echo "<img class= 'img-pad' src= '{$data['img_dir']}' width= '80%' height= '80%'>";
                                        echo "</div>";
                                    }
                        }
                ?>
            </div>
    </section>   
</body>