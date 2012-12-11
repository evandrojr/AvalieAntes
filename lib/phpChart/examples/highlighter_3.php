<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Highlighter 3</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $s1 = array(array('23-May-08',1),array('24-May-08',4),array('25-May-08',2),array('26-May-08',6));
    $s2 = array(3,5,7,4,8);
    $s3 = array(9,11,15,8,15);
    $s4 = array(8,7,12,18,4);
    $s5 = array(13,17,21,19,11);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1),'chart1');
    $pc->add_plugins(array('highlighter','cursor'),true);
    

    $pc->set_title(array('text'=>'Highlighting'));

    $pc->set_axes(array(
        'xaxis' => array(
			'renderer'=>'plugin::DateAxisRenderer',
			'tickOptions'=>array(
				'formatString'=>'%b %#d, %Y'),
				'numberTicks'=>4),
        'yaxis' => array('tickOptions'=>array('formatString'=>'$%.2f'))
    ));
	$pc->set_highlighter(array(
		'sizeAdjust'=>10,
		'tooltipLocation'=>'n',
		'useAxesFormatters'=>false,
		'formatString'=>'Hello %s dayglow %d',
		'tooltipContentEditor'=>'js::editit'));		// must start with "js::" to indicate using user's own function
	$pc->set_cursor(array('show'=>true,'zoom'=>true));    
    
    $pc->add_custom_js("
        function editit(str, si, pi, plot) {
            return \"<b><i>NHT: \"+plot.targetId+', Series: '+si+', Point: '+pi+', '+str+\"</b></i>\";
        }
    ");
    $pc->draw(500,300);
    ?>

    </body>
</html>