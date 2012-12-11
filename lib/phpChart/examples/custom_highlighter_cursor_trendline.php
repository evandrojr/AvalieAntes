<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Custom Draggable Highlighter w Trend Line</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Line 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $s1 = array(array('23-May-08',1),array('24-May-08',4),array('25-May-08',2),array('26-May-08',6));
    
    $pc = new C_PhpChartX(array($s1),'chart1');
    
	$pc->add_plugins(array('cursor','highlighter','dragable','trendline'));
	$pc->set_animate(true);
    $pc->set_title(array('text'=>'Highlighting, Dragging, Cursor and Trend Line'));
    $pc->set_axes(array(
            'yaxis'=> array('tickOptions'=>array('formatString'=>'$%.2f')),
            'xaxis'=> array(
				'renderer'=>'plugin::DateAxisRenderer',
				'tickOptions'=>array('formatString'=>'%b %#d, %Y'),
				'numberTicks'=>4)
        ));
    $pc->set_highlighter(array(
           'sizeAdjust'=> 10,
           'tooltipLocation'=> 'n',
           'tooltipAxes'=> 'y',
           'tooltipFormatString'=> '<b><i><span style="color=>red;">hello</span></i></b> %.2f',
           'useAxesFormatters'=> false
    ));
    $pc->set_cursor(array('show'=>true));
    $pc->draw(500,300);

   
?>

    </body>
</html>