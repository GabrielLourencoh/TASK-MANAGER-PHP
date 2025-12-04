$(document).ready(function(){
    $('.btn-login').click(function(e){
        e.preventDefault();
        
        var dados = $('#form-login').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            async: true,
            data: dados,
            url: 'backend/model/user/login.php',
            success: function (dados) {
                if (dados.type == 'error') {
                    Swal.fire({
                        icon: dados.type,
                        title: "SysTask",
                        text: dados.message
                    });
                } else {
                    window.location.href = 'frontend/pages/dashboard.html'
                }
            }
        });
    });
});