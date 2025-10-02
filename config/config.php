<?php
/**
 * Application Configuration
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'moneyfrog_erp');
define('DB_USER', 'root');
define('DB_PASS', '');

// Application Settings
define('TIMEZONE', 'UTC');
define('DEBUG_MODE', true);

// Set timezone
date_default_timezone_set(TIMEZONE);

// Error reporting based on debug mode
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
?>