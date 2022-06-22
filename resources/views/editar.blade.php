@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar postagem</div>
                <div id="upload">

                <div class="card-body">
                    <b>|| Adicione aqui o cadastro da postagem, campos na base de dados, tabela POSTAGEM ||</b>
                    <br>
                    <b>|| Usar AJAX no submit e uma barra de progresso (envio em % ou bytes, qualquer comunicação de andamento) ||</b>

                    <form name="formPost" class="formPost" name="formPost">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" value="{{$postagem->id}}">

                            <label>Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$postagem->titulo}}">
                            <br>
                            <div id="alertaTeste" name="alertaTeste" class="alert alert-danger d-none messageBox" role="alert"></div>
                            <br>
                            <label>Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{$postagem->descricao}}">
                            <br>
                            <div id="return"></div>                            
                            <label>Imagem</label>
                            <input type="file" class="form-control" id="imagem" name="imagem" >
                            
                            <br />
                            <progress value="0" max="100" class="form-control"></progress><span class="justify-content-center" id="porcentagem">Carregamento : 0%</span>
                            <br />
                           
                            <br>
                                                 
                            <label>Ativa</label>
                            <select name="ativa" >
                            @if($postagem->ativa == 'S'){
                                <option value="S" selected>Sim</option>
                                <option value="N" >Não</option>

                            }
                            @else{
                                <option value="N" selected>Não</option>
                                <option value="S" >Sim</option>
                        }
                            @endif
                            </select>
                        </div>
                        <button type="submit">Salvar</button>                      
                        </div>
                    </form>
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
                    <script>
                        $(function(){
                            $('form[name="formPost"]').submit(function(event){
                                event.preventDefault();
                                
                                var pct = 0;

                                //data = new XMLHttpRequest();

                                /*var formData = JSON.stringify({
                                    titulo: $('#titulo').val(),
                                    descricao: $('#descricao').val(),
                                    imagem: $('#imagem').val(),
                                    ativa: $('#ativa').val(),
                                    });//new FormData();*/

                                //formData = $(this).serialize(),

                                //console.log('Evento :' formData);

                    
                                $.ajax({ 

                                    url: '{{route('upload')}}',
                                    method: 'POST',
                                    data:
                                    {
                                        titulo: $('#titulo').val(),
                                        descricao: $('#descricao').val(),
                                        imagem: $('#imagem').val(),
                                        ativa: $('#ativa').val(),
                                    },
                                    headers: 
                                    {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                                    dataType: 'json',
                                    uploadProgress: function(event, position, total, pct) {
                                    $('progress').attr('value',pct);
                                    $('#porcentagem').html(pct);
                                },
                                    
                                success: function(response){
                                        $('progress').attr('value','100');
                                        $('#porcentagem').html(pct +'%');
                                        console.log('formData :', formData) 
                                        if(response.success === true){
                                        console.log('Retorno:',response.message);
                                            alert('Retorno:', response.message);
                                        }else{
                                            alert('Erro :' + response.message );
                                        }                                        
                                    } 
                                }) })                           
                        })
                    </script>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
