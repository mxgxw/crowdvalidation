<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>Agradecimientos</h1>
<table id="example" class="display" cellspacing="0" width="100%">
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
   
   $('#example').DataTable( {
        "ajax": 'https://contemosnosotros.org/api/votopreferenteactas'
    } );
   
 });
</script>
