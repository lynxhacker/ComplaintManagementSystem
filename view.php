<?php
	include('includes/header.php');
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	} 
?>
	<content>
		<article>
			<h2>Complaints Sent</h2>
			<?php
				require('functions.php'); 
				//fetch all the data from the database
				$query = mysqli_query(db(), "SELECT * FROM complain ORDER BY cmplainid ASC"); 
				if(mysqli_num_rows($query) >= 1){
					?>	
						<table border width=100%>
							<tr>
								<th>Title</th>
								<th>Complaint</th>
								<th>Addressed</th>
								<th>Action</th>
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
									<td><a href="view.php?id=<?= $data['cmplainid']; ?>"><button>Comment</button></a>|<a href="viewcomment.php?id=<?= $data['cmplainid']; ?>"><button>See comments</button></a></td>
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
		<article>
			<?php
				if(isset($_GET['id']) && $_GET['id'] !== null){
					?>
						<hr>
						<h3>Add comment</h3>
						<form method="POST" action="Addcomment.php">
							<input type="hidden" name="complaintid" value="<?= $_GET['id']; ?>">
							<textarea required name="comment" placeholder="Comment here">
							</textarea><br>
							<input type="submit" value="Comment">
						</form>
					<?php
				}
			?>
		</article>
	</content>
<?php
	include('includes/footer.php');
?>