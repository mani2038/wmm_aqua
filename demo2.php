<!DOCTYPE html>

<head>
		<meta charset="utf-8" />
		<title>slides</title>
		
		<!-- Attach our CSS -->
	  	<link rel="stylesheet" href="orbit-1.2.3.css">
	  	<link rel="stylesheet" href="demo-style.css">
	  	
		<!-- Attach necessary JS -->
		<script type="text/javascript" src="jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="jquery.orbit-1.2.3.min.js"></script>	
		
			<!--[if IE]>
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			<![endif]-->
		
		<!-- Run the plugin -->
		<script type="text/javascript">
     $(window).load(function() {
         $('#featured').orbit({
              bullets: true
         });
		 
		$("div.slider-nav").css({dispaly:'none'});
$("#featured, div.slider-nav").hover(function(){
  $("div.slider-nav").css({display:'block'});
}, function() {
   $("div.slider-nav").css({display:'none'});
});
		 
		 
     });
	 
	 
</script>


		
	</head>
	<body>
	
	<div class="container">
		
	
	
	
	
<!-- =======================================

THE ACTUAL ORBIT SLIDER CONTENT 

======================================= -->
		<div id="featured"> 
            <?php for($i=1;$i<=38;$i++)
			{?>
            <img src="slides/Slide<?php echo $i; ?>.PNG"  />
            <?php } ?>
		</div>
		<!-- Captions for Orbit -->
		
		
		
		
	</div>	
	</body>
</html>