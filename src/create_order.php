<?php
session_start();
include_once ('const.php');
include_once ('modele/render.php');
include_once ('modele/cookie_helper.php');
include_once ('modele/order_helper.php');

function add_order()
{
    $cookie_name;
    $orders;

    if (@$_SESSION["logged_on_user"] != NULL)
      $cookie_name = @$_SESSION["logged_on_user"];
    else
      redirect('../views/sign_alt.phtml', 302);
    if (isset($_COOKIE[$cookie_name]))
    {
      $cookie_content = get_cookie_content($_COOKIE[$cookie_name]);
      if (empty($cookie_content['item']))
      {
        redirect('../views/cart.phtml', 302);
      }
      else
      {
        $orders = get_orders(BDD_PATH, BDD_ORDER);
        foreach ($cookie_content['item'] as $key =>$value)
        {
          $order['art_title'] = $key;
          $order['art_quant'] = $value;
        }
        create_order($orders, @$_SESSION["logged_on_user"], $order, BDD_ORDER);
        destroy_cookie($cookie_name);
        redirect('../index.php', 302);
      }
    }
    else
    {
      redirect('../views/cart.phtml', 302);
    }
}

add_order();

?>
