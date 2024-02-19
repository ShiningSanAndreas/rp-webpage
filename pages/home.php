<?php
session_start();
$current_page = "Home";

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@X.X.X/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <title>Avaleht - ShiningRP</title>
</head>

<?php include("./modules/navbar.php") ?>
<?php include("./modules/jumbotron.php") ?>

<body>
    <div class="bg-primary">
        <div class="text-tekst mx-auto py-16 max-w-screen-lg">
            <div class="flex flex-col justify-center">
                <h2 class="text-4xl font-bold mb-6 pl-4 ">Meist</h2>
                <p class="text-lg flex-shrink p-4">
                    Tere tulemast meie rollimängu serverisse, kus seiklus ja fantaasia saavad elu! Oleme pühendunud
                    looma mängukeskkonna,
                    mis pakub mängijatele rohkem kui lihtsalt mängu - meie eesmärk on pakkuda tõelisi kogemusi ja
                    seiklusi, mis jäävad meelde.
                    Meie server on loodud selleks, et anda mängijatele võimalus sukelduda sügavale põnevasse maailma,
                    kus igal nurgatagusel ootab avastamist väärt saladusi ja võimalusi.
                    Me ei rahuldu tavapäraste lahendustega, sest meie jaoks on oluline pakkuda midagi täiesti uut ja
                    ainulaadset.
                    Meie arendajad ja meeskond töötavad pidevalt selle nimel, et tuua mängijateni põnevaid uuendusi ja
                    funktsioone,
                    mis rikastavad nende kogemust meie serveris.Oleme loonud kogukonna, kus iga mängija on oluline ning
                    kus sõprussuhted
                    ja koostöö on võtmeks meie ühise seikluse edukusele. Olenemata sellest, kas oled kogenud
                    rollimängija või alles alustav seikleja,
                    leiad meie serverist endale sobiva väljakutse ja seltskonna.
                    Liitu meiega ja avasta ise, miks meie rollimängu server on paljude mängijate lemmikpaigaks,
                    kus veeta oma vaba aega ja luua unustamatuid mälestusi!
                </p>
            </div>
            <div class="flex flex-row justify-center items-center gap-4 p-4 flex-wrap">
                <!-- Feature Box 1 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="tabler:mood-crazy-happy" width="40" height="40" style="color: #ffec1f"
                            class="drop-shadow-[0_0_10px_rgba(255,236,31,1)]"></iconify-icon>
                        <h3 class="text-3xl font-bold">Kogemus</h3>
                    </span>
                    <p class="flex-shrink text-md">
                        Astudes meie serverisse, võib esmapilgul tunduda, et see nõuab rohkem panustamist, kuid ärge
                        laske
                        ennast heidutada. Meie eesmärk on pakkuda midagi, mis paneb sind mõtlema ja looma seiklusi,
                        mis jäävad kauaks meelde. Koos keeruka mängukeskkonnaga pakume mitmekülgseid kogemusi, ilma et
                        peaksid läbima tüütu protsessi.
                    </p>
                </div>

                <!-- Feature Box 2 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="basil:location-question-solid"
                            class="drop-shadow-[0_0_10px_rgba(255,31,31,1)]" width="40" height="40"
                            style="color: #ff1f1f"></iconify-icon>
                        <h3 class="text-3xl font-bold">Seiklus</h3>
                    </span>
                    <p class="flex-shrink text-md">
                        Siin ei ole pelgalt koht, kus teenida virtuaalset valuutat rutiini tundes. Meie soov on, et sa
                        sukelduksid sügavamale rollimängumaailma, kus igal tegelasel on oma lugu ja igal otsusel on
                        tagajärjed. Me ei tee asju kergelt, sest usume, et just see teeb teekonna uute ja huvitavamate
                        seiklusteni põnevaks.
                    </p>
                </div>

                <!-- Feature Box 3 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="mdi:idea" class="drop-shadow-[0_0_10px_rgba(31,240,255,1)]" width="38"
                            height="38" style="color: #1ff0ff"></iconify-icon>
                        <h3 class="text-3xl font-bold">Ideoloogia</h3>
                    </span>
                    <p class="flex-shrink text-md">
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
        <div class="mx-auto text-left bg-background max-w-screen-lg p-4 xl:p-0 ">
            <div class="text-tekst pt-20 mb-6">
                <h2 class="text-4xl font-bold">Alusta mängimist</h2>
            </div>
            <div class="flex flex-col pt-4 pb-16">

                <!-- First Image and Text -->
                <div class="flex flex-row flex-wrap justify-center lg:justify-between pb-8">
                    <div class="text-tekst xl:w-1/3">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">1</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Autentimine</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 lg:px-0">Logi discordiga sisse..</h3>
                        <p class="flex flex-shrink text-md px-4 lg:px-0">..Et alustada oma lugu meie serveris, logi sisse läbi
                            discordi. Siis saad ligipääsu. Näeme Shining San Andreases!</p>
                        <a href="landing.php">
                            <button class="bg-primary h-10 my-4 rounded-full text-md px-4 mx-4 lg:mx-0">
                                Logi sisse
                            </button>
                        </a>
                    </div>
                    <img src="../assets/Sp_1stFinal.png" alt="First Image" class="w-80 h-80">
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row flex-wrap-reverse justify-center lg:justify-between pb-8">
                    <img src="../assets/Sp_2ndFinal.png" alt="First Image" class="w-80 h-80">
                    <div class="text-tekst xl:w-1/3">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">2</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Ligipääs</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 lg:px-0">Täida Whitelist..</h3>
                        <p class="flex flex-shrink text-md px-4 lg:px-0">..Et ligipääsu serverisse saada, täida whitelist, siis
                            teame, et oled sobilik ja reegleid järgiv mängija.</p>
                        <a href="whitelist-form.php">
                            <button class="bg-primary h-10  my-4 rounded-full text-md px-4 mx-4 lg:mx-0">
                                Mine whitelisti
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="flex flex-row flex-wrap justify-center lg:justify-between pb-8">       
                    <div class="text-tekst xl:w-1/3">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">3</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Ühinemine</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 lg:px-0">Hakka mängima!</h3>
                        <p class="flex flex-shrink text-md px-4 lg:px-0">Jehuu! Oled viimase sammu juures. Nüüd ainult vaja panna RP püksid jalga ja ühineda serveriga. Näeme linnapeal ;)</p>
                        <a href="https://cfx.re/join/86646b" target="_blank">
                            <button class="bg-primary h-10 my-4 rounded-full text-md px-4 mx-4 lg:mx-0">
                                Ühine serveriga
                            </button>
                        </a>
                    </div>
                    <img src="../assets/Sp_3rdFinal.png" alt="First Image" class="w-80 h-80">
                </div>
            </div>
        </div>

    </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>