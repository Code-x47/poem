<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
  
     use AuthorizesRequests;

public function sendBulkSms(SmsService $smsService)
{
    $recipients = ['2349026380679', '2348153777284']; // Nigerian format
    $message = 'Hello from POEM!';

    $smsService->sendBulkSms($recipients, $message);

    dd('Message Sent');

    return response()->json(['status' => 'Bulk SMS Sent'])->name('sendSms');
}

public function testId() {
    
$response = Http::get('https://api.ng.termii.com/api/sender-id', [
'api_key' =>"TLuCwBESptPlMMBQgYevRoeBQgTQYjqWAGTFAflFarJNFeElIcqnKIjqPAMaKD",
]);

dd($response->json());

}

public function regUser(Request $req) {
  
    $validate = $req->validate([
    "name"=>"Required",
    "email"=>"Required",
    "password"=>"Required",
    "phone"=>"Required"
    ]);

    $this->authorize('create',User::class);

  $validate['password'] = bcrypt($validate['password']);
  $user = User::Create($validate);

   return redirect('/dashboard');

}

public function AdminLogin(Request $req) {
  
    $validator = $req->validate([
    "username"=>"Required",
    "password"=>"Required"
  ]);

  
  if(auth()->attempt([
    "email" => $validator['username'],
    "password"=> $validator['password']
  ])) {
  
    $req->session()->Put('data',$validator['username']);
    if(auth()->user()->role == 'admin') {
       return redirect('dashboard');
    }
    else if(!auth()->check()) {
       dd('user not logged in');
    }
    else {
       
         dd('you are not an admin');
       //return redirect('/');
    }
    
}




}



public function Logout() {
    auth()->logout();
    return redirect('/');
}


  
}
