<?php

function get_accounts($dir_path, $file_path)
{
  $accounts;

  if (!file_exists($file_path))
  {
      @mkdir($dir_path, 0777, TRUE);
      $accounts = [];
      file_put_contents($file_path, serialize($accounts));
  }
  else
  {
      $accounts = file_get_contents($file_path);
      $accounts = unserialize($accounts);
      if ($accounts === FALSE)
        $accounts = [];
  }
  return ($accounts);
}

function account_exits($accounts, $login)
{
    if (array_key_exists($login, $accounts))
    {
      return $accounts[$login];
    }
    return (FALSE);
}

function create_account($accounts, $key, $values, $file_path)
{
    $accounts[$key] = $values;
    $accounts = serialize($accounts);
    file_put_contents($file_path, $accounts);
}

function check_passwd($account, $passwd)
{
    if (hash('whirlpool', $passwd) === $account['passwd'])
        return (TRUE);
    return (FALSE);
}

function delete_account($accounts, $login, $file_path)
{
  unset($accounts[$login]);
  $accounts = serialize($accounts);
  file_put_contents($file_path, $accounts);
}

?>
