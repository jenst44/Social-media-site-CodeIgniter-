<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">

	.red {
		color:red;
		margin-top: 30px;
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
				        	<li><a href="/users/login">LogIn</a></li>
				    	</ul>
				    </div>
	    		</div>
	  		</div>
		</nav>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<h2>Register</h2>
				<form class="form-horizontal" action="/users/registeruser" role="form" method="post">
					<div class="form-group">
						<label class="control-label col-sm-3 text-left" for="text">Email:</label>
   						<div class="col-sm-9">
   							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="text">First Name:</label>
   						<div class="col-sm-9"> 
   							<input type="text" name="first_name" class="form-control">
						</div>
  					</div>
  					<div class="form-group">
						<label class="control-label col-sm-3" for="text">Last Name:</label>
   						<div class="col-sm-9"> 
   							<input type="text" name="last_name" class="form-control">
						</div>
  					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="text">Password:</label>
   						<div class="col-sm-9"> 
   							<input type="password" name="password" class="form-control">
						</div>
  					</div>
  					<div class="form-group">
						<label class="control-label col-sm-3" for="text">Confirm Password:</label>
   						<div class="col-sm-9"> 
   							<input type="password" name="confirm_password" class="form-control">
						</div>
  					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-2 col-sm-10 text-right">
      						<button type="submit" class="btn btn-success">Register</button>
      					</div>
      					<a href="/login">Already have an account? Login here</a><br>
      					<div class="red">
      						<?=$this->session->flashdata('error')?>
      					</div>
    				</div>
    			</form>			
			</div>
		</div>
	</div>
</body>
</html>