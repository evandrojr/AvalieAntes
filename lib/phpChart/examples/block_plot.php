<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script language="javascript" type="text/javascript">
			 function move(dir, val) {
				 val = parseFloat(val);
				 var sidx = parseInt($('#seriesId').val());
				 var pidx = parseInt($('#pointId').val());
				 var duration = $('#duration').val();
				 var x = plot1.series[sidx].data[pidx][0];
				 var y = plot1.series[sidx].data[pidx][1];
				 (dir == 'x') ? x += val : y += val;
				 plot1.series[sidx].moveBlock(pidx, x, y, duration);
			 }
		</script>
	</head>
	<body>
		<div><span> </span><span id="info1b"></span></div>

<?php
	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Chart 1 Example
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$s1 = array(array(0.9, 120, 'Vernors'), array(1.8, 140, 'Fanta'), array(3.2, 90, 'Barqs', array('background'=>'#ddbb33')), array(4.1, 140, 'Arizon Iced Tea'), array(4.5, 91, 'Red Bull'), array(6.8, 17, 'Go Girl'));
	$s2 = array(array(1.3, 44, 'Pepsi'), array(2.1, 170, 'Sierra Mist'), array(2.6, 66, 'Moutain Dew'), array(4, 52, 'Sobe'), array(5.4, 16, 'Amp'), array(6, 48, 'Aquafina'));
	$s3 = array(array(1, 59, 'Coca-Cola', array('background'=>'rgb(250, 160, 160)')), array(2, 50, 'Ambasa'), array(3, 90, 'Mello Yello'), array(4, 90, 'Sprite'), array(5, 71, 'Squirt'), array(5, 155, 'Youki'));

	$pc = new C_PhpChartX(array($s1,$s2,$s3),'plot1');
	
	$pc->add_plugins(array('blockRenderer','enhancedLegendRenderer','pointLabels'));
	
	$pc->set_series_default(array('renderer'=>'plugin::BlockRenderer'));
	$pc->set_legend(array('show'=>true,'renderer'=>'plugin::EnhancedLegendRenderer'));

	$pc->add_series(array('rendererOptions'=>array()));
	$pc->add_series(array('rendererOptions'=>array('css'=>array('background'=>'#A1EED6'))));
	$pc->add_series(array('rendererOptions'=>array('css'=>array('background'=>'#D3E4A0'))));

	$pc->set_axes(array(
		 'xaxis'=>array('min'=>0,'max'=>8),
		 'yaxis'=>array('min'=>0,'max'=>200)
	));

	$pc->draw(500,300);
?>
<p>Blocks can be moved by selecting the series, the point, and an optional duration parameter.  If specified, duration will animate the movement.  Duration is either a number in milliseconds, or the keywords 'fast' or 'slow'.  Higher numbers will cause a slower animation.</p>
	Series: <select id="seriesId">
		<option value="0" selected>First</option>
		<option value="1">Second</option>
		<option value="2">Third</option>
	</select>
	Point: <select id="pointId">
		<option value="0" selected>first</option>
		<option value="1">second</option>
		<option value="2">third</option>
		<option value="3">fourth</option>
		<option value="4">fifth</option>
		<option value="5">six</option>
	</select>
	Duration: <select id="duration">
		<option value="" selected>None</option>
		<option value="150">100</option>
		<option value="fast">fast</option>
		<option value="300">300</option>
		<option value="300">400</option>
		<option value="300">500</option>
		<option value="slow">slow</option>
		<option value="900">700</option>
		<option value="900">800</option>
		<option value="900">900</option>
	</select>
	X: <button id="mxval" type="button" value="-0.5" onclick="move('x', -1);">-1</button> <button id="pxval" type="button" value="-0.5" onclick="move('x', 0.5);">0.5</button>
	Y: <button id="myval" type="button" name="myval" value="-10" onclick="move('y', -30);">-30</button> <button id="pyval" type="button" name="pyval" value="10" onclick="move('y', 15);">15</button>
	<br /> <br />
<?php
/*
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Chart 2 Example
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$s1 = array(array(0.9, 120, 'Vernors'), array(1.8, 140, 'Fanta'), array(3.2, 90, 'Barqs'), array(4.1, 140, 'Arizon Iced Tea'), array(4.5, 91, 'Red Bull'), array(6.8, 17, 'Go Girl'));
	$s2 = array(array(1.3, 44, 'Pepsi'), array(2.1, 170, 'Sierra Mist'), array(2.6, 66, 'Moutain Dew'), array(4, 52, 'Sobe'), array(5.4, 16, 'Amp'), array(6, 48, 'Aquafina'));
	$s3 = array(array(1, 59, 'Coca-Cola'), array(2, 50, 'Sprite'), array(3, 90, 'Mello Yello'), array(4, 90, 'Ambasa'), array(5, 71, 'Squirt'), array(5, 155, 'Youki'));

	$pc = new C_PhpChartX(array($s1,$s2,$s3),'chart2');
	
	$pc->add_plugins(array('blockRenderer','enhancedLegendRenderer','pointLabels'));
	
	$pc->set_series_default(array('renderer'=>'plugin::BlockRenderer','rendererOptions'=>array('varyBlockColors'=>true),'pointLabels'=>array('show'=>true)));
	$pc->set_legend(array('show'=>true,'renderer'=>'plugin::EnhancedLegendRenderer','showSwatches'=>false));

	$pc->add_series(array('label'=>'Independent Brands'));
	$pc->add_series(array('label'=>'Pepsi Brands'));
	$pc->add_series(array('label'=>'Coke Brands'));

	$pc->set_axes(array(
		 'xaxis'=>array('min'=>0,'max'=>8),
		 'yaxis'=>array('min'=>0,'max'=>200)
	));

	$pc->draw(550,300);
*/
 ?>

	</body>
</html>