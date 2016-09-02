<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 22:29
 */

$link = mysql_connect('localhost', 'root', 'admin');
if (!$link) {
    die('连接失败' . mysql_error());
}
echo "与mysql服务器建立连接成功<br>";
mysql_selectdb("messagebook", $link);
mysql_query("set names gb2312");