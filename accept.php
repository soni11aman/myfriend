<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    if(isset($_GET['acp'])){
        $user = $_SESSION['name'];
        $id = $_GET['acp'];
        $p=0;
        $sql = "UPDATE $user SET addd='$p' WHERE id='$id'";
        mysqli_query($con,$sql);
        header('Location:user.php');
    }
    else
    echo "fail";
?>