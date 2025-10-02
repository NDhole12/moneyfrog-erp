<?php
/**
 * Simple Autoloader for MoneyFrog ERP
 */

spl_autoload_register(function ($class) {
    $directories = [
        'classes/',
        'models/',
        'controllers/',
        'includes/'
    ];
    
    foreach ($directories as $directory) {
        $file = APP_ROOT . '/' . $directory . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>