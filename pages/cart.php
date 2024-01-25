<!-- index.php -->
<?php include("./functions/support.php") ?>


<!doctype html>
<html>

<?php 
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <script src="https://js.stripe.com/v3/"></script>
    <title>Ostukorv - ShiningRP</title>
</head>

<?php include("./modules/navbar.php") ?>
<?php /*
require_once 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('pk_test_51ObfVYHrzkqAe0wL9Y966ZlzOMXLi19t78w5Ljkg3Vi2tfnl77p0nRf4c8XFf1jtWR9C5oTnzxrAmNyA8MBcO0iv00qEQAsl5M');

header('Content-Type: application/json');

try {
$intent = \Stripe\PaymentIntent::create([
   'amount' => 500, // Amount in cents
   'currency' => 'usd',
]);

echo json_encode(['clientSecret' => $intent->client_secret]);
} catch (\Exception $e) {
http_response_code(500);
echo json_encode(['error' => $e->getMessage()]);
} */
?>

<body class="bg-background">
    <div class="ml-auto mb-6 lg:w-[70%] xl:w-[75%] 2xl:w-[85%] mx-auto">
        <div class="text-tekst mt-16 mb-6 flex justify-center">
            <h2 class="text-5xl font-semibold">Ostukorv</h2>
        </div>

        

        <div class="container mx-auto p-8 flex flex-row">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-2/3">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Toode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kogus
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hind
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $openTickets = getOpenTickets();
                        foreach ($openTickets as $ticket) {
                            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $ticket['title'] . '</th>';
                            echo '<td class="px-6 py-4">' . $ticket['id'] . '</td>';
                            echo '<td class="px-6 py-4">' . $ticket['category'] . '</td>';
                            echo '<td class="px-6 py-4">' . $ticket['status'] . '</td>';
                            echo '<td class="px-6 py-4">' . $ticket['created_at'] . '</td>';
                            echo '<td class="px-6 py-4">' . 500 . '</td>';
                            echo '</tr>';
                        }



                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="ml-8 border border-black w-1/3 rounded-lg shadow-md">
                <h2 class="text-2xl text-tekst font-semibold mb-4 p-4">Makse</h2>
                <form action="process_payment.php" method="POST" class="flex flex-col space-y-4 p-4" id="payment-form">
                    
                    <label for="card_number" class="text-tekst">Kaardinumber:</label>
                    <input type="text" id="card_number" name="card_number" required class="rounded-md">

                    <label for="expiration_date" class="text-tekst">Aegumiskuupäev:</label>
                    <input type="text" id="expiration_date" name="expiration_date" required class="rounded-md">

                    <label for="cvv" class="text-tekst">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required class="rounded-md">

                    <button type="submit" class="bg-primary text-tekst px-4 py-2 rounded-md">
                        Maksa
                    </button>
                </form>
            </div>
        </div>
    </div> 

    <!-- TABLE END -->
    <script>/*
    var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
    var elements = stripe.elements();

    // Create an instance of the card Element.
    var card = elements.create('card');

    // Add an instance of the card Element into the `card-element` div.
    card.mount('#card-element');

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createPaymentMethod({
            type: 'card',
            card: card,
        }).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the PaymentMethod ID to your server.
                fetch('create_payment_intent.php', {
                    method: 'POST',
                }).then(function (response) {
                    return response.json();
                }).then(function (paymentIntent) {
                    return stripe.confirmCardPayment(paymentIntent.clientSecret, {
                        payment_method: result.paymentMethod.id,
                    });
                }).then(function (result) {
                    if (result.error) {
                        // Show error to your customer.
                        console.error(result.error.message);
                    } else {
                        // Payment succeeded, redirect to a success page.
                        console.log(result);
                    }
                });
            }
        });
    });*/
    </script>
</body>
<?php include("./modules/footer.php") ?>

</html>