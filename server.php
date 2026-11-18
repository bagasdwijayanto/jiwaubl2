<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$root = __DIR__;
$public = $root.'/public';
$relative = ltrim($uri, '/');

/*
 * "php artisan serve" menjalankan server dengan docroot di folder public,
 * sementara Blade memanggil asset('public/template/...'). Router bawaan
 * hanya mengecek file relatif terhadap docroot sehingga URL tersebut 404.
 * Di sini kita cek juga path relatif terhadap root project.
 */
$candidates = [$relative];

// Template lama memanggil assets/compiled/... (tanpa prefix public).
if (str_starts_with($relative, 'assets/')) {
    $candidates[] = 'public/template/back/'.substr($relative, strlen('assets/'));
}

// Beberapa referensi masih memakai .scss, padahal file yang ada .css.
if (str_ends_with($relative, '.scss')) {
    $candidates[] = substr($relative, 0, -5).'.css';
}

// Favicon.png tidak disertakan template; gunakan logo yang sudah ada.
if (str_ends_with($relative, 'favicon.png')) {
    $candidates[] = 'public/template/front/images/logoPPIK.png';
}

// Foto profil yang belum diunggah diganti placeholder bawaan.
if (str_starts_with($relative, 'public/storages/profil/')) {
    $candidates[] = 'public/no-image.png';
}

$types = [
    'css' => 'text/css',
    'js' => 'application/javascript',
    'mjs' => 'application/javascript',
    'json' => 'application/json',
    'svg' => 'image/svg+xml',
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif' => 'image/gif',
    'webp' => 'image/webp',
    'ico' => 'image/x-icon',
    'woff' => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf' => 'font/ttf',
    'eot' => 'application/vnd.ms-fontobject',
    'map' => 'application/json',
];

foreach ($candidates as $candidate) {
    foreach ([$root.'/'.$candidate, $public.'/'.$candidate] as $candidatePath) {
        $file = realpath($candidatePath);

        if ($file === false || ! is_file($file)) {
            continue;
        }

        if (! str_starts_with($file, $root.DIRECTORY_SEPARATOR)) {
            continue;
        }

        // Biarkan file PHP diproses oleh Laravel, bukan dikirim sebagai teks.
        if (strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'php') {
            continue;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $type = $types[$extension] ?? (mime_content_type($file) ?: 'application/octet-stream');

        header('Content-Type: '.$type);
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Length: '.filesize($file));
        readfile($file);

        return true;
    }
}

require_once __DIR__.'/index.php';
