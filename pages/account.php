<?php 
session_start();
include("../config.php");

try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

session_start();

$isLoggedIn = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"];

if (!$isLoggedIn) {
    header("Location: landing.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<?php include ('./modules/navbar.php') ?>

<body class="bg-background">
    <div class="flex flex-col max-w-screen-lg mx-auto pb-64">
        <div class="text-tekst my-16">
            <h2 class="text-5xl font-bold">Konto</h2>
        </div>
        <div class="flex flex-row justify-between">
            <div class="w-1/4 p-5 text-tekst border-r-2 border-primary">
                <ul >
                    <li ><a href="./accountPages/account_details.php" class="ajax-link text-light">Konto andmed</a></li>
                    <li class="py-2"><a href="./accountPages/orders.php" class="ajax-link">Tellimused</a></li>
                    <li><a href="logout.php">Logi välja</a></li>
                </ul>
            </div>
            <div class="w-3/4 p-5 content">
                <!-- Content will be loaded here via AJAX -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll('.ajax-link');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    updateActiveLink(this);
                    fetchContent(this.getAttribute('href'));
                });
            });

            // Function to update the active class on links
            function updateActiveLink(activeLink) {
                links.forEach(link => {
                    link.classList.remove('text-light');
                });
                activeLink.classList.add('text-light');
            }

            function fetchContent(url) {
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        document.querySelector('.content').innerHTML = html;
                    })
                    .catch(error => console.error('Error loading the page:', error));
            }

            // Load default dashboard content on initial load
            fetchContent('./accountPages/account_details.php');
        });
    </script>
</body>
<?php include ('./modules/footer.php') ?>

</html>