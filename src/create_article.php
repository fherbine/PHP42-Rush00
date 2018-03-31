<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ("modele/article_helper.php");

function create_article()
{
  $articles;
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'article';

  if (@$_GET['submit'] === 'OK')
  {
      $articles = get_articles($bdd_dir_path, $bdd_file_path);
      if (article_exits($articles, @$_GET['title']) === FALSE
      && @$_GET['art_title'] != NULL
      && @$_GET['art_categ'] != NULL
      && @$_GET['art_desc'] != NULL
      && @$_GET['art_img'] != NULL
      && @$_GET['art_cost'] != NULL)
      {
          $article['art_title'] = base64_encode(@$_GET['art_title']);
          $article['art_categ'] = base64_encode(@$_GET['art_categ']);
          $article['art_desc'] = base64_encode(@$_GET['art_desc']);
          $article['art_img'] = base64_encode(@$_GET['art_img']);
          $article['art_cost'] = base64_encode(@$_GET['cost']);
          create_account($articles, $article['art_title'], $article, $bdd_file_path);
          echo "ok";
          //redirect('', 301);
      }
      else redirect('', 302);
  }
  else redirect('', 302);
}

create_article();

?>
