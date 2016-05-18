<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Complain System</title>
		<meta charset="UTF-8">
		<style type="text/css">
			header, footer{
				background: #fff;
			}
			body{
				margin: auto;
				width: 80%;
				background: #000000;
			}
			article{
				background: yellow; 
				color: #000;
			}
			label{
				width:100px;
				margin-right:50px;
				float:left;
			}

			.error{
				border: 1px solid red; 
				background:#fff;
				margin-bottom: 5px;
				color: red;
			}

		</style>
	</head>
	<body>
		<header>
			<h1>Online complain Management System</h1>
			<hr>
			<nav>
				<a href="index.php"><button>Home</button></a>
				<?php
					if(isset($_SESSION['admin'])){
						?>
							<a href="adduser.php"><button>Add user</button></a>
							<a href="http://localhost/ComplaintSystem/logout.php"><button>Logout</button></a>
						<?php
					}
					else{
						if(isset($_SESSION['user']) || isset($_SESSION['dean']) || isset($_SESSION['dvc'])){
						?>
							<a href="view.php"><button>See complaints</button></a>
							<a href="http://localhost/ComplaintSystem/logout.php"><button>Logout</button></a>
						<?php
						}else{
							?>
								<a href="register.php"><button>Register</button></a>
								<a href="login.php"><button>Login</button></a> 
							<?php
						}
					}
				?>
			</nav>	
		</header>