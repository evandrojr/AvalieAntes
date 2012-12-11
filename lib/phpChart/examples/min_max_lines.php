<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<title>phpChart - Min Max Lines</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $line1 = array(array(1,1), array(4,2), array(9,3), array(16,4)); 
    $line2 = array(array(25,1), array(12.5,2), array(6.25,3), array(3.125,4));
    $min = array(array(2, 0.6), array(2, 4.4));
    $max = array(array(15, 0.6), array(15, 4.4));
    
    $pc = new C_PhpChartX(array($line1,$line2,$min,$max),'chart1');
    $pc->set_title(array('text'=>'Horizontally Oriented Bar Chart'));
	$pc->set_animate(true);

    $pc->add_series(array(
		'label'=>'Cats',
		'renderer'=>'plugin::BarRenderer',
		'rendererOptions'=>array('barDirection'=>'horizontal','barPadding'=>6,'barMargin'=>15),
		'shadowAngle'=>135));
    $pc->add_series(array(
		'label'=>'Dogs',
		'renderer'=>'plugin::BarRenderer',
		'rendererOptions'=>array('barDirection'=>'horizontal','barPadding'=>6,'barMargin'=>15),
		'shadowAngle'=>135));
    $pc->add_series(array(
		'showMarker'=>false,
		'label'=>'min'));
    $pc->add_series(array(
		'showMarker'=>false,
		'label'=>'max'));
    
    $pc->set_legend(array('show'=>true,'location'=>'ne'));
    $pc->set_axes(array(
        'xaxis'=>array('min'=>0),
        'yaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer',
			'ticks'=>array('Once', 'Twice', 'Three Times', 'More'))
    ));
    
    $pc->draw(800,300);    
    
    ?>

    </body>
</html>