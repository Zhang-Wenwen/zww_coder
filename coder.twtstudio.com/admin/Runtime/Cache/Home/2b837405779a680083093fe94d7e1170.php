<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户名和密码</title>
</head>
<link href="/Public/Css/log1.css" rel="stylesheet" type="text/css"/>
<body>
<div class="wrapper">
    <div class="container">
        <h1>修改用户名和密码</h1>

        <form class="form" name="change" method="post"
              action="http://coder.twtstudio.com/admin.php/Home/Change/change">
            <input type="password" placeholder="旧密码 " name="pwd1">
            <input type="text" placeholder="用户名不填则不改" name="user1">
            <input type="password" placeholder="新密码 " name="pwd2">
            <input type="password" placeholder="确认新密码 " name="pwd3">

            <button type="submit" id="change-button" name="c">确认修改</button>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

</body>
</html>