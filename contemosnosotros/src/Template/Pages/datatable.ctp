<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>Suma de Marcas de voto Preferente</h1>
<p>Con el proposito de mostrar resultados a la brevedad se han priorizado los diputados que presentaron con inconsistencias luego del error del TSE.</p>
<p>Se declara que todos los datos presentados en esta aplicación se han obtenido de la información accesible al público de la plataforma de conteos en línea del Tribunal Supremo Electoral, sin embargo, no se puede garantizar de ninguna manera que las actas obtenidas sean una fiel representación de las originales, ni siquiera que estén completas y, por tanto: todo resultado obtenido de esta plataforma se deberá considerar orientativo y no deberá otorgársele mayor validez que el de un ejercicio educativo experimental.</p>

<style type="text/css">
    
    .bs-example {
      position: relative;
      padding: 45px 15px 15px;
      margin: 0 -15px 15px;
      border-color: #e5e5e5 #eee #eee;
      border-style: solid;
      border-width: 1px 0;
      -webkit-box-shadow: inset 0 3px 6px rgba(0,0,0,.05);
              box-shadow: inset 0 3px 6px rgba(0,0,0,.05);
    }
    /* Echo out a label for the example */
    .bs-example:after {
      position: absolute;
      top: 15px;
      left: 15px;
      font-size: 12px;
      font-weight: bold;
      color: #959595;
      text-transform: uppercase;
      letter-spacing: 1px;
      content: "Example";
    }

    .bs-example-padded-bottom {
      padding-bottom: 24px;
    }

    /* Tweak display of the code snippets when following an example */
    .bs-example + .highlight,
    .bs-example + .zero-clipboard + .highlight {
      margin: -15px -15px 15px;
      border-width: 0 0 1px;
      border-radius: 0;
    }

    /* Make the examples and snippets not full-width */
    @media (min-width: 768px) {
      .bs-example {
        margin-right: 0;
        margin-left: 0;
        background-color: #fff;
        border-color: #ddd;
        border-width: 1px;
        border-radius: 4px 4px 0 0;
        -webkit-box-shadow: none;
                box-shadow: none;
      }
      .bs-example + .highlight,
      .bs-example + .zero-clipboard + .highlight {
        margin-top: -16px;
        margin-right: 0;
        margin-left: 0;
        border-width: 1px;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
      }
      .bs-example-standalone {
        border-radius: 4px;
      }
    }

    /* Undo width of container */
    .bs-example .container {
      width: auto;
    }
</style>

    <div class="bs-example">
        <table id="marcasvotos" class="table table-striped">
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
    </div>


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
