<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 21:44
 */

$title = magic($_POST['title']);
$username = magic($_POST['username']);
$content = magic($_POST['content']);

/**
 * 过滤函数
 * @param $str
 * @return string
 */
function magic($str)
{
    $str = trim($str);
    if (!get_magic_quotes_gpc()) {
        $str = addslashes($str);
    }
    return htmlspecialchars($str);
}

echo $title . ":" . $content . ":" . $username;

// 数据库部分
// 连接数据库
include 'conn.php';

// 插入数据
$timeStr = date("Y-M-D");
$insertStr = <<<EOT
INSERT INTO messagebook(title, username, content, adddate)
VALUES('$title', '$username', '$content', '$timeStr')
EOT;

$isOk = mysql_query($insertStr);

if ($isOk) {
    echo "执行成功";
} else {
    echo "执行失败";
}


?>

