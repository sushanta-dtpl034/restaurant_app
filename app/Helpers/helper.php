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

/**
 * Return 
 */
function personalizationFieldType(): array
{
    $fieldTypes = ['Textbox','Single Selectbox','Multi Selectbox','Radio','Checkbox'];
    return $fieldTypes;
}

function pr($v, $exit = 0): void
{
    echo "<pre>";
    print_r($v);
    if($exit){
        exit;
    }
}



/**
 *  converts the first character of each word in a string to uppercase
 */

function string_ucwords($value){
    $value=strtolower($value);
    return ucwords($value);
} 
