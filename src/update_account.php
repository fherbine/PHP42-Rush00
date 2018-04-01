<?php

session_start();

include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/user_helper.php');

function change_passwd()
{
  $accounts;
  $account;

  if (@$_POST['submit'] === 'CHANGE')
  {
      $accounts = get_accounts(BDD_PATH, BDD_PASSWD);
      if (($account = account_exits($accounts, $_SESSION["logged_on_user"])) !== FALSE
      && @$_POST['login'] != NULL
      && @$_POST['oldpw'] != NULL
      && @$_POST['newpw'] != NULL)
      {
          if (($account = update_passwd($account,
              @$_POST['oldpw'], @$_POST['newpw'])) !== FALSE)
          {
              update_account($accounts, $_SESSION["logged_on_user"], $account, BDD_PASSWD);
              redirect("../views/account.phtml", 302);
          }
          else redirect("../views/update_failure.html", 302);
      }
      else redirect("../views/update_failure.html", 302);
  }
  else redirect("../views/update_failure.html", 302);
}

change_passwd();


?>
