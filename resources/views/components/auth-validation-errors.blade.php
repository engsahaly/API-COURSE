@props(['errors'])

@if ($errors->any())
    <div class="auth_errors_div">
        <ul class="p-1 text-sm text-red-600 alert alert-danger" style="list-style-type: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
