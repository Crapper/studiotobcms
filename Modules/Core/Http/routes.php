<?php

/*
|--------------------------------------------------------------------------
| Language Settings
|--------------------------------------------------------------------------
*/
$lang = null;

if (App::environment() == 'testing') {
    $lang = 'nl';
}

LaravelLocalization::setLocale($lang);
