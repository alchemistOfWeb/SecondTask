<?php

use App\Route;

Route::get('/form', function(){
    return view('form');
});

Route::post('/form', function(){
    $text = $_REQUEST['text'];
    $file = $_FILES['file'];
    dd($file);
    // storeText($text, 'csv', 'texts/');
    // storeFile($file, 'csv', 'files/');

    storeAsCsv(prepareForCsv($text), 'texts/');
    storeAsCsv(prepareForCsv($file), 'files/');

    return redirect('/form');
});

function prepareForCsv($text)
{
    $pattern = "/\b[а-яА-яёЁa-zA-Z]+\b/u"; // предлоги и союзы тоже считаются словами

    $num_of_words = preg_match_all($pattern, $text, $tmp);

    $word_nums = [];

    foreach ( $tmp[0] as $item ) {
        $word_nums[$item] = $word_nums[$item] ? $word_nums[$item] + 1 : 1;
    }

    // foreach ( $word_nums as $key => $val ) {
    //     echo "{$key} : {$val}" . PHP_EOL; 
    // }

    $word_nums['num of words'] = $num_of_words;

    return $word_nums;
}
