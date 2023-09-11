<?php

use App\Http\Controllers\Back\AdvertsController\AdvertsController;
use App\Http\Controllers\Back\AuthController\AuthController;
use App\Http\Controllers\Back\CategoryController\CategoryController;
use App\Http\Controllers\Back\CommentController\CommentController;
use App\Http\Controllers\Back\ContactController\ContactController;
use App\Http\Controllers\Back\GeneralController\GeneralController;
use App\Http\Controllers\Back\PostController\PostController;
use App\Http\Controllers\Back\ProfileController\ProfileController;
use App\Http\Controllers\Back\QuoteController\QuoteController;
use App\Http\Controllers\Back\SearchController\SearchController;
use App\Http\Controllers\Back\SeoController\SeoController;
use App\Http\Controllers\Back\SettingsController\SettingsController;
use App\Http\Controllers\Back\SocialMediaController\SocialMediaController;
use App\Http\Controllers\Back\SwitcherController\SwitcherController;
use App\Http\Controllers\Back\UserController\UserController;
use App\Http\Controllers\Front\İndexController\İndexController;
use App\Http\Controllers\Front\InkisafController\InkisafController;
use App\Http\Controllers\Front\TravelController\TravelController;
use App\Http\Controllers\Front\StoryController\StoryController;
use App\Http\Controllers\Front\FilmController\FilmController;
use App\Http\Controllers\Front\BiznesController\BiznesController;
use App\Http\Controllers\Front\ProfilController\ProfilController;
use App\Http\Controllers\Front\SettingController\SettingController;
use App\Http\Controllers\Front\UsersController\UsersController;
use App\Http\Controllers\Front\DetailController\DetailController;
use App\Http\Controllers\Front\AccountController\AccountController;
use App\Http\Controllers\Front\PostFrontController\PostFrontController;
use App\Http\Controllers\Front\SearchController\SearchController as PostSearchController;

use Illuminate\Support\Facades\Route;

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

