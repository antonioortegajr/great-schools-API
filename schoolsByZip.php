<?php

//Sample API call to get schools by zip code. Offical docs: http://www.greatschools.org/api/docs/main.page

//API key can be obtained from Great Schools
$apiKey= 'yourKeyHere';

//parametors to pass in endpoint. These are seperated by &
$params ='&state=oregon&zip=97401';


$curl = curl_init();

//set up cURL
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.greatschools.org/schools/nearby?key='.$apiKey.$params,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

//store response
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

//report errors or echo response
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
