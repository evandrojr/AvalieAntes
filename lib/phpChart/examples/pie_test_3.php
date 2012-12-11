<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Pie Chart</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    
    

    $s1 = array(array('Sony',7), array('Samsumg',13.3), array('LG',14.7), array('Vizio',5.2), array('Insignia', 1.2));
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $pc = new C_PhpChartX(array($s1),'chart1');

    $pc->set_grid(array('drawBorder'=>false,
			'drawGridlines'=>false,
			'background'=>'#ffffff',
			'shadow'=>false));
    $pc->set_axes_default(array());
    
    $pc->set_series_default(array(
			'renderer'=>'plugin::PieRenderer',
			'rendererOptions'=>array('showDataLabels'=>true)));
    $pc->set_legend(array('show'=>true,
			'rendererOptions'=> array('numberRows'=> 1),
			'location'=> 's'));
    $pc->draw(400,400);   

    ?>

    </body>
</html>