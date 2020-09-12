<?php

Route::get("/paytm/test", "PayTM\PayTMController@testAPayment")->name("paytm.test");
Route::post("/paytm/glide", "PayTM\PayTMController@catchGlide")->name("paytm.glide");
Route::any("/paytm/catch", "PayTM\PayTMController@catchWebhook")->name("paytm.catch");


Route::get("/transaction/{transaction}/paytm/pay", "Transaction\TransactionController@getOrderPayTMPay")->name("transaction.paytm.pay");

Route::get("/transaction/{transaction}/failed", "Transaction\TransactionController@getFailedPaymentResponse")->name("transaction.failed");
Route::get("/transaction/paytm/{transaction}/retry", "Transaction\TransactionController@getRetryPayTMPayment")->name("transaction.retry");

Route::get("/transaction/{transaction}/confirmation", "Transaction\TransactionController@getPaymentConfirmation")->name("transaction.confirmation");
