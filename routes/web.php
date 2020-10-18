<?php

Route::any('api/images/{location}/{filename}', function ($location, $filename) {
    $file = storage_path("app/$location/$filename");

    if(!file_exists($file)) {
    	$file = storage_path("app/$location/noimage.png");
    }
   
   	$fileMime = mime_content_type($file);
    return (new \Illuminate\Http\Response(file_get_contents($file), 200))->header('Content-Type', $fileMime);
});