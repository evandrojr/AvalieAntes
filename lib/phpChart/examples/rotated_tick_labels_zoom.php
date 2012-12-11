<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Rotate Tick Labels with Zoom</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    
    
    $line1=array(array('2008-09-30', 4), array('2008-10-30', 6.5), array('2008-11-30', 5.7), array('2008-12-30', 9), array('2009-01-30', 8.2), array('2009-02-28', 7.6), array('2009-03-30', 11.4), array('2009-04-30', 16.2), array('2009-05-30', 21.8), array('2009-06-30', 19.3), array('2009-07-30', 29.7), array('2009-08-30', 36.7), array('2009-09-30', 38.7), array('2009-10-30', 33.7), array('2009-11-30', 49.7), array('2009-12-30', 62.7));
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $pc = new C_PhpChartX(array($line1),'chart');
    $pc->add_plugins(array('canvasTextRenderer','canvasAxisTickRenderer','dateAxisRenderer','cursor'),true);
    $pc->set_title(array('text'=>'Rotated Axis Text'));
    $pc->set_axes(array(
            'xaxis'=>array(
                'renderer'=>'plugin::DateAxisRenderer', 
                'min'=>'August 30, 2008', 
                'tickInterval'=>'1 month',
                'rendererOptions'=>array('tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
                'tickOptions'=>array(
					'formatString'=>'%b %#d, %Y', 
					'fontSize'=>'10pt', 
					'fontFamily'=>'Tahoma', 
					'angle'=>-40, 
					'fontWeight'=>'normal', 
					'fontStretch'=>1)
            ),
            'yaxis'=>array(
                'rendererOptions'=>array('tickRenderer'=>'plugin::CanvasAxisTickRenderer'),
                'tickOptions'=>array(
					'formatString'=>'%.5f', 
					'fontSize'=>'10pt', 
					'fontFamily'=>'Tahoma', 
					'angle'=>30, 
					'fontWeight'=>'normal', 
					'fontStretch'=>1)
            )
        
    ));
    $pc->add_series(array('lineWidth'=>4,'markerOptions'=>array('style'=>'square')));
    $pc->set_cursor(array('zoom'=>true));
    $pc->draw(600,400);       

    ?>

    </body>
</html>