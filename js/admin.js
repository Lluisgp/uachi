$(document).ready(function () {
    //modify
    var table = $('#resultats').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ resultados por página",
            "zeroRecords": "Sin resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay resultados disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Busca:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    var table = $('#resultats').DataTable();
    $('#resultats')
            .on('click', 'tr', function () {
                var data = table.row(this).data();
                //alert( data[2]  );
                $("input[name='media_id']").val(data[0]);
                $("input[name='media_title']").val(data[1]);
                $("textarea[name='media_description']").val(data[2]);
                $("input[name='media_tags']").val(data[3]);
            }).DataTable();

    $(".alert")
            .mouseenter(function () {
                $(".alert").css("display", "none");
            });
});
