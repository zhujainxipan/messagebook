<?php
include 'conn.php';
include 'MessageBookHelper.php';


$id = $_GET["id"];
$title = MessageBookHelper::magic($_POST["title"]);
$content = MessageBookHelper::magic($_POST["content"]);
$username = MessageBookHelper::magic($_POST["username"]);
$recontent = MessageBookHelper::magic($_POST["recontent"]);


$result = mysql_query("update messagebook set title='$title',username='$username',content='$content',recontent='$recontent',isok=1 where id=$id");

if ($result == 1) {
    echo "<script>alert('�ظ��ɹ�');location.href='index.php';</script>";

} else {
    echo "<script>alert('�ظ�ʧ��');location.href='index.php';</script>";
}

?>
