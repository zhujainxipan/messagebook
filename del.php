<?php
include 'conn.php';
session_start();
if($_SESSION!="ok"){exit;}
$id=$_GET["id"];
$result=  mysql_query("delete from messagebook where id=$id");
if($result==1)
{
    echo "<script>alert('ɾ���ɹ�');location.href='index.php';</script>";
}
else
{
    echo "<script>alert('ɾ��ʧ��');location.href='index.php';</script>";
}
?>
