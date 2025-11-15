$(document).ready(function() {
    $('.btn-status').click(function(e) {
        e.preventDefault();

        var status = $(this).attr('data-status');

        if (status < 3) {
            status++;

            var dados = 'ID=' + $(this).attr('id') + '&STATUS=' + status;

            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                async: true,
                data: dados,
                url: '../../backend/model/task/status.php',
                success: function(dados) {
                    Swal.fire({
                        icon: dados.type,
                        title: "SysTask",
                        text: dados.message
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "TaskManager",
                text: "Essa tarefa já foi finalizada ou cancelada!"
            });
        }
    });
});