<!DOCTYPE html>

<html lang="en-US">

<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>Samson's Site</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="style.css">

	<script>
		// Drag & Drop Scripts
		function allowDrop(ev) {
			ev.preventDefault();
		}
		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}
		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}

	</script>
</head>

<body id="body1">
<!-- Nav bar -->
<ul id="nav">
	<li id="nav"><a class="active" href="#home">Home</a></li>
	<li id="nav"><a href="#map">Map</a></li>
</ul id="nav">

<!-- Intro -->
<section id="home">
	<h1 style="color:green; font-family:verdana; text-align:center;">hello</h1>
	<p title="who am I?">hi my name is <span style="color:yellow"><strong>Samson</strong></span> <b>Chung</b></p>
	<a href="http://timescircle.ca" style="text-decoration:none">Times Circle</a>
</section>

<!-- Drag & Drop Rilakkuma -->
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
	<img id="rilakkuma" src="rilakkuma.png" alt="rilakkuma" width="240" height="240" draggable="true" ondragstart="drag(event)"> 
</div>
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div> 
 

<!-- Youtube video -->
<iframe width="1080" height="720"
src="https://www.youtube.com/embed/ZZ5LpwO-An4?autoplay=0">
</iframe>

<br />

<!-- Counter -->

<p>Counting: <output id="result"></output></p>
<button onclick="startWorker()">Start Worker</button> 
<button onclick="stopWorker()">Stop Worker</button>

<script>
var w;

function startWorker() {
    if(typeof(Worker) !== "undefined") {
        if(typeof(w) == "undefined") {
            w = new Worker("time_count.js");
        }
        w.onmessage = function(event) {
            document.getElementById("result").innerHTML = event.data;
        };
    } else {
        document.getElementById("result").innerHTML = "Sorry! No Web Worker support.";
    }
}

function stopWorker() { 
    w.terminate();
    w = undefined;
}
</script>

<!-- Google Maps -->
<h1>The 6ix</h1>

<div id="map" style="width:400px;height:400px;background:yellow"></div>

<script>
function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(43.6532, -79.3832),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.roadmap
    }
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

</body>
</html>