<?php
/** WAHYU ARIF P **/
/** LAST UPDATE : 03 April 2019 17.35 **/

echo "List \t\t: ";
$list = trim(fgets(STDIN));

echo "Refferal \t: ";
$reff = trim(fgets(STDIN));

echo "Delay \t\t: ";
$delay = trim(fgets(STDIN));

$file = file_get_contents("$list");
$data = explode("\n",$file);

for($a=1;$a<count($data);$a++){
    $data1 = explode("|",$data[$a]);
    $email = $data1[0];
    $post = "email=$email&password=%40Aq123456&referral_id=$reff&monetize=1";
    $arr = array("\r"," ");
    $headers = array();
    $headers[] = "content-type: application/x-www-form-urlencoded";
    $headers[] = "Accept-Encoding: gzip";
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "user-agent: Redmi 5A_7.1.2_1.0.6";
    $headers[] = "accept: application/json";
    $url = "https://api.bigtoken.com/signup";
    $h = explode("\n",str_replace($headers,"",""));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $obj = json_encode($result);
    echo "\e[1;92m$a. Done Register Email => $email\e[0m\n";
    print_r($obj);
    echo "\n";
    sleep($delay);
    curl_close($ch); 
}
?>