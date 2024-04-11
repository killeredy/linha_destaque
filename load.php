<?php


$files = array(
    'function.php',
    'enqueue.php',

    'admin/register.php',
    'admin/render.php',
    'admin/save.php'
);


foreach ($files as $file) {
    require_once DESTAQUE_PATH . 'inc/' . $file;
}
