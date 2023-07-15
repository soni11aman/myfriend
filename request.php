<?php
    $con =  mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    if(isset($_GET['req'])){
        $user = $_SESSION['name'];
        $rec = $_GET['req'];
        echo "mkd";
        $sql = "SELECT * FROM details WHERE username='$user'";
        $res = mysqli_query($con,$sql);
        $p= mysqli_fetch_row($res);
        $nam = $p[1];
        //print_r($p);
        $s = 1;
        $prof  =$p[9];
        $sql = "INSERT INTO $rec(friend,username,addd,prof) VALUES('$nam','$user','$s','$prof')";
        $ss = mysqli_query($con,$sql);
        echo $ss;
        $s=2;
        $sql = "SELECT * FROM details WHERE username='$rec'";
        $res = mysqli_query($con,$sql);
        $p= mysqli_fetch_row($res);
        $nam = $p[1];
        $prof  =$p[9];
        $sql = "INSERT INTO $user(friend,username,addd,prof) VALUES('$nam','$rec','$s','$prof')";
        $ss = mysqli_query($con,$sql);
        header("Location: sugg.php");
    }
?>