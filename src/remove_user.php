<?php

include_once ("const.php");
include_once ("modele/render.php");
include_once ('modele/user_helper.php');

function remove_account()
{
  $bdd_dir_path = ROOT . DS . 'bdd';
  $bdd_file_path = ROOT . DS . 'bdd' . DS . 'passwd';


  $accounts = get_accounts($bdd_dir_path, $bdd_file_path);
  if (account_exits($accounts, @$_GET['login']) !== FALSE)
  {
      delete_account($accounts, @$_GET['login'], $bdd_file_path);
      redirect('../views/account.phtml', 302);
  }
  else redirect('../views/account.phtml', 302);
}

remove_account();


?>
