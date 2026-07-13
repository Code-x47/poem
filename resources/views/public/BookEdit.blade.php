<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Book</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px 20px;
}

.container{
    max-width:800px;
    margin:auto;
}

.card{
    background:#fff;
    border-radius:10px;
    padding:35px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.card h2{
    margin-bottom:30px;
    color:#333;
    text-align:center;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#444;
}

input,
textarea,
select{
    width:100%;
    padding:14px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:15px;
    outline:none;
    transition:.3s;
}

input:focus,
textarea:focus,
select:focus{
    border-color:#007bff;
}

textarea{
    resize:vertical;
    min-height:140px;
}

.current-file{
    margin-top:8px;
    color:#666;
    font-size:14px;
}

.button-group{
    display:flex;
    gap:15px;
    margin-top:30px;
}

button,
a{
    flex:1;
    padding:14px;
    border:none;
    border-radius:6px;
    text-align:center;
    text-decoration:none;
    cursor:pointer;
    font-size:15px;
    font-weight:bold;
}

button{
    background:#007bff;
    color:#fff;
}

button:hover{
    background:#0056b3;
}

.cancel{
    background:#6c757d;
    color:#fff;
}

.cancel:hover{
    background:#555;
}
</style>

</head>
<body>

<div class="container">

    <div class="card">

        <h2>Update Book</h2>

        <form action="{{route('update.book')}}" method="POST" enctype="multipart/form-data">
         @csrf

         <input type="hidden" name="id" value="{{$book['id']}}">
            <div class="form-group">
                <label>Book Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{$book['title']}}"
                    placeholder="Enter book title">
            </div>

            <div class="form-group">
                <label>Summary</label>
                <textarea
                    name="summary"
                    value="{{$book['summary']}}"
                    placeholder="Enter book summary">{{$book['summary']}}</textarea>
            </div>

            <div class="form-group">
                <label>Author</label>
                <input
                    type="text"
                    name="author"
                    value="{{$book['author']}}">
            </div>

            <div class="form-group">
                <label>Upload Book Cover</label>
                <input type="file" name="file">

                <div class="current-file">
                    Current File: {{$book['file']}}
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="Not yet available on Amazon">Not yet available on Amazon</option>
                    <option selected value="Available on Amazon">Available on Amazon</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit">Update Book</button>
                <a href="#" class="cancel">Cancel</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>