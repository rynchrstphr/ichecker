<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

  if(!isset($_SESSION['user']))
  {
    header("Location: ".base_url()."Admin/main");
  }

?>

  <?php 
  if($act == "View")
  {
  ?>
  <br><br>
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
      <div class="col text-center">
        <h3>Login Request Information</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <?php foreach ($requestAcc as $ra): ?>
            <hr>
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
            <hr>
            <form name="requestAction" action="requestAction" method="post">
              <input type="text" name="id" value="<?php echo $ra->id; ?>" hidden>
              <input type="text" name="comname" value="<?php echo strtolower($ra->companyname); ?>" hidden><input type="text" name="email" value="<?php echo $ra->email; ?>" hidden>
              <button class="btn btn-sm btn-danger float-right" type="submit" name="actionForRequest" style="margin-left: 5px;" value="decline" onclick="return confirm('Decline Request?');">Decline</button>
              <button class="btn btn-sm btn-success float-right" type="submit" name="actionForRequest" style="margin-left: 5px;" value="accept" onclick="return confirm('Accept Request?');">Accept</button>
              <a href="<?php echo base_url(); ?>Admin/loginRequest" class="btn btn-sm btn-primary float-left" style="margin-left: 5px; text-align: center">Back</a>
            </form>
          <?php endforeach ?>
        </div>
    </div>
  </div>
  <br>
  <?php 
  } 
  ?>
  
  <?php 
 if($act == "mainUser")
  {
  ?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <h3>User Information</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-2"></div>
      <div class="col-md-8">
          <?php foreach ($user as $ra): ?>
            <hr>
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
                <label for="">Company Addressd</label>
                <h5><?php echo $ra->address; ?></h5>
              </div>
              <div class="col-md-6 mb-3 mb-sm-0">
                <label for="">Last Logged In</label>
                <h5><?php echo $ra->lastloggedin; ?></h5>
              </div>
            </div>
            <hr>
            <form name="statusAction" action="statusAction" method="post">
              <?php 
                $status = $ra->status;
                if($status == "inactive")
                {
                ?>
                <input type="text" name="stat" value="deactive" hidden>
                <input type="text" name="id" value="<?php echo $ra->id; ?>" hidden>
                <input type="text" name="comname" value="<?php echo strtolower($ra->companyname); ?>" hidden><input type="text" name="email" value="<?php echo $ra->email; ?>" hidden>
                <button class="btn btn-sm btn-success float-right" type="submit" name="actionForRequest" style="margin-left: 5px;" value="accept" onclick="return confirm('Activate Account?');">Activate</button>
                <a href="<?php echo base_url(); ?>Admin/mainuserList" class="btn btn-sm btn-primary float-left" style="margin-left: 5px; text-align: center">Back</a>
                <?php     
                }
                else
                {
                ?>
                <input type="text" name="stat" value="active" hidden>
                <input type="text" name="id" value="<?php echo $ra->id; ?>" hidden>
                <input type="text" name="comname" value="<?php echo strtolower($ra->companyname); ?>" hidden><input type="text" name="email" value="<?php echo $ra->email; ?>" hidden>
                <button class="btn btn-sm btn-danger float-right" type="submit" name="actionForRequest" style="margin-left: 5px;" value="accept" onclick="return confirm('Deactive Account?');">Deactive</button>
                <a href="<?php echo base_url(); ?>Admin/mainuserList" class="btn btn-sm btn-primary float-left" style="margin-left: 5px; text-align: center">Back</a>
                <?php
                }
              ?>
              
            </form>
          <?php endforeach ?>
        </div>
    </div>
  </div>
  <br>
  <?php 
  } 
  ?>
  


<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>