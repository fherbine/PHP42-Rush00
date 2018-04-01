<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ('modele/user_helper.php');

function remove_account()
{
  $accounts = get_accounts(BDD_PATH, BDD_PASSWD);
  if (account_exits($accounts, @$_GET['login']) !== FALSE)
  {
      delete_account($accounts, @$_GET['login'], BDD_PASSWD);
      redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

remove_account();


?>
