<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$current_page = "shop";

$allProducts = [
    "coins" => [
        [
            "title" => "100 SSA-Coins",
            "price" => 10,
            "picture" => "../assets/SmlSSACoin.png",
            "coin-amount" => 100,
            "data-package-name" => "100 SSA-Coins",
            "data-package-amount" => 1000,
        ],
        [
            "title" => "250 + 50 SSA-Coins",
            "price" => 25,
            "picture" => "../assets/MidSSACoin.png",
            "coin-amount" => 300,
            "data-package-name" => "250 + 50 SSA-Coins",
            "data-package-amount" => 2500,
        ],
        [
            "title" => "500 + 100 SSA-Coins",
            "price" => 50,
            "picture" => "../assets/BigSSACoin.png",
            "coin-amount" => 600,
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
            "picture" => "../assets/car.png",
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
            "picture" => "../assets/custompeed.png",
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
            "picture" => "../assets/fraktsiooni.png",
            "button" => [
                // Button details for Custom Product 2
            ],
        ],
        [
            "id" => "nameChange",
            "title" => "Nimevahetus",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Hakkas nimest igav? Vaheta see ära!",
            "price" => 100,
            "picture" => "../assets/fraktsiooni.png",
            "button" => [
                // Button details for Custom Product 2
            ],
        ],
        [
            "id" => "prioQueue",
            "title" => "Priority Queue",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Ei viitsi järjekorras istuda? Naba endale õigus liituda serveriga ükskõik kuna tahad.",
            "price" => 100,
            "picture" => "../assets/fraktsiooni.png",
            "button" => [
                // Button details for Custom Product 2
            ],
        ],
        [
            "id" => "customVehiclePlate",
            "title" => "Numbrimärk",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Nüüd saad olla kõige räigem rullnokk kui ostad endale kohandatud numbrimärgi. 888WTF onju ;)",
            "price" => 100,
            "picture" => "../assets/fraktsiooni.png",
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
        <div class="flex flex-row justify-center mb-16 flex-wrap">
            <?php foreach ($allProducts['coins'] as $coin): ?>
                <?php
                $coinTitle = $coin['title'];
                $coinPrice = $coin['price'];
                $coinPicture = $coin['picture'];
                $coinAmount = $coin['coin-amount'];
                $coinPackageName = $coin['data-package-name'];
                $coinPackageAmount = $coin['data-package-amount'];
                ?>
                <div class="relative bg-primary rounded-md w-72 h-96 m-4 flex flex-col items-center justify-items-center">
                    <img src="<?= $coinPicture ?>" width="130" class="mt-8" />
                    <div class="text-white text-center flex-shrink-0 mt-auto mb-8">
                        <p class="text-2xl font-bold mt-4">
                            <?= $coinTitle ?>
                        </p>
                        <p class="text-2xl font-bold mt-2">
                            <?= $coinPrice ?>€
                        </p>
                        <button type="button" id="checkout-button" data-package-name="<?= $coinPackageName ?>"
                            data-package-amount="<?= $coinPackageAmount ?>" coin-amount="<?= $coinAmount ?>"
                            class="text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">
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
        <div class="flex flex-row justify-center mb-16 flex-wrap">
            <?php foreach ($allProducts['customProducts'] as $customProd): ?>
                <?php
                $customProdTitle = $customProd['title'];
                $customProdPrice = $customProd['price'];
                $customProdPicture = $customProd['picture'];
                $customProdShortDesc = $customProd['shortDescription'];
                $customProdDesc = $customProd['description'];
                $customProdId = $customProd['id'];
                ?>
                <!-- First product container -->
                <div id="<?= $customProdId ?>"
                    class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md w-72 h-auto m-4 flex flex-col items-center">
                    <img src="<?= $customProdPicture ?>" width="256" height="256" alt="Pood Custom Car" class="p-4" />
                    <div class="text-tekst text-center flex-grow">
                        <p class="text-dm mt-4 px-4 text-clip overflow-hidden">
                            <?= $customProdShortDesc ?>
                        </p>
                    </div>
                    <div class="text-tekst text-center flex-shrink-0">
                        <p class="text-2xl font-bold mt-4">
                            <?= $customProdTitle ?>
                        </p>
                        <div class="flex flex-row justify-center">
                            <span class="block text-2xl font-medium text-slate-200 ">
                                <?= $customProdPrice ?>
                            </span>
                            <img class="w-6 h-6 rounded-full ml-1 mt-2" src="../assets/SSACoinTop.png"
                                alt="1st Product Price">
                        </div>
                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" modal-type="<?= $customProdId; ?>"
                            class="text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center my-4">
                            Osta
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
<?php include('./modules/footer.php') ?>

</html>

<!-- Send data to create-checkout-session.php -->
<script>
    var stripe = Stripe('pk_test_51OXMazJYQ5I7nITlMEkeqSOjpPpla0wKo0IzA08xhwQ3E5SRW5cwTgkOGO89iJSkgeR58OvqlsaQkGyMBKvOIUSa00RjgtHI6A');
    var checkoutButtons = document.querySelectorAll('#checkout-button');

    checkoutButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var packageName = this.getAttribute('data-package-name');
            var packageAmount = this.getAttribute('data-package-amount');
            var coinAmount = this.getAttribute('coin-amount');
            // Log the values to check if they are retrieved correctly
            console.log("Package Name: " + packageName);
            console.log("Package Amount: " + packageAmount);
            console.log("Coins Amount: " + coinAmount);

            // Create a Checkout Session with your server-side endpoint
            fetch('./create-checkout-session.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    packageName: packageName,
                    packageAmount: packageAmount,
                    coinAmount: coinAmount,
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
    });
</script>

<!-- Custom product modal opening 
<script>
    document.querySelectorAll('.open-modal-button').forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('modal-type');
            // Load modal content dynamically
            fetch('modals/modal_' + productId + '.html')
                .then(response => response.text())
                .then(html => {
                    // Inject modal content into the DOM
                    document.getElementById('modal-container').innerHTML = html;
                    // Open modal (you may use your preferred modal library or implement custom logic)
                })
                .catch(error => console.error('Error fetching modal content:', error));
        });
    });
</script> -->