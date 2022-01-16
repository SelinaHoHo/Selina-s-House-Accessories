<?php
include('./phpConfig/config.php');
include('./phpConfig/session.php');
if (!isset($_SESSION['login_user']) || strcmp($_SESSION['role'], 'user') == 0) {
    header('location: ./login.php');
}

$sql = 'SELECT `order`.product_id, `product`.`product_name`, `order`.`username`, `order`.`quantity`, `order`.`is_confirm`, `user`.`full_name`, `product`.`product_price`  FROM `order` JOIN `user` ON `order`.`username` = `user`.`username` JOIN `product` ON `product`.`id` = `order`.`product_id`;';
$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Selina's House</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<link rel="stylesheet" href="./css/login-in.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

	<header id="header">
		<div class="container">
			<a href="index.php" id="logo"><img id="logo-img" src="./images/brand-logo.png" alt=""></a>
			<div class="right-links">
				<ul>
					<span style="display: <?php echo $login_session ? 'inline-block' : 'none';  ?>; width: fit-content; background: none; margin-top: 0;"><?php echo 'Hello, ' . $fullname ?></span>
					<li style="display: <?php echo $login_session ? 'inline-block' : 'none'; ?>"><a href="cart.php"><i class="fas fa-shopping-cart"><span class="badge"><?php echo count($cart) ?></span></i>Cart</a></li>
					<li style="display: <?php echo $login_session ? 'inline-block' : 'none'; ?>"><a href="/logout.php" style="width:auto;"><span class="fas fa-sign-out-alt"></span>Sign Out</a></li>
					<li style="display: <?php echo $login_session ? 'none' : 'inline-block'; ?>"><a href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="fas fa-sign-in-alt"></span>Sign in</a></li>
					<li style="display: <?php echo $login_session ? 'none' : 'inline-block'; ?>"><a href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;"><span class="fas fa-user-plus"></span>Register</a></li>
				</ul>
			</div>
		</div>
		<!-- / container -->
	</header>
	<!-- / header -->

	<div id="id01" class="modal">
		<form class="modal-content animate" action="./login.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="./images/brand-logo.png" alt="Avatar" class="avatar">
			</div>
			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<button type="submit">Login</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>
	<!--Login-->

	<div id="id02" class="modal">

		<form class="modal-content animate" action="/register.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				<img src="./images/brand-logo.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
				<label for="uname"><b>Full name</b></label>
				<input type="text" placeholder="Enter your full name" name="fullname" required>

				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<label for="psw-repeat"><b>Repeat Password</b></label>
				<input type="password" placeholder="Repeat Password" name="match-password" required>

				<button type="submit">Sign in</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				</label>
			</div>

			<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				<span class="psw">Forgot <a href="#">password?</a></span>
			</div>
		</form>
	</div>
	<!--register-->

	<nav id="menu">
		<div class="container">
			<div class="trigger"></div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about-us.php">About</a></li>
				<li><a href="shop.php">Shop</a></li>
				<li><a href="shop.php">Sale</a></li>
				<li><a href="shop.php">Best Seller</a></li>
			</ul>
		</div>
		<!-- / container -->
	</nav>
	<!-- / navigation -->
	
    <h1>All Order In System</h1>
    <div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<table>
					<tr>
						<th class="fullname">Product Name</th>
						<th class="qntt">Username</th>
						<th class="fullname">Full Name</th>
						<th class="qntt">Product Price</th>
						<th class="qntt">Quantity</th>
						<th class="qntt">Action</th>
					</tr>
					<?php
					while ($row = $result->fetch_assoc()) { ?>
						<tr style="background-color: <?php echo $row['is_confirm'] == 0 ? "#fff": "rgb(210, 214, 208)"?>;">
						<td>
							<h3><?php echo $row['product_name'] ?></h3>
						</td>
						<td><?php echo $row['username'] ?></td>
						<td><?php echo $row['full_name'] ?></td>
						<td><?php echo $row['product_price'] ?>$</td>
						<td><?php echo $row['quantity'] ?></td>
						<td>
							<a style="display: <?php echo $row['is_confirm'] == 0 ? 'inline-block' : 'none'  ?>;" href="./confirm.php?product_id=<?php echo $row['product_id'] ?>&username=<?php echo $row['username']?>" class="ico-confirm">Confirm</a>
						</td>
						</tr>
					<?php
					} ?>
					</table>
				</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	</div>
	<!-- / body -->
    <footer id="footer">
		<div class="container">
			<div class="cols">
				<div class="col">
					<h3>Pages</h3>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about-us.php">About</a></li>
						<li><a href="shop.php">Shop</a></li>
						<li><a href="shop.php">Sale</a></li>
						<li><a href="shop.php">Best Seller</a></li>
					</ul>
				</div>
				<div class="col media">
					<h3>Social media</h3>
					<ul class="social">
						<li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
						<li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
						<li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
						<li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
					</ul>
				</div>
				<div class="col contact">
					<h3>Get in Touch</h3>
					<p>Selina's House INC.<br>12 Phan Ba Vanh St<br>Da Nang</p>
					<p><span class="ico ico-em"></span><a href="#">Accessories@Selina.com</a></p>
					<p><span class="ico ico-ph"></span>+84 328 7500</p>
				</div>
				<div class="col newsletter">
					<h3>Subscribe</h3>
					<p>Subscribe to our mailing list to get the latest updates.</p>
					<form action="#">
						<input type="text" placeholder="Your email address...">
						<button type="submit"></button>
					</form>
				</div>
			</div>
			<p class="copy">Copyright 2021 Selina. All rights reserved.</p>
		</div>
		<!-- / container -->
	</footer>
	<!-- / footer -->


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>
		window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
	</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>

</html>