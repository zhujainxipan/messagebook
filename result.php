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
 * ���˺���
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

// ���ݿⲿ��

// �������ݿ�
$link = mysql_connect('localhost', 'root', 'admin');
if (!$link) {
    die('����ʧ��' . mysql_error());
}
echo "��mysql�������������ӳɹ�<br>";
mysql_selectdb("messagebook", $link);
mysql_query("set names gb2312");

// ��������
$timeStr = date("Y-M-D");
$insertStr = <<<EOT
INSERT INTO messagebook(title, username, content, adddate)
VALUES('$title', '$username', '$content', '$timeStr')
EOT;

$isOk = mysql_query($insertStr);

if ($isOk) {
    echo "ִ�гɹ�";
} else {
    echo "ִ��ʧ��";
}


?>
