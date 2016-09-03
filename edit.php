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
    <title>留言本</title>
    <link href="images/index.css" rel="stylesheet" type="text/css">
    <script>
        function test() {
            var sum
            if (document.frm.title.value == '') {
                alert('请填写标题');
                return false;
            } else {
                sum = document.frm.title.value.length;

                if (sum < 5 || sum > 20) {
                    alert('请填写5-20个字符');
                    return false;
                }
            }

            if (document.frm.username.value == '') {
                alert('请填写姓名');
                return false;
            } else {
                sum = document.frm.username.value.length;

                if (sum < 2 || sum > 10) {
                    alert('请填写2-10个字符');
                    return false;
                }
            }
            sum = document.frm.content.value.length;
            if (sum < 10) {
                alert('留言内容不能小于10个字符');
                return false;
            }
            return true;
        }

        function islogin() {
            if (document.login.username.value == '') {
                alert('请输入账户名');
                return false;
            }
            if (document.login.password.value == '') {
                alert('请输入密码');
                return false;
            }
            return true;

        }
    </script>
</head>


<body>

<div id="main">
    <div id="header">
        <div id="logo"><img src="images/logo.png" alt="留言本实例"></div>
        <div id="search">


        </div>
    </div>

    <div id="left">

        <fieldset>
            <legend>发表留言</legend>
            <form action="save.php?id=<?php echo $id; ?>" method="post" name="frm" onsubmit="return test();">
                <table border="0" cellpadding="5" cellspacing="0" width="0">
                    <tbody>
                    <tr>
                        <td width="20%">留言标题</td>
                        <td><input name="title" size="30" type="text" value="<?php echo $title; ?>"/></td>
                    </tr>
                    <tr>
                        <td>用户网名</td>
                        <td><input name="username" size="30" type="text" value="<?php echo $username; ?>"/></td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td><textarea name="content" cols="42" rows="5"><?php echo $content; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>内容</td>
                        <td><textarea name="recontent" cols="42" rows="5"><?php echo $recontent ?></textarea></td>
                    </tr>
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