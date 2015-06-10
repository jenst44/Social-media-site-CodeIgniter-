<?php 
if(empty($this->session->userdata('user_level')) || $this->session->userdata['user_level'] !== 'Admin')
{
	session_destroy();
	redirect('/');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>
	
	.blue {
		margin-top: 15px;
	}

	table {
		margin-top: 40px;
	}

	</style>
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-default">
	  		<div class="container-fluid">
	  			<div class="col-md-10">
		    		<div class="navbar-header">
		      			<a class="navbar-brand" href="/">Test APP</a>
		    		</div>
	      			<ul class="nav navbar-nav">
	      				<li><a href="/<?=$this->session->userdata['user_level']?>"><strong>Dashboard</strong></a></li>
				        <li><a href="/show/<?=$this->session->userdata('id')?>">Profile</a></li>
				    </ul>
				</div>
				    <div class="col-md-1">
				    	<ul class="nav navbar-nav">
				        	<li><a href="/login">LogIn</a></li>
				    	</ul>
				    </div>
				    <div class="col-md-1">
				    	<ul class="nav navbar-nav">
				        	<li><a href="/Logout">LogOut</a></li>
				    	</ul>
				    </div>
	    		</div>
	  		</div>
		</nav>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<h2>Manage Users</h2>
			</div>
			<div class="col-md-5"></div>
			<div class="col-md-2 text-right">
				<a class="btn btn-primary blue" href="">Add New</a>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Created At</th>
							<th>User Level</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($users as $value) { ?>
							<tr>
								<td><?=$value['id']?></td>
								<td><a href="/show/<?=$value['id']?>"><?=$value['first_name']." ".$value['last_name']?></a></td>
								<td><?=$value['email']?></td>
								<td><?=$value['created_at']?></td>
								<td><?=$value['user_level']?></td>
								<td><a href="/EditUser/<?=$value['id']?>">Edit</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>