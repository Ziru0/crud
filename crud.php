
<?php
	include 'connn.php';
	session_start();
	$user_id = $_SESSION['id'];
	if(!isset($_SESSION['id'])) {
	   echo '<script>alert("You do not have access to this page. Please log in first.");</script>';
	   header("Location: login.php");
		exit();
	   }
   
   $stmt = $con->prepare("SELECT * FROM regis WHERE user_id = ?");
   $stmt->execute([$user_id]);
   $user = $stmt->fetch(PDO::FETCH_ASSOC);
   if($user){
   } else {
	   echo 'failed to find';
   }
	?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="css/tiny-slider.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/glightbox.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">

	<link rel="stylesheet" href="css/flatpickr.min.css">


	<title>DSF Entry</title>
</head>

<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="index.php" class="logo" >
								<img src="images/logo.png" alt="" width="150px" height="150px">
							</a>
						</div>	
						<div class="col-8 text-center ">
							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="crud.php">Entry</a></li>
							</ul>
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<div class="accouont">
							<div class="col-8 text-center ">
								<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
									<li class="has-children">
										<a href="">Account</a>
										<ul class="dropdown">
                                        <?php if (isset($_SESSION['username'])): ?>
                        <button onclick="window.location.href='logout.php';">Log-out</button>
                        <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <?php else: ?>
                        <button onclick="window.location.href='login.php';">Log-in</button>
                        <button onclick="window.location.href='registration.php';">Register</button>
                    <?php endif; ?>
											
										</ul>
									</li>
						
								</ul>
							</div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="hero overlay">
		<img src="images/blob.svg" alt="" class="img-fluid blob">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5">
                    <div class="row">
                        <div class="column1">

                <form action="#" method="post">
                <div class="inputs">
                    <h2>Entries</h2>
					<input type="text" name="username" placeholder="UserName">
					<input type="text" name="fullname" placeholder="Full Name">
                    <input type="text" name="course" placeholder="Course">
                    <input type="email" name="email" placeholder="Email">
					<input type="text" name="contact" placeholder="Contact">
                <button type="submit" value="submit" name="submit">Enter</button>
             </div>
             <div class="column2">  <?php
        include 'conn.php';

        $sql = "SELECT * FROM dbziru";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr> <th>fullname</th> <th>course</th>  <th>contact</th> </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["fullname"] . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td><a href='delete.php?delete_id=" . $row["user_id"] . "'>Delete</a></td>";
                echo "<td><a href='edit.php?edit_id=" . $row["user_id"] . "'>Edit</a></td>";
                echo "</tr>";
            }
        }
        $connection->close();

        ?>
        </div>
            </div>
          </div>
          </div>
          </div>    
          </div>
          </div> 

      

  <style>
        

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            margin: 30px;
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: darkblue;
        }
    </style>


</div>
</div>


<?php
include 'conn.php';
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];
    $sql = "INSERT INTO dbziru ( fullname, course, contact) VALUES ( '$fullname', '$course', '$contact')";
    
    if(mysqli_query($connection, $sql)) {
        echo "<script>alert('Saved Successfully!')</script>";
        echo "<script>window.location='crud.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
</form>
				</div>
			</div>
		</div>
	</div>




    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>

    <script src="js/flatpickr.min.js"></script>


    <script src="js/aos.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
  </html>
