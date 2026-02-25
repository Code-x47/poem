<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>POEM ADMIN DASHBOARD</title>
  <link rel="stylesheet" href="assets/css/test.css" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/image/images/newLogo.png">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
  <!-- DASHBOARD -->
  <!-- Hamburger Toggle -->


  <div id="dashboard" class="dashboard-container">
   
    <button id="sidebarToggle" class="hamburger-btn">☰</button>
    <div class="sidebar">
    
      <div class="sidebar-header">
        <img src="{{asset('assets/image/images/newLogo.png')}}" alt="" class="logo" width="60" height="60">
				<h1 class="site-title">People Of Exploits Ministry</h1>
     </div>
      <div class="nav-menu">
        <div id="sermon" class="nav-item"><span class="nav-icon">🎵</span>Sermon</div>
        <div id="song" class="nav-item"><span class="nav-icon">🎵</span>Songs</div>
        <div id="addImagesBtn" class="nav-item"><span class="nav-icon">🖼️</span> Add Images</div>
        <div id="sendWhatsAppBtn" class="nav-item"><span class="nav-icon">📱</span> Send WhatsApp Message</div>
        <div id="sendTextBtn" class="nav-item"><span class="nav-icon">📨</span><a href="{{Route('sendSms')}}" style="color:white; text-decoration:none"> Send Text Message</a></div>
        <div id="testimonyBtn" class="nav-item"><span class="nav-icon">📨</span>Upload Testimony</div>
        <div id="user" class="nav-item"><span class="nav-icon">👤</span> Manage Users</div>
         <div class="nav-item"><span class="nav-icon">👤</span><a href="{{Route('admin.logout')}}" style="color:white; text-decoration:none"> Logout </a></div>
      </div>
    </div>

    <div class="main-content">
      <div class="header">
        <h2>Dashboard Overview</h2>
        <p>Welcome back! Here's what's happening with your admin panel today.</p>
      </div>

      <div class="stats-grid">
        <div class="stat-card"><div class="stat-number">{{$msg?->count()}}</div><div class="stat-label">Total Messages</div></div>
        <div class="stat-card"><div class="stat-number">{{$songs?->count()}}</div><div class="stat-label">Music Files</div></div>
        <div class="stat-card"><div class="stat-number">{{$pics?->count()}}</div><div class="stat-label">Images</div></div>
        <div class="stat-card"><div class="stat-number">{{$userdata?->count()}}</div><div class="stat-label">Registered Users</div></div>
    </div>
<!--CHART-->
 <h2 style="margin: 0; font-size: 1.2rem; color: #333;">Users Chart</h2>

<div style="width: 900px; margin: auto">
<div class="table-container" style="margin-top: 40px; background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06); overflow-x: auto;">  
<canvas id="chart" height="400"></canvas>
</div>
</div>



<!-- USERS Table Section -->
<div id="manage-users" class="table-container section" style="margin-top: 40px; background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06); overflow-x: auto;">
  <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="margin: 0; font-size: 1.2rem; color: #333;">User Table</h2>
    <button class="create-btn" id="registerUserBtn" style="background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer;">+ Create New</button>
  </div>

  <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
    <thead>
      <tr style="background-color: #f0f2f5; color: #333;">
        <th style="padding: 12px; text-align: left;">#</th>
        <th style="padding: 12px; text-align: left;">Full Name</th>
        <th style="padding: 12px; text-align: left;">Email</th>
        <th style="padding: 12px; text-align: left;">Role</th>
        <th style="padding: 12px; text-align: left;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($userdata As $user)
      <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 12px;">{{$user['id']}}</td>
        <td style="padding: 12px;">{{$user['name']}}</td>
        <td style="padding: 12px;">{{$user['email']}}</td>
        <td style="padding: 12px;">{{$user['role']}}</td>
        <td style="padding: 12px;">
          <button style="background-color: #17a2b8; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration:none; color:white;">View</button>
          <button style="background-color: #ffc107; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration:none; color:white;"><a style="text-decoration: none; color: white;" href="{{route('edit.user',$user->id)}}">Update</a></button>
          <button style="background-color: #dc3545; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; text-decoration:none; color:white;"><a style="text-decoration: none; color: white;" href="delete/{{$user['id']}}">Delete</a></button>
        </td>
      </tr>
      @endforeach
      <!-- Add more rows here -->
    </tbody>
  </table>
