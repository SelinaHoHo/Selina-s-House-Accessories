<?php
include('./phpConfig/config.php');
include('./phpConfig/session.php');

$sql = "SELECT * FROM product";
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

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Product results</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="pagination">
				<ul>
					<li><a href="#"><span class="ico-prev"></span></a></li>
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><span class="ico-next"></span></a></li>
				</ul>
			</div>
			<div class="products-wrap">
				<aside id="sidebar">
					<div class="widget">
						<h3>Search Filters </h3>
						<fieldset>
							<input checked type="checkbox">
							<label class="checked" >Necklace</label>
							<input type="checkbox">
							<label>Ring</label>
							<input type="checkbox">
							<label>Wallet</label>
							<input type="checkbox">
							<label>Bag</label>
							<input type="checkbox">
							<label>Glasses</label>
						</fieldset>
					</div>
					<div class="widget">
						<h3>Sort by:</h3>
						<fieldset>
							<input checked type="checkbox">
							<label class="checked">Popularity</label>
							<input type="checkbox">
							<label>Date</label>
							<input type="checkbox">
							<label>Price</label>
						</fieldset>
					</div>
					<div class="widget">
						<h3>Condition:</h3>
						<fieldset>
							<input checked type="checkbox">
							<label class="checked">New</label>
							<input type="checkbox">
							<label>Used</label>
						</fieldset>
					</div>
					<div class="widget">
						<h3>Price range:</h3>
						<fieldset>
							<div id="price-range"></div>
						</fieldset>
					</div>
				</aside>
				<div id="content">
					<section class="products">
						<?php
						while ($row = $result->fetch_assoc()) { ?>
							<article style="cursor: pointer" onclick="window.location.href = '/product.php?id=<?php echo $row['id'] ?>'">
								<img class="products-image" src="<?php echo $row['product_image'] ?>" alt="">
								<h3><a href="product.php"><?php echo $row['product_name'] ?></a></h3>
								<h4><a href="product.php"><?php echo $row['product_price'] ?>$</a></h4>
								<a href="/add.php?id=<?php echo $row['id'] ?>" class="btn-add">Add to cart</a>
							</article>
						<?php
						} ?>
					</section>
				</div>
				<!-- / content -->
			</div>
			<div class="pagination">
				<ul>
					<li><a href="#"><span class="ico-prev"></span></a></li>
					<li><a href="#">1</a></li>
					<li class="active"><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><span class="ico-next"></span></a></li>
				</ul>
			</div>
		</div>
		<!-- / container -->
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