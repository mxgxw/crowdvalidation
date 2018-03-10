<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>Suma de Marcas de voto Preferente</h1>
<p>Con el proposito de mostrar resultados a la brevedad se han priorizado los diputados que presentaron con inconsistencias luego del error del TSE.</p>
<p>Se declara que todos los datos presentados en esta aplicación se han obtenido de la información accesible al público de la plataforma de conteos en línea del Tribunal Supremo Electoral, sin embargo, no se puede garantizar de ninguna manera que las actas obtenidas sean una fiel representación de las originales, ni siquiera que estén completas y, por tanto: todo resultado obtenido de esta plataforma se deberá considerar orientativo y no deberá otorgársele mayor validez que el de un ejercicio educativo experimental.</p>

<table id="marcasvotos" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID diputado</th>
                <th>ID departamento</th>
                <th>Departamento</th>
                <th>ID partido</th>
                <th>Partido</th>
                <th>Diputado</th>
				<th>Marcas</th>
				<th>Disponibles</th>
				<th>Procesadas</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID diputado</th>
                <th>ID departamento</th>
                <th>Departamento</th>
                <th>ID partido</th>
                <th>Partido</th>
                <th>Diputado</th>
				<th>Marcas</th>
				<th>Disponibles</th>
				<th>Procesadas</th>
            </tr>
        </tfoot>
    </table>


</div> </div>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script>
 $( document ).ready(function() {	
   $( ".agradecimientos" ).addClass( "active" );
   
   $('#marcasvotos').DataTable( {
        "ajax": 'https://contemosnosotros.org/api/votopreferenteactas'
    }
	{
    "decimal":        "",
    "emptyTable":     "No hay datos disponibles",
    "info":           "Mostrando _START_ al _END_ de _TOTAL_ entradas",
    "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered":   "(filtrado De _MAX_ total entradas)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron resultados",
    "paginate": {
        "first":      "Primera",
        "last":       "Ultima",
        "next":       "Siguiente",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": activar para ordenar la columna ascendentemente",
        "sortDescending": ": activar para ordenar la columna descendentemente"
    }
}
	 );
   
 });
</script>
