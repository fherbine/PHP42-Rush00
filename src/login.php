<?php

include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/user_helper.php');
include_once ('modele/cookie_helper.php');


function  update_cookie()
{
  if(isset($_COOKIE['card']))
  {
    $cookie_content1 = get_cookie_content($_COOKIE['card']);
    if (isset($_COOKIE[$_SESSION["logged_on_user"]]))
    {
        $cookie_content2 = get_cookie_content($_COOKIE[$_SESSION["logged_on_user"]]);
        $cookie_content1 = merge_cookie($cookie_content1, $cookie_content2);
    }
    create_cookie($_SESSION["logged_on_user"], set_cookie_content($cookie_content1));
    destroy_cookie('card');
  }
}

function auth($login, $passwd)
{
    $accounts;
    $account;

    $accounts = get_accounts(BDD_PATH, BDD_PASSWD);
    if (($account = account_exits($accounts, $passwd, BDD_PASSWD)) !== FALSE)
    {
        if (check_passwd($account, $passwd) === TRUE)
          return ($account);
    }
    return (FALSE);
}

function check_login()
{
  if (@$_POST['submit'] === 'OK')
  {
    if (@$_POST['login'] != NULL
    && @$_POST['passwd'] != NULL)
    {
        if (($account = auth($_POST['login'], $_POST['passwd'])) !== FALSE)
        {
          $_SESSION["logged_on_user"] = $account['login'];
          $_SESSION["logged_on_admin"] = $account['admin'];
          update_cookie();
          return (TRUE);
        }
    }
  }
  $_SESSION["logged_on_user"] = "";
  $_SESSION["logged_on_admin"] = FALSE;
  return (FALSE);
}

function login()
{
    session_start();
    if (check_login() === TRUE)
      redirect('../index.php', 302);
    else
      redirect('../views/auth_failure.html', 302);
}

login();

?>
