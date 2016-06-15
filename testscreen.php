<!DOCTYPE html>
<html>
	<head>

<style>
h1 {
    color: white;
    text-align: center;
    font-size: 270%;
}
body {
    background-color: black;
}
</style>

		<meta charset="UTF-8">
		
		<script type="text/javascript" src="http://spaceify.net/games/g/gamelib.min.js"></script>
		<script type="text/javascript">	
			
		//Group name for development use
				
		var GROUP_NAME = "Grand Theft Washing Machine";
		
		var SERVER_ADDRESS = {host: "spaceify.net", port: 1979};
		var WEBRTC_CONFIG = {"iceServers":[{url:"stun:kandela.tv"},{url :"turn:kandela.tv", username:"webrtcuser", credential:"jeejeejee"}]};
			
			
		function TestScreen()
			{
			var self = this;
			
			var gameClient = new GameClient();
			
			var buttonPressCounter = 0;
			
			
			self.onButtonPressed = function(x, y, callerId, connectionId, callback)
				{
				buttonPressCounter++;
				console.log("TestSreen::onButtonPressed() x: "+x+" y: "+y+" callerId: "+callerId+" connectionId: "+connectionId);
				document.getElementById("message").innerHTML = "Button pressed "+buttonPressCounter;
				};
				
			self.connect = function()
				{
				gameClient.exposeRpcMethod( "onButtonPressed", self, self.onButtonPressed);			
				
				gameClient.connect(SERVER_ADDRESS.host, SERVER_ADDRESS.port, "screen", GROUP_NAME, function(){});
				
				//send question number myIndex
				console.log("send questions number $$$$$$$$$$$$ "+ myIndex);


				// Connect for deployment
				//gameClient.connectAsScreen("phaseroid", document.getElementById("url"), document.getElementById("qr"), function() {});	
				};
			}
		
		var screen = new TestScreen();
			
		window.onload = function()
			{
			screen.connect();
			}
				
		</script>
		<title>
			BackCap
		</title>
	</head>
<body>
	
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "cjjawl";
$dbname = "backcap";

$pic1= "";
$textArray = array();
$row_number=0;

try {

	echo "<div class=\"w3-content w3-section\"  align=\"center\">";

 	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt=$conn->query("SELECT id,text,image_url FROM backcap.questions ORDER BY id ASC"); 
    foreach($stmt as $row){
        
		$pic= $row['image_url'];
		$textArray[$row_number]=$row['text'];

		$row_number=$row_number+1;
		echo "<img class=\"mySlides\" src=\"pics/" . $pic . "\" height=\"470\" width=\"620\">";
    }

    echo "</div>";
}

 	/*

 	style=\"max-width:500px\"
 	$stmt = $conn->prepare("SELECT id,text FROM gtw.test ORDER BY id ASC"); 
 	$stmt->execute();
 	$row_number=0;

 	while ($row = $stmt->fetchAll()) {
	
		echo $row_number;
		$pic= $row[$row_number]['text'];
		$row_number=$row_number+1;


		echo "<img class=\"mySlides\" src=\"pics/" . $pic . "\" height=\"421\" width=\"421\">";

	}
}
<?php
for ($x = 0; $x < row_number; $x++) {
        
		$pic= $row['text'];
		$textArray[$row_number]=$row['text'];

		$row_number=$row_number+1;
		echo "<img class=\"mySlides\" src=\"pics/" . $pic . "\" height=\"421\" width=\"421\">";
    }


?>
*/
catch(PDOException $e) {
 	echo "Error: " . $e->getMessage();
}
$conn = null;
?>



<!--div class="w3-content w3-section" style="max-width:500px">
  <img class="mySlides" src="pics/1.jpeg" style="width:100%">
  <img class="mySlides" src="pics/2.jpeg" style="width:100%">

  <img class="mySlides" src="pics/1.jpeg" height="421" width="421">
  <img class="mySlides" src="pics/2.jpeg" height="421" width="421">
</div-->
  


<h1 id="text1"></h1>
<h1>Answer this via http://192.168.1.231/controller.php</h1>
<script>

<?php
$js_array = json_encode(array_values($textArray));
echo "var javascript_array = ". $js_array . ";\n";
?>


var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) 
    {
    		myIndex = 1;
    }
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000); // Change image every 4 seconds
    document.getElementById("text1").innerHTML =  myIndex +". " + javascript_array[myIndex-1];
}
</script>
	
	<!-- Uncomment for deployment  height="42" width="42"
	<h3 id="url">
		Here should appear the controller URL
	</h3>
	<img id="qr"></img>
	-->

	
</body>
</html>
