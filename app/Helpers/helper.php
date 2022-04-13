<?php

function activeRoute($route, $isClass = false): string
{
    $requestUrl = request()->is($route);

    if ($isClass) {
        return $requestUrl ? $isClass : '';
    } else {
        return $requestUrl ? 'active' : '';
    }
}

function pr($v, $exit = 0): void
{
    echo "<pre>";
    print_r($v);
    if($exit){
        exit;
    }
}
