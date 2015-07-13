<?php
/** @var \Illuminate\Routing\Router $router */
/** @security \ResultSystems\SecurityRouter\Services\ServiceRouter $service */
//namespace \ResultSystems\Storehouse\Product\Http\Controllers

/**
 * Storehouse Product Category
 */

$router->match(['get', 'post'], '/search',
     $security
        ->setFixedSecurity(['as' => 'search', 'uses' => 'ProductCategoryController@search'])
        ->getConfig('storehouse-product', 'category.search'));

$router->match(['get', 'post'], '/view/search',
     $security
        ->setFixedSecurity(['as' => 'view.search', 'uses' => 'ProductCategoryController@viewSearch'])
        ->getConfig('storehouse-product', 'search'));

$router->get('',
    $security
        ->setFixedSecurity(['as' => 'create', 'uses' => 'ProductCategoryController@create'])
        ->getConfig('storehouse-product', 'category.create'));

$router->get('/{category}',
    $security
        ->setFixedSecurity(['as' => 'show', 'uses' => 'ProductCategoryController@show'])
        ->getConfig('storehouse-product', 'category.show'))->where('category', '[0-9]+');

$router->post('',
    $security
        ->setFixedSecurity(['as' => 'store', 'uses' => 'ProductCategoryController@store'])
        ->getConfig('storehouse-product', 'category.store'));

$router->put('/{category}',
    $security
        ->setFixedSecurity(['as' => 'edit', 'uses' => 'ProductCategoryController@update'])
        ->getConfig('storehouse-product', 'category.update'))->where('category', '[0-9]+');

$router->delete('/{category}',
    $security
        ->setFixedSecurity(['as' => 'delete', 'uses' => 'ProductCategoryController@destroy'])
        ->getConfig('storehouse-product', 'category.delete'))->where('category', '[0-9]+');
