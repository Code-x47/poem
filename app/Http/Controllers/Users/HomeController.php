<?php

namespace App\Http\Controllers\Users;

use App\Models\Sermon;
use App\Models\Picture;
use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function Index() {
        $testimonies = Testimony::latest()->take(4)->get();
        $sermon = Sermon::orderBy("sermon_date","desc")->first();
        $pics = Picture::latest()->take(5)->get();
        return view('public.index',compact('testimonies','sermon','pics'));
    }

    public function Gallery() {
         $pics = Picture::latest()->take(16)->get();
         return view('public.gallery',compact('pics'));
    }
}
