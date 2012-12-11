<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Reploting</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

		<label for="interval">Update Inverval (ms):</label><input type="text" name="interval" id="interval" value="500" />
        <label for="npoints">Number Points:</label><input type="text" name="npoints" id="npoints" value="25" />
        <label for="maxIterations">Iterations:</label><input type="text" name="maxIterations" id="maxIterations" value="200" /><br />
        <input type="button" id="update_btn" onclick="javascript:void(0);" value="Start updating graph" />
        <input type="button" id="stop_btn" onclick="javascript:void(0);" value="Stop" />
<?php
    
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
    function BuildDataArray() {         
            $Graph;
            $GraphUpdate;
            $interval = 500;
            $npoints = 25;
            $maxIterations = 200;
            $niters = 0;
            $GraphData = array();
            $x=0; 
            $y= rand(10,100)*10;
            
            for($i = 0; $i < $npoints; $i++) {
                $x += rand(10,100) * 5;
                $y += (rand(10,100) - 0.5) * 10;
                $GraphData[$i] = array($x,$y);
            }
            
            return $GraphData;
    }
         
    $GraphData = BuildDataArray();  
    
    $pc = new C_PhpChartX(array($GraphData),'Graph');
    $pc->add_plugins(array('canvasTextRenderer','canvasAxisTickRenderer','canvasAxisLabelRenderer','highlighter','canvasOverlay','cursor','pointLabels'),true);

    $pc->set_title(array('text'=>'Test Data Run'));    
    $pc->set_cursor(array('show'=>false));
    $pc->set_point_labels(array('show'=>false));
    $pc->set_highlighter(array('show'=>false));

    $pc->set_axes_default(array(
        'pad'=>0.05,
        'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
        'tickRenderer'=>'plugin::CanvasAxisTickRenderer',
        'labelOptions'=>array('fontSize'=>'13pt')
    ));
    $pc->set_axes(array(
    		'xaxis'=> array('label'=> 'Number'),
    		'yaxis'=> array('label'=>'Value')
    	));
    
	// should be the last method to call
    $pc->draw(800,500);       
   
    ?>

	<script type="text/javascript" lang="javascript">
	     var Graph;
         var GraphUpdate;
         var GraphData = [];
         var interval = 500;
         var npoints = 25;
         var maxIterations = 200;
         var niters = 0;         
        
         function BuildDataArray() {
         
            GraphData = [];
            var x=0, y=Math.random()*10;

             for(var i = 0; i < npoints; i++) {
                x += Math.random() * 5;
                y += (Math.random() - 0.5) * 10;
                 GraphData[i] = [x,y];
             }
         }
        
         function UpdateGraph() {
             StopGraphLoop();
             interval = parseInt($('#interval').val());
             npoints = parseInt($('#npoints').val());
             maxIterations = parseInt($('#maxIterations').val());
             niters = 0;
             GraphUpdate = setInterval(runUpdate, interval);
         }
         
         
         function runUpdate() {
             if (niters < maxIterations) {
                 BuildDataArray();
                 Graph.series[0].data = GraphData;
                 Graph.replot({resetAxes:true});
                 niters++;
             }
             else {
                 StopGraphLoop();
             }
         }

         function StopGraphLoop() {
             clearInterval(GraphUpdate);
         }
         
         $('#update_btn').click(function (){
            UpdateGraph();
         });
         
         $('#stop_btn').click(function (){
            StopGraphLoop();
         });
		 </script>
    </body>
</html>