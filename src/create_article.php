<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/article_helper.php");

function add_article()
{
  $articles;
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'article';

  if (@$_POST['submit'] === 'ADD')
  {
      $articles = get_articles($bdd_dir_path, $bdd_file_path);
      if (article_exits($articles, @$_POST['title']) === FALSE
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
          create_article($articles, $article['art_title'], $article, $bdd_file_path);
          redirect('../views/account.phtml', 302);
      }
      else redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

add_article();

?>
