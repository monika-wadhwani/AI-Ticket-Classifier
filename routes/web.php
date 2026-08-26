<?php

use App\Services\AIClassifierService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-ai', function (AIClassifierService $classifier) {
    $result = $classifier->classify('App crashing', 'The app crashes every time I click submit button');
    return response()->json($result);
});
