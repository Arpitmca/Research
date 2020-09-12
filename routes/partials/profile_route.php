<?php

Route::get("/profile/researcher", "Profile\ProfileController@getResearcherProfile")->name("researcher.profile")->middleware("verified", "auth", "researcher");
Route::get("/profile/researcher/edit", "Profile\ProfileController@getEditResearcherProfile")->name("researcher.profile.edit")->middleware("verified", "auth", "researcher");
Route::post("/profile/researcher/edit", "Profile\ProfileController@editResearcherProfile")->name("researcher.profile.edit.post")->middleware("verified", "auth", "researcher");

Route::get("/profile/investor", "Profile\ProfileController@getInvestorProfile")->name("investor.profile")->middleware("verified", "auth", "investor");
Route::get("/profile/investor/edit", "Profile\ProfileController@getEditInvestorProfile")->name("investor.profile.edit")->middleware("verified", "auth", "investor");
Route::post("/profile/investor/edit", "Profile\ProfileController@editInvestorProfile")->name("investor.profile.edit.post")->middleware("verified", "auth", "investor");