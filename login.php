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

echo $username.$password;

?>

