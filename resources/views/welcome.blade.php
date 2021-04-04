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
        <h1 class="display-4">Welcome TO CPGS</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit expedita voluptatibus harum debitis ab exercitationem maiores dolorem adipisci officiis nisi tempore, iusto vero quam officia vel excepturi eos ullam amet!</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
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

  <x-scripts / >
</body>

</html>
