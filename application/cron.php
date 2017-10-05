<?php

// Local base URL
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    $base_url = 'http://localhost/guesschan/';
}
else {
    $base_url = 'https://gooseweb.io/else/guesschan/';
}

// Token
// This variable to be changed in live version
$cron_token = '1234';

// Taxes
$route = 'main/download_4chan/';
echo file_get_contents($base_url . $route . $cron_token);