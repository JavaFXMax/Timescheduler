<?php

Route::get('/', function () {
    return redirect('/login');
});

Route::post('/create','Auth\RegisterController@create');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*Profile Routes*/
Route::get('/profile','ProfileController@index');
Route::post('/profile/update','ProfileController@update');
Route::post('/profile/password','ProfileController@password');

/*Calendar Routes*/
Route::get('/calendar','CalendarController@index');


/*Ng_classes Routes*/
Route::get('/ng_classes','NgclassesController@index');
Route::post('/ng_classes/new','NgclassesController@newNgClass');


/*Instructor Routes*/
Route::get('/instructors','InstructorController@index');
Route::post('/instructors/new','InstructorController@newInstructor');


/*Course Routes*/
Route::get('/courses','CourseController@index');
Route::post('/courses/new','CourseController@newCourse');


/*Venue Routes*/
Route::get('/venues','VenueController@index');
Route::post('/venues/new','VenueController@newVenue');


/*Report Routes*/
Route::get('/reports','ReportController@index');



/*Calendar Routes*/
Route::get('/settings','SettingsController@index');
