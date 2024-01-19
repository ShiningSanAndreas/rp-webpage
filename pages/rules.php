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
        "section_name" => "POWERGAME",
        "rules" => [
           "Kõik tegevused mis pole päriselus võimalikud on ka serveris keelatud!"
        ]
    ],
    [
        "section_name" => "RÖÖVIMINE & VARGUSED",
        "rules" => [
            "Isiku röövimiseks peab olema mõjuv põhjus. Lihtsalt rikastumise või igavusesest röövimine on keelatud.",
            "Keelatud on sundida isikut pangakontolt raha välja võtma.",
            "Sularaha võib varastada kuni 20,000$, illegaalsetel esemetel piirid puuduvad.",
            "Keelatud on lootida isikut, kes on nokkis/surnud."
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
    <title>Reeglid - ShiningRP</title>
</head>

<body class="bg-background">
    <?php include("./modules/navbar.php") ?>

    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="z-10 top-0 h-16 lg:py-2.5">
            <div class="px-12 py-8 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-5xl font-medium text-tekst lg:block">Reeglid</h5>
            </div>
        </div>

        <div class="px-6 pt-20 2xl:container">

    <div class="border-l rounded mt-8 border-light shadow-shadBef py-4 hover:shadow-shadAft">
        <h3 class="text-xl font-bold leading-7 text-text px-4 mb-8 ">
            <span class="text-2xl font-semibold text-accent">OLUSTIK:</span>
        </h3>
        <div class="px-8 text-tekst">
               <p>Shining San Andreas asub State Of San Andreas osariigis, linnaks Los Santos kus lähedal asub Sandy Shores ja Paleto Bay linnaosad. 
New Yorkis elavad tavapäraselt ameeriklased kelle keeleks kujuneb inglise keel - (eesti keel), kuid jagub ka Teistest riikidest olevaid kodanike. 
New Yorkis elavatel inimestele pakutakse riigi poolt erinevaid tööotsi elatise teenimiseks. Ilm võib olla oluliselt muutuv. Riigi juhtimisega tegeleb linnavalitsus, kes abistab riigis elavaid kodanike, juhul kui seda neil vaja on. Riik peab ka oluliseks erinevaid sündmusi - jõulud, halloween, et tuua kogu San Andrease pere kokku. Siin linnas meie ei tea mis riigid on - Wortex RP. - (Samuti ka ei puutu me kokku ka eestlastega).
Server põhineb Ameerika Ühendriigis, New York City's. </p>
</div>
    </div>

</div>

        <div class="px-6 pt-20 2xl:container pb-10">

            <?php foreach ($rules as $key => $section): ?>
                <div class="border-l rounded mt-8 border-light shadow-shadBef py-4 hover:shadow-shadAft">
                    <h3 class="text-xl font-bold leading-7 text-tekst px-4 mb-8 ">
                        <span class="text-2xl font-semibold text-accent"><?php echo 'REEGEL ' . ($key + 1); ?>:</span> <?php echo $section["section_name"]; ?>
                    </h3>
                    <ul class="px-8 text-tekst">
                        <?php foreach ($section["rules"] as $rule): ?>
                            <li>• <?php echo $rule; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

<?php include("./modules/footer.php") ?>
</html>