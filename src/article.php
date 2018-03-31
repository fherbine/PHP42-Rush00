<?php
	$art_img; // => db 
	$art_content;
	$article ='
<article class="product_art">
	<div class="art_img">
		<img src="'.$art_img.'"alt="'.$art_content.'" title="'.$art_content.'" /> <!--penser image backup si non donné ... -->
	</div>

	<div class="art_desc">
		<h2 class="art_title">'.$art_content.'</h2>
			<p>
				'.$art_desc.'
			</p>
	</div>

	<div class="art_aside">
		<h3 class="art_cost">'.$art_cost.'</h3>
		<div>
			<form action="#" method="get" class="art_form"> <!-- GET ? -->
				<input type="submit" name="'.$art_content.'" value="ADD TO CART" class="art_sub" /> <!-- BUY(art_id) -->
			</form>
			<form action="#" method="get" class="art_form"> <!-- GET ? -->
				<input type="submit" name="'.$art_content.'" value="BUY" class="art_sub" /> <!-- BUY(art_id) -->
			</form>
		</div>
	</div>
</article>
<hr />'
?>