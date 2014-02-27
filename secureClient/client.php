<?php
require_once('libs/loader.php');
$hash = '0x589w';
$client = new SecureClient;
$soapClient = $client->__get('clientConnection');
$komodoClient = new KomodoClient($soapClient);
$response = $komodoClient->welcomeServer($_SERVER, $hash);