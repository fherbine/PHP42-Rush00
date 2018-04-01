<?php
session_start();

include ('const.php');
include ('modele/render.php');
include ('modele/article_helper.php');
include ('modele/cookie_helper.php');

function remove_to_cart()
{
    $cooki_name;

    if (@$_SESSION["logged_on_user"] != NULL)
      $cookie_name = @$_SESSION["logged_on_user"];
    else
      $cookie_name = 'card';
    if (get_article_by_name(BDD_PATH, BDD_ARTICLE, @$_GET['art_title']) !== FALSE)
    {
      $cookie_content = get_cookie_content($_COOKIE[$cookie_name]);
      if (isset($cookie_content['item']))
      {
          if (array_key_exists(@$_GET['art_title'], $cookie_content['item']))
            unset($cookie_content['item'][@$_GET['art_title']]);
          $cookie_content= set_cookie_content($cookie_content);
          create_cookie($cookie_name, $cookie_content);
      }
    }
    redirect("../views/cart.phtml", 302);
}

remove_to_cart();
?>
