<?php
	include('../includes/header.php');
?>
	<div id="process_login">
		<?php
			if(isset($_POST['submit']) && $_POST['submit'] =="Submit"){
				require('../functions.php');
				$uname = validate(mysqli_real_escape_string(db(), $_POST['username']));
				$password = validate(mysqli_real_escape_string(db(), $_POST['password']));

				$query = mysqli_query(db(), "SELECT * FROM superadmin WHERE username = '$uname' AND password = '$password'"); 
					if(mysqli_num_rows($query) == 1){
						//user exists, create session
						$user = mysqli_fetch_array($query); 
						session_regenerate_id(); 
						$_SESSION['admin'] = $user['adminid'];
						$_SESSION['mail'] = $user['email'];
						//redirect to the main page
						header('location:index.php');
					}
					else{
						echo "<span class='error'>Sorry, Invalid email or password!</span>";
					}
			}
		?>
	</div>
	<article>
		<?php
			if(!isset($_SESSION['admin'])){
		?>
		<form name="login" id="login" method="POST" action="index.php">
			<p><label for="username">Username: </label>
				<input type="text" name="username" id="username"/></p>
			<p><label for="password">Password: </label>
				<input type="password" name="password" id="password" value="abracadabra" /></p>
			<p><input type="submit" name="submit" id="submit" value="Submit"/> <input type="reset" name="reset" id="reset" value="reset"/></p>
		</form>
		<?php
			}
			else{
				echo "<br>Welcome to the Admin space! <hr>";
				?>
				<h2>Complaints Sent</h2>
			<?php
				require('../functions.php'); 
				//fetch all the data from the database
				$query = mysqli_query(db(), "SELECT * FROM complain ORDER BY cmplainid ASC"); 
				if(mysqli_num_rows($query) >= 1){
					?>	
						<table border width=100%>
							<tr>
								<th>Title</th>
								<th>Complaint</th>
								<th>Addressed</th>
							</tr>	
					<?php
						while($data = mysqli_fetch_array($query)){
							?>
								<tr>
									<td><?= $data['title']; ?></td>
									<td><?= $data['message']; ?></td>
									<td>
									<?php
										if($data['addressed'] == 0){
											echo "<b>No</b>";
										}
										else{
											echo "<b>Yes</b>";
										}
									?>
									</td>
								</tr>
							<?php
						}
					?>
					</table>
					<?php
				}
				else{
					echo "<span class='error'>Sorry, no complaint has been found yet!</span>";
				}
			?>
		</article>
				<?php
			}
		?>
	</article>
<?php
	include('../includes/footer.php');
?>