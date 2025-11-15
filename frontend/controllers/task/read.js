$(document).ready(function () {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        async: true,
        url: '../../backend/model/task/read.php',
        success: function (dados) {
            $('tbody').empty();
            for (var i = 0; i < dados.length; i++) {
                let nameStatus;
                let color;

                switch (dados[i].STATUS) {
                    case 1:
                        nameStatus = 'Pendente';
                        color = 'badge-primary';
                        break;
                    case 2:
                        nameStatus = 'Em andamento';
                        color = 'badge-warning';
                        break;
                    case 3:
                        nameStatus = 'Finalizada';
                        color = 'badge-success';
                        break;
                    case 4:
                        nameStatus = 'Cancelada';
                        color = 'badge-danger';
                        break;
                }
                $('tbody').append(`
                    <tr>
                        <td class="text-center">${dados[i].ID}</td>
                        <td class="text-center">${dados[i].DATE_TIME}</td>
                        <td class="text-left">${dados[i].TITLE}</td>
                        <td class="text-center">
                            <h5><span class="badge ${color}">${nameStatus}</span></h5>
                        </td>
                        <td class="text-center">
                            <button id="${dados[i].ID}" class="btn btn-info btn-view">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button id="${dados[i].ID}" class="btn btn-primary btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button id="${dados[i].ID}" data-status="${dados[i].STATUS}" class="btn btn-warning btn-status">
                                <i class="fa-solid fa-circle-check"></i>
                            </button>
                            <button id="${dados[i].ID}" class="btn btn-danger btn-delete">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            }
            $('body').append(`<script src="../controllers/task/view.js"></script>`);
            $('body').append(`<script src="../controllers/task/update.js"></script>`);
            $('body').append(`<script src="../controllers/task/delete.js"></script>`);
            $('body').append(`<script src="../controllers/task/status.js"></script>`);
        }
    });
});