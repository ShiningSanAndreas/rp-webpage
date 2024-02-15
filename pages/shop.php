<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$current_page = "shop";

$allProducts = [
    "coins" => [
        [
            "id" => "100coins",
            "title" => "100 SSA-Coins",
            "price" => 10,
            "picture" => "SmlSSACoin.png",
            "data-package-name" => "100 SSA-Coins",
            "data-package-amount" => 1000,
        ],
        [
            "id" => "300coins",
            "title" => "250 + 50 SSA-Coins",
            "price" => 25,
            "picture" => "MidSSACoin.png",
            "data-package-name" => "250 + 50 SSA-Coins",
            "data-package-amount" => 2500,
        ],
        [
            "id" => "600coins",
            "title" => "500 + 100 SSA-Coins",
            "price" => 50,
            "picture" => "BigSSACoin.png",
            "data-package-name" => "500 + 100 SSA-Coins",
            "data-package-amount" => 5000,
        ],
        // Add more coin products as needed
    ],
    "customProducts" => [
        [
            "id" => "customCar",
            "title" => "Ägedad autod",
            "description" => "Description of Custom Product 1.",
            "shortDescription" => "Osta endale kõige ägedamad ja kiiremad autod",
            "price" => 100,
            "picture" => "car.png",
            "button" => [
                // Button details for Custom Product 1
            ],
        ],
        [
            "id" => "customCharacter",
            "title" => "Kõvad mudelid",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Tahad rohkem karaktereid? Osta endale kõige ägedamaid ja seksikamaid mudeleid",
            "price" => 100,
            "picture" => "custompeed.png",
            "button" => [
                // Button details for Custom Product 2
            ],
        ],
        [
            "id" => "customFurniture",
            "title" => "Stiilne mööbel",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Tee oma fraktsioon lossiks kõige selle ägeda mööbliga",
            "price" => 100,
            "picture" => "mlo.jpg",
            "button" => [
                // Button details for Custom Product 2
            ],
        ],
    ],
]
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Pood - ShiningRP</title>
    <script>
        const $modalEl = document.getElementById('modalEl');

        const modalOptions = {
            placement: 'bottom-right',
            backdrop: 'dynamic',
            backdropClasses:
                'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
            closable: true,
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            },
        };

        // instance options object
        const modalInstance = {
            id: 'modalEl',
            override: true
        };

        const modal = new Modal($modalEl, modalOptions, modalInstance);
    </script>
</head>

<?php include('./modules/navbar.php') ?>


