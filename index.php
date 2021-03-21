<?php 
//echo 'aman soni';
    include('connect.php');
    session_start();
    $sql ="SELECT * FROM example ";
    $result = mysqli_query($con,$sql);
    $list= mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myBook</title>
    <link rel="stylesheet" href="index.css">
</head>
    <body>
    <div id="menubar" >
            <h1><a href="index.php" id="logo" title="Go to home page">myBook</a></h1>
    </div>
    <div>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Log in</a></li>
        <li><a href="sign_up.php">sign up</a></li>
    </nav>
    </div>
    <div style="text-align:center;margin-left:70px;">
    <form action="index.php" method="GET">
        <table id="tbl">
            <?php foreach($list as $i) { ?>
            <tr class="row">
                <th style="backgorund-color:red;"><?php echo $i['workname']?></th>
                <th id="<?php echo $i['id']?>"></th>
                <th><a href="login.php" onclick="know()" style="background:transparent;color:rgb(28, 155, 28);">X</a></th>    
            </tr>
            <?php } ?>
            <tr>
                <th ><input type="text" name="workname"  placeholder="Add a work to do..." style="background-color:rgb(255,255,255,0.9);
                border-radius: 4px; font-size:30px; width:500px;
                box-shadow:2px 2px 5px black; ">
                <input type="button" name="add" value="Add"style="background-color:rgb(7, 70, 54,0.8);border-radius: 6px; font-size:25px;
                box-shadow:2px 2px 5px black;" onclick="know()"></th>
            </tr>
        </table>
        </form>
    </div>
    <script src="index.js"></script>
    <div id="about">
            <table id="tble">
                <tr>
                    <th><a href="about.html">About</a></th>
                    <th><a href="contact.html">contact us</a></th>
                    <th><a href="privacy.html">privacy policy</a></th>
                </tr>
                <tr>
                    <th><a href="help.html">Help</a></th>
                    <th><a href="advertisement.html">contact for advertisement</a></th>
                    <th><a>copyright @aman_soni</a></th>
                </tr>
            </table>
    </div>
    <script>
        <?php foreach($list as $i) {?>
        
        <?php } ?>
        function know(){
            alert("login or sign up first..!!");
        }
    </script>
</body>
</html>