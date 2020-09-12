<?php

Route::get("/", "HomeController@index")->name("home.index");
Route::get("/home", "HomeController@index")->name("home");

Route::get("/about", "HomeController@about")->name("about");


