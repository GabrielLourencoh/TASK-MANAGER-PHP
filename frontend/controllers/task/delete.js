$(document).ready(function(){
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        var dados = 'ID=' + $(this).attr('id');
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: '../../backend/model/task/delete.php',
            success: function (dados) {
                Swal.fire({
                    icon: dados.type,
                    title: "TaskManager",
                    text: dados.message
                });
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        });
    });
});