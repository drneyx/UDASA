<?php

use App\Models\Article;
use App\Models\MissionVision;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/linkstorage', function () {
  //  Artisan::call('optimize');
//});

Route::get('/visitor', 'FrontPage\HomeController@getVisitor');

// FrontEnd
Route::get('/', 'FrontPage\HomeController@index')->name('welcome');
Route::get('/udasa-news', 'FrontPage\NewsController@index');
Route::get('/udasa-social-events', 'FrontPage\NewsController@socialEvents');
Route::get('/read-news/{id}', 'FrontPage\NewsController@readNews');
Route::get('/read-newsletter/{id}', 'FrontPage\NewsController@readNewsLetter')->name('read-newsletter');

Route::get('udasa-social-responsibilities', 'FrontPage\NewsController@socialResponsibilities');
Route::get('udasa-academic-events', 'FrontPage\NewsController@academicEvents');
Route::get('chachage-scholarship', 'FrontPage\NewsController@scholarship');

// gallery
Route::get('udasa-gallery', 'FrontPage\GalleryController@index');

// contact us
Route::get('contact-us', 'FrontPage\ContactsController@index');

// about us
Route::get('the-mother-of-institution',function() {
    return view('front-pages/about_udasa');
});
Route::get('the-history-of-udasa',function() {
    return view('front-pages/history');
});
Route::get('vision-and-mission',function() {
    $values = MissionVision::where('name', '!=', 'contribution')->oldest()->get();
    return view('front-pages/vision-mission', compact('values'));
});
Route::get('contribution',function() {
    $contribution = MissionVision::where('name', 'contribution')->first();
    return view('front-pages/contribution', compact('contribution'));
});

// leadership
Route::group(['prefix' => 'leaders'], function () {
    Route::get('current', 'FrontPage\Leadership\LeadershipController@allCurrentLeaders');
    Route::get('previous', 'FrontPage\Leadership\LeadershipController@allPreviousLeaders');
});

// all staffs
Route::group(['prefix' => 'staffs'], function () {
    Route::get('staff-details/{staffId}', 'FrontPage\Leadership\LeadershipController@staffDetails');
});



// backend

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

Route::get('staffs-management', 'Managements\StaffsController@index')->name('staffs');
Route::post('register-user', 'Managements\StaffsController@registerStaff');
Route::post('delete-staff/{id}', 'Managements\StaffsController@deleteStaff');
Route::post('edit-staff/{id}', 'Managements\StaffsController@editStaff');
Route::post('changeImage/{id}', 'Managements\StaffsController@changeImage');


// Newsletters
Route::get('news-letters', 'Managements\NewsLetterController@index')->name('newsLetters');
Route::post('add-newsLetter', 'Managements\NewsLetterController@addNewsLetter');
Route::post('edit-newsLetter/{id}', 'Managements\NewsLetterController@editNewsLetter');
Route::post('delete-newsLetter/{id}', 'Managements\NewsLetterController@deleteNewsLetter');
Route::post('changeNewsLetterImage/{id}', 'Managements\NewsLetterController@changeNewsLetterImage');

// News
Route::get('news', 'Managements\NewsController@index')->name('news');
Route::post('add-news', 'Managements\NewsController@addNews');
Route::post('edit-news/{id}', 'Managements\NewsController@editNews');
Route::post('delete-news/{id}', 'Managements\NewsController@deleteNews');
Route::post('changeNewsImage/{id}', 'Managements\NewsController@changeNewsImage');



Route::get('positions-management', 'Managements\PositionsController@index');
Route::get('staff-positions', 'Managements\PositionsController@AllStaffPositions');
Route::post('add-positions', 'Managements\PositionsController@AddStaffPositions');
Route::post('edit-position/{id}', 'Managements\PositionsController@editStaffPositions');
Route::post('delete-position/{id}', 'Managements\PositionsController@deleteStaffPositions');


Route::get('staff-categories', 'Managements\StaffCategoriesController@index');
Route::get('get-staff-categories', 'Managements\StaffCategoriesController@getAllStaffCategories');
Route::post('add-categories', 'Managements\StaffCategoriesController@AddStaffCategories');
Route::post('edit-category/{id}', 'Managements\StaffCategoriesController@editStaffCategories');
Route::post('delete-category/{id}', 'Managements\StaffCategoriesController@deleteStaffCategories');

// articles
Route::get('udasa-articles', function() {
    $articles = Article::orderBy('articles.created_at')
                        ->get();
    return view('front-pages/all_articles', compact('articles'));
});
Route::prefix('articles')->group(function () {
    Route::get('articles-managements', 'MembersPublications\MembersPublicationsController@index');
    Route::post('add-article', 'MembersPublications\MembersPublicationsController@addArticle');
    Route::post('edit-article/{articleId}', 'MembersPublications\MembersPublicationsController@editArticle');
    Route::post('delete-article/{articleId}', 'MembersPublications\MembersPublicationsController@deleteArticle');
    Route::post('changeImage/{articleId}', 'MembersPublications\MembersPublicationsController@changeImage');
    Route::get('read-article/{articleId}', 'FrontPage\HomeController@readArticle');
    // filter staffs
    Route::get('filter-staff', 'MembersPublications\MembersPublicationsController@getMatchingStaffs');

});
Route::post('/upload', 'MembersPublications\MembersPublicationsController@upload');


// message from chair
Route::get('word-from-chair', 'MembersPublications\MembersPublicationsController@message');
Route::post('add-message', 'MembersPublications\MembersPublicationsController@addMessage');
Route::post('edit-message/{id}', 'MembersPublications\MembersPublicationsController@editMessage');
Route::post('delete-message/{id}', 'MembersPublications\MembersPublicationsController@deleteMessage');

// Gallery
Route::prefix('gallery')->group(function () {
    Route::get('manage-albums', 'Gallery\GalleryManagementController@index');
    Route::post('create-album', 'Gallery\GalleryManagementController@cteateAlbum');
    Route::post('edit-album/{id}', 'Gallery\GalleryManagementController@editAlbum');
    Route::post('delete-album/{id}', 'Gallery\GalleryManagementController@deleteAlbum');

    // Gallery images
    Route::get('images/{id}', 'Gallery\GalleryImagesController@index');
    Route::post('add-picture/{albumId}', 'Gallery\GalleryImagesController@addPicture');
    Route::post('edit-picture/{id}', 'Gallery\GalleryImagesController@editGallery');
    Route::post('delete-gallery/{id}', 'Gallery\GalleryImagesController@deleteGallery');

    // frontpage gallery
    Route::get('{slug}', 'FrontPage\GalleryController@viewGalleryImages');
});


Route::get('/myPosition', 'Managements\PositionsController@checkPosition');
Route::get('/getColleges', 'Managements\PositionsController@getColleges');

Route::get('mission-and-vision', 'Managements\MissionAndVisionController@index');
Route::post('add-mission-vision', 'Managements\MissionAndVisionController@addMissionVision');
Route::post('edit-mission-vision/{id}', 'Managements\MissionAndVisionController@editMissionVision');
Route::post('delete-mission-vision/{id}', 'Managements\MissionAndVisionController@deleteMissionVision');

Route::post('/email', 'FrontPage\EmailController@sendEmail')->name('sendEmail');
