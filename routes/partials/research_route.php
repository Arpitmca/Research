<?php

Route::get("/research/{research}/view", "Research\ResearchController@getViewResearch")->name("research.view");

Route::get("/research/{research}/fund", "Research\ResearchController@getFundPage")->name("research.fund")->middleware("auth", "investor");
Route::post("/research/{research}/fund", "Research\ResearchController@postFundPage")->name("research.fund.post")->middleware("auth", "investor");



Route::get("/myresearch", "Research\ResearchController@getMyResearch")->name("research.mine")->middleware("auth", "researcher");
Route::get("/researches", "Research\ResearchController@getResearches")->name("researches");


Route::get("/research/add", "Research\ResearchController@getAddResearch")->name("research.add")->middleware("auth", "researcher");
Route::post("/research/add", "Research\ResearchController@postAddResearch")->name("research.add.post")->middleware("auth", "researcher");


Route::get("/research/{research}/edit", "Research\ResearchController@getEditResearch")->name("research.edit")->middleware("auth", "researcher");
Route::post("/research/{research}/edit", "Research\ResearchController@postEditResearch")->name("research.edit.post")->middleware("auth", "researcher");


Route::get("/research/{research}/change/status", "Research\ResearchController@getChangeStatus")->name("research.change.status")->middleware("auth", "researcher");
