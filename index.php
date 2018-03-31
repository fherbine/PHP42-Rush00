<!DOCTYPE html>
<html>
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
				<!-- ====================================================================================================================== Exemple article ================================================================================================================== -->
				<!--
										Format d'article a adopter avec les memes, classes
				-->
				<!-- <article class="product_art">
					<div class="art_img">
						<img src="http://s2.e-monsite.com/2010/01/19/775072721-1235743680-lampe-a-l-huile-jpg.jpg" alt="<titre de l'article>" title="<titre de l'article>" />
					</div>

					<div class="art_desc">
						<h2 class="art_title">Lampe a huile</h2>
						<p>
							Mensarum enim voragines et varias voluptatum inlecebras, ne longius progrediar, praetermitto illuc transiturus quod quidam per ampla spatia urbis subversasque silices sine periculi metu properantes equos velut publicos signatis quod dicitur calceis agitant, familiarium agmina tamquam praedatorios globos post terga trahentes ne Sannione quidem, ut ait comicus, domi relicto. quos imitatae matronae complures opertis capitibus et basternis per latera civitatis cuncta discurrunt.
						</p>
					</div>

					<div class="art_aside">
						<h3 class="art_cost">124€</h3>
						<div>
						<form action="#" method="get" class="art_form"> 
							<input type="submit" name="art_title" value="ADD TO CART" class="art_sub" /> 
						</form>
						<form action="#" method="get" class="art_form">
							<input type="submit" name="art_title" value="BUY" class="art_sub" />
						</form>
						</div>
					</div>
				</article>
				<hr /> -->
				<!-- ====================================================================================================================== Exemple article ================================================================================================================== -->
				<!--php : articles cf <article> divided by <hr/> !-->
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
