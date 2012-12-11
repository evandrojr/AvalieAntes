<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Series Canvas Reorder</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

		<button onclick="plot1.moveSeriesToFront(0);">Lions</button> 
		<button onclick="plot1.moveSeriesToFront(1);">Tigers</button> 
		<button onclick="plot1.moveSeriesToFront(2);">Bears</button> 
    
		<button onclick="plot1.restorePreviousSeriesOrder();">Last Order</button> 
		<button onclick="plot1.restoreOriginalSeriesOrder();">Original Order</button>
<?php
    
    
    $l1 = array(3, 4, 1, 4, 2);
    $l2 = array(2, 5, 1, 4, 2);
    $l3 = array(1, 6, 1, 4, 2);
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $pc = new C_PhpChartX(array($l1,$l2,$l3),'plot1');

    $pc->add_plugins(array('highlighter','enhancedLegendRenderer'),true);
    $pc->set_legend(array('show'=>true,'renderer'=>'plugin::EnhancedLegendRenderer'));
	$pc->set_animate(true);
    $pc->set_series_default(array('lineWidth'=>4));
    $pc->add_series(array('label'=>'lions'));
    $pc->add_series(array('label'=>'tigers'));
    $pc->add_series(array('label'=>'bears'));
    $pc->set_series_color(array('#cc6666', '#66cc66', '#6666cc'));
    $pc->set_highlighter(array('bringSeriesToFront'=>true));
    $pc->draw(600,400);       
    
    ?>

    </body>
</html>