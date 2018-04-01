<?php

session_start();
include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/user_helper.php');

function  add_account()
{
    $accounts;

    if (@$_POST['submit'] === 'OK' || @$_POST['submit'] === 'ADD')
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
            if (@$_POST['admin'] != NULL)
              $values['admin'] = TRUE;
            else
              $values['admin'] = FALSE;
            create_account($accounts, $values['login'], $values, BDD_PASSWD);
            if (@$_SESSION["logged_on_admin"] === TRUE)
              redirect('../views/account.phtml', 302);
            else
              redirect('../views/success.html', 301);
        }
		    else
        {
          if (@$_SESSION["logged_on_admin"] === TRUE)
            redirect('../views/account.phtml', 302);
          else
            redirect('../views/auth_failure.html', 302);
        }
    }
    else{
      if (@$_SESSION["logged_on_admin"] === TRUE)
        redirect('../views/account.phtml', 302);
      else
        redirect('../index.php', 302);
    }
}

add_account();

?>