</div>

    <!-- Sermon Table Section -->
<div id="sermons" class="table-container section" style="margin-top: 40px; background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06); overflow-x: auto;">
  <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="margin: 0; font-size: 1.2rem; color: #333;">Sermon Table</h2>
    <button class="create-btn" id="addMessageBtn" style="background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer;">+ Create New</button>
  </div>

  <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
    <thead>
      <tr style="background-color: #f0f2f5; color: #333;">
        <th style="padding: 12px; text-align: left;">#</th>
        <th style="padding: 12px; text-align: left;">Title</th>
        <th style="padding: 12px; text-align: left;">Minister</th>
        <th style="padding: 12px; text-align: left;">Month</th>
        <th style="padding: 12px; text-align: left;">Year</th>
        <th style="padding: 12px; text-align: left;">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($msg AS $msgs)
      <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 12px;">{{$msgs['id']}}</td>
        <td style="padding: 12px;">{{$msgs['title']}}</td>
        <td style="padding: 12px;">{{$msgs['minister']}}</td>
        <td style="padding: 12px;">{{ \Carbon\Carbon::createFromDate(null, $msgs['month'], 1)->format('F') }}</td>
        <td style="padding: 12px;">{{ $msgs['year'] }}</td>
        <td style="padding: 12px;">
          <button style="background-color: #17a2b8; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px;"><a style="text-decoration: none; color: white;" href="{{route('download.sermon',$msgs->id)}}">Download</a></button>
          <button style="background-color: #ffc107; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration: none; color: white;"><a style="text-decoration: none; color: white;" href="{{route('edit.sermon', $msgs->id)}}">Update</a></button>
          <button style="background-color: #dc3545; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px;"><a style="text-decoration: none; color: white;" href="{{route('delete.sermon',$msgs->id)}}">Delete</a></button>
        </td>
      </tr>
    @endforeach  
      <!-- Add more rows here -->
    </tbody>
  </table>
</div>


<!-- Add Songs -->
<div id="songs" class="table-container section" style="margin-top: 40px; background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06); overflow-x: auto;">
  <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="margin: 0; font-size: 1.2rem; color: #333;">Songs</h2>
    <button class="create-btn" id="addMusicBtn" style="background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer;">+ Create New</button>
  </div>

  <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
    <thead>
      <tr style="background-color: #f0f2f5; color: #333;">
        <th style="padding: 12px; text-align: left;">#</th>
        <th style="padding: 12px; text-align: left;">Title</th>
        <th style="padding: 12px; text-align: left;">Minister</th>
        <th style="padding: 12px; text-align: left;">Year</th>
        <th style="padding: 12px; text-align: left;">Actions</th>
      </tr>
    </thead>
    <tbody>
    
      <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 12px;">1</td>
        <td style="padding: 12px;">No song available yet</td>
        <td style="padding: 12px;">No song available yet</td>
        <td style="padding: 12px;">No song available yet</td>
        <td style="padding: 12px;">
          <button style="background-color: #17a2b8; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px;"><a style="text-decoration: none; color: white;" href="#">Download</a></button>
          <button style="background-color: #ffc107; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration: none; color: white;"><a style="text-decoration: none; color: white;" href="#">Update</a></button>
          <button style="background-color: #dc3545; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px;"><a style="text-decoration: none; color: white;" href="#">Delete</a></button>
        </td>
      </tr>
      
      <!-- Add more rows here -->
    </tbody>
  </table>
</div>




