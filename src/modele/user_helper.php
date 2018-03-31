<?php

function get_accounts($path_file)
{
  $accounts;

  if (!file_exists('../bdd/passwd'))
  {
      @mkdir('../bdd/', 0777, TRUE);
      $accounts = [];
      file_put_contents('../bdd/passwd', serialize($accounts));
  }
  else
  {
      $accounts = file_get_contents('../bdd/passwd');
      $accounts = unserialize($accounts);
      if ($accounts === FALSE)
        $accounts = [];
  }
  return ($accounts);
}

function account_exits($accounts, $login)
{
    foreach ($accounts as $key => $value)
    {
      if ($login === $key)
        return $value;
    }
    return (FALSE);
}

function create_account($accounts, $values, $path_file)
{
    $accounts[$values['login']] = $values;
    $accounts = serialize($accounts);
    file_put_contents('../bdd/passwd', $accounts);
}

function check_passwd($account, $passwd)
{
    if (hash('whirlpool', $passwd) === $account['passwd'])
        return (TRUE);
    return (FALSE);
}

?>
