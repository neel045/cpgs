<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CPGS</title>
    <style>
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <x-navbar />

    <div class="jumbotron container">
        <h1 class="display-5">Welcome TO CPGS</h1>
        <hr class="my-2">
        <p>Zero Question Typing effort.</p>
        <p>Prefilled Blueprint and Up-To-Date Question Bank.</p>
        <p>Work perfectly on mobile devices as well as pc.</p>
        <p>This is free for Teacher.</p>
        <p>Option to Add,Remove Question In the Question Bank.</p>
        <p>After Generate The Paper The paper is automaticaly send to the Registered Email.</p>
        @if (!session('user'))
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/signup" role="button">Sign UP Now
            </a>
            @else
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="/dashboard" role="button">Go to DashBorad
            </a>

        @endif
        </p>
      </div>
      <x-footer />
  <x-scripts / >
</body>

</html>
