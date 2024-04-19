<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: rgb(38, 59, 78);">   
  <a href="/api/my-form" class="btn btn-outline-primary" style="float:right; margin-right:1cm;">Lets Register Another Student</a>
<!-- Display the message if it exists -->
@if (session('message'))
            <div class="p-text-green-500">
                {{ session('message') }}
            </div>
        @endif
<table class="table table-striped table-dark" style="width:50%; margin-top:1cm; margin-left:8cm; border-radius:1cm;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Names<span class="badge badge-light" style="color:green;">  {{ $studentCount }} students</span></th>
      <th scope="col">Emails</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
        @foreach ($usernames as $index => $username)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $username }}</td>
                <td>{{ $username }}@example.com</td>
                <td style="width:28z%;">
                <a class="btn btn-info" href="{{ route('update-student', ['id' => $index + 1]) }}">Update</a>

                <button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
   </body>
</html>