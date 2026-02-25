
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

    <form action="{{route('update.user')}}" method="POST" enctype="multipart/form-data" class="space-y-5">
      <!-- CSRF & Method Spoofing if using Laravel -->
       @csrf 
      <!-- @method('PUT') -->
      <input type="hidden" name="id" value="{{$user['id']}}">
      <div>
        <label for="name" class="block text-gray-600 font-medium mb-1">Name</label>
        <input type="text" id="name" value="{{$user['name']}}" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter sermon title">
      </div>

      <div>
        <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
        <input type="text" id="email" value="{{$user['email']}}" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" >
      </div>

      <div>
        <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
        <input type="password" id="password" value="{{$user['password']}}" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Enter sermon description..."></textarea>
      </div>

      <div>
        <label for="role" class="block text-gray-600 font-medium mb-1">Role</label>
        <input type="text" id="role" value="{{$user['role']}}" name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" >
      </div>

      <div>
        <label for="phone" class="block text-gray-600 font-medium mb-1">Phone</label>
        <input type="text" id="phone" value="{{$user['phone']}}" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
      </div>

     

      <div class="text-center">
        <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-full hover:bg-blue-700 transition duration-200">Update User</button>
      </div>
    </form>
  </div>

</body>
</html>
