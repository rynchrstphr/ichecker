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
					<h4>List of Document Type</h4>
					<button class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo base_url(); ?>Admin/documentTypeAdd'">Add Document Type</button>
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
					<table class="table table-bordered" id="documentType">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">ID</th>
					      <th scope="col">Document Type Name</th>
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php foreach ($dType as $dt): ?>
					  			<tr>
							      <td class="text-center"><?php echo $dt->id; ?></td>
							      <td><?php echo $dt->documenttype; ?></td>
							      <td class="text-center">
							      	<!-- <button class="btn btn-sm btn-primary" onclick="document.userinput.submit()" name="editType">Edit</button> -->
							      	<form name="updateDocType" action="documentTypeUpdate" method="post">
								      	<input type="text" id="id" name="id" value="<?php echo $dt->id; ?>" hidden>
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



<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>