<?php

function get_categories($dir_path, $file_path)
{
  $categories;

  if (!file_exists($file_path))
  {
      @mkdir($dir_path, 0777, TRUE);
      $categories = [];
      file_put_contents($file_path, serialize($categories));
  }
  else
  {
      $categories = file_get_contents($file_path);
      $categories = unserialize($categories);
      if ($categories === FALSE)
        $categories = [];
  }
  return ($categories);
}

function categorie_exits($categories, $categorie)
{
  $tmp = categorie_encode($categorie);
  foreach ($categories as $value) {
    if ($value === $tmp)
      return TRUE;
  }
  return FALSE;
}

function categorie_encode($categorie)
{
  return base64_encode($categorie);
}

function categorie_decode($categorie)
{
  return base64_decode($categorie);
}

function create_categorie($categories, $categorie, $file_path)
{
  $categorie = categorie_encode($categorie);
  $categories[] = $categorie;
  $categories = serialize($categories);
  file_put_contents($file_path, $categories);
}

function delete_categorie($categories, $categorie, $file_path)
{
  $tmp = categorie_encode($categorie);
  foreach ($categories as $key => $value) {
    if ($value === $tmp)
    {
        unset($categories[$key]);
        break ;
    }
  }
  $categories = serialize($categories);
  file_put_contents($file_path, $categories);
}

?>
