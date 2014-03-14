<link href="/css/resultados.css" media="screen" rel="stylesheet" type="text/css" />
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <div class="row"> <div class="col-sm-10 col-sm-offset-1">      
<style>
h1 {
    font-size: 2em;
}
</style>

<script>
  var DURATION = 1500;
  var DELAY    = 500;

  var f2d = d3.format("%0.2f");

  function drawPieChart( elementId, data ) {
    // TODO code duplication check how you can avoid that
    var containerEl = document.getElementById( elementId ),
        width       = containerEl.clientWidth,
        height      = width * 0.4,
        radius      = Math.min( width, height ) / 2,
        container   = d3.select( containerEl ),
        svg         = container.select( 'svg' )
                              .attr( 'width', width )
                              .attr( 'height', height );
    var pie = svg.append( 'g' )
                .attr(
                  'transform',
                  'translate(' + width / 2 + ',' + height / 2 + ')'
                );
    
    var detailedInfo = svg.append( 'g' )
                          .attr( 'class', 'pieChart--detailedInformation' );

    var twoPi   = 2 * Math.PI;
    var pieData = d3.layout.pie()
                    .value( function( d ) { return d.value; } );

    var arc = d3.svg.arc()
                    .outerRadius( radius - 20)
                    .innerRadius( 0 );
    
    var pieChartPieces = pie.datum( data )
                            .selectAll( 'path' )
                            .data( pieData )
                            .enter()
                            .append( 'path' )
                            .attr( 'class', function( d ) {
                              return 'pieChart__' + d.data.color;
                            } )
                            .attr( 'filter', 'url(#pieChartInsetShadow)' )
                            .attr( 'd', arc )
                            .each( function() {
                              this._current = { startAngle: 0, endAngle: 0 }; 
                            } )
                            .transition()
                            .duration( DURATION )
                            .attrTween( 'd', function( d ) {
                              var interpolate = d3.interpolate( this._current, d );
                              this._current = interpolate( 0 );
                    
                              return function( t ) {
                                return arc( interpolate( t ) );
                              };
                            } )
                            .each( 'end', function handleAnimationEnd( d ) {
                              drawDetailedInformation( d.data, this ); 
                            } );

    drawChartCenter(); 
    
    function drawChartCenter() {
      var centerContainer = pie.append( 'g' )
                                .attr( 'class', 'pieChart--center' );
      
      centerContainer.append( 'circle' )
                      .attr( 'class', 'pieChart--center--outerCircle' )
                      .attr( 'r', 0 )
                      .attr( 'filter', 'url(#pieChartDropShadow)' )
                      .transition()
                      .duration( DURATION )
                      .delay( DELAY )
                      .attr( 'r', radius - 50 );
      
      centerContainer.append( 'circle' )
                      .attr( 'id', 'pieChart-clippy' )
                      .attr( 'class', 'pieChart--center--innerCircle' )
                      .attr( 'r', 0 )
                      .transition()
                      .delay( DELAY )
                      .duration( DURATION )
                      .attr( 'r', radius - 55 )
                      .attr( 'fill', '#fff' );
    }

    
    function drawDetailedInformation ( data, element ) {
      var bBox      = element.getBBox(),
          infoWidth = width * 0.3,
          anchor,
          infoContainer,
          position;
      
      if ( ( bBox.x + bBox.width / 2 ) > 0 ) {
        infoContainer = detailedInfo.append( 'g' )
                                    .attr( 'width', infoWidth )
                                    .attr(
                                      'transform',
                                      'translate(' + ( width - infoWidth ) + ',' + ( bBox.height + bBox.y ) + ')'
                                    );
        anchor   = 'end';
        position = 'right';
      } else {
        infoContainer = detailedInfo.append( 'g' )
                                    .attr( 'width', infoWidth )
                                    .attr(
                                      'transform',
                                      'translate(' + 0 + ',' + ( bBox.height + bBox.y ) + ')'
                                    );
        anchor   = 'start';
        position = 'left';
      }

      infoContainer.data( [ data.value * 100 ] )
                    .append( 'text' )
                    .text ( '0 %' )
                    .attr( 'class', 'pieChart--detail--percentage' )
                    .attr( 'x', ( position === 'left' ? 0 : infoWidth ) )
                    .attr( 'y', -10 )
                    .attr( 'text-anchor', anchor )
                    .transition()
                    .duration( DURATION )
                    .tween( 'text', function( d ) {
                      var i = d3.interpolate(
                        +this.textContent.replace( /\s%/ig, '' ),
                        d
                      );

                      return function( t ) {
                        this.textContent = d3.round(i(t),2) + ' %';
                      };
                    } );
      /*infoContainer.data( [ data.value * 100 )
                    .append( 'text' )
      */
      infoContainer.append( 'line' )
                    .attr( 'class', 'pieChart--detail--divider' )
                    .attr( 'x1', 0 )
                    .attr( 'x2', 0 )
                    .attr( 'y1', 0 )
                    .attr( 'y2', 0 )
                    .transition()
                    .duration( DURATION )
                    .attr( 'x2', infoWidth );
      
      infoContainer.data( [ data.description ] ) 
                    .append( 'foreignObject' )
                    .attr( 'width', infoWidth ) 
                    .attr( 'height', 100 )
                    .append( 'xhtml:body' )
                    .attr(
                      'class',
                      'pieChart--detail--textContainer ' + 'pieChart--detail__' + position
                    )
                    .html( data.description );
    }
  }

