<?php
/** WAHYU ARIF P **/
/** LAST UPDATE : 09 April 2019 16.35 **/

echo "
###BIG TOKEN REGISTER FILE NEW VERSION##
########################################
Jangan lupa donasi!\n
> Paypal : paypal.me/wahyuarifpurnomo\n
> OVO\t: 087719090011\n
Terimakasih banyak yang sudah donasi :')
########################################\n\n";

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
    $post = "password=Kontol123!&monetize=1&referral_id=$reff&email=$email";
    $arr = array("\r"," ");
    $headers = array();
    $headers[] = "Host: api.bigtoken.com";
    $headers[] = "X-Client-ID: WW1GelpUWTBPbnBFY1hBMFVrTnNWbUZ4VTNsbFVHSnVlV3BTWm1rd1JrWkhlbHBxWm5OaFVsWjJhM3BhUkhocloyczk=";
    $headers[] = "user-agent: BIGtoken/1.0.6.2 Dalvik/2.1.0 Linux; U; Android 8.1.0; 4b0e5fe4484d2ea6 Build/25";
    $headers[] = "Accept: application/json";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
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