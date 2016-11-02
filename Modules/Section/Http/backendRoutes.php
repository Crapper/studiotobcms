<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/section'], function (Router $router) {
    $router->bind('sections', function ($id) {
        return app('Modules\Section\Repositories\SectionRepository')->find($id);
    });
    get('sections', ['as' => 'admin.section.section.index', 'uses' => 'SectionController@index']);
    get('sections/create', ['as' => 'admin.section.section.create', 'uses' => 'SectionController@create']);
    post('sections', ['as' => 'admin.section.section.store', 'uses' => 'SectionController@store']);
    get('sections/{sections}/edit', ['as' => 'admin.section.section.edit', 'uses' => 'SectionController@edit']);
    put('sections/{sections}/edit', ['as' => 'admin.section.section.update', 'uses' => 'SectionController@update']);
    delete('sections/{sections}', ['as' => 'admin.section.section.destroy', 'uses' => 'SectionController@destroy']);
// append

});
