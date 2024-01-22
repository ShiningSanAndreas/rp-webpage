<?php
// config.php

// Discord API configuration
$discordClientId = '1193907621749600256';
$discordClientSecret = "IkPYC7yxAqH_tRVIxV0Z_Hn24PX9pooE";
//$discordRedirectUri = "http://shiningrp.ee/vendor/webcp/discord/process-oauth.php"; // PRODUCTION
//$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&redirect_uri=http%3A%2F%2Fshiningrp.ee%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&response_type=code&scope=identify%20guilds" ; // PRODUCTION

$discordRedirectUri = "http://127.0.0.1:8000/vendor/webcp/discord/process-oauth.php"; // LOCALHOST
$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1193907621749600256&response_type=code&redirect_uri=http%3A%2F%2F127.0.0.1%3A8000%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&scope=identify+guilds" ; // LOCALHOST


// Admin IDs
$adminIds = array("353539980225675264", "197473364128825345", /* add more admin IDs as needed */);  // 1. Endel 2. Blurrish


// Database Connection
$configDsn= "mysql:host=d124452.mysql.zonevs.eu;dbname=d124452sd523953";
$configDbName = "d124452sa474230";
$configDbPw = "57q0Hl6hmqZzCva";
?>