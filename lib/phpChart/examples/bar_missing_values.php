<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Bar Missing Value</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Plot 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $line1 = array(array(2006, 4),            array(2008, 9), array(2009, 16));
    $line2 = array(array(2006, 3), array(2007, 7), array(2008, 6));
    $line3 = array(array(2006, 5), array(2007, 1), array(2008, 3), array(2009, 7));
    $line4 = array(array(2006, 2), array(2007, 5), array(2008, 4), array(2009, 9));

    $pc = new C_PhpChartX(array($line1,$line2,$line3,$line4),'plot1');   
    $pc->set_series_default(array(
		'renderer'=>'plugin::BarRenderer',
		'rendererOptions'=> array('barPadding'=>10,'barMargin'=>10)));
    $pc->set_legend(array('show'=>true, 'location'=>'nw'));
	$pc->set_axes(array(
         'xaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer', 
			'rendererOptions'=>array('sortMergedLabels'=>true)),
         'yaxis'=>array(
			'min'=>0, 
			'max'=>20,
			'numberTicks'=>6),
    ));

    $pc->draw(600,310);

/*
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Plot 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $s1 = array(4, 3, 9, 16, 12, 8);
    $s2 = array(null, null, null, 3, 7, 6);
    $ticks = array(2006, 2007, 2008, 2009, 2010, 2011);

    $pc = new C_PhpChartX(array($s1,$s2),'plot2');   
    $pc->set_series_default(array());
    $pc->set_legend(array('show'=>true, 'location'=>'nw'));

    $pc->set_axes(array(
         'xaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer', 
			'ticks'=>$ticks),
         'yaxis'=>array(
			'min'=>0, 
			'max'=>20,
			'numberTicks'=>6),
    ));

    $pc->draw(600,310);
*/
?>

    </body>
</html>