@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0 list-unstyled">
            @foreach ($errors->all() as $error)
                <li class="text-sm">✗ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif