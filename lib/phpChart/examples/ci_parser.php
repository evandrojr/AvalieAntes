<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
            div.jqplot-target {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Line 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $jsonstr = '{"PriceTicks": [{"Price":5.5,"TickDate":"\/Date(1283745600000)\/"}, \
            {"Price":6.8,"TickDate":"\/Date(1283832000000)\/"}, \
            {"Price":7.1,"TickDate":"\/Date(1283918400000)\/"}], \
        "PriceBars": [{"BarDate":"\/Date(1283745600000)\/","Close":10.0,"High":15.0,"Low":8.0,"Open":9.0}, \
            {"BarDate":"\/Date(1283832000000)\/","Close":10.6,"High":14.3,"Low":9.1,"Open":12.5}, \
            {"BarDate":"\/Date(1283918400000)\/","Close":12.0,"High":13.0,"Low":9.0,"Open":9.8}]}';
    
    $pc = new C_PhpChartX($jsonstr,'chart1');
    $pc->add_plugins(array('ohlcRenderer','json2','ciParser'));
    
    $pc->set_title(array('text'=>'Custom JSON Format, JSON Encoded String'));
    $pc->set_data_renderer('plugin::ciParser');

    $pc->set_axes(array(
            'xaxis'=> array(
				'renderer'=>'plugin::DateAxisRenderer',
				'tickOptions'=> array('formatString'=>'%y/%m/%d'),
				'tickInterval'=>'1 day',
				'min'=>'2010/09/05',
				'max'=>'2010/09/09')
            ));

    $pc->add_series(array());
    $pc->add_series(array(
		'renderer'=>'plugin::OHLCRenderer',
		'rendererOptions'=>array('candleStick'=>true)));
    $pc->draw(400,300);
/*
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Line 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $jsonobj = '"PriceTicks":[
            {"Price":5.5,"TickDate":"\/Date(1283745600000)\/"},
            {"Price":6.8,"TickDate":"\/Date(1283832000000)\/"},
            {"Price":7.1,"TickDate":"\/Date(1283918400000)\/"}],
        "PriceBars":[
            {"BarDate":"\/Date(1283745600000)\/","Close":10.0,"High":15.0,"Low":8.0,"Open":9.0},
            {"BarDate":"\/Date(1283832000000)\/","Close":10.6,"High":14.3,"Low":9.1,"Open":12.5},
            {"BarDate":"\/Date(1283918400000)\/","Close":12.0,"High":13.0,"Low":9.0,"Open":9.8}]';

    $pc = new C_PhpChartX($jsonstr,'chart2');
    $pc->add_plugins(array('ohlcRenderer','json2','ciParser'));
    
    $pc->set_title(array('text'=>'Custom JSON Format, JSON Object'));
    $pc->set_data_renderer('plugin::ciParser');

    $pc->set_axes(array(
            'xaxis'=> array(
				'renderer'=>'plugin::DateAxisRenderer',
				'tickOptions'=> array('formatString'=>'%y/%m/%d'),
				'tickInterval'=>'1 day',
				'min'=>'2010/09/05',
				'max'=>'2010/09/09')
            ));

    $pc->add_series(array());
    $pc->add_series(array(
		'renderer'=>'plugin::OHLCRenderer',
		'rendererOptions'=>array('candleStick'=>true)));
    $pc->draw(400,300);
*/
?>

    </body>
</html>