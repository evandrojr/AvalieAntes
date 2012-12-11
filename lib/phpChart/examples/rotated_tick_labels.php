<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Rotated Tick Labels</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    
    
    $line1=array(array('2008-09-30', 4), array('2008-10-30', 6.5), array('2008-11-30', 5.7), array('2008-12-30', 9), array('2009-01-30', 8.2));
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $pc = new C_PhpChartX(array($line1),'plot1');
    $pc->add_plugins(array('canvasTextRenderer','canvasAxisTickRenderer','dateAxisRenderer'),true);
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
            )
        
    ));
    $pc->add_series(array('lineWidth'=>4,'markerOptions'=>array('style'=>'square')));
    $pc->draw(600,400);       

    ?>

    </body>
</html>