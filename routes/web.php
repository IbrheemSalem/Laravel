<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\FillabelController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\MiddlewareController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AjaxOffersController;
use App\Http\Controllers\CollectTutController;
use App\Http\Controllers\RelationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('show', function () {
    return "hello";
});

Route::get('id/{id}', function ($id) {
    return $id;
});

Route::get('xx', function () {
    return view('xx');
});
Route::get('new', function () {
    return view('new');
});
Route::get('show-a', function () {
    return view('welcome');
})->name('a');

Route::get('show-b/{id}', function ($id) {
    return $id;
})->name('b');
/*
Route::prefix('user')->group(function(){
    Route::get('show', '#####Controller@####');
    Route::delete('delete', '#####Controller@####');
    Route::put('update', '#####Controller@####');
    Route::get('edit', '#####Controller@####');
});
//OR
Route::group(['prefix' => 'users'], function(){
    Route::get('/', function(){
        return 'Work';
    });
    Route::get('show', '#####Controller@####');
    Route::delete('delete', '#####Controller@####');
    Route::put('update', '#####Controller@####');
    Route::get('edit', '#####Controller@####');
});
*/
#Route::get('check', 'App\Http\Controllers\Admin\AdminController@ShowNaddilwer')->middleware('auth');
//OR
Route::group(['middleware' => 'auth'], function(){
    Route::get('check', 'App\Http\Controllers\Admin\AdminController@ShowNaddilwer');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
    Route::get('surce', 'AdminController@ShowAdminew');
});

Route::resource('CRUD','App\Http\Controllers\CrudController');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



Route::get('fillabel',[App\Http\Controllers\FillabelController::class, 'fillabel']);

Route::group(['prefix' => 'offers'], function(){
    Route::post('store', [FillabelController::class, 'store'])->name('offers.store');
    Route::get('create', [FillabelController::class, 'create']);

});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['prefix' => 'offers'], function(){
            Route::post('store', [FillabelController::class, 'store'])->name('offers.store');
            Route::get('create', [FillabelController::class, 'create']);
            Route::get('table', [FillabelController::class, 'table'])->name('offers.table');
            Route::get('edit/{Offers_id}', [FillabelController::class, 'edit'])->name('offers.edit');
            Route::post('update/{Offers_id}', [FillabelController::class, 'upDate'])->name('offers.update');
            Route::get('delete/{Offers_id}', [FillabelController::class, 'delete'])->name('offers.delete');

            Route::get('scope', [FillabelController::class, 'scope'])->name('offers.scope');

        });

        Route::get('youtube', [YoutubeController::class, 'index'])->middleware('auth');
 });

##################################################################################
##################################################################################
##################################################################################
##                                     Ajax                                     ##
##################################################################################
##################################################################################
##################################################################################
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['prefix' => 'Ajax-Offers'], function(){
            Route::post('store', [AjaxOffersController::class, 'store'])->name('Ajax-Offers.store');
            Route::get('create', [AjaxOffersController::class, 'create'])->name('Ajax-Offers.create');
            Route::get('table', [AjaxOffersController::class, 'table'])->name('Ajax-Offers.table');
            Route::get('edit/{Offers_id}', [AjaxOffersController::class, 'edit'])->name('Ajax-Offers.edit');
            Route::post('update', [AjaxOffersController::class, 'upDate'])->name('Ajax-Offers.update');
            Route::post('delete', [AjaxOffersController::class, 'delete'])->name('Ajax-Offers.delete');
        });
    });
##################################################################################
##################################################################################
##################################################################################
##                               Middleware                                     ##
##################################################################################
##################################################################################
##################################################################################
Route::group(['middleware' => 'Checkage'], function(){
    Route::get('adualt', [MiddlewareController::class, 'adualt']);

});
Route::get('test-adualt', [MiddlewareController::class, 'notadualt'])->name('test-adualt');

Route::get('site_middleware', [MiddlewareController::class, 'site'])->middleware('auth:web')->name('site_middleware');
Route::get('admin_middleware', [MiddlewareController::class, 'admin'])->middleware('auth:admin')->name('admin_middleware');


Route::get('admin/login', [MiddlewareController::class, 'AdminLogin'])->name('admin.login');
Route::post('admin/login', [MiddlewareController::class, 'CheckAdminLogin'])->name('Check.admin.login');


################### Begin relations  routes ######################

######## one to one ########
Route::get('has-one', [RelationController::class, 'RelationHasOne']);

Route::get('has-one-reserve', [RelationController::class, 'hasOneRelationReverse']);

Route::get('get-user-has-phone', [RelationController::class, 'getUserHasPhone']);

Route::get('get-user-not-has-phone', [RelationController::class, 'getUserNotHasPhone']);

Route::get('get-user-has-phone-with-condition', [RelationController::class, 'getUserWhereHasPhoneWithCondition']);

####### End one to one #######
######## one to Mnay ########

Route::get('has-one-Many', [RelationController::class, 'RelationHasOneMany']);
Route::get('hospital-delete/{Hdelete_id}', [RelationController::class, 'HospitalDelete'])->name('hospital.delete');

Route::get('has-one-Many-Reverse', [RelationController::class, 'RelationHasOneManyReverse']);

Route::get('one-Many-table-hospital', [RelationController::class, 'TableHospital'])->name('table.hospital');

Route::get('one-Many-table-doctor/{hospital_id}', [RelationController::class, 'TableDoctor'])->name('table.doctor');

Route::get('hospital-has-doctor', [RelationController::class, 'HospitalDoctor']);

Route::get('hospital-has-doctor-male', [RelationController::class, 'HospitalDoctorMale']);

Route::get('hospital-not-doctor-male', [RelationController::class, 'HospitalDoctorNotMale']);
####### End one to Mnay #######
######## Mnay to Mnay ########

Route::get('Mnay-Many', [RelationController::class, 'RelationMany']);

Route::get('Mnay-Many-Doctors', [RelationController::class, 'RelationManyGetDoctors']);

Route::get('Mnay-Many-Doctors-Serveice-Create/{service_id}', [RelationController::class, 'RelationManyGetDoctorsServeiceCreate'])->name('creat.service');
Route::post('Mnay-Many-insert', [RelationController::class, 'RelationManyInsert'])->name('insert.service.doctor');


####### End Mnay to Mnay #######
######## has One Through  ########

Route::get('has-One-Through', [RelationController::class, 'RelationThrough']);

Route::get('has-Many-Through', [RelationController::class, 'RelationManyThrough']);


####### End has One Through #######
################## Begin one To many Relationship #####################

##################################################################################
##################################################################################
##################################################################################
##                               COllection                                     ##
##################################################################################
##################################################################################
##################################################################################
Route::get('collection', [CollectTutController::class, 'index']);

Route::get('maincats',[CollectTutController::class, 'complex']);

Route::get('main-cats',[CollectTutController::class, 'complexFilter']);

Route::get('main-cats3',[CollectTutController::class, 'complextransform']);

##################################################################################
##################################################################################
##################################################################################
##                               accessors                                     ##
##################################################################################
##################################################################################
##################################################################################

#######################  Begin accessors and mutators ###################

Route::get('accessors',[RelationController::class, 'getDoctors']);

#Route::get('accessors',[RelationsController::class, 'getDoctors']);

#######################  End accessors and mutators ###################
