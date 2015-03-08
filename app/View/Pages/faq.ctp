<div class="row">
    <div class="col-sm-10 col-sm-offset-1">

        <h1>Preguntas y Respuestas Comunes (FAQ):</h1>

        <p>&nbsp;</p>

        <p>¿Qué pasa si un troll/usuario mal intencionado hace un programa que ingrese datos aleatorios para confundir
            al sistema?</p>

        <blockquote><p>Nada, el sistema funcionará normalmente. Cada imagen es seleccionada al azar y solo es "validada"
                si dos usuarios diferentes ingresan la misma cifra, si un usuario mal intencionado intenta ingresar
                valores diferentes al de la imagen el sistema los descartará al no tener coincidencia. Una misma imágen
                nunca
                tiene el mismo nombre de archivo y es imposible conocer que imagen será la que aparecerá.
                En cambio entre mas personas vean la misma imagen, tenderán a introducir el mismo número,
                asi que la digitación que más se repita para una imagen en particular será la aceptada como
                correcto.</p></blockquote>

        <p>¿Cómo valida la herramienta que estoy metiendo el número correcto?</p>
        <blockquote><p>El sistema no tiene conocimiento si el dato que recibe es el correcto, la validez del dato se
                basa en la premisa que dos o más digitaciones coincidentes para una imagen particular significan que ese
                número es el que la persona lee en el corte del número del acta. La fortaleza del sistema se basa en la
                "sabiduría de las multitudes", en este caso si 4 personas dicen que la imagen parece el número 5 tendrá
                mas peso que una sola persona que diga que parece un 3.</p></blockquote>

        <p>¿Que pasa si el número no se lee bien?</p>
        <blockquote><p>Ante este mismo problema se enfrentan los digitadores del TSE al introducir el conteo de votos a
                sus sistemas, la ventaja de esta herramienta es que muchas personas validarán el mismo número y se
                confía en que la mayoria envien el dato que mas se acerque al correcto. Existe sin embargo la
                posibilidad de que algunos datos sean simplemente ilegibles, el sistema no puede hacer nada para
                solventar esto más que marcar la casilla correspondiente como "no verificada".</p></blockquote>
        <p>¿Pero habrá gente que le quiera poner mas votos a su partido?</p>
        <blockquote><p>El sistema se ha diseñado de tal manera que el usuario no conoce a que partido pertenece el
                número que está digitando. De esta manera el usuario no sabe de que partido son los votos que se están
                validando, internamente el sistema conoce a que conteo particular está asociada la imágen. Esto
                desinsentiva el querer ingresar datos "falsos" porque no tienes forma de saber si el dato ingresado está
                beneficiando o afectando a tu partido de preferencia.</p></blockquote>

        <p>¿Cómo se realizan los votos? Voto por Voto o Acta por Acta.</p>

        <blockquote><p>Los conteos se realizan acta por acta. El sistema de estas elecciones de Alcaldes, diputados y
                PARLACEN es bastante más complicado que el de las presidenciales. Esencialmente se validan los
                resultados ingresados en las actas y luego otro algoritmo se encarga de calcular las sumatorias.
                Contemosnosotros.org muestra conteos aleatorios a la vez, la idea es que no sepas de quien es para que
                no se quiera favorecer ni a uno ni a otro. Entre mas gente la use y la use bien, mas exactos serán los
                resultados.</p>

            <p>Recordemos que cada hoja fue validada y firmada por la JRV asignada y que componen representantes de
                AMBOS partidos, osea que esas actas ya llevan el visto bueno de AMBOS partidos</p></blockquote>

    </div>
</div>
<script>
    $(document).ready(function () {

        $(".faq").addClass("active");


    });
</script>