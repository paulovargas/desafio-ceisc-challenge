<script>
                        $(function(){
                            $('form[name="formPost"]').submit(function(event){
                                event.preventDefault();
                               
                                
                    
                                $.ajax({ 
                                    //url: '{{route('upload')}}',
                                    //type: 'post',
                                    //data: $(this).serialize(),
                                    //dataType: 'json',
                                    uploadProgress: function(event) {
                                        var carregamento = new XMLHttpRequest();
                                        carregamento.onreadystatechange = function(){
                                            if(carregamento.readyState == 4){
                                            } else {}
                                        }
                                        carregamento.upload.addEventListener(function(evt){
                                            console.log('Carregamento :', evt.loaded)
                                        },false);
                                        carregamento.open('POST', '{{route('upload')}}');
                                        carregamento.send($(this).serialize());    
                                    $('progress').attr('value',event.loaded);
                                    $('#porcentagem').html(event);
                                },
                                    success: function(response){
                                        $('progress').attr('value','100');
                                        //$('#porcentagem').html('percentComplete'); 
                                        if(response.success === true){
                                            alert('Sucesso!');
                                            console.log('Carregamento :', event.loaded)
                                            //$('div[name="alertaTeste"]').removeClass('d-none').html(response.message);
                                        }else{
                                            alert('Erro :' + response.message );
                                        }
                                        
                                    } 
                                }) })
                                   
                                
                    
                    
                    
                            
                            
                        })
                    </script>

<script>
    $(function(){
        $('form[name="formPost"]').submit(function(event){
            event.preventDefault();

            loading = new XMLHttpRequest();

            $.ajax({ 
                url: '{{route('atualizar_post')}}',
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(this.percentComplete+'%');
                console.log('percentComplete:', this.percentComplete);
            },
                success: function(response){
                    $('progress').attr('value','100');
                    $('#porcentagem').html(percentComplete+'%'); 
                    if(response.success === true){
                        alert('Dados atualizados com sucesso!');
                        //$('div[name="alertaTeste"]').removeClass('d-none').html(response.message);
                    }else{
                        alert('Erro :' + response.message );
                    }
                    
                } 
            }) })
               
            



        
        
    })
</script>

<script>
    $(document).ready(function(){
    $('#btnEnviar').click(function(){
        $('#formUpload').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(percentComplete+'%');
            },        
            success: function(data) {
                $('progress').attr('value','100');
                $('#porcentagem').html('100%');                
                if(data.sucesso == true){
                    $('#resposta').html('<img src="'+ data.msg +'" />');
                }
                else{
                    $('#resposta').html(data.msg);
                }                
            },
            error : function(){
                $('#resposta').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: 'enviar_arquivo.php',
            resetForm: true
        }).submit();
    })
})


$postagem['success'] = false;
        $postagem['message'] = "Entrou na função!";
        //echo json_encode($postagem);
        return 'Deu certo : ' + $postagem;


$(function(){
        $('form[name="formPost"]').submit(function(event){
            event.preventDefault();

            $.ajax({
                
                url: "{{ route('atualizar_post', ['id' => $postagem->id]) }}",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                sucess: function(response){
                    alert('response',response);
                }
                alert('response',response);

            })



        })
        
    })
</script>

/* Importa o arquivo onde a função de upload está implementada */
//require_once('funcao_upload.php');
 
/* Captura o arquivo selecionado 
$arquivo = $_FILES['arquivo'];
 
/*Define os tipos de arquivos válidos (No nosso caso, só imagens)
$tipos = array('jpg', 'png', 'gif', 'psd', 'bmp');
 
/* Chama a função para enviar o arquivo 
$enviar = uploadFile($arquivo, 'uploads/', $tipos);
 
$data['sucesso'] = false;
 
if($enviar['erro']){    
    $data['msg'] = $enviar['erro'];
}
else{
    $data['sucesso'] = true;
 
    /* Caminho do arquivo 
    $data['msg'] = $enviar['caminho'];
}
 
/* Codifica a variável array $data para o formato JSON 
echo json_encode($data);*/
        
        //$update['success'] = false;
        //$update['message'] = "Teste";
        //console.log('Update', $update );
        //echo json_encode($update);
        //$postagem = Postagem::findOrFail($id);
        //echo json_encode($postagem);
        //$postagem->update([
          //  'titulo' =>$request->titulo,
            //'descricao' =>$request->descricao,
            //'imagem' =>$request->imagem,
            //'ativa' =>$request->ativa,
        //]);
        //$postagem = Postagem::findOrFail($id);