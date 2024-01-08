<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Home - ShiningRP</title>
</head>

<body class="bg-background">
    <?php include("./modules/navbar.php") ?>

    <?php include("./modules/caroussel.php") ?>

    <div class="container mx-auto text-left">
        <div class="text-white mt-16 mb-6 ">
            <h2 class="text-3xl font-semibold ml-[160px]">Alusta mängimist</h2>
        </div>
        <div class="flex flex-col items-center mb-16">
            <!-- First Image and Text -->
            <div class="relative">
                <div class="bg-sky-400/30 h-[352px] w-[1120px] absolute rounded-t-md"></div>
                <img src="../assets/lisakarakter2.jpg" alt="First Image" class="h-[352px] w-[1120px] object-cover rounded-t-md">
                <div class="absolute top-4 left-4 text-white">
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">Logi discordiga sisse..</p>
                    <a href="landing.php">
                        <iconify-icon icon="logos:discord-icon" width="50" height="40" class="ml-10 mt-2"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Second Image and Text -->
            <div class="relative">
                <div class="bg-purple-400/30 h-[352px] w-[1120px] absolute"></div>
                <img src="../assets/boombox.jpg" alt="Second Image" class="h-[352px] w-[1120px] object-cover">
                <div class="absolute top-4 right-4 text-white">
                    <p class="text-2xl font-bold mr-[32px] mt-[32px]">Täida whitelist..</p>
                    <a href="whitelist-form.php">
                        <iconify-icon icon="pajamas:review-list" width="60" height="62" class="ml-24"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Third Image and Text -->
            <div class="relative">
                <div class="bg-emerald-300/30 h-[352px] w-[1120px] absolute rounded-b-md"></div>
                <img src="../assets/eritellimus.jpg" alt="Third Image" class="h-[352px] w-[1120px] object-cover rounded-b-md">
                <div class="absolute top-4 left-4 text-white">
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">Ja hakka mängima!</p>
                    <a href="#">
                        <iconify-icon icon="simple-icons:fivem" width="50" height="40" class="ml-10 mt-3"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include("./modules/footer.php") ?>
</body>

</html>