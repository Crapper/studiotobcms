<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/menulist'], function (Router $router) {
    $router->bind('menulists', function ($id) {
        return app('Modules\Menulist\Repositories\MenulistRepository')->find($id);
    });
    get('menulists', ['as' => 'admin.menulist.menulist.index', 'uses' => 'MenulistController@index']);
    get('menulists/create', ['as' => 'admin.menulist.menulist.create', 'uses' => 'MenulistController@create']);
    post('menulists', ['as' => 'admin.menulist.menulist.store', 'uses' => 'MenulistController@store']);
    get('menulists/{menulists}/edit', ['as' => 'admin.menulist.menulist.edit', 'uses' => 'MenulistController@edit']);
    put('menulists/{menulists}/edit', ['as' => 'admin.menulist.menulist.update', 'uses' => 'MenulistController@update']);
    delete('menulists/{menulists}', ['as' => 'admin.menulist.menulist.destroy', 'uses' => 'MenulistController@destroy']);
    $router->bind('menuitems', function ($id) {
        return app('Modules\Menulist\Repositories\MenuitemRepository')->find($id);
    });
    get('menuitems', ['as' => 'admin.menulist.menuitem.index', 'uses' => 'MenuitemController@index']);
    get('menuitems/create', ['as' => 'admin.menulist.menuitem.create', 'uses' => 'MenuitemController@create']);
    post('menuitems', ['as' => 'admin.menulist.menuitem.store', 'uses' => 'MenuitemController@store']);
    get('menuitems/{menuitems}/edit', ['as' => 'admin.menulist.menuitem.edit', 'uses' => 'MenuitemController@edit']);
    put('menuitems/{menuitems}/edit', ['as' => 'admin.menulist.menuitem.update', 'uses' => 'MenuitemController@update']);
    delete('menuitems/{menuitems}', ['as' => 'admin.menulist.menuitem.destroy', 'uses' => 'MenuitemController@destroy']);
// append


});
