<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/ilocations'], function (Router $router) {
    $router->bind('country', function ($id) {
        return app('Modules\Ilocations\Repositories\CountryRepository')->find($id);
    });
    $router->get('countries', [
        'as' => 'admin.ilocations.country.index',
        'uses' => 'CountryController@index',
        'middleware' => 'can:ilocations.countries.index'
    ]);
    $router->get('countries/create', [
        'as' => 'admin.ilocations.country.create',
        'uses' => 'CountryController@create',
        'middleware' => 'can:ilocations.countries.create'
    ]);
    $router->post('countries', [
        'as' => 'admin.ilocations.country.store',
        'uses' => 'CountryController@store',
        'middleware' => 'can:ilocations.countries.create'
    ]);
    $router->get('countries/{country}/edit', [
        'as' => 'admin.ilocations.country.edit',
        'uses' => 'CountryController@edit',
        'middleware' => 'can:ilocations.countries.edit'
    ]);
    $router->put('countries/{country}', [
        'as' => 'admin.ilocations.country.update',
        'uses' => 'CountryController@update',
        'middleware' => 'can:ilocations.countries.edit'
    ]);
    $router->delete('countries/{country}', [
        'as' => 'admin.ilocations.country.destroy',
        'uses' => 'CountryController@destroy',
        'middleware' => 'can:ilocations.countries.destroy'
    ]);
    $router->bind('province', function ($id) {
        return app('Modules\Ilocations\Repositories\ProvinceRepository')->find($id);
    });
    $router->get('provinces', [
        'as' => 'admin.ilocations.province.index',
        'uses' => 'ProvinceController@index',
        'middleware' => 'can:ilocations.provinces.index'
    ]);
    $router->get('provinces/create', [
        'as' => 'admin.ilocations.province.create',
        'uses' => 'ProvinceController@create',
        'middleware' => 'can:ilocations.provinces.create'
    ]);
    $router->post('provinces', [
        'as' => 'admin.ilocations.province.store',
        'uses' => 'ProvinceController@store',
        'middleware' => 'can:ilocations.provinces.create'
    ]);
    $router->get('provinces/{province}/edit', [
        'as' => 'admin.ilocations.province.edit',
        'uses' => 'ProvinceController@edit',
        'middleware' => 'can:ilocations.provinces.edit'
    ]);
    $router->put('provinces/{province}', [
        'as' => 'admin.ilocations.province.update',
        'uses' => 'ProvinceController@update',
        'middleware' => 'can:ilocations.provinces.edit'
    ]);
    $router->delete('provinces/{province}', [
        'as' => 'admin.ilocations.province.destroy',
        'uses' => 'ProvinceController@destroy',
        'middleware' => 'can:ilocations.provinces.destroy'
    ]);
// append


});