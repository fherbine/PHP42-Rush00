<?php

include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/user_helper.php');

function  add_account()
{
    $accounts;

    if (@$_POST['submit'] === 'OK')
    {
        $accounts = get_accounts(BDD_PATH, BDD_PASSWD);
        if (account_exits($accounts, @$_POST['login']) === FALSE
        && @$_POST['login'] != NULL
        && @$_POST['passwd'] != NULL
        && @$_POST['realname'] != NULL)
        {
            $values['login'] = @$_POST['login'];
            $values['passwd'] = hash('whirlpool', @$_POST['passwd']);
            $values['realname'] = @$_POST['name'];
            $values['admin'] = FALSE;
            create_account($accounts, $values['login'], $values, BDD_PASSWD);
            redirect('../views/success.html', 301);
        }
		      else redirect('../views/auth_failure.html');
    }
    else redirect('../index.php', 302);
}

add_account();

?>
