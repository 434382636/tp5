<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\xampp\htdocs\tp5\public/../application/index\view\login\index.html";i:1494488769;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
    <form action="<?php echo url('login'); ?>" method="post">
        <label for="username">用户名:</label><input type="text" name="username" id="username" />
        <label for="password">密码:</label><input type="password" name="password" id="password" />
        <button type="submit">提交</button>
    </form>
</body>
</html>