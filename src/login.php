<?php

include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/user_helper.php');

function auth($login, $passwd)
{
    $accounts;
    $account;
    $bdd_dir_path = ROOT . DS . 'bdd';
    $bdd_file_path = $bdd_dir_path .DS . 'passwd';

    $accounts = get_accounts($bdd_dir_path, $bdd_file_path);
    if (($account = account_exits($accounts, $passwd, $bdd_file_path)) !== FALSE)
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
      redirect('../index.php', 302);
}

login();

?>
