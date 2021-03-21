<?php
//echo 'aman soni';
    session_start();
    include('connect.php');
    $p= $_SESSION['name'];
    $sql ="SELECT * FROM $p ";
    $result = mysqli_query($con,$sql);
    $list = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if(isset($_GET['add'])){
        $user= $_SESSION['name'];
        $workname = mysqli_real_escape_string($con, $_GET['workname']);
        $sql ="INSERT INTO $user(workname) VALUES('$workname')";
        mysqli_query($con,$sql);
        header('Location:user.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width: device-width"/>
    <title>myBook</title>
    <link rel="stylesheet" href="user.css">
    
</head>
    <body>
    <div id="menubar" >
            <h1><a href="user.php" id="logo" title="Go to home page">myBook</a></h1>
    </div>
    <nav >
        <a href="user.php"><?php echo $_SESSION['name'];?></a>
    </nav>
    <div style="text-align:center;margin-left:70px;">
    <form action="user.php" method="GET">
        <table id="tbl">
            <?php foreach($list as $i) { ?>
            <tr class="row">
                <th><?php echo $i['workname']?></th>
                <th><a href="delete.php?delete=<?php echo $i['id'] ?>"style="background:transparent;color:rgb(28, 155, 28);">X</a></th>    
            </tr>
            <?php } ?>
            <tr>
            <th ><input type="text" name="workname"  placeholder="Add a work to do..." style="background-color:rgb(255,255,255,0.9);
                border-radius: 4px; font-size:30px; width:500px;
                box-shadow:2px 2px 5px black; ">
                <input type="submit" name="add" value="Add"style="background-color:rgb(7, 70, 54,0.8);border-radius: 6px; font-size:25px;
                box-shadow:2px 2px 5px black;"></th>
            </tr>
        </table>
        </form>
    </div>
    <div id="about">
            <table id="tble">
                <tr>
                    <th><a href="about.html">About</a></th>
                    <th><a href="contact.html">contact us</a></th>
                    <th><a href="privacy.html">privacy policy</a></th>
                </tr>
                <tr>
                    <th><a href="help.html">Help</a></th>
                    <th><a href="advertisement.html">contact for advertisement</a></th>
                    <th><a>copyright @aman_soni</a></th>
                </tr>
            </table>
</div>
<script src="index.js"></script>
</body>
</html>