@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Espaço</div>
                <div class="card-body">
                    <form method="POST" action="{{route('spaces.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-left">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ex.: Alan Turing">
                        </div>
                        <div class="form-group text-left">
                            <label for="number">Número</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="Ex.: 1">
                        </div>
                        <div class="form-group text-left">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ex.: Laboratório de informática com 20 computadores, contendo as ferramentas necessárias para desenvolvimento web como XAMPP, VS Code, Laravel, etc., além de ter projetor."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="localization">Localização</label>
                            <select class="form-control" id="localization" name="localization">
                                <option value="Bloco A">Bloco A</option>
                                <option value="Bloco B">Bloco B</option>
                                <option value="Bloco C">Bloco C</option>
                                <option value="Bloco D">Bloco D</option>
                                <option value="Bloco E">Bloco E</option>
                                <option value="Bloco F">Bloco F</option>
                                <option value="Bloco G">Bloco G</option>
                                <option value="Bloco H">Bloco H</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select class="form-control" id="type" name="type">
                                <option value="Sala de Aula">Sala de Aula</option>
                                <option value="Laboratório de Física">Laboratório de Física</option>
                                <option value="Laboratório de Química">Laboratório de Química</option>
                                <option value="Laboratório de Biologia">Laboratório de Biologia</option>
                                <option value="Laboratório de Informática">Laboratório de Informática</option>
                                <option value="Laboratório de Artes">Laboratório de Artes</option>
                                <option value="Teatro">Teatro</option>
                                <option value="Auditório">Auditório</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="size">Tamanho</label>
                            <select class="form-control" id="size" name="size">
                                <option value="Pequeno">Pequeno</option>
                                <option value="Médio">Médio</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Escolha uma foto do espaço</label>
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