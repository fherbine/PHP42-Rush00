<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/article_helper.php");

function remove_article()
{
  $articles = get_articles(BDD_PATH, BDD_ARTICLE);
  if (article_exits($articles, @$_GET['art_title']) !== FALSE)
  {
      delete_article($articles, @$_GET['art_title'], BDD_ARTICLE);
      redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

remove_article();

?>
