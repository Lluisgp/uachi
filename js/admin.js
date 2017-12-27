$(document).ready(function() { 
     var table = $('#resultats').DataTable( {
        "language": {
            "lengthMenu": "Mostrant _MENU_ resultats per pàgina",
            "zeroRecords": "Res per mostrar - ho sentim",
            "info": "Mostrant pàgina _PAGE_ de _PAGES_",
            "infoEmpty": "No n'hi ha resultats disponibles",
            "infoFiltered": "(filtrat de _MAX_ registres)",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
              "paginate": {
                "first":      "Primer",
                "last":       "Últim",
                "next":       "Següent",
                "previous":   "Anterior"
                },
        }
    } );    
    var table = $('#resultats').DataTable(); 
    $('#resultats')
        .on('click', 'tr', function () {                         
        var data = table.row( this ).data();
        //alert( data[2]  );
        $("input[name='media_id']").val(data[0]);
        $("input[name='media_title']").val(data[1]);
        $("textarea[name='media_description']").val(data[2]);
        $("input[name='media_tags']").val(data[3]);
}).DataTable();               
} );