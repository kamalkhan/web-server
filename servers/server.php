<?php

$file = getenv('PHP_SERVER_FILE');
$path = rtrim(getenv('PHP_SERVER_PATH') ?: __DIR__, '/');
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.0';
// $_SERVER['HTTP_HOST'] = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];

if ($uri !== '/' && file_exists($path.rtrim($uri, '/').'/index.php')) {
    $_SERVER['REQUEST_URI'] = rtrim($uri, '/') . '/';
}

if ($uri !== '/' && file_exists($path.$uri)) {
    return false;
}

if (is_file($file)) {
    require_once $file;
} else {
    header('http/1.0 404 Not Found', true, 404);
    echo '<code>404 Not found</code>';
}
