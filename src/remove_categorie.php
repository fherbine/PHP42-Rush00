<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/categorie_helper.php");

function remove_categorie()
{
    if (@$_POST['submit'] === 'DELETE')
    {
      $categories = get_categories(BDD_PATH, BDD_CATEGORIE);
      if (categorie_exits($categories, @$_POST['art_categ']) === TRUE)
      {
        delete_categorie($categories, @$_POST['art_categ'], BDD_CATEGORIE);
        redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
    }
    else redirect('../views/account.phtml', 302);
}

remove_categorie();

?>
