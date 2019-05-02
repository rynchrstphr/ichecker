<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url(); ?>User/loadMainUI">iChecker</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if(isset($_SESSION['mainUser']))
      {
        ?>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>User/loadMainUI">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>User/userVerifyScan">Verify Document</a>
      </li>
    </ul>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucfirst($_SESSION['mainUser']); ?>
          </a>
          <div class="dropdown-menu float-left" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>User/userLogout" onclick="return confirm('Are you sure to logout?');">Logout</a>
          </div>
        </li>
      </ul>
        <?php
      } 
      else
      {
      ?> 
      <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li> -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>User/userLogin">Login</a>
        </li>
      </ul>
      <?php
      }
      ?>
  </div>
</nav>


<!-- <li class="nav-item">
        <a class="nav-link"IChecker/addDocuScan">Add Document</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"IChecker/updateDocuScan">Update Document</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"IChecker/viewGenerateQr">Generate Code</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"IChecker/verifyScanDocu">Verify Document</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->