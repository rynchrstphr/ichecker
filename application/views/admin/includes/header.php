<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>iChecker | TUP Document Verification System</title>
    
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.min.css">
 
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   	
   	<style>
   		/* IE10+ CSS print styles */
			@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
			  /* IE10+ CSS print styles go here */
			  @page {
			    size: auto;   /* auto is the initial value */
			    size: A4 portrait;
			    margin: 0;  /* this affects the margin in the printer settings */
			    border: 1px solid red;  /* set a border for all printed pages */
			  }
			}
   	</style>

</head>
    <body onafterprint="redirectBack()">
