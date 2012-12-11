<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart with Bar Renderer</title>
</head>
<body>
	
<?php
$s1 = array(11, 9, 5, 12, 14);
$s2 = array(6, 8, 7, 13, 9);

$pc = new C_PhpChartX(array($s1, $s2),'basic_chart');
$pc->set_animate(true);
$pc->set_title(array('text'=>'Set X Y Axes'));

$pc->set_series_default(array(
	'renderer'=>'plugin::BarRenderer',
	'rendererOptions'=>array('sliceMargin'=>2,'innerDiameter'=>110,'startAngle'=>-90,'highlightMouseDown'=>true),
	'shadow'=>true
	));

$pc->add_plugins(array('highlighter', 'canvasTextRenderer'));

//set phpChart grid properties
$pc->set_grid(array(
	'background'=>'lightyellow', 
	'borderWidth'=>0, 
	'borderColor'=>'#000000', 
	'shadow'=>true, 
	'shadowWidth'=>10, 
	'shadowOffset'=>3, 
	'shadowDepth'=>3, 
	'shadowColor'=>'rgba(230, 230, 230, 0.07)'
	));

//set axes
$pc->set_axes(array(
	'xaxis'=>array('rendnerer'=>'plugin::CategoryAxisRenderer'),
	'yaxis'=>array('padMax'=>2.0)));
//set axes
$pc->set_xaxes(array(
	'xaxis'  => array(
		'borderWidth'=>2,
		'borderColor'=>'#999999', 
		'tickOptions'=>array('showGridline'=>false))
	));

$pc->set_yaxes(array(
	'yaxis' => array(
		'borderWidth'=>0,
		'borderColor'=>'#ffffff', 
		'autoscale'=>true, 
		'min'=>'0', 
		'max'=>20, 
		'numberTicks'=>21,
		'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
		'label'=>'Energy Use')
	));
$pc->draw();
?>

</body>
</html>