<?php

include "conn.php";
// ÿҳ��С
$pagesize = 2;
$result = mysql_query("select count(*) from messagebook");
$row = mysql_fetch_row($result);
// ����Ϣ����
$infoCount = $row[0];
// ��ҳ��
$pageCount = ceil($infoCount / $pagesize);
// ��ǰҳ��
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
    <title>���Ա�</title>
    <link href="images/index.css" rel="stylesheet" type="text/css">

    <script>
        function test() {
            var sum;
            // ������֤
            if (document.frm.title.value == "") {
                alert("����д����");
                return false;
            } else {
                sum = document.frm.title.value.length;
                if (sum < 5 || sum > 20) {
                    alert("���Ա��⣺����д5-20���ַ�");
                    return false;
                }
            }


            // username��֤
            if (document.frm.username.value == "") {
                alert("����д����");
                return false;
            } else {
                sum = document.frm.username.value.length;
                if (sum < 2 || sum > 10) {
                    alert("��������������д2-10���ַ�");
                    return false;
                }
            }

            // ������֤
            sum = document.frm.content.value.length;
            if (sum < 10) {
                alert("���ݲ���С��10���ַ�");
                return false;
            }

            return true;
        }
    </script>
</head>


<body>

<div id="main">
    <div id="header">
        <div id="logo"><img src="images/logo.gif" alt="���Ա�ʵ��"></div>
        <div id="search">

            <form action="" method="post" name="login" onsubmit="">
                �û�����<input name="username" size="12" type="text">
                ���룺<input name="password" size="12" type="password">
                <input type="hidden" value="login" name="action"/>
                <input name="do" value="�� ½ " class="button" type="submit">
            </form>

        </div>
    </div>

    <div id="left">
        <h3><?php echo $infoCount; ?>������</h3>

        <?php
        // ѭ����
        $re = mysql_query("select * from messagebook limit " . ($currpage - 1) * $pagesize . "," . $pagesize);
        while ($row = mysql_fetch_array($re)) {
            $ecoStr = '
<p class="style0">' . $row["username"] . '&nbsp;&nbsp;' . $row['adddate'] . '</p>
<div class="content">' . $row['content'] . '</div>';
            echo $ecoStr;
        }

        // ҳ������
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($i == $currpage) {
                echo "<b>$i</b>&nbsp;";
            } else {
                echo "<a href='?page=$i'>$i</a>&nbsp;";
            }
        }

        ?>

        <fieldset>
            <legend>��������</legend>
            <form action="result.php" method="post" name="frm" onsubmit="return test()">
                <table border="0" cellpadding="5" cellspacing="0" width="0">
                    <tbody>
                    <tr>
                        <td width="20%">���Ա���</td>
                        <td><input name="title" size="30" type="text"/></td>
                    </tr>
                    <tr>
                        <td>�û�����</td>
                        <td><input name="username" value="" size="30" type="text"/></td>
                    </tr>
                    <tr>
                        <td>����</td>
                        <td><textarea name="content" cols="42" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input name="action" value="insert" type="hidden">
                            <input value=" �� �� " class="button" type="submit">
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