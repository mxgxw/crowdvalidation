<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h1>Manifiesto</h1>

        <p> Como trasfondo de este pequeño experimento, los colaboradores y las personas que han hecho posible este
            &quot;Conteo de votos CrowdSourcing&quot; manifiestan lo siguiente:</p>

        <p> En el marco de las elecciones presidenciales de El Salvador realizadas este pasado 9 de Marzo <strong>#EleccionesSV</strong>.
            Surgió una idea con propósitos meramente educativos: Desarrollar una aplicación que permitiera a los
            usuarios realizar el conteo de los votos de manera totalmente independiente, imparcial y anónima.</p>

        <p>Como materialización de esta idea, se desarrolló un aplicativo informático cuyo código fuente (las
            instrucciones que le permiten funcionar en un computador), base de datos e información de diseño está
            disponible de manera totalmente libre, gratuita, accesible públicamente a través de Internet para que se le
            dé el uso que se considere pertinente.</p>

        <p>Este aplicativo se ha realizado a través de la colaboración de distintos individuos sin mayores lazos entre
            sí que el auto-aprendizaje y la colaboración a través de la elaboración de una solución tecnológica a un
            problema actual. Los colaboradores en el desarrollo de esta aplicación declaran que la misma no posee
            ninguna afinidad política ni busca apoyar a nínguno de los partidos en contienda electoral, mucho menos
            busca algún tipo de beneficio económico, por ello todos los datos son de libre acceso y completamente
            auditables por cualquier individual.</p>

        <p>También se declara que todos los datos presentados en esta aplicación se derivan información pública
            accesible libremente a travéz de la plataforma de conteos en línea del Tribunal Supremo Electoral. Sin
            embargo, no se garantiza de ninguna manera que los datos sean fiel representación de los originales, se
            encuentren completos o no hayan sufrido alteraciones por terceros, por tanto, todo resultado obtenido de
            esta plataforma se deberá considerar incompleto, inexacto y no deberá de otorgarsele mayor valor que el de
            un ejercicio educativo experimental.</p>

        <p>Por último y para dar fe del objetivo de esta explicación, se explica brévemente el funcionamiento de la
            misma:</p>

        <p>Esta plataforma se basa en la premisa de que no hay una digitación correcta o incorrecta. El grado de certeza
            en la validez del conteo del acta se deriva del número de veces que distintos usuarios de la plataforma
            digitan el conteo igual. De esta manera el &quot;dato&quot; correcto corresponde a la digitación cuya
            frecuencia de ingreso al sistema es mayor.</p>

        <p>Por ejemplo: si un conteo tiene 3 digitaciones con 116 y 1 digitación con 106, se esperaría que el número
            correcto sea 116.</p>

        <p>Lo especial del sistema es que mientras más datos se hayan ingresado más confiable se considera la
            digitación. Si personas mal intencionadas quisieran altear los resultados del conteo, no bastaría con que se
            agregara un resultado aleatorio a una sola entrada de registro; sino que se tendría que agregar el mismo
            valor a la misma entrada de registro y así a muchos otros registros.</p>

        <p>La plataforma toma medidas especiales para prevenir lo anterior mostrando los conteos en papel al azar y sin
            mostrar a qué partido pertenencen. De esta manera un usuario mal intencionado no tiene forma de saber si el
            valor que va a &quot;inflar&quot; o &quot;reducir&quot; pertenece al partido de su predilección o no.</p>

        <p>La hipótesis que se espera validar al finalizar este ejercicio es que será un mayor porcentaje de usuarios
            que ingresen digitaciones correctas a los que ingresen digitaciones incorrectas, verificandose cada acta
            mediante un proceso totalmente anónimo, imparcial y basado en la &quot;sabiduría de las mayorías&quot;</p>

        <p>El código fuente de la aplicación está disponible para todo aquel que lo quiera revisar a través de la
            siguiente dirección:</p>

        <p><a href="https://github.com/mxgxw/crowdvalidation"
              target="_blank">https://github.com/mxgxw/crowdvalidation</a></p>

        <p>El código fuente de la aplicación con la que se recortaron los votos de las actas publicas del TSE para
            evitar que los digitadores supieran a que partido pertenecen y hacer mas imparcial el proceso de conteo:</p>

        <p><a href="https://gist.github.com/hkadejo/9522141" target="_blank">https://gist.github.com/hkadejo/9522141
            </a></p>

        <p>Código alternativo:<br/>
            <a href="https://gist.github.com/lnramirez/9470779">https://gist.github.com/lnramirez/9470779</a></p>

        <p>Adicionalmente se publican los <em>&quot;dump&quot;</em> de bases de datos del sistema, estos son archivos
            que contienen copias &quot;integras&quot; de los datos recolectados a través de la plataforma desde que
            inició su funcionamiento a través de la siguiente dirección:</p>

        <p>
            <a href="http://contemosnosotros.org/app/webroot/sqldumps/">http://contemosnosotros.org/app/webroot/sqldumps/</a>
        </p>

        <p>Esperamos que esta herramienta sea útil y agradecemos de antemano a todos los que colaboraron en cualquier
            medida con el desarrollo de la misma.</p>

    </div>
</div>