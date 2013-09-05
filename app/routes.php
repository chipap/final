 <?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(array('prefix' => 'admin'), function()
{

	# Blog Management
	Route::group(array('prefix' => 'blogs'), function()
	{
		Route::get('/', array('as' => 'blogs', 'uses' => 'Controllers\Admin\BlogsController@getIndex'));
		Route::get('create', array('as' => 'create/blog', 'uses' => 'Controllers\Admin\BlogsController@getCreate'));
		Route::post('create', 'Controllers\Admin\BlogsController@postCreate');
		Route::get('{blogId}/edit', array('as' => 'update/blog', 'uses' => 'Controllers\Admin\BlogsController@getEdit'));
		Route::post('{blogId}/edit', 'Controllers\Admin\BlogsController@postEdit');
		Route::get('{blogId}/delete', array('as' => 'delete/blog', 'uses' => 'Controllers\Admin\BlogsController@getDelete'));
		Route::get('{blogId}/restore', array('as' => 'restore/blog', 'uses' => 'Controllers\Admin\BlogsController@getRestore'));
	});

	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'Controllers\Admin\UsersController@getIndex'));
		Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\Admin\UsersController@getCreate'));
		Route::post('create', 'Controllers\Admin\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));
	});

	# Group Management
	Route::group(array('prefix' => 'groups'), function()
	{
		Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\Admin\GroupsController@getIndex'));
		Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\Admin\GroupsController@getCreate'));
		Route::post('create', 'Controllers\Admin\GroupsController@postCreate');
		Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\Admin\GroupsController@getEdit'));
		Route::post('{groupId}/edit', 'Controllers\Admin\GroupsController@postEdit');
		Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\Admin\GroupsController@getDelete'));
		Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\Admin\GroupsController@getRestore'));
	});

	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});

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

Route::get('about-us', function()
{
	//
	return View::make('frontend/about-us');
});

Route::get('contact-us', array('as' => 'contact-us', 'uses' => 'ContactUsController@getIndex'));
Route::post('contact-us', 'ContactUsController@postIndex');

Route::get('blog/{postSlug}', array('as' => 'view-post', 'uses' => 'BlogController@getView'));
Route::post('blog/{postSlug}', 'BlogController@postView');

Route::get('blog', array('as' => 'blog', 'uses' => 'BlogController@getIndex'));



Route::get('/', array('as' => 'home', function()
{
	return View::make('hello');
}));


Route::get('/search', 'BlogController@postSearch');

Route::get('/company', function()
{
	$contact = new Comcontact(array(
		'phone_type' => 'landline',
		'phone_value' => '044 - 24732020'
	));	Company::find(5)->comcontacts()->save($contact);
	$contact = new Comcontact(array(
		'phone_type' => 'addlandline',
		'phone_value' => '044 - 28889999'
	));	Company::find(5)->comcontacts()->save($contact);
	$contact = new Comcontact(array(
		'phone_type' => 'addlandline',
		'phone_value' => '044 - 42133030'
	));	Company::find(5)->comcontacts()->save($contact);		
	$contact = new Comcontact(array(
		'phone_type' => 'mobile',
		'phone_value' => '9551279520'
	));	Company::find(5)->comcontacts()->save($contact);
	$contact = new Comcontact(array(
		'phone_type' => 'addmobile',
		'phone_value' => '9940678950'
	));	Company::find(5)->comcontacts()->save($contact);

	/*Company::create(array(
		'title' => 'Fast Track Call Taxi',
		'description' => 'Fasttrack call taxi offers quality taxi services across the Indian region All Vehicles operating from Fast track are modern, clean and constantly monitored for condition by the management. The company has rapidly grown to become India’s largest and most efficient call taxi company with over 1000 drivers. This growth has stemmed from a commitment to provide an unrivalled quality of service and strong corporate image. We have almost have 11 years of experience in this field. Taxi services are an essential part of the transportation system. Each day the Indian taxi industry carry thousands of Indians and visitors around our great country.But, be sure before boarding any taxi in the city that it is licensed by the public carriage office. Fasttrack is the one which is licensed by the the public carriage office. Fasttrack, always believes in professional, hard working, and enthusiastic drivers to be part of the Fasttrack family.. The only thing greater than your expectations are our standards...',
		'email' => 'info@fasttrackcalltaxi.in',
		'location' => 'Kodambakkam',
		'address' => '#1,  Vellalar Street ',
		'landmark' => 'Near Best Hospital',
		'area' => 'Kodambakkam',
		'city' => 'Chennai',
		'state' => 'Tamilnadu',
		'zipcode' => '600024',
		'website' => 'www.fasttrackcalltaxi.in',
		'nearest_bus' => 'Kodambakkam Bus Stand',
		'other_trans' => 'Kodambakkam Suburban Rly Station',
		'payment_mode' => 'Cash, Credit or Debit Cards',
		'weekly_holiday' => 'No Holiday',
		'slug' => 'fast-track-call-taxi-kodambakkam-chennai',
	));
*/
/*		print_r(Company::find(1)->contacts);
*/	/*$contact = Comcontact::find(3); var_dump($contact); $company = $contact->company(); var_dump($company);*/
});

/*Displaying each company individually in a view*/
Route::get('details/{urlSlug}', array('as' => 'view-company', 'uses' => 'CompaniesController@getView'));



Route::group(array('prefix' => 'projects'), function()
{
	#Create Projects
	Route::get('create', array('as' => 'create', 'uses' => 'ProjectController@getCreate'));
	Route::post('create', 'ProjectController@createProject');

});
