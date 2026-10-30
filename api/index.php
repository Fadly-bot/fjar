<?php
$requestedPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$requestedPath = rawurldecode($requestedPath);

// Serve static assets directly from the project root.
if (preg_match('#^/assets/(?:[A-Za-z0-9_-]+/)*[A-Za-z0-9_.-]+$#', $requestedPath)) {
    $projectRoot = realpath(__DIR__ . '/..');
    $assetPath = $projectRoot === false ? false : realpath($projectRoot . DIRECTORY_SEPARATOR . ltrim($requestedPath, '/'));
    $assetsRoot = $projectRoot === false ? false : realpath($projectRoot . DIRECTORY_SEPARATOR . 'assets');

    if ($assetPath !== false && $assetsRoot !== false && ($assetPath === $assetsRoot || str_starts_with($assetPath, $assetsRoot . DIRECTORY_SEPARATOR)) && is_file($assetPath)) {
        $mimeType = function_exists('mime_content_type') ? mime_content_type($assetPath) : false;
        if ($mimeType !== false) {
            header('Content-Type: ' . $mimeType);
        }
        readfile($assetPath);
        exit;
    }

    http_response_code(404);
    exit('Not Found');
}

$page = trim($requestedPath, '/');
$page = basename($page);
if ($page === '') {
    $page = 'index.php';
} elseif (!str_ends_with(strtolower($page), '.php')) {
    $page .= '.php';
}

// Only dispatch known top-level PHP pages; never expose include files.
$allowedPages = ['index.php', 'login.php', 'admin.php', 'client.php', 'logout.php'];
if (!in_array($page, $allowedPages, true)) {
    http_response_code(404);
    exit('Not Found');
}

$pagePath = realpath(__DIR__ . '/../' . $page);
if ($pagePath === false || !is_file($pagePath)) {
    http_response_code(404);
    exit('Not Found');
}

if (PHP_SAPI === 'cli-server') {
    $_SERVER['PHP_SELF'] = '/' . $page;
    $_SERVER['SCRIPT_NAME'] = '/' . $page;
}

require $pagePath;
