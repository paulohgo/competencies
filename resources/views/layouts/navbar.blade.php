<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Competency Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('factors.index')}}">Factors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('levels.index')}}">Levels</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('competencies.index')}}">Competencies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('competencies.map')}}">Mapping</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Reports</a>
      </li>
    </ul>
  </div>
</nav>
