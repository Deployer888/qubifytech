<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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

// Auth Routes
require __DIR__ . '/auth.php';

// Language Switch
Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('dashboard', 'App\Http\Controllers\Frontend\FrontendController@index')->name('dashboard');
// Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');



/*
*
* Service Routes
*
* --------------------------------------------------------------------
*/

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::post('/contact/submit', 'FrontendController@submit')->name('contact.submit');
    // Route::get('home', 'FrontendController@index')->name('home');
    Route::get('aadhar-verification', 'FrontendController@aadharVerification')->name('aadharVerification')->middleware('signed');
    Route::post("/send-otp", "FrontendController@sendOtp")->name("sendOtp");
    Route::post("/verify-otp", "FrontendController@verifyOtp")->name("verifyOtp");
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');
    Route::get('about', 'FrontendController@about')->name('about');
    Route::get('contact', 'FrontendController@contact')->name('contact');
    Route::get('solutions', 'FrontendController@solutions')->name('solutions');
    Route::get('services', function () {
        return view('frontend.services.index');
    })->name('services');
    Route::get('/solutions/human-resource-management-system', 'FrontendController@solutionsHrms')->name('solutions.hrms');
    Route::get('/solutions/customer-relationship-management-software', 'FrontendController@solutionsCrm')->name('solutions.crm');
    Route::get('/solutions/visitor-management-system', 'FrontendController@solutionsVms')->name('solutions.vms');
    Route::get('/solutions/hospital-information-system', 'FrontendController@solutionsHis')->name('solutions.his');
    Route::get('/solutions/point-of-sale-system', 'FrontendController@solutionsPos')->name('solutions.pos');
    Route::get('/solutions/vehicle-parking-system', 'FrontendController@solutionsVps')->name('solutions.vps');
    Route::get('/solutions/vehicle-tracking-system', 'FrontendController@solutionsVts')->name('solutions.vts');
    Route::get('/solutions/on-demand-delivery-software', 'FrontendController@solutionsDds')->name('solutions.dds');
    Route::get('/web-development/services/', function () {
        return view('frontend.services.web_dev_service');
    })->name('services.web-devvelopment');
    
    Route::get('/software-development/services/', function () {
        return view('frontend.services.software_dev_service');
    })->name('services.software-development');
    
    Route::get('/web-application-development/services/', function () {
        return view('frontend.services.web_app_dev_service');
    })->name('services.web-app');
    
    Route::get('mobile-application-development/services/', function () {
        return view('frontend.services.mobile_app_dev_service');
    })->name('services.mobile-app');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "{$module_name}.profile", 'uses' => "{$controller_name}@profile"]);
        Route::get('profile/{id}/edit', ['as' => "{$module_name}.profileEdit", 'uses' => "{$controller_name}@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "{$module_name}.profileUpdate", 'uses' => "{$controller_name}@profileUpdate"]);
        Route::get('profile/changePassword/{id}', ['as' => "{$module_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
        Route::patch('profile/changePassword/{id}', ['as' => "{$module_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
        Route::get("{$module_name}/emailConfirmationResend/{id}", ['as' => "{$module_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
        Route::delete("{$module_name}/userProviderDestroy", ['as' => "{$module_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {
    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');
    Route::post("visitor/pass", "BackendController@getVisitorPass")->name("visitors.pass");

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("{$module_name}", "{$controller_name}@index")->name("{$module_name}");
        Route::post("{$module_name}", "{$controller_name}@store")->name("{$module_name}.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("{$module_name}", ['as' => "{$module_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$module_name}/markAllAsRead", ['as' => "{$module_name}.markAllAsRead", 'uses' => "{$controller_name}@markAllAsRead"]);
    Route::delete("{$module_name}/deleteAll", ['as' => "{$module_name}.deleteAll", 'uses' => "{$controller_name}@deleteAll"]);
    Route::get("{$module_name}/{id}", ['as' => "{$module_name}.show", 'uses' => "{$controller_name}@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("{$module_name}", ['as' => "{$module_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$module_name}/create", ['as' => "{$module_name}.create", 'uses' => "{$controller_name}@create"]);
    Route::get("{$module_name}/download/{file_name}", ['as' => "{$module_name}.download", 'uses' => "{$controller_name}@download"]);
    Route::get("{$module_name}/delete/{file_name}", ['as' => "{$module_name}.delete", 'uses' => "{$controller_name}@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("{$module_name}", "{$controller_name}");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("{$module_name}/profile/{id}", ['as' => "{$module_name}.profile", 'uses' => "{$controller_name}@profile"]);
    Route::get("{$module_name}/profile/{id}/edit", ['as' => "{$module_name}.profileEdit", 'uses' => "{$controller_name}@profileEdit"]);
    Route::patch("{$module_name}/profile/{id}/edit", ['as' => "{$module_name}.profileUpdate", 'uses' => "{$controller_name}@profileUpdate"]);
    Route::get("{$module_name}/emailConfirmationResend/{id}", ['as' => "{$module_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
    Route::delete("{$module_name}/userProviderDestroy", ['as' => "{$module_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    Route::get("{$module_name}/profile/changeProfilePassword/{id}", ['as' => "{$module_name}.changeProfilePassword", 'uses' => "{$controller_name}@changeProfilePassword"]);
    Route::patch("{$module_name}/profile/changeProfilePassword/{id}", ['as' => "{$module_name}.changeProfilePasswordUpdate", 'uses' => "{$controller_name}@changeProfilePasswordUpdate"]);
    Route::get("{$module_name}/changePassword/{id}", ['as' => "{$module_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
    Route::patch("{$module_name}/changePassword/{id}", ['as' => "{$module_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
    Route::get("{$module_name}/trashed", ['as' => "{$module_name}.trashed", 'uses' => "{$controller_name}@trashed"]);
    Route::patch("{$module_name}/trashed/{id}", ['as' => "{$module_name}.restore", 'uses' => "{$controller_name}@restore"]);
    Route::get("{$module_name}/index_data", ['as' => "{$module_name}.index_data", 'uses' => "{$controller_name}@index_data"]);
    Route::get("{$module_name}/index_list", ['as' => "{$module_name}.index_list", 'uses' => "{$controller_name}@index_list"]);
    Route::resource("{$module_name}", "{$controller_name}");
    Route::patch("{$module_name}/{id}/block", ['as' => "{$module_name}.block", 'uses' => "{$controller_name}@block", 'middleware' => ['permission:block_users']]);
    Route::patch("{$module_name}/{id}/unblock", ['as' => "{$module_name}.unblock", 'uses' => "{$controller_name}@unblock", 'middleware' => ['permission:block_users']]);


    /*
    *
    *  Visitor Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'visitors';
    $controller_name = 'VisitorController';
    Route::post("{$module_name}/fetch-aadhar", "{$controller_name}@fetchAadharDetails")->name("{$module_name}.fetchAadharDetails");
    Route::get("{$module_name}/invites", "{$controller_name}@invites")->name("{$module_name}.invites");
    Route::get("{$module_name}/schedules", "{$controller_name}@schedules")->name("{$module_name}.schedules");
    
    Route::resource("{$module_name}", "{$controller_name}");
    
    /*
    *
    *  Aadhar Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'aadhar';
    $controller_name = 'AadharController';
    Route::post("{$module_name}/decode-hash", "{$controller_name}@decodeHash")->name("{$module_name}.decodeHash");
    Route::post("{$module_name}/authenticate", "{$controller_name}@authenticate")->name("{$module_name}.authenticate");
    Route::post("{$module_name}/send-otp", "{$controller_name}@sendOtp")->name("{$module_name}.sendOtp");
    Route::post("{$module_name}/verify-otp", "{$controller_name}@verifyOtp")->name("{$module_name}.verifyOtp");
    Route::get("{$module_name}/generate-aadhar-link", "{$controller_name}@generateAadharVerificationLink")->name("{$module_name}.generateAadharVerificationLink");
    
    Route::get('/generate-aadhar-link', function () {
        $url = URL::temporarySignedRoute(
            'frontend.aadharVerification', // Route name
            Carbon::now()->addHour(), // Expiry time (1 hour)
            []
        );
    
        return response()->json(['link' => $url]);
    });
    
    /*Route::get('/generate-aadhar-link', function () {
        $expiryTime = Carbon::now()->addHour(); // Valid for 1 hour

        $url = URL::temporarySignedRoute(
            'frontend.aadharVerification', // Route name
            $expiryTime,
            []
        );
    
        // Store expiry timestamp in cache
        Cache::put('aadhar_verification_expiry', $expiryTime, $expiryTime);
    
        return response()->json(['link' => $url]);
    });*/
    
    
    
    Route::get("{$module_name}/scan", "{$controller_name}@scan")->name("{$module_name}.scan");
    Route::post("{$module_name}/processQR", "{$controller_name}@processQR")->name("{$module_name}.processQR");
    
    Route::resource("{$module_name}", "{$controller_name}");
    
    /*
    *
    *  FaceAuth Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'faceauth';
    $controller_name = 'FaceAuthController';
    Route::post("{$module_name}/face-authenticate", "{$controller_name}@faceAuthenticate")->name("{$module_name}.faceAuthenticate");
    Route::resource("{$module_name}", "{$controller_name}");
    
});

