<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>

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
				        	<li><a href="/login">LogIn</a></li>
				    	</ul>
				    </div>
	    		</div>
	  		</div>
		</nav>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<h2>Login</h2>
				<form class="form-horizontal" action="/LoginUser" role="form" method="post">
					<div class="form-group">
						<label class="control-label col-sm-3" for="text">Email:</label>
   						<div class="col-sm-9">
   							<input type="email" name="email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="text">Password:</label>
   						<div class="col-sm-9"> 
   							<input type="password" name="password" class="form-control">
						</div>
  					</div>
  					<div class="form-group"> 
    					<div class="col-sm-offset-2 col-sm-10 text-right">
      						<button type="submit" class="btn btn-success">Login</button>
      					</div>
      					<a href="/Register">Don't have an account? Register here</a>
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