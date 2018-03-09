        
       <div class="row"> <div class="col-sm-12"> 
          <h1 class="t-blue t-center">Conteo electoral 2018</h1>
          <p style="max-width: 700px;margin: 0 auto;" class="text-center">Es el desarrollo de una herramienta crowd-sourced o de colaboración abierta distribuida, totalmente anonima, capaz de verificar los conteos que se encuentran en las actas de las Juntas Electorales enviadas al TSE (Tribunal Supremo Electoral) de la República de El Salvador.</p>
          <hr class="my-4">
          <div class="card actas" style="max-width: 800px;">
            <div class="card-body">
              <h5 class="card-title t-blue t-center">Ingreso de Actas</h5>
              <p class="card-text">Digite únicamente los números (sin guiones) que observa en la imagen, si aparece vacio o solo guiones digite "0". </p>
              <p class="card-text">Escriba el número en el cuadro de texto y luego presione "Enviar Acta" o la tecla [Enter].</p>

        <div class="input-group mb-3">

          <div class="inpt" id="imgContainer"></div>

          <div class="row inputt">
              <div class="centrado">
               	<input type="number" placeholder="Digitar numeros de acta" id="txtCounter" autofocus="" maxlength="3">
              </div>
          
          </div>
          <div class="text-center"> 
			      <button class="btn btn-primary btn-lg" id="btnSend">Enviar Acta</button> 
			      <button class="btn btn-danger btn-lg" id="btnReport">Acta Irregular</button>
          </div>
          <div class="text-center">
            <div id="#alert-box" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
              Acta ingresada <strong>correctamente. </strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>

        </div>
            
          </div>
        </div>
		</div>
        
        <script type="text/javascript">
        $( document ).ready(function() {
          $( ".inicio" ).addClass( "active" );
          
          $("#txtCounter").focusin(function() {
            $( this ).attr("placeholder","");
            }).focusout(function(){
              $( this ).attr("placeholder","Digitar numeros de acta");
              });
              });
        </script>

<script type="text/javascript">

var token = 0;
function loadNew() {
  $.ajax({
    url: "./valida/",
  }).done(function( data ) {
    token = data.token;
    $('#imgContainer').html('<img src="./valida/image/'+token+'"/>');
    $('#txtCounter').val("");
  })
}
function sendReport() {
    if(token!=0) {
      $.ajax({
        url: "./valida/invalida/",
        type: 'POST',
        data: { token: token }
      }).done(function( data ) {
        if(data.Status) {
          $("#alert-box").show()
          window.setTimeout(function () {
            $("#alert-box").hide();
          }, 3000);
          $('#txtCounter').val("");
          loadNew();
        }
        if(data.Error) {
          window.alert("Error: "+data.Error);
		  loadNew();
        }
        $("#btnReport").removeAttr("disabled");
        $("#btnSend").removeAttr("disabled");
        $("#btnSend").text("Enviar Acta")
      })
    }
}
function sendResult() {
    if(token!=0) {
      $.ajax({
        url: "./valida/conteo/",
        type: 'POST',
        data: { token: token, value: $('#txtCounter').val() }
      }).done(function( data ) {
        if(data.Status) {
          $("#alert-box").show()
          window.setTimeout(function () {
            $("#alert-box").hide();
          }, 3000);
          $('#txtCounter').val("");
          loadNew();
        }
        if(data.Error) {
          window.alert("Error: "+data.Error);
        }
        $("#btnSend").removeAttr("disabled");
        $("#btnSend").text("Enviar Acta")
      })
    }
}
$(function () {
  $("#alert-close-btn").on("click", function(){
    $("#alert-box").hide();
  });
  $('#btnReport').click(function () {
    $("#btnReport").attr("disabled", "disabled");
    $("#btnSend").attr("disabled", "disabled");
    $("#btnSend").text("Reportando Acta....");
    sendReport();
  });

  $('#btnSend').click(function () {
    $("#btnSend").attr("disabled", "disabled");
    $("#btnSend").text("Enviando Acta....");
    counter = $("#txtCounter").val();
    if(counter.indexOf("-")>=0 || counter.indexOf("_")>=0){
      window.alert("No ingrese guiones");
      $("#btnSend").removeAttr("disabled");
      $("#btnSend").text("Enviar Acta");
      return
    }
    sendResult();
  });
  $(document).keypress(function(e) {
    if(e.which == 13) {
      sendResult();
    }
  });
  loadNew();
});
</script>
