<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>phpChart - Meter Gauge</title>
 <style type="text/css">

.plot {
    margin-bottom: 30px;
    margin-left: auto;
    margin-right: auto;
}

#chart0 .jqplot-meterGauge-label {
    font-size: 10pt;
}

#chart1 .jqplot-meterGauge-tick {
    font-size: 6pt;
}

#chart2 .jqplot-meterGauge-tick {
    font-size: 8pt;
}

#chart3 .jqplot-meterGauge-tick, #chart0 .jqplot-meterGauge-tic {
    font-size: 10pt;
}

#chart4 .jqplot-meterGauge-tick, #chart4 .jqplot-meterGauge-label {
    font-size: 12pt;
}
</style>

    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 5 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $s1 = array(0);
    
    $pc = new C_PhpChartX(array($s1),'chart5');
    $pc->set_title(array('text'=>'This is a rather Long Title For a Meter Test'));

    $pc->set_series_default(array(
		'renderer'=>'plugin::MeterGaugeRenderer',
        'rendererOptions'=>array(
			'label'=>'Line Chart',
			'labelPosition'=>'bottom',
			'intervals'=>array(10000, 40000, 50000),
			'ticks'=>array(0, 10000, 20000, 30000, 40000, 50000),
			'intervalColors'=>array('#cc6666', '#E7E658', '#66cc66'))));

    $pc->draw(600,300);    
    
    ?>

    </body>
</html>