<!-- view.php -->
<?php include('./functions/support.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <?php
        // Assume you have a function to fetch ticket details by ID
        $ticketId = $_GET['id'];
        $ticket = getTicketById($ticketId);

        if ($ticket) {
            echo '<h1 class="text-3xl font-semibold mb-4">' . $ticket['title'] . '</h1>';
            echo '<p class="text-gray-600">#' . $ticket['id'] . ' - Created at ' . $ticket['created_at'] . '</p>';
            echo '<p class="text-gray-700">' . $ticket['description'] . '</p>';
        } else {
            echo '<p class="text-red-500">Ticket not found</p>';
        }
        ?>
    </div>

</body>
</html>