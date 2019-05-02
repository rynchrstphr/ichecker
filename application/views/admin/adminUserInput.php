<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

  if(!isset($_SESSION['user']))
  {
    header("Location: ".base_url()."Admin/main");
  }

?>

<?php
	if($act == "Add")
	{
	?>

	<br>
	<br>
	<div class="container">
		<div class="row">
	    <div class="col-md-2"></div>
	    <div class="col-md-8">
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
	    <div class="col text-center">
	      <h4>Add A New Employee User</h4>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-md-4">
	    </div>
	    <div class="col-md-4">
	      <form id="saveAdminUser" name="saveAdminUser" action="saveAdminUser" method="post">
	        <div class="form-group row">
	          <div class="col-md-12 mb-6 mb-sm-0">
	          	<?php foreach ($empId as $i): ?>
	          		<label for="">Employee ID</label>
	            	<input type="text" class="form-control" id="employeeid" name="employeeid" placeholder="Enter Employee" required readonly value="<?php echo $i->AI; ?>">
	          	<?php endforeach ?>
	          </div>
	        </div>
	        <div class="form-group row">
	          <div class="col-md-12 mb-6 mb-sm-0">
	            <label for="">First Name</label>
	            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
	          </div>
	          <div class="col-md-12 mb-6 mb-sm-0">
	            <label for="">Last Name</label>
	            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
	          </div>
	        </div>
		      <div class="form-group row">
		        <div class="col-md-12 mb-6 mb-sm-0">
		          <label for="">Username</label>
		          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
		        </div>
		      </div>
		      <div class="form-group row">
	          <div class="col-md-12 mb-6 mb-sm-0">
	            <label for="">Password</label>
	            <input type="Password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
	          </div>
	          <!-- <div class="col-md-6 mb-3 mb-sm-0">
	            <label for="">Confirm Password</label>
	            <input type="password" class="form-control" id="password1" name="password1" placeholder="Confirm Password" required>
	          </div> -->
	        </div>
		      <div class="form-group row">
	          <div class="col-md-12 mb-6 mb-sm-0">
	            <label for="">User Level</label>
	            <select id="userlevel" name="userlevel" class="form-control form-control" required>
	              <option value="">-Select User Level-</option>
	              <?php foreach ($userLevel as $l): ?>
	                <option value="<?php echo $l->id; ?>"><?php echo $l->userlevel; ?></option>
	              <?php endforeach ?>
	            </select>
	          </div>
	        </div>
	        <hr style="margin-top: 30px;">
	        <div class="form-group float-right row" style="margin-right: 1px;">
	          <button class="btn btn-sm btn-success" id="saveAdminUserData" type="submit" name="saveAdminUserData">Save</button>
	          <a href="<?php echo base_url(); ?>admin/adminuserList" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
	        </div>
	      </form >
	    </div>
	  </div>
	</div>
	<br>

	<?php
	}
?>

<?php
	if($act == "Update")
	{
	?>

	<br>
	<br>
	<div class="container">
		<div class="row">
	    <div class="col-md-2"></div>
	    <div class="col-md-8">
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
	    <div class="col text-center">
	      <h4>Update Employee Details</h4>
	    </div>
	  </div>
	  <br>
	  <div class="row">
	    <div class="col-md-4">
	    </div>
	    <div class="col-md-4">
	      <?php foreach ($adminUserInfo as $info): ?>
	      	<form id="saveUpdateAdminUser" name="saveUpdateAdminUser" action="saveUpdateAdminUser" method="post">
		        <div class="form-group row">
		          <div class="col-md-12 mb-3 mb-sm-0">
		          	<input type="text" name="id" value="<?php echo $info->id; ?>" hidden> 
	          		<label for="">Employee ID</label>
	            	<input type="text" class="form-control" id="empid" name="empid" placeholder="Enter Employee" required readonly value="<?php echo $info->employeeid; ?>">
		          </div>
		        </div>
		        <div class="form-group row">
		          <div class="col-md-12 mb-6 mb-sm-0">
		            <label for="">First Name</label>
		            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required value="<?php echo $info->fname; ?>">
		          </div>
		        </div>
		        <div class="form-group row">
		        	<div class="col-md-12 mb-6 mb-sm-0">
		            <label for="">Last Name</label>
		            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required value="<?php echo $info->lname; ?>">
		          </div>
		        </div>
			      <div class="form-group row">
			        <div class="col-md-12 mb-6 mb-sm-0">
			          <label for="">Username</label>
			          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required value="<?php echo $info->username; ?>">
			        </div>
			      </div>
			      <div class="form-group row">
		          <div class="col-md-12 mb-6 mb-sm-0">
		            <label for="">Password</label>
		            <input type="Password" class="form-control" id="password" name="password" placeholder="Enter Password">
		          </div>
		          <!-- <div class="col-md-6 mb-3 mb-sm-0">
		            <label for="">Confirm Password</label>
		            <input type="password" class="form-control" id="password1" name="password1" placeholder="Confirm Password" required>
		          </div> -->
		        </div>
			      <div class="form-group row">
		          <div class="col-md-12 mb-6 mb-sm-0">
		            <label for="">User Level</label>
		            <select id="userlevel" name="userlevel" class="form-control form-control" required>
		              <option value="">-Select User Level-</option>
		              <?php foreach ($userLevel as $l): ?>
		                <option value="<?php echo $l->id; ?>" <?php if($l->id == $info->level){echo 'selected';} ?>><?php echo $l->userlevel; ?></option>
		              <?php endforeach ?>
		            </select>
		          </div>
		        </div>
		        <hr style="margin-top: 30px;">
		        <div class="form-group float-right row" style="margin-right: 1px;">
		        	<button class="btn btn-sm btn-success" id="saveAdminUserData" type="submit" name="saveAdminUserData">Save</button>
		        	<?php 

		        		if($info->status == "inactive")
		        		{
		        		?>
		        			<input type="text" name="stat" value="active" hidden>
		        			<button class="btn btn-sm btn-success" type="submit" name="actionForRequest" style="margin-left: 5px;" value="activate" onclick="return confirm('Activate Account?');">Activate</button>
		        		<?php
		        		}
		        		else
		        		{
		        		?>
		        			<input type="text" name="stat" value="inactive">
		        			<button class="btn btn-sm btn-danger" type="submit" name="actionForRequest" style="margin-left: 5px;" value="deactivate" onclick="return confirm('Deactivate Account?');">Deactivate</button>
		        		<?php
		        		}

		        	?>
		          <a href="<?php echo base_url(); ?>admin/adminuserList" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
		        </div>
		      </form>
	      <?php endforeach ?>
	    </div>
	  </div>
	</div>
	<br>
	
	<?php
	}
?>

<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>