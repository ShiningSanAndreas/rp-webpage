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

        <div class="flex flex-row justify-center mb-32">

            <!-- First coin container -->
            <div class="relative bg-primary rounded-md w-[300px] h-[300px] mr-8 flex flex-col items-center justify-items-center">
                <img src="../assets/SmlSSACoin.png" width="120" height="120" class="mt-8"/>
                <div class="text-white text-center">
                    <p class="text-2xl font-bold mt-12">100 coini</p>
                    <p class="text-2xl font-bold mt-2">10€</p>
                </div>
            </div>

            <!-- Second coin container -->
            <div class="relative bg-primary rounded-md w-[300px] h-[300px] mr-8 flex flex-col items-center justify-items-center">
            <img src="../assets/MidSSACoin.png" width="120" height="120" class="mt-8"/>
                <div class="text-white text-center">
                    <p class="text-2xl font-bold mt-12">300 + 100 coini</p>
                    <p class="text-2xl font-bold mt-2">30€</p>
                </div>
            </div>

            <!-- Third coin container -->
            <div class="relative bg-primary rounded-md w-[300px] h-[300px] mr-8 flex flex-col items-center justify-items-center">
            <img src="../assets/BigSSACoin.png" width="120" height="120" class="mt-8"/>
                <div class="text-white text-center">
                    <p class="text-2xl font-bold mt-12">500 + 150 coini</p>
                    <p class="text-2xl font-bold mt-2">50€</p>
                </div>
            </div>
        </div>


        <div class="text-white mb-6 ">
            <h2 class="text-2xl font-semibold ml-[190px]">Timmi custom looti :D</h2>
        </div>
        <!-- Custom Items Section -->
        <div class="flex flex-row justify-center mb-16">

            <!-- First coin container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-[300px] h-[500px] mr-8 flex flex-col items-center justify-items-center">
                <img src="../assets/car.png" width="256" height="256" alt="Pood Custom Car" class="p-4"/>
                <div class="text-white text-center">
                    <p class="text-dm mt-4">Osta endale kõige ägedamad ja kiiremad autod</p>
                    <p class="text-2xl font-bold mt-16">Ägedad autod</p>
                    <p class="text-2xl font-bold mt-2">100 coini</p>
                </div>
            </div>

            <!-- Second coin container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-[300px] h-[500px] mr-8 flex flex-col items-center justify-items-center">
                <img src="../assets/custompeed.png" width="256" height="256" alt="Pood Custom Pedestrian" class="p-4"/>
                <div class="text-white text-center">
                    <p class="text-md mt-4">Osta endale ägedamad ja seksikamad karakteri mudelid</p>
                    <p class="text-2xl font-bold mt-16">Kõvad mudelid</p>
                    <p class="text-2xl font-bold mt-2">100 coini</p>
                </div>
            </div>

            <!-- Third coin container -->
            <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-[300px] h-[500px] mr-8 flex flex-col items-center justify-items-center">
                <img src="../assets/fraktsiooni.png" width="256" height="256" alt="Pood Custom MLO" class="p-4"/>
                <div class="text-white text-center">
                    <p class="text-md mt-4">Tee oma fraktsioon lossiks kõige selle ägeda mööbliga</p>
                    <p class="text-2xl font-bold mt-16">Stiilne mööbel</p>
                    <p class="text-2xl font-bold mt-2">100 coini</p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include('./modules/footer.php') ?>

</html>