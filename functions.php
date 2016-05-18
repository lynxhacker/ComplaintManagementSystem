<?php
	function validate($data){
		$data = htmlspecialchars($data); 
		$data = stripslashes($data); 
		$data = trim($data); 
		return $data;
	}

	function db(){
		$host = "localhost"; 
		$user = "root"; 
		$password=""; 
		$dbname= "complaintsystem"; 

		//connect to the database
		$con = mysqli_connect($host, $user, $password, $dbname);
		if($con){
			return $con; 
		}
		else{
			return false;
		}
	}

	function sendMail($recipient, $subject, $message){
		require 'PHPMailer-master/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->Username = 'email@gmail.com';
		$mail->Password = '';
		$mail->setFrom('email@gmail.com');
		$mail->addAddress($recipient);
		$mail->Subject = $subject;
		$mail->Body = $message;
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "ERROR: " . $mail->ErrorInfo;
		} else {
		    echo "SUCCESS";
		}
	}
?>