<?php
require_once 'vendor/autoload.php';
require_once 'Route.php' ;

// Add base route (startpage)
Route::add('/',function() {
    include 'welcome.php';
});

// Get route example
Route::add('/get-box',function() {
    // Something here
},'get');

// Post route example
Route::add('/get-box',function() {
 // Something here
},'post');

// Accept only numbers as parameter example. 
Route::add('/foo/([0-9]*)/bar',function($var1) {
    echo $var1.' is a great number!';
});

Route::run('/');