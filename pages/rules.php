<?php

session_start();

$current_page = "rules";


$rules = [
    [
        "section_name" => "POWERGAMING",
        "rules" => [
            "Kõik tegevused mis pole päriselus võimalikud on ka serveris keelatud.",
    ]
 ],
  [
        "section_name" => "DEATHMATCH, VEHICLE DEATHMATCH",
        "rules" => [
            "Keelatud on ilma rollimänguliku põhjuseta kellegi vigastamine.",
            "Keelatud on sõidukiga vigastada inimest.",
        ]
    ],
    [
        "section_name" => "KARAKTERID, KONTOD, VARA",
        "rules" => [
            "Päriselus kuulsuste nimesid on keelatud serveris kasutada.",
            "Karakter peab nägema välja unikaalne. Unikaalse karakteri tähendus viitab karakteri korrektsele välimusele.",
            "Serveris on keelatud rollimänguliku vara müüa päriselu raha eest maha. Karistada saab vara saaja, kui ka vara saatja.",
            "Topelt kontode tegemine on rangelt keelatud.",
        ]
    ],
    [
        "section_name" => "FAIL DRIVE",
        "rules" => [
            "Fail Drive on serveris lubatud, kuid erinevad taktikad võiksid olla läbi mõeldud. ",
            "Fail Drive on keelatud kõrgetes kohtades. Näiteks mäed, kõrged katused.",
        ]
    ],
     [
        "section_name" => "EBAROLLIMÄNGULIK KÄITUMINE",
        "rules" => [
            "Karakter peab käituma korrektselt, jälgides serveri reegleid ning arvestama olukordadega realistliku elu piires.",
            "Combatlog on keelatud.",
            "Copbait on keelatud."
        ]
    ],
     [
        "section_name" => "SAFEZONED",
        "rules" => [
            "Keelatud on safezones teha erinevaid illegaalseid tegevusi. Juhul kui tegevus sai alguse väljaspool safezone'i.",
            "Kõik avalikud kohad, kus käib legaalne äri ning juhtimine. Näitena - isik B avas enda restorani.",
        ]
    ],
[
        "section_name" => "RÖÖVIMINE",
        "rules" => [
            "Isiku röövimiseks peab olema mõjuv põhjus.",
            "Keelatud on sundida isikut pangakontolt raha välja võtma.",
            "Sularaha võib varastada kuni 20,000$. Teistel illegaalsetel esemetel puudub piir.",
            "Keelatud on lootida isikut, kes on nokkis/surnud.",
            "Pettused on keelatud. Näitena - kinnisvara, sõidukid, raha.",
            "Riigitöötajatel on keelatud varastada, müüa edasi, riigi poolt antud varustust.",
            "Keelatud on pantvangi võtmine, ilma rollimängulise põhjuseta. Kui pantvang ei kuuletu röövija tegevustele, siis on lubatud pantvang tappa."
        ]
    ],
    [
        "section_name" => "CK/PK",
        "rules" => [
            "Karakteri CK tegemiseks peab olema mõjuv põhjus.",
            "Grupeeringute liikmetel on lubatud CK teha. Kui selleks on põhjust.",
            "PK'd määrates, tuleb analüüsida põhjalikult patsiendi vigastusi. ",
        ]
    ],
     [
        "section_name" => "METAGAMING",
        "rules" => [
            "Keelatud on kasutada mängusisest informatsiooni, mis toimub väljaspool mängu.",
        ]
    ],
    [
        "section_name" => "OLUKORRA MÄNGIJATE PIIRANGUD",
        "rules" => [
            "Kõikidel illegaalsetel tegevustel osalemise röövijate limiit on 10 mängijat.",
        ]
    ],
    [
        "section_name" => "CHEATING",
        "rules" => [
            "Keelatud on kasutada erinevaid eelist andvaid visuaale/cheate.",
        ]
    ],
    [
        "section_name" => "BUG ABUSE",
        "rules" => [
            "Serveri siseste bugide kasutamine on keelatud.",
        ]
    ],
    [
        "section_name" => "RASSISM",
        "rules" => [
            "Serveris on rassism keelatud. Kuid antud reeglil võib olla rollimängus juhuseid, kus seda aktsepteeritakse.",
        ]
    ],
    [
        "section_name" => "HAIGUSED",
        "rules" => [
            "Sinu karakteril võivad olla erinevaid haiguseid, kuid tuleb arvestada teiste mängijate heaoluga.",
        ]
    ],
];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Reeglid - ShiningRP</title>
</head>

<?php require __DIR__ . "/./modules/navbar.php" ?>
<body class="bg-background">
    <div class="ml-auto mb-6 max-w-screen-lg mx-auto">
        <div class="lg:py-2.5">
            <div class="my-16 flex items-center space-x-4">
                <h2 class="text-2xl font-nihilist italic p-4 text-tekst lg:p-0">Reeglid</h2>
            </div>
        </div>

        <div class="px-6">

            <div class="border-l rounded border-light shadow-shadBef hover:shadow-shadAft py-4">
                <h3 class="text-xl font-bold leading-7 text-text px-4 mb-8 ">
                    <span class="text-2xl font-semibold text-accent">OLUSTIK:</span>
                </h3>
                <div class="px-8 text-tekst">
                    <p>Shining San Andreas asub State Of San Andreas osariigis, linnaks Los Santos kus lähedal asub
                        Sandy Shores ja Paleto Bay linnaosad.
                        New Yorkis elavad tavapäraselt ameeriklased kelle keeleks kujuneb inglise keel - (eesti keel),
                        kuid jagub ka Teistest riikidest olevaid kodanike.
                        New Yorkis elavatel inimestele pakutakse riigi poolt erinevaid tööotsi elatise teenimiseks. Ilm
                        võib olla oluliselt muutuv. Riigi juhtimisega tegeleb linnavalitsus, kes abistab riigis elavaid
                        kodanike, juhul kui seda neil vaja on. Riik peab ka oluliseks erinevaid sündmusi - jõulud,
                        halloween, et tuua kogu San Andrease pere kokku. Siin linnas meie ei tea mis riigid on - Wortex
                        RP. - (Samuti ka ei puutu me kokku ka eestlastega).
                        Server põhineb Ameerika Ühendriigis, New York City's. </p>
                </div>
            </div>

        </div>

        <div class="px-6 pt-20 2xl:container pb-10">

            <?php foreach ($rules as $key => $section): ?>
                <div class="border-l rounded mt-8 border-light shadow-shadBef py-4 hover:shadow-shadAft">
                    <h3 class="text-xl font-bold leading-7 text-tekst px-4 mb-8 ">
                        <span class="text-2xl font-semibold text-accent">
                            <?php echo 'REEGEL ' . ($key + 1); ?>:
                        </span>
                        <?php echo $section["section_name"]; ?>
                    </h3>
                    <ul class="px-8 text-tekst">
                        <?php foreach ($section["rules"] as $rule): ?>
                            <li>•
                                <?php echo $rule; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

<?php require __DIR__ . "/./modules/footer.php" ?>

</html>