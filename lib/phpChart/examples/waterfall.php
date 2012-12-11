<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Waterfall Chart</title>
    </head>
    <body>
<?php


$line1 = array(14, 3, 4, -3, 5, 2, -3, -7);
$ticks = array('2008', 'Apricots', 'Tomatoes', 'Potatoes', 'Rhubarb', 'Squash', 'Grapes', 'Peanuts', '2009');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Waterfall 1 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pc = new C_PhpChartX(array($line1),'chart1');
// $pc->add_plugins(array('barRenderer', 'categoryAxisRenderer', 'canvasAxisTickRenderer'));
$pc->add_plugins(array('logAxisRenderer','canvasTextRenderer','canvasAxisLabelRenderer','canvasAxisTickRenderer','dateAxisRenderer','categoryAxisRenderer','barRenderer'));

$pc->set_title(array('text' => 'Crop Yield Charge, 2008 to 2009'));
$pc->set_series_default(array(
	'renderer'=>'plugin::BarRenderer',
	'rendererOptions'=>array(
				'waterfall'=>true,
				'varyBarColor'=>true),
	'pointLabels'=>array('hideZeros'=>true),
	'yaxis'=>'y2axis'));		
$pc->set_xaxes(array(
	'xaxis'=>array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'ticks'=>$ticks,
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer',
				'tickOptions'=>array(
					'angle'=> -90,
					'fontSize'=>'10pt',
					'showMark' => false,
					'showGridline' => false))));
$pc->set_yaxes(array(
	'y2axis'=>array(
				'tickInterval' => 5, 'min' => 0.1)));

$pc->draw(350,350);

/*
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Waterfall 2 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pc = new C_PhpChartX(array($line1),'chart2');
$pc->add_plugins(array('logAxisRenderer','canvasTextRenderer','canvasAxisLabelRenderer','canvasAxisTickRenderer','dateAxisRenderer','categoryAxisRenderer','barRenderer'));

$pc->set_title(array('text' => 'Crop Yield Charge, 2008 to 2009'));
$pc->set_series_color(array('#333333', '#999999', '#3EA140', '#3EA140', '#3EA140', '#783F16', '#783F16', '#783F16', '#333333'));
$pc->set_series_default(array(
	'renderer'=>'plugin::BarRenderer',
	'rendererOptions'=>array(
				'waterfall'=>true,
				'varyBarColor'=>true),
			'pointLabels'=>array('hideZeros'=>true),
			'yaxis'=>'y2axis'));

$pc->set_xaxes(array(
	'xaxis'=>array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'ticks'=>$ticks,
				'tickRenderer'=>'plugin::CanvasAxisTickRenderer',
				'tickOptions'=>array(
					'angle'=> -90,
					'fontSize'=>'10pt',
					'showMark' => false,
					'showGridline' => false))));
$pc->set_yaxes(array(
	'y2axis'=>array(
				'tickInterval' => 5, 'min' => 0.1)));

$pc->draw(350,350);
*/
?>

    </body>
</html>