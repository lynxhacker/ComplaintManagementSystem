<?php
	include('../includes/header.php');
	if(!isset($_SESSION['dean'])){
		header('location: ../index.php');
	} 
?>
<content>
	<article>
		<h2>Welcome Dean [<?= $_SESSION['mail']; ?>]</h2>
	</article>
</content>
<?php
	include('../includes/footer.php');
?>