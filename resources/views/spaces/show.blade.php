@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm"></div>
<div class="col-sm">
<div class="card" style="width: 100%;">
        <img src="/storage/{{$space->photo}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$space->number}} - {{$space->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$space->type}}</h6>
          <p class="card-text">{{$space->description}}</p>
          <p>Tamanho: {{$space->size}}</p>
          <p>Tipo: {{$space->type}}</p>
          @auth('admin')
          <a href="{{route('spaces.edit', $space['id'])}}" class="btn btn-primary">Editar</a>
        <form method="POST" action="spaces/{{$space->id}}">
              @csrf
              <input type="hidden" name="_method" value="delete">
              <button type="submit" class="btn btn-sm btn-outline-danger">Deletar</button>
          </form>
          @endauth
          <p class="card-text"><small class="text-muted">Update: {{$space->updated_at}}</small></p>
          <p class="card-text"><small class="text-muted">Criação: {{$space->created_at}}</small></p>
        </div>
      </div>
    </div>
      <div class="col-sm"></div>
    </div>
</div>
@endsection