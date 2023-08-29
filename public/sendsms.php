<?php

function get_content_GET($url,$data)
{
	
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
    curl_setopt($ch, CURLOPT_CAINFO,'/etc/pki/tls/certs/ca-bundle.crt');
    //ob_start();
    if (curl_errno($ch)) echo 'Curl error: ' . curl_error($ch);
    else $curl_output=curl_exec($ch);
    curl_close($ch);   

echo "here comes 2";


 
   // ob_start();
    //curl_exec ($ch);
    //curl_close ($ch);
    //$string = ob_get_contents();
    //ob_end_clean();
    print_r($curl_output);
    //return $string;     

echo $curl_output."\n";
   return $curl_output;
}
//$msg ="Punjab Bye Elections 2023 to 04-Jalandhar(SC) PC, Dear Sector Officer, Your OTP for registration on PPDMS Mobile App is 1234. -CEOPJB";
$recNo = "9888933280";
//$template_id="1407168318422038309";
$template_id="1407169026079836976";

$msg="This is a test message. Please ignore the same.";
$data="username=pbgovt.sms&pin=wbx3actu&message=".$msg."&mnumber=".$recNo."&dlt_template_id=".$template_id."&signature=PBGOVT&msgType=UC&dlt_entity_id=1301157492438182299";
$url="https://smsgw.sms.gov.in/failsafe/HttpLink?";

$content = get_content_GET($url,$data);
echo $content."\n";

?>

