<?php
$passPhrase = 'xxxxxxxx'; //SQID API Passphrase 
$data = array();
$data['methodName'] = 'processPayment';
$data['merchantCode'] = 'FJVF';
$data['apiKey'] = 'YYYYYYYYYYYYYYYYYYYYYYY'; //SQID API KEY
$data['amount'] = '1.00';
$data['currency'] = 'AUD';
$data['referenceID'] = time();
$data['customerName'] = 'Max Yu';
$data['customerHouseStreet'] = '10 Moggill Rd';
$data['customerSuburb'] = 'Toowong';
$data['customerCity'] = 'Brisbane';
$data['customerState'] = 'QLD';
$data['customerCountry'] = 'AUS';
$data['customerPostCode'] = '4066';
$data['customerMobile'] = '0400000000';
$data['customerEmail'] = 'your_email@domain.com';
$data['customerIP'] = '120.0.0.1';
$data['cardNumber'] = 'XXXXXXXXXXXXXXXXX';
$data['cardExpiry'] = '0219';
$data['cardName'] = 'Bob Smith';
$data['cardCSC'] = 'XXX';
$data['customField1'] = 'c1';
$data['customField2'] = 'c2';
$data['customField3'] = 'c3';
$data['hashValue'] = md5($passPhrase.$data['amount'].$data['apiKey']); //PassPhrase + Amount + APIKey
 
$obj = json_encode($data);

$url = 'https://api.staging.sqidpay.com/Post';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PORT, 443);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $obj);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
