<?php
    include('connect.php');
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        //$_SESSION['name']= $username;
        $sql ="SELECT email,username,phone,pwd FROM details ";
        $result = mysqli_query($con,$sql);
        $n= mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach($n as $i){
            if($i['email']==$username || $i['username']==$username || $i['phone']==$username)
            {
                if($i['pwd']==$pwd){
                    $_SESSION['name']=$i['username'];
                    header('Location: user.php');
                    break;
                }
                break;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myBook</title>
    <link rel="stylesheet" href="login.css">
</head>
    <body>
    <div id="menubar" >
            <h1><a href="index.php" id="logo" title="Go to home page">myBook</a></h1>
    </div>
    <nav >
        <a href="index.php"> Home </a>
        <a href="Login.php">Log in</a>
        <a href="sign_up.php">sign up</a>
    </nav>
        <div class="main">
            <form action="login.php" method="POST" onsubmit="isvalid()">
            <table id="login">
                <tr>
                    <th class="tb"><label for="username">Email or phone</label></th>
                </tr>
                <tr>
                    <th class="tb"><input type="text" name="username" placeholder="Email or phone" id="username" size="30" required></th>
                </tr>
                <tr>
                    <th class="tb"><label for="password">Password</label></th>
                </tr>
                <tr>
                    <th class="tb"><input type="password" id="password" placeholder="password" size="30" name="pwd" required></th>
                </tr>
                <tr>
                    <th><input type="submit" value="login" name="submit"  id="submit"></th>
                </tr>
                <tr>
                    <th class="fpwd"><a href="forget.php" class="fpwd" >forgot your password</a> or <a href="sign_up.php" class="fpwd">Register here</a></th>
                </tr>
            </table>
            </form>
        </div>
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
<script src="mybook.js"></script>
</body>
</html>