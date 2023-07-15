<?php
    $con = mysqli_connect('localhost','soni11aman','alex@99435ps','feed');
    $conn = mysqli_connect('localhost','soni11aman','alex@99435ps','chat');
    session_start();
    if(isset($_POST['submit'])){
        $myfile = $_FILES['imag'];
        $filename = $myfile['name'];
        $dest = 'photos/'.$filename;
        move_uploaded_file($myfile['tmp_name'],$dest);
        $filename = "photos/".$filename;
        $res = "INSERT INTO pics(nam) VALUES('$filename')";
        mysqli_query($con,$res);
        header('Location:user.php');
    }
    $user = $_SESSION['name'];
    $sql = "SELECT * FROM details WHERE username='$user'";
    $result = mysqli_query($conn,$sql);
    $p = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div>
        <div class="center name">
            <table>
                <tr><th><img src="<?php echo $p['9']; ?>" alt="" class="profile_pic"></th></tr>
                <tr>
                <td><?php echo $p['1'];?> </td>
                </tr>
            </table>
        </div>
        <div class="center name">
            <form action="post.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                    <th><input type="text" name="caption" placeholder="Write something..." size="40" class="text"></th>
                    </tr>
                    <tr>
                    <th><input type="file" name="imag" value="choose file"></th>
                    <th><input type="submit" name="submit" value="upload"></th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>