<?php
/** @var \Illuminate\Routing\Router $router */
/** @security \ResultSystems\SecurityRouter\Services\ServiceRouter $service */

$router->match(['get', 'post'], '/search',
     $security
        ->getConfig('storehouse-product', 'search', 'ProductController'));

$router->match(['get', 'post'], '/view/search',
     $security
        ->setFixedSecurity(['as' => 'view.search', 'uses' => 'ProductController@viewSearch'])
        ->getConfig('storehouse-product', 'search'));

$router->get('',
    $security
        ->getConfig('storehouse-product', 'create', 'ProductController'));

$router->get('/{product}',
    $security
        ->getConfig('storehouse-product', 'show', 'ProductController'))->where('product', '[0-9]+');

$router->post('',
    $security
        ->getConfig('storehouse-product', 'store', 'ProductController'));

$router->put('/{product}',
    $security
        ->setFixedSecurity(['as' => 'edit', 'uses' => 'ProductController@update'])
        ->getConfig('storehouse-product', 'update'))->where('product', '[0-9]+');

$router->delete('/{product}',
    $security
        ->setFixedSecurity(['as' => 'delete', 'uses' => 'ProductController@destroy'])
        ->getConfig('storehouse-product', 'delete'))->where('product', '[0-9]+');
/**
 * Storehouse Product API
 */
//namespace \ResultSystems\Storehouse\Product\Http\Controllers\API
/*$router->group($security
        ->setFixedSecurity(['prefix' => 'api', 'namespace'=>'API', 'a' => 'api.'])
        ->getConfigPackage('storehouse-product.api'), function () use ($router, $security) {
    require_once(__DIR__."/api_routes.php");

});

*/
/**
 * Storehouse Product Category
 */
//namespace \ResultSystems\Storehouse\Product\Http\Controllers
$router->group($security
        ->setFixedSecurity(['prefix' => 'category', 'as' => 'category.'])
        ->getConfigPackage('storehouse-product.category'), function () use ($router, $security) {
    require_once(__DIR__."/category_routes.php");
});
