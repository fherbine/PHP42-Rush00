#!/usr/bin/php
<?php

include_once ('src/const.php');
include_once ('src/modele/user_helper.php');
include_once ('src/modele/user_helper.php');
include_once ('src/modele/categorie_helper.php');
include_once ('src/modele/order_helper.php');
include_once ('src/modele/article_helper.php');

get_articles(BDD_PATH, BDD_ARTICLE);
get_categories(BDD_PATH, BDD_CATEGORIE);
get_orders(BDD_PATH, BDD_ORDER);
get_accounts(BDD_PATH, BDD_PASSWD);

$values['login'] = 'admin';
$values['realname'] = 'admin';
$values['passwd'] = 'admin';
$values['admin'] = TRUE;

create_account($accounts, $values['login'], $values, BDD_PASSWD);
?>
