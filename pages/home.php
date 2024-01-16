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
        </div>
    </div>

    <!-- News Section -->
    <div class="bg-alter">
        <div class="container mx-auto">
            <div class="text-black">
                <h2 class="text-3xl font-semibold ml-40 pt-16 pb-6">Visioon</h2>
            </div>
            <div class="flex flex-col px-48">

                <!-- First Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative">
                        <h1 class="text-2xl font-medium">Unikaalne taseme süsteem</h1>
                        <p class="text-xl">lorem ipsum dolor sit amet</p>
                    </div>
                    <img src="../assets/mlo.jpg" alt="Second Image" class="h-96 w-96 rounded-md border-4 border-white ml-auto">
                </div>

                <!-- Second Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <img src="../assets/mlo.jpg" alt="Second Image" class="h-96 w-96 rounded-md border-4 border-white">
                    <div class="text-right relative ml-auto">
                        <h1 class="text-2xl font-medium">Tühi tiitel</h1>
                        <p class="text-xl">lorem ipsum dolor sit amet</p>
                    </div>
                </div>

                <!-- Third Image and Text -->
                <div class="flex flex-row mb-16 items-center">
                    <div class="relative">
                        <h1 class="text-2xl font-medium">Kuritegevuse impeerium</h1>
                        <p class="text-xl">Alusta enda jõuk ning saa kõige rikkamaks ja mõjukamaks krimi
                            bossiks</p>
                    </div>
                    <img src="../assets/mlo.jpg" alt="Third Image" class="h-96 w-96 rounded-md border-4 border-white ml-auto">
                </div>
            </div>
        </div>
    </div>

</body>
<?php include("./modules/footer.php") ?>

</html>