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
                    if(data != "error") {

                        data = JSON.parse(data);

                        var result = "";
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].resupplyStops) {
                                result += data[i].name + ": " + data[i].resupplyStops + "<br/>";
                            }
                        }

                        result += "<br/><i style='font-size: 11px'>*As demais naves não possuem as informações necessárias para o cálculo</i>";

                        swal({
                            type: 'success',
                            html: result,
                            confirmButtonText: 'Fechar',
                            allowOutsideClick: false
                        })
                    }else{
                        swal({
                            title: 'Aconteceu um erro inesperado!',
                            type: 'error',
                            confirmButtonText: 'Tentar novamente',
                            allowOutsideClick: false,
                            onOpen: () => {
                                swal.hideLoading()
                            },
                        });
                    }
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
                    });
                }

            });
        }

        event.preventDefault();
    });
});