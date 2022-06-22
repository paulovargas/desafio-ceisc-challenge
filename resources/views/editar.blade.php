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
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$postagem->id}}">

                            <label>Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$postagem->titulo}}">
                            <br>
                            <label>Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{$postagem->descricao}}">
                            <br>
                            <br />
                            <progress value="0" max="100" class="form-control"></progress>
                            <span>Carregamento : </span><span id="porcentagem">0%</span>
                            <br />
                           
                            <br>
                                                 
                            <label>Ativa</label>
                            <select id="postativa" name="postativa" >
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

                            var barra = false

                            $('form[name="formPost"]').submit(function(event){
                                event.preventDefault();

                                console.log('barra ',barra)

                                if(barra){
                                    
                                    alert("Dados dabarr com sucesso !")
                                    window.location.replace('{{route('home')}}')
                                

                                }

                                                               
                                $.ajax({ 

                                    url: '{{route('editar')}}',
                                    method: 'POST',
                                    data:
                                    {
                                        id: $('#id').val(),
                                        titulo: $('#titulo').val(),
                                        descricao: $('#descricao').val(),
                                        postativa: $('#postativa').val(),
                                    },
                                    headers: 
                                    {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    },
                                    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                                    dataType: 'json',
                                   
                                    uploadProgress: function( event, percentComplete, barra) {
                                        $('progress').attr('value', percentComplete);
                                        $('#porcentagem').html( percentComplete + '%');

                                    },
                                    success: function(response){                                       
                                        if(response.success === true){
                                            $('progress').attr('value','100');
                                            $('#porcentagem').html('100%');                                            
                                        }else{
                                            alert('Erro :' + response.message );
                                        }                                        
                                    } 
                                
                                },
                                $(function(event){
                                    alert("Dados salvos com sucesso !");
                                    window.location.replace('{{route('home')}}');
                                })
                            )
                        }
                    )
                }
            )          
                    </script>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
