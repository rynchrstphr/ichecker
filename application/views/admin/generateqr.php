<?php $this->load->view('admin/includes/header') ?>

<?php

$startingQr = "";
// foreach ($data as $row)
// {
// 	$startingQr = $row->AI;
// }

// $endingQr = $startingQr + 71;

// for($i = $startingQr; $i <= $endingQr; $i++)
// {F

	$qrcodes = array();
	
	foreach ($data as $i) 
	{
		$code = '<center><img src="https://chart.googleapis.com/chart?chs=130x130&cht=qr&chl='.$i->code.'" title="Link to Google.com"></center>';
		array_push($qrcodes,$code);		
	}
// }
?>
<div id="printthis" class="container">
	<br>
	<div class="row">
		<div class="col-lg-2 text-right">
		</div>
		<div class="col-lg-8 text-center">
			<h2>QR CODES</h2>
		</div>
		<div class="col-lg-1 text-right">
			<button style="margin:auto; display: block; padding-top: 10px;" class="btn btn-sm btn-default" onclick="printDiv()">PRINT</button>
			<br>
		</div>
		<div class="col-lg-1 text-right">
		</div>
	</div>
	<div class="row" style="width: 960px; margin:auto;">
	<?php
	for($i = 0; $i <= 55; $i++)
	{
	?>

			<div class="col-xs-1" style="outline:1px solid black;">
				<?php echo $qrcodes[$i]; ?>
			</div>
		
	<?php
	}
	?>
	</div>

</div>
<br>


<?php $this->load->view('admin/includes/scripts') ?>
<?php $this->load->view('admin/includes/footer') ?>
