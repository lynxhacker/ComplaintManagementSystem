<?php
	include('includes/header.php'); 
?>
<content>
	<div id="processregistration">
		<article>
		<?php 
			if(isset($_POST['Reg']) && $_POST['Reg'] == 'REGISTER'){
				require('functions.php');
				//get data
				$fname = validate(mysqli_real_escape_string(db(), $_POST['fName']));
				$lname = validate(mysqli_real_escape_string(db(), $_POST['lName']));
				$regnumber = validate(mysqli_real_escape_string(db(), $_POST['regNumber']));
				$email = validate(mysqli_real_escape_string(db(), $_POST['eMail']));
				$password = validate(mysqli_real_escape_string(db(), $_POST['pswd']));
				$cpassword = validate(mysqli_real_escape_string(db(), $_POST['cPswd']));

				//validation
				if(strcmp($password, $cpassword)){
					echo "<span class='error'>Your passwords don't mactch</span>";
				}
				else{
					//encrypt password
					$password = sha1($cpassword);
				}
				//check if student exists
				$query = mysqli_query(db(), "SELECT * from student WHERE email = '$email'");
				if($query){
					if(mysqli_num_rows($query)>=1){
						echo "<script> 
							alert('Sorry, the user with the same e-mail address exists'); 
							window.location='register.php';
							</script>";
					}
					else{
						//register student
						$query = mysqli_query(db(), "INSERT INTO student (fname, lname, regno, email, password) VALUES('$fname', '$lname', '$regnumber', '$email', '$password')");
						if($query){
							$rec = $email; 
							$subject ="Complaint System registration!";
							$message ="Thank your for registering with us.  \n your input will be valuable!\n Regards!";
							//send a welcome e-mail to the student
							sendMail($rec, $subject, $message);
							echo "<script>
								alert('Thanks for registering!'); 
								window.location='index.php';
								</script>";
						}
						else{
							echo "<span class='error'>Something went wrong</span>";
						}
					}
				}

			}
		?>
	<article id="register">
		<form method="POST" id="myForm">
			<input required type="text" name="fName" maxlength =32 placeholder="First Name"><br><br>
			<input required type="text" name="lName" maxlength =32 placeholder="Last Name"><br><br>
			<input type="text" required name="regNumber" placeholder="abc-001-627/2011" maxlength =20><br><br>
			<input required type="email" name="eMail" placeholder="E-mail address"><br><br>
			<input required type="password" name="pswd" placeholder="Password"><br><br>
			<input required type="password" name="cPswd" placeholder="Confirm Password"><br><br>
			<input type="submit" name="Reg" value="REGISTER" onlick="validate()">
		</form>	
	</article>
	</div>
</content>
<?php
	include('includes/footer.php');
?>