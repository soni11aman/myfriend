<?php 
    include('connect.php');
    session_start();
    if(isset($_POST['submit'])){
        //echo $_POST['email'];
        $email =  $_POST['email'];
        $username =  $_POST['username'];
        $name =  $_POST['name'];
        $age =  $_POST['age'];
        $phone =  $_POST['number'];
        $dob =  $_POST['dob'];
        $gender =  $_POST['gender'];
        $password =  $_POST['password'];
        $cfm =  $_POST['cfm'];
        $sql ="INSERT INTO details(email,phone,age,pwd,dob,username,gender,nam) VALUES('$email','$phone','$age','$password','$dob','$username','$gender','$name')";
        $newTable = "CREATE TABLE $username( id int NOT NULL ,workname varchar(255),completed int(0) NOT NULL )";
        mysqli_query($con,$sql);
        mysqli_query($con,$newTable);
        //echo mysqli_query($con,$newTable);
        $_SESSION['name']=$username;
        $_SESSION['state']=1;
        header('Location: user.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myBook</title>
    <link rel="stylesheet" href="signup.css">
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
        <div >
            <form action="sign_up.php"  method="POST" id="main">
              <table id="tab" >
                    <tr>
                        <th><label for="name">Name</label></th>
                        <th><label for="username">Username</label></th>
                    </tr>
                    <tr>
                        <th><input type="text" name="name" id="name" placeholder="name"></th>
                        <th><input type="text" name="username" id="username" placeholder="username" ></th>
                    </tr>
                    <tr>
                        <th><label for="email">Email</label></th>
                    </tr>
                    <tr >
                        <th><input type="email" placeholder="type email" id="email" name="email"   ></th>
                        <th id="fn"><input type="button" value="Send OTP"  style="background-color: grey;" id="cfme"></th>
                    </tr>
                    <tr>
                        <th><label for="phone">Phone</label></th>
                    </tr>
                    <tr>
                        <th><input type="numbers" name="number" maxlength="10" placeholder="Phone" id="phone"></th>
                        <th id="fn2" ><input type="button" value="Send OTP" style="background-color: grey;" id="cfmp"></th>
                    </tr>
                    <tr>
                        <th><label for="age">Age</label></th>
                        <th><label for="gender">Gender</label></th>
                    </tr>
                    <tr>
                        <th><input type="numbers" min="12" maxlength="3" placeholder="age" name="age"></th>
                        <th><select name="gender" id="gender" >
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="other">other</option>
                        </select></th>
                    </tr>
                    <tr>
                        <th><label for="password">Password</label></th>
                        <th><label for="confirm">Confirm</label></th>
                    </tr>
                    <tr>
                        <th><input type="password" name="password" placeholder="password" id="password"></th>
                        <th><input type="password" placeholder="confirm" id="confirm" name="cfm"></th>
                    </tr>
                    <tr>
                        <th><label for="dob">Date of Birth</label></th>
                    </tr>
                    <tr>
                        <th><input type="date" id="dob" placeholder="Date of birth" name="dob"></th>
                    </tr>
                </table>
                <table id="submit">
                    <tr><input type="submit" id="submit" value="submit" name="submit" style="background-color: grey;"></tr>
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
<script src="register.js"></script>
</body>
        
</html>