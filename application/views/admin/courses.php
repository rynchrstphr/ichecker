<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

  if(!isset($_SESSION['user']))
  {
    header("Location: ".base_url()."Admin/main");
  }
?>
	<br>
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
					<h4>List of Courses</h4>
					<button class="btn btn-primary btn-sm" onclick="window.location.href='courseAdd'">Add A Course</button>
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
				<div class="col-md-5">
					<label for="">College:</label>
            <select id="collegeSelect" name="collegeid" class="form-control form-control" required>
              <option value="">-Select College to See Courses-</option>
              <?php foreach ($collegeData as $cld): ?>
                <option value="<?php echo $cld->id; ?>"><?php echo $cld->collegename; ?></option>
              <?php endforeach ?>
            </select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-2"></div>	
				<div class="col-md-8">
					<table class="table table-bordered table-sm" id="documentType">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">ID</th>
					      <th scope="col">Course Name</th>
					      <th scope="col" class="text-center">Action</th>
					    </tr>
					  </thead>
					  <tbody id="courseTbl">
					  </tbody>
					</table>
				</div>
			</div>
		</div>
		<br><br><br>


<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>