<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Result</title>
		<script type="text/javascript">
			function selesai(){
				android.done("done");
				//alert("test alert");
				//return true;
			}

		</script>
</head>
<body>

<?php ///deny
$sumber = $_FILES['userfile']['tmp_name'];
$string = str_replace(' ', '_', $_FILES['userfile']['name']);
$target = 'upload/'.$string;
//$target = 'upload/'.$_FILES['userfile']['name'];
$type = pathinfo($target, PATHINFO_EXTENSION);
$data = file_get_contents($target);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
 //echo $base64;
$uploadFile = $_FILES['userfile'];
// Extract nama file
echo "sumber File : ".$sumber." <br> ";
$name = $_FILES['userfile']['name']; //untuk mengetahui ukuran file
echo "name File : ".$string." <br> ";
$size = $_FILES['userfile']['size']; //untuk mengetahui ukuran file
echo "size File : ".$size." <br> ";
$tipe = $_FILES['userfile']['type'];// untuk mengetahui tipe file
echo "tipe File : ".$tipe." <br> ";
echo '<script type="text/javascript">selesai()</script>';
if(move_uploaded_file($sumber, $target)){
 echo "File Uploaded Successfully";
 echo "Uploaded File : <br> ";
 echo "<img src='$target'>";

 $url = 'https://accurascan.com/api/v4/ocr';

			$data = array(
			'country_code'	=> 'IDN',
			'card_code'	=> 'INDIF',
			'scan_image_url' => 'https://dev.alacards.id/dev/alacards/allianz/restapi_googlefit/capture/'.$target
			//'scan_image_base64' => $base64
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
		     //echo $res['Status'];
		     //echo $res['Message'];
		     //echo $res['data']['OCRdata']['face'];
		     echo 'nik : '.$res['data']['OCRdata']['nik']."<br>";
		     echo 'nama : '.$res['data']['OCRdata']['nama']."<br>";
		     echo 'tempat : '.$res['data']['OCRdata']['tempat']."<br>";
		     echo 'tgl_lahir : '.$res['data']['OCRdata']['tgl_lahir']."<br>";
		     echo 'rt/rw : '.$res['data']['OCRdata']['rt\/rw']."<br>";
		     echo 'kel/desa : '.$res['data']['OCRdata']['kel\/desa']."<br>";
		     echo 'kecamatan : '.$res['data']['OCRdata']['kecamatan']."<br>";
		     echo 'jenis kelamin : '.$res['data']['OCRdata']['jenis_kelamin']."<br>";
		     echo 'status : '.$res['data']['OCRdata']['status']."<br>";
		     echo 'kewarganegaraan : '.$res['data']['OCRdata']['kewarganegaraan']."<br>";
		     echo 'barlaku hingga : '.$res['data']['OCRdata']['barlaku_hingga']."<br>";
		}elseif(curl_errno($ch)){
			echo 'Request Error:' . $errmsg."<br><br>";
			$res = "error";
		}
		curl_close($ch);
}else{
	echo"Can't Upload Selected File ";
}

?>

</body>
</html>