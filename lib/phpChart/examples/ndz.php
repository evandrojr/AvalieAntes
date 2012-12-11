<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart</title>
</head>
<body>

<?php
	$line = array(array(50,1), array(38,2), array(35,3), array(60,4));
	$min = array(array(10, 0.6), array(10, 4.4));
	$max = array(array(50, 0.6), array(50, 4.4));
	$ticks = array("Modulo3", "Modulo1", "Modulo4", "Modulo2");

    $pc = new C_PhpChartX(array($line, $min, $max),'chart5');
    $pc->add_series(array(
		'label'=>'Modulo',
		'renderer'=>'plugin::BarRenderer',
        'pointLabels'=> array('show'=>true,'location'=>'e','edgeTolerance'=>-15),
        'shadowAngle'=>135,
        'rendererOptions'=>array('highlightMouseDown'=>true,'barDirection'=>'horizontal')));
    $pc->set_animate(true);
	$pc->set_legend(array('show'=>true,'location'=>'ne'));
 
    $pc->set_capture_right_click(true);
    $pc->add_series(array(
		'showMarker'=>false,
		'color'=>'red',
		'label'=>'10'));   // min
	$pc->add_series(array(
		'showMarker'=>false,
		'color'=>'blue',
		'label'=>'50'));   // max

	$pc->set_axes(array(
		'xaxis'=>array(
			'tickInterval'=>10,
			'min'=>0,
			'max'=>100),
		'yaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer',
			'ticks'=>$ticks)));
		
    $pc->draw(800,300);

?>

<?php
//
//function getIstogrammaModuli($lines, $titles, $maxHeight, $height, $title)
//{
//    $min = array(array(50, 0), array(50, $maxHeight));
//         
//    $pc = new C_PhpChartX(array($lines, $min),"$title");
//    $pc->add_series(array(
//        'label'=>'Percentili',
//
//        'renderer'=>'plugin::BarRenderer',
//        'pointLabels'=> array('show'=>true,'location'=>'e','edgeTolerance'=>-15),
//        'shadowAngle'=>135,
//        'rendererOptions'=>array('barDirection'=>'horizontal'))
//    );
//        
//    //$pc->set_animate(true);
//
//    $pc->set_legend(array(
//        'show'=>true,
//        'placement'=>'outsideGrid',
//        'location'=>'ne'        
//    ));    
//        
//        $pc->add_plugins(array('pointLabels'));
//
//     
//    $pc->set_capture_right_click(true);
//    $pc->add_series(array(
//        'showMarker'=>false,
//        'color'=>'red',
//        'label'=>'Cut-off'));   // min $pc->add_series(array( 'showMarker'=>false,
//
//         
//    $pc->set_axes(array(
//        'xaxis'=>array(
//            'min'=>1,
//            'max'=>100),
//        'yaxis'=>array(
//            'renderer'=>'plugin::CategoryAxisRenderer',
//            'ticks'=>$titles)));
//        
//    echo "<div class='graphbar'>";
//    $pc->draw(800,$height);
//    echo "</div>";
//}
//
//	
//$height = 250;
//$ticks = array("Modulo1", "Modulo2", "Modulo3", "Modulo4", "Modulo5");
//$lines = array(
//			array(44, 1), 
//			array(48, 2), 
//			array(57, 3), 
//			array(63, 4), 
//			array(74, 5)
//		);
//
//$maxHeight = 15;
//
//getIstogrammaModuli($lines, $ticks, $maxHeight, $height, "title here");

?>

<body>
</html>