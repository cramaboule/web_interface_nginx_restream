<?php
$message = "";
if(isset($_POST['SubmitButton'])){ //check if form was submitted
	$YoutubeInput = $_POST['Youtube']; //get input text
	$FacebookInput = $_POST['Facebook']; //get input text
	$path_to_file = 'restream.conf';
	$file_contents = file_get_contents($path_to_file);
	//echo "input: ".$file_contents."\n<br>";
	// FB
	$regexFB='/(?<=\/rtmp\/)(.*)(?=;)/m';
	$file_contents = preg_replace ($regexFB, $FacebookInput, $file_contents);

	// YT
	$regexYT='/(?<=\/live2\/)(.*)(?=;)/m';
	$file_contents = preg_replace ($regexYT, $YoutubeInput, $file_contents);

	//echo "output: ".$file_contents."\n<br>"; 
	$result = file_put_contents($path_to_file, $file_contents);
	if ($result === false) {
		$message = "error 1 !!!";
	} else {
		 if(exec("sudo /etc/init.d/nginx reload")) {
				$message = "Success !"; //$message = "Success!";// You entered: ".$FacebookInput.' '.$YoutubeInput;
			} else {
				$message = "error 2 !!!";
			}
	}
	?>
	<!doctype html>
	<html lang="en">
	  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link href="main.css" rel="stylesheet">
		<body>
		<form class="form-signin">
		<h1><?php echo $message; ?></h1>
		</form>
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	  </body>
	</html>
		<?php
		$_POST = array();
		unset($_POST);
		exit;
		//
	}
//
$path_to_file = 'restream.conf';
$file_contents = file_get_contents($path_to_file);
//echo "input: ".$file_contents."\n<br>";

//YT
$regex='/(?<=\/live2\/)(.*)(?=;)/m';
preg_match($regex, $file_contents, $YouTubeKey);

// FB
$regex='/(?<=\/rtmp\/)(.*)(?=;)/m';
preg_match($regex, $file_contents, $FacebookKey);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="main.css" rel="stylesheet">
<body>


<form action="" method="post" class="form-signin">
<h1>Change Facebook and YouTube keys</h1>
  <label for="pwd">Youtube Key: </label>
  <input type="password" id="pwdY1" name="Youtube" value="<?php echo $YouTubeKey[0]; ?>" size="100"><input type="checkbox" onclick="pwd1()">Show<br><br>
  <label for="pwd">Facebook Key: </label>
  <input type="password" id="pwdF2" name="Facebook" value="<?php echo $FacebookKey[0]; ?>" size="100"><input type="checkbox" onclick="pwd2()">Show<br><br>
  <input type="submit" class="btn btn-primary" name="SubmitButton"/>
</form>
<script>
function pwd1() {
  var x = document.getElementById("pwdY1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function pwd2() {
  var x = document.getElementById("pwdF2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
</html>
