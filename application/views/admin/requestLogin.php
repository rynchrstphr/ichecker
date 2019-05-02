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
				<div class="col-md-1"></div>
				<div class="col-md-10">
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
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<h4>List of Login Request</h4>
					<!-- <button class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo base_url(); ?>Admin/documentTypeAdd'">Add Document Type</button> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<hr>
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>	
				<div class="col-md-10">
					<table class="table table-bordered" id="documentType">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">ID</th>
					      <th scope="col">Company Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Name</th>
					      <th scope="col">Contact No</th>
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($requestAcc as $ra): ?>
					  			<tr>
							      <td class="text-center"><?php echo $ra->id; ?></td>
							      <td><?php echo $ra->companyname; ?></td>
							      <td class="text-center"><?php echo $ra->email; ?></td>
							      <td><?php 
							      	$name = ucfirst($ra->fname) . ' ' . ucfirst($ra->lname);
							      	echo $name;
							      ?></td>
							      <td class="text-center"><?php echo $ra->contactnum; ?></td>
							      <td class="text-center">
							      	<!-- <button class="btn btn-sm btn-primary" onclick="document.userinput.submit()" name="editType">Edit</button> -->
							      	<form name="viewRequest" action="viewRequest" method="post">
								      	<input type="text" id="id" name="id" value="<?php echo $ra->id; ?>" hidden>
		    								<button id="update" type="submit" class="btn btn-sm btn-primary">View</button>
											</form>
							      </td>
							    </tr>
					  	<?php endforeach ?>
					  </tbody>
					</table>
				</div>
				<div class="col-md-1"></div>	
			</div>
		</div>



<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>