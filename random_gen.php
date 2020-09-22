<!DOCTYPE html>
<html>
<head>
	<title>Random :)</title>
		<!-- Jquery Core Js -->
    <script src="template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Css -->
    <link href="template/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
    	#particle {
			  background-color: #2c3e50;
			  position:fixed;
			  top:0;
			  right:0;
			  bottom:0;
			  left:0;
			  z-index:0; 
			}
			#overlay {
			  position: relative;
			}
    </style>
</head>
<body>
	<div id="particle"></div>

	<div class="container-fluid" id="overlay">
		
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<center>
					<br><br><br>
					<h1 id="random_number_txt" style="font-size: 200px;color: white;text-align: center;">Hello!</h1>

					<br><br><br>

					<button onclick="generateRandomNumber('wala',400)" class="btn btn-lg btn-success btn-block">Generate 1 - 400</button><br>
					<button onclick="generateRandomNumber('wala',50)" class="btn btn-lg btn-info btn-block">Generate 1 - 50</button><br>
					<button onclick="generateRandomNumber('daya',18)" class="btn btn-lg btn-primary btn-block">Generate 1 - 18</button><br>		
				</center>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
		
	</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>



<script type="text/javascript">

	count = 0;


	function generateRandomNumber(ope,max) 
	{
		if(max == 18)
		{
			count++;
		}

		$("#random_number_txt").load("generate.php?max="+ max + "&operation=" + ope);
	}

	var options = {"particles":{"number":{"value":99,"density":{"enable":true,"value_area":552.4033491425909}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":3},"image":{"src":"img/github.svg","width":70,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":2,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1.5782952832645452,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":false};
	
	particlesJS("particle", options);


</script>