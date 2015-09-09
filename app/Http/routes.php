<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/', 'Auth\AuthController@Authenticate');

Route::get('/', 'TradeController@Bitcoin');


Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');

Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/profile', 'UserController@Info');

Route::post('/profile', 'UserController@UpdateInfo');

Route::get('/password', 'UserController@ChangePassword');

Route::post('/password', 'UserController@UpdatePassword');

Route::get('/fund', 'UserController@fund');

Route::get('/fund/history', 'UserController@fundHistoryShow');

Route::post('/fund/history', 'UserController@fundHistory');

Route::get('/fund/deposit/btc', 'UserController@depositBitcoinShow');

Route::post('/fund/deposit/btc', 'UserController@depositBitcoin');

Route::get('/fund/withdraw/btc', 'UserController@withdrawBitcoinShow');

Route::post('/fund/withdraw/btc', 'UserController@withdrawBitcoin');

Route::get('/fund/deposit/irr', 'UserController@depositRialShow');

Route::post('/fund/deposit/irr', 'UserController@depositRial');

Route::get('/fund/withdraw/irr', 'UserController@withdrawRialShow');

Route::post('/fund/withdraw/irr', 'UserController@withdrawRial');


Route::get('/bank/irr', 'UserController@bankIrr');

Route::post('/bank/irr', 'UserController@addBankIrr');

Route::post('/bank/irr/delete/{id}', 'UserController@deleteBankIrr');

Route::get('/bank/btc', 'UserController@addressBtc');

Route::post('/bank/btc', 'UserController@addAddressBtc');

Route::post('/bank/btc/delete/{id}', 'UserController@deleteAddressBtc');


Route::post('/user/update/balance', 'UserController@updateBalance');


Route::get('/trade/webmoney', 'TradeController@Webmoney');

Route::get('/trade/bitcoin', 'TradeController@Bitcoin');

Route::post('/trade/bitcoin/sell', 'TradeController@sellBitcoin');

Route::post('/trade/bitcoin/buy', 'TradeController@buyBitcoin');

Route::post('/trade/bitcoin/bitcoin-list', 'TradeController@getBitcoinTable');

Route::post('/trade/bitcoin/active-trades', 'TradeController@getBitcoinActiveTrades');

Route::get('/trade/perfectmoney', 'TradeController@Perfectmoney');

Route::get('/trades/active', 'UserController@activeTradesShow');

Route::post('/trades/active', 'UserController@activeTrades');

Route::post('/trades/active/delete/{id}', 'UserController@cancelActiveTrades');

Route::get('/trades/history', 'UserController@tradeHistoryShow');

Route::post('/trades/history', 'UserController@tradeHistory');

Route::post('/trade/update/cancel', 'TradeController@cancelTrade');


Route::get('/iadmin', 'AdminController@getDashboard');

Route::get('/iadmin/login', 'AdminAuthController@getLogin');

Route::post('/iadmin/login', 'AdminAuthController@postLogin');

Route::get('/iadmin/logout', 'AdminAuthController@getLogout');

Route::get('/iadmin/dashboard', 'AdminController@getDashboard');

Route::get('/iadmin/user/credit', 'AdminController@getUserCredit');

Route::get('/iadmin/user/credit/search', 'AdminController@getSearchUserCredit');

Route::post('/iadmin/user/credit/{id}', 'AdminController@postUserCredit');

Route::get('/iadmin/user/profile', 'AdminController@getUserProfile');

Route::get('/iadmin/user/profile/search', 'AdminController@getSearchUserProfile');

Route::get('/iadmin/user/profile/{id}', 'AdminController@getUserDetail');

Route::post('/iadmin/user/profile/{id}', 'AdminController@postUserDetail');

Route::get('/iadmin/user/new', 'AdminController@getUserNew');

Route::post('/iadmin/user/new', 'AdminController@postUserNew');

Route::get('/iadmin/trade/active', 'AdminController@getTradeActive');

Route::get('/iadmin/trade/active/search', 'AdminController@getSearchTradeActive');

Route::get('/iadmin/trade', 'AdminController@getTradeAll');

Route::get('/iadmin/trade/search', 'AdminController@getSearchTradeAll');

Route::get('/iadmin/trade/{id}', 'AdminController@getTradeDetail');

Route::get('/iadmin/transaction/active', 'AdminController@getTransactionActive');

Route::post('/iadmin/transaction/confirm/{id}', 'AdminController@getTransactionConfirm');

Route::get('/iadmin/transaction', 'AdminController@getTransactionAll');

Route::get('/iadmin/transaction/search', 'AdminController@getSearchTransactionAll');

Route::get('/iadmin/transaction/{id}', 'AdminController@getTransactionDetail');

Route::get('/iadmin/bank/irr', 'AdminController@getBankIrr');

Route::get('/iadmin/bank/irr/{id}', 'AdminController@getBankIrrDetail');

Route::get('/iadmin/bank/btc', 'AdminController@getBankBtc');

Route::get('/iadmin/bank/btc/{id}', 'AdminController@getBankBtcDetail');

Route::get('/iadmin/fee', 'AdminController@getFeeAll');

Route::get('/iadmin/fee/1', 'AdminController@getFeeDetail');

Route::get('/iadmin/rate', 'AdminController@getRateAll');

