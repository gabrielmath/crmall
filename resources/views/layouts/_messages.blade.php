@if(Session::has('message-error'))
    {!! Alert::danger(Session::get('message-error'))->close() !!}
@endif

@if(Session::has('message-success'))
    {!! Alert::success(Session::get('message-success'))->close() !!}
@endif
