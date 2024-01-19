<!doctype html>
<html>

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


    <?php include("./modules/caroussel.php") ?>

    <!-- Start Playing Section -->
    <div class="container mx-auto text-left">
        <div class="text-tekst mt-16 mb-10 flex justify-center">
            <h2 class="text-3xl font-semibold">Alusta mängimist</h2>
        </div>
        <div class="flex flex-col items-center mb-16">
            <!-- First Image and Text -->
            <div class="relative">
                <img src="../assets/SP_firstpic.png" alt="First Image"
                    class="h-[352px] w-[1120px] object-cover rounded-t-md">
                <div class="absolute top-4 left-4 text-tekst">
                    <p class="text-2xl font-medium ml-[32px] mt-[32px]">Logi discordiga sisse..</p>
                    <a href="landing.php">
                        <iconify-icon icon="logos:discord-icon" width="50" height="40"
                            class="ml-10 mt-2"></iconify-icon>
                    </a>
                </div>
            </div>
            <!-- Second Image and Text -->
            <div class="relative">
                <img src="../assets/SP_secpic.png" alt="Second Image" class="h-[352px] w-[1120px] object-cover">
                <div class="absolute top-4 right-4 text-tekst">
                    <p class="text-2xl font-medium mr-[32px] mt-[32px]">Täida whitelist..</p>
                    <a href="whitelist-form.php">
                        <iconify-icon icon="pajamas:review-list" width="60" height="62" class="ml-24"></iconify-icon>
                    </a>
                </div>
            </div>
            <img src="../assets/arrowOne.svg" alt="" class="absolute mt-24" />
            <!-- Third Image and Text -->
            <div class="relative">
                <img src="../assets/SP_thirdpic.png" alt="Third Image"
                    class="h-[352px] w-[1120px] object-cover rounded-b-md">
                <div class="absolute top-4 left-4 text-tekst">
                    <p class="text-2xl font-medium ml-[32px] mt-[32px]">Ja hakka mängima!</p>
                    <a href="#">
                        <iconify-icon icon="simple-icons:fivem" width="50" height="40"
                            class="ml-10 mt-3"></iconify-icon>
                    </a>
                </div>
            </div>
            <img src="../assets/arrowTwo.svg" alt="" class="absolute mt-[450px]" />
        </div>
    </div>

    <!-- News Section -->
    <div class="bg-primary">
        <div class="container mx-auto">
            <div class="text-tekst flex justify-center">
                <h2 class="text-3xl font-semibold pt-16 pb-6">Visioon</h2>
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
                        class="h-96 w-1/2 rounded-md border-4 border-white ml-auto object-fill object-center">
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <img src="../assets/ped.jpg" alt="Second Image"
                        class="h-96 w-1/2 rounded-md border-4 border-white object-cover object-top">
                    <div class="relative ml-auto text-tekst w-1/2 p-4">
                        <p class="text-xl flex-shrink">Astudes meie serverisse, võib esmapilgul tunduda, et see
                            nõuab rohkem panustamist, kuid ärge laske ennast heidutada. Meie eesmärk on pakkuda midagi,
                            mis paneb sind mõtlema ja looma seiklusi, mis jäävad kauaks meelde. Koos keeruka
                            mängukeskkonnaga pakume mitmekülgseid kogemusi, ilma et peaksid läbima tüütu protsessi.
                        </p>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative text-tekst p-4 w-1/2">
                        <p class="text-xl flex-shrink">Siin ei ole pelgalt koht, kus teenida virtuaalset
                            valuutat rutiini tundes. Meie soov on, et sa sukelduksid sügavamale rollimängumaailma, kus
                            igal tegelasel on oma lugu ja igal otsusel on tagajärjed. Me ei tee asju kergelt, sest
                            usume, et just see teeb teekonna uute ja huvitavamate seiklusteni põnevaks.</p>
                    </div>
                    <img src="../assets/drugempire.png" alt="Third Image"
                        class="h-96 w-1/2 rounded-md border-4 border-white ml-auto object-left object-cover">
                </div>
                <div class="flex flex-row mb-16 items-center">
                    <img src="../assets/lisakarakter.png" alt="Second Image"
                        class="h-96 w-1/2 rounded-md border-4 border-white object-cover object-top">
                    <div class="relative ml-auto text-tekst w-1/2 p-4">
                        <p class="text-xl flex-shrink">Me ei propageeri ebavõrdsust ega toeta "pay to win"
                            mõtteviisi.
                            Meie jaoks on oluline säilitada tasakaalustatud mängukeskkond, kus kõik mängijad saavad
                            võrdse
                            võimaluse nautida põnevat rollimängu. Samas mõistame, et serveri arenguks on vaja rahastust,
                            kuid see ei tähenda, et peaksid loobuma oma põhimõtetest.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                <h1 class="text-2xl text-tekst mb-16">Liitu meiega, kus igal sammul võib avaneda uus ja põnev maailm. Ole
                    osa millestki suuremast!</h1>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>