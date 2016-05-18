<?php
	include('../includes/header.php');
	if(!isset($_SESSION['dean'])){
		header('location: index.php');
	} 
?>
	<article>
		<br>
		<?php
			if(isset($_GET['id']) && $_GET['id'] !== null){
				require('../functions.php');
				$complaintid = $_GET['id']; 
				$comment = mysqli_query(db(), "SELECT * FROM comments WHERE complaintid  = '$complaintid' ORDER BY commentid ASC"); 
				if(mysqli_num_rows($comment) >=1){
					?>
					<table border width=100%>
						<tr>
							<th>Comment</th>
							<th>Posted By</th>
						</tr>
					<?php
					while($commentdata = mysqli_fetch_array($comment)){
						?>
						<tr>
							<td><?= $commentdata['comment']; ?></td>
							<td><?= $commentdata['user']; ?></td>
						</tr>
						<?php
					}
					?>
					</table>
					<?php
				}
				else{
					echo "<span class='error'>Sorry,  no comments havae been found!</span>";
				}
			}
		?>
	</article>
<?php
	include('includes/footer.php');
?>