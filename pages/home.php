<?php
session_start();
$current_page = "home";

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

<?php require __DIR__ . '/./modules/navbar.php'; ?>
<?php require __DIR__ . '/./modules/jumbotron.php'; ?>

<body>
    <!-- About Us Section -->
    <div class="bg-primary">
        <div class="text-tekst mx-auto py-16 max-w-screen-lg">
            <div class="flex flex-col justify-center p-4 lg:p-0">
                <h2 class="text-4xl font-bold mb-6">Meist</h2>
                <p class="text-lg flex-shrink p-4">
                Shining San Andreas on loodud pakkuma GTA V mängijatele parimat rollimängukogemust. Meie serveris on oluline kogukondlikkus, kaasahaarav mängustiil ja võrdsed võimalused kõigile mängijatele. Meie eesmärk on luua koht, kus igaüks saab väljendada oma loovust ja seigelda põnevas San Andrease maailmas.

                </p>
            </div>
            <div class="flex flex-row justify-center items-center gap-4 lg:p-4 flex-wrap">
                <!-- Feature Box 1 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="tabler:mood-crazy-happy" width="40" height="40" style="color: #ffec1f"
                            class="drop-shadow-[0_0_10px_rgba(255,236,31,1)]"></iconify-icon>
                        <h3 class="text-3xl font-bold pb-4 ">Kogukond</h3>
                    </span>
                    <p class="flex-shrink text-md text-center">
                    Meie server on koduks mitmekesisele ja sõbralikule kogukonnale. Olgu sa kogenud mängija või alles alustaja, siin on alati keegi, kes sind aitab ja toetab. Me usume, et ühiselt saame luua meeldejäävaid mängukogemusi ning toetada üksteist nii mängus kui ka väljaspool seda.
                    </p>
                </div>

                <!-- Feature Box 2 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="basil:location-question-solid"
                            class="drop-shadow-[0_0_10px_rgba(255,31,31,1)]" width="40" height="40"
                            style="color: #ff1f1f"></iconify-icon>
                        <h3 class="text-3xl font-bold pb-4">Aus mäng</h3>
                    </span>
                    <p class="flex-shrink text-md text-center">
                    Shining San Andreases ei toeta me pay-to-win süsteeme. Meie serveris loevad ainult sinu oskused ja loovus. <br><br>Tule ja näita, milleks sa võimeline oled – ausalt ja läbipaistvalt. Me usume, et parim mängukogemus saavutatakse õigluse, aususe ja võrdsuse alusel.
                    </p>
                </div>

                <!-- Feature Box 3 -->
                <div class="bg-[#06091a] flex flex-col w-80 h-80 p-4 rounded-lg">
                    <span class="flex flex-row">
                        <iconify-icon icon="mdi:idea" class="drop-shadow-[0_0_10px_rgba(31,240,255,1)]" width="38"
                            height="38" style="color: #1ff0ff"></iconify-icon>
                        <h3 class="text-3xl font-bold pb-4">Võimalused</h3>
                    </span>
                    <p class="flex-shrink text-md text-center">
                    Shining San Andreas pakub laia valikut erinevaid rollimänguvõimalusi ja tegevusi. Loo oma lugu ja ela see täiega läbi, olgu see siis seaduse valvur, kuritegelik geenius või midagi vahepealset. Meie serveris on avatud uued ideed ja loomingulised lähenemised, mis muudavad iga mängija kogemuse unikaalseks ja põnevaks.
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
            <div class="flex flex-col md:p-4 pb-16">
                <!-- First Image and Text -->
                <div class="flex flex-row flex-wrap justify-center md:justify-between pb-12">
                    <div class="text-tekst md:w-1/3 md:self-center">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">1</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Autentimine</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 md:px-0">Logi discordiga sisse..</h3>
                        <p class="flex flex-shrink text-md px-4 dm:px-0">..Et alustada oma lugu meie serveris, logi
                            sisse läbi
                            discordi. </p>
                        <a href="login">
                            <button class="bg-primary h-10 my-4 rounded-full text-md px-4 mx-4 md:mx-0">
                                Logi sisse
                            </button>
                        </a>
                    </div>
                    <svg class="sm:w-1/2 w-80 object-cover" viewBox="0 0 440 440" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                        <pattern id="img1" x="0" y="0" width="1" height="1">
                            <image x="-50" y="0" width="115%" height="100%" preserveAspectRatio="xMaxYMax slice" href="../assets/goAuth.jpg" />
                        </pattern>
                        </defs>
                        <path d="M220,400.2833774020238C249.50254459752696,399.3453650593829,285.12557873323414,420.88674916815256,307.43299311896703,401.55648097789685C332.28747677619293,380.0190752294395,306.66685412995054,331.13427728213577,328.34250021938533,306.40026080994585C351.6660965376579,279.78577314269944,404.58125422119826,295.4744578915164,425.44634652938305,266.89178793262914C444.1230134414144,241.30699787304928,435.90849805697565,203.03495954933427,425.68411425444816,173.0539431357042C415.71023441663846,143.80748086469416,395.94248150550715,116.25469165446215,368.9470765007844,101.21867013879276C342.98457209502817,86.75795822217887,310.44180242263445,98.61485580307824,281.32848123525997,92.65009649569771C259.7877988603268,88.23682516686938,241.9806668877147,71.27520620433238,220,70.70228023098451C197.85921760437478,70.12518084771756,175.6534832840764,77.29741889245801,157.11232778866855,89.41240307254267C139.33864657615885,101.02591155990496,129.99385942592883,121.07205789563639,117.09877595781364,137.93901214293007C104.43591198214659,154.5022199612737,94.2141099364793,171.8905084383561,81.45191836749001,188.37730447810577C60.69607639235523,215.19067202767485,21.437271472628915,232.41723147251827,17.86297954768218,266.1364558509098C14.636104270381697,296.5782143309481,45.96364972038163,319.63484340309816,64.99691481686258,343.61083562822444C84.0598853478717,367.62424745864075,101.05220739042358,396.6743148549796,129.8479451728527,407.2026707935337C158.51370086134193,417.68350241578173,189.493728088856,401.25330253800723,220,400.2833774020238" fill="url(#img1)" />
                    </svg>
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row flex-wrap-reverse justify-center md:justify-between pb-12">
                <svg viewBox="0 0 200 200" class="sm:w-1/2 w-80 object-cover" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="img2" x="0" y="0" width="1" height="1">
                            <image x="0" y="-25" width="100%" height="100%" preserveAspectRatio="xMaxYMax slice" href="../assets/doWhitelist.jpg" />
                        </pattern>
                        </defs>
                    <path fill="url(#img2)" d="M54.4,-55.1C67.9,-41,74.3,-20.5,72.5,-1.8C70.7,16.9,60.7,33.8,47.2,49.6C33.8,65.5,16.9,80.3,0.6,79.7C-15.8,79.2,-31.6,63.3,-46.3,47.4C-61,31.6,-74.6,15.8,-74.4,0.2C-74.1,-15.3,-60.1,-30.7,-45.4,-44.8C-30.7,-58.9,-15.3,-71.8,2.6,-74.4C20.5,-76.9,41,-69.2,54.4,-55.1Z" transform="translate(100 100)" />
                </svg>    
                    <div class="text-tekst md:w-1/3 md:self-center">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">2</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Ligipääs</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 md:px-0">Täida Whitelist..</h3>
                        <p class="flex flex-shrink text-md px-4 md:px-0">..Et ligipääsu serverisse saada, täida
                            whitelist, siis
                            teame, et oled sobilik ja reegleid järgiv mängija.</p>
                        <a href="whitelist">
                            <button class="bg-primary h-10 my-4 rounded-full text-md px-4 mx-4 md:mx-0">
                                Mine whitelisti
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="flex flex-row flex-wrap justify-center md:justify-between pb-12">
                    <div class="text-tekst md:w-1/3 md:self-center">
                        <div class="flex flex-row pb-2">
                            <div
                                class="w-12 h-12 bg-primary rounded-full flex items-center justify-center border-2 border-gray-800">
                                <span class="text-white text-lg font-bold">3</span>
                            </div>
                            <p class="flex text-lg items-center pl-2">Ühinemine</p>
                        </div>
                        <h3 class="text-3xl font-medium px-4 md:px-0">Hakka mängima!</h3>
                        <p class="flex flex-shrink text-md px-4 md:px-0">Jehuu! Oled viimase sammu juures. Nüüd ainult
                            vaja panna RP püksid jalga ja ühineda serveriga. Näeme linnapeal ;)</p>
                        <a href="https://cfx.re/join/86646b" target="_blank">
                            <button class="bg-primary h-10 my-4 rounded-full text-md px-4 mx-4 md:mx-0">
                                Ühine serveriga
                            </button>
                        </a>
                    </div>
                    <svg viewBox="0 0 200 200" class="sm:w-1/2 w-80 object-cover" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="img3" x="0" y="0" width="1" height="1">
                            <image x="-10" y="0" width="100%" height="120%" preserveAspectRatio="xMaxYMax slice" href="../assets/startPlaying.jpg" />
                        </pattern>
                        </defs>
                       <path fill="url(#img3)" d="M49.2,-61.8C64.2,-56.8,77.2,-43,79.3,-27.8C81.4,-12.6,72.5,4,66.9,21.9C61.3,39.7,58.8,58.7,48.2,68.3C37.6,77.9,18.8,78.2,0.4,77.6C-17.9,77,-35.8,75.5,-49.3,66.8C-62.7,58,-71.6,42.1,-75.6,25.6C-79.7,9,-78.8,-8.2,-71.7,-21.2C-64.5,-34.2,-51.2,-43.1,-38.2,-48.8C-25.2,-54.6,-12.6,-57.1,2.2,-60.2C17.1,-63.3,34.1,-66.9,49.2,-61.8Z" transform="translate(100 100)" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- Socials Section -->
    <div class="bg-primary">
    <div class="max-w-screen-lg mx-auto flex flex-row flex-wrap justify-center md:justify-between py-12">
        <div class="text-tekst md:w-1/3 md:self-center p-2">
            <h3 class="text-3xl font-medium px-4 md:px-0 pb-4">Ühine discordiga!</h3>
            <p class="flex-shrink text-xl px-4 dm:px-0">Ühine meie kogukonnaga, et:</p>
            <ol class="flex-shrink text-lg px-4 dm:px-0">
                <li>- Saada uuendusi serveri kohta</li>
                <li>- Leida endale uued RP semud</li>
                <li>- Ja palju muud!</li>
            </ol>
            <a href="https://discord.gg/5vApMEjs9p" target="_blank">
            <button class="text-tekst h-10 my-4 rounded-full text-md px-4 mx-4 md:mx-0 text-center bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300">
                Discord
            </button> 
            </a>
        </div>
        <img src="../assets/joinDiscord.jpg" alt="First Image" class="w-80 h-80 object-cover">
    </div>
</div>
</body>
<?php require __DIR__ . '/./modules/footer.php' ?>

<!-- 
<button class="text-tekst h-10 my-4 rounded-full text-md px-4 mx-4 md:mx-0 text-center bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300">
Ühine serveriga
</button> 
-->

</html>