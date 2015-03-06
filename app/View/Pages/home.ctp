
        <div class="row">       
          <div class="col-sm-10 col-sm-offset-1">
            <h1>Conteo electoral 2014</h1>
            <p>Desarrollo de herramienta crowd-sourced, totalmente anónima, capaz de verificar los conteos que se encuentran en las actas de las Juntas Electorales Enviadas al TSE</p>
            
          </div>       
          <div id = "alert-box" class=" col-sm-10 col-sm-offset-1 alert alert-success fade in" style = "display:none;margin-bottom: -32px;">
            <button type="button" id = "alert-close-btn" class="close ">×</button>
            <center><strong>Acta Ingresada!!!</strong></center>
          </div>
        </div>

        
        <div class="row datos">
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <p class="centrado">Digite los Numeros que en la imagen se presentan en el cuadro de texto y luego presiona "Enviar Acta" o la tecla [Enter].</p>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="row">
              <div class="inpt" id="imgContainer">
              </div>
                             
            </div>

            <div class="row inputt">
              <div class="centrado">
               	<input type="text" placeholder="Digitar números de acta" id="txtCounter" autofocus="" maxlength="3">
              </div>             
               
              <div class="centrado"> <button class="btn btn-danger btn-lg" id="btnSend">Enviar Acta</button>
              </div>
            </div>
          </div>

        </div>
		<script>
    $( document ).ready(function() {
	
$( ".inicio" ).addClass( "active" );

$("#txtCounter").focusin(function() {
  $( this ).attr("placeholder","");
}).focusout(function(){
  $( this ).attr("placeholder","Digitar números de acta");
});

 });
    </script>
