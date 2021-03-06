<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
App::bind('confide.user_validator', 'UserAccountValidator');

/** ------------------------------------------
 *  Dashboard Routes 
 *  ------------------------------------------
 */

Route::group(array('before' => 'auth'), function()
{
    Route::get("user/company", "UserController@getCompany");
    Route::get("user/physician", 'UserController@getPhysician');
    Route::get("user/specialty","UserController@getSpecialty");
    Route::get("user/competition","UserController@getCompetition");
	
	Route::get("user/company/{compquery}","UserController@compquery");

	Route::get("user/physician/{phyquery}","UserController@phyquery");
	Route::post("user/physician/{phyquery}","UserController@phyquery");
	
	Route::get("user/specialty/{specquery}","UserController@specquery");
	Route::post("user/specialty/{specquery}","UserController@specquery");
	
});

	Route::post("user/feedback","UserController@postFeedback");
	Route::get('contact', 'ContactController@getContact');
	Route::post('contact_request','ContactController@getContactUsForm');
	
	Route::get('feedback', 'FeedbackRatingController@getFeedback');
	Route::post('postfeedback', 'FeedbackRatingController@postFeedback');
	Route::get('rating', 'FeedbackRatingController@getRating');
	Route::post('postfeedback', 'FeedbackRatingController@postRating');
/** ------------------------------------------
 *  Route model binding
 *  ------------------------------------------
 */
Route::model('user', 'User');
Route::model('comment', 'Comment');
Route::model('post', 'Post');
Route::model('role', 'Role');

/** ------------------------------------------
 *  Route constraint patterns
 *  ------------------------------------------
 */
Route::pattern('comment', '[0-9]+');
Route::pattern('post', '[0-9]+');
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');
Route::pattern('token', '[0-9a-z]+');

/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Comment Management
    Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit');
    Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit');
    Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete');
    Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete');
    Route::controller('comments', 'AdminCommentsController');

    # Blog Management
    Route::get('blogs/{post}/show', 'AdminBlogsController@getShow');
    Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit');
    Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit');
    Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete');
    Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete');
    Route::controller('blogs', 'AdminBlogsController');

    # User Management
    Route::get('users/{user}/show', 'AdminUsersController@getShow');
    Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
    Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
    Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
    Route::post('users/{user}/activate', 'AdminUsersController@activateUser');
	Route::get('users/{user}/activate', 'AdminUsersController@activateUser');
	Route::post('users/{user}/reject', 'AdminUsersController@rejectionEmail');
	Route::get('users/{user}/reject', 'AdminUsersController@rejectionEmail');

	
    Route::controller('users', 'AdminUsersController');

    # User Role Management
    Route::get('roles/{role}/show', 'AdminRolesController@getShow');
    Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
    Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
    Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
    Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');

	Route::controller('roles', 'AdminRolesController');
	

    # Admin Dashboard
    Route::controller('/', 'AdminDashboardController');
});


/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

// User reset routes
Route::get('user/reset/{token}', 'UserController@getReset');
// User password reset
Route::post('user/reset/{token}', 'UserController@postReset');

// User reset routes --For Testing
Route::get('user/reset/', 'UserController@getReset');
// User password reset --For Testing
Route::post('user/reset/', 'UserController@postReset');

//:: User Account Routes ::
Route::post('user/{user}/edit', 'UserController@postEdit');

//:: User Account Routes ::
Route::post('user/login', 'UserController@postLogin');

# User RESTful Routes (Login, Logout, Register, etc)
Route::controller('user', 'UserController');

//:: User Account Routes ::
# FAQs Page
Route::get('user/faq', 'UserController@getFaq');

# Legal Agreement Page
Route::get('user/legal', 'UserController@getLegal');

//:: Application Routes ::

# Filter for detect language
Route::when('contact','detectLang');

# Contact Us Static Page
Route::get('contact', function()
{
    // Return about us page
    return View::make('contact');
});

# Contact Us Static Page
Route::get('thankyou', function()
{
    // Return Thank You Page
    return View::make('thankyou');
});

# Posts - Second to last set, match slug
Route::get('{postSlug}', 'BlogController@getView');
Route::post('{postSlug}', 'BlogController@postView');

# Index Page - Last route, no matches
Route::get('/', array('before' => 'detectLang','uses' => 'BlogController@getIndex'));

Route::get('try', function()
{
	return "Hi! there";
});
