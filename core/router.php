<?php
use core\modules\Route;

// роутинг API
Route::add('/check-articles-file', 'Api@checkArtickesFile', 'get');

// Перечислим доступные страницы ошибок:
Route::add('/404', 'Site@get404Page');

// Страницы сайта
Route::add('/', 'Site@getMainPage');
Route::add('/{article}', 'Site@getArticlePage');

