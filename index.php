<?php
/**
 * MoneyFrog ERP - Main Application Entry Point
 * 
 * @author MoneyFrog Development Team
 * @version 1.0.0
 */

// Define application constants
define('APP_NAME', 'MoneyFrog ERP');
define('APP_VERSION', '1.0.0');
define('APP_ROOT', __DIR__);

// Start session
session_start();

// Include configuration
require_once 'config/config.php';

// Include autoloader
require_once 'includes/autoloader.php';

// Initialize the application
$app = new Application();
$app->run();
?>