<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
 error_reporting(0);
 ini_set('display_errors', 'Off');
require('script.php');



$alltickets = curlWrap("/tickets.json", null, "GET");



if(isset($alltickets)){

		foreach($alltickets as $data){
			foreach ($data as $tickets) {
				echo '
				<br />
				<div class="container">
					<div class="well">
						<h1> '.$tickets->subject.' </h1> <br />
						<p style="font-style:italic;">Type: '.$tickets->type.'</p>
						<p style="font-style:italic;">Priotet: '.$tickets->priority.'</p>
						<p style="font-style:italic;">Status: '.$tickets->status.'</p><br /> <br/>
						<h3>Svar på ticket</h3><br />

				';

				$comments = curlWrap("/tickets/".$tickets->id."/comments.json", null, "GET");

				foreach ($comments as $data1) {
					foreach ($data1 as $comment1) {

						echo '<hr><p>'.$comment1->html_body.'</p> <br />

						';


				}

			}
			echo "	</div> </div> ";
		}
	}
}
		else{
			echo "fejl";
}



//Created by MadeByOleander - Christoffer Oleander Nielsen - Copyright: MadeByOleander.com

 ?>


</body>
</html>
