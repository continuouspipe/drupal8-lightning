<?php

foreach(array(__DIR__ . '/settings.global.php', __DIR__ . '/settings.env.php', __DIR__ . '/settings.local.php') as $file) {
    if (file_exists($file)) {
        include_once $file;
    }
}
