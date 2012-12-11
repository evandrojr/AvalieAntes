<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Axis Rotated Labels</title>
</head>
	<body>

<?php
	$line1 = array(6.5, 9.2, 14, 19.65, 26.4, 35, 51);

	$pc = new C_PhpChartX(array($line1),'chart_1');
	$pc->add_plugins(array('canvasTextRenderer'));

	//set legend
	$pc->set_legend(array('show'=>false));
	//set axes
	$pc->set_xaxes(array(
	'xaxis'  => array(
				'labelOptions'=>array('fontSize'=>'13pt'), 
				'label'=>'Core Motor Amperage',
				'tickOptions'=>array('angle'=>-30),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer')
		 ));

	$pc->set_yaxes(array(
	'yaxis'  => array('renderer'=>'plugin::LogAxisRenderer',
				'labelOptions'=>array('fontSize'=>'13pt'),
				'label'=>'Core Motor Voltage',
				'tickOptions'=>array('formatString'=>'%.2f','angle'=>-30,'labelPosition'=>'middle'),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')
		 ));

	$pc->draw(800,300);
	
	echo '<br />';
	echo '<br />';
	echo '<br />';
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$line2 = array(array('1/1/2008', 42), array('2/14/2008', 56), array('3/7/2008', 39), array('4/22/2008', 81));

	$pc = new C_PhpChartX(array($line2),'chart_2');
	$pc->add_plugins(array('canvasTextRenderer'));

	//set axes
	$pc->set_xaxes(array(
	'xaxis'  => array('renderer'=>'plugin::DateAxisRenderer',
				'labelOptions'=>array('fontSize'=>'13pt'),
				'label'=>'Incliment Occurrance',
				'tickOptions'=>array('angle'=>15),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')));
	$pc->set_yaxes(array(
	'yaxis'  => array('label'=>'Incliment Factor','labelRenderer'=>'plugin::CanvasAxisLabelRenderer')
		 ));


	$pc->draw(800,300);


/*
	echo '<br />';
	echo '<br />';
	echo '<br />';
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$line3 = array(array('Cup Holder Pinion Bob', 7), array('Generic Fog Lamp Marketing Gimmick', 9), array('HDTV Receiver', 15), array('8 Track Control Module', 12), array('SSPFM (Sealed Sludge Pump Fourier Modulator)', 3), array('Transcender/Spice Rack', 6), array('Hair Spray Rear View Mirror Danger Indicator', 18));

	$pc = new C_PhpChartX(array($line3),'chart_3');
	$pc->add_plugins(array('canvasTextRenderer'));

		//set series
	$pc->add_series(array('renderer'=>'plugin::BarRenderer'));
		//set axes
	$pc->set_xaxes(array(
	'xaxis'  => array('renderer'=>'plugin::CategoryAxisRenderer',
				'label'=>'Warranty Concern',
				'tickOptions'=>array('angle'=>-30,'fontFamily'=>'Times','fontSize'=>'12pt'),
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer')));
	
$pc->set_yaxes(array('yaxis'  => array('label'=>'Occurance','labelRenderer'=>'plugin::CanvasAxisLabelRenderer')));

	$pc->draw(800,400);
*/
?>

	</body>
</html>
