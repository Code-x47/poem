<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Admin Login</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('AdminLogin')}}" method="post">
@csrf
<input type="text" name="username" autocomplete="off"><br><br>

<input type="password" name="password"><br><br>

<button>Login</button>

</form>
    
</body>
</html>