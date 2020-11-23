<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

<div class="container-fluid">
<div class="row justify-content-around">


<?php 

require_once 'RESTful.php';

$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);
foreach ($xml->channel->item as $item) {
    echo '<div class="card" style="width: 18rem;"><div class="card-body">
    <h5 class="card-title"><a href="'.$item->link.'" target"_blank">'.$item->title.'</a></h5>
    <p class="card-text">'.$item->description.'</p></div></div>';
}
?>

</div>
<div class="row justify-content-around">

<?php
$url = 'http://api.serri.codefactory.live/random/';
$response = curl_get($url);
$json = json_decode($response);
$joke = $json->joke;
$id = $json->id_joke;

//var_dump($json->joke);
echo '<div class="card" style="width: 18rem;"><div class="card-body">
<h5 class="card-title">Serri\'s joke No.'.$id.'</h5>
<p class="card-text">'.$joke.'</p></div></div>';

?>


</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>


