<?php

Route::get("/myinvestments", "Investor\InvestorController@getInvestments")->name("investor.mine");

Route::get("/investor/{investor}/profile/public", "Investor\InvestorController@getPublicProfile")->name("investor.profile.public");
Route::get("/investor/{investor}/investments/public", "Investor\InvestorController@getPublicInvestments")->name("investor.investments.public");

