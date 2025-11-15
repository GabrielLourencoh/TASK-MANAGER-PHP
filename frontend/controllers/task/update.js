$(document).ready(function() {
    $('.btn-edit').click(function(e) {
        e.preventDefault();
        var dados = 'ID=' + $(this).attr('id');
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: '../../backend/model/task/view.php',
            success: function(dados) {
                $('#DATE_TIME').val(dados[0].DATE_TIME).attr('disabled', false);
                $('#TITLE').val(dados[0].TITLE).attr('disabled', false);
                $('#DESCRIPTION').val(dados[0].DESCRIPTION).attr('disabled', false);
                $('#USER_ID').val(dados[0].USER_ID);
                $('#ID').val(dados[0].ID);
                $('.btn-save').hide();
                $('.btn-update').show();
                $('#modal-task').modal('show');
            }
        });
    });

    $('.btn-update').click(function (e) {
        e.preventDefault();
        var dados = $('#form-task').serialize();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: '../../backend/model/task/update.php',
            success: function (dados) {
                Swal.fire({
                    icon: dados.type,
                    title: "TaskManager",
                    text: dados.message
                });
                $('#modal-task').modal('hide');
                $('#form-task')[0].reset();
                location.reload();
            }
        });
    });
});