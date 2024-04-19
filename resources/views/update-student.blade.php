<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style=" background-color: rgb(38, 59, 78);"> 
<div class="container-sm" style=" margin-top:3cm; margin-left:12cm;">
<h3 style="margin-left:4cm; margin-top:5cm; color:blue; margin-bottom:2cm;">Update Student</h3>


<form action="{{ route('update-student', ['id' => $student->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3" style="width: 40%;">
            <input type="text" class="form-control" id="floatingInput" name="name" value="{{ $student->name }}">
            <label for="floatingInput">Names</label>
        </div>
        <div class="form-floating" style="width: 40%;">
            <input type="email" class="form-control" id="floatingPassword" name="email" value="{{ $student->email }}">
            <label for="floatingPassword">Email</label>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 1cm; margin-left: 6cm;">Update</button>
    </form>
</div>
</body>
</html>