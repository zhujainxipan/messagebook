<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 23:54
 */

// �������ݿ�
// �ռ����������û���������
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
    echo "<script>alert('��½�ɹ�');location.href='index.php';</script>";
}
else
{
    echo "��½ʧ��";
}
?>

