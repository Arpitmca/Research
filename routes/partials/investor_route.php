<?php

Route::get("/myinvestments", "Investor\InvestorController@getInvestments")->name("investor.mine");