<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>Suma de Marcas de voto Preferente</h1>
<p>Con el proposito de mostrar resultados a la brevedad se han priorizado los diputados que presentaron con inconsistencias luego del error del TSE.</p>
<p>Se declara que todos los datos presentados en esta aplicación se han obtenido de la información accesible al público de la plataforma de conteos en línea del Tribunal Supremo Electoral, sin embargo, no se puede garantizar de ninguna manera que las actas obtenidas sean una fiel representación de las originales, ni siquiera que estén completas y, por tanto: todo resultado obtenido de esta plataforma se deberá considerar orientativo y no deberá otorgársele mayor validez que el de un ejercicio educativo experimental.</p>

<table id="marcasvotos" class="display" cellspacing="0" width="100%">
    </table>


</div> </div>


<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script>
 $( document ).ready(function() {	
   $( ".datatable" ).addClass( "active" );
   
   $('#marcasvotos').DataTable( {
   	responsive: true,
        "ajax": 'https://contemosnosotros.org/api/votopreferenteactas'
    })
	 
   
 });
</script>
