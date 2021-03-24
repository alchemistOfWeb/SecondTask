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
        $file_text = file_get_contents($_FILES['file']['tmp_name']);

        storeAsCsv( prepareForCsv($file_text), 'files/' );
    }

    return redirect('/form');
});
