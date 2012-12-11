<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Highlighter 2</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $s1 = array(3, 7, 4, 9, 11, 12);
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    $pc = new C_PhpChartX(array($s1),'chart1');
    
    $pc->add_custom_js("
        $('#chart1').append('<div id=\"myToolTip\" style=\"position:absolute;display:none;background:#E5DACA;padding:4px;\"></div>');
        function myMove (ev, gridpos, datapos, neighbor, plot) {
            if (neighbor == null) {
                $('#myToolTip').fadeOut().empty();
                isShowing = false;
            }
            if (neighbor != null) {
                if ($('#myToolTip').is(':hidden')) {
                    var d = new Date();
                    var myText = d.getSeconds();   // could be any function pulling data from anywhere.  
                    $('#myToolTip').html(myText).css({left:gridpos.x, top:gridpos.y}).fadeIn();
                }
            }
        }
        // Here is how you attach the custom callback to the mouse move event on the plot.
        $.jqplot.eventListenerHooks.push(['jqplotMouseMove', myMove]);
    ",'after');
    $pc->draw(500,300);
    ?>

    </body>
</html>