<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Multiple Axes with Rotated Text</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $line1 = array(array('Cup Holder Pinion Bob', 7), array('Generic Fog Lamp', 9), array('HDTV Receiver', 15), 
            array('8 Track Control Module', 12), array(' Sludge Pump Fourier Modulator', 3), 
            array('Transcender/Spice Rack', 6), array('Hair Spray Danger Indicator', 18));

    $line2 = array(array('Nickle', 28), array('Aluminum', 13), array('Xenon', 54), array('Silver', 47), 
            array('Sulfer', 16), array('Silicon', 14), array('Vanadium', 23));

    $pc = new C_PhpChartX(array($line1,$line2),'chart2');
    $pc->add_plugins(array('canvasTextRenderer'),true);

    $pc->add_series(array('renderer'=>'plugin::BarRenderer'));
    $pc->add_series(array('xaxis'=>'x2axis','yaxis'=>'y2axis'));
    
    $pc->set_axes_default(array(
			'tickRenderer'=>'plugin::CanvasAxisTickRenderer',
			'tickOptions'=>array('angle'=>30)));
    
    $pc->set_axes(array(
        'xaxis'=>array('renderer'=>'plugin::CategoryAxisRenderer'),
        'x2axis'=>array('renderer'=>'plugin::CategoryAxisRenderer'),
        'yaxis'=>array('autoscale'=>true),
        'y2axis'=>array('autoscale'=>true)
    ));
    
	$pc->set_animate(true);
    $pc->draw(800,500);    
    ?>

    </body>
</html>