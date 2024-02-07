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
<?php include("./modules/jumbotron.php") ?>

<body>

    <div class="bg-primary">
        <div class="text-tekst mx-auto py-16 max-w-screen-xl">
            <div class="flex flex-col justify-center">
                <h2 class="text-5xl font-bold mb-6">Meist</h2>
                <p class="text-xl flex-shrink p-4">
                Tere tulemast meie rollimängu serverisse, kus seiklus ja fantaasia saavad elu! Oleme pühendunud looma mängukeskkonna, 
                mis pakub mängijatele rohkem kui lihtsalt mängu - meie eesmärk on pakkuda tõelisi kogemusi ja seiklusi, mis jäävad meelde. 
                Meie server on loodud selleks, et anda mängijatele võimalus sukelduda sügavale põnevasse maailma, 
                kus igal nurgatagusel ootab avastamist väärt saladusi ja võimalusi.
                Me ei rahuldu tavapäraste lahendustega, sest meie jaoks on oluline pakkuda midagi täiesti uut ja ainulaadset. 
                Meie arendajad ja meeskond töötavad pidevalt selle nimel, et tuua mängijateni põnevaid uuendusi ja funktsioone, 
                mis rikastavad nende kogemust meie serveris.Oleme loonud kogukonna, kus iga mängija on oluline ning kus sõprussuhted 
                ja koostöö on võtmeks meie ühise seikluse edukusele. Olenemata sellest, kas oled kogenud rollimängija või alles alustav seikleja, 
                leiad meie serverist endale sobiva väljakutse ja seltskonna.
                Liitu meiega ja avasta ise, miks meie rollimängu server on paljude mängijate lemmikpaigaks, 
                kus veeta oma vaba aega ja luua unustamatuid mälestusi!
                </p>
            </div>
            <div class="flex flex-row justify-center items-center gap-4 p-4">
                <!-- Feature Box 1 -->
                <div class="bg-[#05070E] flex flex-col w-1/3 h-96 p-4 rounded-lg">
                    <span class="flex flex-row py-2">
                        <iconify-icon icon="tabler:mood-crazy-happy" width="40" height="40"
                            style="color: #ffec1f" class="drop-shadow-[0_0_10px_rgba(255,236,31,1)]"></iconify-icon>
                        <h3 class="text-3xl font-bold">Kogemus</h3>
                    </span>
                    <p class="flex-shrink text-xl">
                        Astudes meie serverisse, võib esmapilgul tunduda, et see nõuab rohkem panustamist, kuid ärge
                        laske
                        ennast heidutada. Meie eesmärk on pakkuda midagi, mis paneb sind mõtlema ja looma seiklusi,
                        mis jäävad kauaks meelde. Koos keeruka mängukeskkonnaga pakume mitmekülgseid kogemusi, ilma et
                        peaksid läbima tüütu protsessi.
                    </p>
                </div>

                <!-- Feature Box 2 -->
                <div class="bg-[#05070E] flex flex-col w-1/3 h-96 p-4 rounded-lg">
                    <span class="flex flex-row py-2">
                        <iconify-icon icon="basil:location-question-solid" class="drop-shadow-[0_0_10px_rgba(255,31,31,1)]" width="40" height="40" style="color: #ff1f1f"></iconify-icon>
                        <h3 class="text-3xl font-bold">Seiklus</h3>
                    </span>
                    <p class="flex-shrink text-xl">
                        Siin ei ole pelgalt koht, kus teenida virtuaalset valuutat rutiini tundes. Meie soov on, et sa
                        sukelduksid sügavamale rollimängumaailma, kus igal tegelasel on oma lugu ja igal otsusel on
                        tagajärjed. Me ei tee asju kergelt, sest usume, et just see teeb teekonna uute ja huvitavamate
                        seiklusteni põnevaks.
                    </p>
                </div>

                <!-- Feature Box 3 -->
                <div class="bg-[#05070E] flex flex-col w-1/3 h-96 p-4 rounded-lg">
                    <span class="flex flex-row py-2">
                    <iconify-icon icon="mdi:idea" class="drop-shadow-[0_0_10px_rgba(31,240,255,1)]" width="38" height="38" style="color: #1ff0ff"></iconify-icon>
                        <h3 class="text-3xl font-bold">Ideoloogia</h3>
                    </span>
                    <p class="flex-shrink text-xl">
                        Me ei propageeri ebavõrdsust ega toeta "pay to win" mõtteviisi. Meie jaoks on oluline säilitada
                        tasakaalustatud mängukeskkond, kus kõik mängijad saavad võrdse võimaluse nautida põnevat
                        rollimängu. Samas mõistame, et serveri arenguks on vaja rahastust, kuid see ei tähenda, et
                        peaksid loobuma oma põhimõtetest.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Start Playing Section -->
    <div class="bg-background">
        <div class="mx-auto text-left bg-background max-w-screen-xl">
            <div class="text-tekst pt-20 mb-6">
                <h2 class="text-5xl font-bold">Alusta mängimist</h2>
            </div>
            <div class="flex flex-col items-center px-4 pt-4 pb-16">

                <!-- First Image and Text -->
                <div class="relative">
                    <a href="landing.php">
                        <img src="../assets/Sp_1stFinal.png" alt="First Image"
                            class="h-1/3 w-screen object-cover rounded-t-md">
                    </a>
                    <div class="absolute top-4 left-4 text-tekst">
                        <p class="text-3xl font-medium ml-[32px] mt-[32px]">Logi discordiga sisse..</p>
                        <iconify-icon icon="logos:discord-icon" width="50" height="40"
                            class="ml-10 mt-2"></iconify-icon>
                    </div>
                </div>

                <!-- Second Image and Text -->
                <div class="relative">
                    <a href="whitelist-form.php">
                        <img src="../assets/Sp_2ndFinal.png" alt="Second Image" class="h-1/3 w-screen object-cover">
                    </a>
                    <div class="absolute top-4 right-4 text-tekst">
                        <p class="text-3xl font-medium mr-[32px] mt-[32px]">Täida whitelist..</p>
                        <iconify-icon icon="pajamas:review-list" width="60" height="62" class="ml-24"></iconify-icon>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="relative">
                    <a href="https://cfx.re/join/86646b" target="_blank">
                        <img src="../assets/Sp_3rdFinal.png" alt="Third Image"
                            class="h-1/3 w-screen object-cover rounded-b-md">
                    </a>
                    <div class="absolute top-4 left-4 text-tekst">
                        <p class="text-3xl font-medium ml-[32px] mt-[32px]">Ja hakka mängima!</p>
                        <iconify-icon icon="simple-icons:fivem" width="50" height="40"
                            class="ml-10 mt-3"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>