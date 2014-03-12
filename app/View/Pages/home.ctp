<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
function sendResult() {
    if(token!=0) {
      $.ajax({
        url: "./valida/conteo/",
        type: 'POST',
        data: { token: token, value: $('#txtCounter').val() }
      }).done(function( data ) {
        if(data.Status) {
          window.alert("Captcha recibido");
          $('#txtCounter').val("");
          loadNew();
        }
        if(data.Error) {
          window.alert("Error: "+data.Error);
        }
      })
    }
}
$(function () {
  $('#getNew').click(function () {
    loadNew();
  });
  $('#btnSend').click(function () {
    sendResult();
  });
  $(document).keypress(function(e) {
    if(e.which == 13) {
      sendResult();
    }
  });
});
</script>


<input type="button" id="getNew" value="Refrescar" />
<div>
  <div id="imgContainer"></div>
  <input type="text" id="txtCounter" value="" /><br />
  <input type="button" id="btnSend" value="Enviar" />
</div>
