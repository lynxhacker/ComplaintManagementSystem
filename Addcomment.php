<?php
	//session start
	session_start(); 
	require('functions.php'); 

	$comment = validate(mysqli_real_escape_string(db(), $_POST['comment'])); 
	$id = $_POST['complaintid']; 
	$user = $_SESSION['mail']; 

	$query = mysqli_query(db(), "INSERT INTO comments (user, comment, complaintid) VALUES ('$user', '$comment', '$id')");
	if($query){
		echo "<script>
			alert('Comment added successfully!');
			window.location = 'view.php'; 
			</script>";
	} 
	else{
		echo "<script>
			alert('Sorry something went wrong!');
			window.location = 'view.php';
			</script>";
	}
?>