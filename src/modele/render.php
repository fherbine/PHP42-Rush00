<?php

function redirect($path, $state)
{
  header("Location : " . $path, TRUE, $state);
}

?>
