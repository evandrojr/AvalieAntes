<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Multiple Bar Colors</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    

    $line1 = array(array(4,'Nissan'),array(6,'Porche'),array(2,'Acura'),array(5,'Aston Martin'),array(6,'Rolls Royce'));
    $line2 = array(5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5,5,-5);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $pc = new C_PhpChartX(array($line1),'chart1');

    $pc->set_title(array('text'=>'Default Colors'));
    $pc->set_series_default(array(
			'renderer'=>'plugin::BarRenderer',
			'rendererOptions'=>array(
				'barWidth'=>25,
				'barPadding'=>-25,
				'barMargin'=>25,
				'barDirection'=>
				'horizontal',
				'varyBarColor'=>true),
				'shadow'=>false));
    
    $pc->set_legend(array('show'=>false));
    
    $pc->set_axes(array(
        'xaxis'=>array(
			'min'=>0,
			'tickOptions'=>array('formatString'=>'%.0f','showGridLine'=>false)),
        'yaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer',
			'show'=>true,
			'tickOptions'=>array('show'=>true,'showLabel'=>true),
			'showTicks'=>true)
    ));
    
	$pc->set_animate(true);
    $pc->draw(600,300);   

/*    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $pc = new C_PhpChartX(array($line1),'chart2');

    $pc->set_title(array('text'=>'Custom Colors'));
    $pc->set_series_default(array(
			'renderer'=>'plugin::BarRenderer',
			'rendererOptions'=>array(
				'barWidth'=>25,
				'barPadding'=>-25,
				'barMargin'=>25,
				'barDirection'=>
				'horizontal',
				'varyBarColor'=>true),
			'shadow'=>false));
    $pc->set_series_color(array('#85802b', '#00749F', '#85802b', '#85802b', '#85802b'));
    $pc->set_legend(array('show'=>false));
    
    $pc->set_axes(array(
        'xaxis'=>array(
			'min'=>0,
			'tickOptions'=>array(
				'formatString'=>'%.0f',
				'showGridLine'=>false)),
        'yaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer',
			'show'=>true,
			'tickOptions'=>array(
				'show'=>true,
				'showLabel'=>true),
			'showTicks'=>true)
    ));
    
	$pc->set_animate(true);
    $pc->draw(600,300);  

    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 3 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($line2),'chart3');

    $pc->set_title(array('text'=>'All Default Positive and Negative Colors Colors'));
    $pc->set_series_default(array(
			'renderer'=>'plugin::BarRenderer',
			'rendererOptions'=>array(
				'barMargin'=>2,
				'fillToZero'=>true,
				'varyBarColor'=>true)));
    //$pc->set_series_color(array('#85802b', '#00749F', '#85802b', '#85802b', '#85802b'));
    $pc->set_legend(array('show'=>false));
    
    $pc->set_axes(array(
        'yaxis'=>array('tickOptions'=>array('showGridLine'=>false)),
        'xaxis'=>array('renderer'=>'plugin::CategoryAxisRenderer')
    ));
    
	$pc->set_animate(true);
    $pc->draw(600,300);   
        
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 4 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($line2),'chart4');

    $pc->set_title(array('text'=>'All Colors, useNegativeColors Turned Off'));
    $pc->set_series_default(array(
			'renderer'=>'plugin::BarRenderer',
			'rendererOptions'=>array(
				'barMargin'=>2,
				'fillToZero'=>true,
				'varyBarColor'=>true,
				'useNegativeColors'=>false)));
    //$pc->set_series_color(array('#85802b', '#00749F', '#85802b', '#85802b', '#85802b'));
    $pc->set_legend(array('show'=>false));
    
    $pc->set_axes(array(
        'yaxis'=>array('tickOptions'=>array('showGridLine'=>false)),
        'xaxis'=>array('renderer'=>'plugin::CategoryAxisRenderer')
    ));
    
	$pc->set_animate(true);
    $pc->draw(600,300);   
          
*/    
    ?>

    </body>
</html>