<body class="bg-background">

    <!-- Shop Section -->
    <div class="max-w-screen-lg mx-auto text-left">

        <div class="text-tekst my-16">
            <h2 class="text-5xl font-bold">Pood</h2>
        </div>

        <div class="text-white p-4">
            <h2 class="text-3xl font-semibold">Timmi endale coini</h2>
        </div>
        <!-- Coins section -->
        <div class="flex flex-row justify-center mb-16">
            <?php foreach ($allProducts['coins'] as $coin): ?>
                <?php
                $coinTitle = $coin['title'];
                $coinPrice = $coin['price'];
                $coinPicture = $coin['picture'];
                $coinPackageName = $coin['data-package-name'];
                $coinPackageAmount = $coin['data-package-amount'];
                ?>
                <div class="relative bg-primary rounded-md w-72 h-96 mr-8 flex flex-col items-center justify-items-center">
                    <img src="../assets/SmlSSACoin.png" width="130" class="mt-8" />
                    <div class="text-white text-center flex-shrink">
                        <p class="text-2xl font-bold mt-12"><?=$coinTitle ?></p>
                        <p class="text-2xl font-bold mt-2"><?=$coinPrice ?>€</p>
                        <button type="button" id="checkout-button" data-package-name="<?= $coinPackageName ?>"
                            data-package-amount="<?= $coinPackageAmount ?>"
                            class="text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center my-4">
                            Osta
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="text-white p-4">
            <h2 class="text-3xl font-semibold">Timmi custom looti :D</h2>
        </div>
        <!-- Custom Items Section -->
        <div class="flex flex-row justify-center mb-16">

            <!-- First product container -->
            <div
                class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-80 h-auto mr-8 flex flex-col items-center">
                <img src="../assets/car.png" width="256" height="256" alt="Pood Custom Car" class="p-4" />
                <div class="text-white text-center flex-grow">
                    <p class="text-dm mt-4 px-4 text-clip overflow-hidden">Osta endale kõige ägedamad ja kiiremad autod
                    </p>
                </div>
                <div class="text-white text-center flex-shrink-0">
                    <p class="text-2xl font-bold mt-4">Ägedad autod</p>
                    <div class="flex flex-row justify-center">
                        <span class="block text-2xl font-medium text-slate-200 ">100</span>
                        <img class="w-6 h-6 rounded-full ml-1 mt-2" src="../assets/SSACoinTop.png"
                            alt="1st Product Price">
                    </div>
                    <?php include('./modules/shopButton.php') ?>
                </div>
            </div>

            <!-- Second product container -->
            <div
                class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-80 h-auto mr-8 flex flex-col items-center">
                <img src="../assets/custompeed.png" width="256" height="256" alt="Pood Custom Car" class="p-4" />
                <div class="text-white text-center flex-grow">
                    <p class="text-dm mt-4 px-4 text-clip overflow-hidden">Tahad rohkem karaktereid? Osta endale
                        ägedamaid ja seksikamaid mudeleid
                    </p>
                </div>
                <div class="text-white text-center flex-shrink-0">
                    <p class="text-2xl font-bold mt-4">Kõvad mudelid</p>
                    <div class="flex flex-row justify-center">
                        <span class="block text-2xl font-medium text-slate-200 ">100</span>
                        <img class="w-6 h-6 rounded-full ml-1 mt-2" src="../assets/SSACoinTop.png"
                            alt="2nd Product Price">
                    </div>
                    <?php include('./modules/shopButton.php') ?>
                </div>
            </div>

            <!-- Third product container -->
            <div
                class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-80 h-auto mr-8 flex flex-col items-center">
                <img src="../assets/fraktsiooni.png" width="256" height="256" alt="Pood Custom Car" class="p-4" />
                <div class="text-white text-center flex-grow">
                    <p class="text-dm mt-4 px-4 text-clip overflow-hidden">Tee oma fraktsioon lossiks kõige selle ägeda
                        mööbliga
                    </p>
                </div>
                <div class="text-white text-center flex-shrink-0">
                    <p class="text-2xl font-bold mt-4">Stiilne mööbel</p>
                    <div class="flex flex-row justify-center">
                        <span class="block text-2xl font-medium text-slate-200 ">100</span>
                        <img class="w-6 h-6 rounded-full ml-1 mt-2" src="../assets/SSACoinTop.png"
                            alt="3rd Product Price">
                    </div>
                    <?php include('./modules/shopButton.php') ?>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include('./modules/footer.php') ?>

</html>

<script>
    var stripe = Stripe('pk_test_51OXMazJYQ5I7nITlMEkeqSOjpPpla0wKo0IzA08xhwQ3E5SRW5cwTgkOGO89iJSkgeR58OvqlsaQkGyMBKvOIUSa00RjgtHI6A');
    var checkoutButton = document.getElementById('checkout-button');

    checkoutButton.addEventListener('click', function () {
        var packageName = this.getAttribute('data-package-name');
        var packageAmount = this.getAttribute('data-package-amount');
        // Log the values to check if they are retrieved correctly
        console.log("Package Name: " + packageName);
        console.log("Package Amount: " + packageAmount);

        // Create a Checkout Session with your server-side endpoint
        fetch('./create-checkout-session.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                packageName: packageName,
                packageAmount: packageAmount,
            }),
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (session) {
                // Call Stripe.js to redirect to the checkout page
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, you should display the localized error message to your customer
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    });
</script>