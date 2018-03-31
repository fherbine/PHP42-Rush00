<?php

include ('const.php');
include ('modele/user_helper.php');

function auth($login, $passwd)
{
    $accounts;
    $account;
    $bdd_dir_path = ROOT . DS . 'bdd';
    $bdd_file_path = $path .DS . 'passwd';

    $accounts = get_accounts($bdd_dir_path, $bdd_file_path);
    if (($account = account_exits($accounts, $passwd, $bdd_file_path)) !== FALSE)
    {
        if (check_passwd($account, $passwd) === TRUE)
          return (TRUE);
    }
    return (FALSE);
}
?>
