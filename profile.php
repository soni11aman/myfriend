<?php 
    $conn = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_feed');
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    if(isset($_GET['prof'])){
        $_SESSION['prof']=$_GET['prof'];
    }
    $rec = $_SESSION['prof'];
    $sql = "SELECT * FROM details WHERE username='$rec'";
    $result = mysqli_query($con,$sql);
    $p = mysqli_fetch_row($result);
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM $user WHERE username='$rec'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    $frnd = mysqli_fetch_row($result);
    $dob = $p['6'];
    $sq = "SELECT * FROM $rec WHERE username='$rec'";
    $res = mysqli_query($conn,$sq);
    $feed = mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rec; ?></title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="main">
        <div class="profile_pic">
            <img src="<?php echo $p['9'];?>" alt="" class="profile">
        </div>
        <div class="name">
            <th><b><?php echo $p['1'] ?></b></th>
        </div>
        <div class="center">
            <button class="msg_btn"><a href="#"><?php if($num==0) { echo "Add friend";} else if($frnd['3']==1) {echo "confirm";} else if($frnd['3'==0]) {echo "message";} else { echo "requested"; } ?></a></button>
            <button><i class='fa fa-ellipsis-h'></i></button>
        </div>
        <div>
            <table>
                <tr><td><i class="fa fa-home"></i>         Lives in <?php echo $p['10'] ?></td></tr>
                <tr><td><i class="fa fa-graduation-cap"></i>    studies <?php echo $p['11'] ?></td></tr>
                <tr><td><i class="fa fa-briefcase"></i>    <?php echo $p['12'] ?></td></tr>
                <tr><td><i class="fa fa-heart"></i>    <?php echo $p['13'] ?></td></tr>
                <tr><td><i class="fa fa-birthday-cake"></i>    <?php if($dob['5']=='0') { if($dob['6']=='1') {echo "Jan";} else if($dob['6']=='2') {echo "Feb";} else if($dob['6']=='3') {echo "March";} else if($dob['6']=='4') {echo "April";} else if($dob['6']=='5') {echo "May";} else if($dob['6']=='6') {echo "June";} else if($dob['6']=='7') {echo "July";} else if($dob['6']=='8') {echo "Aug";} else {echo "Sep";}  } else { if($dob['6']=='0') {echo "Oct";} else if($dob['6']=='1') {echo "Nov";} else {echo "Dec";} } echo " "; echo $dob['8']; echo $dob['9']; ?></td></tr>
            </table>
        </div>
        <div>
            <?php foreach($feed as $i) { ?>
                <div class="feed center">
                    <table class="item">
                        <tr><td class="left"><img class="small_pic" src="<?php echo $i['prof']?>" alt="">   <?php echo $p['1'];?></t></tr>
                        <tr ><td class="left"><?php echo $i['caption'];?></td></tr>
                        <tr><td><img class="img_feed center" src="<?php echo $i['pic'];?>" alt=""></td></tr>
                    </table>
                    <table class="like">
                        <tr>
                            <th><a href="like.php?id=<?php echo $i['username']; echo ","; echo $i['vid']; echo "0";?>"><button><i class="fa fa-thumbs-up"></i><?php echo $i['likes']; ?></button></a></th>
                            <th><a href="cment.php?id=<?php echo $i['username']; echo ","; echo $i['vid']; ?>"><button><i class="fa fa-comment"></i><?php echo $i['coment']; ?></button></a></th>
                        </tr>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>