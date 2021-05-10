<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <title>Profile</title>
    <style>
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <x-navbar />
    @if (!session('user'))
    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
        <strong>Sorry !</strong> You should have login first
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @else
    <div class="container">
        <div class="card">
            <h5 class="card-header text-center">Profile</h5>
            <div class="card-body">
              <h5 class="card-title">Name: {{session('user')[0]->name}}</h5>
              <p class="card-text">Email: {{session('user')[0]->email}}</p>
              <p class="card-text">Phone: {{session('user')[0]->phone}}</p>
              <a href="/dashboard" class="btn btn-outline-primary">Go To Dashboard</a>
            </div>
          </div>

      </div>
    @endif
      <x-footer />
  <x-scripts / >
</body>

</html>
