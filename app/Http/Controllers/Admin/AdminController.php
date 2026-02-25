<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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

 $user = User::where('email', $req->username)->first();
   dd(Hash::check("password",$user->password));
    if (!$user) {
        dd('User not found');
    }

    dd(Hash::check($req->password, $user->password));
  
    $validator = $req->validate([
    "username"=>"Required",
    "password"=>"Required"
    ]);

  
  if(Auth::attempt([
    "email" => $validator['username'],
    "password"=> $validator['password']
  ])) {
  
     //$req->session()->regenerate();
    $req->session()->Put('data',$validator['username']);
    if(Auth::user()->role == 'admin') {
       return redirect('dashboard');
    }

      
    Auth::logout();

    return back()->withErrors([
       'username' => 'You are not authorized as admin.'
     ]);
}

   return back()->withErrors([
        'username' => 'Invalid credentials.'
    ]);



}



  public function Logout() {
      Auth::logout();
      return redirect('/');
  }


  
}
