<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\xampp\htdocs\tp5\public/../lx/index\view\teacher\index.html";i:1494399119;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>教师管理</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="container">
	<div class="row">
        <div class="col-md-12">
			<table class="table table-hover table-bordered">
				<tr class="info">
					<th>序号</th>
					<th>姓名</th>
					<th>性别</th>
					<th>邮箱</th>
					<th>用户名</th>
				</tr>
			   <?php if(is_array($teachers) || $teachers instanceof \think\Collection || $teachers instanceof \think\Paginator): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $teacher['id']; ?></td>
					<td><?php echo $teacher['name']; ?></td>
					<td><?php if($teacher['sex'] == '1'): ?>男<?php else: ?>女<?php endif; ?></td>
					<td><?php echo $teacher['email']; ?></td>
					<td><?php echo $teacher['username']; ?></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
	</div>
</body>
</html>