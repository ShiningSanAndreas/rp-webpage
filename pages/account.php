<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<?php include('./modules/navbar.php')?>
<body class="bg-background">
    <div class="flex flex-row justify-center max-w-screen-lg">
        <div class="p-5 text-tekst">
            <ul>
                <li><a href="./accountPages/dashboard.php" class="ajax-link text-light">Dashboard</a></li>
                <li><a href="./accountPages/account_details.php" class="ajax-link">Account Details</a></li>
                <li><a href="./accountPages/orders.php" class="ajax-link">Orders</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div class="p-5 content">
            <!-- Content will be loaded here via AJAX -->
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('.ajax-link');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
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
            fetchContent('./accountPages/dashboard.php');
        });
    </script>
</body>
<?php include('./modules/footer.php')?>
</html>
