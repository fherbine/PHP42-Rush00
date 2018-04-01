<html>
<?php
	session_start();
	require_once ('src/modele/article_helper.php');
	require_once ('src/modele/categorie_helper.php');
	require_once ('src/const.php');
?>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style/global.css" />
	<link rel="stylesheet" type="text/css" href="style/home.css" />
	<title>Amazonne - Site officiel</title>
</head>
	<body>
		<header>
			<div id="left_header">
				<h1>Amazonne</h1>
			</div>
			<div class="main_menu">
				<ul>
					<div><a href="index.php"><li>INDEX</li></a></div>
					<?php if (@$_SESSION['logged_on_admin'] == null): ?>
					<div><a href="views/cart.phtml"><li>CART</li></a></div>
					<?php endif; ?>
					<?php if (@$_SESSION['logged_on_user'] != null): ?>
					<div><a href="views/account.phtml"><li>ACCOUNT</li></a></div>
					<?php endif;?>
				</ul>
			</div>
			<div id="right_header">
				<ul>
					<?php if (@$_SESSION['logged_on_user'] != null):?>
					<div id="sign_out_li">
						<li>
							<a href="src/logout.php" id="sign_out_div">
								SIGN OUT
							</a>
						</li>
					</div>
					<?php else:?>
					<div id="sign_in_div">
						<li>SIGN IN</li>
						<div id="sign_in_form">
						<form method="post" action="src/login.php"> <!-- src.php ? => connexion -->
							<input type="text" name="login" class="sign_input" placeholder="Login" /><br />
							<input type="password" name="passwd" class="sign_input" placeholder="password" /><br />
							<input type="submit" name="submit" class="sign_submit" value="OK"/>
						</form>
						</div>
					</div>
					<div id="sign_up_div">
						<li>SIGN UP</li>
						<div id="sign_up_form">
						<form method="post" action="src/create.php"> <!--- src.php ? Inscription -->
							<input type="text" name="login" class="sign_input" placeholder="Login" /><br />
							<input type="text" name="realname" class="sign_input" placeholder="Name" /><br />
							<input type="password" name="passwd" class="sign_input" placeholder="password" /><br />
							<input type="submit" name="submit" class="sign_submit" value="OK"/>
						</form>
						</div>
					</div>
				<?php endif;?>
				</ul>
			</div>
		</header>
		<div id="main_page">
			<section>
				<article id="sort_art">
					<p>Sort by categories : </p>
					<?php include ('views/categories.phtml');?>
				</article>
				<hr />
						<?php include ('views/display_article.phtml'); ?>
			</section>
			<footer>
				<p>© 2018 - pprikazs & fherbine</p>
			</footer>
		</div>
		<div>
		</div id="back1"></div>
	</body>
</html>
