<?php $this->load->view('includes/header') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">iChecker</a>
</nav>

<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<h4>Request Login</h4>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form id="requestLogin" name="<?php echo base_url(); ?>User/requestLogin" action="<?php echo base_url(); ?>User/userRequestLogin" method="post">
				<div class="form-group row">
					<div class="col-md-6 mb-4 mb-sm-0">
				    <label for="">Company Name</label>
				    <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name" required>
				  </div>
				  <div class="col-md-6 mb-4 mb-sm-0">
				    <label for="">Email address</label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
				  </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-lg-6 mb-4 mb-sm-0">
				    <label for="">Firstname</label>
				    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
				  </div>
				  <div class="col-lg-6 mb-4 mb-sm-0">
				    <label for="">Lastname</label>
				    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
				  </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-lg-6 mb-4 mb-sm-0">
				    <label for="">Position</label>
				    <input type="text" class="form-control" id="position" name="position" placeholder="Position" required>
				  </div>
				  <div class="col-lg-6 mb-4 mb-sm-0">
				    <label for="">Contact No.</label>
				    <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="Contact Number" required>
				  </div>
			  </div>
			  <div class="form-group row">
					<div class="col-md-12 mb-6 mb-sm-0">
				    <label for="">Company Address</label>
				    <input type="text" class="form-control" id="companyaddress" name="companyaddress" placeholder="Company Address" required>
				  </div>
			  </div>
			  <div class="form-group row">
			  	<div class="col-md-12 mb-6 mb-sm-0">
			  		<a href="<?php echo base_url();?>" class="btn btn-sm btn-danger float-right" style="margin-left: 5px;">Cancel</a>
				  	<button type="submit" class="btn btn-success btn-sm float-right	">Submit</button>
				  </div>
			  </div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
 
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
    
