<?php

use App\Route;

Route::get('/form', function(){
    return view('form');
});

Route::post('/form', function(){
    if ( isset($_REQUEST['text']) && !empty($_REQUEST['text']) ) {
        storeAsCsv( prepareForCsv($_REQUEST['text']), 'texts/' );
    }

    if ( isset($_FILES['file']) 
        && 
        !empty($_FILES['file']) 
        && 
        $_FILES['file']['error'] == 0 ) 
    {
        storeAsCsv( prepareForCsv($_FILES['file']), 'files/' );
    }

    return redirect('/form');
});

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
