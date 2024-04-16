<?php
// config.php

// Discord API configuration
$discordClientId = '1164885070272802916';
$discordClientSecret = "IkPYC7yxAqH_tRVIxV0Z_Hn24PX9pooE";
//$discordRedirectUri = "http://shiningrp.ee/vendor/webcp/discord/process-oauth.php"; // PRODUCTION
//$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&redirect_uri=http%3A%2F%2Fshiningrp.ee%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&response_type=code&scope=identify%20guilds" ; // PRODUCTION

$discordRedirectUri = "http://127.0.0.1:8000/vendor/webcp/discord/process-oauth.php"; // LOCALHOST
$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&response_type=code&redirect_uri=http%3A%2F%2F127.0.0.1%3A8000%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&scope=identify+guilds" ; // LOCALHOST

//1193907621749600256
// Admin IDs
$adminIds = array("353539980225675264", "197473364128825345", /* add more admin IDs as needed */);  // 1. Endel 2. Blurrish


// Database Connection
$configDsn= "mysql:host=d124452.mysql.zonevs.eu;dbname=d124452sd523953";
$configDbName = "d124452sa474230";
$configDbPw = "57q0Hl6hmqZzCva";

$questionsAndOptions = [
    [
        'question' => 'Milline nimi sobiks Shining San Andreas serveri mängijale?',
        'options' => [
            ['text' => 'Joe Biden', 'isCorrect' => false],
            ['text' => 'Carl King', 'isCorrect' => true],
            ['text' => 'Lukas Meresaar', 'isCorrect' => false],
            ['text' => 'Rasmus Kuusk', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Saad twitchi streamist teada, et Mount Chiliadis toimub event, kus on palju looti. Milline on lubatud käitumisviis??',
        'options' => [
            ['text' => 'Lähen teada saadud infoga eventi asukohta ning üritan osa varast endale saada.', 'isCorrect' => false],
            ['text' => 'Saadan mõne sõbra enda eest asukohta, et eventi kohta rohkem infot koguda.', 'isCorrect' => false],
            ['text' => 'Annan OOC sõbrale teada, et ta mulle IC helistaks ja eventist teada annaks et saaksin kohale minna.', 'isCorrect' => false],
            ['text' => 'Ignoreerin streamist kuuldud infot ning jätkan rollimängu nagu tavaliselt.', 'isCorrect' => true],
        ],
    ],
    [
        'question' => 'What is the largest mammal?',
        'options' => [
            ['text' => 'Elephant', 'isCorrect' => false],
            ['text' => 'Blue Whale', 'isCorrect' => true],
            ['text' => 'Giraffe', 'isCorrect' => false],
            ['text' => 'Lion', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Who wrote "Romeo and Juliet"?',
        'options' => [
            ['text' => 'William Shakespeare', 'isCorrect' => true],
            ['text' => 'Jane Austen', 'isCorrect' => false],
            ['text' => 'Charles Dickens', 'isCorrect' => false],
            ['text' => 'Mark Twain', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'In which year did the Titanic sink?',
        'options' => [
            ['text' => '1912', 'isCorrect' => true],
            ['text' => '1900', 'isCorrect' => false],
            ['text' => '1925', 'isCorrect' => false],
            ['text' => '1935', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'What is the square root of 144?',
        'options' => [
            ['text' => '12', 'isCorrect' => true],
            ['text' => '15', 'isCorrect' => false],
            ['text' => '10', 'isCorrect' => false],
            ['text' => '18', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Which element has the chemical symbol "O"?',
        'options' => [
            ['text' => 'Oxygen', 'isCorrect' => true],
            ['text' => 'Gold', 'isCorrect' => false],
            ['text' => 'Iron', 'isCorrect' => false],
            ['text' => 'Carbon', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'What is the currency of Japan?',
        'options' => [
            ['text' => 'Yen', 'isCorrect' => true],
            ['text' => 'Dollar', 'isCorrect' => false],
            ['text' => 'Euro', 'isCorrect' => false],
            ['text' => 'Pound', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Who painted the Mona Lisa?',
        'options' => [
            ['text' => 'Leonardo da Vinci', 'isCorrect' => true],
            ['text' => 'Vincent van Gogh', 'isCorrect' => false],
            ['text' => 'Pablo Picasso', 'isCorrect' => false],
            ['text' => 'Michelangelo', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'What is the main ingredient in guacamole?',
        'options' => [
            ['text' => 'Avocado', 'isCorrect' => true],
            ['text' => 'Tomato', 'isCorrect' => false],
            ['text' => 'Onion', 'isCorrect' => false],
            ['text' => 'Cilantro', 'isCorrect' => false],
        ],
    ],
];

