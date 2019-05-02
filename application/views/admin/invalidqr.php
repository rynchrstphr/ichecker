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
  if($invalidQR == "0")
  {
  ?>

  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h5>Invalid QR Code</h5>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl= <?php echo $_SESSION['code']; ?> ">
        <br>
        <button class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Admin/updateDocuScan'">Scan Again</button>
      </div>
    </div>
  </div>

  <?php    
  }
  if($invalidQR == "1")
  {
  ?>

  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h5>QR Code Not Found</h5>
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl= <?php echo $_SESSION['code']; ?> ">
        <br>
        <button class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Admin/updateDocuScan'">Scan Again</button>
      </div>
    </div>
  </div>
  <?php } ?>

   <!-- onclick="submitFormAddDocument();" -->
<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>

