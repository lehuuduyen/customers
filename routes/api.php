<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });
    
    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('customer/test', 'App\\Api\\V1\\Controllers\\CustomerController@index');
        $api->get('customer/{id}', 'App\\Api\\V1\\Controllers\\CustomerController@show');
        $api->post('customer', 'App\\Api\\V1\\Controllers\\CustomerController@store');
        $api->put('customer/{id}', 'App\\Api\\V1\\Controllers\\CustomerController@update');
        $api->delete('customer/{id}', 'App\\Api\\V1\\Controllers\\CustomerController@delete');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('product/test', 'App\\Api\\V1\\Controllers\\ProductController@index');
        $api->get('product/{id}', 'App\\Api\\V1\\Controllers\\ProductController@show');
        $api->post('product', 'App\\Api\\V1\\Controllers\\ProductController@store');
        $api->put('product/{id}', 'App\\Api\\V1\\Controllers\\ProductController@update');
        $api->delete('product/{id}', 'App\\Api\\V1\\Controllers\\ProductController@delete');
    });

    $api->group(['prefix' => 'user'], function(Router $api) {
        $api->get('list', 'App\\Api\\V1\\Controllers\\UsertestController@index');
        $api->get('list/{id}', 'App\\Api\\V1\\Controllers\\UsertestController@show');
        $api->post('list', 'App\\Api\\V1\\Controllers\\UsertestController@store');
        $api->put('list/{id}', 'App\\Api\\V1\\Controllers\\UsertestController@update');
        $api->delete('list/{id}', 'App\\Api\\V1\\Controllers\\UsertestController@delete');
    });

    $api->resource('photos', 'App\\Api\\V1\\Controllers\\Customer02Controller');
    
});
