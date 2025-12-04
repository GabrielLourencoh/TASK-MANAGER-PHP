$(document).ready(function() {
    $('.btn-logout').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            url: '../../backend/model/user/logout.php',
            success: function(dados) {
                if (dados.type == 'success') {
                    Swal.fire({
                        icon: dados.type,
                        title: "TaskManager",
                        text: dados.message
                    });
                }
                window.location.href = '../../index.html';
            }
        });
    });
});