$(document).ready(function(){
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        assync: true, 
        url: '../../backend/model/task/kpi.php',
        success: function (dados) {
            $('#pendentes').empty().append(dados.pendentes);
            $('#andamentos').empty().append(dados.andamentos);
            $('#finalizados').empty().append(dados.finalizados);
            $('#cancelados').empty().append(dados.cancelados);
        }
    })
})