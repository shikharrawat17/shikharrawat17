<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con = mysqli_connect($server,$username,$password);
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // echo "Successful Connection";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $phone=$_POST['Phone'];
    $email=$_POST['email'];
    $other=$_POST['desc'];

    $sql ="INSERT INTO `trip`.`trip` (`Name`, `Age`, `Phone`, `Email`, `Other`, `Date_time`) VALUES ( '$name', '$age', '$phone', '$email', '$other', current_timestamp());";
    // echo $sql;

    if($con -> query($sql)==true){
        // echo "Successfully inserted";
        $insert=True;
    }
    else{
        echo "ERROR: $sql <br> $con->$error";
    }

    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome to travel form</title>
</head>
<body>
    <img src="./27-04-20-1100-mgi.jpg" >
    <div class="container">
        <h2>Welcome to MAIT Delhi</h2>
        <p>Enter Your details to confirm your participation in this trip</p> 
        <?php
        if ($insert==True) {
            echo "<p class='Submitmsg'>Thank you for submitting your form we will contact you shortly</p>";
        }

    ?>
        <form action="project.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="number" name="age" id="age" placeholder="Enter Your Age">
            <input type="Phone" name="Phone" id="Phone" placeholder="Enter Your Phone">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Your Extra info here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->

        </form>

    </div>
    <!-- INSERT INTO `trip` (`s_no`, `Name`, `Age`, `Phone`, `Email`, `Other`, `Date_time`) VALUES ('1', 'Shikhar Rawat', '19', '8851585743', 'shikhar.rawat2002@outlook.com', 'Very good very nice', current_timestamp()); -->

    
<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>
</html>