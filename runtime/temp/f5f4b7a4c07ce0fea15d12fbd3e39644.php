<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\xampp\htdocs\tp5\public/../application/index\view\index\index.html";i:1494836413;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>教师管理</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="/static/css/css.css" />
</head>
<body class="container">
	 <hr />
	<div class="row">
		 <div class="col-md-8">
			<form class="form-inline" action='index'>
				<div class="form-group">
					<label class="sr-only" for="name">姓名</label>
					<input name="name" type="text" class="form-control" placeholder="姓名...">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>&nbsp;查询</button>
			</form>
		</div>
		 
        <div class="col-md-12">
			<table class="table table-hover table-bordered">
				<tr class="info">
					<th>序号</th>
					<th>用户名</th>
					<th>姓名</th>
					<th>性别</th>
					<th>邮箱</th>  
					<th>操作</th>
				</tr>
			   <?php if(is_array($teachers) || $teachers instanceof \think\Collection || $teachers instanceof \think\Paginator): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
				<tr>
					<td><?php echo $teacher['id']; ?></td> 
					<td><?php echo $teacher['username']; ?></td>
					<td><?php echo $teacher['name']; ?></td>
					<td><?php if($teacher['sex'] == '0'): ?>男<?php else: ?>女<?php endif; ?></td>
					<td><?php echo $teacher['email']; ?></td>
					<td><a href="<?php echo url('edit?id='.$teacher['id']); ?>">编辑</a>
                        &nbsp;&nbsp;<a href="<?php echo url('del?id='.$teacher['id']); ?>">删除</a></td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<?php echo $page; ?>
		</div>
	</div>
	<a href="<?php echo url('add'); ?>">添加用户</a>
	<a href="<?php echo url('login/logout'); ?>">退出</a>
</body>
</html>