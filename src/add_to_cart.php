<?php

include ('const.php');
include ('modele/render.php');
include ('modele/article_helper.php');
include ('modele/cookie_helper.php');

function add_to_cart()
{
  $cooki_name;

  $cookie_name = 'card';
  if (get_article_by_name(BDD_PATH, BDD_ARTICLE, @$_GET['art_title']) !== FALSE)
  {
      if (!isset($_COOKIE[$cookie_name]))
      {
        $cookie_content = add_item_in_cookie(NULL, @$_GET['art_title']);
        $cookie_content = add_user_in_cookie($cookie_content, @$_SESSION["logged_on_user"]);
        create_cookie($cookie_name, $cookie_content);
      }
      else
      {
        $cookie_content = $_COOKIE[$cookie_name];
        $cookie_content = add_item_in_cookie($cookie_content, @$_GET['art_title']);
        $cookie_content = add_user_in_cookie($cookie_content, @$_SESSION["logged_on_user"]);
        create_cookie($cookie_name, $cookie_content);
      }
      redirect('../index.php', 302);
  }
  else redirect('../views/index.phtml', 302);
}

add_to_cart();
?>
