$(document).ready(function() {

    $('.btn-novo').click(function(e){
        e.preventDefault()

        //Limpar todas as informações já existentes em nossa modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        //Incluir novos textos no cabeçalho da minha janela modal
        $('.modal-title').append('Adicionar novo vendedor')

        //Incluir nosso formulário dentro do corpo da nossa janela modal
        $('.modal-body').load('src/vendedor/visao/form-vendedor.html', function(){
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                assync: true,
                url: 'src/tipo/modelo/all-tipo.php',
                success: function(dados){
                    for(const dado of dados){
                        $('#TIPO_ID').append(`<option value="${dado.ID}">${dado.NOME}</option>`)
                    }
                }
            })
        })

        //Iremos incluir uma função no botão salvar para demonstrar um novo registro
        $('.btn-salvar').attr('data-operation', 'insert')

        //Abrir a janela modal
        $('#modal-vendedor').modal('show')
    })

})