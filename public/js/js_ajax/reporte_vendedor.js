$(document).ready(function () {
    console.log("ready!");
    $('#data-table-fixed-header').DataTable({
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        processing: true,
        serverSide: true,
        select: true,
        rowId: 'id',
        columns: []
    });
});