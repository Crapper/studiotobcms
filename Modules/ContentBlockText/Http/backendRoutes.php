<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/contentblocktext'], function (Router $router) {
    $router->bind('contentblocktexts', function ($id) {
        return app('Modules\ContentBlockText\Repositories\ContentBlockTextRepository')->find($id);
    });
    get('contentblocktexts', ['as' => 'admin.contentblocktext.contentblocktext.index', 'uses' => 'ContentBlockTextController@index']);
    get('contentblocktexts/create', ['as' => 'admin.contentblocktext.contentblocktext.create', 'uses' => 'ContentBlockTextController@create']);
    post('contentblocktexts', ['as' => 'admin.contentblocktext.contentblocktext.store', 'uses' => 'ContentBlockTextController@store']);
    get('contentblocktexts/{contentblocktexts}/edit', ['as' => 'admin.contentblocktext.contentblocktext.edit', 'uses' => 'ContentBlockTextController@edit']);
    put('contentblocktexts/{contentblocktexts}/edit', ['as' => 'admin.contentblocktext.contentblocktext.update', 'uses' => 'ContentBlockTextController@update']);
    delete('contentblocktexts/{contentblocktexts}', ['as' => 'admin.contentblocktext.contentblocktext.destroy', 'uses' => 'ContentBlockTextController@destroy']);
// append

});
