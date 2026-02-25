
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Sermon</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-10 px-4">

  <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Update Sermon</h2>

    <form action="/update-sermon" method="POST" enctype="multipart/form-data" class="space-y-5">
      <!-- CSRF & Method Spoofing if using Laravel -->
       @csrf 
      <!-- @method('PUT') -->
      <input type="hidden" name="id" value="{{$update['id']}}">
      <div>
        <label for="title" class="block text-gray-600 font-medium mb-1">Title</label>
        <input type="text" id="title" value="{{$update['title']}}" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter sermon title">
      </div>

      <div>
        <label for="minister" class="block text-gray-600 font-medium mb-1">Minister</label>
        <input type="text" id="minister" value="{{$update['minister']}}" name="minister" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Minister's name">
      </div>

      <div>
        <label for="description" class="block text-gray-600 font-medium mb-1">Description</label>
        <textarea id="description" value="{{$update['description']}}" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter sermon description..."></textarea>
      </div>

      <div>
        <label for="audio_path" class="block text-gray-600 font-medium mb-1">Upload Audio</label>
        <input type="file" id="audio_path" value="{{$update['audio_path']}}" name="file" accept=".mp3,.wav,.ogg" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
      </div>

      <div>
        <label for="sermon_date" class="block text-gray-600 font-medium mb-1">Sermon Date</label>
        <input type="date" id="sermon_date" value="{{$update['sermon_date']}}" name="sermon_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
      </div>

      <div>
        <label for="year" class="block text-gray-600 font-medium mb-1">Year</label>
        <input type="number" id="year" value="{{$update['year']}}" name="year" min="1900" max="2100" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="e.g. 2025">
      </div>

      <div>
        <label for="month" class="block text-gray-600 font-medium mb-1">Month</label>
        <select id="month" value="{{$update['month']}}" name="month" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
          <option value="">-- Select Month --</option>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div>

      <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-full hover:bg-blue-700 transition duration-200">Update Sermon</button>
      </div>
    </form>
  </div>

</body>
</html>
