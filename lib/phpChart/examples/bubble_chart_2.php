\<?php
require_once("../conf.php");
?>
<html>
    <head>
		<title>phpChart - Bubble Chart 2</title>
    
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $arr = array(array(11, 123, 1236, "Acura"), array(45, 92, 1067, "Alfa Romeo"),
    array(24, 104, 1176, "AM General"), array(50, 23, 610, "Aston Martin Lagonda"),
    array(18, 17, 539, "Audi"), array(7, 89, 864, "BMW"), array(2, 13, 1026, "Bugatti"));

    $pc = new C_PhpChartX(array($arr),'chart1');
    $pc->add_plugins(array('bubbleRenderer'));
    
    

    //$pc->sort_data(true);
    $pc->set_title(array('text'=>'Transparent Bubbles'));
    $pc->set_series_default(array('renderer'=>'plugin::BubbleRenderer',
                                  'rendererOptions'=>array('bubbleAlpha'=>0.6,
                                                           'highlightAlpha'=>0.8),
                                  'shadow'=>true,
                                  'shadowAlpha'=>0.05));

    $pc->draw(600,400);
/*
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1b Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $arr = array(array(11, 123, 1236, "Acura"), array(45, 92, 1067, "Alfa Romeo"),
				array(24, 104, 1176, "AM General"), array(50, 23, 610, "Aston Martin Lagonda"),
				array(18, 17, 539, "Audi"), array(7, 89, 864, "BMW"), array(2, 13, 1026, "Bugatti"));

    $pc = new C_PhpChartX(array($arr),'chart1b');
    $pc->add_plugins(array('bubbleRenderer'));
    
    

    //$pc->sort_data(true);
    $pc->set_title(array('text'=>'Tooltip and Custom Legend Highlighting'));
    $pc->set_series_default(array('renderer'=>'plugin::BubbleRenderer',
                                  'rendererOptions'=>array('bubbleAlpha'=>0.6,
                                                           'highlightAlpha'=>0.8,
                                                           'showLabels'=>false),
                                  'shadow'=>true,
                                  'shadowAlpha'=>0.05));
    // Legend is a simple table in the html.
    // Now populate it with the labels from each data value.
    $pc->set_custom_legend(3,2,'legend1b');
    $pc->bind_js('custom',"$('#chart1b').bind('jqplotDataHighlight', 
        function (ev, seriesIndex, pointIndex, data, radius) {    
            var chart_left = $('#chart1b').offset().left,
                chart_top = $('#chart1b').offset().top,
                x = chart1b.axes.xaxis.u2p(data[0]),  // convert x axis unita to pixels on grid
                y = chart1b.axes.yaxis.u2p(data[1]);  // convert y axis units to pixels on grid
            var color = 'rgb(50%,50%,100%)';
            $('#legend1b_tooltip').css({left:chart_left+x+radius+5, top:chart_top+y});
            $('#legend1b_tooltip').html('<span style=\"font-size:14px;font-weight:bold;color:'+color+';\">'+data[3]+'</span><br />'+'x: '+data[0]+'<br />'+'y: '+data[1]+'<br />'+'r: '+data[2]);            $('#legend1b_tooltip').show();
            $('#legend1b tr').css('background-color', '#ffffff');
            $('#legend1b tr').eq(pointIndex).css('background-color', color);
        });");

    $pc->bind_js('custom',"$('#chart1b').bind('jqplotDataUnhighlight',
        function (ev, seriesIndex, pointIndex, data) {
            $('#legend1b_tooltip').empty();
            $('#legend1b_tooltip').hide();
            $('#legend1b tr').css('background-color', '#ffffff');
        });");

    $pc->draw(600,400);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1c Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $arr = array(array(11, 123, 1236, array('label'=>"Acura", 'color'=>'sandybrown')),
			array(45, 92, 1067, array('label'=>"Alfa Romeo", 'color'=>'skyblue')),
			array(24, 104, 1176, array('label'=>"AM General", 'color'=>"salmon")), array(50, 23, 610, array('color'=>"papayawhip")),
			array(18, 17, 539, "Audi"), array(7, 89, 864), array(2, 13, 1026, "Bugatti")); 

    $pc = new C_PhpChartX(array($arr),'chart1c');
    $pc->add_plugins(array('bubbleRenderer'));
    
    

    //$pc->sort_data(true);
    $pc->set_title(array('text'=>'Bubble Data Customizations'));
    $pc->set_series_default(array('renderer'=>'plugin::BubbleRenderer'));
    $pc->draw(600,400);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 2 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $arr =  array(array(11, 123, 1236, "Acura"), array(45, 92, 1067, "Alfa Romeo"),
            array(24, 104, 1176, "AM General"), array(50, 23, 610, "Aston Martin Lagonda"),
            array(18, 17, 539, "Audi"), array(7, 89, 864, "BMW"), array(2, 13, 1026, "Bugatti"));

    $pc = new C_PhpChartX(array($arr),'chart2');
    $pc->add_plugins(array('bubbleRenderer'));
    
    

    //$pc->sort_data(true);
    $pc->set_title(array('text'=>'Bubble Gradient Fills*'));
    $pc->set_series_default(array('renderer'=>'plugin::BubbleRenderer','rendererOptions'=>array('bubbleGradients'=>true)));
    $pc->draw(600,400);

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 3 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $arr = array(array(44, 66, 897, "Acura"), array(25, 40, 1119, "Alfa Romeo"), array(2, 33, 1197, "AM General"),
        array(4, 132, 896, "Aston Martin Lagonda"), array(2, 129, 314, "Audi"), array(14, 47, 612, "BMW"),
        array(45, 112, 719, "Bugatti"), array(11, 38, 785, "Buick"), array(15, 39, 367, "Cadillac"),
        array(6, 133, 726, "Chevrolet"), array(48, 84, 1082, "Citroen"), array(40, 18, 1047, "DaimlerChrysler Corporation"),
        array(24, 107, 1065, "Daewoo Motor Co."), array(27, 92, 792, "Delorean Motor Company"), array(1, 78, 803, "Dodge"),
        array(5, 149, 320, "Ferrari"), array(11, 127, 497, "Fiat"), array(14, 18, 805, "Ford Motor Company"),
        array(9, 101, 394, "General Motors"), array(16, 57, 338, "GMC"), array(19, 89, 977, "Holden"),
        array(35, 78, 464, "Honda"), array(18, 130, 364, "Hummer"), array(37, 20, 699, "Hyundai"),
        array(33, 140, 457, "Infiniti"), array(12, 122, 533, "Isuzu"), array(25, 67, 767, "Jaguar Cars"),
        array(0, 7, 481, "Jeep"), array(38, 36, 611, "Jensen Motors"), array(43, 91, 943, "Kia"), array(45, 21, 569, "Laforza"));

    $pc = new C_PhpChartX(array($arr),'chart3');
    $pc->add_plugins(array('bubbleRenderer'));
    
    

    //$pc->sort_data(true);
    $pc->set_title(array('text'=>'Bubble Gradient Fills*'));
    $pc->set_series_default(array('renderer'=>'plugin::BubbleRenderer',
                                  'rendererOptions'=>array('autoscalePointsFactor'=>-0.15,'autoscaleMultiplier'=>0.85,'highlightMouseDown'=>true,'bubbleAlpha'=>0.7),
                                  'shadow'=>true,
                                  'shadowAlpha'=>0.05));
    $pc->draw(600,400);
*/
 ?>

    </body>
</html>