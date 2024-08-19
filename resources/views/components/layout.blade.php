<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.4/axios.min.js" integrity="sha512-6VJrgykcg/InSIutW2biLwA1Wyq+7bZmMivHw19fI+ycW0jIjsadm8wKQQLlfv3YUS4owfMDlZU38NtaAK6fSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Student Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Route::is('students') ? 'active' : '' }}">
        <a class="nav-link" href="/">Students</a>
      </li>
      
      <li class="nav-item {{ Route::is('courses') ? 'active' : '' }}">
        <a class="nav-link" href="/courses">Courses</a>
      </li>
  </div>
</nav>
    </header>
    {{ $slot }}
    <footer></footer>
</body>
</html>