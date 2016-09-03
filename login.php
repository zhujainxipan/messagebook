<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 23:54
 */

// 连接数据库
// 收集表单变量：用户名和密码
include "conn.php";
include "MessageBookHelper.php";

$username = $_POST['username'];
$password = $_POST['password'];

echo $username . $password;

$re= mysql_query("select count(*) from user where username='$username' and password='$password'");
$row = mysql_fetch_row($re);
$isok = $row[0];

if($isok==1)
{
    session_start();
    $_SESSION["isok"]="ok";
    echo "<script>alert('登陆成功');location.href='index.php';</script>";
}
else
{
    echo "登陆失败";
}
?>

