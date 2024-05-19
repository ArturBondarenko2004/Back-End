<?php

function autoload($className) {
    $parts = explode('\\', $className);
    // Останній елемент масиву - це ім'я класу без неймспейсу
    $className = end($parts);
    $rootPath = __DIR__;

    switch ($className) {
        case 'UserModels':
            $file = $rootPath . '/Models/' . $className . '.php';
            break;
        case 'UserController':
            $file = $rootPath . '/Controllers/' . $className . '.php';
            break;
        case 'UserViews':
            $file = $rootPath . '/Views/' . $className . '.php';
            break;
        default:
            echo "Клас $className не знайдено";
            return;
    }

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Файл $file не знайдено";
    }
}
spl_autoload_register('autoload');
