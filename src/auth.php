<?php

include ('const.php');
include ('settings');
include ('modele/user_helper.php');

function auth($login, $passwd)
{
    $accounts;
    $account;
    $path = ROOT . DS . 'bdd';
    $file_path = $path .DS . 'filename';

    $accounts = get_accounts($path, $file_path);
    if (($account = account_exits($accounts, $passwd)) !== FALSE)
    {
        if (check_passwd($account, $passwd) === TRUE)
        {
          return (TRUE);
        }
    }
    return (FALSE);
}
?>
