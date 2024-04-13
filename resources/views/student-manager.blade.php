<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>   
    <h1 style="color:blue; margin-left:7cm; margin-top:3cm; margin-bottom:2cm;">Student Registration</h1>
   <div class="container-md">
     <!-- Display the message if it exists -->
     @if (session('message'))
            <div class="p-text-green-500">
                {{ session('message') }}
            </div>
        @endif
   <form action="/api/create-student" method="post">
    @csrf
    <div class="mb-3" style="width:50%;">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3" style="width:50%;">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email">
        <div id="emailHelp" class="form-text">eg:mugisha@gmail.com</div>
    </div>
    <div class="mb-3" style="width:50%;">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="http://127.0.0.1:8000/api/list-student" type="button" class="btn btn-primary">
  See student list
</a>
    </form>
   </div>
   <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                
   </body>
</html>