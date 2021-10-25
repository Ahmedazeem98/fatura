@if(!empty($errors->all()))
    <div style="margin: 0 auto" class="alert alert-danger w-50 text-center mb-3" role="alert">
        @foreach($errors->all() as $error)
          {{$error}} <br>
        @endforeach
    </div>
@endif
