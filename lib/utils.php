<?php

function base_path($path = '')
{
  // return "/index.php/$path";
  return "/$path";
}

function db()
{
  static $db;

  if ($db === null) {
    $params = [
      'dbname' => get_config('dbname'),
      'user' => get_config('user'),
      'password' => get_config('password'),
      'host' => 'tcp:cinvacademy.database.windows.net',
      'driver' => 'pdo_sqlsrv',
    ];

    $db = new \Spot\Locator(new \Spot\Config());
    $db->config()->addConnection('mssql', $params);
  }

  return $db;
}

function get_config($key)
{
  static $config;

  if (getenv($key)) {
    return getenv($key);
  }

  if ($config === null) {
    $config = parse_ini_file(__DIR__ . '/../config.env');
  }

  return $config[$key];
}

function validate_google_user($access_token, $sub)
{
  $response_string = file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?access_token=$access_token");
  $response = json_decode($response_string);

  if ($response->sub != $sub) throw new \Exception('Invalid user');
}

function is_logged_in()
{
  // var_dump($_SESSION);
  return isset($_SESSION['id']);
}

function validate_cinv_user()
{
  return is_logged_in() || throw new \Exception('Invalid user');
}

function set_session_data($user_data)
{
  foreach ($user_data as $key => $value) {
    $_SESSION[$key] = $value;
  }
}

function flash_message()
{
  static $flash_message;
  if ($flash_message === null) {
    $flash_message = new \Plasticbrain\FlashMessages\FlashMessages();
  }

  return $flash_message;
}

function redirect($path)
{
  header('Location: ' . $path);
  exit();
}

function is_site_admin($email)
{
  return in_array($email, [
    'ntsu@uncg.edu',
    'clafiemo@uncg.edu',
    'njvino@uncg.edu',
    'slhitney@uncg.edu',
  ]);
}
