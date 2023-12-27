<?php
//session_start();

//$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

/*if (!$isLoggedIn) {
    header("Location: landing.php");
    exit();
}*/

//extract($_SESSION["userData"]);
//$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";

$current_page = "rules";
//include('components/sidebar.php');

$rules = [
    [
        "section_name" => "POWERGAMING",
        "rules" => [
            "KÕIK TEGEVUSED MIS POLE PÄRISELUS VÕIMALIKUD ON KA SERVERIS KEELATUD. 
RP OLUKORDADES TULEB MÕELDA TEGEVUSED LÄBI, ENNE KUI NEID TEGEMA HAKKAD. 
PANE END ROLLI NAGU SA OLEKSID REAALSELT MÄNGUS, NING SA TUNNED ET SEE ASI POLE TEGELIKUSES VÕIMALIK (VÄLJAARVATUD FAIL DRIVE OLEV REEGEL). ",
            "RP OLUKORDADES PEAD SA SIISKI ENDA KARAKTERI ELU VÄÄRTUSTAMA, NÄITEKS SIND ÄHVARDATAKSE RELVA ABIL VÕI MÕNE MUU TERAVA RIISTA ABIL NING SINU ELU ON OHUS, SIIS SA KUULETUD SELLELE ISIKULE KES SIND ÄHVARDAB.",
            "KUI SELLISEID OLUKORDI EI OSKA ROLLIMÄNGU SERVERIS LÄBI MÄNGIDA, SIIS VÕIB JUHTUDA ET SINU KARAKTER VÕIB MINNA KUSTUTAMISELE VÕI SAAD KARISTADA."
        ]
    ],
    [
        "section_name" => "DEATHMATCH",
        "rules" => [
            "SERVERIS ON KEELATUD TUIMALT ILMA ROLLIMÄNGU OLUKORRATA VIGASTADA TEISI MÄNGIJAID, SAMUTI KA LAMBIST SOLVATA, VÄLJAARVATUD KUI HOODIS ON NÄITENA BEEFID JA ASJAD NING INIMESED MÖLISEVAD OMAVAHEL.",
            "REVENGE KILL ON KEELATUD, NÄITEKS KEEGI TAPAB SINU NING SIIS SINA LÄHED NÜÜD SIHILIKULT TEDA LASKMA, MUIDUGI SÕLTUB SEE OLUKORRAST, KUI TEGEMIST ON HOODI TAVAPÄRASE DRIVE-BYGA SIIS ON ARUSAADAV ET TAGASILÖÖK TULEB, KUID KUI SAAD SURMA NING SATUD HAIGLASSE, SIIS SINU KARAKTER EI MÄLETA EELNEVALT TOIMUNUD SÜNDMUSEST MIDAGI.",
            "
VEHICLE DEATHMATCH KEELATUD, VÄLJAARVATUD JUHTUDEL KUI JUHTUB ÕNNETUS NÄITEKS RACED JA INIMENE SATUB TEE PEAL SULLE OTSA. 
SIHILIKULT KELLEGI ALLA AJAMINE RANGELT KEELATUD."
        ]
    ],
    [
        "section_name" => "KARAKTERID & KONTOD & VARA",
        "rules" => [
            "PÄRISELUS KUULSUSTE NIMESID ON KEELATUD KASUTADA ENDA KARAKTERIS.",
            "KARAKTER PEAKS NÄGEMA VÄLJA UNIKAALNE NING VÕIKS KA OLLA NIMELISELT. ",
            "DEFAULT KARAKTERI VÄLIMUS ON KEELATUD, KARAKTER PEAKS NÄGEMA VÄLJA UNIKAALNE NING ERINEV TEISTEGA.",
            "SERVERIS ON KEELATUD MÜÜA KARAKTERI VARA IRL RAHA EEST, KARISTADA VÕIB SAADA NII VARA SAATJA, KUI KA VARA SAAJA.",
            "BANNI SAADES UUE KONTO TEGEMINE RANGELT KEELATUD."
        ]
    ],
    [
        "section_name" => "FAIL DRIVE",
        "rules" => [
            "FAIL DRIVE ON SERVERIS LUBATUD LINNAS, MIS TÄHENDAB SEDA, ET KÕIK ERINEVAD HÜPPED, MIS ON LINNAS OLEMAS ON LUBATUD KASUTADA, KUID IGAKS JUHUKS MAININ SEDA, ET ALATI ON MÕISTLIK MÕELDA MIDAGI UNIKAALSET ISE VÄLJA, MITTE ET KASUTATE TAVAPÄRASEID HÜPPEID, OLUKORD TULEB TEHA SIISKI HUVITAVAKS ENDA KARAKTERILE.",
            "FAIL DRIVE PEAKS TOIMIMA OLUKORRAS NII ET KUI SIND AJAB TAGA LSPD, SIIS SINU MÕELDUD HÜPE PEAKS OLEMA LÄBI MÕELDUD, MITTE ET PANED TUIMALT STUNTI.",
            "FAIL DRIVE ON KEELATUD VÄLJASPOOL LINNA, NÄITENA SIIS KUI SÕIDAD SAN ANDREASEST VÄLJA, KEELATUD ON MÄEHÜPPED SÕIDAD NÄITEKS MÄES NING TULEB KÕRGE MÄENÕLV NING OTSUSTAD SEALT 300-500M KAUGUSELE SÕITA.
KUI SÕIDAD VETTE, SIIS PEAD ARVESTAMA ET SINU ELU ON SIISKI OHUS JA PEAKSID SÕIDUKIST VÕIMALIKULT KIIRELT VÄLJA TULEMA, ET END PÄÄSTA.."
        ]
    ],
    [
        "section_name" => "EBAROLLILIK KARAKTERI KÄITUMINE / TROLLIMINE",
        "rules" => [
            "ISIK KES MÄNGIB OMA KARAKTERIT PEAKS OLEMA FOKUSEERITUD ENDA TEGEVUSTELE NING PEAKS MÕTLEMA REAALSELT ASJU VÄLJA.",
            "KARAKTER EI TOHI IGAVUSE SUHTES HAKKATA TROLLIMA NING SAMUTI EI TOHI RIKKUDA ERINEVAID REEGLEID NENDE TEGEVUSTE KÄIGUS.",
            "IGASUGUNE TUIM ÜLBITSEMINE TEISTE MÄNGIJATE VASTU ILMA ROLLIMÄNGU PÕHJUSETA, LIIGITUB EBAROLLILIKU KARAKTERI KÄITUMISE ALLA.
KARAKTER PEAKS AUSTAMA TEISI INIMESI, VÄLJAARVATUD OLUDEL KUI TEGEMIST ON REAALSE ROLLIMÄNGU OLUKORRAGA. 
"
        ]
    ],
    [
        "section_name" => "SAFEZONED",
        "rules" => [
            "SAFEZONE TÄHENDAB SEDA, ET ANTUD KOHAS ON KEELATUD IGASUGUNE - RÖÖVIMINE, TAPMINE, TULE AVAMINE JNE EDASI.",
            "SAFEZONE KUULUVAD ALAD; LEGAALSED FRAKTSIOONID, LSPD/EMS NING FRAKTSIOONIDE ÜMBRITSEV TÄNAV. ",
            "NB - KUI RP ON SAANUD ALGUSE VÄLJASPOOL SAFEZONE SIIS SEDA ON VÕIMALIK LÕPETADA SAFEZONES 2 TUNNI JOOKSUL. "
        ]
    ],
    [
        "section_name" => "RÖÖVIMINE / PANTVANG",
        "rules" => [
            "ET ISIKUT RÖÖVIDA PEAB OLEMA SELLEJAOKS VEENEV PÕHJUS RÖÖVIMISEKS.",
            "NIISAMA KEDAGI RÖÖVIDA IGAVUSEST ON KARISTATAV.",
            "SAMUTI ON KEELATUD ISIKUT SUNDIDA ET TA VÕTAKS PANGAKONTOLT RAHA VÄLJA.",
            "SULARAHA VÕIB VARASTADA KUNI 20,000$ KUI SELLEKS ON VEENEV RP PÕHJUS TEMA SULARAHA RÖÖVIMISEKS.",
            "RELVADE MUU OLEVATE PSÜHHOTROOPSETE AINETE SUHTES PIIRE MUIDUGI POLE, KUID TULEB MÕELDA SELLELE, ET KAS SEE RÖÖVIMINE ON SULLE RP KARAKTERILE KASULIK, NING KAS ON MÕISTLIK RÖÖVIDA JA KAS SELLEKS PEAB OLEMA PIISAVALT HEA PÕHJUS ASJADE ÄRA VÕTMISEKS.",
            "ERINEVAD PETTUSED ON KEELATUD - SÕIDUKID, KINNISVARA, RAHA, MIS TÄHENDAB SEDA ET NEID OLEVAID ASJU EI TOHI KELLEGILT VÄLJA PETTA.",
            "RIIGITÖÖTAJAL ON KEELATUD VARASTADA ERINEVAT VARUSTUST, KEHTIB KÕIGI RIIGITÖÖTAJATE  KOHTA, EHK SIIS NÄITEKS; SA EI VARASTA RELVA NYPD KAPIST NING EI VII SEDA ENDALE KOJU.",
            "ISIKU PANTVANGIKS VÕTMINE ON LUBATUD KUI SA EI TEE SEDA SAFEZONES, KUI RP SAI ALGUSE VÄLJASPOOL SAFEZONE SIIS SEE ON AKTSEPTEERITAV.
PANTVANG PEAB KUULETUMA RÖÖVLILE, JUHUL KUI EI KUULETU ON LUBATUD ISIK NEUTRALISEERIDA."
        ]
    ],
    [
        "section_name" => "SURM / CK / PK",
        "rules" => [
            "OLUKORRA NÄITED; SURED LAHINGALAL KUID POLE VEEL HAIGLAS ÄRGANUD, OLED MAAS NING OOTAD ABI, JUHUL KUI ABI SAABUB JA SIND VIIAKSE HAIGLASSE ON LUBATUD OLUKORRAGA UUESTI LIITUDA, KUI SURED LAHINGALAL NING SPAWNID HAIGLAS, SIIS ON KEELATUD SAMASSE OLUKORDA ÜHINEDA, VAID OMA ELUGA TULEB EDASI MINNA SEST SU KARAKTER EI MÄLETA MISKIT EELNEVAST SÜNDMUSEST, PUUDUTAB SIIS VIIMAST SÜNDMUST MILLEGA KOKKU PUUTUSID, OLGU SEE TULISTAMINE VÕI MÕNI MUU SÜNDMUS.",
            "KARAKTERILE CK TEHES PEAB OLEMA VÄGA PIKK MINEVIK KARAKTERIGA KELLELE TAHAD CK'D TEHA, KUI TEGEMIST ON GRUPEERINGUS OLEVA LIIKMEGA NING GRUPEERINGU BOSS OTSUSTAB CK'D TEHA, SIIS SEE KÄIB OLULISELT KIIREMINI KUI SELLEKS ON PÕHJUS OLEMAS.",
            "NÄITEKS NII EI TEHTA ISIKULE CK'D KUI ISIK VÕTAB SIND PANTVANGIKS JA SINA TAHAD TALLE KÄTTEMAKSU. ",
            "PK (PLAYER KILL) - SAAB MÄÄRATA AINULT EMS, KUI OLUKORD TUNDUS SINU JAOKS VÄGAGI OHTLIK ROLLIMÄNGULISES OLUKORRAS, SIIS JAH OTSELOOMULIKULT VÕID SA /ME COMMANDI ABIL KIRJUTADA 'PULSS PUUDUB' KUID REAALSES OLUKORRAS SEE EI PRUUGI SIND PÄÄSTA, NING KUI SEE ASI HAKKAB KORDUV OLEMA, SIIS VÕIB JUHTUDA ET SINU KARAKTER SAAB CK."
        ]
    ],
    [
        "section_name" => "AUTOVARGUSED",
        "rules" => [
            "AUTOT EI TOHI VARASTADA SAFEZONES ILMA RP PÕHJUSETA, AIND JUHUL KUI EELNEV RP OLUKORD SUNNIB SIND SEDA TEGEMA.
KUI AUTOVARGUS TOIMUB VÄLJASPOOL SAFEZONE, SIIS KOGU RP ON AUTOOMANIKU KÄTES, SEEGA HOIA ENDA VARA. "
        ]
    ],
    [
        "section_name" => "SPRAY WAR ",
        "rules" => [
            "SPRAY WAR'IL ON LUBATUD ERINEVAD LÜKKED, HÜPPED JA ASJAD + TEISED ERINEVAD TAKTIKALISED STIILID, SAMUTI ON KA LUBATUD KATUSED. 
SPRAY WARIL MÄNGIJATE PIIR JÄÄB 25 MÄNGIJA SISSE, OMA ALA KAITSED NII NAGU SA SEDA SOOVID, NING KUIDAS SA SEDA JÕUAD, SPRAY WAR SAAB ALGUSE SIIS KUI TEINE GRUPEERING ASUB TEISE GRUPEERINGU SPRAY NÜHKIMIST, NING AVALDAB SOOVI SEDA ALA ENDALE SAADA, MUIDUGI ANNAB ENNE SEDA RP-DA ANTUD SITUATSIOON LÄBI NING EI PEA OLEMA ALATI TULISTAMIST ANTUD OLUKORRAS, KUI LAHENDUST EI LEITA, SAAB ALGUSE SPRAY WAR, KUI LANGED NING SATUD SPAWNIGA HAIGLASSE EI OLE SUL VÕIMALIK ANTUD OLUKORDA ENAM SEKKUDA, VÄLJAARVATUD KUI TEGEMIST ON TEISE ALAGA. ",
            "SPRAY WARIL EI OLE LUBATUD KAASATA TEISI OLEVAID GRUPEERINGUID SPRAY WARILE KES POLE OSALEJAD, TÄHENDAB SEDA ET EI KUTSU TEISI GRUPEERINGUID SPRAY WARILE APPI, VAID SAATE ÜHESKOOS ÜHE GRUPEERINGUNA HAKKAMA."
        ]
    ],
    [
        "section_name" => "ERINEVATE SUHTLUSPLATVORMIDE KASUTAMINE VÄLJASPOOL MÄNGU",
        "rules" => [
            "OLUKORDADE SUHTES LOODAME ET INIMESED EI METAGAME LÄBI DISCORDI VÕI SIIS MÕNE MUU VAHENDI SUHTES, KUI JUHTUB ET SAAME SELLEST TEADA, SIIS SEE ON KARISTATAV. ",
            "(SOOVITUS TEHKE ENDA OLUKORD ENDALE PÕNEVAKS NING ÄRGE HAARAKE VÕIMU LÄBI DISCORDI NING ÄRGE MÕELGE 24/7 VÕIDULE)."
        ]
    ],
    [
        "section_name" => "OLUKORRA MÄNGIJATE PIIRANGUD",
        "rules" => [
            "KUI ISIKUD OSALEVAD RÖÖVIL VÕI MÕNES MUUS MASSILISES OLUKORRAS KUS ON TULIRELVA KASUTAMINE (VÄLJAARVATUD SPRAY WAR).",
            "MÄNGIJATE LIMIIT RÖÖVIS OSALEMISEL ON 10 INIMEST.",
            "REEGEL KEHTIB KÕIGI ILLEGAALSETE TEGEVUSTE KOHTA, MIS SERVERIS EKSISTEERIB, MIS SIIS PUUDUTAB TULIRELVA KASUTAMIST VÕI MÕNDA MUUD TEGEVUST, MIS ON ILLEGAALNE TEGEVUS."
        ]
    ],
    [
        "section_name" => "CHEATING/EELISTE KASUTAMINE",
        "rules" => [
            "CHEATIMINE ON SERVERIS KEELATUD, MIS IGANES SULLE EELISE ANNAB NII OLUKORDADE SUHTES VÕI AITAB SIND.",
            "TRACERID/EULEN + BLACK SKY, ERINEVAD TEISED ASJAD VEEL MIS VÕIVAD SINU EELIST ESILE TUUA.",
            "WIGGLE BOOST KEELATUD, TEISE SÕIDUKIGA TEIST OLEVAT AUTOT TAGANT BOOSTIDA KEELATUD."
        ]
    ],
    [
        "section_name" => "BUG ABUSE ",
        "rules" => [
            "KUI OLED LEIDNUD BUGI ANNA MEILE SELLEST TEADA, JUHUL KUI ANTUD ISIK EI TEAVITA MEILE BUG'IST NING ABUSEB SEDA, SIIS OLUKORD ON KARISTATAV. "
        ]
    ],
    [
        "section_name" => "RASSISM",
        "rules" => [
            "IGAT SORTI RASSISM ON SERVERIS KEELATUD NING SAMUTI KA ERINEVATEL SUHTLUSPLATVORMIDEL MIS ON SEOTUD SHINING SAN ANDREASE SERVERIGA."
        ]
    ],
    [
        "section_name" => "HAIGUSED",
        "rules" => [
            "HAIGUSTE RP-MINE ON SERVERIS LUBATUD, KUID KUI SEDA TEED SIIS TEE SEDA PROFESSIONAALSELT."
        ]
    ],
];


?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
</head>

<body class="bg-background">
    <?php include("navbar.php") ?>

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="z-10 top-0 h-16 lg:py-2.5">
            <div class="px-12 py-8 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-5xl font-medium text-slate-200 lg:block">Reeglid</h5>
            </div>
        </div>

        <div class="px-6 pt-20 2xl:container">


            <?php foreach ($rules as $section): ?>
                <h3
                    class="text-decoration-line: underline px-8 text-2xl font-bold leading-7 text-slate-200 sm:truncate sm:text-3xl sm:tracking-tight">
                    <?php echo $section["section_name"]; ?>
                </h3>
                <ul class="pt-2 px-7 text-slate-200 ">
                    <?php foreach ($section["rules"] as $rule): ?>
                        <li>•
                            <?php echo $rule; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>




        </div>
</body>

</html>