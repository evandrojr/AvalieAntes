<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
<style type="text/css">
    div.plot {
        margin-bottom: 70px;
        margin-left: 20px;
    }
    
    p {
        margin: 2em 0;
    }
    
    .jqplot-target {
        border: 1px solid #cccccc;
    }
</style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $s1 = array(1,6,9,8);
    $s2 = array(4,3,1,2);
    $s3 = array(6,2,4,1);
    $s4 = array(1,2,3,4);
    $s5 = array(4,3,2,1);
    $s6 = array(8,2,6,3);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart1');
    
    $pc->set_stack_series(true);
    $pc->set_series_default(array('fill'=>true,'showMarker'=>false));
    $pc->set_animate(true);

    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'showLabels'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberRows'=>1),
        'placement'=>'outsideGrid',
        'location'=>'s'
    ));
    
    $pc->set_axes(array(
        'xaxis' => array('pad'=>0),
        'yaxis' => array('min'=>0,'max'=>35)
    ));
    $pc->draw(500,300);

/*    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart2');
    
	$pc->set_animate(true);
	$pc->set_stack_series(true);
    $pc->set_title(array('text'=>'Precipitation Potential'));
    $pc->set_series_default(array('renderer'=>'plugin::BarRenderer'));
    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'showLabels'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberColumns'=>1,'seriesToggle'=>900,'disableIEFading'=>false),
        'placement'=>'outside',
        'marginLeft'=>'25px',
        'marginTop'=>'0px'
    ));
    
    $pc->set_axes(array(
        'xaxis' => array('renderer'=>'plugin::CategoryAxisRenderer'),
        'yaxis' => array('min'=>0,'max'=>35)
    ));
    $pc->draw(500,300);    
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2b Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart3');
	   
	$pc->set_animate(true);
	$pc->set_stack_series(true);
    $pc->set_series_default(array('fill'=>false,'showMarker'=>false));
    $pc->add_series(array('yaxis'=>'y2axis'));
    $pc->add_series(array('yaxis'=>'y3axis'));
   
    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'showLabels'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberColumns'=>1),
        'placement'=>'outsideGrid',
        'shrinkGrid'=>true,
        'location'=>'e',
        'marginLeft'=>'0px'
    ));
    
    $pc->set_axes(array(
        'xaxis' => array('pad'=>0),
        'yaxis' => array('autoscale'=>true),
        'y2axis' => array('autoscale'=>true),
        'y3axis' => array('autoscale'=>true)
    ));
    $pc->draw(500,300);    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 4 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart4');
    
    $pc->set_animate(true);
	$pc->set_title(array('text'=>'Progressive Projection'));
    $pc->set_stack_series(true);
    $pc->set_series_default(array('fill'=>true,'showMarker'=>false));
    $pc->add_series(array('xaxis'=>'x2axis'));
   
    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberRows'=>1),
        'placement'=>'outsideGrid',
        'location'=>'s'
     ));
    
    $pc->set_axes(array(
        'xaxis' => array('pad'=>0, 'label'=>'Dilution Count'),
        'x2axis' => array('pad'=>0),
        'yaxis' => array('min'=>0,'max'=>35)
    ));
    $pc->draw(500,300);    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 5 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart5');
    
	$pc->set_animate(true);
	$pc->set_title(array('text'=>'Progressive Projection'));
    $pc->set_stack_series(true);
    $pc->set_series_default(array('fill'=>true,'showMarker'=>false));
    $pc->add_series(array('xaxis'=>'x2axis'));
   
    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberRows'=>1),
        'placement'=>'outsideGrid',
        'location'=>'n'
     ));
    
    $pc->set_axes(array(
        'xaxis' => array('pad'=>0, 'label'=>'Dilution Count'),
        'x2axis' => array('pad'=>0),
        'yaxis' => array('min'=>0,'max'=>35)
    ));
    $pc->draw(500,300);    
    
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 6 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1,$s2,$s3,$s4,$s5,$s6),'chart6');
    
	$pc->set_animate(true);
	$pc->set_title(array('text'=>'Progressive Projection'));
    $pc->set_stack_series(true);
    $pc->set_series_default(array('fill'=>true,'showMarker'=>false));
    $pc->add_series(array('xaxis'=>'x2axis'));
   
    $pc->set_legend(array(
        'renderer'=>'plugin::EnhancedLegendRenderer',
        'show'=>true,
        'labels'=>array('Fog', 'Rain', 'Frost', 'Sleet', 'Hail', 'Snow'),
        'rendererOptions'=>array('numberRows'=>1),
        'placement'=>'outside',
        'location'=>'n'
     ));
    
    $pc->set_axes(array(
        'xaxis' => array('pad'=>0, 'label'=>'Dilution Count'),
        'x2axis' => array('pad'=>0),
        'yaxis' => array('min'=>0,'max'=>35)
    ));
    $pc->draw(500,300);    
*/
    ?>

    </body>
</html>