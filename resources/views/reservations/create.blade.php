@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Reserva</div>
                <div class="card-body">
                    <form method="POST" action="{{route('reservations.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-left">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome dos responsável">
                        </div>
                        <div class="form-group">
                                <label for="space">Espaço</label>
                                <select class="form-control" id="space" name="space">
                                    @foreach ($spaces as $space)
                                <option value="Nome:{{$space->name}} Número:{{$space->number}} Localização:{{$space->localization}}">{{$space->name.'-'.$space->number}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="size">Período</label>
                            <select class="form-control" id="period" name="period">
                            <option value="{{Carbon\Carbon::now()->toDateString()}}-Matutino">Matutino</option>
                                <option value="{{Carbon\Carbon::now()->toDateString()}}-Vespertino">Vespertino</option>
                                <option value="{{Carbon\Carbon::now()->toDateString()}}-Noturno">Noturno</option>
                            </select>
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary my-2">Criar</button>
                            <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection