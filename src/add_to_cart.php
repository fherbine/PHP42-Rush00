<?php

function add_to_cart()
{
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'categorie';

  if (@$_POST['submit'] === "ADD TO CART")
  {
    if (!isset($_COOKIE["card"]))
      create_cooki("card");
    add_item_to_card();
  }
  else redirect('../views/account.phtml', 302);
}


?>
