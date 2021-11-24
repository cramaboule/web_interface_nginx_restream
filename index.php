	<!doctype html>
	<html lang="en">
	  <head>
		<title>Clé Stream</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<link href="main.css" rel="stylesheet">
		<!-- fontawesome -->
		<script src="https://kit.fontawesome.com/83dc952732.js" crossorigin="anonymous"></script>
		</head>
		<body>
		<div class="container">
<?php
$message = '&nbsp;';
$regexYT='/(?<=\/live2\/)(.*)(?=;)/m';
$regexFB1='/(?<=\/rtmp\/)(.*)(?=;#FB1)/m';
$regexFB2='/(?<=\/rtmp\/)(.*)(?=;#FB2)/m';

if(isset($_POST['SubmitButton'])){ //check if form was submitted
	$YoutubeInput = $_POST['Youtube']; //get input text
	$FacebookInput1 = $_POST['Facebook1']; //get input text
	$FacebookInput2 = $_POST['Facebook2']; //get input text
	$path_to_file = 'restream.conf';
	$file_contents = file_get_contents($path_to_file);
	//echo "input: ".$file_contents."\n<br>";
	// FB1
	$file_contents = preg_replace ($regexFB1, $FacebookInput1, $file_contents);

	// FB2
	$file_contents = preg_replace ($regexFB2, $FacebookInput2, $file_contents);
	
	// YT
	$file_contents = preg_replace ($regexYT, $YoutubeInput, $file_contents);

	//echo "output: ".$file_contents."\n<br>"; 
	$result = file_put_contents($path_to_file, $file_contents);
	if ($result === false) {
		$message = "error 1 !!!";
	} else {
		if(exec("sudo /etc/init.d/nginx reload")) {
			$message = "Clés Changées !"; //$message = "Success!";// You entered: ".$FacebookInput.' '.$YoutubeInput;
		} else {
			$message = "error 2 !!!";
		}
	}
	?>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
	<div class="modal fade" id="myModal" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?php echo $message; ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
				</div>
			</div>
		</div>
	</div>
<?php
}
//

$path_to_file = 'restream.conf';
$file_contents = file_get_contents($path_to_file);
//echo "input: ".$file_contents."\n<br>";

//YT
// $regex='/(?<=\/live2\/)(.*)(?=;)/m';
preg_match($regexYT, $file_contents, $YouTubeKey);

// FB1
// $regex='/(?<=\/rtmp\/)(.*)(?=;)/m';
preg_match($regexFB1, $file_contents, $FacebookKey1);

// FB2
// $regex='/(?<=\/rtmp\/)(.*)(?=;)/m';
preg_match($regexFB2, $file_contents, $FacebookKey2);

?>
		<h1 <div class="mb-4">Clés YouTube et Facebook</h1>
		<form action="" method="post" class="form-signin">
		<div class="row mb-4">
			<label for="pwd1"  class="col-sm-2 col-form-label">Clé Youtube:</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="password" class="form-control" id="pwdY1" name="Youtube" value="<?php echo $YouTubeKey[0]; ?>">
					<button class="btn btn-primary" type="button" id="btn1" onclick="showpwd('pwdY1')"><i id="eyepwdY1" class="far fa-eye"></i></button>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-form-label" for="pwd2">Clé Facebook:</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="password" class="form-control" id="pwdF1" name="Facebook1" value="<?php echo $FacebookKey1[0]; ?>">
					<button class="btn btn-primary" type="button" id="btn2" onclick="showpwd('pwdF1')"><i id="eyepwdF1" class="far fa-eye"></i></button>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-form-label" for="pwd3">Clé secours Facebook:</label>
			<div class="col-sm-10">
				<div class="input-group">
					<input type="password" class="form-control" id="pwdF2" name="Facebook2" value="<?php echo $FacebookKey2[0]; ?>">
					<button class="btn btn-primary" type="button" id="btn3" onclick="showpwd('pwdF2')"><i id="eyepwdF2" class="far fa-eye"></i></button>
				</div>
			</div>
		</div>
		<input type="submit" class="float-end btn btn-primary" name="SubmitButton"/>
	</form>
</div>
<script>
function showpwd(a) {
  var x = document.getElementById(a);
  var y = document.getElementById("eye"+a);
  console.log(y)
  if (x.type === "password") {
    x.type = "text";
	y.className = "far fa-eye-slash";
  } else {
    x.type = "password";
	y.className = "far fa-eye";
  }
}
</script>
	</body>
</html>
