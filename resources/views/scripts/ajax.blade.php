@if (!defined('ajax.blade.js'))
    @php
        define('ajax.blade.js', 3);
    @endphp
<script>
    document.addEventListener("DOMContentLoaded", () => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@endif
