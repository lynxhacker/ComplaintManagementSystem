<?php
	session_start();
	if(isset($_POST['Addcomplaint']) && $_POST['Addcomplaint'] =='Send'){
		require('functions.php'); 
		//get data
		$title= validate(mysqli_real_escape_string(db(), $_POST['title'])); 
		$msg = validate(mysqli_real_escape_string(db(), $_POST['complaint'])); 
		$userid = $_SESSION['user'];
		//insert into the database. 
		$query = mysqli_query(db(), "INSERT INTO complain (title, message, userid) VALUES ('$title', '$msg', $userid)"); 
		if($query){
			echo "
				<script> 
				alert('Your complaint has been successfully recorded!'); 
				window.location = 'view.php'; 
				</script>";
		}
		else{
			echo "
			<script> 
				alert('Sorry, something went wrong. Please try again!'); 
				window.location = 'index.php'; 
				</script>";
		}
	}
?>