@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-columns">
@foreach ($reservations as $r)

<div class="card" >
        <div class="card-body">
          <h5 class="card-title">{{$r->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$r->space}}</h6>
          <p class="card-text">{{$r->period}}</p>
          <p class="card-text"><small class="text-muted">Update: {{$r->created_at}}</small></p>
        </div>
      </div>
@endforeach
</div>
</div>
@endsection