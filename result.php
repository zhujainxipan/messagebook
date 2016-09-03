<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 21:44
 */
include "MessageBookHelper.php";

$title = MessageBookHelper::magic($_POST['title']);
$username = MessageBookHelper::magic($_POST['username']);
$content = MessageBookHelper::magic($_POST['content']);

/**
 * 过滤函数
 * @param $str
 * @return string
 */

echo $title . ":" . $content . ":" . $username;

// 数据库部分
// 连接数据库
include 'conn.php';

// 插入数据
$timeStr = date("Y-m-d");
$insertStr = <<<EOT
INSERT INTO messagebook(title, username, content, adddate)
VALUES('$title', '$username', '$content', '$timeStr')
EOT;

$isOk = mysql_query($insertStr);

if ($isOk) {
    echo "<script>alert('执行成功');location.href='index.php';</script>";
} else {
    echo "<script>alert('执行成功');location.href='index.php';</script>";
}


?>

