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
$pc = new C_PhpChartX(array(array(11, 9, 5, 12, 14)),'basic_chart');
$pc->set_animate(true);
$pc->set_title(array('text'=>'Basic Chart with Donut Renderer'));

$pc->set_series_default(array(
	'renderer'=>'plugin::DonutRenderer',
	'rendererOptions'=>array('sliceMargin'=>2,'innerDiameter'=>110,'startAngle'=>-90,'highlightMouseDown'=>true),
	'shadow'=>true
	));

$pc->add_plugins(array('highlighter'));
$pc->draw();
?>

</body>
</html>