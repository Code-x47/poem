<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Picture;
use App\Models\Sermon;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index() {
        $testimonies = Testimony::latest()->take(4)->get();
        $sermon = Sermon::orderBy("sermon_date","desc")->first();
        $pics = Picture::latest()->take(5)->get();
        $books = Book::all();
        return view('public.index',compact('testimonies','sermon','pics','books'));
    }

    public function Gallery() {
         $pics = Picture::latest()->take(16)->get();
         return view('public.gallery',compact('pics'));
    }


    

     public function BookDetails(Book $book) {
       return view("public.bookpage",compact('book'));
    }

}
