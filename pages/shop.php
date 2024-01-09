<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Pood - ShiningRP</title>
</head>


<?php include('./modules/navbar.php') ?>

<body class="bg-background">

    <!-- Shop Section -->
    <div class="container mx-auto text-left">

        <div class="text-white mt-16 mb-6 ">
            <h2 class="text-3xl font-semibold ml-[168px]">Pood</h2>
        </div>

        <div class="text-white mb-6 ">
            <h2 class="text-2xl font-semibold ml-[190px]">Timmi endale coini</h2>
        </div>

        <div class="flex flex-row justify-center mb-16">

            <!-- First coin container -->
            <div class="relative bg-primary md-rounded w-[300px] h-[300px] mr-8 justify-items-center">
                <iconify-icon icon="ph:coins-duotone" style="color: #f4d03f;" width="120"></iconify-icon>
                <div class="absolute text-white">
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">100 coini</p>
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">10€</p>
                </div>
            </div>

            <!-- Second coin container -->
            <div class="relative bg-primary md-rounded w-[300px] h-[300px] mr-8 justify-items-center">
                <iconify-icon icon="ph:coins-duotone" style="color: #f4d03f;" width="120"></iconify-icon>
                <div class="absolute text-white justify-center">
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">100 coini</p>
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">10€</p>
                </div>
            </div>

            <!-- Third coin container -->
            <div class="relative bg-primary md-rounded w-[300px] h-[300px] mr-8 justify-items-center">
                <iconify-icon icon="ph:coins-duotone" style="color: #f4d03f;" width="120"></iconify-icon>
                <div class="absolute text-white justify-center">
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">100 coini</p>
                    <p class="text-2xl font-bold ml-[32px] mt-[32px]">10€</p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include('./modules/footer.php') ?>

</html>