@if (session('success'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif

@if (session('fail'))
        <div class="alert  alert-danger alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
@if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li class="list-group-item">
                {{ $error }}
            </li>
            @endforeach
        </div>
@endif
@php session()->pull('success') @endphp
@php session()->pull('fail') @endphp
<script>
$('#success-alert').delay(3000).slideUp(500);
$('#fail-alert').delay(5000).slideUp(500);
</script>