<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM $user";
    $result = mysqli_query($con,$sql);
    $p = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $num = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width, initial-scale=1"/>
    <title>myfriend</title>
    <link rel="stylesheet" href="cht.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div style="height:auto; background-color:blue" id="main">Welcome <?php echo $user; ?></div>
    <nav>
        <table style="width:100%; height:auto;" id="tab">
        <tr style="text-align:center;">
            <td><a href="user.php" title="Home" ><i class="fa fa-home"></i></a></td>
            <td><a href="cht.php" title="Messages" ><i class='fa fa-comments icon'></i></a></td>
            <td><a href="frnds.php" title="Friends" ><i class='fa fa-users icon'></i></a></td>
            <td><a href="sugg.php" title="Friend requests" ><i class="fa fa-user-plus"></i></a></td>
            <td><a href="logout.php" title="Log out" onclick="logout()";><i class='fa fa-sign-out'></i></a></td>
        </tr>
        </table>
    </nav>
    <div style="width:390px; margin:auto; padding-top:14px; border-bottom:1px dashed rgb(61, 204, 204); color: rgb(200, 150, 200);
    font-size:25px;">
        <table>
            <?php foreach($p as $i) { ?>
            <tr style=""><td><a href="talk.php?nam=<?php echo $i['username']; ?>"><?php if(strlen($i['talk'])!=0) { echo $i['friend']; $num=1;} ?></a></td></tr>
            <?php } ?>
        </table>
        <table>
            <?php if($num==0) { ?>
            <tr style="font-size:40px;"><th>Say hii to someone....</th></tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>