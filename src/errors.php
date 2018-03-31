<?php 
function empty_signup()
{
	echo '<script type="text/javascript">alert("Error : You need to type something !");</script>';
	redirect('../index.php', 302);
}
?>
