<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">CPGS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        @if (!session('user'))
        <li class="nav-item">
          <a class="nav-link" href="/signup">SignUP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Log In</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Log Out</a>
        </li>
        {{-- <li class="nav-item"> --}}
            {{-- </li> --}}
        </ul>
    </div>
    <a class="btn btn-danger float-right" href="/me"><i class="bi bi-laptop"></i> Me</a>
{{-- <span class="float-right btn btn-primary" >{{session('user')[0]->admin_name}}</span> --}}
@endif
  </nav>
