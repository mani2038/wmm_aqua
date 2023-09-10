<?php 

if(get2Status("Green")<10)
$day = 0; // add the zero
else
$day = 10; // don't add the zero

if(get2Status("Yellow")<10)
$day1 = 0; // add the zero
else
$day1 = 10; // don't add the zero

if(get2Status("Red")<10)
$day2 = 0; // add the zero
else
$day2 = 10; // don't add the zero

if(gettotlead()<10)
$day3 = 0; // add the zero
else
$day3 = 10; // don't add the zero

if(getleadstatus("Contracted")<10)
$day4 = 0; // add the zero
else
$day4 = 10; // don't add the zero
?>
    <script>
 $(document).ready(function() {
 	// $("#responsecontainer").load("response.php");
//   var refreshId = setInterval(function() {
//      $("#responsecontainer").animateNumbers(6000).load('response.php?randval='+ Math.random());
//   }, 5000);
//   
   		var $container = $("#totlead");
		var $container1 = $("#totgrn");
		var $container2 = $("#totylw");
		var $container3 = $("#totred");
		var $container4 = $("#totlead2");
        $container.load('response.php?randval='+ Math.random());
		$container1.load('response_chart.php?cid=green&randval='+ Math.random());
		$container2.load('response_chart.php?cid=yellow&randval='+ Math.random());
		$container3.load('response_chart.php?cid=red&randval=1'+ Math.random());
		$container4.load('response2.php?randval='+ Math.random());
        var refreshId = setInterval(function()
        {
         //$container.load('response.php');
		function doSomethingWithData(data) {
	
		  jQuery({value: <?php echo $day3; ?>}).animate({value: data}, {
			duration: 4500,
			easing:'swing',
			step: function() {
				$('#totlead').text(Math.ceil(this.value));
			},
			complete: function() {
				//$('#totlead').css({color:'#080'});
			},
		  });
		  return false;
		}
		
		function doSomethingWithData1(data) {
	
		  jQuery({value: <?php echo $day; ?>}).animate({value: data}, {
			duration: 4500,
			easing:'swing',
			step: function() {
				$('#totgrn').text(Math.ceil(this.value));
			},
			complete: function() {
				//$('#totlead').css({color:'#080'});
			},
		  });
		  return false;
		}
		
		function doSomethingWithData2(data) {
	
		  jQuery({value: <?php echo $day1; ?>}).animate({value: data}, {
			duration: 4500,
			easing:'swing',
			step: function() {
				$('#totylw').text(Math.ceil(this.value));
			},
			complete: function() {
				//$('#totlead').css({color:'#080'});
			},
		  });
		  return false;
		}
		
		function doSomethingWithData3(data1) {
	
		  jQuery({value: <?php echo $day2; ?>}).animate({value: data1}, {
			duration: 4500,
			easing:'swing',
			step: function() {
				$('#totred').text(Math.ceil(this.value));
			},
			complete: function() {
				//$('#totlead').css({color:'#080'});
			},
		  });
		  return false;
		}
		
		function doSomethingWithData4(data) {
	
		  jQuery({value: <?php echo $day4; ?>}).animate({value: data}, {
			duration: 5000,
			easing:'swing',
			step: function() {
				$('#totred').text(Math.ceil(this.value));
			},
			complete: function() {
				//$('#totlead').css({color:'#080'});
			},
		  });
		  return false;
		}
 
$.get('response.php?randval='+ Math.random(), doSomethingWithData);
$.get('response_chart.php?cid=green&randval='+ Math.random(), doSomethingWithData1);
$.get('response_chart.php?cid=yellow&randval='+ Math.random(), doSomethingWithData2);
$.get('response_chart.php?cid=red&randval=1'+ Math.random(), doSomethingWithData3);
$.get('response2.php?randval='+ Math.random(), doSomethingWithData4);
	//alert(content);	  
	//alert("Data: ");	  
	//$("#responsecontainer2").animateNumbers(data,true,50000);	  
		 
        }, 100000);
   $.ajaxSetup({ cache: false });
});
</script>
<div id="activity_stats">
        	<h3>Activity</h3>
            <div class="activity_column">
            	<span class="iconsweet">Y</span> <span class="big_txt gr_txt" id="totgrn" ><?php echo get2Status("Green"); ?></span>Green
            </div>
            <div class="activity_column">
<span class="iconsweet">_</span> <span class="big_txt rd_txt" id="totylw" style="color:#CC0"><?php echo get2Status("Yellow"); ?></span>Yellow</div>
            <div class="activity_column">
            	<span class="iconsweet">^</span> <span class="big_txt rd_txt" id="totred"><?php echo get2Status("Red"); ?></span>Red
            </div>
            <div class="activity_column">
            	<span class="iconsweet">(</span> <span class="big_txt" id="totlead" ><?php echo gettotlead(); ?></span>Qualified Lead
            </div>
            <div class="activity_column">
            	<span class="iconsweet">}</span> <span class="big_txt" id="totlead2" ><?php echo getleadstatus("Contracted"); ?></span>Lead in Execution</div>                         
        </div>      