Route::middleware('isLogin')->group(function () {
    Route::get('/admin', [GeneralController::class, "admin"])->name('admin');

    //Start Switcher
    Route::get('/admin/switcher', [SwitcherController::class, "switcherIndex"])->name('switcherIndex');
    //End Switcher

    //Start Users
    Route::get('/admin/users/list', [UserController::class, "userListIndex"])->name('userListIndex');
    Route::get('/admin/users/edit/{id}', [UserController::class, "userEdit"])->name('userEdit');
    Route::post('/admin/users/edit', [UserController::class, "userEditPost"])->name('userEditPost');
    Route::post('/admin/users/delete', [UserController::class, "userDelete"])->name('userDelete');
    //End Users

    //Start Categories
    Route::get('/admin/categories/list', [CategoryController::class, "categoryListIndex"])->name('categoryListIndex');
    Route::post('/admin/categories/edit', [CategoryController::class, "categoryEdit"])->name('categoryEdit');
    Route::post('/admin/categories/edit/post', [CategoryController::class, "categoryEditPost"])->name('categoryEditPost');
    Route::post('/admin/categories/add/post', [CategoryController::class, "categoryAddPost"])->name('categoryAddPost');
    //End Categories

    //Start Posts
    Route::get('/admin/posts/list', [PostController::class, "postListIndex"])->name('postListIndex');
    Route::post('/admin/posts/list', [PostController::class, "postStatus"])->name('postStatus');
    Route::post('/admin/posts/list/delete', [PostController::class, "postDelete"])->name('postDelete');
    Route::get('/admin/posts/edit/{id}', [PostController::class, "postEdit"])->name('postEdit');
    Route::post('/admin/posts/edit', [PostController::class, "postEditPost"])->name('postEditPost');
    Route::get('/admin/posts/add', [PostController::class, "postAdd"])->name('postAdd');
    Route::post('/admin/posts/add', [PostController::class, "postAddPost"])->name('postAddPost');
    //End Posts

    //Start Comment
    Route::get('/admin/comment/list', [CommentController::class, "commentListIndex"])->name('commentListIndex');
    Route::post('/admin/comment/edit', [CommentController::class, "commentEdit"])->name('commentEdit');
    Route::post('/admin/comment/edit/post', [CommentController::class, "commentEditPost"])->name('commentEditPost');
    Route::post('/admin/comment/status', [CommentController::class, "commentStatus"])->name('commentStatus');
    Route::post('/admin/comment/delete', [CommentController::class, "commentDelete"])->name('commentDelete');
    //End Comment

    //Start Contact
    Route::get('/admin/contact/list', [ContactController::class, "contactListIndex"])->name('contactListIndex');
    Route::post('/admin/contact/get/message', [ContactController::class, "contactGetMessage"])->name('contactGetMessage');
    Route::post('/admin/contact/delete', [ContactController::class, "contactDelete"])->name('contactDelete');
    Route::post('/admin/contact/reply', [ContactController::class, "contactReply"])->name('contactReply');
    //End Contact

    //Start Quote
    Route::get('/admin/quote/list', [QuoteController::class, "quoteListIndex"])->name('quoteListIndex');
    Route::post('/admin/quote/add', [QuoteController::class, "quoteListAdd"])->name('quoteListAdd');
    Route::post('/admin/quote/status', [QuoteController::class, "quoteStatus"])->name('quoteStatus');
    Route::post('/admin/quote/delete', [QuoteController::class, "quoteDelete"])->name('quoteDelete');
    //End Quote

    //Start Search
    Route::get('/admin/search/list', [SearchController::class, "searchListIndex"])->name('searchListIndex');
    //End Search

    //Start Profile
    Route::get('/admin/account', [ProfileController::class, "profileIndex"])->name('profileIndex');
    Route::post('/admin/account', [ProfileController::class, "profilePost"])->name('profilePost');
    //End Profile

    //Start Seo
    Route::get('/admin/seo', [SeoController::class, "seoIndex"])->name('seoIndex');
    Route::post('/admin/seo', [SeoController::class, "seoPost"])->name('seoPost');
    //End Seo

    //Start SocialMedia
    Route::get('/admin/social-media', [SocialMediaController::class, "socialIndex"])->name('socialIndex');
    Route::post('/admin/social-media', [SocialMediaController::class, "socialPost"])->name('socialPost');
    //End SocialMedia

    //Start Settings
    Route::get('/admin/settings', [SettingsController::class, "settingsIndex"])->name('settingsIndex');
    Route::post('/admin/settings', [SettingsController::class, "settingsPost"])->name('settingsPost');
    Route::post('/admin/settings/logo/buta', [SettingsController::class, "butaLogoPost"])->name('butaLogoPost');
    Route::post('/admin/settings/logo/kaizen/header', [SettingsController::class, "kaizenHeaderPost"])->name('kaizenHeaderPost');
    Route::post('/admin/settings/logo/kaizen/footer', [SettingsController::class, "kaizenFooterPost"])->name('kaizenFooterPost');
    Route::post('/admin/settings/logo/favicon', [SettingsController::class, "faviconPost"])->name('faviconPost');
    //End Settings

    //Start Adverts
    Route::get('/admin/adverts/posts', [AdvertsController::class, "advertPostIndex"])->name('advertPostIndex');
    Route::post('/admin/adverts/posts', [AdvertsController::class, "advertPost"])->name('advertPost');
    Route::post('/admin/adverts/posts/status', [AdvertsController::class, "advertPostStatus"])->name('advertPostStatus');
    Route::post('/admin/adverts/posts/delete', [AdvertsController::class, "advertPostDelete"])->name('advertPostDelete');

    Route::get('/admin/adverts/footer', [AdvertsController::class, "advertFooterIndex"])->name('advertFooterIndex');
    Route::post('/admin/adverts/footer', [AdvertsController::class, "advertFooter"])->name('advertFooter');
    Route::post('/admin/adverts/footer/status', [AdvertsController::class, "advertFooterStatus"])->name('advertFooterStatus');
    Route::post('/admin/adverts/footer/delete', [AdvertsController::class, "advertFooterDelete"])->name('advertFooterDelete');

    //End Adverts

    Route::get('/admin/logout', [AuthController::class, "logout"])->name('logout');
});

Route::middleware('isLogout')->group(function () {

    Route::get('/admin/login', [AuthController::class, "loginIndex"])->name('loginIndex');
    Route::post('/admin/login', [AuthController::class, "loginPost"])->name('loginPost');

});



Route::get('/', [İndexController::class, "index"])->name('index');
Route::post('/indexlike', [İndexController::class, 'like'])->name('indexlike');
Route::post('/indexdislike', [İndexController::class, 'dislike'])->name('indexdislike');
Route::post('/indexbook', [İndexController::class, 'book'])->name('indexbook');
Route::post('/indexdisbook', [İndexController::class, 'disbook'])->name('indexdisbook');


Route::get('/ferdi-inkisaf', [InkisafController::class, "ferdi"])->name('ferdi');
Route::get('/ferdi-inkisaf/hamisi', [InkisafController::class, "all"])->name('inkisafall');
Route::post('/inkisaflike', [InkisafController::class, 'like'])->name('inkisaflike');
Route::post('/inkisafdislike', [InkisafController::class, 'dislike'])->name('inkisafdislike');
Route::post('/inkbook', [InkisafController::class, 'book'])->name('inkbook');
Route::post('/inkdisbook', [InkisafController::class, 'disbook'])->name('inkdisbook');


Route::get('/travel', [TravelController::class, "travel"])->name('travel');
Route::get('/travel/all', [TravelController::class, "all"])->name('travelall');
Route::post('/travellike', [TravelController::class, 'like'])->name('travellike');
Route::post('/traveldislike', [TravelController::class, 'dislike'])->name('traveldislike');
Route::post('/travelbook', [TravelController::class, 'book'])->name('travelbook');
Route::post('/traveldisbook', [TravelController::class, 'disbook'])->name('traveldisbook');


