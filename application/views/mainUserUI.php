<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/navigation') ?>

<?php

  if(!isset($_SESSION['mainUser']))
  {
    header("Location: ".base_url()."User/userHome");
  }

?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<?php foreach ($info as $ra): ?>
				<div class="form-group row">
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Company Name</label>
            <h5><?php echo $ra->companyname; ?></h5>
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Contact Information</label>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Contact Person</label>
            <h5><?php 

            $name = ucfirst($ra->fname) . ' ' . ucfirst($ra->lname);
            echo $name;

            ?></h5>
          </div>
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Position</label>
            <h5><?php echo $ra->position; ?></h5>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Email</label>
            <h5><?php echo $ra->email; ?></h5>
          </div>
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Contact No</label>
            <h5><?php echo $ra->contactnum; ?></h5>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6 mb-3 mb-sm-0">
            <label for="">Company Address</label>
            <h5><?php echo $ra->address; ?></h5>
          </div>
        </div>				
			<?php endforeach ?>			
		</div>
    <div class="col-md-1"></div>
		<div class="col-md-6">
			<div class="row">
        <label for="">List of Scanned Document</label>
        <hr>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered" id="documentType">
            <thead>
              <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Document Type</th>
                <th scope="col" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($scannedDocu as $ra): ?>
                
                  <tr>
                    <td><?php echo $ra->docuid; ?></td>
                    <td><?php echo $ra->name; ?></td>
                    <td><?php echo $ra->documenttype; ?></td>
                    <td>
                      <form method="post" action="<?php echo base_url(); ?>User/viewScanned">
                        <input type="text" name="id" hidden value="<?php echo $ra->docuid; ?>">
                        <button class="btn btn-sm btn-primary" type="submit">View</button>
                      </form>
                    </td>
                  </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>  
      </div>
		</div>
	</div>
</div>
<br>
<br>
 
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
    
