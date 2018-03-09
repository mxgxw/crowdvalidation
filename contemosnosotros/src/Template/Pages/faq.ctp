<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>FAQ</h1>
<p>¿Qué es Contemosnosotros.org?</p>

<blockquote>Contemosnosotros.org es una iniciativa sin fines de lucro que nace de la necesidad de validar de forma independiente los procesos de votaciones llevados a cabo en la república de El Salvador y verificar si los resultados proporcionados por las autoridades respectivas son congruentes a lo reflejado en las actas entregadas por las juntas receptoras de votos (JRV)</blockquote>

<p>¿Cómo funciona?</p>
<blockquote>El sistema busca validar de forma anónima la sumatoria de los resultados en las actas presentadas por las JRV. Dado que las copias de las actas están disponibles de forma pública en el sitio oficial de las elecciones del Tribunal Supremo Electoral (TSE) de El Salvador, entonces lo que se busca es hacer que muchas personas validen e ingresen a un sistema independiente los valores escritos en las actas, esto para luego poder hacer la sumatoria de votos por localidad y candidato y compararlo con los datos presentados de forma oficial por el TSE.<br/>

Para evitar favoritismos, el sistema recorta el número correspondiente a la cantidad de votos de un candidato en especial para una papeleta en especial, luego muestra el valor de la cantidad de votos al usuario para que los ingrese sin mostrar a qué candidato o partido pertenecen, de esta forma se evita que al ingresar la cantidad de votos se quiera favorecer a alguien. El sistema registra todas las entradas y agrupa por casillas y el valor que más se repita se toma como el válido y se agrega a la sumatoria total para ese candidato/a.<br/>

//   Respuesta Corta:
El sistema busca validar de forma anónima la sumatoria de los resultados en las actas presentadas por las JRV. Para eso hace uso de técnicas digitales de extracción de los totales en las papeletas y con ayuda de las personas que usan el sistema, se puede hacer la digitación manual de datos para que el sistema haga el conteo definitivo de las actas digitadas, todo cuidando que no se favorezca a ningún candidato ya que no muestra a quién pertenece el total mostrado</blockquote>

<p>¿Qué pasa si alguien hace un programa que ingrese datos erróneos a propósito?</p>

<blockquote>Cada imagen de resultados que se carga es aleatoria, de tal forma que cada vez se recarga la página aparece una imagen distinta. Por otro lado, el sistema al consolidar la información contabiliza los registros digitados que más se repitan asociados a cada imagen, de esta forma se desecha una entrada incorrecta, ya sea por error humano o ingresadas a propósito por un programa malicioso.</blockquote>

<p>¿Cómo valida la herramienta que estoy metiendo el número correcto?</p>

<blockquote>El sistema no sabe si el dato que recibe es el correcto, la validez del dato final se basa en que el dato que más se repita de todos los que envíen para una imagen específica ese será el aceptado como correcto, según la premisa de que es muy difícil que muchas personas se equivoquen poniendo el mismo dato malo para una misma imagen.</blockquote>

<p>¿Que pasa si el número no se lee bien?</p>

<blockquote>Este mismo problema enfrentaron las personas contratadas por el TSE al introducir el conteo de votos a su sistema. La ventaja de contemosnosotros.org es el aporte colectivo, es decir, que muchas personas validarán el mismo número y la mayoría enviarán el dato que más se acerque al correcto. Si no hay una solución definitiva se considera que hay un problema con la imagen o el dato de origen procedente del acta escaneada del TSE.</blockquote>

<p>¿Pero habrá gente que le quiera poner más votos a su partido/diputado?</p>

<blockquote>La imagen que se muestra con los números manuscritos no te dice a qué partido/diputado pertenece, de tal forma que el usuario no sabe a quién corresponden los votos que se están validando, pero internamente la herramienta ya tiene asociada la imagen a un acta de JRV con la que se relacionarán los resultados de dicha imagen.</blockquote>

<p>¿Quién patrocina esto?</p>
<blockquote>La iniciativa es sin fines de lucro y no existe financiamiento externo de ninguna índole. Se hacen uso de herramientas informáticas libres y gratuitas como GNU/Linux, MySQL, PHP, Python, Ruby, OpenCV, Numpy, GIT, CakePHP, Javascript, Bootstrap y JQuery. El desarrollo del sistema y otras labores de apoyo está proporcionándose por personas que están donando su tiempo y conocimiento en la realización de este sistema de conteo comunitario, igualmente sucede con los servidores donde se hospedan la aplicación y los datos.</blockquote>

<p>¿Quién está detrás de esta iniciativa?</p>
<blockquote>Contemosnosotros.org es una iniciativa de personas que no presentan afiliación político-partidista a la hora de hacer sus aportes, ni buscan apoyar a ninguno de los partidos o candidatos/as en contienda electoral del presente, pasado o futuro: nuestra única motivación es corroborar que los comicios efectuados en El Salvador se estén desarrollando con veracidad y transparencia.</blockquote>

<p>¿Por qué tenemos que digitar manualmente y no lo hacen automatizado?</p>
<blockquote>Dada la naturaleza del registro de los totales de votos en las papeletas, basada en que los encargados de las JRV escriban a mano los totales contados de votos, es muy costoso y poco confiable delegar a un sistema computarizado la tarea de leer los datos manuscritos e interpretarlos como válidos, así que se ha creado una forma de validación manual comunitaria anónima para que cualquier persona pueda validar secciones de las actas de forma aleatoria y sin favorecer a nadie, ya que sólo se presenta al usuario el número del total de los votos en esa casilla.</blockquote>

<p>¿Dónde veo los resultados?</p>
<blockquote>Los resultados deben ser consolidados y procesados. Al momento de la escritura de esta entrada se estan haciendo los reportes para que puedas consultarlos. Si no quieres esperar y tienes los conocimientos tecnicos adecuados, puedes bajar los datos CRUDOS de la base de datos que utiliza el sistema (se refresca cada cinco minutos),es decir, todo el detalle de las digitaciones puede obtenerse en la siguiente direccion:</blockquote>

<a href="https://contemosnosotros.org/sqldumps">https://contemosnosotros.org/sqldumps</a>

<p>¿De dónde sacan estas imágenes?</p>
<blockquote>Las imágenes son recortes de las actas presentadas por las JRV que corresponden a los totales registrados para cada candidato, las copias digitales de las actas están disponibles de forma pública en la página oficial del TSE en http://elecciones2018.tse.gob.sv.</blockquote>

</div> </div>
<script>
 $( document ).ready(function() {	
   $( ".faq" ).addClass( "active" );
 });
</script>
