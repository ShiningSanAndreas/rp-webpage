<!-- index.php -->
<?php require __DIR__ . '/./functions/support.php'; ?>



<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Support - ShiningRP</title>
</head>

<?php require __DIR__ . "/./modules/navbar.php" ?>



<body class="bg-background">
    <div class="ml-auto mb-6 lg:w-[70%] xl:w-[75%] 2xl:w-[85%] mx-auto">
        <div class="text-white mt-16 mb-6">
            <h2 class="text-3xl font-semibold">Support</h2>
        </div>

        <!-- TABLE TO COMPONENT LATER -->

        <div class="container mx-auto p-8">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Pealkiri
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategooria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Staatus
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Loodud
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Detailid</span>
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
                            echo '<td class="px-6 py-4 text-right">';
                            echo '<a href="supportDetails.php?id=' . $ticket['id'] . '" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View Details</a>';
                            echo '</td>';
                            echo '</tr>';
                        }



                        ?>






                        <!-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Pole relva
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <!-- TABLE END -->

</body>
<?php require __DIR__ . "/./modules/footer.php" ?>

</html>