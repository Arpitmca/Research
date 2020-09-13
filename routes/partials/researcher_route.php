<?php

Route::get("/researcher/{researcher}/profile", "Researcher\ResearcherController@getProfile")->name("researcher.profile.public");
Route::get("/researcher/{researcher}/researches", "Researcher\ResearcherController@getResearches")->name("researcher.researchs.public");