<?php
    $con = mysqli_connect('localhost','aman','chataman','chat');
    session_start();
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM $user";
    $result = mysqli_query($con,$sql);
    $n = mysqli_num_rows($result);
    //echo $user;
    $feed = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $isblur = 0;
    $sql = "SELECT * FROM details WHERE username='$user'";
    $result = mysqli_query($conn,$sql);
    $p = mysqli_fetch_row($result);
    if(isset($_POST['submit'])){
        $myfile = $_FILES['imag'];
        $filename = $myfile['name'];
        $dest = 'photos/'.$filename;
        move_uploaded_file($myfile['tmp_name'],$dest);
        $filename="photos/".$filename;
        $caption = $_POST['caption'];   
        $n = 0;
        $sql = "SELECT * FROM details WHERE username='$user'";
        $res = mysqli_query($conn,$sql);
        $p = mysqli_fetch_row($res);
        $prof = $p[9];
        $nam = $p[1];
        $sql = "INSERT INTO $user(caption,likes,coment,pic,prof,nam,username) VALUES( '$caption','$n','$n','$filename','$prof','$nam','$user')";
        mysqli_query($con,$sql);
        $sql = "SELECT * FROM $user WHERE pic='$filename'";
        $res = mysqli_query($con,$sql);
        $p = mysqli_fetch_row($res);
        $vid = $p[0];
        $sql = "UPDATE $user SET vid='$vid' WHERE id='$vid'";
        mysqli_query($con,$sql);
        $sql = "SELECT * FROM $user WHERE addd='0'";
        $res = mysqli_query($conn,$sql);
        $p = mysqli_fetch_all($res);
        foreach($p as $i){
            $nam = $i['username'];
            $sql = "INSERT INTO $nam(caption,likes,coment,pic,prof,nam,username,vid) VALUES( '$caption','$n','$n','$filename','$prof','$nam','$user','$vid')";
            mysqli_query($con,$sql);
        }
        header("Location: user.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width, initial-scale=1"/>
    <title>myfriend</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="aman">
    <div id="main">Welcome <?php echo $_SESSION['name']?></div>
    <nav>
        <table  id="tab">
        <tr class="center">
            <td><a href="user.php" title="Home" ><i class="fa fa-home"></i></a></td>
            <td><a href="cht.php" title="Messages" ><i class='fa fa-comments icon'></i></a></td>
            <td><a href="frnds.php" title="Friends" ><i class='fa fa-users icon'></i></a></td>
            <td><a href="sugg.php" title="Friend requests" ><i class="fa fa-user-plus"></i></a></td>
            <td><a href="logout.php" title="Log out" ><i class='fa fa-sign-out'></i></a></td>
        </tr>
        </table>
    </nav>
    <div class="post center">
        <form action="user.php" method="POST" enctype="multipart/form-data">
        <table>
        <tr><td class="left"><?php echo $p['1']; ?></td></tr>
        <tr><td class="left"><input type="text" name="caption" placeholder="Write something..." size="40"></td></tr>
        <tr>
            <td class="left"><input type="file" name="imag" value="image"><input type="submit" name="submit" value="upload"></td>
        </tr>
        <tr>
            <td class="left"><input type="submit" name="post" value="Post" class="post_btn"></td>
        </tr>
        </table>
        </form>
    </div>
    <div class="feed center">
        <?php foreach($feed as $i) { ?>
            <div class="abc">
            <form action="user.php" method="GET">
                <table>
                    <tr>
                        <td><img src="<?php echo $i['prof']?>" style="border-radius:50%; width:19px"><b><?php echo $i['nam'] ?></b></td>
                    </tr>
                    <tr><td><?php echo $i['caption'] ?></td></tr>
                    <tr><td><img src="<?php echo $i['pic']?>" alt="cannot be shown....!!" style="width:395px;height:400px;"></td></tr>
                </table>
                <table>
                    <tr class="center">
                        <td class="like"><a href="like.php?id=<?php echo $i['username']; echo ","; echo $i['vid']; echo "1"; ?>"><i class="fa fa-thumbs-up"><?php echo $i['likes']; ?></i></a></td>
                        <td class="like"><a href="cment.php?id=<?php echo $i['username']; echo ","; echo $i['vid']; ?>"><i class="fa fa-comment"><?php echo $i['coment']; ?></i></a></td>
                    </tr>
                </table>    
            </form>
            </div>
        <?php } ?>
    </div>
    </div>
    <script>
    </script>
</body>
</html>