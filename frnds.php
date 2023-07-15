<?php
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM $user";
    $result = mysqli_query($con,$sql);
    $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>friends</title>
    <link rel="stylesheet" href="frnds.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div style="height:auto; background-color:blue" id="main">Welcome <?php echo $_SESSION['name']?></div>
    <nav>
        <table style="width:100%; height:auto;" id="tab">
        <tr style="text-align:center;">
            <td><a href="user.php" title="Home" ><i class="fa fa-home"></i></a></td>
            <td><a href="cht.php" title="Messages" ><i class='fa fa-comments icon'></i></a></td>
            <td><a href="frnds.php" title="Friends" ><i class='fa fa-users icon'></i></a></td>
            <td><a href="sugg.php" title="Friend requests" ><i class="fa fa-user-plus"></i></a></td>
            <td><a href="logout.php" title="Log out" ><i class='fa fa-sign-out'></i></a></td>
        </tr>
        </table>
    </nav>
    <div style="width:390px; margin:auto; height:auto;">
    <table style="width:100%; margin:auto; text-align:left;font-size:20px;">
        <?php foreach($list as $i) { if($i['addd']==0) { ?>
        <tr><a href="profile.php?prof=<?php echo $i['username']; ?>" style="border-bottom:0.5px dotted grey;"><?php echo $i['friend']; ?></a></tr>
        <?php } } ?>
    </table>
    </div>
</body>
</html>