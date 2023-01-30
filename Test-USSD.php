<?php

// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$api_endpoint = 'https://api.africastalking.com/version1/messaging';
$username = 'sandbox';
$api_key = '6ea4d99d6644dff08c9cfdff6b9e09e62ac77e68e744b6aeb36e0d0e9aa94111';


if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON KARIBU SAFARI YANGU SERVICES (PATA TICKET HARAKA YA SAFARI) \n";
    $response .= "1. Lipia Ticket Yako \n";
    $response .= "2. Lipia Ticket ya Rafiki";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON INGIZA NAMBA SIRI KULIPA TSH 750/= KWENDA (SAFARI YANGU APP) \n";
    $response .= " \n";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON INGIZA NAMBA YA RAFIKI";

}

else if ($text == "2*0744242688") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON INGIZA NAMBA YA SIRI KUNUNUA TICKET KWA AJILI YA RAFIKI";
}

else if($text == "2*0744242688*2000") { 
    // This is a second level response where the user selected 1 in the first instance
    $output  = "UMELIPIA 750/= KWENDA KWA RAFIKI (0744242688) , HIVI PUNDE ATAPOKEA SMS YA TICKET CODE";

    // This is a terminal request. Note how we start the response with END
    $response = "END HONGERA ".$phoneNumber. "\t" .$output;

}

 else if($text == "1*2000") { 
    // This is a second level response where the user selected 1 in the first instance
    $output  = "UMELIPIA 750/= KWENDA SAFARI YANGU , HIVI PUNDE UTAPOKEA SMS YA TICKET CODE";


    // This is a terminal request. Note how we start the response with END
    $response = "END HONGERA ".$phoneNumber. "\t" .$output;
    system("curl -X GET http://192.168.43.217:7000/send-sms");

}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

?>