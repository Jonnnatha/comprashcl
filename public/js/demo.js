
(function($) {
    'use strict'

    $(function() {
        $('[data-toggle="sweet-alert"]').on('click', function(){
            var type = $(this).data('sweet-alert');

            switch (type) {
                case 'basic':
                    swal({
                        title: "Here's a message!",
                        text: 'A few words about this sweet alert ...',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-primary'
                    })
                break;

                case 'info':
                    swal({
                        title: 'Info',
                        text: 'A few words about this sweet alert ...',
                        type: 'info',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-info'
                    })
                break;

                case 'info':
                    swal({
                        title: 'Info',
                        text: 'A few words about this sweet alert ...',
                        type: 'info',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-info'
                    })
                break;

                case 'success':
                    swal({
                        title: 'Success',
                        text: 'A few words about this sweet alert ...',
                        type: 'success',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-success'
                    })
                break;

                case 'warning':
                    swal({
                        title: 'Warning',
                        text: 'A few words about this sweet alert ...',
                        type: 'warning',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-warning'
                    })
                break;

                case 'question':
                    swal({
                        title: 'Are you sure?',
                        text: 'A few words about this sweet alert ...',
                        type: 'question',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-default'
                    })
                break;

                case 'confirm':
                    swal({
                      title: "Você tem certeza?",
              text: "Caso apague voce nao ira consegui recuperar esse arquivo!",
              type: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-danger',
                        confirmButtonText: "Sim, quero deletar!",
          cancelButtonText: "Nao, Cancelar!",
                        cancelButtonClass: 'btn btn-secondary'
                    },
                    function(isConfirm) {
                      if (isConfirm) {
                        $.ajax({
                           url: 'dele?id='+id,
                           type: 'DELETE',
                           error: function() {
                              alert('Something is wrong');
                           },
                           success: function(data) {
                                $("#"+id).remove();
                                swal("Deletado!", "Arquivo deletado com sucesso", "success");
                           }
                        });
                      } else {
                        swal("Cancelado", "Seu arquivo esta salvo:)", "error");
                      }
                    }

                  )
                break;

                case 'image':
                    swal({
                        title: 'Sweet',
                        text: "Modal with a custom image ...",
                        imageUrl: '../../assets/img/ill/ill-1.svg',
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-primary',
                        confirmButtonText: 'Super!'
                });
                break;

                case 'timer':
                    swal({
                        title: 'Auto close alert!',
                        text: 'I will close in 2 seconds.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                break;
            }
        });

    });
}(jQuery))
