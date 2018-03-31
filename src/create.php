<?php

include ('const.php');
include ('modele/render.php');
include ('modele/user_helper.php');

function  add_account()
{
    $accounts;
    $bdd_dir_path = ROOT . DS . 'bdd';
    $bdd_file_path = ROOT . DS . 'bdd' . DS . 'passwd';

    if (@$_POST['submit'] === 'OK')
    {
        $accounts = get_accounts($bdd_dir_path, $bdd_file_path);
        if (account_exits($accounts, @$_POST['login']) === FALSE
        && @$_POST['login'] != NULL
        && @$_POST['passwd'] != NULL
        && @$_POST['realname'] != NULL)
        {
            $values['login'] = @$_POST['login'];
            $values['passwd'] = hash('whirlpool', @$_POST['passwd']);
            $values['realname'] = @$_POST['name'];
            $values['admin'] = FALSE;
            create_account($accounts, $values, $bdd_file_path);
            echo ("OK\n");
        }
        else redirect(ROOT . DS . 'index.php', 302);
    }
    else
      redirect(ROOT . DS . 'index.php', 302);
}

add_account();

?>
