<?php
include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/categorie_helper.php");

function add_categorie()
{
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'categorie';

  if (@$_POST['submit'] === 'ADD')
  {
      $categories = get_categories($bdd_dir_path, $bdd_file_path);
      if (categorie_exits($categories, @$_POST['add_categ']) === FALSE)
      {
          $categorie = @$_POST['add_categ'];
          create_categorie($categories, $categorie, $bdd_file_path);
          redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

add_categorie();

?>
