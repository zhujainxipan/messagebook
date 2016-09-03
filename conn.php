<?php
/**
 * Created by PhpStorm.
 * User: annuoaichengzhang
 * Date: 16/9/2
 * Time: 22:29
 */
$con = mysql_connect("localhost","root","admin");
mysql_select_db("messagebook");
mysql_query("set names gb2312");