<?php
include "conn.php";
include "MessageBookHelper.php";

// �������д���������棬��Ȼ��������
session_start();

$username=MessageBookHelper::magic($_POST["username"]);
$password=MessageBookHelper::magic($_POST["password"]);


$re= mysql_query("select count(*) from user where username='$username' and password='$password'");
$row = mysql_fetch_row($re);
$isok = $row[0];

if($isok==1)
{
    $_SESSION["isok"]="ok";
    echo "<script>alert('��½�ɹ�');location.href='index.php';</script>";
}
else
{
    echo "��½ʧ��";
}
?>
