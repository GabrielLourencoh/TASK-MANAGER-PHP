$(document).ready(function() {
    $('.btn-view').click(function(e) {
        e.preventDefault();
        var dados = 'ID=' + $(this).attr('id');
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: '../../backend/model/task/view.php',
            success: function(dados) {
                $('#DATE_TIME').val(dados[0].DATE_TIME).attr('disabled', true);
                $('#TITLE').val(dados[0].TITLE).attr('disabled', true);
                $('#DESCRIPTION').val(dados[0].DESCRIPTION).attr('disabled', true);
                $('#USER_ID').val(dados[0].USER_ID).attr('disabled', true);
                $('#ID').val(dados[0].ID);
                $('.btn-save').hide();
                $('.btn-update').hide();
                $('#modal-task').modal('show');
            }
        });
    });
});