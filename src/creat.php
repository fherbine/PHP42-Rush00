<?php

include ('const.php');
include ('modele/user_helper.php');

function  add_account()
{
    $accounts;
    $path = ROOT . DS . 'bdd';
    $file_path = $path .DS . 'filename';

    if (@$_POST['submit'] === 'OK')
    {
        $accounts = get_accounts();
        if (account_exits($accounts, @$_POST['login']) === FALSE
        && @$_POST['login'] != NULL
        && @$_POST['passwd'] != NULL
        && @$_POST['name'] != NULL)
        {
            $values['login'] = @$_POST['login'];
            $values['passwd'] = hash('whirlpool, '@$_POST['passwd']);
            $values['name'] = @$_POST['name'];
            create_account($accounts, $values);
            echo ("OK\n");
        }
        else echo "ERROR\n";
    }
    else
      echo "ERROR\n";
}

add_account();

?>
