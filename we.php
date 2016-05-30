<?php
/**
 * Created by PhpStorm.
 * User: shiban
 * Date: 16/5/26
 * Time: 下午3:46
 */
$con = mysql_connect("localhost","root","root");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("thinkdemo", $con);
$sql="select * from b_userinfo ORDER BY utime DESC ";

$result=mysql_query($sql);
echo '<h1> 用户回话列表</h1>';
echo '<table border="1" width="80%">';
while($user=mysql_fetch_assoc($result)){
    if($user['message']==0){
        $bg="";
    }else{
        $bg="green";
    }
    echo '<tr bgcolor="'.$bg.'">';
        echo '<td><img src="'.$user['headimgurl'].'" width="60"></td>';
        echo '<td>'.$user['nickname'].'</td>';
        echo '<td>'.$user['province']."-".$user['city'].'</td>';
        echo '<td>'.date("Y-m-d H:i:s",$user['utime']).'</td>';
        echo '<td><a href="message.php?openid='.$user['openid'].'">查看</a></td>';
    echo '</tr>';
}
echo '</table>';