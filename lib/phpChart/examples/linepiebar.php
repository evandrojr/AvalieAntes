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
   
</style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $linedata = array();
    $start = 1301630400000;
    for ($i=0; $i< 30; $i++) {
        array_push($linedata, array($start + $i*1000*60*60*24, (rand(10,90)-0.4)*(30+$i) + 100));
        //$linedata.push(array(start + i*1000*60*60*24, (Math.random() - 0.4)*(30+i) + 100));
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($linedata),'chart1');
    $pc->add_plugins(array('canvasTextRenderer','highlighter','cursor','pointLabels'));
    
    $pc->set_stack_series(true);
    $pc->set_title(array('text'=>'Unique Visitors by Day'));
    $pc->set_cursor(array('show'=>true));
    $pc->set_highlighter(array('show'=>true));
    
    $pc->set_series_default(array('pointLabels'=>array('show'=>true)));
    $pc->set_axes_default(array(
		'labelRenderer'=>'plugin::CanvasAxisLabelRenderer',
		'labelOptions'=>array('fontSize'=>'13pt')));
    
    
    $pc->set_axes(array(
        'xaxis' => array(
			'label'=>'Date',
			'renderer'=>'plugin::DateAxisRenderer',
			'min'=>'03/30/2011 00:00:00',
			'tickInterval'=>'3 days',
			'tickOptions'=>array('formatString'=>'%b %#d')),
        'yaxis' => array('label'=>'Unique Visitors')
    ));
    $pc->draw(600,300);

/*

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $piedata = array(array('FireFox', 3783), array('IE 9', 856), array('IE other', 1635), array('Chrome', 2321), array('Safari', 456), array('Opera', 321));

    $pc = new C_PhpChartX(array($piedata),'chart2');
    $pc->add_plugins(array('canvasTextRenderer','highlighter','canvasOverlay','cursor','pointLabels'));

    $pc->set_title(array('text'=>'Browser Statistics'));
    $pc->add_series(array(
				'renderer'=>'plugin::PieRenderer',
                'rendererOptions'=>array(
					'sliceMargin'=>3,
					'showDataLabels'=>true,
					'dataLabelNudge'=>20)        
        ));
    $pc->set_legend(array('show'=>true));
    $pc->draw(600,300);
    
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 3 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function mr($a, $b=0) {
        $b = $b || 5;
        return $a + (rand()- 0.5) * $b;
    }    
    $b1 = array(mr(20,10), mr(14,12), mr(28,20), mr(36,20), mr(9,18));
    $b2 = array(mr(8), mr(12), mr(16), mr(9), mr(14));
    $b3 = array(mr(21,40), mr(31,30), mr(19), mr(7,1), mr(22,22));
    $bardata = array(array(23, 14, 28, 36, 9), array(8, 12, 16, 9, 14), array(21, 31, 19, 7, 22));
    $ticks = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
            
    $pc = new C_PhpChartX(array($b1,$b2,$b3),'chart3');
    $pc->add_plugins(array('canvasTextRenderer','highlighter','canvasOverlay','cursor','pointLabels'));

    $pc->set_title(array('text'=>'Breakfast Bar Summary'));
    
    $pc->set_series_default(array(
			'renderer'=>'plugin::BarRenderer',
			'pointLabels'=>array('show'=>true)));
    $pc->add_series(array('label'=>'Toast with Jam'));
    $pc->add_series(array('label'=>'Toast with Peanut Butter'));
    $pc->add_series(array('label'=>'Dry Cereal'));
    $pc->set_axes(array(
		'xaxis' => array('renderer'=>'plugin::CategoryAxisRenderer','ticks'=>$ticks),
        'yaxis' => array('label'=>'Number of Servings')
    ));
    $pc->set_legend(array('show'=>true,'placement'=>'outside'));
    $pc->draw(600,300);

*/ 
    ?>

    </body>
</html>