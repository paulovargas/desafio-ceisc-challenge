@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova postagem</div>

                <div class="card-body">
                    <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                    <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                    <br>
                    <b>|| Usar AJAX no submit e uma barra de progresso (envio em % ou bytes, qualquer comunicação de andamento) ||</b>

                    <form class="" action="{{url()->current()}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" class="form-control" name="titulo">
                            <br>
                            <label>Descrição</label>
                            <input type="text" class="form-control" name="descricao">
                            <br>
                            <label>Imagem</label>
                            <input type="text" class="form-control" name="imagem">
                            <br>                        
                            <label>Ativa</label>
                            <select name="ativa">
                                <option value="S">Sim</option>
                                <option value="N" selected>Não</option>
                              </select>
                        </div>
                        <button type="submit">Publicar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
