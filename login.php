<?php
include "conn.php";
include "MessageBookHelper.php";

// 放在所有代码的最上面，不然不起租用
session_start();

$username=MessageBookHelper::magic($_POST["username"]);
$password=MessageBookHelper::magic($_POST["password"]);


$re= mysql_query("select count(*) from user where username='$username' and password='$password'");
$row = mysql_fetch_row($re);
$isok = $row[0];

if($isok==1)
{
    $_SESSION["isok"]="ok";
    echo "<script>alert('登陆成功');location.href='index.php';</script>";
}
else
{
    echo "登陆失败";
}
?>
