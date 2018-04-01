<?php

function create_cookie($cookie_name, $cookie_value)
{
    setcookie($cookie_name, $cookie_value, time() + 3600 * 24, "/");
}

function add_item_in_cookie($cookie_value, $item)
{
    if ($cookie_value != NULL)
      $cookie_value = unserialize($cookie_value);
    if (isset($cookie_value['item']))
    {
      if (array_key_exists($item, $cookie_value['item']))
        $cookie_value['item'][$item]++;
      else
        $cookie_value['item'][$item] = 1;
    }
    else
      $cookie_value['item'][$item] = 1;
    return serialize($cookie_value);
}

function add_user_in_cookie($cookie_value, $login)
{
  $cookie_value = unserialize($cookie_value);
  $cookie_value['login'] = $login;
  return serialize($cookie_value);
}

function set_cookie_content($cookie_content)
{
    return serialize($cookie_content);
}

function get_cookie_content($cookie_content)
{
    return unserialize($cookie_content);
}
?>
