<div class="col-sm-8">
  <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="<?=$us_url_root?>users/requests_dashboard.php">Panel Coordinador</a></li>
        <li>Maneja</li>
        <li class="active">Consultas Psicologicas</li>
      </ol>
    </div>
  </div>
</div>
</div>
</header>
<?php require_once($abs_us_root.$us_url_root.'users/views/_coordinador_update_status.php');?>
<?php include($abs_us_root.$us_url_root.'users/views/_coordinador_cancel_form.php');?>

<div class="content mt-3 container-fluid">
<h2>Consultas Psicologicas</h2><br>
<div>
    <table class="table table-list-search table-hover requestsTable" style='width:100%;' id="psychologicalTable">
      <thead class="bg-dark fwhite"><tr class="text-center"><th>*</th><th>Nombre</th><th>Usuario</th><th>Fecha Cita</th><th>Contactar via</th><th>Fecha Solicitud</th><th>Estado</th><th>Acciones</th></tr></thead>
        </table>
      </div>
      <br><h3>Reportes</h3><br>
        <div class="reports">
          <table class="table table-list-search table-hover reportsTable" style="width:100%;" id="psychologicalTableReport" >
            <thead class="bg-dark fwhite"><tr class="text-center">
              <th></th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Fecha Cita</th>
              <th>Contactar via</th>
              <th>Fecha Solicitud</th>
              <th>Estado</th>
            </tr></thead>
            <tfoot>
              <tr>
                <th></th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Fecha Cita</th>
                <th>Contactar via</th>
                <th>Fecha Solicitud</th>
                <th>Estado</th>
              </tr>
          </tfoot>
          </table>
        </div>
    </div>

<?php include($abs_us_root.$us_url_root.'users/views/_coordinador_scripts_tables.php');?>

<script>

function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="8" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Telefono:</td>'+
            '<td>'+d.tlf+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Email:</td>'+
            '<td>'+d.email+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Mensaje:</td>'+
            '<td>'+d.message+'</td>'+
        '</tr>'+
    '</table>';
}

function format2 ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="7" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Telefono:</td>'+
            '<td>'+d.tlf+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Email:</td>'+
            '<td>'+d.email+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Mensaje:</td>'+
            '<td>'+d.message+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready( function () {

var table = $('.requestsTable').DataTable({
        "ajax": {
            "url": "server_processing.php?view=psychological",
            dataSrc:""
        },
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<span class="fa fa-plus fa-lg" aria-hidden="true"></span>'
            },
            { "data": "name" },
            { "data": "user_id" },
            { "data": "date" },
            { "data": "contact" },
            { "data": "created_at" },
            { "data": "status" },
            {"render": function (data, type, row) {
            return '<button type="button" class="btn btn-success">Procesado</button><br><button type="button" id="cancel-btn" class="btn btn-danger" data-toggle="modal" data-id='+row.id+' data-target="#cancel-form">Rechazar</button>';
        }},
        ],
          "ordering": false,
          "paging": true,
          "info" : true,
          "scrollX": true,
          "language": {
              "lengthMenu": "Mostrando _MENU_ registros por pagina",
              "zeroRecords": "No se encontro nada - lo sentimos",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "loadingRecords": "Cargando...",
              "processing":     "Procesando..",
              "infoEmpty": "No hay solicitudes pendientes por el momento",
              "infoFiltered": "(filtrados de _MAX_ registros en total)",
              "search":         "Buscar:",
              "paginate": {
                 "first":      "Primera",
                 "last":       "Ultima",
                 "next":       "Siguiente",
                 "previous":   "Anterior"
             }
          }

    } );

    $('.requestsTable tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );

    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.find('span').removeClass('fa-minus').addClass('fa-plus');
    }
    else {
        // Open this row
        row.child( format(row.data()) ).show();
        tr.find('span').removeClass('fa-plus').addClass('fa-minus');
    }
} );

$('.reportsTable tfoot th').each( function () {
    var title = $(this).text();
    if (title !="") {
      $(this).html( '<input type="text" placeholder="'+title+'" />' );
    }
} );

  var table2 = $('.reportsTable').DataTable({
    dom: 'Bfrtip',
  buttons: [{
      extend: 'excel',
      text: 'Excel',
      title: 'Reporte Solicitudes Consultas Psicologicas'
  },
  {
      extend: 'pdf',
      text: 'PDF',
      title: 'Reporte Solicitudes Consultas Psicologicas'
  },{
      extend: 'print',
      text: 'Imprimir',
      title: 'Reporte Solicitudes Consultas Psicologicas'
  }
  ],
    "ajax": {
        "url": "server_processing.php?view=psychological&reports=true",
        dataSrc:""
    },
    "columns": [
        {
            "className":      'details-control',
            "orderable":      false,
            "data":           null,
            "defaultContent": '<span class="fa fa-plus fa-lg" aria-hidden="true"></span>'
        },

        { "data": "name" },
        { "data": "user_id" },
        { "data": "date" },
        { "data": "contact" },
        { "data": "created_at" },
        { "data": "status" },
    ],
      "ordering": false,
      "scrollX": true,
      "language": {
          "lengthMenu": "Mostrando _MENU_ registros por pagina",
          "zeroRecords": "No se encontro nada - lo sentimos",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "loadingRecords": "Cargando...",
          "processing":     "Procesando..",
          "infoEmpty": "No hay solicitudes pendientes por el momento",
          "infoFiltered": "(filtrados de _MAX_ registros en total)",
          "search":         "Buscar:",
          "paginate": {
             "first":      "Primera",
             "last":       "Ultima",
             "next":       "Siguiente",
             "previous":   "Anterior"
         }
      },
      "fnInitComplete": function(){
          // Disable TBODY scoll bars
          $('.reports .dataTables_scrollBody').css({
              'overflow': 'hidden',
              'border': '0'
          });

          // Enable TFOOT scoll bars
          $('.reports .dataTables_scrollFoot').css('overflow', 'auto');

          // Sync TFOOT scrolling with TBODY
          $('.reports .dataTables_scrollFoot').on('scroll', function () {
              $('.reports .dataTables_scrollBody').scrollLeft($(this).scrollLeft());
          });
      },

} );

$('.reportsTable tbody').on('click', 'td.details-control', function () {
var tr = $(this).closest('tr');
var row = table2.row( tr );

if ( row.child.isShown() ) {
    // This row is already open - close it
    row.child.hide();
    tr.find('span').removeClass('fa-minus').addClass('fa-plus');
}
else {
    // Open this row
    row.child( format2(row.data()) ).show();
    tr.find('span').removeClass('fa-plus').addClass('fa-minus');
}
} );

// Apply the search
table2.columns().every( function () {
var that = this;
$( 'input', this.footer() ).on( 'keyup change', function () {
    if ( that.search() !== this.value ) {
        that
            .search( this.value )
            .draw();
    }
} );


} );

} );
</script>
