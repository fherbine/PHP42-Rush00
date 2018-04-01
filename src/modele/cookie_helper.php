<?php

function creat_cookie($cooki_name, $value)
{
    setcookie($cooki_name, base64_decode($value), 0);
}

function add_item_in_cookie($cookie_name, $item)
{
    $cookie_value;

    if (isset($_COOKIE[$name]))
        $cookie_value = base64_decode($_COOKIE[$name]);
    $cookie_value[] = $article;
    $_COOKIE[$name] = base64_encode($cookie_value);
}

function add_user_in_cookie($cookie_name, $login)
{
  $cookie_value;

  if (isset($_COOKIE[$name]))
      $cookie_value = base64_decode($_COOKIE[$name]);
  $cookie_value['login'] = $login;
  $_COOKIE[$name] = base64_encode($cookie_value);
}

function get_cookie_content($name)
{
    base64_decode($_COOKIE[$name]);
}
?>
