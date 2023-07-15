<?php
    $con =  mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $_SESSION['name'] = "aman";
    $user= $_SESSION['name'];
    $sql = "SELECT * FROM $user WHERE addd!='0'";
    $result = mysqli_query($con,$sql);
    $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $sql = "SELECT * FROM details";
    $result = mysqli_query($con,$sql);
    $sug = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $num =0;
    $sum=0;
?>
<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myfriend</title>
    <link rel="stylesheet" href="sugg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="main">Welcome <?php echo $_SESSION['name']?></div>
    <nav>
        <table  id="tab">
        <tr class="center">
            <td><a href="user.php" title="Home" ><i class="fa fa-home"></i></a></td>
            <td><a href="cht.php" title="Messages" ><i class='fa fa-comments icon'></i></a></td>
            <td><a href="frnds.php" title="Friends" ><i class='fa fa-users icon'></i></a></td>
            <td><a href="request.php" title="Friend requests" ><i class="fa fa-user-plus"></i></a></td>
            <td><a href="logout.php" title="Log out" ><i class='fa fa-sign-out'></i></a></td>
        </tr>
        </table>
    </nav>
    <div  id="ad">
        <h3 class="left">Friend requests</h3>
        <form action="index.php" method="GET">
        <table >
        <?php foreach($list as $i) { ?>
        <?php if($i['addd']==1) { $num+=1; ?>
            <tr>
            <td class="left"><?php echo $i['friend'] ?></td>
            <td class="left"><a href="accept.php?acp=<?php echo $i['id'] ?>"  >Accept</a></td>
            </tr>
        <?php } } ?>
        <?php if($num==0) { ?>
            <p>no requests</p>
        <?php } ?>
        </table>
        </form>
        <h3 class="left">Suggestions</h3>
        <form action="index.php" method="GET">
        <table class="sugg">
        <?php foreach($sug as $i) { $p=$i['username']; $sql="SELECT * FROM $user WHERE username='$p'"; $res = mysqli_query($con,$sql); $k= mysqli_num_rows($res); ?>
            <?php if($k==0 && $p!=$user) { $sum+=1; ?>
            <tr>
            <td class="left"><?php echo $i['nam'] ?></td>
            <td class="left"><button><a href="request.php?req=<?php echo $i['username']; ?>">Add friend</a></button></td>
            </tr>
        <?php }  }?>
        <?php if($sum==0){ ?>
            <p>no more suggestions...!!</p>
        <?php } ?>
        </table>
        </form>
    </div>
    <script>
    </script>
</body>
</html>