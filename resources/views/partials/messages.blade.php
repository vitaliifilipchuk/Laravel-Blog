@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{ session()->get('success') }}
    </div>
@endif
