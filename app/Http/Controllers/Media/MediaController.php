<?php

namespace App\Http\Controllers\Media;

use App\Models\Song;
use App\Models\User;
use App\Models\Sermon;
use App\Models\Picture;
use App\Models\Testimony;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class MediaController extends Controller
{

   use AuthorizesRequests;


   public function addSermon(Request $req){
   
    $req->validate([
        'title'       => 'required|string|max:255',
        'minister'    => 'required|string|max:255',
        'file'        => 'required|mimes:mp3,wav,m4a|max:81200', // 80MB
        'sermon_date' => 'required|date',
        'year'        => 'required|integer',
        'month'       => 'required|string',
     ]);
   
    $this->authorize('create', Sermon::class);

    // Store file safely
    $path = $req->file('file')->store('sermons', 'public');

    $sermon = Sermon::create([
        'title'        => $req->title,
        'minister'     => $req->minister,
        'description'  => $req->description,
        'audio_path'   => $path,
        'sermon_date'  => $req->sermon_date,
        'year'         => $req->year,
        'month'        => $req->month,
    ]);

    return redirect('dashboard')->with('success', 'Sermon uploaded successfully');
}


     public function download(Sermon $sermon){
      return Storage::disk('public')->download($sermon->audio_path);
    }

     public function EditSermon($id) {
      $update = Sermon::find($id);
      $this->authorize('update',$update);
      return view("public.update",compact('update'));
     }

     public function UpdateSermon(Request $req) {
          

        //   $file = $req->input('title');
        //   $filename = $file.".".$req->file->getClientOriginalExtension();
        //   $req->file->move('sermons',$filename);
         
          $path = $req->file('file')->store('sermons', 'public');

          $update = Sermon::find($req->id);
          $update->title = $req->title;
          $update->minister = $req->minister;
          $update->title = $req->title;
          $update->description = $req->description;
          $update->audio_path = $path;
          $update->title = $req->title;
          $update->sermon_date = $req->sermon_date;
          $update->year = $req->year;
          $update->month = $req->month;
          
          $update->save();

          return redirect('dashboard');

     }

     public function deleteSermon(Sermon $sermon) {
        $this->authorize('delete');
        dd('Sermon Deleted');
        $sermon->delete();
        return redirect('dashboard');
     }


     public function addImage(Request $req) {
        $req->validate([
            "title"=>"Required",
            "file"=>"Required",
            "image_date"=>"Required",
        ]);


      

        $path = $req->file('file')->store('pictures', 'public');

        $pix = new Picture;
        $pix->title = $req->title;
        $pix->image_path = $path;
        $pix->picture_date = $req->image_date;
        
        $pix->save();
        return redirect('dashboard');
     }


     public function addSongs(Request $req) {
        $req->validate([
         "title"=>"Required",
         "minister"=>"Required",
         "description"=>"Required",
         "audio_path"=>"Required",
         "release_date"=>"Required",
         "year"=>"Required",
         "month"=>"Required"
        ]);

        

        $path = $req->file('file')->store('songs', 'public');
        $song = new Song;
        $song->title = $req->title;
        $song->minister = $req->minister;
        $song->description = $req->description;
        $song->audio_path =  $path;
        $song->release_date = $req->release_date;
        $song->year = $req->year;
        $song->month = $req->month;

        $song->save();
        return redirect('dashboard');
     }

 public function dashboardControl() {
       $userdata = User::all();
       $msg = Sermon::paginate(5);
       $songs = Song::all();
       $pics = Picture::all();
       $testimonies = Testimony::get();
       $users = User::selectRaw('MONTH(created_at) as month, count(*) as count')
                ->whereYear('created_at',date('Y'))
                ->groupBy('month')
                ->orderBy('month')
                ->get();

                $labels = [];
                $data = [];
                $colors = [
                 
                    '#FF6384', // January
                    '#36A2EB', // February
                    '#FFCE56', // March
                    '#4BC0C0', // April
                    '#9966FF', // May
                    '#FF9F40', // June
                    '#66BB6A', // July
                    '#BA68C8', // August
                    '#FF7043', // September
                    '#26C6DA', // October
                    '#D4E157', // November
                    '#8D6E63'  // December
                    ];
             
                for($i=1; $i <= 12; $i++) {
                    $month = date('F',mktime(0,0,0,$i,1));
                    $count = 0;

                    foreach($users as $user) {
                        if($user->month == $i) {
                            $count = $user->count;
                            break;
                        }
                    } 
                    array_push($labels,$month);
                    array_push($data,$count);
                }

                $datasets = [
                    [
                        'label' => 'users',
                        'data' => $data,
                        'backgroundColor' => $colors
                        
                ]
                    ];

       return view("admin.dashboard",compact('msg','datasets','labels','userdata','songs','pics','testimonies'));
     }

     public function SermonPage() {
        $currentYear = now()->year;
        $sermons = Sermon::whereYear('sermon_date', $currentYear)
        ->orderBy('sermon_date','asc')->get()
        ->groupBy(function ($sermon) {
            return \Carbon\Carbon::parse($sermon->sermon_date)->format('F Y');
        });

       return view("public.message",compact('sermons'));
     } 

 

  public function SearchSermon(Request $request) {

    $results = collect();
    $data = strtolower(trim($request->query('query')));
    $year = $request->query('year');

    // Step 1: Search by title or month string
    if (!empty($data)) {
        $monthNumber = null;
        if ($timestamp = strtotime($data)) {
            $monthNumber = (int) date("n", $timestamp); // Converts 'january' to 1, etc.
        }

        $search = Sermon::query()
            ->where('title', 'like', "%{$data}%");

        if ($monthNumber) {
            $search->orWhere('month', $monthNumber);
        }

        $results = $search->get();
    }

    // Step 2: Search by year if provided
    if (!empty($year)) {
        $yearResults = Sermon::where('year', $year)->get();
        $results = $results->merge($yearResults);
    }

    $results = $results->unique('id');

    // Step 3: Group results by month and sort
    $groupedResults = $results
        ->sortBy(['year', 'month']) // Optional: sort results
        ->groupBy(function ($item) {
            return $item->month; // Group by numeric month
        });

    return view('public.messageSearch', [
        'groupedResults' => $groupedResults,
    ]);
       
}



     
      
      public function editUser(User $user) {
      $this->authorize('update',$user);   
      return view('public.updateUser',compact('user'));
      }

      public function updateUser(Request $req) {
         $update = User::find($req->id);
         $update->name = $req->name;
         $update->email = $req->email;
         $update->role = $req->role;
         $update->password = bcrypt($req->password);
         $update->phone = $req->phone;

         $update->save();
         return redirect('dashboard');
      }

      public function deleteUser(User $user) {
       $this->authorize('delete',$user);
       $user->delete();
       return redirect('dashboard');
      }



      public function uploadTestimony(Request $request) {
        $testimony = $request->validate([
            "testifier" => "required",
            "testimony" => "required"
        ]);

        Testimony::create([
            "testifier" => $testimony['testifier'],
            "testimony" => $testimony['testimony'],
        ]);

        return redirect('dashboard');
      }
}
