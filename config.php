<?php
session_start();

// تنظیمات پایگاه داده
define('DB_HOST', 'localhost');
define('DB_NAME', 'gym_management');
define('DB_USER', 'root');
define('DB_PASS', '');

// تنظیمات سیستم
define('SITE_NAME', 'سیستم مدیریت باشگاه ورزشی');
define('SITE_URL', 'http://localhost/gym-management/');
define('CURRENCY', 'تومان');

// تنظیمات تاریخ شمسی
date_default_timezone_set('Asia/Tehran');

// تابع اتصال به دیتابیس
function getDB() {
    static $db = null;
    if ($db === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES 'utf8'");
            $db->exec("SET CHARACTER SET utf8");
        } catch(PDOException $e) {
            die("خطا در اتصال به پایگاه داده: " . $e->getMessage());
        }
    }
    return $db;
}

// تابع فارسی سازی تاریخ
function toPersianDate($date) {
    if (!$date) return '';
    $date = new DateTime($date);
    $persian = new IntlDateFormatter(
        'fa_IR@calendar=persian',
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        'Asia/Tehran',
        IntlDateFormatter::TRADITIONAL
    );
    return $persian->format($date);
}

// تابع نمایش پیام
function showMessage($type, $message) {
    $icons = [
        'success' => 'check-circle',
        'error' => 'exclamation-circle',
        'warning' => 'exclamation-triangle',
        'info' => 'info-circle'
    ];
    
    return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                <i class="fas fa-' . ($icons[$type] ?? 'info-circle') . '"></i> ' . $message . '
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>';
}
?>
