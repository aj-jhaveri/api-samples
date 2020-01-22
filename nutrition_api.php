<?php
if (isset($_GET['query']) && $_GET['query'] != '') {
  $url = 'https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/quickAnswer';
  $query_fields = [
    	    'q' => $_GET['query']
  ];

  $curl = curl_init($url . '?' . http_build_query($query_fields));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    	    'X-RapidAPI-Host: spoonacular-recipe-food-nutrition-v1.p.rapidapi.com',
    	    'X-RapidAPI-Key: e812b2da15mshfc5a9b889d00eddp15ea5bjsna9d4c816923a'
  ]);
  $response = json_decode(curl_exec($curl), true);
  curl_close($curl);

  $quickAnswer = $response;
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ask A Health Question</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
  <h2 class="m-5">Ask A Health Question</h2>	
  <form class="m-5" action="" method="get">
    	    <label for="query">Enter your nutrition related question:</label>
    	    <input id="query" type="text" name="query" />
    	    <br />
    	    <button type="submit" name="submit">Search</button>
  </form>
  <br />
  <?php
  if (!empty($quickAnswer)) {
			echo '<div class="m-5">';
    	    echo '<b>Your Quick Health Response:</b>';
			echo '<p>' . $quickAnswer[answer] . '</p>';
			echo '<img src="' . $quickAnswer[image] . '"></img>';
			 echo '</div>';
  }
  ?>
</body>
</html>