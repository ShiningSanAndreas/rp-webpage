<?php
session_start();

$currentPage = $_SESSION['currentPage'] ?? 'account_details';

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
    $_SESSION['currentPage'] = $currentPage;
}

function isActive($page)
{
    global $currentPage;
    return $currentPage == $page ? 'text-light' : 'text-tekst';
}

function renderContent()
{
    global $currentPage;
    switch ($currentPage) {
        case 'account_details':
            echo '<div><p>Account Name: John Doe</p><p>Email: johndoe@example.com</p></div>';
            break;
        case 'orders':
            echo '<table class="table-auto"><thead><tr><th>Order ID</th><th>Date</th><th>Status</th></tr></thead><tbody><tr><td>#1234</td><td>01/01/2024</td><td>Shipped</td></tr></tbody></table>';
            break;
        case 'dashboard':
            echo '<div><p>Welcome to your dashboard, John Doe!</p></div>';
            break;
        case 'logout':
            // Handle logout logic here
            echo '<div><p>You have been logged out.</p></div>';
            break;
    }
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
<?php include("./modules/navbar.php") ?>
<body class="bg-background">
    <div class="p-4 justify-center lg:p-0 max-w-screen-lg flex">
        <div class="w-1/4 h-screen bg-primary p-5">
            <ul>
                <li><a href="?page=account_details" class="<?= isActive('account_details') ?>">Konto Andmed</a></li>
                <li><a href="?page=orders" class="<?= isActive('orders') ?>">Orders</a></li>
                <li><a href="?page=dashboard" class="<?= isActive('dashboard') ?>">Dashboard</a></li>
                <li><a href="?page=logout" class="<?= isActive('logout') ?>">Log Out</a></li>
            </ul>
        </div>
        <div class="w-3/4 p-5">
            <?php renderContent(); ?>
        </div>
    </div>
</body>
<?php include("./modules/footer.php") ?>
</html>
