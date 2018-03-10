<div class="row"> 

	<style type="text/css">
		
		.widget {
		    margin: 0 auto;
		    width:100%;
		    margin-top:50px;
		    background-color: #fff;
		    border-radius: 5px;
		    box-shadow: 0px 0px 1px 0px #06060d;
		    text-align: center;

		}

		.header{
		    background-color: #29384D;
		    height:40px;
		    color:#929DAF;
		    text-align: center;
		    line-height: 40px;
		    border-top-left-radius: 7px;
		    border-top-right-radius: 7px;
		    font-weight: 400;
		    font-size: 1.5em;
		    text-shadow: 1px 1px #06060d;
		}

		.chart-container{
		    padding:4px;
		    display:inline-block;
		    
		}

		.shadow {
		    -webkit-filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
		    filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
		}

		
		h3.NameDiputado {
	      font-size: 14px;
	      margin: 10px auto 0px;
		    color: #666;
	      /* display: block; */
	      /* width: 100%; */
		}


		h4.VotosDiputado {
		    font-size: 18px;
		    font-weight: bold;
		    color: #666;
		    margin: 6px auto !important;
		}


	</style>
	<div class="col-sm-12" >      
		<!-- <h1>Reporte de diputados</h1> -->
		<div class="widget">
		    <div class="header">Reporte de diputados</div>

		    <div class="col-xs-6 col-sm-4">

		    	<!-- ****aqui | agregar numero de diputado ***** -->
		    	<div id="chart" class="chart-container" ></div> 
		    	<h3 id="name27" class="NameDiputado">Rene Portillo Cuadra</h3>
		    	<h4 id="votos27" class="VotosDiputado">1987 Votos</h4>
		    	<h2 id="porc27" class="porcDiputado">77<span>%</span></h2>
		    	<p class="textCoincidencia">Veracidad</p>
		    	<hr>
		    	<h3 id="ActasDiponibles27">Actas Disponibles: <strong>1580</strong></h3>
		    	<div id="chartDiponible27"></div>
		    	<h4 id="Procesadas27" class="Procesadas">60.35% Procesadas</h4>

		    </div>
		    <div class="col-xs-6 col-sm-4">
		    	<div id="chart1" class="chart-container"></div>

		    	<h3 id="name33" class="NameDiputado">Rene Portillo Cuadra</h3>
		    	<h4 id="votos33" class="VotosDiputado">1987 Votos</h4>
		    	<h2 id="porc33" class="porcDiputado">77<span>%</span></h2>
		    	<p class="textCoincidencia">Veracidad</p>
		    	<hr>
		    	<h3 id="ActasDiponibles33">Actas Disponibles: <strong>1580</strong></h3>
		    	<div id="chartDiponible33"></div>
		    	<h4 id="Procesadas33" class="Procesadas">60.35% Procesadas</h4>
		    </div>
		    <div class="col-xs-6 col-sm-4">
		    	<div id="chart2" class="chart-container"></div>

		    	<h3 id="name100" class="NameDiputado">Rene Portillo Cuadra</h3>
		    	<h4 id="votos100" class="VotosDiputado">1987 Votos</h4>
		    	<h2 id="porc100" class="porcDiputado">77<span>%</span></h2>
		    	<p class="textCoincidencia">Veracidad</p>
		    	<hr>
		    	<h3 id="ActasDiponibles100">Actas Disponibles: <strong>1580</strong></h3>
		    	<div id="chartDiponible100"></div>
		    	<h4 id="Procesadas100" class="Procesadas">60.35% Procesadas</h4>
		    </div>
		    
		    
		</div>

	</div> 



</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.1/d3.min.js"></script>        

<script>
 $( document ).ready(function() {	
   $( ".reportediputados" ).addClass( "active" );

       var createGradient=function(svg,id,color1,color2,color3){

           var defs = svg.append("svg:defs")

           var red_gradient = defs.append("svg:linearGradient")
                   .attr("id", id)
                   .attr("x1", "0%")
                   .attr("y1", "0%")
                   .attr("x2", "50%")
                   .attr("y2", "100%")
                   .attr("spreadMethod", "pad");

           red_gradient.append("svg:stop")
                   .attr("offset", "33%")
                   .attr("stop-color", color1)
                   .attr("stop-opacity", 1);

           red_gradient.append("svg:stop")
                   .attr("offset", "66%")
                   .attr("stop-color", color2)
                   .attr("stop-opacity", 1);

           red_gradient.append("svg:stop")
                   .attr("offset", "100%")
                   .attr("stop-color", color3)
                   .attr("stop-opacity", 1);
       };


       function createChart(id,percent,id_diputado){


         var ratio=percent/100;

         var pie=d3.layout.pie()
                 .value(function(d){return d})
                 .sort(null);

         var w=300,h=300;

         var outerRadius=(w/2)-10;
         var innerRadius=110;

         var color = ['#0070bc','#004eab','#001e79'];

         var svg=d3.select(id)
                 .append("svg")
                 .attr({
                     width:w,
                     height:h,
                     class:'shadow'
                 }).append('g')
                 .attr({
                     transform:'translate('+w/2+','+h/2+')'
                 });

         createGradient(svg,'gradient',color[0],color[1],color[2]);

         var arc=d3.svg.arc()
                 .innerRadius(innerRadius)
                 .outerRadius(outerRadius)
                 .startAngle(0)
                 .endAngle(2*Math.PI);

        // var baseUrl = window.location.pathname;
        var baseUrl ='https://contemosnosotros.org/staging/img/diputados/';

         var arcLine=d3.svg.arc()
                 .innerRadius(innerRadius)
                 .outerRadius(outerRadius)
                 .startAngle(0);
                 svg.append('image').attr({
                   'xlink:href': baseUrl + id_diputado+'.png',
                   // 'xlink:href': 'https://contemosnosotros.org/staging/img/'+id_diputado+'.png',
                   // width:20,
                   // height:20,
                   transform:'translate(-150,-150)'
                 });      

         var pathBackground=svg.append('path')

                 .attr({
                     d:arc
                 })
                 .style({
                     fill:'#eee'
                 });


         var pathChart=svg.append('path')
                 .datum({endAngle:0})
                 .attr({
                     d:arcLine
                 })
                 .style({
                     fill:'url(#gradient)'
                 });

         var middleCount=svg.append('text')
                 .text(function(d){
                     return d;
                 })

                 .attr({
                     class:'middleText',
                     'text-anchor':'middle',
                     dy:30,
                     dx:-15
                 })
                 .style({
                     fill:color[1],
                     'font-size':'1px'

                 });
             svg.append('text')
                 .text('%')
                 .attr({
                     class:'percent',
                     'text-anchor':'middle',
                     dx:50,
                     dy:-5

                 })
                 .style({
                     fill:color[1],
                     'font-size':'40px'

                 });


         var arcTween=function(transition, newAngle) {
             transition.attrTween("d", function (d) {
                 var interpolate = d3.interpolate(d.endAngle, newAngle);
                 var interpolateCount = d3.interpolate(0, percent);
                 return function (t) {
                     d.endAngle = interpolate(t);
                     middleCount.text(Math.floor(interpolateCount(t)));
                     return arcLine(d);
                 };
             });
         };


         var animate=function(){
             pathChart.transition()
                     .duration(750)
                     .ease('cubic')
                     .call(arcTween,((2*Math.PI))*ratio);


         };




         setTimeout(animate,0);
       }

   createChart('#chart',12,27);
   createChart('#chart1',85,33);
   createChart('#chart2',25,100);

}); 


</script>
