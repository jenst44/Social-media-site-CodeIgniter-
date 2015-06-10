<?php 
if(empty($this->session->userdata('id')))
{
	session_destroy();
	redirect('/');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$user['first_name']." ".$user['last_name']?>'s profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			padding-bottom: 50px;
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

		.red {
			color:red;
		}

		.messageBox 
		{
			padding: 20px 40px;
			border: 1px solid silver;
			border-radius: 5px;
			margin-top: 50px;
			background-color: #2B679B;
			color: white;
		}

		span {
			font-size: 15px;
		}

		.commentInput {
			margin-top: 40px;
		}

		.commentBox {
			border: 1px solid silver;
			border-radius: 5px;
			padding:10px 20px;
			margin-top: 10px;
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
			<div class="col-md-8">
				<h3></h3>
				<p><strong>Registered at:</strong> <?=$user['created_at']?></p>
				<p><strong>User ID:</strong> <?=$user['id']?></p>
				<p><strong>Email Address:</strong> <?=$user['email']?></p>
				<p><strong>Description:</strong> <?=$user['description']?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h2>Leave a message for <?=$user['first_name']." ".$user['last_name']?></h2>
				<form class="form-horizontal" action="/CreateMessage/<?=$user['id']?>" role="form" method="post">
					<div class="form-group">
						<textarea name="message"></textarea>
					</div>
						<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10 text-right">
								<button type="submit" class="btn btn-primary">Post</button>
							</div>
						<div class="red"><?=$this->session->flashdata('error')?></div>
					</div>
		    	</form>	
			</div>
		</div>
		<?php $i=0;
		foreach ($messages as $message) { ?>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 messageBox">
				<div class="row">
					<div class="col-md-10">
						<h4><?=$message['full_name']?> - <span><?=$message['created_at']?></span></h4>
						<p><?=$message['content']?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<?php 
						if(!empty($comments[$i]))
						{
						foreach ($comments[$i] as $comment) { ?>
							<div class="row commentBox">
								<div class="col-10">
									<h4><?=$comment['full_name']?> - <?=$comment['created_at']?></h4>
									<p><?=$comment['content']?></p>
								</div>
							</div>
						<?php } $i++; }?>
					</div>
				</div>
				<div class="row commentInput">
					<div class="col-md-4"></div>
					<div class="col-md-8">
						<form class="form-horizontal" action="/Message/<?=$user['id']?>/<?=$message['id']?>" role="form" method="post">
							<div class="form-group">
								<label class="control-label col-sm-3" for="text">Comment:</label>
   								<div class="col-sm-9">
   									<input type="text" name="comment" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10 text-right">
      								<button type="submit" class="btn btn-success">Comment</button>
      							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</body>
</html>