$(document).ready(function () {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        async: true,
        url: '../../backend/model/task/read.php',
        success: function (dados) {
            $('tbody').empty();
            for (var i = 0; i < dados.length; i++) {
                $('tbody').append(`
                    <tr>
                        <td class="text-center">${dados[i].ID}</td>
                        <td class="text-center">${dados[i].DATE_TIME}</td>
                        <td class="text-left">${dados[i].TITLE}</td>
                        <td class="text-center">
                            <h5><span class="badge badge-primary">${dados[i].STATUS}</span></h5>
                        </td>
                        <td class="text-center">
                            <button id="${dados[i].ID}" class="btn btn-info btn-view">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button id="${dados[i].ID}" class="btn btn-primary btn-edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button id="${dados[i].ID}" class="btn btn-warning btn-status">
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
        }
    });
});