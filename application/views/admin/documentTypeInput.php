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
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h3>Add Document Type</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form name ="documentTypeInput" action="saveDocumentType" method="post">
          <div class="form-group">
            <label for="">Document Type</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type in Document Type">
          </div>
          <button type="submit" class="btn btn-sm btn-success" name="save">Save</button>
          <a href="<?php echo base_url(); ?>Admin/documenttype" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
        </form>
      </div>
    </div>
  </div>
  <?php 
  } 
  ?>
  
  <?php 
  if($act == "Update")
  {
  ?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
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
      <div class="col text-center">
        <h3>Update Document Type</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php foreach ($docTypeInfo as $dt): ?>
          <form name ="documentTypeInput" action="saveUpdateDocumentType" method="post">
            <div class="form-group">
              <label for="">ID</label>
              <input type="text" class="form-control" id="id" name="id" value="<?php echo $dt->id; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Document Type</label>
              <input type="text" class="form-control" id="type1" name="type1" value="<?php echo $dt->documenttype; ?>" hidden>
              <input type="text" class="form-control" id="type" name="type" value="<?php echo $dt->documenttype; ?>" required placeholder="Type in Document Type">
            </div>
            <button type="submit" class="btn btn-sm btn-success" name="save">Save</button>
            <a href="<?php echo base_url(); ?>Admin/documenttype" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
          </form>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <?php 
  } 
  ?>
  


<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>