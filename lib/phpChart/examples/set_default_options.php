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
$pc = new C_PhpChartX(array(array(11, 9, 5, 12, 14),array(1, 4, 3, 2, 5)),'basic_chart');
$pc->set_animate(true);
$pc->set_title(array('text'=>'Basic Chart with Bar Renderer'));

// $pc->set_series_default(array('renderer'=>'plugin::BarRenderer'));
$pc->set_defaults(array(
	'seriesDefaults'=>array('renderer'=>'plugin::BarRenderer','rendererOptions'=> array('barPadding'=>6,'barMargin'=>40)),
	'axesDefaults'=>array('showTickMarks'=>true,'tickOptions'=>array('formatString'=>'%d')),
	'stackSeries'=>true));
$pc->add_plugins(array('highlighter', 'cursor'));
$pc->draw();
?>

</body>
</html>