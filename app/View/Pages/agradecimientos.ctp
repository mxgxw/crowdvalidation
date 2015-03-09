<style type="text/css">
    h1 {
        font-size: 2em;
    }

    #wordcloud {
        width: 100%;
        height: 400px;
        text-align: center;
    }

    #wordcloud svg {
        width: 600px;
        height: 400px;
        max-width: 100%;
        margin: 0 auto;
    }
</style>
<div class="container">
    <h1>Contemos Nosotros</h1>

    <h2 class="chart--headline">Conteo de actas totalmente anónimo, distribuido y abierto. </h2>

    <p>Contemos Nosotros es un ejemplo de desarrollo abierto y colaborativo, muchos de los participantes en
        este proyecto nisiquiera hemos tenido la oportunidad de conocernos en persona.<br/><br/>
        Sin embargo este espacio lo dejamos para mencionar y agradecer a todos los que han colaborado en el
        desarrollo inicial y la promoción de esta plataforma. <br/><br/>También agradecemos de manera muy especial
        a los más de mil usuarios anónimos que hacen que esta plataforma funcione ingresando los números
        de los conteos.</p>

    <div id="wordcloud"></div>
    <p>Los nombres en el mapa de palabras anterior no se presentan en ningún orden específico, presiona F5 o
        el botón refrescar de tu navegador para ver más nombres</p>
</div>

<?php echo $this->Html->script('http://d3js.org/d3.v3.min.js'); ?>
<?php echo $this->Html->script('d3.layout.cloud.js'); ?>
<script>
    var fill = d3.scale.category20();
    function draw(words) {
        d3.select("#wordcloud").append("svg")
            .attr("width", 600)
            .attr("height", 400)
            .append("g")
            .attr("transform", "translate(300,200)")
            .selectAll("text")
            .data(words)
            .enter().append("text")
            .style("font-size", function (d) {
                return d.size + "px";
            })
            .style("font-family", "Impact")
            .style("fill", function (d, i) {
                return fill(i);
            })
            .attr("text-anchor", "middle")
            .attr("transform", function (d) {
                return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
            })
            .text(function (d) {
                return d.text;
            });
    }
    $(function () {
        d3.layout.cloud().size([600, 400])
            .words([
                'Pablo Marti',
                'Alejandro Corpeño',
                'Mario Gomez',
                'Salvatore Escalante',
                'Youdicen Henriquez',
                'Jorge Alberto Ochoa',
                'HKadejo Gonzalez',
                'René Alfredo García Hernández',
                'Diego Melendez',
                'Carlos Moreno',
                'Emigdio Salvador Corado',
                'Belcboo Gs',
                'Jose Carlos Garcia',
                'Daniel Reyes',
                "NorCrack D'Weaverd",
                'Eduardo Mejía',
                'Mario Flores',
                'Carlos Soriano',
                'Héctor Rodríguez',
                'Luis Arias',
                'Jorge Ramirez',
                'Ulises Quiñonez',
                'Luis Ramirez',
                'Jorge Alejandro Rodriguez Moran',
                'William Díaz'
            ].map(function (d) {
                    return {text: d, size: 10 + Math.random() * 30};
                }))
            .padding(5)
            .rotate(function () {
                return ~~(Math.random() * 2) * 90;
            })
            .font("Impact")
            .fontSize(function (d) {
                return d.size;
            })
            .on("end", draw)
            .start();
    });
</script>
