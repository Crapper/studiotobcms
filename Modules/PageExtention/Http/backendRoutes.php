<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/pageextention'], function (Router $router) {
    $router->bind('pageextentions', function ($id) {
        return app('Modules\PageExtention\Repositories\PageExtentionRepository')->find($id);
    });
    get('pageextentions', ['as' => 'admin.pageextention.pageextention.index', 'uses' => 'PageExtentionController@index']);
    get('pageextentions/create', ['as' => 'admin.pageextention.pageextention.create', 'uses' => 'PageExtentionController@create']);
    post('pageextentions', ['as' => 'admin.pageextention.pageextention.store', 'uses' => 'PageExtentionController@store']);
    get('pageextentions/{pageextentions}/edit', ['as' => 'admin.pageextention.pageextention.edit', 'uses' => 'PageExtentionController@edit']);
    put('pageextentions/{pageextentions}/edit', ['as' => 'admin.pageextention.pageextention.update', 'uses' => 'PageExtentionController@update']);
    delete('pageextentions/{pageextentions}', ['as' => 'admin.pageextention.pageextention.destroy', 'uses' => 'PageExtentionController@destroy']);
// append

});
