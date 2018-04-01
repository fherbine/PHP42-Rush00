<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/categorie_helper.php");

function remove_categorie()
{
    $bdd_dir_path = ROOT . DS . 'bdd';
    $bdd_file_path = ROOT . DS . 'bdd' . DS . 'categorie';

    if (@$_POST['submit'] === 'DELETE')
    {
      $categories = get_categories($bdd_dir_path, $bdd_file_path);
      if (categorie_exits($categories, @$_POST['art_categ']) === TRUE)
      {
        delete_categorie($categories, @$_POST['art_categ'], $bdd_file_path);
        redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
    }
    else redirect('../views/account.phtml', 302);
}

remove_categorie();

?>
