<?php

use Illuminate\Http\Request;





Route::group(['prefix' => 'admin',
'namespace'=>'Administrator',
'middleware' => ['CORS']],function ()
{
    Route::post('/login', 'AdminAuthController@login');
     //this might be useful though an admin registering another admin
    Route::post("/register","AdminAuthController@register");
    //this is to display all the available roles
    Route::post("/logout","AdminAuthController@logout");
    //display admin profile
    Route::post("/profilephoto/add","AdminAuthController@AddProfilePicture");
    Route::post("/profile","AdminAuthController@getAuthadmin");
    Route::get('role/all-content/{pagination?}', 'roleController@index');
    //this is to display individual roles
    Route::get('role/show/{id}', 'roleController@show');
    //this is to store roles
    Route::post('role/store', 'roleController@store');
    //this is to update roles
    Route::put('role/update/{id}', 'roleController@update');
    //this is to set default roles
    Route::post("role/default/{id}",'roleController@default');
    //this is to delete a role
    Route::delete('role/delete/{id}', 'roleController@delete');
    //this routes are for admin relationship with users
    Route::post('/user/ban/{id}','AdminAuthController@banUser');
    Route::post('/user/remove-ban/{id}','AdminAuthController@removeBan');   
    Route::get('user/all/{pagination?}','AdminAuthController@ViewUsers');
    Route::get('user/single/{id}','AdminAuthController@showUserProfile');
    //this routes are for the categories section 
    Route::get('categories/all-content/{pagination?}', 'CategoriesController@index');
    Route::post('categories/create', 'CategoriesController@store');
    //this is to update roles
    Route::post('categories/update/{id}', 'CategoriesController@update');
    //this is to set default roles
    Route::delete('categories/delete/{id}', 'CategoriesController@delete');
    //services creation
    Route::post('services/create', 'ServicesController@store');
    //this is to update roles
    Route::post('services/update/{id}', 'ServicesController@update');
    //this is to set default roles
    Route::delete('services/delete/{id}', 'ServicesController@delete');
    Route::get('services/all-content/{pagination?}', 'ServicesController@index');
    Route::get('services/single-category/{id}/{pagination?}','ServicesController@GetServiceByCategory');
    //this are service options route
    Route::post('service-options/create','ServiceFormOptionsController@store');//create
    Route::post('service-options/update/{id}','ServiceFormOptionsController@update');//update
    Route::delete('service-options/delete/{id}', 'ServiceFormOptionsController@delete');//delete
    Route::get('service-options/all-content/{pagination?}', 'ServiceFormOptionsController@index'); //all service
    Route::get('service-options/single-service/{id}/{pagination?}','ServiceFormOptionsController@getServiceOptionsForParticularService');
    //bookings route
    Route::post('bookings/create', 'BookingsController@store');
    //this is to update roles
    Route::post('bookings/update/{id}', 'BookingsController@update');
    //this is to set default roles
    Route::delete('bookings/delete/{id}', 'BookingsController@delete');
    Route::get('bookings/all-content/{pagination?}', 'BookingsController@index');
    Route::get('bookings/user/{id}/{pagination?}','BookingsController@BookingForParticularUser');
    Route::get("bookings/artisan/{id}/{pagination?}","BookingsController@BookingForParticularArtisan");
    Route::get("bookings/single-bookings/{id}","BookingsController@getBooking");
    //this is for booking service options
    Route::post('bookings-service/create', 'BookingServiceOptionsController@store');
    //this is to update roles
    Route::post('bookings-service/update/{id}', 'BookingServiceOptionsController@update');
    //this is to set default roles
    Route::delete('bookings-service/delete/{id}', 'BookingServiceOptionsController@delete');
    Route::get('bookings-service/all-content/{pagination?}', 'BookingServiceOptionsController@index');
    Route::get('bookings-service/{id}/{pagination?}','BookingServiceOptionsController@getServiceOptionsForParticularService');

});

Route::group(["prefix"=>"user",
"namespace"=>"User",
"middleware"=>["CORS"]],function(){
    Route::post('register', 'UserAuthController@register');    
    Route::post('login', 'UserAuthController@login');
    Route::post("edit/{id}","UserAuthController@editProfile");
    Route::post("logout","UserAuthController@logout");
    Route::post("/profilephoto/add","UserAuthController@AddProfilePicture");
    //here we pass the post data which is the token through the body
    Route::post("/profile","UserAuthController@getAuthUser");
});


