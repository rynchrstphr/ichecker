<?php $this->load->view('admin/includes/header') ?>
  
  <!-- <button style="margin:auto; display: block;" class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>IChecker/viewGenerateQr';">Generate QR Code</button> -->

  <?php

    if(!isset($_SESSION['user']))
    {
      header("Location: ".base_url()."Admin/main");
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
        <a href="<?php echo base_url(); ?>admin" class="btn btn-sm btn-danger" style="margin-left: 5px; text-align: center">Cancel</a>
      </div>
    </div>
  </div>

  <div style="margin:auto; display: block; height: 300px; width: 75vw;">
    <br>
    <form name ="userinput" action="verifyDocument" method="post">
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
  <!-- <script type="text/javascript">
    function scanFunction() 
    {
      var x = document.getElementById("preview");
      if (x.style.display === "none") 
      {
        x.style.display = "block";
        
      } 
      else 
      {
        x.style.display = "none";
        scanner.stop(selectedCam);
      }
    }
  </script> -->
<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>
    
<!-- <!DOCTYPE html>
<html>
<head>
    <title>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
  
    <h1>JQuery HTML5 QR Code Scanner using Instascan JS Example - ItSolutionStuff.com</h1>
    
    <video id="preview"></video>
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        alert(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
   
</body>
</html> -->

  <!-- 
  <br>
  <button style="margin:auto; display: block;" class="btn btn-sm btn-primary" onclick="window.location.href='<?php echo base_url(); ?>IChecker/viewGenerateQr';">Generate QR Code</button>
  <br>
  <button style="margin:auto; display: block;" class="btn btn-sm btn-primary" onclick="scanFunction()" placeholder="Scan">Scan Qr</button>
  <br> -->