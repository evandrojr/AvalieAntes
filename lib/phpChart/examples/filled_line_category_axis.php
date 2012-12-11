<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css" media="screen">
            .jqplot-axis {
              font-size: 0.85em;
            }
        </style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $line1 = array(4, 2, 9, 16);
    $line2 = array(3, 7, 6, 3);
    $line3 = array(5, 1, 5, 4);
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($line1,$line2,$line3),'chart');
    
    $pc->set_stack_series(true);
    $pc->set_legend(array('show'=>true,'location'=>'nw'));
    $pc->set_title(array('text'=>'Acme Company Unit Sales'));
    $pc->set_series_default(array('fill'=>true,'showMarker'=>false));
    $pc->set_axes(array(
        'xaxis'=>array('renderer'=>'plugin::CategoryAxisRenderer','ticks'=>array('a', 'b', 'c', 'd'),'tickOptions'=>array('formatString'=>'%s')),
        'yaxis'=>array('min'=>0,'max'=>30)
    ));
        
    $pc->add_series(array('label'=>'Traps Division'));
    $pc->add_series(array('label'=>'Decoy Division','fill'=>true));
    $pc->add_series(array('label'=>'Harmony Division'));
    
    $pc->draw(400,300);
    ?>

    </body>
</html>