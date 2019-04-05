<?php
Route::get('login.html', function () {
	return view('pages.login');
});
// route for page admin
Route::group(['prefix' => 'admin'], function () {
	// action table role
	Route::group(['prefix' => 'role'], function () {
		Route::get('list', 'Rolecontroller@getRole');
		Route::get('add', 'Rolecontroller@getAddrole');
		Route::post('add', 'Rolecontroller@postAddrole');
		Route::get('update/{id}', 'Rolecontroller@getUpdaterole');
		Route::post('update/{id}', 'Rolecontroller@postUpdaterole');
		Route::get('delete/{id}', 'Rolecontroller@deleteRole');
	});
	//action table users
	Route::group(['prefix' => 'user'], function () {
		Route::get('list', 'Usercontroller@getUser');
		Route::get('add', 'Usercontroller@getAdduser');
		Route::post('add', 'Usercontroller@postAdduser');
		Route::get('update/{id}', 'Usercontroller@getUpdateuser');
		Route::post('update/{id}', 'Usercontroller@postUpdateuser');
		Route::get('delete/{id}', 'Usercontroller@deleteUser');
	});
	//action table customer
	Route::group(['prefix' => 'customer'], function () {
		Route::get('list', 'Customercontroller@getCustomer');
		Route::get('add', 'Customercontroller@getAddcustomer');
		Route::post('add', 'Customercontroller@postAddcustomer');
		Route::get('update/{id}', 'Customercontroller@getUpdatecustomer');
		Route::post('update/{id}', 'Customercontroller@postUpdatecustomer');
		Route::get('delete/{id}', 'Customercontroller@deleteCustomer');
	});
	//action table company
	Route::group(['prefix' => 'company'], function () {
		Route::get('list', 'Companycontroller@getCompany');
		Route::get('add', 'Companycontroller@getAddcompany');
		Route::post('add', 'Companycontroller@postAddcompany');
		Route::get('update/{id}', 'Companycontroller@getUpdatecompany');
		Route::post('update/{id}', 'Companycontroller@postUpdatecompany');
		Route::get('delete/{id}', 'Companycontroller@deleteCompany');
	});
	//action table tag
	Route::group(['prefix' => 'tag'], function () {
		Route::get('list', 'Tagcontroller@getTag');
		Route::get('add', 'Tagcontroller@getAddtag');
		Route::post('add', 'Tagcontroller@postAddtag');
		Route::get('update/{id}', 'Tagcontroller@getUpdatetag');
		Route::post('update/{id}', 'Tagcontroller@postUpdatetag');
		Route::get('delete/{id}', 'Tagcontroller@deleteTag');
	});
	//action table bill
	Route::group(['prefix' => 'bill'], function () {
		Route::get('list', 'Billcontroller@getBill');
		Route::get('add', 'Billcontroller@getAddbill');
		Route::post('add', 'Billcontroller@postAddbill');
		Route::get('update/{id}', 'Billcontroller@getUpdatebill');
		Route::post('update/{id}',
			'Billcontroller@postUpdatebill');
		Route::get('delete/{id}', 'Billcontroller@deleteBill');
	});
	//action table bill
	Route::group(['prefix' => 'comment'], function () {
		Route::get('list', 'Commentcontroller@getComment');
		Route::get('add', 'Commentcontroller@getAddcomment');
		Route::post('add', 'Commentcontroller@postAddcomment');
		Route::get('update/{id}',
			'Commentcontroller@getUpdatecomment');
		Route::post('update/{id}',
			'Commentcontroller@postUpdatecomment');
		Route::get('delete/{id}',
			'Commentcontroller@deleteComment');
	});
	//action table bill
	Route::group(['prefix' => 'location'], function () {
		Route::get('list', 'Locationcontroller@getLocation');
		Route::get('add', 'Locationcontroller@getAddlocation');
		Route::post('add', 'Locationcontroller@postAddlocation');
		Route::get('update/{id}',
			'Locationcontroller@getUpdatelocation');
		Route::post('update/{id}',
			'Locationcontroller@postUpdatelocation');
		Route::get('delete/{id}',
			'Locationcontroller@deleteLocation');
	});
	Route::group(['prefix' => 'detail'], function () {
		Route::get('list', 'Detailcontroller@getDetail');
		Route::get('add', 'Detailcontroller@getAdddetail');
		Route::post('add', 'Detailcontroller@postAdddetail');
		Route::get('update/{id}', 'Detailcontroller@getUpdatedetail');
		Route::post('update/{id}', 'Detailcontroller@postUpdatedetail');
		Route::get('delete/{id}', 'Detailcontroller@deleteDetail');
	});
	Route::group(['prefix' => 'tour'], function () {
		Route::get('list', 'Tourcontroller@getTouradmin');
		Route::get('add', 'Tourcontroller@getAddtour');
		Route::post('add', 'Tourcontroller@postAddtour');
		Route::get('update/{id}',
			'Tourcontroller@getUpdatetour');
		Route::post('update/{id}',
			'Tourcontroller@postUpdatetour');
		Route::get('delete/{id}', 'Tourcontroller@deleteTour');
	});
	Route::group(['prefix' => 'image'], function () {
		Route::get('list', 'Imagecontroller@getImage');
		Route::get('add', 'Imagecontroller@getAddimage');
		Route::post('add', 'Imagecontroller@postAddimage');
		Route::get('update/{id}',
			'Imagecontroller@getUpdateimage');
		Route::post('update/{id}',
			'Imagecontroller@postUpdateimage');
		Route::get('delete/{id}', 'Imagecontroller@deleteImage');
	});
});
//process sign in admin
Route::get('signin.html', 'Usercontroller@getSignin');
Route::post('signin.html', 'Usercontroller@postSignin');
Route::get('logout', "Usercontroller@getSignout");
//login google
Route::get('auth/google', 'SocialAuthController@redirectToProvider');
Route::get('auth/google/callback', 'SocialAuthController@handleProviderCallback');
// layout home page
Route::get('/index.html', 'Tourcontroller@getTour');
//detail pages
Route::get('blog/{id}', 'Detailcontroller@showDetail');
Route::post('detail/{id}', 'Commentcontroller@postComment');
Route::get('comment/{id}/{kt}', 'Commentcontroller@ajaxComment');
// edit comment
Route::post('delcomment/{id}', 'Commentcontroller@delComment');
//register
Route::get('register.html', 'Usercontroller@getRegister');
Route::post('register.html', 'Usercontroller@postRegister');
Route::get('check/{key}', 'Usercontroller@checkUser');
//location pages
Route::get('location', 'Locationcontroller@showLocation');
//detail location pages
Route::get('detaillocation/{id}', 'Locationcontroller@showDetaillocation');
//search
Route::get('search/{key}', 'Tourcontroller@Search');
//config user
Route::get('configuser/{id}', 'Usercontroller@getConfig');
Route::post('configuser/{id}', 'Customercontroller@editCustomer');
//books tour
Route::get('bookstour.html/{id}', 'Billcontroller@Books');
Route::post('bookstour.html', 'Billcontroller@postBooks');
//about me
Route::get('aboutme.html', function () {
	return view('pages.aboutme');
});
Route::get('/', function () {
	return view('welcome');
});