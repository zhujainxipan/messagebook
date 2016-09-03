<?php
include 'conn.php';

$id=$_GET["id"];
$result=  mysql_query("delete from messagebook where id=$id");
if($result==1)
{
    echo "<script>alert('É¾³ý³É¹¦');location.href='index.php';</script>";
}
else
{
    echo "<script>alert('É¾³ýÊ§°Ü');location.href='index.php';</script>";
}
?>
