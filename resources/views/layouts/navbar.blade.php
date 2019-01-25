<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel Class Management') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        @endguest
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/listClassrooms">Data Classrooms</a>
              <a class="dropdown-item" href="/listTeachers">Data Teachers</a>
              <a class="dropdown-item" href="/listStudents">Data Students</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/logout">Logout</a>
            </div>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>