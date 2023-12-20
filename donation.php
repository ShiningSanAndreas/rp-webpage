<?php
session_start();

if (!$_SESSION["logged_in"]){
    header("Location: error.php");
    exit();
}

extract($_SESSION["userData"]);
$avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";

$current_page = "donation";
include('components/sidebar.php');

$products = [
1 => [
        'title' => "Eritellimus",
        'description' => "Vabalt valitud sõiduk (eelnevalt ticketis kooskõlastatud adminiga.)",
        'benefits' => ["Enda valitud auto"],
        'price' => '500 coini',
        'img' => 'assets/eritellimus.jpg',
    ],
    2 => [
        'title' => "Lisakarakter",
        'description' => "Lisakarakteri koht.",
        'benefits' => ["Saad võimaluse luua uus karakter"],
        'price' => '200 coini',
        'img' => 'assets/lisakarakter2.jpg',
    ],
    3 => [
        'title' => "MLO",
        'description' => "Vabalt valitud MLO (tuleb kooskõlastada eelnevalt adminiga ticketis)",
        'benefits' => ["Fraktsioonile", "Grupeeringule"],
        'price' => '500 coin',
        'img' => 'assets/mlo.jpg',
    ],
    4 => [
        'title' => "Custom Ped",
        'description' => "Custom Ped karakter",
        'benefits' => ["Omapärane välimus"],
        'price' => '300 coini',
        'img' => 'assets/ped.jpg',
    ],
    5 => [
        'title' => "Kõlar",
        'description' => "Kõlari ligipääs serveris.",
        'benefits' => ["Saad lasta erinevat muusikat serveris."],
        'price' => '300 coini',
        'img' => 'assets/boombox.jpg',
    ],
];

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">


    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-gray lg:py-2.5 border-gray-950">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-zinc-300 font-medium lg:block">Pood</h5>
                <button class="w-12 h-16 -mr-2 border-r lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <div class="flex space-x-4">


                    
                    
                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#bfbfbf}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>                    <p class=" text-zinc-300"><?php echo $_SESSION["userBalance"]; ?> coins</p>
                </div>
            </div>
        </div>

        <div class="px-6 pt-6 2xl:container">
        <section>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <?php foreach ($products as $productId => $product): ?>
          <div class="relative flex flex-col p-4 mx-auto max-w-lg text-center text-gray-900 h-[400px] w-[300px] rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white overflow-hidden">
            <div class="absolute inset-0 backdrop-blur-lg <?php echo empty($product['img']) ? 'bg-zinc-300' : 'bg-cover'; ?>" style="<?php echo empty($product['img']) ? '' : 'background-image: url(' . $product['img'] . ');'; ?>"></div>
            <p class="relative z-10 mr-2 text-4xl font-extrabold text-white"><?= $product['title'] ?></p>
            <div class="relative z-10 flex justify-center items-baseline my-2">
              <span class="mb-4 text-2xl font-semibold text-white"><?= $product['price'] ?></span>
            </div>
            <p class="relative z-10 font-light text-white sm:text-lg dark:text-zinc-300"><?= $product['description'] ?></p>
            <!-- List -->
            <ul role="list" class="relative z-10 mt-4 mb-4 space-y-4 text-left">
              <?php foreach ($product['benefits'] as $benefit): ?>
                <li class="flex items-center space-x-3">
                  <!-- Icon -->
                  <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="text-white"><?= $benefit ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
            <div class="relative z-10 flex justify-center items-center mt-auto">
              <a href="#" class="mt-auto w-24 text-white bg-primary-600 hover:bg-primary-700 focus-ring-4 focus-ring-primary-200 font-medium rounded-lg text-sm text-center dark-text-white dark-focus-ring-primary-900 bg-blue-500 text-white text-lg p-2 rounded">Osta</a>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
</section>

</div>
</body>
</html>


