<?php $this->load->view('includes/header') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">iChecker</a>
</nav>
<?php

  if(isset($_SESSION['mainUser']))
  {
    header("Location: ".base_url()."User/loadMainUI");
  }

?>

<br><br>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
				if(isset($_SESSION['message']))
				{
				?>
					<div class="alert alert-danger" role="alert">
	        	<?php
	        	 $message =  $_SESSION['message']; 
	        	 echo $message;
	        	 unset($_SESSION['message']);
	        	?>
	      	</div>
				<?php
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="border:1px solid #BDBDBD; padding:30px; border-radius: 10px;">
			<h4 class="text-center">Login</h4>
			<br>
			<form method="post" name="userLogin" action="<?php echo base_url(); ?>User/userVerifyLogin">
			  <div class="form-group">
			    <label for="">Email address</label>
			    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			  </div>
			  <button type="submit" class="btn btn-primary btn-block">Submit</button>
			  <hr>
			  <div class="form-group text-center">
			  	<p>Don't have an account yet? <a href="<?php echo base_url(); ?>User/userRequest">Request Login</a></p>
			  </div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>  
 
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
    
