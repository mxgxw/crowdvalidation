
        <div class="row">       
          <div class="col-sm-10 col-sm-offset-1">
            <h1>Conteo electoral 2014</h1>
            <p>Desarrollo de herramienta crowd-sourced, totalmente anónima, capaz de verificar los conteos que se encuentran en las actas de las Juntas Electorales Enviadas al TSE</p>
            <h2 styel = "color:#fff; text-align: center;">Instrucciones</h2>
            <p>Digite los Numeros que en la imagen se presentan en el cuadro de texto y luego presiona "Enviar Acta" o la tecla [Enter].</p>
          </div>       
          <div id = "alert-box" class=" col-sm-10 col-sm-offset-1 alert alert-success fade in" style = "display:none;margin-bottom: -32px;">
            <button type="button" id = "alert-close-btn" class="close ">×</button>
            <center><strong>Captcha Recibido!!!</strong></center>
          </div>
        </div>

        <!--<div class="row">
          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="centrado">10,000</h3>
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <span>Actas Electorales</span>
                  </div>                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="centrado">201</h3>
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <span>Actas Escrutinadas</span>
                  </div>                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="centrado">201</h3>
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <span>Actas en escrutinio</span>
                  </div>                  
                </div>
              </div>
            </div>
          </div>
        </div>-->
        <div class="row datos">
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <h4 class="centrado">Ayudanos a hacer el conteo de las actas electorales</h4>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-3 ccentrado inpt" id="imgContainer">
              </div>
                             
            </div>

            <div class="row inputt">
              <div class="col-sm-4">
                <input type="text" placeholder="Digitar números de acta" id="txtCounter" autofocus>
              </div>             
               
              <div class="col-sm-4 col-sm-offset-4 centrado"> <button class="btn btn-danger btn-lg" id="btnSend">Enviar Acta</button>
              </div>
            </div>
          </div>

        </div>
