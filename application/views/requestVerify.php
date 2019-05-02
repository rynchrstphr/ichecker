<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/navigation') ?>

<?php 

	if(isset($_SESSION['message']))
	{
		$message = $_SESSION['message'];
	}
	else
	{
		header("Location: ".base_url().'User/login');
	}

?>
	
	<?php 

	$_SESSION['message'] = "Request for Login Details have been submitted. Please wait for your confirmation email after we verify the information you submitted.";

	?>

	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php 
				if(isset($_SESSION['message']))
				{
				?>
					<div class="alert alert-success" role="alert">
			    	<?php
			    	 $message =  $_SESSION['message']; 
			    	 echo $message;
			    	 unset($_SESSION['message']);
			    	?>
			  	</div>
			  	<a href="<?php echo base_url();?>" class="btn btn-sm btn-success float-right" style="margin-left: 5px;">Done</a>
				<?php
				}
			?>
			</div>
		</div>	
	</div>
		
 
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
    
