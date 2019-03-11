<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//GET ALL
Route::get('/activities', 'ActivityController@index');
Route::get('/agents', 'AgentController@index');
Route::get('/bookings', 'BookingController@index');
Route::get('/customers', 'CustomerController@index');
Route::get('/services', 'ServiceController@index');
Route::get('/servicecategories', 'ServiceCategoryController@index');

//relacionamento entre agents e services (profissional e serviços)
Route::get('/agentsservices', 'AgentsServicesController@index');

//GET BY ID
Route::get('/activity/{id}', 'ActivityController@show');
Route::get('/agent/{id}', 'AgentController@show');
Route::get('/booking/{id}', 'BookingController@show');
Route::get('/customer/{id}', 'CustomerController@show');
Route::get('/service/{id}', 'ServiceController@show');
Route::get('/servicecategory/{id}', 'ServiceCategoryController@show');

//recuparar os relacionamentos entre agents e services (profissional e serviços) através do agent_id
Route::get('/agentsservices/{id}', 'AgentsServicesController@show');

//GET BY PARAM
Route::get('/agent/name/{name}', 'AgentController@searchName');                     //busca pelo primeiro nome agent
Route::get('/agent/email/{email}', 'AgentController@searchEmail');                  //busca pelo email de agent
Route::get('/customer/name/{name}', 'CustomerController@searchName');               //busca pelo primeiro nome de customer
Route::get('/customer/email/{email}', 'CustomerController@searchEmail');            //busca pelo email de customer
Route::get('/service/name/{name}', 'ServiceController@searchName');                 //busca pelo nome do service
Route::get('/servicecategory/name/{name}', 'ServiceCategoryController@searchName'); //busca pelo nome do service category

//POST ADD NEW
Route::post('/activity', 'ActivityController@store');
Route::post('/agent', 'AgentController@store');
Route::post('/booking', 'BookingController@store');
Route::post('/customer', 'CustomerController@store');
Route::post('/service', 'ServiceController@store');
Route::post('/servicecategory', 'ServiceCategoryController@store');

//adicionar um novo relacionamento entre agents e services (profissional e serviços)
Route::post('/agentsservices', 'AgentsServicesController@store');

//PUT UPDATE BY ID
Route::put('/activity/{id}', 'ActivityController@update');
Route::put('/agent/{id}', 'AgentController@update');
Route::put('/booking/{id}', 'BookingController@update');
Route::put('/customer/{id}', 'CustomerController@update');
Route::put('/service/{id}', 'ServiceController@update');
Route::put('/servicecategory/{id}', 'ServiceCategoryController@update');

//alterar dados de um relacionamento entre agents e services (profissional e serviços)
Route::put('/agentsservices/{id}', 'AgentsServicesController@update');

//DELETE BY ID
Route::delete('/activity/{id}', 'ActivityController@delete');
Route::delete('/agent/{id}', 'AgentController@delete');
Route::delete('/booking/{id}', 'BookingController@delete');
Route::delete('/customer/{id}', 'CustomerController@delete');
Route::delete('/service/{id}', 'ServiceController@delete');
Route::delete('/servicecategory/{id}', 'ServiceCategoryController@delete');

//alterar dados de um relacionamento entre agents e services (profissional e serviços)
Route::delete('/agentsservices/{id}', 'AgentsServicesController@delete');