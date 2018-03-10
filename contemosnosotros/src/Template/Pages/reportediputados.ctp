<div class="row"> 
	<div class="col-sm-10 col-sm-offset-1">      
		<h1>Reporte de diputados</h1>
		<div class="row">
			<canvas id="openedCanvas" height="230" width="680"></canvas>
		</div>
	</div> 

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.0.1/Chart.bundle.min.js"></script>


<script>
 $( document ).ready(function() {	
   $( ".reportediputados" ).addClass( "active" );

   Chart.defaults.RoundedDoughnut = Chart.helpers.clone(Chart.defaults.doughnut);
           Chart.controllers.RoundedDoughnut = Chart.controllers.doughnut.extend({
               draw: function (ease) {
               		var ctx = this.chart.chart.ctx;
                   
                   var easingDecimal = ease || 1;
                   Chart.helpers.each(this.getDataset().metaData, function (arc, index) {
                       arc.transition(easingDecimal).draw();

                       var vm = arc._view;
                       var radius = (vm.outerRadius + vm.innerRadius) / 2;
                       var thickness = (vm.outerRadius - vm.innerRadius) / 2;
                       var angle = Math.PI - vm.endAngle - Math.PI / 2;
                       
                       ctx.save();
                       ctx.fillStyle = vm.backgroundColor;
                       ctx.translate(vm.x, vm.y);
                       ctx.beginPath();
                       ctx.arc(radius * Math.sin(angle), radius * Math.cos(angle), thickness, 0, 2 * Math.PI);
                       ctx.arc(radius * Math.sin(Math.PI), radius * Math.cos(Math.PI), thickness, 0, 2 * Math.PI);
                       ctx.closePath();
                       ctx.fill();
                       ctx.restore();
                   });
               },
           });

           var deliveredData = {
               labels: [
                   "Value"
               ],
               datasets: [
                   {
                       data: [85, 15],
                       backgroundColor: [
                           "#3ec556",
                           "rgba(0,0,0,0)"
                       ],
                       hoverBackgroundColor: [
                           "#3ec556",
                           "rgba(0,0,0,0)"
                       ],
                       borderWidth: [
                           0, 0
                       ]
                   }]
           };

           var deliveredOpt = {
               cutoutPercentage: 88,
               animation: {
                   animationRotate: true,
                   duration: 2000
               },
               legend: {
                   display: false
               },
               tooltips: {
                   enabled: false
               }
           };

           var chart = new Chart($('#openedCanvas'), {
               type: 'RoundedDoughnut',
               data: deliveredData,
               options: deliveredOpt
           });
 });
</script>
