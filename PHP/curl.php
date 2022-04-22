<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/albums/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($ch);

curl_close($ch);

var_dump($data);