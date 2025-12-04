$(document).ready(function() {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        async: true,
        url: '../../backend/model/user/validate.php',
        success: function (dados) {
            if(dados.type == 'success') {
                Swal.fire({
                    icon: dados.type,
                    title: "TaskManager",
                    text: dados.message
                });
            } else {
                window.location.href = "../../index.html";
            }
        }
    });
});