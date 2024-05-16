<?php
session_start();
require __DIR__ . '/../../config.php';
extract($_SESSION["userData"]);
try {
    $db = new PDO($configDsn, $configDbName, $configDbPw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage(); // You should echo the error message to see the error, or handle it accordingly
}

$orders = getUserOrders($discord_id, $db);

// Define an array to hold the data for each item
$items = [];

foreach ($orders as $order) {
    $date = date("d.m.Y", strtotime($order["orderDate"]));
    $title = $order["productName"];
    $content = "-" . $order["price"] . " ";
    if ($order["purchaseType"] === "coin") {
        $content .= "€";
    } elseif ($order["purchaseType"] === "service") {
        $content .= '<img src="../../assets/SmlSSACoin.png" alt="coin" class="inline-block w-4 h-4">';
    }

    $items[] = [
        "date" => $date,
        "title" => $title,
        "content" => $content
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php foreach ($items as $item): ?>
    <div class="relative pl-8 sm:pl-32 py-6 group">
        <div class="font-caveat font-medium text-2xl text-light mb-1 sm:mb-0"><?= $item["title"] ?></div>
        <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-0 before:h-full before:px-px before:bg-slate-300 sm:before:ml-[6.5rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-0 after:w-2 after:h-2 after:bg-green-400 after:border-4 after:box-content after:border-slate-50 after:rounded-full sm:after:ml-[6.5rem] after:-translate-x-1/2 after:translate-y-1.5">
            <time class="sm:absolute left-0 translate-y-0.5 inline-flex items-center justify-center text-xs font-semibold uppercase w-20 h-6 mb-3 sm:mb-0 text-emerald-600 bg-emerald-100 rounded-full"><?= $item["date"] ?></time>
            <div class="text-xl font-bold text-tekst"><?= $item["content"] ?></div>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>

<?php
function getUserOrders($discord_id, $db) {
    $query = $db->prepare("SELECT * FROM ucp_orders WHERE discord_id = :discord_id");
    $query->bindParam(':discord_id', $discord_id);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
