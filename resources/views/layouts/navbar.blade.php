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
        <a class="nav-link" href="{{ route('questions.index')}}">Questions</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mapping
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('competencies.map')}}">Competencies to Levels</a>
          <a class="dropdown-item" href="{{ route('competencies.map')}}">Competencies to Questions</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reports
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('competencies.map')}}">All competencies for a level</a>
          <a class="dropdown-item" href="{{ route('competencies.map')}}">All questions for a level</a>
          <a class="dropdown-item" href="{{ route('competencies.map')}}">All questions for a competency</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Full Report</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
