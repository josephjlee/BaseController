<?php
namespace SlaxWeb\BaseController;

/**
 * Allow helper functions to write to output
 */
$helperOutput = false;
/**
 * Control if method_exists should return true for a custom _404 method
 */
$existing404 = false;

/**
 * Override CodeIgniter show_404 function
 *
 * To control and check when it is called from the BaseController
 */
function show_404()
{
    global $helperOutput;

    if ($helperOutput) {
        echo "show_404";
    }
}

function method_exists($class, $method)
{
    global $helperOutput;
    global $existing404;

    if ($helperOutput) {
        echo "{$method}\n";
    }

    if ($method === "_404") {
        return $existing404;
    }

    return \method_exists($class, $method);
}
