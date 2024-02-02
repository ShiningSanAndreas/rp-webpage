<!doctype html>
<html>

<?php
session_start();
$current_page = "Home";

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Avaleht - ShiningRP</title>
</head>

<?php include("./modules/navbar.php") ?>

<body class="bg-background">

    <?php include("./modules/jumbotron.php") ?>

    <div class="bg-primary">
        <div class="container mx-auto">
            <div class="text-tekst flex justify-center">
                <h2 class="text-3xl font-semibold pt-16 pb-6">Meist</h2>
            </div>
            <div class="flex flex-col px-48">

                <!-- First Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative text-tekst p-4 w-1/2">
                        <p class="text-xl flex-shrink">Kui otsid midagi enamat kui tavaline mängukeskkond, siis
                            oled leidnud oma tee. Meie eesmärk on luua koht, kus mäng ei ole lihtsalt ajaviide, vaid
                            elamus, kus iga tegevus viib sind sügavamale põnevasse maailma. Me ei ole rahul igapäevaste
                            lahendustega, sest me usume, et mängijatel peaks olema võimalus avastada midagi täiesti uut
                            ja ainulaadset.</p>
                    </div>
                    <img src="../assets/levelSys.png" alt="Second Image"
                        class="h-96 w-1/2 rounded-md ml-auto object-fill object-center">
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <img src="../assets/ped.jpg" alt="Second Image"
                        class="h-96 w-1/2 rounded-md object-cover object-top">
                    <div class="relative ml-auto text-tekst w-1/2 p-4">
                        <p class="text-xl flex-shrink">Astudes meie serverisse, võib esmapilgul tunduda, et see
                            nõuab rohkem panustamist, kuid ärge laske ennast heidutada. Meie eesmärk on pakkuda midagi,
                            mis paneb sind mõtlema ja looma seiklusi, mis jäävad kauaks meelde. Koos keeruka
                            mängukeskkonnaga pakume mitmekülgseid kogemusi, ilma et peaksid läbima tüütu protsessi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Playing Section -->
    <div class="container mx-auto text-left">
        <div class="text-tekst mt-16 mb-10 flex justify-center">
            <h2 class="text-3xl font-semibold">Alusta mängimist</h2>
        </div>
        <div class="flex flex-col items-center mb-16">

            <!-- First Image and Text -->
            <div class="relative">
                <a href="landing.php">
                    <img src="../assets/Sp_1stFinal.png" alt="First Image" class="h-[352px] w-[1140px] object-cover rounded-t-md">
                </a>
                <div class="absolute top-4 left-4 text-tekst">
                    <p class="text-2xl font-medium ml-[32px] mt-[32px]">Logi discordiga sisse..</p>
                    <iconify-icon icon="logos:discord-icon" width="50" height="40" class="ml-10 mt-2"></iconify-icon>
                </div>
            </div>

            <!-- Second Image and Text -->
            <div class="relative">
                <a href="whitelist-form.php">
                    <img src="../assets/Sp_2ndFinal.png" alt="Second Image" class="h-[352px] w-[1140px] object-cover">
                </a>
                <div class="absolute top-4 right-4 text-tekst">
                    <p class="text-2xl font-medium mr-[32px] mt-[32px]">Täida whitelist..</p>
                    <iconify-icon icon="pajamas:review-list" width="60" height="62" class="ml-24"></iconify-icon>
                </div>
            </div>

            <!-- Third Image and Text -->
            <div class="relative">
                <a href="https://cfx.re/join/86646b" target="_blank">
                    <img src="../assets/Sp_3rdFinal.png" alt="Third Image"
                        class="h-[352px] w-[1140px] object-cover rounded-b-md">
                </a>
                <div class="absolute top-4 left-4 text-tekst">
                    <p class="text-2xl font-medium ml-[32px] mt-[32px]">Ja hakka mängima!</p>
                    <iconify-icon icon="simple-icons:fivem" width="50" height="40" class="ml-10 mt-3"></iconify-icon>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary">
        <div class="text-tekst container mx-auto py-16">
            <div class="flex flex-col justify-center">
                <h2 class="text-5xl font-bold mb-6">Meist</h2>
                <p class="text-lg mb-12 flex-shrink">
                    Kui otsid midagi enamat kui tavaline mängukeskkond, siis oled leidnud oma tee. Meie eesmärk on luua
                    koht,
                    kus mäng ei ole lihtsalt ajaviide, vaid elamus, kus iga tegevus viib sind sügavamale põnevasse
                    maailma.
                    Me
                    ei ole rahul igapäevaste lahendustega, sest me usume, et mängijatel peaks olema võimalus avastada
                    midagi
                    täiesti uut ja ainulaadset.
                </p>
            </div>
            <div class="flex flex-row justify-center items-center gap-4">
                <!-- Feature Box 1 -->
                <div class="bg-[#05070E] flex flex-col w-5/12 h-96 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4">Avastamine ja Elamus</h3>
                    <p class="flex-shrink text-lg">
                        Astudes meie serverisse, võib esmapilgul tunduda, et see nõuab rohkem panustamist, kuid ärge
                        laske
                        ennast heidutada. Meie eesmärk on pakkuda midagi, mis paneb sind mõtlema ja looma seiklusi,
                        mis jäävad kauaks meelde. Koos keeruka mängukeskkonnaga pakume mitmekülgseid kogemusi, ilma et
                        peaksid läbima tüütu protsessi.
                    </p>
                </div>

                <!-- Feature Box 2 -->
                <div class="bg-[#05070E] flex flex-col w-5/12 h-96 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4">Sügav Rollimängumaailm</h3>
                    <p class="flex-shrink text-lg">
                        Siin ei ole pelgalt koht, kus teenida virtuaalset valuutat rutiini tundes. Meie soov on, et sa
                        sukelduksid sügavamale rollimängumaailma, kus igal tegelasel on oma lugu ja igal otsusel on
                        tagajärjed. Me ei tee asju kergelt, sest usume, et just see teeb teekonna uute ja huvitavamate
                        seiklusteni põnevaks.
                    </p>
                </div>

                <!-- Feature Box 3 -->
                <div class="bg-[#05070E] flex flex-col w-5/12 h-96 p-4 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4">Tasakaalustatud Mängukeskkond</h3>
                    <p class="flex-shrink text-lg">
                        Me ei propageeri ebavõrdsust ega toeta "pay to win" mõtteviisi. Meie jaoks on oluline säilitada
                        tasakaalustatud mängukeskkond, kus kõik mängijad saavad võrdse võimaluse nautida põnevat
                        rollimängu. Samas mõistame, et serveri arenguks on vaja rahastust, kuid see ei tähenda, et
                        peaksid loobuma oma põhimõtetest.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>