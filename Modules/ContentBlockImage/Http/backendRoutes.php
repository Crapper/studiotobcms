<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/contentblockimage'], function (Router $router) {
    $router->bind('contentblockimages', function ($id) {
        return app('Modules\ContentBlockImage\Repositories\ContentBlockImageRepository')->find($id);
    });
    get('contentblockimages', ['as' => 'admin.contentblockimage.contentblockimage.index', 'uses' => 'ContentBlockImageController@index']);
    get('contentblockimages/create', ['as' => 'admin.contentblockimage.contentblockimage.create', 'uses' => 'ContentBlockImageController@create']);
    post('contentblockimages', ['as' => 'admin.contentblockimage.contentblockimage.store', 'uses' => 'ContentBlockImageController@store']);
    get('contentblockimages/{contentblockimages}/edit', ['as' => 'admin.contentblockimage.contentblockimage.edit', 'uses' => 'ContentBlockImageController@edit']);
    put('contentblockimages/{contentblockimages}/edit', ['as' => 'admin.contentblockimage.contentblockimage.update', 'uses' => 'ContentBlockImageController@update']);
    delete('contentblockimages/{contentblockimages}', ['as' => 'admin.contentblockimage.contentblockimage.destroy', 'uses' => 'ContentBlockImageController@destroy']);
// append

});
