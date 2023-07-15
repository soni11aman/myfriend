<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_feed');
    $conn = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $sql = "SELECT * FROM details WHERE email='$user' OR username='$user' ";
        $res = mysqli_query($conn,$sql);
        $n = mysqli_num_rows($res);
        if($n==0){
            echo "Wrong Email";
        }
        else{
            $p = mysqli_fetch_row($res);
            $cphone = $p['3'];
            $cdob = $p['6'];
            if($dob == $cdob){
                if($phone == $cphone){
                    echo "Your password is '";
                    echo $p['7'];
                    echo "'";
                }
                else{
                    echo "Wrong phone or DOB";
                }
            }
            else{
                echo "Wrong phone or DOB";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget</title>
    <link rel="stylesheet" href="forget.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <div class="main">
            <form action="forget.php" method="POST">
                <table>
                    <tr><td class="center" colspan="2"><label for="username" >Username or Email</label></td></tr>
                    <tr><td class="center" colspan="2"><input type="text" name="username" placeholder="username or email"  size="25"></td></tr>
                    <tr><td><br></td></tr>
                    <tr><td><label for="dob">D.O.B.</label></td><td><label for="phone">Phone</label></td></tr>
                    <tr><td><input type="date" name="dob" placeholder="Dob"></td><td><input type="numbers" name="phone" placeholder="phone"></td></tr>
                    <tr><td><br></td></tr>
                    <tr><td class="center" colspan="2"><input type="submit" name="submit" id=""></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>