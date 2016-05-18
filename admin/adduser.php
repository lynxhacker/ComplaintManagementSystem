<?php
	include('../includes/header.php');
	if(!isset($_SESSION['admin'])){
		header('location: ../index.php');
	} 
?>
<content>
	<div id="process_register">
		<?php 
			if(isset($_POST['Reg']) && $_POST['Reg'] == 'REGISTER'){
				require('../functions.php');
				//get data
				$fname = validate(mysqli_real_escape_string(db(), $_POST['fName']));
				$lname = validate(mysqli_real_escape_string(db(), $_POST['lName']));
				$email = validate(mysqli_real_escape_string(db(), $_POST['eMail']));
				$type = $_POST['type'];
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
				//add account
				switch ($type) {
					case 'dean':
						$query = mysqli_query(db(), "INSERT INTO dean (fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')");
						if($query){
							/*$rec = $email; 
							$subject ="Complaint System registration!";
							$message ="You have been registered with us.  \n your input will be valuable!\n Regards!";
							//send a welcome e-mail to the student
							sendMail($rec, $subject, $message);
							*/
							echo "
								<script>
									alter('User added successfully');
									window.location = 'index.php'; 
								</script>";
						}
						else{
							echo "<script>
									alter('Something went wrong while adding user!');
									window.location = 'adduser.php'; 
								</script>";
						}
						break;
					case 'dvc':
						$query = mysqli_query(db(), "INSERT INTO dvc (fname, lname, email, password) VALUES('$fname', '$lname', '$email', '$password')");
						if($query){
							$rec = $email; 
							$subject ="Complaint System registration!";
							$message ="You have been registered with us.  \n your input will be valuable!\n Regards!";
							//send a welcome e-mail to the student
							sendMail($rec, $subject, $message);
							echo "
								<script>
									alter('User added successfully');
									window.location = 'index.php'; 
								</script>";
						}
						else{
							echo "<script>
									alter('Something went wrong while adding user!');
									window.location = 'adduser.php'; 
								</script>";
						}
						break;
				}
			}
		?>
	</div>
	<article>
		<form method="POST">
			<input required type="text" name="fName" maxlength =32 placeholder="First Name"><br><br>
			<input required type="text" name="lName" maxlength =32 placeholder="Last Name"><br><br>
			<input required type="email" name="eMail" placeholder="E-mail address"><br><br>
			<select name="type">
				<option value="dean">Dean</option>
				<option value="dvc">Dvc</option>
			</select><br><br>
			<input required type="password" name="pswd" placeholder="Password"><br><br>
			<input required type="password" name="cPswd" placeholder="Confirm Password"><br><br>
			<input type="submit" name="Reg" value="REGISTER" onlick="validate()">
		</form>
	</article>	
</content>
<?php
	include('../includes/footer.php');
?>