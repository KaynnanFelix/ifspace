@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Espaço</div>
                <div class="card-body">
                    <form method="POST" action="{{route('spaces.update',$space['id'])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group text-left">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" value="{{$space->name}}" id="name" name="name" placeholder="Ex.: Alan Turing">
                        </div>
                        <div class="form-group text-left">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" value="{{$space->number}}" id="number" name="number" placeholder="Ex.: 1">
                        </div>
                        <div class="form-group text-left">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ex.: Laboratório de informática com 20 computadores, contendo as ferramentas necessárias para desenvolvimento web como XAMPP, VS Code, Laravel, etc., além de ter projetor.">{{$space->description}}</textarea>
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary my-2">Salvar</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection