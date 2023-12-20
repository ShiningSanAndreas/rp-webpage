<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 4.1.2
// *
// * Copyright (c) 2023 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /vendor/webcp/404/index.php' ) );
}
// ************************************************************************************//
// * Discord Web-Hook Settings
// ************************************************************************************//
const DCWEBHOOK_URL = "https://discord.com/api/webhooks/1164890817282986045/FUH-1k6WWKYTTpdqtTckvWXlscdQqPFgSrmDqMHRrv5JSzQ9crIclXYG5UX4_doxI8a_";

// ************************************************************************************//
// * Discord Web-Hook Settings
// ************************************************************************************//
const DCOAUTH_URL = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&redirect_uri=http%3A%2F%2Fshiningrp.ee%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&response_type=code&scope=identify%20guilds";

// ************************************************************************************//
// * Discord Web-Hook Avatar Settings
// ************************************************************************************//
const DCWEBHOOK_AVATAR = "https://xucp-v4.derstr1k3r.de/res/themes/default/assets/images/logo-icon.png";

// ************************************************************************************//
// * Discord Web-Hook Botname Settings
// ************************************************************************************//
const DCWEBHOOK_NAME = "Shining San Andreas BOT";
