<?php 
if(empty($this->session->userdata('user_level')) || $this->session->userdata('user_level') !== 'Normal')
{
	session_destroy();
	redirect('/');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>

	.vcenter {
		margin-top: 15px;
	}

	.editBox {
		margin-top: 60px;
	}

	.red {
		color: red;
		margin-left: 60px;
	}
	
	textarea {
		width: 100%;
		height: 100px;
		max-height: 100px;
		max-width: 100%;
		border-radius: 5px;
		padding: 10px;
		border:1px solid silver;
	}

	.green {
		color:green;
		margin-left: 60px;
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
			<div class="col-md-2"></div>
			<div class="col-md-7">
				<h2>Edit Profile</h2>
			</div>
			<div class="col-md-2">
				<a href="/users/dashboard/admin" class="btn btn-primary vcenter">Return to Dashboard</a>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row editBox">
					<div class="col-md-6">
						<fieldset>
							<legend>Edit Information</legend>
							<form class="form-horizontal" action="/EditUserProfile/<?=$user['id']?>" role="form" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="text">Email Address:</label>
									<div class="col-sm-9">
										<input type="email" name="email" value="<?=$user['email']?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="text">First Name:</label>
									<div class="col-sm-9"> 
										<input type="text" name="first_name" value="<?=$user['first_name']?>" class="form-control">
									</div>
  								</div>
  								<div class="form-group">
									<label class="control-label col-sm-3" for="text">Last Name:</label>
									<div class="col-sm-9"> 
										<input type="text" name="last_name" value="<?=$user['last_name']?>" class="form-control">
									</div>
  								</div>
  								<div class="form-group">
									<input type="hidden" name="user_Level" value="Normal">
  								</div>
  								<div class="form-group"> 
    								<div class="col-sm-offset-2 col-sm-10 text-right">
      									<button type="submit" class="btn btn-success">Save</button>
      								</div>
      							<div class="red">
      								<?=$this->session->flashdata('editError')?>
      							</div>
      							<div class="green">
      								<?=$this->session->flashdata('editSuccess')?>
      							</div>
    							</div>
    						</form>			
						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset>
							<legend>Change Password</legend>
							<form class="form-horizontal" action="/EditChangePassword/<?=$user['id']?>" role="form" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="text">Password:</label>
									<div class="col-sm-9">
										<input type="password" name="password" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="text">Password Confirmation:</label>
									<div class="col-sm-9"> 
										<input type="password" name="confirm_password" class="form-control">
									</div>
  								</div>
  								<div class="form-group"> 
    								<div class="col-sm-offset-2 col-sm-10 text-right">
      									<button type="submit" class="btn btn-success">Update Password</button>
      								</div>
      							<div class="green">
      								<?=$this->session->flashdata('editSuccess2')?>
      							</div>
      							<div class="red">
      								<?=$this->session->flashdata('editError2')?>
      							</div>
    							</div>
    						</form>			
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<fieldset>
					<legend>Edit Description</legend>
					<div class="row">
						<div class="col-md-12">
							<form class="form-horizontal" action="/EditDescription/<?=$user['id']?>" role="form" method="post">
								<div class="form-group">
									<textarea name="description"><?=$user['description']?></textarea>
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10 text-right">
											<button type="submit" class="btn btn-success">Save</button>
										</div>
										<div class="green">
      										<?=$this->session->flashdata('editSuccess3')?>
      									</div>
      									<div class="red">
      										<?=$this->session->flashdata('editError3')?>
      									</div>
      								</div>
								</div>
		    				</form>	
		    			</div>
	    			</div>		
				</fieldset>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>