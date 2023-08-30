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
    //curl_setopt($ch, CURLOPT_CAINFO,'/etc/pki/tls/certs/ca-bundle.crt');
    //ob_start();
    if (curl_errno($ch)) echo 'Curl error: ' . curl_error($ch);
    else $curl_output=curl_exec($ch);
    curl_close($ch);   

echo $curl_output."\n";


 
    print_r($curl_output);
    //return $string;     

echo $curl_output."\n";
   return $curl_output;
}


     function THex($str) 
        {
        	$unicode = array();
	        $values = array();
        	$lookingFor = 1;
        	for ($i = 0; $i < strlen($str); $i++) 
                {
            		$thisValue = ord($str[$i]);
		            if ($thisValue < 128) 
                            {
                		$number = dechex($thisValue);
		                $unicode[] = (strlen($number) == 1) ? '%u000' . $number : "%u00" . $number;
            		    } 
                            else 
                            {
               			if (count($values) == 0)
		                $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
		                $values[] = $thisValue;
                		if (count($values) == $lookingFor) 
				{
                    			$number = ( $lookingFor == 3 ) ?
                           		( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ) :
		                        ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64);
                    			$number = dechex($number);
                    			$unicode[] =(strlen($number) == 3) ? "%u0" . $number : "%u" . $number;
                    			$values = array();
		                        $lookingFor = 1;
                		} // if
            		    } // if
                }
        	return implode("", $unicode);
        }

$msg ="Dear Vatan Garg ,your letter has been received by Others . For future communications please refer to receipt no. 1802150/2022/Div7. Regards, PANKAJ JAIN , You can track your Medical bills at https://hrms.punjab.gov.in, eOffice Punjab State.";
$msg = str_replace('%u', '',THex($msg));
$recNo = "917888379164";

$template_id="1407165174274928332";


 $str="username=pbgovt.sms&pin=wbx3actu&message=".$msg."&mnumber=".$recNo."&dlt_template_id=".$template_id."&signature=PBGOVT&msgType=UC&dlt_entity_id=1301157492438182299";
$url="https://smsgw.sms.gov.in/failsafe/HttpLink?";

echo "\n".$str."\n";
 echo "\n".$url."\n";

	$content = get_content_GET($str,$url);
	echo $content."\n";

?>

