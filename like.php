<?php 
    $con = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_feed');
    $conn = mysqli_connect('sql100.epizy.com','epiz_27697613','utbcIPeCfQwEKi','epiz_27697613_chat');
    session_start();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $xx= $id[strlen($id)-1];
        $id = substr($id,0,strlen($id)-1);
        for($i=0; $i<strlen($id); $i++)
        {
            if($id[$i]==',')
            {
                $_SESSION['post_rec'] = substr($id,0,$i);
                $_SESSION['post_vid'] = (int)substr($id,$i+1);
                break;
            }
        }
        $user = $_SESSION['name'];
        $rec = $_SESSION['post_rec'];
        $id = $_SESSION['post_vid'];
        $sql = "SELECT * FROM $rec WHERE id='$id'";
        $res = mysqli_query($con,$sql);
        $p = mysqli_fetch_row($res);
        $lik = explode(",",$p[7]);
        $likes = $p[2];
        $found = 0;
        foreach($lik as $i){
            if($i == $user){
                $found=1;
                $likes-=1;
                $str = "";
                foreach($lik as $j){
                    if($j != $user ){
                        if($j != ""){
                            $str.=$j;
                            $str.=",";
                        }
                    }
                }
                $sql = "UPDATE $rec SET likes='$likes' , lik='$str' WHERE id='$id'";
                mysqli_query($con,$sql);
                $sql = "SELECT * FROM $rec WHERE addd='0'";
                $res = mysqli_query($conn,$sql);
                $frnds = mysqli_fetch_all($res);
                foreach($frnds as $i){
                    $nam = $i[2];
                    $sql = "UPDATE $nam SET likes='$likes' , lik='$str' WHERE vid='$id' AND username='$rec'";
                    mysqli_query($con,$sql);
                }
                if($xx==1){
                    header("Location:user.php");
                }
                else{
                    header("Location:profile.php");
                }
                break;
            }
        }
        if($found==0){
            $likes+=1;
            $str = $p[7];
            $str .= $user;
            $str .= ",";
            $sql = "UPDATE $rec SET likes='$likes' , lik='$str' WHERE id='$id'";
            mysqli_query($con,$sql);
            $sql = "SELECT * FROM $rec WHERE addd='0'";
            $res = mysqli_query($conn,$sql);
            $frnds = mysqli_fetch_all($res);
            foreach($frnds as $i){
                $nam = $i[2];
                $sql = "UPDATE $nam SET likes='$likes' , lik='$str' WHERE vid='$id' AND username='$rec'";
                mysqli_query($con,$sql);
            }
            if($xx==1){
                header("Location:user.php");
            }
            else{
                header("Location:profile.php");
            }
        }
    }
?>