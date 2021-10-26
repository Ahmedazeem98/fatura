@if(session('success'))
    <div style="margin: 0 auto" class="alert alert-success w-50 text-center mb-3" role="alert">
        {{session('success')}}
    </div>
@endif
