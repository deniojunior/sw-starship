function isNumber(value) {
    return /^\d+$/.test(value)
}

$(document).ready(function() {
    $('#calculate-form').submit(function(event) {

        var distance = $('input[name=distance]').val();

        if(distance == "" || !isNumber(distance)) {
            swal({
                title: 'Informe a distância em MGLT!',
                text: 'Lembre-se, você deve informar apenas números',
                type: 'error',
                confirmButtonText: 'Ok',
                allowOutsideClick: false,
            });
        }else {

            swal({
                title: 'Calculando...',
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading()
                }
            });

            var data = new FormData();
            data.append('distance', distance);

            $.ajax({
                url: '/calculate',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                enctype: 'application/json',
                success: function (data) {
                    swal({
                        title: 'O cálculo terminou!',
                        type: 'success',
                        confirmButtonText: 'Ver resultado',
                        allowOutsideClick: false,
                    }).then(() => {
                        /*$('#upload-container').hide();
                        $('#video-container video').attr('src', fileUrl);
                        $('#video-container').show();*/
                    });
                },
                error: function (XMLHttpRequest) {
                    swal({
                        title: 'Aconteceu um erro inesperado!',
                        type: 'error',
                        confirmButtonText: 'Tentar novamente',
                        allowOutsideClick: false,
                        onOpen: () => {
                            swal.hideLoading()
                        },
                        onClose: () => {
                            document.getElementById("convert-file-form").reset();
                        }
                    });
                }

            });
        }

        event.preventDefault();
    });
});