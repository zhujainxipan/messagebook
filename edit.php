<?php
include 'conn.php';

$id = $_GET["id"];
$result = mysql_query("select * from messagebook where id=$id");
while ($row = mysql_fetch_array($result)) {
    $title = $row["title"];
    $content = $row["content"];
    $username = $row["username"];
    $recontent = $row["recontent"];

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
            var sum
            if (document.frm.title.value == '') {
                alert('����д����');
                return false;
            } else {
                sum = document.frm.title.value.length;

                if (sum < 5 || sum > 20) {
                    alert('����д5-20���ַ�');
                    return false;
                }
            }

            if (document.frm.username.value == '') {
                alert('����д����');
                return false;
            } else {
                sum = document.frm.username.value.length;

                if (sum < 2 || sum > 10) {
                    alert('����д2-10���ַ�');
                    return false;
                }
            }
            sum = document.frm.content.value.length;
            if (sum < 10) {
                alert('�������ݲ���С��10���ַ�');
                return false;
            }
            return true;
        }

        function islogin() {
            if (document.login.username.value == '') {
                alert('�������˻���');
                return false;
            }
            if (document.login.password.value == '') {
                alert('����������');
                return false;
            }
            return true;

        }
    </script>
</head>


<body>

<div id="main">
    <div id="header">
        <div id="logo"><img src="images/logo.png" alt="���Ա�ʵ��"></div>
        <div id="search">


        </div>
    </div>

    <div id="left">

        <fieldset>
            <legend>��������</legend>
            <form action="save.php?id=<?php echo $id; ?>" method="post" name="frm" onsubmit="return test();">
                <table border="0" cellpadding="5" cellspacing="0" width="0">
                    <tbody>
                    <tr>
                        <td width="20%">���Ա���</td>
                        <td><input name="title" size="30" type="text" value="<?php echo $title; ?>"/></td>
                    </tr>
                    <tr>
                        <td>�û�����</td>
                        <td><input name="username" size="30" type="text" value="<?php echo $username; ?>"/></td>
                    </tr>
                    <tr>
                        <td>����</td>
                        <td><textarea name="content" cols="42" rows="5"><?php echo $content; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>����</td>
                        <td><textarea name="recontent" cols="42" rows="5"><?php echo $recontent ?></textarea></td>
                    </tr>
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