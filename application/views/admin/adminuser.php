<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

  if(!isset($_SESSION['user']))
  {
    header("Location: ".base_url()."Admin/main");
  }

?>

		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
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
						<?php
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<h4>List of Users | Employee</h4>
					<button class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo base_url(); ?>Admin/addAdminUser'">Add New User</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>	
				<div class="col-md-8">
					<table class="table table-bordered " id="documentType">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">ID</th>
					      <th scope="col">Employee ID</th>
					      <th scope="col">Employee Name</th>
					      <th scope="col">Status</th>
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($adminUserData as $adU): ?>
					  			<tr>
							      <td class="text-center"><?php echo $adU->id; ?></td>
							      <td><?php echo $adU->employeeid; ?></td>
							      <td><?php
							      	$name = ucfirst($adU->fname).' '.ucfirst($adU->lname);
							      	echo $name;
							      ?></td>
							      <td class="text-center">
							      	<?php 
							      		$status = $adU->status; 
							      		if($status == "active")
							      		{
							      			echo '<span class="badge badge-success">Active</span>';
							      		}
							      		else
							      		{
							      			echo '<span class="badge badge-danger">Inactive</span>';
							      		}
							      	?>
							      		
							      </td>	
							      <td class="text-center">
							      	<!-- <button class="btn btn-sm btn-primary" onclick="document.userinput.submit()" name="editType">Edit</button> -->
							      	<form name="updateAdminUser" action="updateAdminUser" method="post">
								      	<input type="text" id="id" name="id" value="<?php echo $adU->id; ?>" hidden>
		    								<button id="update" type="submit" class="btn btn-sm btn-primary">Edit</button>
											</form>
							      </td>
							    </tr>
					  	<?php endforeach ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
		<br><br>


<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>