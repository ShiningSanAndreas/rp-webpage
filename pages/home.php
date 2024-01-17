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
        <div class="text-white mt-16 mb-6 ">
            <h2 class="text-3xl font-semibold ml-40">Alusta mängimist</h2>
        </div>
        <div class="flex flex-col items-center mb-16">
            <!-- First Image and Text -->
            <div class="relative">
                <img src="../assets/SP_firstpic.png" alt="First Image"
                    class="h-[352px] w-[1120px] object-cover rounded-t-md">
                <div class="absolute top-4 left-4 text-white">
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
                <div class="absolute top-4 right-4 text-white">
                    <p class="text-2xl font-medium mr-[32px] mt-[32px]">Täida whitelist..</p>
                    <a href="whitelist-form.php">
                        <iconify-icon icon="pajamas:review-list" width="60" height="62" class="ml-24"></iconify-icon>
                    </a>
                </div>
            </div>
            <img src="../assets/arrowOne.svg" alt="" class="absolute mt-24"/>
            <!-- Third Image and Text -->
            <div class="relative">
                <img src="../assets/SP_thirdpic.png" alt="Third Image"
                    class="h-[352px] w-[1120px] object-cover rounded-b-md">
                <div class="absolute top-4 left-4 text-white">
                    <p class="text-2xl font-medium ml-[32px] mt-[32px]">Ja hakka mängima!</p>
                    <a href="#">
                        <iconify-icon icon="simple-icons:fivem" width="50" height="40"
                            class="ml-10 mt-3"></iconify-icon>
                    </a>
                </div>
            </div>
            <img src="../assets/arrowTwo.svg" alt="" class="absolute mt-[450px]"/>
        </div>
    </div>

    <!-- News Section -->
    <div class="bg-primary mb-16">
        <div class="container mx-auto">
            <div class="text-white">
                <h2 class="text-3xl font-semibold ml-40 pt-16 pb-6">Visioon</h2>
            </div>
            <div class="flex flex-col px-48">

                <!-- First Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative text-white">
                        <h1 class="text-2xl font-medium">Unikaalne taseme süsteem</h1>
                        <p class="text-xl flex-shrink w-96">Leia enda lemmik tegevus ja tõuse taseme edetabelis tippu</p>
                    </div>
                    <img src="../assets/levelSys.png" alt="Second Image"
                        class="h-96 w-1/2 rounded-md border-4 border-white ml-auto object-fill object-center">
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <img src="../assets/ped.jpg" alt="Second Image" class="h-96 w-1/2 rounded-md border-4 border-white object-cover object-top">
                    <div class="text-right relative ml-auto text-white">
                        <h1 class="text-2xl font-medium">Ulatuslik karakteri kohandamine</h1>
                        <p class="text-xl flex-shrink w-96">Saad valida kuni 2000+ riideesemest, et teha oma karakter oma täpselt meeldimiste järgi</p>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative">
                        <h1 class="text-2xl font-medium text-white">Kuritegevuse impeerium</h1>
                        <p class="text-xl text-white flex-shrink w-96">Alusta enda jõuk ning saa kõige rikkamaks ja mõjukamaks krimi
                            bossiks</p>
                    </div>
                    <img src="../assets/drugempire.png" alt="Third Image"
                        class="h-96 w-1/2 rounded-md border-4 border-white ml-auto object-left object-cover">
                </div>
            </div>
        </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>