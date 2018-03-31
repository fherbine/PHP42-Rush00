<?php

function redirect($state, $path)
{
  header("Location : " . $path, TRUE, $state)
}

?>
