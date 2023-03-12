<?php
function route_request()
{
  $controller_file = get_path_segments();
  $controller = get_controller($controller_file);

  $GLOBAL_VARS =  [
    // 'page_title' => "Bla",
    'body_content' => $controller,
    'requested_path' => $controller_file,
  ];

  $page_content = get_layout($GLOBAL_VARS);
  echo $page_content;
}

route_request();

function get_path_segments()
{
  $path = trim($_SERVER['REQUEST_URI'], '/');
  $paths =  remove_router_file(explode('/', $path));

  return count($paths) > 0 ? implode('/', $paths) . '.php' : '';
}

function remove_router_file($array)
{
  foreach ($array as $key => $value) {
    $is_base_file = strpos($value, '.php') !== false;
    if ($is_base_file || $value == '') unset($array[$key]);
  }

  return $array;
}

function get_controller($file = "")
{
  $file = $file == '' ? 'home.php' : $file;

  return get_included_file("controllers/$file");
}

function get_layout($variables = [])
{
  $file = is_api_page($variables['requested_path']) ? 'api.php' : 'page.php';

  return get_included_file("layout/$file", $variables);
}

function is_api_page($path) {
  $is_api_path = substr($path, 0, 4) == 'api/';
  $is_api = $path === 'api.php';

  return $is_api_path || $is_api;
}

function get_included_file($file, $variables = [])
{
  if (!is_file($file)) return get_included_file('controllers/404.php');

  ob_start();
  extract($variables);
  include $file;
  $output = ob_get_clean();

  return $output;
}
