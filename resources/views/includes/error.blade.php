@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger col-md-6 offset-md-3 m-t-10" id ='msg'>
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
    @endforeach
@endif
@if(Session::has('msg'))
    @if(strpos(Session::get('msg'), 'Error'))
        <div class="alert alert-danger col-md-6 offset-md-3 m-t-10" id ='msg'>
            {{Session::get('msg')}}
        </div>
    @else
        <div class="alert-success col-md-6 offset-md-3 m-t-10"id ='msg'>
            {{Session::get('msg')}}
        </div>
    @endif
@endif