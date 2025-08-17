
<?php
use Illuminate\Support\Facades\Route;
Route::get("/", fn() => view("welcome"));  // uses resources/views/welcome.blade.php
