#!/usr/bin/env php
<?php

// Default patterns for common files
$patterns = [
    'test',
    'tests',
    'Tests',
    'travis',
    'demo',
    'example',
    'examples',
    'doc',
    'docs',
    'README*',
    'LICENSE*',
    'CHANGELOG*',
    'FAQ*',
    'CONTRIBUTING*',
    'HISTORY*',
    'UPGRADING*',
    'UPGRADE*',
    'package*',
    'readme*',
    '.travis.yml',
    '.scrutinizer',
    '.yml',
    'phpunit.xml*',
    'phpunit.php',
    '*.md',
    '.gitignore',
    'composer.json',
];

function expandTree($dir) {
    $directories = [];
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach($files as $file) {
        $directory = $dir.'/'.$file;
        if(is_dir($directory)) {
            $directories[] = $directory;
            $directories = array_merge($directories, expandTree($directory));
        }
    }
    return $directories;
}


function delTree($dir) {
    $files = array_diff(scandir($dir), ['.', '..']);
    foreach ($files as $file) {
        (is_dir($dir.'/'.$file)) ? delTree($dir.'/'.$file) : unlink($dir.'/'.$file);
    }
    return rmdir($dir);
}

foreach ($patterns as $pattern) {

    $directories = expandTree(dirname(__DIR__).'/vendor');

    foreach ($directories as $directory) {
        foreach (glob($directory .'/'. $pattern) as $file) {

            echo 'delete: '.$file.PHP_EOL;

            if (is_dir($file)) {
                delTree($file);
            } else {
               unlink($file);
            }
        }
    }
}

echo 'success'.PHP_EOL;
