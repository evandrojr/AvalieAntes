<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Zoom</title>
	<style type="text/css">
	  .jqplot-cursor-legend {
	    width: 160px;
	    font-family: "Courier New";
	    font-size: 0.85em;
	  }
	  
	  td.jqplot-cursor-legend-swatch {
	    width: 1.3em;
	  }
	  
	  div.jqplot-cursor-legend-swatch {
/*      width: 15px;*/
	  }
	</style>
	
    </head>
    <body>
	Double click on chart to reset zoom level.
<?php


$goog = array(
	array("6/22/2009",425.32),
	array("6/8/2009",424.84),
	array("5/26/2009",417.23),
	array("5/11/2009",390),
	array("4/27/2009",393.69),
	array("4/13/2009",392.24),
	array("3/30/2009",369.78),
	array("3/16/2009",330.16),
	array("3/2/2009",308.57),
	array("2/17/2009",346.45),
	array("2/2/2009",371.28),
	array("1/20/2009",324.7),
	array("1/5/2009",315.07),
	array("12/22/2008",300.36),
	array("12/8/2008",315.76),
	array("11/24/2008",292.96),
	array("11/10/2008",310.02),
	array("10/27/2008",359.36),
	array("10/13/2008",372.54),
	array("9/29/2008",386.91),
	array("9/15/2008",449.15),
	array("9/2/2008",444.25),
	array("8/25/2008",463.29),
	array("8/11/2008",510.15),
	array("7/28/2008",467.86),
	array("7/14/2008",481.32),
	array("6/30/2008",537),
	array("6/16/2008",546.43),
	array("6/2/2008",567),
	array("5/19/2008",544.62),
	array("5/5/2008",573.2),
	array("4/21/2008",544.06),
	array("4/7/2008",457.45),
	array("3/24/2008",438.08),
	array("3/10/2008",437.92),
	array("2/25/2008",471.18),
	array("2/11/2008",529.64),
	array("1/28/2008",515.9),
	array("1/14/2008",600.25),
	array("12/31/2007",657),
	array("12/17/2007",696.69),
	array("12/3/2007",714.87),
	array("11/19/2007",676.7),
	array("11/5/2007",663.97),
	array("10/22/2007",674.6),
	array("10/8/2007",637.39),
	array("9/24/2007",567.27),
	array("9/10/2007",528.75),
	array("8/27/2007",515.25));
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Zoom 1 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pc = new C_PhpChartX(array($goog),'chart1');
// $pc->add_plugins(array('barRenderer', 'categoryAxisRenderer', 'canvasAxisTickRenderer'));
$pc->add_plugins(array('canvasTextRenderer','cursor'));

$pc->set_animate(true);

$pc->set_title(array('text' => 'Google Inc.'));
$pc->set_series_default(array('neighborThreshold'=>-1));	
$pc->set_xaxes(array(
	'xaxis'=>array(
				'renderer'=>'plugin::DateAxisRenderer',
				'min'=> 'August 1, 2007',
				'tickInterval'=>'4 months',
				'tickOptions'=>array(
					'formatString'=> '%Y/%#m/%#d'))));
$pc->set_yaxes(array(
	'y2axis'=>array(
				'renderer' => 'plugin::LogAxisRenderer',
				'tickOptions'=>array(
					'formatString'=>'$%.2f'))));

$pc->set_cursor(array(
		'show'=>true,
		'zoom'=>true));

$pc->draw(600,400);

/*
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Zoom 2 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pc = new C_PhpChartX(array($goog),'chart2');
// $pc->add_plugins(array('barRenderer', 'categoryAxisRenderer', 'canvasAxisTickRenderer'));
$pc->add_plugins(array('canvasTextRenderer','cursor'));

$pc->set_animate(true);

$pc->set_title(array('text' => 'Google Inc.'));
$pc->set_series_default(array('neighborThreshold'=>-1));	
$pc->set_xaxes(array(
	'xaxis'=>array(
				'renderer'=>'plugin::DateAxisRenderer',
				'min'=> 'August 1, 2007',
				'tickInterval'=>'4 months',
				'tickOptions'=>array(
					'formatString'=> '%Y/%#m/%#d'))));
$pc->set_yaxes(array(
	'y2axis'=>array(
				'renderer' => 'plugin::LogAxisRenderer',
				'tickOptions'=>array(
					' '=>'$%.2f'))));

$pc->set_cursor(array(
		'show'=>true,
		'zoom'=>true, 
		'looseZoom'=>true));

$pc->draw(600,400);

*/
?>

    </body>
</html>