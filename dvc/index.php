<?php
	include('../includes/header.php');
	if(!isset($_SESSION['dvc'])){
		header('location: ../index.php');
	} 
?>
<content>
	<article>
		<h2>Welcome Dvc [<?= $_SESSION['mail']; ?>]</h2>
	</article>
</content>
<?php
	include('../includes/footer.php');
?>
