<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
          #pricePointer {
            background-color: rgba(40,40,40,0.7);
            color: rgb(240,240,240);
            padding: 2px 2px 2px 0px;
          }
        </style>

    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $plotoptions = array(
        'gridPadding'=>array('top'=>1),
        'grid'=>array('shadow'=>false,'borderWidth'=>1.0),
        'seriesDefaults'=>array('yaxis'=>'y2axis'),
        'axes'=>array(
            'xaxis'=>array(
				'renderer'=>'plugin::DateAxisRenderer',
				'tickOptions'=>array('formatString'=>'%b %d')),
            'yaxis'=>array(
				'y2axis'=>array('tickOptions'=>array('formatString'=>'%.4f')))
        ),
        'series'=>array(array('showMarker'=>false)),
        'noDataIndicator'=>array(
            'show'=>true,
			'indicator'=>'<img src="ajax-loader.gif" /><br />Loading Data...',
            'axes'=>array(
                'xaxis'=>array('min'=>0,'max'=>5,'tickInterval'=>1,'showTicks'=>false),
                'yaxis'=>array('show'=>false),
                'y2axis'=>array('show'=>true,'min'=>0,'max'=>8,'tickInterval'=>2,'showTicks'=>false)
			)
        ),
        'canvasOverlay'=>array(
            'show'=>true,
            'objects'=>array(
                array(
                    'dashedHorizontalLine'=>array(
                        'name'=>'current',
                        'y'=>6,
                        'lineWidth'=>1.5,
                        'color'=>'rgb(60, 60, 60)',
                        'yaxis'=>'y2axis',
                        'shadow'=>false,
                        'dashPattern'=>array(12,12)
                    )
                )
            )
        )
    );

    $pc = new C_PhpChartX(array(),'plot1');
    $pc->add_plugins(array('canvasOverlay'));
    $pc->set_properties($plotoptions);

    $pc->draw(800,400);

    echo '<div id="pricePointer" style="display:none;"></div>
			<button id="start">Start</button>
			<button id="stop">Stop</button>';
    ?>

	<script type="text/javascript" lang="javascript">
	var data = [['2011-04-05 16:00',  1332.63],
            ['2011-04-04 16:00',  1332.87],
            ['2011-04-01 16:00',  1332.41],
            ['2011-03-31 16:00',  1325.83],
            ['2011-03-30 16:00',  1328.26],
            ['2011-03-29 16:00',  1319.44],
            ['2011-03-28 16:00',  1310.19],
            ['2011-03-25 16:00',  1313.8],
            ['2011-03-24 16:00',  1309.66],
            ['2011-03-23 16:00',  1297.54],
            ['2011-03-22 16:00',  1293.77],
            ['2011-03-21 16:00',  1298.38],
            ['2011-03-18 16:00',  1279.21],
            ['2011-03-17 16:00',  1273.72],
            ['2011-03-16 16:00',  1256.88],
            ['2011-03-15 16:00',  1281.87],
            ['2011-03-14 16:00',  1296.39],
            ['2011-03-11 16:00',  1304.28],
            ['2011-03-10 16:00',  1295.11],
            ['2011-03-09 16:00',  1320.02],
            ['2011-03-08 16:00',  1321.82],
            ['2011-03-07 16:00',  1310.13],
            ['2011-03-04 16:00',  1321.15],
            ['2011-03-03 16:00',  1330.97],
            ['2011-03-02 16:00',  1308.44],
            ['2011-03-01 16:00',  1306.33],
            ['2011-02-28 16:00',  1327.22],
            ['2011-02-25 16:00',  1319.88],
            ['2011-02-24 16:00',  1306.1],
            ['2011-02-23 16:00',  1307.4],
            ['2011-02-22 16:00',  1315.44],
            ['2011-02-18 16:00',  1343.01],
            ['2011-02-17 16:00',  1340.43],
            ['2011-02-16 16:00',  1336.32],
            ['2011-02-15 16:00',  1328.01],
            ['2011-02-14 16:00',  1332.32],
            ['2011-02-11 16:00',  1329.15],
            ['2011-02-10 16:00',  1321.87],
            ['2011-02-09 16:00',  1320.88],
            ['2011-02-08 16:00',  1324.57],
            ['2011-02-07 16:00',  1319.05]];

        ///////
        // Functions to handle recreation of plot when data is available
        // and to simulate new data coming into the plot and plot updates.
        ///////


        function startit(initialData) {
          // 1) Empty container.
          $('#plot1').empty();
          // 2) Recreate plot.
          // Note, only call the $.jqplot() method when entire plot needs recreated.
          plot1 = $.jqplot('plot1', [initialData], _plot1_plot_properties); 

          // get handle on last data point and current price line.
          var dp = initialData[initialData.length-1];
          var co = plot1.plugins.canvasOverlay;
          var current = co.get('current');

          // 3) Update the limit and stop lines based on the latest data.
          current.options.y = dp[1];
          co.draw(plot1);

          // 4) Create the 'pricePointer', element and append to the plot.
          $('<div id=\"pricePointer\" style=\"position:absolute;\"></div>').appendTo(plot1.target);
          // 5) updatePricePointer method sets text and position to value passed in.
          updatePricePointer(dp[1]);

          // 6) Stuff to mock up streaming.
                counter = 0;
                Interval = setInterval(runUpdate, 500);
          d = dp = co = limit = stop = null;
        }

        ///////
        // Function to generate an updated data value
        // for the last data point in the series.
        // This does not change the timestamp, just the data value.
        ///////
        function getNewDataPoint() {
          // Need to generate some mock data.  Will use the last data from
          // the plot as a base set.  Adjust the close value by a random amount,

          // a slight adjustment to current price
          var val = Math.random()*20 * (Math.random() - 0.1);
          var d = plot1.series[0].data;
          var dp = d[d.length-1];
          // get the current values.
          var ts = dp[0];
          var curclose = dp[1];

          // Set the new close value
          var newval = curclose + val;

          val = d = dp = curclose = null;
          // Now return a new data set, note haven't changed or used the datetime  value.
          return ([ts, newval]);
        }

        ////////
        // function to simulate application loop, where app does something
        // every time it gets a new data point.
        ////////
        function runUpdate() {

          // Simulate 1000 iterations of streaming for testing purposes.
          if (counter < 10000) {
            var newdata = getNewDataPoint();
            // updatePlot method each time have an updated data point.
            updatePlot(newdata);
            // update pointer div with latest data val.
            updatePricePointer(newdata[1]);

            // Stuff for mock streaming
            counter++;
            newdata = null;
                }

        // Remove the setInterval after 1000 iterations.
                else {
                        clearInterval(Interval);
                }
        }

        ////////
        // Function updating plot when last data point is updated.  If totally new
        // data is fed in, can recreate plot with call to $.jqplot();
        ////////
        function updatePlot(newdata) {

          // get references for convienence.
          var d = plot1.series[0].data;
          var dp = d[d.length-1];

          // Update the data on the series in the plot.
          // Becuase of some inconsistent reference handling in some browsers,
          // it is safest to set individual data elements by value.
          dp[0] = newdata[0];  // the datetme
          dp[1] = newdata[1];  // Close

          // Get handle on the canvas overlary for the current price line.
          var co = plot1.plugins.canvasOverlay;
          var current = co.get('current');

          // Update the y value of the current price line.
          // This does not redraw the lines, just updates the values.
          current.options.y = dp[1];

          // Check to see if we need to rescale the plot,
          // if the data is now above/below the axes.
          if (dp[1] > plot1.axes.y2axis.max) {
            plot1.replot({resetAxes:true});
            // Need to re-create the 'pricePointer' element  as it will be destoyed
            // when the plot is recreated.
            $('<div id=\"pricePointer\" style=\"position:absolute;\"></div>').appendTo(plot1.target);
            // Set the \"pricePointer\" to the current price.
            updatePricePointer(dp[1]);
          }

          else if (dp[1] < plot1.axes.y2axis.min) {
            plot1.replot({resetAxes:true});
            // Need to re-create the 'pricePointer' element  as it will be destoyed
            // when the plot is recreated.
            $('<div id=\"pricePointer\" style=\"position:absolute;\"></div>').appendTo(plot1.target);
            // Set the \"pricePointer\" to the current price.
            updatePricePointer(dp[1]);
          }

          // If no axes rescaling needed, just redraw the series on the canvas
          // and redraw the current price line at new positions.
          else {
            plot1.drawSeries({}, 0);
            co.draw(plot1);
          }

          d = dp = newdata = limit = stop = co = null;
        }

        ////////
        // function to update the text and reposition the price pointer
        ////////
        function updatePricePointer(val) {
          // get handle on the price pointer element.
          var div = $('#pricePointer');
          // Get a handle on the plot axes and one of the y2axis ticks.
          var axis = plot1.axes.y2axis;
          var tick = axis._ticks[0];
          // use the tick's formatter to format the value string.
          var str = tick.formatter(tick.formatString, val);
          // set the text of the pointer.
          div.html('&laquo;&nbsp;'+str);
          // Create css positioning strings for the pointer.
          var left = plot1._gridPadding.left + plot1.grid._width + 3 + 'px';
          // use the axis positioning functions to set the right y position.
          var top = axis.u2p(val) - div.outerHeight()/2 + 'px';
          // set the div in the right spot
          div.css({left:left, top:top});

          div = axis = tick = str = left = top = null;
        }

        function stopit() {
                clearInterval(Interval);
        }

        $('#start').click(function (){
            startit(data);
        });
        $('#stop').click(function (){
            stopit();
        });
		</script>
    </body>
</html>