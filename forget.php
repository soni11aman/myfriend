<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myBook</title>
    <link rel="stylesheet" href="forget.css">
    
</head>
    <body>
    <div id="menubar" >
            <h1><a href="index.php" id="logo" title="Go to home page">myBook</a></h1>
    </div>
    <nav>
        <a href="index.php">Home</a>
        <a href="Login.php">Log in</a>
        <a href="sign_up.php">sign up</a>
    </nav>
    <div class="main">
        <form action="forget.php" method="GET">
            <table id="tab">
                <tr>
                    <th><label for="userid">Enter email or phone</label></th>
                </tr>
                <tr>
                    <th><input type="text" name="userid" placeholder="email or phone" id="userid" size="40"></th>
                </tr>
                <tr>
                    <th><input type="submit" value="Get OTP" style="background-color: gray;" size="20" ></th>
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
<script src="forget.js" ></script>
</body>
</html>