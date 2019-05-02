<?php $this->load->view('admin/includes/header') ?>
<?php $this->load->view('admin/includes/navigation') ?>

<?php

  if(!isset($_SESSION['user']))
  {
    header("Location: ".base_url()."Admin/main");
  }

?>

<div class="container" style="margin-top:15vh ">
	<div class="row">
		<div class="col-md-5" style="text-align: center;">
			<img src="<?php echo base_url(); ?>assets/Untitled.png">
		</div>
		<div class="col-md-6 text-left" style="margin-top: 15vh;">
			<div class="container">
				<h1>iChecker</h1>
				<h3>TUP REGISTRAR DOCUMENT VERIFICATION SYSTEM USING QR CODE</h3>
			</div>
		</div>
	</div>
</div>
<br><br><br><br>

<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>