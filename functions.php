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
    header("Location: {$name}");
}

function getRandomFileName(string $path = '/', string $ext = '')
{
    do {
        $name = md5( microtime() . rand(0, 9999) );
        $file = "{$path}{$name}.{$ext}";
    } while ( file_exists($file) );

    return $file;
}

function prepareForCsv($text)
{
    $pattern = "/\b[а-яА-яёЁa-zA-Z]+\b/u"; // предлоги и союзы тоже считаются словами

    $num_of_words = preg_match_all($pattern, $text, $tmp);

    $word_nums = [];


    foreach ( $tmp[0] as $item ) {
        $word_nums[$item] = isset( $word_nums[$item] ) ? $word_nums[$item] + 1 : 1;
    }

    foreach ( $word_nums as $key => $val ) {
        $prepared_arr[] = array($key, $val);
    }

    $prepared_arr[] = array('num of words', $num_of_words);

    return $prepared_arr;
}

function storeAsCsv($data, $dir)
{
    if ( $dir[0] != '/' ) {
        $dir = '/' . $dir;
    }

    $dirpath = STORE_PATH . $dir;
    
    $filename = getRandomFileName($dirpath, 'csv');
    
    if ( !file_exists($dirpath) ) {
        mkdir($dirpath, 0777, true);
    }

    $handle = fopen($filename, 'w');

    if (!$handle) {
        throw new Exception();
    }

    foreach ( $data as $item ) {
        fputcsv($handle, $item);
    }

    fclose($handle);
}