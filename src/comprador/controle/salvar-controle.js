$(document).ready(function() {

    $('.btn-salvarcomprador').click(function(e) {
        e.preventDefault()

        let dados = $('#form-comprador').serialize()

        dados += `&operacao=${$('.btn-salvarcomprador').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            assync: true,
            data: dados,
            url: 'src/comprador/modelo/salvar-comprador.php',
            success: function(dados) {
                Swal.fire({
                    title: 'SysRifa',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-comprador').modal('hide')
            }
        })
    })

})