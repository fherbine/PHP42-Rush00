<?php

function create_cookie($cookie_name, $cookie_value)
{
    setcookie($cookie_name, $cookie_value, time() + 3600 * 24, "/");
}

function destroy_cookie($cookie_name)
{
    setcookie($cookie_name, NULL, -1, "/");
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

function get_cookie_user($cookie_value)
{
  if ($cookie_value['login'] != NULL)
    return $cookie_value['login'];
  return FALSE;
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

function merge_cookie($cookie_content1, $cookie_content2)
{
    if (isset($cookie_content1['item']))
    {
      if (isset($cookie_content2['item']))
      {
        foreach ($cookie_content1['item'] as $key => $value)
        {
            if (array_key_exists($key, $cookie_content2['item']))
                $cookie_content1['item'][$key] += $cookie_content2['item'][$key];
            else
                $cookie_content1['item'][$key] = $cookie_content2['item'][$key];
        }
      }
      return $cookie_content1;
    }
    else if (isset($cookie_content2['item']))
        return $cookie_content1;
    else
      return "";
}

?>