Route::get('/stories', [StoryController::class, "story"])->name('story');
Route::get('/stories/all', [StoryController::class, "all"])->name('storyall');
Route::post('/storylike', [StoryController::class, 'like'])->name('storylike');
Route::post('/storydislike', [StoryController::class, 'dislike'])->name('storydislike');
Route::post('/storybook', [StoryController::class, 'book'])->name('storybook');
Route::post('/storydisbook', [StoryController::class, 'disbook'])->name('storydisbook');


Route::get('/movies', [FilmController::class, "film"])->name('film');
Route::get('/movies/all', [FilmController::class, "all"])->name('filmall');
Route::post('/filmlike', [FilmController::class, 'like'])->name('filmlike');
Route::post('/filmdislike', [FilmController::class, 'dislike'])->name('filmdislike');
Route::post('/filmbook', [FilmController::class, 'book'])->name('filmbook');
Route::post('/filmdisbook', [FilmController::class, 'disbook'])->name('filmdisbook');


Route::get('/business', [BiznesController::class, "biznes"])->name('biznes');
Route::get('/business/all', [BiznesController::class, "all"])->name('biznesall');
Route::post('/bizneslike', [BiznesController::class, 'like'])->name('bizneslike');
Route::post('/biznesdislike', [BiznesController::class, 'dislike'])->name('biznesdislike');
Route::post('/biznesbook', [BiznesController::class, 'book'])->name('biznesbook');
Route::post('/biznesdisbook', [BiznesController::class, 'disbook'])->name('biznesdisbook');


Route::get('/profil', [ProfilController::class, "profil"])->name('profil');
Route::get('/editprofile/{id}', [ProfilController::class, "editprofile"])->name('editprofile');
Route::post('/updateprofile', [ProfilController::class, "updateprofile"])->name('updateprofile');
Route::post('/profilelike', [ProfilController::class, 'like'])->name('profilelike');
Route::post('/profiledislike', [ProfilController::class, 'dislike'])->name('profiledislike');
Route::post('/profilebook', [ProfilController::class, 'book'])->name('profilebook');
Route::post('/profiledisbook', [ProfilController::class, 'disbook'])->name('profiledisbook');


Route::get('/settings', [SettingController::class, "settings"])->name('settings');
Route::post('/activation', [SettingController::class, "activation"])->name('activation');
Route::get('/activation/{code}', [SettingController::class, "activateUser"])->name('activateUser');
Route::post('/changeEmail', [SettingController::class, "changeEmail"])->name('changeEmail');
Route::post('/changePass', [SettingController::class, "changePass"])->name('changePass');
Route::post('/forgetpassSetting', [SettingController::class, "forgetpassSetting"])->name('forgetpassSetting');
Route::post('/whydelete', [SettingController::class, "whydelete"])->name('whydelete');
Route::post('/downloadinfo', [SettingController::class, "downloadinfo"])->name('downloadinfo');
Route::get('/subc', [SettingController::class, "subc"])->name('subc');


Route::get('/users', [UsersController::class, "user"])->name('user');
Route::get('/axtar', [UsersController::class, "useraxtar"])->name('useraxtar');


Route::get('/post/{id}', [DetailController::class, "detail"])->name('detail');
Route::post('/comment', [DetailController::class, "commentPost"])->name('commentPost');
Route::post('/detaillike', [DetailController::class, 'like'])->name('detaillike');
Route::post('/detaildislike', [DetailController::class, 'dislike'])->name('detaildislike');
Route::post('/detailbook', [DetailController::class, 'book'])->name('detailbook');
Route::post('/detaildisbook', [DetailController::class, 'disbook'])->name('detaildisbook');

Route::post('/contact', [AccountController::class, "contactpost"])->name('contact');
Route::post('/loginpost', [AccountController::class, "loginpost"])->name('loginpost');
Route::post('/registerpost', [AccountController::class, "registerpost"])->name('registerpost');
Route::get('/logout', [AccountController::class, "logout"])->name('logouts');


Route::get('/share-post', [PostFrontController::class, "share"])->name('share');
Route::post('/posts', [PostFrontController::class, "postadd"])->name('postadd');
Route::post('/forget_post', [AccountController::class, 'forget_post'])->name('forget_post');
Route::get('/email-verification/{verification}',[AccountController::class,'forget_verification'])->name('forget_verification');
Route::post('/confirm_post', [AccountController::class, 'confirm_post'])->name('confirm_post');


Route::get('/search', [PostSearchController::class, "action"])->name('search');
Route::post('/searchlike', [PostSearchController::class, 'like'])->name('searchlike');
Route::post('/searchdislike', [PostSearchController::class, 'dislike'])->name('searchdislike');
Route::post('/searchbook', [PostSearchController::class, 'book'])->name('searchbook');
Route::post('/searchdisbook', [PostSearchController::class, 'disbook'])->name('searchdisbook');
