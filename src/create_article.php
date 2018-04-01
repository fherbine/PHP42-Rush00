<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/article_helper.php");

function add_article()
{
  $articles;

  if (@$_POST['submit'] === 'ADD')
  {
      $articles = get_articles(BDD_PATH, BDD_ARTICLE);
      if (article_exits($articles, @$_POST['art_title']) === FALSE
      && @$_POST['art_title'] != NULL
      && @$_POST['art_categ'] != NULL
      && @$_POST['art_desc'] != NULL
      && @$_POST['art_img'] != NULL
      && @$_POST['art_cost'] != NULL)
      {
          $article['art_title'] = @$_POST['art_title'];
          $article['art_categ'] = @$_POST['art_categ'];
          $article['art_desc'] = @$_POST['art_desc'];
          $article['art_img'] = @$_POST['art_img'];
          $article['art_cost'] = @$_POST['art_cost'];
          create_article($articles, $article['art_title'], $article, BDD_ARTICLE);
          redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

add_article();

?>
