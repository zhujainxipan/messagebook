<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 22:29
 */

$link = mysql_connect('localhost', 'root', 'admin');
if (!$link) {
    die('����ʧ��' . mysql_error());
}
echo "��mysql�������������ӳɹ�<br>";
mysql_selectdb("messagebook", $link);
mysql_query("set names gb2312");