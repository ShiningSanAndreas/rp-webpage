<?php
// functions.php
function getOpenTickets() {
    // Fetch and return open tickets from the database
    // You need to implement database connection and query here
    // For simplicity, let's return dummy data
    return [
        ['id' => 1, 'title' => 'Issue 1', 'description' => 'Description of issue 1', 'created_at' => '12. January 2024', 'category' => 'Bug', 'status' => 'Avatud'],
        ['id' => 2, 'title' => 'Issue 2', 'description' => 'Description of issue 2', 'created_at' => '12. January 2024', 'category' => 'Rikkumine', 'status' => 'Suletud'],
    ];
}

function getTicketById($ticketId) {
    // Fetch and return ticket details by ID from the database
    // You need to implement database connection and query here
    // For simplicity, let's return dummy data
    $tickets = getOpenTickets();

    foreach ($tickets as $ticket) {
        if ($ticket['id'] == $ticketId) {
            return $ticket;
        }
    }

    return null;
}

?>