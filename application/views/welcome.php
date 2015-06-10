<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">

	.banner {
		padding:60px 20px;
	}

	.blue {
		background-color: blue;
		color: white;
		padding:5px 10px;
	}

	</style>
</head>
<body>
	<div class="container-fluid">
		<nav class="navbar navbar-default">
	  		<div class="container-fluid">
	  			<div class="col-md-11">
		    		<div class="navbar-header">
		      			<a class="navbar-brand" href="/">Test APP</a>
		    		</div>
	      			<ul class="nav navbar-nav">
				        <li><a href="/">Home</a></li>
				    </ul>
				</div>
				    <div class="col-md-1">
				    	<ul class="nav navbar-nav">
				        	<li><a href="/login">LogIn</a></li>
				    	</ul>
				    </div>
	    		</div>
	  		</div>
		</nav>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="jumbotron banner">
					<h2>Welcome to the Test</h1>
					<p>We're going to build a cool application using a MVC framework! This application was built with Village 88 folks!</p>
					<a class="btn btn-primary" href="/Register">Start</a>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4">
						<h3>Manage Users</h3>
						<p>Using this application, you'll learn how to add, remove, and edit users for the application</p>
					</div>
					<div class="col-md-4">
						<h3>Leave messages</h3>
						<p>Users will be able to leave a message to another user using this application</p>
					</div>
					<div class="col-md-4">
						<h3>Edit User Information</h3>
						<p>Admins will be able to edit another user's information (email address, first name, last name, etc.)</p>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>