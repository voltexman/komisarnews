<?php
$dirs = ['app', 'routes', 'config', 'resources/views', 'database', 'bootstrap', 'tests'];
$errors = [];

function checkDir($dir) {
    global $errors;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)) as $file) {
        if ($file->getExtension() === 'php') {
            $output = shell_exec('php -l "' . $file->getPathname() . '" 2>&1');
            if (strpos($output, 'No syntax errors detected') === false) {
                $errors[] = $output;
            }
        }
    }
}

foreach ($dirs as $dir) {
    if (is_dir($dir)) checkDir($dir);
}

if (empty($errors)) {
    echo "No errors found\n";
} else {
    echo implode("\n", $errors);
}
