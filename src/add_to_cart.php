<?php

function add_to_cart()
{
  $cooki_name;

  $cookie_name = "card";
  if (@$_GET['submit'] === "ADD TO CART")
  {
    if (get_article_by_name(BDD_PATH, BDD_ARTICLE, @$_GET['art_title'] !== FALSE)
    {
        if (!isset($_COOKIE["card"]))
          create_cooki($cookie_name, @$_GET['art_title']);
        else
          add_item_to_cookie($cookie_name, @$_GET['art_title']);
        add_user_in_cookie($cookie_name, @$_SESSION["logged_on_user"]);
    }
  }
  else redirect('../views/account.phtml', 302);
}


?>
