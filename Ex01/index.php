<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Marc - Ivan - Christians NewsFeed</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     </ul>
  </div>
</nav>
<div class="container-fluid">
<div class="row ">
<div class="col-12" >
<?php
require_once 'RESTful.php';


$url = 'http://api.serri.codefactory.live/random/';
$response = curl_get($url);
$json = json_decode($response);
$joke = $json->joke;
$id = $json->id_joke; 


 
//var_dump($json->joke);
echo '<div class="jumbotron">
<h1 class="display-4">Joke of the Day!</h1>
<p class="lead">Presented by Serri\'s joke No.'.$id.'</p>

<p>'.$joke.'</p>
<a class="btn btn-primary btn-lg" href="index.php" role="button">Next joke</a>
</div>';


?>

</div>

<div class="row justify-content-center ">
<?php

$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);
foreach ($xml->channel->item as $item) {
    echo '<div class="card mt-2 mb-2 col-4" "><div class="card-body ">
    <h5 class="card-title"><a href="'.$item->link.'" target"_blank">'.$item->title.'</a></h5>
    <p class="card-text">'.$item->description.'</p></div></div>';
}
?>
</div>
</div>
<div class="row justify-content-around">


</div>


</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>


