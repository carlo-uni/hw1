
<?php

    if(isset($_GET["contenuto"]) && $_GET["servizio"]=='Carte Magic')
    {
        $rar=$_GET["contenuto"];
        $rer=urlencode($rar);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,"https://api.aakhilv.me/fun/facts");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        
        echo $result;
        curl_close($curl);
    }
    else if(isset($_GET["contenuto"]) && $_GET["servizio"]=='NASA')
    {
        $data=$_GET["contenuto"];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,"https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=".$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        echo $result;
        curl_close($curl);
    }
?>

