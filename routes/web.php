<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Users\HomeController;
use App\Services\SmsService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,"Index"])->name('home.index');;

/*Route::get('/message', function() {
    return view('public.message');
})->name('public.message');
*/
Route::get('/gallery', [HomeController::class,"Gallery"])->name('public.gallery');;

// Route::get('/gallery', function() {
//     return view('public.gallery');
// })->name('public.gallery');

Route::get('/dashboard', function() {
    return view('admin.dashboard');
});

    //Route::view('test','test');


   Route::controller(MediaController::class)->group(function() {
   Route::Post('/uploadSermon','addSermon')->name('upload.sermon');
   Route::Post('/dashboardImg','addImage')->name('upload.image');
   //Route::Get("download/{id}","downloadSermon")->name('download.sermon');
   Route::get('/sermons/{sermon}/download','download')->name('download.sermon');

   //CRUD ROUTES
   Route::view('update','update.sermon');
   Route::Get("editSermon/{id}","EditSermon")->name('edit.sermon');
   Route::Post("updateSermon","UpdateSermon")->name('update.sermon');
   Route::Get("editUser/{user}","editUser")->name('edit.user');
   Route::Post('update','updateUser')->name('update.user');
   Route::get('delete/{user}','deleteUser');
   Route::get('delete/{sermon}','deleteSernmon')->name('delete.sermon');
   //Route::view("update","public.update");

   //DASHBOARD CRUD
   Route::Get("/dashboard","dashboardControl")->middleware('AdminRoute');

   //ADD TESTIMONY
   Route::Post("add-testimony","uploadTestimony")->name("add.testimony");
   
  //USERS SERMON PAGE
   Route::Get('/message','SermonPage')->name('public.message');

   //SEARCH SERMON
   Route::Get('/search','SearchSermon')->name('message.search');

   

});




//ADMIN CONTROLLER


Route::controller(AdminController::class)->group(function(){
//SEND SMS ROUTE    
Route::Post('/dashboardReg','regUser')->name('user.reg');
Route::Get("sendsms","sendBulkSms")->name('sendSms');
Route::view("admin/login","admin.login")->name('admin.login');
Route::Post('/login','AdminLogin')->name('AdminLogin');
Route::Get("/logout","Logout")->name('admin.logout');

});
//CLEAR LOG:
Route::get('/clearlog', function () {
    file_put_contents(storage_path('logs/laravel.log'), '');
    return 'Log cleared!';
});


//SENDER-ID
Route::get('/senderid', function (SmsService $smsService) {
    $ids = $smsService->getSenderIds();

    if ($ids) {
        return response()->json($ids);
    }

    return response()->json(['error' => 'Failed to fetch sender IDs'], 500);
});

//TEST SENDER ID

Route::Get("testId",[AdminController::class,"testId"]);



Route::get('/seed', function () {
    dd([
        'connected_database' => DB::connection()->getDatabaseName(),
        'users_count_before' => DB::table('users')->count()
    ]);
    //Artisan::call('db:seed');
    //return 'Seeded!';
});


Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared!';
});

