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

  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h4>Update: Student Document Information</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <?php foreach ($docuData as $d): ?>
          <form id="saveUpdateDocumentForm" name="userinput" action="saveUpdateDocument" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Code:</label>
            <img src="https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl= <?php echo $_SESSION['code']; ?>" href="">
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Student ID:</label>
              <input type="text" class="form-control" id="studentid" name="studentid" placeholder="Enter Student ID" value="<?php echo $d->studentid; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">First Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required value="<?php echo $d->fname; ?>">
            </div>
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Last Name:</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required value="<?php echo $d->lname; ?>">
            </div>
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Middle Name:</label>
              <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter Middle Name" required value="<?php echo $d->mname; ?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">College:</label>
              <select id="collegeSelect" name="collegeid" class="form-control form-control" required>
                <option value="">-Select College-</option>
                <?php foreach ($college as $collegeData): ?>
                  <option value="<?php echo $collegeData->id; ?>" <?php if(($collegeData->id) == ($d->collegeid)){echo "selected";} ?>><?php echo $collegeData->collegename; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-md-8 mb-3 mb-sm-0">
              <label for="">Course:</label>
              <select id="courseSelect" name="courseid" class="form-control form-control" required>
                <option value="">-Select Course-</option>
                 <?php foreach ($coursePost as $cPost): ?>
                  <option value="<?php echo $cPost->id; ?>" <?php if(($cPost->id) == ($d->collegeid)){echo "selected";} ?>><?php echo $cPost->coursename; ?></option>
                  <!-- <option value="<?php echo $cPost->id; ?>"><?php echo $cPost->coursename; ?></option> -->
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Document Type:</label>
              <select class="form-control form-control" name="documentid" required>
                <option>-Select Document Type-</option>
                 <?php foreach ($documentType as $docuType): ?>
                  <option value="<?php echo $docuType->id; ?>"<?php if(($docuType->id) == ($d->documentid)){echo "selected";} ?>><?php echo $docuType->documenttype; ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <label for="">Upload Scanned Document</label>
              <input type="file" name="userfile[]" id="img" multiple />
            </div>
          </div>
          <div class="form-group row">  
            <div class="col">
              <p>Current Images</p>
            </div>
          </div>
          <div class="form-group row">
            
            <?php 

                $images = array();
                $images = explode(',', $d->image);
                $count = sizeof($images);
                
                for($i = 0; $i < $count; $i++)
                {
                ?>
                  <div class="col-sm-4">
                    <figure class="figure">
                      <img style="width:150px;" src="<?php echo base_url(); ?>assets/uploads/<?php echo $images[$i]; ?>"> 
                      <figcaption class="figure-caption text-center"><?php echo $images[$i]; ?></figcaption>
                    </figure>
                  </div>
                <?php
                }

              ?>
          </div>
          <hr style="margin-top: 30px;">
          <div class="form-group float-right row" style="margin-right: 1px;">
            <button class="btn btn-sm btn-success" id="addDocumentBtn" type="submit" name="addDocument">Save</button>
            <a href="<?php echo base_url(); ?>admin" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
          </div>
        </form >
          <?php endforeach ?>
      </div>
    </div>
  </div>
  <br>

   <!-- onclick="submitFormAddDocument();" -->
<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>

