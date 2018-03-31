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

function article_exits($accounts, $title)
{
    foreach ($accounts as $key => $value)
    {
      if ($title === $key)
        return $value;
    }
    return (FALSE);
}


function create_article($articles, $key, $article, $file_path)
{
  $articles[$keys] = $article;
  $articles = serialize($articles);
  file_put_contents($file_path, $articles);
}

?>
