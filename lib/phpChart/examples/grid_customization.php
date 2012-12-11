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
            .jqplot-title {
              font-size: 1.1em;
            }
          </style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    
    $l1 = array(array(1,2), array(4,5), array(8,9), array(15,16), array(18,40));
    $l2 = array(array(2,1), array(5,4), array(12,7), array(16,12), array(19,29));


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($l1,$l2),'chart');

	$pc->set_animate(true);
    $pc->set_title(array('text'=>'Plot with Grid Customization'));
    $pc->set_axes(array(
        'xaxis'=>array('tickInterval'=>2,'min'=>0),
        'yaxis'=>array('renderer'=>'plugin::LogAxisRenderer')
    ));
    $pc->set_grid(array('background'=>'rgba(0,0,0,0)','gridLineColor'=>'#accf9b','borderWidth'=>2.5));
    $pc->draw(360,300);
    ?>

    </body>
</html>