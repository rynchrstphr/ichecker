<?php $this->load->view('includes/header') ?>
<?php $this->load->view('includes/navigation') ?>
  <?php

    if(!isset($_SESSION['mainUser']))
    {
      header("Location: ".base_url()."User/main");
    }

  ?>


  <?php unset($_SESSION['code']); ?>  
  <!-- <div class="container">
    <br>
    <h4 class="text-center">Scan QR Code to Verify</h4>
    <div class="row d-flex justify-content-center">
      <video id="preview" class="col-md-6">
      </video>
    </div>
  </div> -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <br>
        <h4 class="text-center">Scan QR Code to Verify Document</h4>
        <div class="row d-flex justify-content-center">
          <video id="preview" class="col-md-6">
          </video>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <a href="<?php echo base_url(); ?>User/loadMainUI" class="btn btn-sm btn-danger" style="margin-left: 5px; text-align: center">Cancel</a>
      </div>
    </div>
  </div>

  <div style="margin:auto; display: block; height: 300px; width: 75vw;">
    <br>
    <form name ="userinput" action="<?php echo base_url(); ?>User/verifyDocuScan" method="post">
      <h2><input type="text" id="cont" name="code" value="" hidden></h2>
      <button id="find" type="submit" name="find_docu" hidden>Find</button>
    </form>
  </div>

  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
        scanner.addListener('scan', function (content) 
        {
          $("#cont").val(content);
          document.getElementById("find").click();
        });
        Instascan.Camera.getCameras().then(function (cameras) 
        {
          if (cameras.length > 0) {
              var selectedCam = cameras[0];
              $.each(cameras, (i, c) => {
                  if (c.name.indexOf('back') != -1) {
                      selectedCam = c;
                      return false;
                  }
              });

              scanner.start(selectedCam);
              scanner.stop(selectedCam);
          } else {
              console.error('No cameras found.');
          }
        }).catch(function (e) 
        {
          console.error(e);
        });
  </script>
 
<?php $this->load->view('includes/scripts') ?>
<?php $this->load->view('includes/footer') ?>
