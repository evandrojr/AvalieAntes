<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Axis Label Chart</title>
</head>
	<body>

<?php
	$l1 = array(array(2011,1200),array(2039,1200));
	$l2 = array(array(2011,0),array(2039,800));
	$l3 = array(array(2011,0),array(2039,400));

	$pc = new C_PhpChartX(array($l1,$l2,$l3),'area_1');
	
	
	$pc->add_plugins(array('canvasTextRenderer'));

	//set jqplot default options
	$pc->set_defaults(array(
		'seriesDefaults'=>array('fill'=>true,'fillToZero'=>true,'fillToValue'=>100,'yaxis'=>'y2axis'),
		'axesDefaults'=>array('showTickMarks'=>false,'tickOptions'=>array('formatString'=>'%d')),
		'stackSeries'=>true));

	//set grid properties
	$pc->set_grid(array(
		'background'=>'#ffffff', 
		'borderWidth'=>0, 
		'borderColor'=>'#ffffff', 
		'shadow'=>true, 
		'shadowWidth'=>10, 
		'shadowOffset'=>3, 
		'shadowDepth'=>3, 
		'shadowColor'=>'rgba(230, 230, 230, 0.07)'
	));

	//set legend properties
	$pc->set_legend(array(
		'renderer' => 'plugin::EnhancedLegendRenderer',
		'show' => true,
		'location' => 's',
		'placement' => 'outside',
		'yoffset' => 30,
		'rendererOptions' => array('numberRows'=>2),
		'labels'=>array('oil', 'renewables','wind and water')   
	));

	//set axes
	$pc->set_xaxes(array(
			'xaxis'  => array(
				'borderWidth'=>2,
				'borderColor'=>'#999999', 
				'ticks'=>array(2010,2040), 
				'tickOptions'=>array('showGridline'=>false)),
			'x2axis'  => array(
				'borderWidth'=>0,
				'borderColor'=>'#ffffff')
		 ));

	$pc->set_yaxes(array(
			'y2axis' => array(
				'borderWidth'=>0,
				'borderColor'=>'#ffffff', 
				'autoscale'=>true, 
				'min'=>'0', 
				'max'=>3000, 
				'numberTicks'=>4,
				'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
				'label'=>'energy use'),
			'yaxis'  => array(
				'borderWidth'=>2,
				'borderColor'=>'#999999')
		 ));


	//add custom JS
	$pc->add_custom_js("
		var r = area_1._width - area_1._gridPadding.left - 5; 
		r = r+'px'; 
		$('.jqplot-y2axis-label').css({top:'10px', right:r});",
		
		"after");

	$pc->draw();

?>

	</body>
</html>
