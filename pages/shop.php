<?php
require __DIR__ . "/../config.php";
require_once __DIR__ . '/./../vendor/autoload.php';

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); 
}

session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
    header("Location: login");
    exit();
}
extract($_SESSION["userData"]);
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
    ],
    "customProducts" => [
        [
            "id" => "customCar",
            "title" => "Ägedad autod",
            "description" => "Hing ihaldab just selle ühe Bemmi järgi, aga autopoest ei leia seda? Telli endale see mudel ning sa ei näe enam kellegil teisel sellist!",
            "shortDescription" => "Osta endale kõige ägedamad ja kiiremad autod!",
            "price" => 1500,
            "picture" => "../assets/car.png",
        ],
        [
            "id" => "customCharacter",
            "title" => "Lisakarakter",
            "description" => "Pärast ostu sooritamist saate eksklusiivse koodi, mis avab lisakarakteri mängus. Iga kood on unikaalne ning seda saab kasutada vaid üks kord. Koodi jagamine on lubatud, kuid enne kasutamist on soovitatav seda varjatuna hoida. Koodi on võimalik näha oma ostuajaloost.",
            "shortDescription" => "Tahad rohkem karaktereid? Osta endale lisakarakter ja naudi mängu hoopis teisest POV-ist!",
            "price" => 150,
            "picture" => "../assets/custompeed.png",
        ],
        [
            "id" => "customFurniture",
            "title" => "Eriline Map mod",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Tee oma fraktsioon lossiks kõige selle ägeda mööbliga",
            "price" => 650,
            "picture" => "../assets/fraktsiooni.png",
        ],
        [
            "id" => "nameChange",
            "title" => "Nimevahetus",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Vajad identiteedi muutust? Vaheta oma karakteri nimi ning alusta puhtalt lehelt",
            "price" => 100,
            "picture" => "../assets/fraktsiooni.png",
        ],
        [
            "id" => "gangs",
            "title" => "Grupeeringu loomine",
            "description" => "Oled juba nii lähedal, et täiskohaga gangster olla....",
            "shortDescription" => "Tahad luua oma grupeeringut? See pakett aitab sul täiega jalad alla saada!",
            "price" => '???',
            "picture" => "../assets/fraktsiooni.png",
        ],
        [
            "id" => "skillBooster",
            "title" => "Skill booster",
            "description" => "Description of Custom Product 2.",
            "shortDescription" => "Tunned, et su oskused on natuke roostes? Osta endale skill booster ja saa paremaks!",
            "price" => '???',
            "picture" => "../assets/fraktsiooni.png",
        ],
    ],
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://js.stripe.com/v3/"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Pood - ShiningRP</title>
</head>

<?php require __DIR__ . '/./modules/navbar.php' ?>

<body class="bg-background">

    <!-- Shop Section -->
    <div class="max-w-screen-lg mx-auto text-left">

        <div class="text-tekst my-16">
            <h2 class="text-2xl font-nihilist italic">Pood</h2>
        </div>

        <div class="text-white p-4">
            <h2 class="text-3xl font-semibold">Soeta endale SSACoine</h2>
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
                <div class="relative bg-primary rounded-md w-full md:w-1/3 lg:w-72 h-auto m-4 flex flex-col items-center">
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
            <h2 class="text-3xl font-semibold">Mängusisesed mugavused/aksessuaarid</h2>
        </div>
        <!-- Custom Items Section -->
        <div class="flex flex-row justify-center mb-16 flex-wrap">
        <?php foreach ($allProducts['customProducts'] as $index => $customProd): ?>
        <?php
        $totalProducts = count($customProd);
        $customProdTitle = $customProd['title'];
        $customProdPrice = $customProd['price'];
        $customProdPicture = $customProd['picture'];
        $customProdShortDesc = $customProd['shortDescription'];
        $customProdDesc = $customProd['description'];
        $customProdId = $customProd['id'];
        ?>
        <!-- Product container -->
        <div class="relative bg-gradient-to-t from-black from-30% via-gray-800 via-80% to-gray-300 rounded-md md:w-1/3 xl:w-72 h-auto m-4 flex flex-col items-center overflow-hidden">
        <?php if ($index >= $totalProducts - 2): ?>
            <div class="ribbon absolute top-20 ml-16 w-96 bg-gradient-to-r from-slate-900 to-yellow-400 text-white text-center font-bold uppercase px-16 py-4 transform rotate-45 z-10">
                <span class="block">Varsti müügil!</span>
            </div>
            <?php endif; ?>
            <img src="<?= $customProdPicture ?>" alt="Pood Custom Car" class="p-4 w-64 h-64" />
            <div class="text-tekst text-center flex-grow">
                <p class="text-dm mt-4 px-4 text-clip overflow-hidden">
                    <?= $customProdShortDesc ?>
                </p>
            </div>
            <div class="text-tekst text-center flex-shrink-0 p-4">
                <p class="text-2xl font-bold mt-4">
                    <?= $customProdTitle ?>
                </p>
                <div class="flex justify-center">
                    <span class="block text-2xl font-medium text-tekst">
                        <?= $customProdPrice ?>
                    </span>
                    <img class="w-6 h-6 rounded-full ml-1 mt-2" src="../assets/SSACoinTop.png" alt="Product Price">
                </div>
                <?php if ($index < $totalProducts - 2): ?>
                <!-- Modal toggle -->
                <button type="button" data-modal="<?= $customProdId ?>"
                    class="modal-toggle text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center my-4">
                    Osta
                </button>
                <?php endif; ?>
            </div>
        </div>
        <?php require __DIR__ . '/./modules/productModal.php'; ?>
    <?php endforeach; ?>
</div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    
</body>
<?php require __DIR__ . '/./modules/footer.php'; ?>

</html>

<!-- Send data to create-checkout-session.php -->
<script>
    var stripePublishableKey = "<?php echo $_ENV['STRIPE_PUBLISHABLE_KEY']; ?>";
    var stripe = Stripe(stripePublishableKey);
    var checkoutButtons = document.querySelectorAll('#checkout-button');

    checkoutButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var packageName = this.getAttribute('data-package-name');
            var packageAmount = this.getAttribute('data-package-amount');
            var coinAmount = this.getAttribute('coin-amount');

            console.log("Package Name: " + packageName);
            console.log("Package Amount: " + packageAmount);
            console.log("Coins Amount: " + coinAmount);

            fetch('/create-checkout-session', {
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
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function (session) {
                if (session.error) {
                    throw new Error(session.error);
                }
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function (error) {
                console.error('Error:', error);
                alert('Failed to create checkout session: ' + error.message);
            });
        });
    });
</script>

<script>
        // JavaScript for modal functionality
        document.querySelectorAll('.modal-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal');
                document.getElementById(modalId).classList.remove('hidden');
                document.getElementById(modalId).classList.add('flex');
            });
        });

        document.querySelectorAll('.modal-close').forEach(span => {
            span.addEventListener('click', () => {
                const modalId = span.getAttribute('data-modal');
                document.getElementById(modalId).classList.add('hidden');
                document.getElementById(modalId).classList.remove('flex');
            });
        });

        window.addEventListener('click', function (event) {
            if (event.target.classList.contains('modal-overlay')) {
                event.target.parentNode.classList.add('hidden');
                event.target.parentNode.classList.remove('flex');
            }
        });
    </script>
