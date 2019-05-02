<?php $this->load->view('admin/includes/header') ?>

  <!-- <h5>QR Code = <?php echo $qrCode; ?></h5> -->

  <?php

    if(!isset($_SESSION['user']))
    {
      header("Location: ".base_url()."Admin/main");
    }

  ?>

  <?php  
  if(isset($_SESSION['code']))
  {
    unset($_SESSION['code']);
  }
  $_SESSION['code'] = $qrCode;
  ?>

  <?php 

  if($invalidQR == "1")
  {
  ?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h5>Invalid QR Code</h5>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl= <?php echo $_SESSION['code']; ?>">
        <br>
        <button class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Admin/addDocuScan'">Scan Again</button>
        <a href="<?php echo base_url(); ?>admin" class="btn btn-sm btn-danger" style="margin-left: 5px; text-align: center">Cancel</a>
      </div>
    </div>
  </div>
  <?php
  } 
  if($invalidQR == "2")
  {
  ?>

  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h5>QR Code Already been Saved</h5>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl= <?php echo $_SESSION['code']; ?> ">
        <br>
        <button class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Admin/addDocuScan'">Scan Again</button>
        <a href="<?php echo base_url(); ?>admin" class="btn btn-sm btn-danger" style="margin-left: 5px; text-align: center">Cancel</a>
      </div>
    </div>
  </div>

  <?php
  }
  if($invalidQR == "0")
  {
  ?>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h4>Add: Student Document Information</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <form id="addDocumentForm" name="userinput" action="saveDocument" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Code:</label>
            <img src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl= <?php echo $_SESSION['code']; ?> ">
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Student ID:</label>
              <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Enter Student ID" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">First Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
            </div>
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Last Name:</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
            </div>
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Middle Name:</label>
              <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">College:</label>
              <select id="collegeSelect" name="collegeid" class="form-control form-control" required>
                <option value="">-Select College-</option>
                <?php foreach ($college as $collegeData): ?>
                  <option value="<?php echo $collegeData->id; ?>"><?php echo $collegeData->collegename; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-8 mb-3 mb-sm-0">
              <label for="">Course:</label>
              <select id="courseSelect" name="courseid" class="form-control form-control" required>
                <option value="">-Select Course-</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Document Type:</label>
              <select class="form-control form-control" name="documentid" required>
                <option>-Select Document Type-</option>
                 <?php foreach ($documentType as $docuType): ?>
                  <option value="<?php echo $docuType->id; ?>"><?php echo $docuType->documenttype; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Upload Scanned Document</label>
              <input required type="file" name="userfile[]" id="img" multiple/>
            </div>
          </div>
          <hr style="margin-top: 30px;">
          <div class="form-group float-right row" style="margin-right: 1px;">
            <button class="btn btn-sm btn-success" id="addDocumentBtn" type="submit" name="addDocument">Save</button>
            <a href="<?php echo base_url(); ?>admin" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
          </div>
        </form >
      </div>
    </div>
  </div>
  <br>

  <?php
  } 
  ?>

   <!-- onclick="submitFormAddDocument();" -->
<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>

