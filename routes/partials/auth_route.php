<?php

Auth::routes(['verify' => true]);
Route::get("/logout", "Auth\LoginController@logout")->name("logout.get");