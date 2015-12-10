<?php
$data = array();
$data['phone'] =$_POST['mobilePhone'];
$data['app_key'] = 'xxxxxxxxxxxxxxxxxxxx';
$data['secret_key'] = 'yyyyyyyyyyyyyyyyy';
$data['message'] = $_POST['message'];
 
$post_str = '';
foreach($data as $key=> $value){
	$post_str .= $key. '=' .urlencode($value).'&';
	}
$post_str = substr($post_str, 0, -1);
if($_POST['submitted'] == 'true') {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.ringcaptcha.com/'.$data['app_key'].'/sms');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$response = curl_exec($ch);

curl_close($ch);

$sendnotification = '<div class="alert alert-success" role="alert"><strong>Success: </strong> SMS Send to recipient</div>';
}
?>
