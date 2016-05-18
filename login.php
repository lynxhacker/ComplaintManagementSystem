<?php
	include('includes/header.php'); 
	if(isset($_SESSION['student'])){
		header('location: index.php');
	}
?>
<content>
	<div id="processlogin">
		<?php
		if(isset($_POST['Login']) and $_POST['Login'] == 'Login'){
			include('functions.php'); 
			//get data
			$email = validate(mysqli_real_escape_string(db(), $_POST['email'])); 
			$password = validate(mysqli_real_escape_string(db(), $_POST['password']));
			$type = validate(mysqli_real_escape_string(db(), $_POST['type'])); 
			//encrypt password
			$password = sha1($password);
			//route the login process
			switch ($type) {
				case 'student':
					//check into the database
					$query = mysqli_query(db(), "SELECT * FROM student WHERE email = '$email' AND password = '$password'"); 
					if(mysqli_num_rows($query) == 1){
						//user exists, create session
						$user = mysqli_fetch_array($query); 
						session_regenerate_id(); 
						$_SESSION['user'] = $user['studentid'];
						$_SESSION['mail'] = $user['email'];
						//redirect to the main page
						header('location:index.php');
					}
					else{
						echo "<span class='error'>Sorry, Invalid email or password!</span>";
					}
				break;
				
				case 'dean':
					//check into the database
					$query = mysqli_query(db(), "SELECT * FROM dean WHERE email = '$email' AND password = '$password'"); 
					if(mysqli_num_rows($query) == 1){
						//user exists, create session
						$user = mysqli_fetch_array($query); 
						session_regenerate_id(); 
						$_SESSION['dean'] = $user['deanid'];
						$_SESSION['mail'] = $user['email'];
						header('location:dean/index.php');
					}
					else{
						echo "<span class='error'>Sorry, Invalid email or password for Dean!</span>";
					}
				break;
				case 'dvc':
					//check into the database
					$query = mysqli_query(db(), "SELECT * FROM dvc WHERE email = '$email' AND password = '$password'"); 
					if(mysqli_num_rows($query) == 1){
						//user exists, create session
						$user = mysqli_fetch_array($query); 
						session_regenerate_id(); 
						$_SESSION['dvc'] = $user['dvcid'];
						$_SESSION['mail'] = $user['email'];
						//redirect to the main page
						header('location:dvc/index.php');
					}
					else{
						echo "<span class='error'>Sorry, Invalid email or password!</span>";
					}
				break;
			}
		}
	?>
	</div>
	<article id="login">
		<h2>Login</h2>
		<form method="POST">
			<label>Email: </label>
			<input type="email" name="email" maxlength=32><br><br>
			 <label>Password: </label>
			<input type="password" name="password" maxlength=32><br><br>
			<label>Account type: </label>
			<select name="type">
				<option value="student">Student</option>
				<option value="dean">Dean</option>
				<option value="dvc">Dvc</option>
			</select><br><br>
			<label>Login: </label>
			<input type="submit" name="Login" value="Login">
		</form>
	</article>
</content>
<?php
	include('includes/footer.php');
?>
