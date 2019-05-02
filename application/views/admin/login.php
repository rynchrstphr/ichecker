<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

	if(isset($_SESSION['user']))
	{
		header("Location: ".base_url()."Admin/dashboard");
	}

?>

	<style>
		.adminLogin
		{
		  padding: 30px; 
		  width: 30vw; 
		  border-radius: 10px; 
		  /*background-color: #F8F9FA;*/
		  /*box-shadow: 10px 10px 20px grey;*/
		 	border:1px solid #E1E1E1;
		}
	</style>
	<br><br><br>
	<div class="container adminLogin">
		<?php 

			if(isset($message))
			{
			?>
				<div class="alert alert-danger" role="alert">
			  	<?php echo $message; ?>
				</div>
			<?php
			}

		?>
		<div class="row">
			<div class="col">
				<h4 class="text-center">Login | Admin</h4>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form id="adminLoginForm" name="adminLogin" action="<?php echo base_url(); ?>Admin/login" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Type in Username" required>
				    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Type in Password" required>
				  </div>
				  <button type="submit" class="btn btn-primary btn-block">Submit</button>
				</form>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>