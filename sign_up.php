<?php
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_feed');
    $conn = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $sql = "SELECT * FROM details";
    $res = mysqli_query($conn,$sql);
    $p = mysqli_fetch_all($res,MYSQLI_ASSOC);
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        foreach($p as $i){
            if($user == $i['username']){
                echo "<script> alert('Username already exists..!!'); </script>";
                break;
                header("Location: sign_up.php");
            }
        }
        $_SESSION['name']=$user;
        $nam = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $pwd = $_POST['pwd'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $sql = "INSERT INTO details(nam,email,phone,age,username,dob,pwd,gender) VALUES('$nam','$email','$phone','$age','$user','$dob','$pwd','$gender')";
        mysqli_query($conn,$sql);
        $sql = "CREATE TABLE $user( id int NOT NULL AUTO_INCREMENT , friend varchar(255), username varchar(255), addd int(0)  , prof varchar(255) DEFAULT 'photos/default_pic.png' , talk mediumtext, PRIMARY KEY (id) ) ";
        $ss = mysqli_query($conn,$sql);
        $sql = "CREATE TABLE $user( id int NOT NULL AUTO_INCREMENT , caption mediumtext , likes int Default '0', coment int Default '0', pic varchar(255), prof varchar(255) Default 'photos/default_pic.png', nam varchar(255), lik mediumtext, username varchar(255), comet mediumtext, vid int, PRIMARY KEY (id) ) ";
        mysqli_query($con,$sql);
        header("Location: user.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="sign_up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main">
        <div class="sign">
            <form action="sign_up.php" method="POST">
                <table>
                    <tr><td><label for="name">Full name</label></td><td><label for="username">username</label></td></tr>
                    <tr><td><input type="text" name="name" id="" placeholder="your name.."></td><td><input type="text" name="username" placeholder="username"></td><td></td></tr>
                    <tr><td><label for="email">Email</label></td><td><label for="phone">Phone</label></td></tr>
                    <tr><td><input type="email" name="email" placeholder="email"></td><td><input type="number" name="phone" placeholder="phone"></td></tr>
                    <tr><td><label for="age">Age</label></td><td><label for="dob">Dob</label></td></tr>
                    <tr><td><input type="number" name="age" placeholder="age"></td><td><input type="date" name="dob"></td></tr>
                    <tr><td><label for="pwd">Password</label></td><td><label for="gender">Gender</label></td></tr>
                    <tr><td><input type="password" name="pwd" placeholder="password"></td><td><select name="gender" id="gender" >
                            <option value="male">male</option>
                            <option value="female">Female</option>
                            <option value="other">other</option>
                        </select></td></tr>
                    <tr><td colspan="2"><input type="submit" name="submit" value="submit"></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>