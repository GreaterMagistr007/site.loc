<?php
function sayHello()
{
    echo('Привет от сайта ' . PARAMS['title'] . '!');
}

function dd(...$vars)
{
    foreach ($vars as $var) {
        pretty_dump($var);
    }
    die();
}

function pretty_dump(...$vars)
{
    $k = debug_backtrace();
    $calledFrom = $k[0] ? $k[0] : false;
    if (isset($k[1])) {
        $calledFrom = $k[1];
    }
    echo('<div class="pretty_dump">');


    if ($calledFrom && is_array($calledFrom)) {
        echo('<p>Called from:</p>');
        echo('<p><b>' . $calledFrom['file'] . ':' . $calledFrom['line'] . '</b></p>');
        echo('<p></p>');
    }

    foreach ($vars as $var) {
        echo('<pre>');
        var_dump($var);
        echo('</pre>');
    }

    echo('</div>');
    echo('<style>
        .pretty_dump {
            background-color: #18171B!important;
            color: #56DB3A!important;
            padding: 5px;
            margin-top: 5px;
        }
        .pretty_dump p {
            padding: 2px;
            margin: 0px;
        }

</style>');
}

function dump(...$vars)
{
    foreach ($vars as $var) {
        pretty_dump($var);
    }
}

function core_dir($path = '')
{
    $result = __DIR__;
    if ($path) {
        if ($path[0] !== '\\') {
            $result .= '\\';
        }
    }
    return $result . $path;
}

function site_dir($path = '')
{
    $result = explode('\\', core_dir());
    array_pop($result);

    $result = implode('\\', $result);

    if ($path) {
        if ($path[0] !== '\\') {
            $result .= '\\';
        }
    }
    return $result . $path;
}

spl_autoload_register(function ($class) {
    $fileName = site_dir($class . '.php');
    include_once ( $fileName );
});

function redirect($uri = '/', $code = 302) {

    if (mb_substr(mb_strtolower($uri), 0, 4) === 'http') {
        $newLocation = $uri;
    } else {
        $newLocation = \core\modules\Request::href($uri);
    }

    header("Location $newLocation", true, $code);
    exit();
}

function theme_dir($path = '')
{
    $newPath = '/theme';
    if ($path) {
        if ($path[0] !== '\\') {
            $newPath .= '\\';
        }
    }
    return site_dir($newPath . $path);
}

function DS($path = '/') {
    $arr = ['/', '\\', '\\\\'];
    return str_replace($arr, DIRECTORY_SEPARATOR, $path);
}

function template_block($blockName)
{
    include theme_dir('page_blocks/' . $blockName . '.php' );
}

function site_title()
{
    return CONFIG['title'];
}

function head_tags()
{
    return CONFIG['head_tags'];
}

function success($text, $return_values_array = [])
{
    if (is_array($text)) {
        $return_values_array = $text;
        $text = 'ok';
    }
    exit(
        json_encode(
            array_merge(
                [
                    "text" =>  $text,
                    "type"  =>  "success"
                ],
                $return_values_array
            )
        )
    );
}

/**
 * Отрицательный ответ для Api
 * @param $text
 * @param $return_values_array
 * @return void
 */
function error($text, $return_values_array = [])
{
    if (is_array($text)) {
        $return_values_array = $text;
        $text = 'error';
    }
    exit(
        json_encode (
            array_merge(
                [
                    "text" => $text,
                    "type" => "error"
                ],
                $return_values_array
            )
        )
    );
}