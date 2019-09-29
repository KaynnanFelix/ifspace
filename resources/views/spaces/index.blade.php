@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-columns">
@foreach ($spaces as $space)

<div class="card" >
<img src="/storage/{{$space->photo}}" class="card-img-top" alt="Sem imagem temporariamente.">
        <div class="card-body">
          <h5 class="card-title">{{$space->number}} - {{$space->name}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$space->type}}</h6>
          <p class="card-text">{{$space->description}}</p>
          <a href="#" class="btn btn-primary">Visualizar</a>
          @auth('admin')
          <a href="{{route('spaces.edit', $space['id'])}}" class="btn btn-primary">Editar</a>
        <form method="POST" action="spaces/{{$space->id}}">
              @csrf
              <input type="hidden" name="_method" value="delete">
              <button type="submit" class="btn btn-sm btn-outline-danger">Deletar</button>
          </form>
          
          @endauth
          <p class="card-text"><small class="text-muted">Update: {{$space->created_at}}</small></p>
        </div>
      </div>
@endforeach
</div>
</div>
@endsection