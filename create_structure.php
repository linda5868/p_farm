<?php
/**
 * Script to generate pig-farm folder structure
 * Run: php create_structure.php
 */

$baseDir = __DIR__ . '/p_farm';

$structure = [
    'public/css' => ['style.css'],
    'public/js' => ['app.js'],
    'app/controllers' => ['ApiController.php', 'PigController.php', 'StockController.php'],
    'app/models' => ['Model.php', 'Pig.php', 'Stock.php'],
    'app/views/pigs' => ['list.php', 'form.php'],
    'app/views/stocks' => ['list.php', 'form.php'],
    'core' => ['App.php', 'Router.php'],
    '' => ['config.php', 'index.php', '.htaccess', 'README.md'],
    'migrations' => ['create_tables.sql'],
];

// Create directories and files
foreach ($structure as $path => $files) {
    $dir = $baseDir . '/' . $path;
    
    // Make directory if not exists
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
        echo "Created directory: $dir\n";
    }
    
    // Create files
    foreach ($files as $file) {
        $filePath = $dir . '/' . $file;
        if (!file_exists($filePath)) {
            file_put_contents($filePath, ""); // empty file
            echo "Created file: $filePath\n";
        }
    }
}

echo "\n✅ Project structure created in: $baseDir\n";
