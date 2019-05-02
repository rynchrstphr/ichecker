<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/navigation') ?>

  <!-- <h5>QR Code = <?php echo $qrCode; ?></h5> -->

  <?php

    if(!isset($_SESSION['mainUser']))
    {
      header("Location: ".base_url()."User/loadMainUI");
    }

  ?>
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h4>Document Information</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <?php foreach ($docuData as $d): ?>
            <hr>
            
            <div class="form-group row">
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">Student ID:</label>
                <h4><?php echo $d->studentid; ?></h4>
              </div>
              <div class="col-md-8 mb-3 mb-sm-0">
                <label for="">Date Post:</label>
                <h4><?php echo $d->date; ?></h4>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">First Name:</label>
                <h4><?php echo $d->fname; ?></h4>
              </div>
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">Last Name:</label>
                <h4><?php echo $d->lname; ?></h4>
              </div>
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">Middle Name:</label>
                <h4><?php echo $d->mname; ?></h4>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-md-5 mb-3 mb-sm-0">
                <label for="">College:</label>
                <?php foreach ($collegePost as $colPost): ?>
                  <h4><?php echo $colPost->collegename; ?></h4>
                <?php endforeach ?>
              </div>
              <div class="col-md-7 mb-3 mb-sm-0">
                <label for="">Course:</label>
                <?php foreach ($coursePost as $corPost): ?>
                  <h4><?php echo $corPost->coursename; ?></h4>
                <?php endforeach ?>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">Document Type:</label>
                <?php foreach ($documentTypePost as $docType): ?>
                  <h4><?php echo $docType->documenttype; ?></h4>
                <?php endforeach ?>
              </div>
            </div>
            <!-- <div class="form-group row">
              <div class="col-md-4 mb-3 mb-sm-0">
                <label for="">Upload Scanned Document</label>
                <input required type="file" name="userfile[]" id="img" multiple />
              </div>
            </div> -->
            <hr>
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
            <div class="form-group float-right row" style="margin-right: 1px;">
            </div>
          <?php endforeach ?>
          <hr>
          <a href="<?php echo base_url(); ?>User/loadMainUI" class="btn btn-sm btn-success float-right" style="margin-left: 5px; text-align: center">Done</a>
          
        </div>
      </div>
    </div>
    <br>
    <br>



   <!-- onclick="submitFormAddDocument();" -->
<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>

