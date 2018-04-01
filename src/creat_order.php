<?php

include ('const.php');
include ('modele/cookie_helper.php');
include ('modele/card_helper.php');

function create_order()
{
    $cookie_name;
    $orders;

    $cookie_name = "card";
    $orders = get_orders(BDD_PATH, BDD_ORDER);
    if (isset($_COOKIE[$cookie_name]))
    {
      $order = get_cookie_content();
      
      create_order($orders, $order, BDD_ORDER);
    }
}

create_order();

?>
