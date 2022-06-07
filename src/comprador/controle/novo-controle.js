$(document).ready(function() {

    $('.btn-novocomprador').click(function(e) {
        e.preventDefault()

        // limpar todas informações existentes no modal
        $('.modal-title').empty()
        $('.modal-body').empty()

        // incluir novos textos no cabeçalho da janela modal
        $('.modal-title').append('Adicionar novo registro')

        // incluir o formulário dentro do corpo da janela modal
        $('.modal-body').load('src/tipo/controle/form-controle.html')

        // incluir uma função no botão salvar para demonstrar que é um novo registro
        $('.btn-salvarcomprador').attr('data-operation', 'insert')

        // abrir janela modal
        $('#modal-comprador').modal('show')
    })

})