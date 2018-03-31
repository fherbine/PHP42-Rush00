<?php
include_once ('modele/render.php');

function logout()
{
  session_destroy();
  redirect('../index.php', 302);
}

session_start();
logout();
?>
