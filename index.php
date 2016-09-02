<?php

include "conn.php";
// 每页大小
$pagesize = 2;
$result = mysql_query("select count(*) from messagebook");
$row = mysql_fetch_row($result);
// 总信息条数
$infoCount = $row[0];
// 总页数
$pageCount = ceil($infoCount / $pagesize);
// 当前页号
$currpage = empty($_GET['page']) ? 1 : $_GET["page"];

if ($currpage > $pageCount) {
    $currpage = 1;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>留言本</title>
    <link href="images/index.css" rel="stylesheet" type="text/css">

    <script>
        function test() {
            var sum;
            // 标题验证
            if (document.frm.title.value == "") {
                alert("请填写标题");
                return false;
            } else {
                sum = document.frm.title.value.length;
                if (sum < 5 || sum > 20) {
                    alert("留言标题：请填写5-20个字符");
                    return false;
                }
            }


            // username验证
            if (document.frm.username.value == "") {
                alert("请填写姓名");
                return false;
            } else {
                sum = document.frm.username.value.length;
                if (sum < 2 || sum > 10) {
                    alert("留言姓名：请填写2-10个字符");
                    return false;
                }
            }

            // 内容验证
            sum = document.frm.content.value.length;
            if (sum < 10) {
                alert("内容不能小于10个字符");
                return false;
            }

            return true;
        }
    </script>
</head>


<body>

<div id="main">
    <div id="header">
        <div id="logo"><img src="images/logo.gif" alt="留言本实例"></div>
        <div id="search">

            <form action="" method="post" name="login" onsubmit="">
                用户名：<input name="username" size="12" type="text">
                密码：<input name="password" size="12" type="password">
                <input type="hidden" value="login" name="action"/>
                <input name="do" value="登 陆 " class="button" type="submit">
            </form>

        </div>
    </div>

    <div id="left">
        <h3><?php echo $infoCount; ?>条留言</h3>

        <?php
        // 循环体
        $re = mysql_query("select * from messagebook limit " . ($currpage - 1) * $pagesize . "," . $pagesize);
        while ($row = mysql_fetch_array($re)) {
            $ecoStr = '
<p class="style0">' . $row["username"] . '&nbsp;&nbsp;' . $row['adddate'] . '</p>
<div class="content">' . $row['content'] . '</div>';
            echo $ecoStr;
        }

        // 页符部分
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $currpage) {
                echo "<b>$i</b>&nbsp;";
            } else {
                echo "<a href='?page=$i'>$i</a>&nbsp;";
            }
        }

        ?>

        <fieldset>
            <legend>发表留言</legend>
            <form action="result.php" method="post" name="frm" onsubmit="return test()">
                <table border="0" cellpadding="5" cellspacing="0" width="0">
                    <tbody>
                    <tr>
                        <td width="20%">留言标题</td>
                        <td><input name="title" size="30" type="text"/></td>
                    </tr>
                    <tr>
                        <td>用户网名</td>
                        <td><input name="username" value="" size="30" type="text"/></td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td><textarea name="content" cols="42" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input name="action" value="insert" type="hidden">
                            <input value=" 提 交 " class="button" type="submit">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </fieldset>

    </div>

    <div id="footer">&#169;&nbsp;2011&nbsp;www.houdunwang.com</div>

</div>

</body>
</html>