<?php

function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function view(string $name)
{
    $filename = "views/{$name}.php";

    if ( file_exists($filename) ) {
        require_once $filename;
    } else {
        require_once "views/errors/404";
    }
}

function redirect(string $name)
{
    header('Location: {$name}');
}

function getRandomFileName(string $path = '/', string $ext = '')
{
    do {
        $name = md5( microtime() . rand(0, 9999) );
        $file = "{$path}{$name}.{$ext}";
    } while ( file_exists($file) );

    return $name;
}

function storeText($data, $ext, $dir)
{
    $filename = STORE_PATH . $dir . getRandomFileName('/store/texts/text_', 'csv');

    file_put_contents($filename, $data);


    // $handle_text = fopen('/store/text_' . getRandomFileName('/store/file_', 'csv'), 'w+');
    // fputs($handle_text, $text);
    // fclose($handle_text);
}

function storeFile($data, $ext, $dir)
{
    $filename = STORE_PATH . $dir . getRandomFileName('/store/files/file_', 'csv');
    move_uploaded_file( $_FILES['userfile']['tmp_name'], $filename);
}

function storeAsCsv($data, $dir)
{
    if ($dir[0] != '/') $dir = '/' . $dir;
    // $dir = $dir[0] != '/' ? '/' . $dir : $dir;
    
    $filename = STORE_PATH . $dir . getRandomFileName(STORE_PATH . $dir, 'csv');

    $handle = fopen($filename, 'w+');

    fputcsv($handle, $data);

    fclose($handle);
}