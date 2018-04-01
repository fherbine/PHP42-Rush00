<?php

function get_orders($dir_path, $file_path)
{
  $orders;

  if (!file_exists($file_path))
  {
      @mkdir($dir_path, 0777, TRUE);
      $orders = [];
      file_put_contents($file_path, serialize($orders));
  }
  else
  {
      $orders = file_get_contents($file_path);
      $orders = unserialize($orders);
      if ($orders === FALSE)
        $orders = [];
  }
  return ($orders);
}

function order_exits($orders, $order)
{
  $tmp = order_encode($order);
  foreach ($orders as $value) {
    if ($value === $tmp)
      return TRUE;
  }
  return FALSE;
}

function order_encode($order)
{
  return base64_encode($order);
}

function order_decode($order)
{
  return base64_decode($order);
}

function create_order($orders, $order, $file_path)
{
  $order = order_encode($order);
  $orders[] = $order;
  $orders = serialize($orders);
  file_put_contents($file_path, $orders);
}

function delete_order($orders, $order, $file_path)
{
  $tmp = order_encode($order);
  foreach ($orders as $key => $value) {
    if ($value === $tmp)
    {
        unset($orders[$key]);
        break ;
    }
  }
  $orders = serialize($orders);
  file_put_contents($file_path, $orders);
}

?>
