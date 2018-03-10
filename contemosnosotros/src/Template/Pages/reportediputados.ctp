<div class="row"> 
	<div class="col-sm-10 col-sm-offset-1">      
		<h1>Reporte de diputados</h1>
		<div class="container"></div>
		<div class="container"></div>

	</div> 



</div>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.1/d3.min.js"></script>        

<script>
 $( document ).ready(function() {	
   $( ".reportediputados" ).addClass( "active" );

   function CircularGraph(){

                   this.svgEl;    
                   this.settings =  [
                       {
                           "totalArcAngle": 300,
                           "startAngle": -150,
                           "endAngle": 50,
                           "progressValue": 200,
                           "radius": 150,
                           "thickness": 20
                       }
                   ]; 

               }

               CircularGraph.prototype.init = function(){
                   this.svgEl = d3.selectAll(".container")                        
                                        .append("svg")
                                        .attr("height", "500")
                                        .attr("width", "600")           
                                        .append("g")
                                        .attr("transform", "translate(300,250)");
                   
                   this.svgEl.selectAll("g")
                       .data(this.getData())
                       .enter().append("g")
                       .attr("class", "arc")
                       .append("path")
                       .style("fill", "#93cfeb")
                       .attr("d", this.drawArc());                                     

               }

               CircularGraph.prototype.degreeToRadian = function(deg){
                    return deg * Math.PI / 180.0;
               }

               CircularGraph.prototype.getData = function(first_argument) {
                   return this.settings;
               }

               CircularGraph.prototype.changeArc = function(){
                   d3.selectAll("g.arc > path")
                    .call(this.arcTween);
               }

                CircularGraph.prototype.arcTween = function(sel){
                   sel.transition().duration(1000)
                    .attrTween("d", self.tweenArc({ endAngle: self.getRandomRange(100, 140) }));
               }

                CircularGraph.prototype.tweenArc = function(b){                
                   var self = this;
                   return function (a) {
                       console.log(a);
                       var i = d3.interpolate(a, b);
                       for (var key in b) a[key] = b[key]; // update data
                       return function (t) {
                           return self.drawArc()(i(t));
                       };
                   };
               }

               CircularGraph.prototype.drawArc = function(){
                       var self = this;
                               d3.svg.arc()
                                .startAngle(function (d) {
                                    return self.degreeToRadian(d.startAngle);
                                })
                                .endAngle(function (d) {
                                    return self.degreeToRadian(d.endAngle);
                                })
                                .innerRadius(function (d) {
                                    return d.radius
                                })            
                                .outerRadius(function (d) {
                                    return d.thickness + d.radius;
                                });
               }

               CircularGraph.prototype.getRandomRange = function(min, max){
                    return Math.random() * (max - min) + min;
               }

               var graph = new CircularGraph();
               graph.init();
               window.setInterval(function(){
                   graph.changeArc();
               }, 2000);

   
 });
</script>
