<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Bar Test 2</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Bar 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $s1 = array(200, 600, 700, 1000);
    $s2 = array(460, -210, 690, 820);
    $s3 = array(-260, -440, 320, 200);
    $ticks = array('a', 'b', 'c', 'd');

    $pc = new C_PhpChartX(array($s1,$s2,$s3),'chart1');
    
    $pc->add_plugins(array('highlighter'));
    
    $pc->set_series_default(array('renderer'=>'plugin::BarRenderer','rendererOptions'=> array('fillToZero'=>true)));
    $pc->add_series(array('label'=>'Hotel'));
    $pc->add_series(array('label'=>'Event Regristration'));
    $pc->add_series(array('label'=>'Airfare'));
    $pc->set_legend(array('show'=>true,'placement'=>'outsideGrid'));
    $pc->set_axes(array(
         'xaxis'=>array('renderer'=>'plugin::CategoryAxisRenderer','ticks'=>$ticks),
         'yaxis'=>array('autoscale'=>true,'tickOptions'=>array('formatString'=>'$%d'))
    ));

    $pc->draw(600,300);


?>

    </body>
</html>