<?php
include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/categorie_helper.php");

function add_categorie()
{
  if (@$_POST['submit'] === 'ADD')
  {
      $categories = get_categories(BDD_PATH, BDD_CATEGORIE);
      if (categorie_exits($categories, @$_POST['add_categ']) === FALSE)
      {
          $categorie = @$_POST['add_categ'];
          create_categorie($categories, $categorie, BDD_CATEGORIE);
          redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

add_categorie();

?>
