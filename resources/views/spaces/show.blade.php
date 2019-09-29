@extends('layouts.app')

@section('content')
@foreach ($spaces as $space)

<div class="card" style="width: 100%;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$space->number}} - {{$space->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$space->type}}</h6>
          <p class="card-text">{{$space->description}}</p>
          <a href="#" class="btn btn-primary">Visualizar</a>
          @auth('admin')
          <a href="#" class="btn btn-primary">Editar</a>
          <a href="#" class="btn btn-danger">Deletar</a>
          @endauth
          <p class="card-text"><small class="text-muted">Update: {{$space->updated_at}}</small></p>
          <p class="card-text"><small class="text-muted">Criação: {{$space->created_at}}</small></p>
        </div>
      </div>
    
@endforeach

@endsection