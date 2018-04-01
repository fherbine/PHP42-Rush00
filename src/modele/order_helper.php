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

function create_order($orders, $order, $file_path)
{
  $orders[] = $order;
  $orders = serialize($orders);
  file_put_contents($file_path, $orders);
}

?>
