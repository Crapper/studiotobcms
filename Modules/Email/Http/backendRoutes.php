<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/email'], function (Router $router) {
    $router->bind('emails', function ($id) {
        return app('Modules\Email\Repositories\EmailRepository')->find($id);
    });
    get('emails', ['as' => 'admin.email.email.index', 'uses' => 'EmailController@index']);
    get('emails/create', ['as' => 'admin.email.email.create', 'uses' => 'EmailController@create']);
    post('emails', ['as' => 'admin.email.email.store', 'uses' => 'EmailController@store']);
    get('emails/{emails}/edit', ['as' => 'admin.email.email.edit', 'uses' => 'EmailController@edit']);
    put('emails/{emails}/edit', ['as' => 'admin.email.email.update', 'uses' => 'EmailController@update']);
    delete('emails/{emails}', ['as' => 'admin.email.email.destroy', 'uses' => 'EmailController@destroy']);
// append

});
