<?php
    $con = mysqli_connect('localhost','aman','chataman','chat');
    session_start();
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pwd = $_POST['pwd'];
        $sql = "SELECT * FROM details WHERE user='$user'";
        $res = mysqli_query($con,$sql);
        $p= mysqli_fetch_row($res);
        if($pwd == $p['2']){
        //$p = mysqli_fetch_row($result);
        $_SESSION['name']=$p['1'];
        header('Location:user.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="main">
        <div class="logo">
            <img src="login.png" alt="">
        </div>
        <div class="cred">
            <div>
            <h2>Log In</h2>
            </div>
            <div class="form">
                <form action="index.php" method="POST">
                    <table>
                        <tr><td class="center" ><i class="fa fa-user icon"></i><input size="38" type="text" name="username" placeholder="Your username" required></td></tr>
                        <tr><td class="center"><i class="fa fa-lock icon"></i><input size="38" type="password" name="pwd" placeholder="Password" required></td></tr>
                        <tr><td class="center"><input type="submit" name="submit" value="submit"></td></tr>
                    </table>
                </form>
            </div>
            <div class="right new">
                <p><a href="forget.php">forget your password</a> or <a href="sign_up.php">Create an account</a></p>
            </div>
        </div>
    </div>
    <script>
        function fun(){
            alert('username or password is wrong..!!');
        }
    </script>
</body>
</html>