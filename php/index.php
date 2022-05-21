<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch API Demo</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<?php

$url = "https://gorest.co.in/public/v1/users";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: text/html",
   "Authorization: Bearer d7c01847de4c083cb154e9a533294301e9f05f93dbae7d589e42ece63226c0a3",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$resp = curl_exec($curl);
curl_close($curl);
$result = json_decode($resp);
// var_dump($result->data);

?>
<body>
    <h1 class="title">02: Fetch API Response PHP</h1>
    <div class="container">
        <?php
        foreach ($result->data as $user) {  
         echo "<div class='user'>
            <h5 class='user-id'>ID: {$user->id} <span>Status: {$user->status}</span> </h5>
            <h3>{$user->name} </h3>
            <h3>{$user->email}</h3>
            <h4>{$user->gender}</h4>
         </div>";
      } 
        ?>
    </div>
  
</body>