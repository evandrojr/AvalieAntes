<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Axis Rotated Labels 2</title>
</head>
	<body>

<?php
	$line = array(array('Cup Holder Pinion Bob', 7), array('Generic Fog Lamp', 9), array('HDTV Receiver', 15), array('8 Track Control Module', 12), array(' Sludge Pump Fourier Modulator', 3),array('Transcender/Spice Rack', 6), array('Hair Spray Danger Indicator', 18));
	$line2 = array(array('Nickle', 28), array('Aluminum', 13), array('Xenon', 54), array('Silver', 47), array('Sulfer', 16), array('Silicon', 14), array('Vanadium', 23));

	$pc = new C_PhpChartX(array($line),'chart_1');
	$pc->add_plugins(array('canvasTextRenderer'));

	//set animation
	$pc->set_animate(true);
	//set title
	$pc->set_title(array('text'=>'Concern vs. Occurrance'));

	//set series
	$pc->add_series(array('renderer'=>'plugin::BarRenderer'));
	//set axes
	$pc->set_axes(array(
			'xaxis'  => array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'label'=>'Warranty Concern',
				'tickOptions'=>array(
					'enableFontSupport'=>true,'angle'=>-30),
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
			'yaxis'  => array(
				'autoscale'=>true,
				'label'=>'Occurance',
				'tickOptions'=>array('enableFontSupport'=>true,'angle'=>-30),
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')
		 ));

	$pc->draw(800,500);
	echo '<br />';
	echo '<br />';
	echo '<br />';
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$line = array(array('Cup Holder Pinion Bob', 7), array('Generic Fog Lamp', 9), array('HDTV Receiver', 15), array('8 Track Control Module', 12), array(' Sludge Pump Fourier Modulator', 3),array('Transcender/Spice Rack', 6), array('Hair Spray Danger Indicator', 18));
	$line2 = array(array('Nickle', 28), array('Aluminum', 13), array('Xenon', 54), array('Silver', 47), array('Sulfer', 16), array('Silicon', 14), array('Vanadium', 23));

	$pc = new C_PhpChartX(array($line,$line2),'chart_2');
	$pc->add_plugins(array('canvasTextRenderer'));

	//set animation
	$pc->set_animate();

	//set series
	$pc->add_series(array('renderer'=>'plugin::BarRenderer'));
	$pc->add_series(array('xaxis'=>'x2axis','yaxis'=>'y2axis'));

	//set axes
	$pc->set_axes(array(
			'xaxis'  => array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'label'=>'Warranty Concern',
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickOptions'=>array('angle'=>30),
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
			'x2axis'  => array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'label'=>'Metal',
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickOptions'=>array('angle'=>30),
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
			'yaxis'  => array(
				'autoscale'=>true,
				'label'=>'Occurance',
				'tickOptions'=>array('angle'=>30),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
			'y2axis'  => array(
				'autoscale'=>true,
				'label'=>'Number',
				'tickOptions'=>array('angle'=>30),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')
		 ));


	$pc->draw(800,600);

	echo '<br />';
	echo '<br />';
	echo '<br />';

/*
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	$pc = new C_PhpChartX(array($line),'chart_3');
	$pc->add_plugins(array('canvasTextRenderer'));

	//set animation
	$pc->set_animate();

	//set title
	$pc->set_title(array('text'=>'Concern vs. Occurrance'));

	//set series
	$pc->add_series(array('renderer'=>'plugin::BarRenderer'));

	//set axes
	$pc->set_axes(array(
			'xaxis'  => array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'label'=>'Warranty Concern',
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickOptions'=>array('angle'=>30,'labelPosition'=>'middle'),
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
			'yaxis'  => array(
				'autoscale'=>true,
				'label'=>'Occurance',
				'tickOptions'=>array('angle'=>30,'labelPosition'=>'middle'),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')
		 ));
	
	$pc->draw(800,500);
*/
?>

	</body>
</html>