$( function() {
  $( ".resultados" ).addClass( "active" );
  $.ajax({
        url: "/valida/resultJSON",
      }).done(function( data ) {
          $('#g1Boletas').html(data.boletas);
          $('#g1Votos').html(data.votos);
          $('#g1VotosA').html(data.results[1].votos);
          $('#g1VotosF').html(data.results[0].votos);
          drawPieChart('pieChart', data.results);
      })
  $.ajax({
        url: "/valida/resultJSONAll",
      }).done(function( data ) {
          $('#g2Boletas').html(data.boletas);
          $('#g2Votos').html(data.votos);
          $('#g2VotosA').html(data.results[1].votos);
          $('#g2VotosF').html(data.results[0].votos);
          drawPieChart('pieChart2', data.results);
      })

});
</script>

      <h1 class="chart--subHeadline">Contemos Nosotros</h1>
      <h2 class="chart--headline">Conteo de actas totalmente anónimo, distribuido y abierto. </h2>
      <h1>Porcentaje de votos con actas validadas en el sistema</h1>
      <p>En esta gráfica se muestran únicamente las actas en las cuales ambos partidos recibieron digitaciones coincidentes. Es decir
         que tanto para ARENA como para el FMLN los usuarios digitaron correctamente más de una vez los totales para ambos partidos.<br /><br />
         La gráfica se genera a partir de <span id="g1Boletas"></span> actas que totalizan <span id="g1Votos"></span> votos correspondientes a
         <span id="g1VotosA"></span> votos para ARENA y <span id="g1VotosF"></span> votos para FMLN.
      </p>
      <div id="pieChart">
        <svg id="pieChartSVG1">
          <defs>
            <filter id='pieChartInsetShadow'>
              <feOffset dx='0' dy='0'/>
              <feGaussianBlur stdDeviation='3' result='offset-blur' />
              <feComposite operator='out' in='SourceGraphic' in2='offset-blur' result='inverse' />
              <feFlood flood-color='black' flood-opacity='1' result='color' />
              <feComposite operator='in' in='color' in2='inverse' result='shadow' />
              <feComposite operator='over' in='shadow' in2='SourceGraphic' />
            </filter>
            <filter id="pieChartDropShadow">
              <feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur" />
              <feOffset in="blur" dx="0" dy="3" result="offsetBlur" />
              <feMerge>
                <feMergeNode />
                <feMergeNode in="SourceGraphic" />
              </feMerge>
            </filter>
          </defs>
        </svg>
      </div>
      <h1>Porcentaje de votos con todos los votos digitados correctamente</h2>
      <p>En esta segunda gráfica se muestra el conteo de todos los votos digitados correctamente independientemente si el acta consiguió dos conteos
        válidos o no. Se omiten digitaciones que no pudieron validarse (Solo una digitación o varias digitaciones diferentes).<br />
        Notarán que a pesar de ser un resultado incompleto el porcentaje final es asombrosamente cercano al resultado oficial publicado por el TSE, esto sucede
        de esta manera ya que los valores digitados válidos presentan una distribución completamente aleatoria de tal manera que los valores restantes
        se comportan como una "muestra estadística", como cada acta tiene 500 electores del padron cada acta tiene el mismo "peso" dentro de la muestra, en
        otras palabras las digitaciones restantes aunque incompletas funcionan como un predictor "aceptable" del resultado final.<br /><br />
        La gráfica se genera a partir de <span id="g2Boletas"></span> actas que totalizan <span id="g2Votos"></span> votos correspondientes a
         <span id="g2VotosA"></span> votos para ARENA y <span id="g2VotosF"></span> votos para FMLN.</p>

      <div id="pieChart2">
        <svg id="pieChartSVG">
          <defs>
            <filter id='pieChartInsetShadow'>
              <feOffset dx='0' dy='0'/>
              <feGaussianBlur stdDeviation='3' result='offset-blur' />
              <feComposite operator='out' in='SourceGraphic' in2='offset-blur' result='inverse' />
              <feFlood flood-color='black' flood-opacity='1' result='color' />
              <feComposite operator='in' in='color' in2='inverse' result='shadow' />
              <feComposite operator='over' in='shadow' in2='SourceGraphic' />
            </filter>
            <filter id="pieChartDropShadow">
              <feGaussianBlur in="SourceAlpha" stdDeviation="3" result="blur" />
              <feOffset in="blur" dx="0" dy="3" result="offsetBlur" />
              <feMerge>
                <feMergeNode />
                <feMergeNode in="SourceGraphic" />
              </feMerge>
            </filter>
          </defs>
        </svg>
      </div>
  </div>
</div>
