<?php
// index.php

// Get the request URI and remove query string parameters
$request = strtok($_SERVER['REQUEST_URI'], '?');

// Remove leading and trailing slashes
$request = trim($request, '/');

// Route the request to the appropriate file
switch ($request) {
    case '':
    case 'home':
        require __DIR__ . '/pages/home.php';
        break;
    case 'shop':
        require __DIR__ . '/pages/shop.php';
        break;
     case 'characters':
         require __DIR__ . '/pages/characters.php';
         break;
     case 'whitelist':
         require __DIR__ . '/pages/tester-form.php';
         break;
    case 'login':
        require __DIR__ . '/pages/landing.php';
        break;
    case 'rules':
        require __DIR__ . '/pages/rules.php';
        break;
    case 'logout':
        require __DIR__ . '/pages/logout.php';
        break;
    case 'account':
        require __DIR__ . '/pages/account.php';
        break;
    case 'account_details':
        require __DIR__ . '/pages/accountPages/account_details.php';
        break;
    case 'orders':
        require __DIR__ . '/pages/accountPages/orders.php';
        break;
    case 'create-checkout-session':
        require __DIR__ . '/pages/create-checkout-session.php';
        break;
    default:
        // Optionally, handle 404 error
        http_response_code(404);
        require __DIR__ . '/pages/home.php';
        break;
}
?>
