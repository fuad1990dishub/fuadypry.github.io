
text/x-generic syd2.php ( PHP script, ASCII text, with CRLF line terminators )
<?php

require 'vendor/autoload.php';


$client = new \GuzzleHttp\Client();
    $ua = ['User-Agent' => 'okhttp/4.9.2'];
       
	$base_lat = -0.94400; //36
        $base_lng = 114.90490; //36
        $acak = rand(5, 36)/100000;
        $acak2 = rand(5, 36)/100000;
        $lat_baru = $base_lat-$acak;
        $lng_baru = $base_lng+$acak2;



    $m =  $client->post('https://ekinerja.baritoutarakab.go.id/api/presentapp/login', [
      'headers' => $ua,
      'form_params' => [
         'user' => '199111272024211008', //196909171991032013
         'pass' => 'Ikhwan271191',
	'imei'=> '7acff809dbb0geh',
	'dname' => 'SM-iwan',
      ],
    ])->getBody()->getContents();

$t=json_decode($m,true);


    $n =  $client->post('https://ekinerja.baritoutarakab.go.id/api/presentapp/sndloc', [
      'headers' => $ua,
      'form_params' => [
        'token' => $t['token'],
        'lat' => $lat_baru,
	'lang'=>$lng_baru,
        'zjam' => base64_encode('16:00:01'),
	'stimo' => 1,
	'status'=>0

      ],
    ])->getBody()->getContents();
    echo $n;


?>
