<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Area</title>
</head>
	<body>
		<div><span>Moused Over: </span><span id="info1b">Nothing</span></div>

<?php
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//example area 1
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$l2 = array(11, 9, 5, 12, 14);
	$l3 = array(4, 8, 5, 3, 6);
	$l4 = array(12, 6, 13, 11, 2);

	$pc = new C_PhpChartX(array($l2,$l3,$l4),'area_1');
	//set jqplot default options
	$pc->set_defaults(array(
			'seriesDefaults'=>array('fill'=>true),
			'showMarker'=>true,
			'stackSeries'=>true));
	
	$pc->set_xaxes(array(
			'xaxis'=>array(
				'renderer'=>'plugin::CategoryAxisRenderer',
				'ticks'=>array('Mon', 'Tue', 'Wed', 'Thr', 'Fri'))
		 ));

	//Binding JavaScript 
	$pc->bind_js('jqplotDataHighlight',array('series'=>'seriesIndex','point'=>'pointIndex','data'=>'data'));
	$pc->bind_js('jqplotDataUnhighlight',array('Nothing'));
	
	$pc->draw(400,260);
?>

	</body>
</html>
