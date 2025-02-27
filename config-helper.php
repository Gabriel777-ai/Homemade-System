<?php

function config($key, $default = null) {
    static $config;
    if (!$config) {
        $config = include __DIR__.'../config-names.php';

        $envFile = __DIR__ . '/../../.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0 || strpos($line, '=') === false) {
                    continue;
                }
                [$name, $value] = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value, "\"'");
                $config['env'][$name] = $value;
            }
        }
    }

    $keys = explode('.', $key);
    $value = $config;
    foreach ($keys as $segment) {
        if (isset($value[$segment])) {
            $value = $value[$segment];
        } else {
            return $default;
        }
    }
    return $value;
}