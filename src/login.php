<?php

include ('auth.php');
include ('modele/render.php');

function check_login()
{
  if (@$_POST['submit'] === 'OK')
  {
    if (@$_POST['login'] != NULL
    && @$_POST['passwd'] != NULL)
    {
        if (auth($_POST['login'], $_POST['passwd']) === TRUE)
        {
          $_SESSION["logged_on_user"] = $_POST['login'];
          return (TRUE);
        }
    }
  }
  $_SESSION["logged_on_user"] = "";
  return (FALSE);
}

function login()
{
    session_start();
    if (check_login() === TRUE)
    {
      echo "OK\n";
    }
    else
      echo "ERROR\n";
}

login();
?>