<!-- Add Testimony -->
<div id="testimonies" class="table-container section" style="margin-top: 40px; background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06); overflow-x: auto;">
  <div class="table-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="margin: 0; font-size: 1.2rem; color: #333;">Testimonies</h2>
    <button class="create-btn" id="addTestimonyBtn" style="background-color: #28a745; color: white; padding: 8px 16px; border: none; border-radius: 6px; font-size: 14px; cursor: pointer;">+ Create New</button>
  </div>

  <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
    <thead>
      <tr style="background-color: #f0f2f5; color: #333;">
        <th style="padding: 12px; text-align: left;">#</th>
        <th style="padding: 12px; text-align: left;">Testifier</th>
        <th style="padding: 12px; text-align: left;">Testimony</th>
        <th style="padding: 12px; text-align: left;">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($testimonies as $testimony)
      
    
      <tr style="border-bottom: 1px solid #eee;">
        <td style="padding: 12px;">{{$testimony['id']}}</td>
        <td style="padding: 12px;">{{$testimony['testifier']}}</td>
        <td style="padding: 12px;">{{ Str::words($testimony->testimony, 35) }}</td>
        <td style="padding: 12px;">
          <button style="background-color: #ffc107; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px; margin-right: 5px; text-decoration: none; color: white;"><a style="text-decoration: none; color: white;" href="#">Update</a></button>
          <button style="background-color: #dc3545; color: white; padding: 6px 10px; border: none; border-radius: 4px; font-size: 12px;"><a style="text-decoration: none; color: white;" href="#">Delete</a></button>
        </td>
      </tr>
    @endforeach  
      <!-- Add more rows here -->
    </tbody>
  </table>
</div>
    
  </div>

  </div>

  

  <!-- ALL MODALS (Message, Music, WhatsApp, Text, User) -->
  <!-- Use the same structure for each modal -->
  <!-- For brevity, messageModal is shown, rest follow same pattern -->

<!--UPLOAD SERMON-->
  <div id="messageModal" class="modal">
    <div class="modal-content content1">
      <div class="modal-header">
        <h3 class="modal-title">Add New Sermon</h3>
        <button class="close-modal" data-modal="messageModal">×</button>
      </div>
      

      <form id="sermonForm" method="POST" action="{{route('upload.sermon')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Title</label>
          <input type="text" class="form-input" name="title">
       </div>

       <div class="form-group">
        <label class="form-label">Minister</label>
        <input type="text" class="form-input" name="minister">
      </div>

      <div class="form-group">
       <label class="form-label">Description</label>
       <textarea class="form-textarea" name="description" rows="4"></textarea>
     </div>

     <div class="form-group">
      <label class="form-label">Audio File</label>
      <input type="file" class="form-input" name="file">
    </div>

    <div class="form-group">
      <label class="form-label">Sermon Date</label>
      <input type="date" class="form-input" name="sermon_date">
   </div>

  <!-- Optional: If you want users to manually choose year and month -->
  <!-- Otherwise derive in controller from sermon_date -->

   <div class="form-group">
    <label class="form-label">Year</label>
    <input type="number" class="form-input" name="year" min="1900" max="2100">
  </div>

  <div class="form-group">
    <label class="form-label">Month</label>
    <select class="form-select" name="month">
      <option value="month">Select month</option>
      @for ($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}">{{ date("F", mktime(0, 0, 0, $i, 10)) }}</option>
      @endfor
    </select>
  </div> 

    <button type="submit" class="btn btn-primary">Add Sermon</button>
  </form>


</div>

</div>






<!--ADD Image Modal -->

 <div id="imageModal" class="modal">
    <div class="modal-content content2">
      <div class="modal-header">
        <h3 class="modal-title">Add New Image</h3>
        <button class="close-modal" data-modal="imageModal">×</button>
      </div>
      

      <form id="imageForm" method="POST" action="{{route('upload.image')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Title</label>
          <input type="text" class="form-input" name="title">
       </div>


     <div class="form-group">
      <label class="form-label">Image File</label>
      <input type="file" class="form-input" name="file">
    </div>

    <div class="form-group">
      <label class="form-label">Image Date</label>
      <input type="date" class="form-input" name="image_date">
   </div>

  <!-- Optional: If you want users to manually choose year and month -->
  <!-- Otherwise derive in controller from sermon_date -->

   
    <button type="submit" class="btn btn-primary">Image Upload</button>
  </form>


</div>

</div>

<!--ADD Music Modal -->

