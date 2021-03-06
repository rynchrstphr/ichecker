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
        <h3>Add A Course</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form name ="saveCourse" action="saveCourse" method="post">
          <label for="">College:</label>
          <select id="cSelect" name="collegeid" class="form-control form-control" required>
            <option value="">-Select College-</option>
            <?php foreach ($collegeData as $cld): ?>
              <option value="<?php echo $cld->id; ?>"><?php echo $cld->collegename; ?></option>
            <?php endforeach ?>
          </select>
          <br>
          <div class="form-group">
            <label for="">Course Name</label>
            <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Type in Course Name">
          </div>
          <button type="submit" class="btn btn-sm btn-success" name="save">Save</button>
          <a href="<?php echo base_url(); ?>Admin/courseList" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
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
              <div class="alert alert-danger" role="alert">
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
        <h3>Update A Course</h3>
      </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php foreach ($courseData as $cd): ?>
          <form name ="saveUpdateCourse" action="saveUpdateCourse" method="post">
            <label for="">College:</label>
            <select id="cSelect" name="collegeid" class="form-control form-control" required>
              <option value="">-Select College-</option>
              <?php foreach ($collegeData as $cld): ?>
                <option value="<?php echo $cld->id; ?>" <?php $q = $cd->collegeid; $w = $cld->id; if($q == $w){ echo "selected";} ?>><?php echo $cld->collegename; ?></option>
              <?php endforeach ?>
            </select>
            <br>
            <div class="form-group">
              <label for="">Course Name</label>
              <input type="text" name="courseid" value="<?php echo $cd->id; ?>" hidden>
              <input type="text" name="id" value="<?php echo $cd->id; ?>" hidden>
              <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Type in Course Name" value="<?php echo $cd->coursename; ?>">
            </div>
            <button type="submit" class="btn btn-sm btn-success" name="save">Save</button>
            <a href="<?php echo base_url(); ?>Admin/courseList" class="btn btn-sm btn-danger" style="margin-left: 5px;">Cancel</a>
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