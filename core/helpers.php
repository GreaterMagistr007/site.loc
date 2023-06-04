<?php

use core\modules\Container;

/**
 * @param $module
 * @return Container|mixed
 */
function container($module = '')
{
    if ($module) {
        return $_SERVER['container']->load($module);
    }
    return $_SERVER['container'];
}

/**
 * @return \core\modules\Request
 */
function request($key = null, $value = null)
{
    $result = container('Request');
    if (!is_null($key) && is_string($key) && strlen($key)) {
        if (!is_null($value)) {
            $result->$key = $value;
            return $result;
        }
        return $result->$key;
    }
    return container('Request');
}
$request = request();

function href($path = '/')
{
    return request()::href($path);
}