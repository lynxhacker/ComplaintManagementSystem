<?php
	include('../includes/header.php');
	if(!isset($_SESSION['dean'])){
		header('location: index.php');
	} 
?>
	<content>
		<article>
			<h2>Complaints received</h2>
			<?php
				require('../functions.php'); 
				if(isset($_GET['id']) && $_GET['id'] !== null){
					$complainid = $_GET['id'];
					//update database
					$query = mysqli_query(db(), "UPDATE complain SET forwaded = 1 WHERE cmplainid = '$complainid'"); 
					if($query){
						echo "Complaint forwaded successfully!";
					}
					else{
						echo "<span class='error'>Something went wrong, please try again!</span>";
					}
				}
				
				//fetch all the data from the database
				$query = mysqli_query(db(), "SELECT * FROM complain ORDER BY cmplainid ASC"); 
				if(mysqli_num_rows($query) >= 1){
					?>	
						<table border=1 width =auto>
							<tr>
								<th>Title</th>
								<th>Complaint</th>
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
											if($data['forwaded'] == 0){
												?>
													<a href="view.php?id=<?= $data['cmplainid']; ?>"><button>Forward</button></a>
												<?php
											}
											else{
												echo "<a href='#'>Forwarded</a>";
											}

										?>
										</td>
									<td><a href="view.php?comid=<?= $data['cmplainid']; ?>"><button>Comment</button></a>|<a href="viewcomment.php?id=<?= $data['cmplainid']; ?>"><button>See comments</button></a></td>
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
				if(isset($_GET['comid']) && $_GET['comid'] !== null){
					?>
						<hr>
						<h3>Add comment</h3>
						<form method="POST" action="Addcomment.php">
							<input type="hidden" name="complaintid" value="<?= $_GET['comid']; ?>">
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
	include('../includes/footer.php');
?>