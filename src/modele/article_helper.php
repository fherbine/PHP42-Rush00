<?php

function get_articles($dir_path, $file_path)
{
  $articles;

  if (!file_exists($file_path))
  {
      @mkdir($dir_path, 0777, TRUE);
      $articles = [];
      file_put_contents($file_path, serialize($articles));
  }
  else
  {
      $articles = file_get_contents($file_path);
      $articles = unserialize($articles);
      if ($articles === FALSE)
        $articles = [];
  }
  return ($articles);
}

function article_encode($article)
{
  foreach ($article as $key => $value) {
    $article[$key] = base64_encode($value);
  }
  return $article;
}


function article_decode($article)
{
  foreach ($article as $key => $value) {
    $article[$key] = base64_decode($value);
  }
  return $article;
}

function article_exits($articles, $title)
{
  if (array_key_exists($title))
    return $article($title);
  return (FALSE);
}

function get_article_by_name($dir_path, $file_path, $name)
{
  $articles = get_articles($dir_path, $file_path);
  return article_exits($articles, $article);
}

function create_article($articles, $key, $article, $file_path)
{
  $article = article_encode($article);
  $articles[$key] = $article;
  $articles = serialize($articles);
  file_put_contents($file_path, $articles);
}

function delete_article($articles, $article_title, $file_path)
{
  unset($articles[$article_title]);
  $articles = serialize($articles);
  file_put_contents($file_path, $articles);
}
?>
