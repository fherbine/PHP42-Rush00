<html>
<?php
	session_start();
	require_once ('src/modele/article_helper.php');
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
					<a href="index.php"><li>INDEX</li></a>
					<a href="#"><li>CART</li></a>
				</ul>
			</div>
			<div id="right_header">
				<ul>
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
				</ul>
			</div>
		</header>
		<div id="main_page">
			<section>
				<?php
					$bdd_dir_path = ROOT . DS . 'bdd';
					$bdd_file_path = ROOT . DS . 'bdd' . DS . 'article';
					$articles = get_articles($bdd_dir_path, $bdd_file_path);
					foreach ($articles as $article)
					{
						$article = article_decode($article);
						include ('views/display_article.phtml');
					}
				?>
			</section>
			<footer>
				<hr />
				<p>© 2018 - pprikazs & fherbine</p>
			</footer>
		</div>
		<div>
		</div id="back1"></div>
	</body>
</html>
