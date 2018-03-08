<div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<h1>Manifiesto</h1>
<p> Como trasfondo de este pequeño experimento, las personas que hemos hecho posible este &quot;Conteo de votos CrowdSourcing&quot; manifestamos lo siguiente:</p>
<p> En el marco de las elecciones presidenciales de El Salvador realizadas el 9 de Marzo 2014 <strong>#EleccionesSV</strong>. Surgió una idea con propósito meramente educativo: desarrollar una aplicación web que permitiera a los/as usuarios/as realizar el conteo de los votos de manera colaborativa, totalmente independiente, imparcial y anónima.</p>
<p>Esta necesidad ha vuelto a ser demandada tras los señalamientos de manipulación de los datos del escrutinio preliminar en las elecciones legislativas y municipales del 4 de Marzo de 2019, suceso que fue justificado por el Tribunal Supremo Electoral con las declaraciones dadas por la empresa proveedora de la solución informática, Smartmatic, en cuanto al descubrimiento de un error en un script de la aplicación que asignaba incorrectamente las preferencias para diferentes diputados/as en los departamentos de La Libertad y San Salvador.</p>
<p>Como materialización de esta idea, en 2014 se desarrolló un aplicativo informático que se ha mejorado y adaptado para el procesamiento de las actas de los recientes comicios, cuyo código fuente (las instrucciones que le permiten funcionar en un computador), base de datos e información de diseño está disponible de manera totalmente libre, gratuita, accesible públicamente a través de Internet para que se le dé el uso que se considere pertinente.</p>
<p>Este aplicativo se ha realizado a través de la colaboración de personas sin mayores lazos entre sí que el auto-aprendizaje y la colaboración través de la elaboración de una solución tecnológica a un problema actual en nuestra sociedad. Quienes hemos colaborado en el desarrollo de esta aplicación declaramos que no poseemos ninguna afinidad político-partidista ni buscamos apoyar a ninguno de los partidos o candidatos/as en contienda electoral, mucho menos esperamos obtener algún tipo de beneficio económico: es por ello que todos los datos son de libre acceso y completamente auditables por cualquier persona. El acceso al equipo de trabajo sigue abierto a quien quiera involucrarse activamente en el mismo en el siguiente enlace:</p>
<p><a href="https://contemosnosotros2018.slack.com/messages/C9K0F10G3/" target="_blank">https://contemosnosotros2018.slack.com/messages/C9K0F10G3/</a></p>
<p>También se declara que todos los datos presentados en esta aplicación se han obtenido de la información accesible al público de la plataforma de conteos en línea del Tribunal Supremo Electoral, sin embargo, no se puede garantizar de ninguna manera que los datos obtenidos sean una fiel representación de los originales y, por tanto, todo resultado obtenido de esta plataforma se deberá considerar orientativo: no deberá otorgársele mayor valor que el de un ejercicio educativo experimental.</p>
<p>A continuación explicamos brevemente el funcionamiento de esta aplicación:</p>
<p>Esta plataforma se basa en la premisa de que no hay una digitació correcta o incorrecta, sino que el grado de certeza en la validez del conteo del acta se deriva del número de veces que distintas personas usuarias de la plataforma digitan el conteo igual. De esta manera, el &quot;dato&quot; correcto corresponde a la digitación cuya frecuencia de ingreso al sistema es mayor.</p>
<p>Por ejemplo: si un conteo tiene 3  digitaciones con 116 y 1 digitació con 106, se esperaría que el número correcto sea 116.</p>
<p>Lo especial de esta metodología es que cuantos más datos se hayan ingresado más confiable se considera la digitación, y también evita que personas mal intencionadas puedan altear los resultados del conteo pues no bastaría con que se agregara un resultado incorrecto a una sola entrada de registro, sino que se tendría que agregar el mismo valor incorrecto a la misma entrada de registro y así con muchos otros registros.</p>
<p>Cabe agregar que la plataforma toma medidas especiales para prevenir lo anterior mostrando los conteos en papel al azar y sin mostrar a qué partido/candidatura pertenecen. De esta manera alguien mal intencionado no tiene forma de saber si el valor que va a &quot;inflar&quot; o &quot;reducir&quot; pertenece al partido/candidatura de su predilección o no.</p>
<p>La hipótesis que se espera validar al finalizar este ejercicio, además de poder contrastar los resultados que publique el TSE, es que serán un mayor porcentaje de personas usuarias las que ingresarán digitaciones correctas al porcentaje de las que ingresen digitaciones incorrectas, verificándose cada acta mediante un proceso totalmente anónimo e imparcial y basado en la &quot;sabiduría de la colectividad&quot;</p>
<p>El código fuente de la aplicación está disponible para quien lo quiera revisar a través de la siguiente dirección:</p>
<p><a href="https://github.com/mxgxw/crowdvalidation" target="_blank">https://github.com/mxgxw/crowdvalidation</a></p>
<p>El código fuente de la aplicación con la que se recortaron los votos de las actas públicas del TSE para evitar que los digitadores supieran a que partido pertenecen y hacer mas imparcial el proceso de conteo está en la siguiente dirección:</p>
<p><a href="https://gist.github.com/hkadejo/9522141" target="_blank">https://gist.github.com/hkadejo/9522141
</a></p>
<p>Código alternativo:<br />
<a href="https://gist.github.com/lnramirez/9470779">https://gist.github.com/lnramirez/9470779</a></p>
<p>Adicionalmente se publican los <em>&quot;dump/volcados&quot;</em> de bases de datos del sistema, estos son archivos que contienen copias &quot;integras&quot; de los datos recolectados a través de la plataforma desde que inició su funcionamiento en de la siguiente dirección:</p>
<p><a href="http://contemosnosotros.org/app/webroot/sqldumps/">http://contemosnosotros.org/app/webroot/sqldumps/</a></p>
<p>Esperamos que esta herramienta sea de su interés y agradecemos a todas las personas que han colaborado con el desarrollo y el uso de la misma.</p>
	
<p>TL;DR YOLO</p>

</div> </div>
<script>
 $( document ).ready(function() {	
   $( ".acercade" ).addClass( "active" );
 });
</script>
