<?php

post('email/sendmail', ['uses' => 'frontendController@sendmail', 'as' => 'sendmail']);
get('contact', ['uses' => 'frontendController@index', 'as' => 'mailform']);