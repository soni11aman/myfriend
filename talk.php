<?php 
    header("Refresh: 5");
    $con =  mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    $user = $_SESSION['name'];
    $rec = "";
    if(isset($_GET['nam']))
    {
        $_SESSION['naam']=$_GET['nam'];
    }
    $rec = $_SESSION['naam'];
    $sql = "SELECT * FROM $user WHERE username='$rec'";
    $result = mysqli_query($con,$sql);
    $p = mysqli_fetch_row($result);
    $msg = preg_split( '/(;:)/',$p['5']);
    $num=0;
    if(isset($_POST['submit'])){
        $sql = "SELECT * FROM $user WHERE username='$rec'";
        $result = mysqli_query($con,$sql);
        $u = mysqli_fetch_row($result);
        $str = $u['5'];
        $str .= ';:';
        $str .= $_POST['msg'];
        $str .= '0';
        $sql = "UPDATE $user SET talk='$str' WHERE username='$rec'";
        mysqli_query($con,$sql);
        $sql = "SELECT * FROM $rec WHERE username='$user'";
        $result = mysqli_query($con,$sql);
        $u = mysqli_fetch_row($result);
        $str1 = $u['5'];
        $str1 .= ';:';
        $str1 .= $_POST['msg'];
        $str1 .= '1';
        $sql = "UPDATE $rec SET talk='$str1' WHERE username='$user'";
        mysqli_query($con,$sql);
        header("Refresh:0.1");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width, initial-scale=1"/>
    <title>myfriend</title>
    <link rel="stylesheet" href="talk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function () {
        // Handler for .ready() called.
        $('html, body').animate({
            scrollTop: $('#msg').offset().top
        }, 'slow');
    });
    </script>
</head>
<body>
    <div  class="main">
        <div>
            <table style="width:95%;" class="over">
                <tr style="text-align:left;"><th><img src="<?php echo $p['4']; ?>" alt="photos/default_pic.png"
                style="height:100px; width:100px; border-radius:50%;"></th><th style="text-align:center;"><?php echo $p['1']; ?></th></tr>
            </table>
        </div>
        <div class="talk">
            <div >
                <table style="width:100%; font-size:20px; color: rgb(197, 139, 85); padding-top:50px;">
                <?php foreach($msg as $i) { ?>
                <tr><th style="<?php if($i[strlen($i)-1]=='0') { echo 'text-align:right';} else { echo 'text-align:left';} ?>"><?php echo substr($i,0,strlen($i)-1); ?></th></tr>
                <?php } ?>
                </table>
            </div>
            <div>
                <form action="talk.php" method="POST">
                    <table style="width:100%;">
                    <tr id="ip">
                        <th><input type="text" name="msg" id="msg"  placeholder="Type something..!!" size=30 style="padding: 8px 20px;" >  <input type="submit" name="submit" value="send"  style="padding: 8px 20px;" ></th>
                    </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>