<div id="musicModal" class="modal">
    <div class="modal-content content3">
      <div class="modal-header">
        <h3 class="modal-title">Add New Song</h3>
        <button class="close-modal" data-modal="musicModal">×</button>
      </div>
      

      <form id="" method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label class="form-label">Title</label>
          <input type="text" class="form-input" name="title">
       </div>

       <div class="form-group">
        <label class="form-label">Minister</label>
        <input type="text" class="form-input" name="minister">
      </div>

      <div class="form-group">
       <label class="form-label">Description</label>
       <textarea class="form-textarea" name="description" rows="4"></textarea>
     </div>

     <div class="form-group">
      <label class="form-label">Audio File</label>
      <input type="file" class="form-input" name="audio_path">
    </div>

    

  <!-- Optional: If you want users to manually choose year and month -->
  <!-- Otherwise derive in controller from sermon_date -->

   <div class="form-group">
    <label class="form-label">Year</label>
    <input type="number" class="form-input" name="year" min="1900" max="2100">
  </div>



    <button type="submit" class="btn btn-primary">Add Song</button>
  </form>


</div>

</div>



<!--Add Testimony-->

<div id="testimonyModal" class="modal">
    <div class="modal-content content3">
      <div class="modal-header">
        <h3 class="modal-title">Add Testimony</h3>
        <button class="close-modal" data-modal="testimonyModal">×</button>
      </div>
      

      <form id="" method="POST" action="{{route('add.testimony')}}">
        @csrf
        <div class="form-group">
          <label class="form-label">Testifier</label>
          <input type="text" class="form-input" name="testifier">
       </div>

   

      <div class="form-group">
       <label class="form-label">Testimony</label>
       <textarea class="form-textarea" name="testimony" rows="4"></textarea>
     </div>

    <button type="submit" class="btn btn-primary">Add Testimony</button>
  </form>


</div>

</div>



<!--USER REGISTRATION MODAL-->

<div id="userModal" class="modal">
    <div class="modal-content content2">
      <div class="modal-header">
        <h3 class="modal-title">User Registration</h3>
        <button class="close-modal" data-modal="userModal">×</button>
      </div>
      

      <form id="userRegForm" method="POST" action="{{route('user.reg')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="form-label">Name</label>
          <input type="text" class="form-input" name="name">
       </div>


     <div class="form-group">
      <label class="form-label">Email</label>
      <input type="text" class="form-input" name="email">
    </div>

     <div class="form-group">
      <label class="form-label">Password</label>
      <input type="password" class="form-input" name="password">
    </div>

    <div class="form-group">
      <label class="form-label">Phone</label>
      <input type="text" class="form-input" name="phone" placeholder="example 2348160497532">
   </div>

  <!-- Optional: If you want users to manually choose year and month -->
  <!-- Otherwise derive in controller from sermon_date -->

   
    <button type="submit" class="btn btn-primary">Register</button>
  </form>


</div>

</div>
 




  <script src="assets/js/dashboard2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>


  <script>
  const hamburgerBtn = document.querySelector('.hamburger-btn');
  const sidebar = document.querySelector('.sidebar');

  hamburgerBtn.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });
</script>


<script>
  var ctx = document.getElementById('chart').getContext('2d');
  var userChart = new Chart(ctx,{
    type:'bar',
    data: {
      labels: {!! json_encode($labels) !!},
      datasets: {!! json_encode($datasets) !!}
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
</script>


<script>
  // Sections
  const manageUsers = document.getElementById('manage-users');
  const sermons = document.getElementById('sermons');
  const songs = document.getElementById('songs');
  const testimonies = document.getElementById('testimonies');

  // Menu buttons
  const userBtn = document.getElementById('user');
  const sermonBtn = document.getElementById('sermon');
  const songBtn = document.getElementById('song');
  const testimonyBtn = document.getElementById('testimonyBtn');

  // Helper: hide all
  function hideAllSections() {
    manageUsers.style.display = 'none';
    sermons.style.display = 'none';
    songs.style.display = 'none';
    testimonies.style.display = 'none';
  }

  // Click events
  userBtn.addEventListener('click', () => {
    hideAllSections();
    manageUsers.style.display = 'block';
  });

  sermonBtn.addEventListener('click', () => {
    hideAllSections();
    sermons.style.display = 'block';
  });

  songBtn.addEventListener('click', () => {
    hideAllSections();
    songs.style.display = 'block';
  });

  testimonyBtn.addEventListener('click', () => {
    hideAllSections();
    testimonies.style.display = 'block';
  });
</script>





</body>
</html>
