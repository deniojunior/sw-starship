const swal = require('sweetalert2');

function isNumber(value) {
    return /^\d+$/.test(value)
}

function validateInput(input) {

    if(input == "" || !isNumber(input)) {
        swal({
            title: 'Informe a distância em MGLT!',
            text: 'Lembre-se, você deve informar apenas números',
            type: 'error',
            confirmButtonText: 'Ok',
            allowOutsideClick: false,
        });

        return false;
    }

    return true;
}

function renderResult(response) {

    if(response.error) {

        swal({
            title: 'Aconteceu um erro inesperado!',
            type: 'error',
            confirmButtonText: 'Tentar novamente',
            allowOutsideClick: false,
            onOpen: () => {
                swal.hideLoading()
            },
        });

        return false;
    }

    var result = "";
    for (var i = 0; i < response.data.length; i++) {
        if (response.data[i].resupplyStops) {
            result += response.data[i].name + ": " + response.data[i].resupplyStops + "<br/>";
        }
    }

    result += "<br/><i style='font-size: 11px'>*As demais naves não possuem as informações necessárias para o cálculo</i>";

    swal({
        type: 'success',
        html: result,
        confirmButtonText: 'Fechar',
        allowOutsideClick: false
    });
}

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#calculate-form').submit(function(event) {

        var distance = $('input[name=distance]').val();

        if(validateInput(distance)) {

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
                url: '/api/calculate',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                enctype: 'application/json',
                success: function (response) {
                    renderResult(response);
                },
                error: function (XMLHttpRequest) {
                    swal({
                        title: 'Aconteceu um erro inesperado!',
                        type: 'error',
                        text: 'Error: ' + JSON.stringify(XMLHttpRequest),
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