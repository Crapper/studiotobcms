<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/carousel'], function (Router $router) {
    $router->bind('carousels', function ($id) {
        return app('Modules\Carousel\Repositories\CarouselRepository')->find($id);
    });
    get('carousels', ['as' => 'admin.carousel.carousel.index', 'uses' => 'CarouselController@index']);
    get('carousels/create', ['as' => 'admin.carousel.carousel.create', 'uses' => 'CarouselController@create']);
    post('carousels', ['as' => 'admin.carousel.carousel.store', 'uses' => 'CarouselController@store']);
    get('carousels/{carousels}/edit', ['as' => 'admin.carousel.carousel.edit', 'uses' => 'CarouselController@edit']);
    put('carousels/{carousels}/edit', ['as' => 'admin.carousel.carousel.update', 'uses' => 'CarouselController@update']);
    put('carousels/{carousels}/api/update', ['as' => 'admin.carousel.carousel.api.update', 'uses' => 'CarouselController@apiUpdate']);
    delete('carousels/{carousels}', ['as' => 'admin.carousel.carousel.destroy', 'uses' => 'CarouselController@destroy']);
// append

});
