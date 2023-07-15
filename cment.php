<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_feed');
    $conn = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $user = $_SESSION['name'];
    $id = 0;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        for($i=0; $i<strlen($id); $i++)
        {
            if($id[$i]==',')
            {
                $_SESSION['post_rec'] = substr($id,0,$i);
                $_SESSION['post_vid'] = (int)substr($id,$i+1);
                break;
            }
        }
    }
    $rec = $_SESSION['post_rec'];
    $vid = $_SESSION['post_vid'];
    $sql = "SELECT * FROM $rec WHERE id='$vid'";
    $res = mysqli_query($con,$sql);
    $p = mysqli_fetch_row($res);
    $cmnts = explode(";:",$p[9]);
    $a = array();
    $b = array();
    $count = 0;
    foreach($cmnts as $i){
        if($count%2==0){
            array_push($a,$i);
        }
        else{
            array_push($b,$i);
        }
        $count++;
    }
    if(isset($_POST['submit'])){
        $ct = $p['9'];
        $ct .= $user;
        $ct .= ";:";
        $ct .= $_POST['comnt'];
        $ct .= ";:";
        $num_com = $p['3'];
        $num_com +=1;
        $sql = "UPDATE $rec SET coment='$num_com' , comet='$ct' WHERE id='$vid'";
        mysqli_query($con,$sql);
        $sql = "SELECT * FROM $rec where addd='0'";
        $res = mysqli_query($conn,$sql);
        $uk = mysqli_fetch_all($res,MYSQLI_ASSOC);
        foreach($uk as $i){
            $nam = $i['username'];
            $sql = "UPDATE $nam SET coment='$num_com' , comet='$ct' WHERE vid='$vid' AND username='$rec'";
            mysqli_query($con,$sql);
        }
        header("Refresh: 0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $user; ?></title>
    <link rel="stylesheet" href="cment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <div>
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
        </div>
        <div>
            <table id="name">
                <tr><td><img id="prof_pic" src="<?php echo $p[5];?>" alt="">   <?php echo $p[6]; ?></td></tr>
                <tr><td class="caption left"><?php echo $p[1] ; ?></td></tr>
                <tr><td ><img src="<?php echo $p[4]; ?>" alt="" id="pic"></td></tr>
            </table>
            <table class="like">
                <tr class="center name">
                    <td class="center lik" ><a href="like.php?id=<?php echo $id; echo $xx;?>"><i class="fa fa-thumbs-up"><?php echo $p[2]; ?></i></a></td>
                    <td class="center ct"><a href=""><i class="fa fa-comment"><?php echo $p[3]; ?></i></a></td>
                </tr>
            </table>
            <table class="cooments">
                <?php for($i=0;$i<count($a)-1;$i++) { ?>
                    <?php $sql ="SELECT * FROM details WHERE username='$a[$i]'"; $res = mysqli_query($conn,$sql); $dt=mysqli_fetch_row($res); ?>
                    <tr><td><img src="<?php echo $dt[9];?>" alt="" class="pp"><b><?php echo $dt[1];?></b></td></tr>
                    <tr><td class="cc"><?php echo $b[$i];?></td></tr>
                <?php } ?>
            </table>
            <table>
                    <form action="cment.php" method="POST">
                    <tr><th><input type="text" name="comnt" id="" size="40" placeholder="Write a comment..."><input type="submit" name="submit" value="post"></th></tr>
                    </form>
            </table>
        </div>
    </div>
</body>
</html>