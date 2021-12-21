<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!doctype html>
<html lang="en">
	<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" />
		<title>Capture</title>
		<style type="text/css"></style>
		<script type="text/javascript">
			function scan(){
				android.capture();
				//alert("test alert");
				//return true;
			}
			function Camera(){
				android.toast("test");
				//alert("test alert");
				//return true;
			}

		</script>
	</head>
	<body>
		<!--<p>
		<label for="soundFile">What does your voice sound like?:</label>
		<input type="file" id="soundFile" capture="user" accept="audio/*">
		</p>
		<p>
		<label for="videoFile">Upload a video:</label>
		<input type="file" id="videoFile" capture="environment" accept="video/*">
		</p>
		<p>
		<label for="imageFile">Upload a photo of yourself:</label>
		<input type="file" id="imageFile" capture="user" accept="image/*">
		</p>-->
		 <!-- <button onclick="Camera();" class="font-alz btnfontsize">Open Camera</button><br>
		  <button onclick="scan();" class="font-alz btnfontsize">Open Gallery</button>-->
		<form enctype="multipart/form-data" action="proses.php" method="POST">
		    <!-- MAX_FILE_SIZE must precede the file input field -->
		    <!--<input  type="hidden" name="MAX_FILE_SIZE" value="6000000" />-->
		    <!-- Name of input element determines name in $_FILES array -->

		    Send this file: <!--<input name="userfile" type="file" />-->
		    <input type="file" name="userfile" id="imageFile" capture="user" accept="image/*">
		    <input type="submit" onclick="Camera();" value="Send File" />
		</form>

		<!--<form action="proses.php" enctype="multipart/form-data" method="post">  
			<input name="MAX_FILE_SIZE" type="hidden" value="3000000" />  
			File Name : <input name="userfile" type="file" accept="audio/*" capture /> <hr>
			<input type="submit" value="Upload Now" />
		</form> -->

	</body>
</html>
<?php 
		/*$url = 'https://accurascan.com/api/v4/ocr';

			$data = array(
			'country_code'	=> 'IDN',
			'card_code'	=> 'INDIF',
			'scan_image' => $end_time_in_ms
			);

		$body = json_encode($data);

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type:application/json',
			'Api-Key: 16385153236w4M9GJWDdc0jRiianScoBgORdnkuOfR822qa2u5'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);	
		curl_setopt($ch, CURLOPT_POST, true);	
		$response = curl_exec($ch);	
		//$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		$header = curl_getinfo($ch);
		if (curl_errno($ch) === CURLE_OK) {
		    echo 'sukses ' . $response."<br><br>";
		    $res = json_decode($response, true);
		}elseif(curl_errno($ch)){
			echo 'Request Error:' . $errmsg."<br><br>";
			$res = "error";
		}
		curl_close($ch);*/
				
?>



