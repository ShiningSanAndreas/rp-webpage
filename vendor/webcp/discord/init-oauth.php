<?php

$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&redirect_uri=http%3A%2F%2Fshiningrp.ee%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&response_type=code&scope=identify%20guilds" ;
header("Location: $discord_url");
exit();

?>