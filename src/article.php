<?php
$art_img; // => db 
$art_content; // =>db
$art_cost; // => db
foreach ($db as $art_title => $value)
{
	echo '
<article class="product_art">
	<div class="art_img">
		<img src="'.$value[$art_img].'"alt="'.$art_title.'" title="'.$art_title.'" /> <!--penser image backup si non donné ... -->
	</div>

	<div class="art_desc">
		<h2 class="art_title">'.$art_title.'</h2>
			<p>
				'.$value[$art_desc].'
			</p>
	</div>

	<div class="art_aside">
		<h3 class="art_cost">'.$value[$art_cost].'</h3>
		<div>
			<form action="#" method="get" class="art_form"> <!-- GET ? -->
				<input type="submit" name="'.$art_title.'" value="ADD TO CART" class="art_sub" /> <!-- BUY(art_id) -->
			</form>
			<form action="#" method="get" class="art_form"> <!-- GET ? -->
				<input type="submit" name="'.$art_title.'" value="BUY" class="art_sub" /> <!-- BUY(art_id) -->
			</form>
		</div>
	</div>
</article>
<hr />';
}
?>