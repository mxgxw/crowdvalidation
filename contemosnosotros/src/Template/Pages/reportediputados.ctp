<div class="row"> 

	<style type="text/css">
		
		.widget {
		    margin: 0 auto;
		    width:100%;
		    margin-top:50px;
		    background-color: #222D3A;
		    border-radius: 5px;
		    box-shadow: 0px 0px 1px 0px #06060d;

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
		    padding:25px;
		    display:inline-block;
		    
		}

		.shadow {
		    -webkit-filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
		    filter: drop-shadow( 0px 3px 3px rgba(0,0,0,.5) );
		}

	</style>
	<div class="col-sm-12" >      
		<!-- <h1>Reporte de diputados</h1> -->
		<div class="widget">
		    <div class="header">Reporte de diputados</div>
		    <div id="chart" class="chart-container" ></div>
		    <div id="chart1" class="chart-container"></div>
		</div>

	</div> 



</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.1/d3.min.js"></script>        

<script>
 $( document ).ready(function() {	
   $( ".reportediputados" ).addClass( "active" );

       var createGradient=function(svg,id,color1,color2){

           var defs = svg.append("svg:defs")

           var red_gradient = defs.append("svg:linearGradient")
                   .attr("id", id)
                   .attr("x1", "0%")
                   .attr("y1", "0%")
                   .attr("x2", "50%")
                   .attr("y2", "100%")
                   .attr("spreadMethod", "pad");

           red_gradient.append("svg:stop")
                   .attr("offset", "50%")
                   .attr("stop-color", color1)
                   .attr("stop-opacity", 1);

           red_gradient.append("svg:stop")
                   .attr("offset", "100%")
                   .attr("stop-color", color2)
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

         var color = ['#f2503f','#ea0859','#404F70'];

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

         createGradient(svg,'gradient',color[0],color[1]);

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
                   width:20,
                   height:20,
                   transform:'translate(0,0)'
                 });      

         var pathBackground=svg.append('path')

                 .attr({
                     d:arc
                 })
                 .style({
                     fill:color[2]
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
                     'font-size':'90px'

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

}); 


</script>
