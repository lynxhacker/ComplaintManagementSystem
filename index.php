<?php
	include('includes/header.php');
?>
<content>
	<div>
		<?php 
			if(isset($_SESSION['user'])){
				?>
					<article>
						<h2>Create a new complaint!</h2>
						<form  method="POST" action="addComplaint.php">
							<label>Title :</label>
							<input type="text" required name="title" maxlength=64><br><br>
							<label>Message: </label>
							<textarea required name="complaint" placeholder = "Write your complaint here!"></textarea><br><br>
							<input type="submit" name="Addcomplaint" value="Send">
						</form> 
					</article>
				<?php
			}
			else{
				?>
					<article>
						<h2>How to use the system</h2>
						<p>
							<ul>
								<li>First register with your provided student e-mail</li>
								<li>Login into your account</li>
								<li>Add, See complaints</li>
								<li>Comment and share complaints</li>
							</ul>
						</p>
					</article>
				<?php
			}
		?>
	</div>
</content>
<?php
	include('includes/footer.php');
?>