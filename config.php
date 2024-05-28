<?php
require_once realpath(__DIR__ . '/vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Discord API configuration
$discordClientId = '1164885070272802916';
$discordClientSecret = $_ENV['DISCORD_SECRET'];
$discordRedirectUri = "http://shiningrp.ee/vendor/webcp/discord/process-oauth.php"; // PRODUCTION
$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1164885070272802916&redirect_uri=http%3A%2F%2Fshiningrp.ee%2Fvendor%2Fwebcp%2Fdiscord%2Fprocess-oauth.php&response_type=code&scope=identify%20guilds" ; // PRODUCTION

//1193907621749600256
// Admin IDs
$adminIds = array("353539980225675264", "197473364128825345", /* add more admin IDs as needed */);  // 1. Endel 2. Blurrish


// Database Connection
$configDsn= "mysql:host=d124452.mysql.zonevs.eu;dbname=d124452sd523953";
$configDbName = "d124452sa474230";
$configDbPw = $_ENV['DB_PASSWORD'];



// ░██████╗██╗░░██╗░█████╗░██████╗░  ░█████╗░░█████╗░███╗░░██╗███████╗██╗░██████╗░
// ██╔════╝██║░░██║██╔══██╗██╔══██╗  ██╔══██╗██╔══██╗████╗░██║██╔════╝██║██╔════╝░
// ╚█████╗░███████║██║░░██║██████╔╝  ██║░░╚═╝██║░░██║██╔██╗██║█████╗░░██║██║░░██╗░
// ░╚═══██╗██╔══██║██║░░██║██╔═══╝░  ██║░░██╗██║░░██║██║╚████║██╔══╝░░██║██║░░╚██╗
// ██████╔╝██║░░██║╚█████╔╝██║░░░░░  ╚█████╔╝╚█████╔╝██║░╚███║██║░░░░░██║╚██████╔╝
// ╚═════╝░╚═╝░░╚═╝░╚════╝░╚═╝░░░░░  ░╚════╝░░╚════╝░╚═╝░░╚══╝╚═╝░░░░░╚═╝░╚═════╝░

// Coming soon
                                                    

// Questions and options for the quiz
$questionsAndOptions = [
    [
        'question' => 'Milline nimi sobiks Shining San Andreas serveri mängijale?',
        'options' => [
            ['text' => 'Joe Biden', 'isCorrect' => false],
            ['text' => 'Carl King', 'isCorrect' => true],
            ['text' => 'Lukas Meresaar', 'isCorrect' => true],
            ['text' => 'Rasmus Kuusk', 'isCorrect' => true],
        ],
    ],
    [
        'question' => 'Milline tegevus on Shining San Andreas serveris keelatud?',
        'options' => [
            ['text' => 'Sõidukiga inimese vigastamine ilma rollimänguliku põhjuseta', 'isCorrect' => true],
            ['text' => 'Sõidukiga sõitmine linnas', 'isCorrect' => false],
            ['text' => 'Kaubanduse alal legaalse äri pidamine', 'isCorrect' => false],
            ['text' => 'Fail Drive kõrgetes kohtades', 'isCorrect' => true],
        ],
    ],
    [
        'question' => 'Mis on keelatud, kui räägime Shining San Andreas serveri metagamingust?',
        'options' => [
            ['text' => 'Kasutada mängusisest informatsiooni, mis toimub väljaspool mängu', 'isCorrect' => true],
            ['text' => 'Kasutada mängusisest informatsiooni ainult mängus', 'isCorrect' => false],
            ['text' => 'Rääkida oma sõbrale mänguväliselt oma karakteri tegevustest', 'isCorrect' => true],
            ['text' => 'Kasutada mängus ebaõiglast tarkvara', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Millised on Shining San Andreas serveri röövimise piirangud?',
        'options' => [
            ['text' => 'Sularaha võib varastada kuni 20,000$', 'isCorrect' => true],
            ['text' => 'Isiku röövimiseks ei ole vaja mõjuvat põhjust', 'isCorrect' => false],
            ['text' => 'Riigitöötajatel on keelatud varastada riigi poolt antud varustust', 'isCorrect' => true],
            ['text' => 'Röövimise korral on lubatud sundida isikut pangakontolt raha välja võtma', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Milline neist on Shining San Andreas serveris ebarollimängulik käitumine?',
        'options' => [
            ['text' => 'Combatlog', 'isCorrect' => true],
            ['text' => 'Karakteri realistlik käitumine vastavalt serveri reeglitele', 'isCorrect' => false],
            ['text' => 'Copbait', 'isCorrect' => true],
            ['text' => 'Karakteri korrektne välimus', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on Powergaming Shining San Andreas serveris?',
        'options' => [
            ['text' => 'Teha midagi, mis pole päriselus võimalik', 'isCorrect' => true],
            ['text' => 'Rollimängida realistlikult', 'isCorrect' => false],
            ['text' => 'Osaleda seaduslikus tegevuses', 'isCorrect' => false],
            ['text' => 'Loomulikult suhtlemine teiste mängijatega', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on safezone reegel Shining San Andreas serveris?',
        'options' => [
            ['text' => 'Safezones on lubatud igasugune tegevus', 'isCorrect' => false],
            ['text' => 'Keelatud on safezones teha illegaalseid tegevusi', 'isCorrect' => true],
            ['text' => 'Keelatud on safezones sõidukitega sõitmine', 'isCorrect' => false],
            ['text' => 'Safezones võib käia ainult öösel', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on keelatud Deathmatch reegli järgi Shining San Andreas serveris?',
        'options' => [
            ['text' => 'Ilma rollimänguliku põhjuseta kellegi vigastamine', 'isCorrect' => true],
            ['text' => 'Võitlus ainult rollimänguliste põhjustega', 'isCorrect' => false],
            ['text' => 'Oma karakteri arendamine', 'isCorrect' => false],
            ['text' => 'Osaleda mängus', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Millised tegevused on Shining San Andreas serveris pantvangi võtmise osas keelatud?',
        'options' => [
            ['text' => 'Pantvangi võtmine ilma rollimängulise põhjuseta', 'isCorrect' => true],
            ['text' => 'Pantvangi tappa, kui ta ei kuuletu', 'isCorrect' => false],
            ['text' => 'Pantvangi vabastamine ilma nõudmisi esitamata', 'isCorrect' => false],
            ['text' => 'Pantvangi hoidmine lühikese aja jooksul', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on keelatud Shining San Andreas serveris cheateritele?',
        'options' => [
            ['text' => 'Kas kasutada visuaalseid ja eelist andvaid cheate', 'isCorrect' => true],
            ['text' => 'Mängida ausalt ja reeglite järgi', 'isCorrect' => false],
            ['text' => 'Osaleda serveri üritustel', 'isCorrect' => false],
            ['text' => 'Rollimängida realistlikult', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on keelatud bug abuse reegli järgi Shining San Andreas serveris?',
        'options' => [
            ['text' => 'Serveri siseste bugide kasutamine', 'isCorrect' => true],
            ['text' => 'Teavitada administraatoreid bugidest', 'isCorrect' => false],
            ['text' => 'Mängida mängu vastavalt reeglitele', 'isCorrect' => false],
            ['text' => 'Osaleda serveri bugi lahendamisel', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on Combatlog Shining San Andreas serveris?',
        'options' => [
            ['text' => 'Mängust lahkumine rollimängu keskel', 'isCorrect' => true],
            ['text' => 'Rollimängu alustamine uue karakteriga', 'isCorrect' => false],
            ['text' => 'Rollimängu lõpetamine pärast sündmuse lõppu', 'isCorrect' => false],
            ['text' => 'Sõidukiga sõitmine kõrgetes kohtades', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Milline tegevus on Shining San Andreas serveris keelatud fail drive reegli järgi?',
        'options' => [
            ['text' => 'Sõitmine mägedes ja kõrgetel katustel', 'isCorrect' => true],
            ['text' => 'Sõitmine maanteel', 'isCorrect' => false],
            ['text' => 'Sõitmine öösel', 'isCorrect' => false],
            ['text' => 'Sõitmine realistlikult', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Milline tegevus on Shining San Andreas serveris lubatud fail drive reegli järgi?',
        'options' => [
            ['text' => 'Taktikaliselt läbi mõeldud sõitmine', 'isCorrect' => true],
            ['text' => 'Sõitmine kõrgetel mägedel', 'isCorrect' => false],
            ['text' => 'Sõitmine realistlikult', 'isCorrect' => false],
            ['text' => 'Sõitmine suure kiirusega linnas', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on keelatud Shining San Andreas serveris CK/PK reeglite järgi?',
        'options' => [
            ['text' => 'CK tegemine ilma mõjuva põhjuseta', 'isCorrect' => true],
            ['text' => 'PK tegemine pärast põhjalikku analüüsi', 'isCorrect' => false],
            ['text' => 'CK tegemine grupeeringu liikmena põhjusega', 'isCorrect' => false],
            ['text' => 'PK tegemine ilma analüüsita', 'isCorrect' => true],
        ],
    ],
    [
        'question' => 'Mis on keelatud Shining San Andreas serveris seoses karakterite ja kontodega?',
        'options' => [
            ['text' => 'Päriselus kuulsuste nimede kasutamine', 'isCorrect' => true],
            ['text' => 'Unikaalse karakteri loomine', 'isCorrect' => false],
            ['text' => 'Topelt kontode tegemine', 'isCorrect' => true],
            ['text' => 'Rollimängulise vara müümine päriselu raha eest', 'isCorrect' => true],
        ],
    ],
    [
        'question' => 'Mis on keelatud Shining San Andreas serveris seoses rassismiga?',
        'options' => [
            ['text' => 'Rassismi kasutamine ilma rollimängulise põhjenduseta', 'isCorrect' => true],
            ['text' => 'Rollimängulised juhtumid, kus rassism on aktsepteeritud', 'isCorrect' => false],
            ['text' => 'Rassismi üldine keelamine', 'isCorrect' => false],
            ['text' => 'Osalemine serveri üritustel', 'isCorrect' => false],
        ],
    ],
    [
        'question' => 'Mis on Shining San Andreas serveris haiguse reegli puhul oluline?',
        'options' => [
            ['text' => 'Arvestada teiste mängijate heaoluga', 'isCorrect' => true],
            ['text' => 'Mitte kasutada oma karakteril haigusi', 'isCorrect' => false],
            ['text' => 'Haiguste täielik vältimine', 'isCorrect' => false],
            ['text' => 'Haiguste loomine ainult rollimängu huvides', 'isCorrect' => true],
        ],
    ],
];
