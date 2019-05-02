<?php 


try
{
  require_once APPPATH.'assets/PHPMailer/PHPMailerAutoload.php';
  require_once APPPATH.'assets/PHPMailer/class.phpmailer.php';
  require_once APPPATH.'assets/PHPMailer/class.smtp.php';
	
  foreach ($requestAcc as $d) 
  {
  	$id = $d->id;
  	$companyname = $d->companyname;
  	$email = $d->email;
  	$orgpass = $d->orgpass;
  	$name = ucfirst($d->fname) . ' ' . ucfirst($d->lname);
  	$position = $d->position;
  	$contactnum = $d->contactnum;
  	$address = $d->address;
  }

	$request = "Confirmed";

  $message = "Good Day, Your Request for Login has been " . $request . ". <br> " .
  						"User Information <br>" .
  						"Company Name: " . $companyname . "<br>" .
  						"Email: " . $email . "<br>" .
  						"Password: " . $orgpass . "<br>" .
  						"Contact Person: " . $name . "<br>" .
  						"Position: " . $position . "<br>" .
  						"Contact Number: " . $contactnum . "<br>" .
  						"Company Address: " . $address . "<br>" . 
  						"<br>" . 
  						"<br>" . 
  						"To Confirm Email Click <a href=".base_url() . 'User/userLogin' .">Here</a> ";

  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host ='smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username ='tupichecker@gmail.com';
  $mail->Password ='tupregistrar';
  $mail->SMTPSecure = 'ssl';
  
  $mail->Port = '465';
  $mail->isHTML();
  
  $mail->SetFrom('no-reply@iChecker.com');
  $mail->Subject = 'Login Request';
  $mail->Body= $message;
  $mail->AddAddress($mailed);

  $mail->Send();

  $_SESSION['message'] = "Login Request Confirmed Successfully";
  header('Location: '.base_url().'Admin/loginRequest');
}
catch (phpmailerException $e) 
{
  echo $e->errorMessage(); //error messages from PHPMailer
}
catch (Exception $e) 
{
  echo $e->getMessage();
}


?>