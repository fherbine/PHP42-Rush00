<?php

include_once ("const.php");

function create_article()
{
  $articles;
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'passwd';

  if (@$_GET['submit'] === 'OK')
  {
      $articles = get_articles($bdd_dir_path, $bdd_file_path);
      if (article_exits($articles, @$_GET['title']) === FALSE
      && @$_GET[''] != NULL
      && @$_GET[''] != NULL
      && @$_GET[''] != NULL)
      {
          $article[''] = @$_GET[''];
          $article[''] = base64(@$_GET['']);
          $article[''] = @$_GET[''];
          $article[''] = @$_GET[''];
          create_account($articles, $article, $bdd_file_path);
          redirect('', 301);
      }
      else redirect('', 302);
  }
  else redirect('', 302);
}

create_article();

?>
