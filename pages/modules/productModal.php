<?php
include_once __DIR__ . '/../../config.php'; // This goes up two directories and then to db.php

if (!function_exists('getUserCharacters')) {
    function getUserCharacters($db, $discord_id) {
        try {
            $query = $db->prepare("SELECT charinfo FROM players WHERE discord = :discord_id");
            $query->bindParam(':discord_id', $discord_id, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result ?: []; // Return an empty array if no results
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());  // Log error or handle it appropriately
        }
    }
}

if (isset($_SESSION['discord_id'])) {
    $discord_id = $_SESSION['discord_id'];
}

$characters = getUserCharacters($db, $discord_id);
?>

<div id="popup-message" class="fixed top-10 inset-x-0 mx-auto w-80 px-6 py-3 bg-background border border-primary shadow-lg rounded-lg z-50 hidden">
    <p id="popup-text" class="text-center text-md"></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Modal Structure -->
<div id="<?= $customProdId ?>"
    class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden z-50">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-background w-full sm:w-1/2 md:max-w-3xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6 text-tekst">
            <!-- Close Modal Button -->
            <form method="post" class="modal-content text-left myForm" id="<?= $customProdId ?>_form" onsubmit="return validateForm()">
            <input type="hidden" name="customProdId" value="<?= $customProdId ?>">
            <input type="hidden" name="discordId" value="<?= $discord_id ?>">
            <input type="hidden" name="customProdPrice" value="<?= $customProdPrice ?>">
            <input type="hidden" name="userBalance" value="<?= $_SESSION["userBalance"] ?>">
            <input type="hidden" name="customProdTitle" value="<?= $customProdTitle ?>">


                <div class="flex justify-between items-center pb-3 border-b mb-4">
                    <div class="flex items-center text-xl font-medium">
                        <h1>
                            <?= $customProdTitle ?>
                        </h1>
                        ,  <?= $customProdPrice ?>
                        <img class="w-6 h-6 rounded-full ml-1" src="../assets/SSACoinTop.png" alt="Product Price">
                    </div>
                    <div class="modal-close cursor-pointer z-50" data-modal="<?= $customProdId ?>">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                        </svg>
                    </div>
                </div>
                <!-- Modal Content -->
                <div class="flex-nowrap sm:flex">
                    <img src="<?= $customProdPicture ?>" alt="<?= $customProdTitle ?>" class="mb-4 w-64 h-64" />
                    <div class="flex flex-col p-4">
                        <p class="py-4">
                            <?= $customProdDesc ?>
                        </p>
                        <div class="text-tekst flex flex-col flex-wrap mt-4 w-full ">
                            <?php switch ($customProdId):
                                // Car instance
                                case 'customCar': ?>
                                    <label for="car-character-select">Vali Karakter:</label>
                                    <select id="car-character-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>

                                    <label for="prod-link">Modi Link</label>
                                    <input type="text" id="prod-link" name="prodLink" placeholder="Sisesta link" class="input-field rounded-md bg-primary border-2 border-black" required/>


                                    <label for="additional-comments">Lisa Kommentaarid(Valikuline)</label>
                                    <input type="text" id="additional-comments" name="additionalComments" placeholder="Lisa kommentaarid" class="input-field rounded-md bg-primary border-2 border-black" />

                                    <?php break;
                                //Character instance
                                case 'customCharacter': ?>
                                    
                                    <?php break;

                                //MLO instance
                                case 'customFurniture': ?>
                                    <label for="mlo-char-select">Vali Karakter:</label>
                                    <select id="mlo-char-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>

                                    <label for="prod-link">Modi Link</label>
                                    <input type="text" id="prod-link" placeholder="Sisesta link"
                                        class="input-field rounded-md bg-primary border-2 border-black" required/>

                                    <label for="additional-comments">Lisa Kommentaarid(Valikuline)</label>
                                    <input type="text" id="additional-comments" placeholder="Lisa kommentaarid"
                                        class="input-field rounded-md bg-primary border-2 border-black" />
                                    <?php break;

                                // Name instance
                                case 'nameChange': ?>
                                    <label for="character-name-select">Vali Karakter:</label>
                                    <select id="character-name-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>

                                    <div class="flex justify-between"> 
                                    <label for="char-new-firstname">Sisesta Uus Eesnimi</label>
                                    <label for="char-new-lastname pl-2">Sisesta Uus Perekonnanimi</label>
                                    </div>
                                    <div class="flex"> 
                                        <input type="text" placeholder="New Character Name" id="char-new-firstname"
                                            class="input-field rounded-md bg-primary rounded-md border-2 border-black mr-4" name="charNewFirstname" required/>
                                        <input type="text" placeholder="New Character Name" id="char-new-lastname"
                                            class="input-field rounded-md bg-primary rounded-md border-2 border-black" name="charNewLastname" required/>
                                    </div>
                                    <?php break;
                                
                                // Queue instance
                                case 'dobChange': ?>
                                    <label for="dob-change-select">Vali karakter</label>
                                    <select id="dob-change-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>
                                    <label for="new-dob">Sisesta Sünnikuupäev</label>
                                    <input type="text" placeholder="Lisa karakteri uus sünnikuupäev" id="new-dob"
                                            class="input-field rounded-md bg-primary rounded-md border-2 border-black" name="dob-change" required/>
                                    <?php break;

                                // Plate instance
                                case 'customVehiclePlate': ?>

                                    <label for="veh-plate-select">Vali Karakter:</label>
                                    <select id="veh-plate-select" name="character"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>

                                    <label for="veh-car-select">Vali Auto:</label>
                                    <select id="veh-car-select" name="cars"
                                        class="input-field rounded-md bg-primary border-2 border-black p-2" required>
                                            <?php if (!empty($characters)): ?>
                                            <?php foreach ($characters as $character):
                                                // Assuming $character['charinfo'] contains a JSON string with 'firstname' and 'lastname'
                                                $charInfo = json_decode($character['charinfo'], true);
                                                $charName = htmlspecialchars($charInfo['firstname'] . " " . $charInfo['lastname']);
                                            ?>
                                                <option value="<?= $charName ?>"><?= $charName ?></option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">Sul pole karaktereid tehtud</option>
                                        <?php endif; ?>
                                    </select>

                                    <label for="form-input">Sisesta Numbrimärk:</label>
                                    <input type="text" id="form-input" placeholder="Numbrimärk"
                                        class="input-field rounded-md bg-primary border-2 border-black" required/>
                                    <?php break;

                            endswitch; ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-start space-x-3 mt-4 border-t">
                <button type="submit" id="<?= $customProdId ?>_submit"
    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mt-4">Kinnita</button>

                    <button type="button"
                        class="modal-close px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mt-4"
                        data-modal="<?= $customProdId ?>">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#<?= $customProdId ?>_form').submit(function(event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Get the ID of the form being submitted
        var formId = $(this).attr('id');


        // Serialize form data
        var formData = $(this).serialize();

        // Disable the submit button to prevent multiple submissions
        $('#' + formId + '_submit').prop('disabled', true);

        // Send form data via AJAX
        $.ajax({
            type: 'POST',
            url: './pages/functions/processShop.php',
            data: formData,
            success: function(response) {
                try {
                    // Log the response in the console
                    console.log("Resp:", response);

                    // Parse the JSON response
                    var jsonResponse = JSON.parse(response);

                    // Log the parsed response in the console
                    console.log("Parsed Resp:", jsonResponse);

                    // Show success or error message
                    if (jsonResponse.success) {
                        $('#userBalance').text(jsonResponse.updatedBalance);
                        $('.modal').addClass('hidden');
                        showMessage("Õnnestus: " + jsonResponse.message, 'green');
                    } else {
                        showMessage("Ostmise viga: " + jsonResponse.error, 'red');
                    }
                } catch (error) {
                    // Handle JSON parsing error
                    console.error('Error parsing JSON:', error);
                    showMessage("Error parsing JSON response", 'red');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('AJAX Error:', error);
                showMessage("AJAX Error: " + error, 'red');
            },
            complete: function() {
                // Re-enable the submit button after the request is complete
                $('#' + formId + '_submit').prop('disabled', false);
            }
        });
    });
});

// Function to show a message with a specified color
function showMessage(message, color) {
    // Create a message element
    var messageElement = $('<div class="text-sm rounded p-2"></div>').text(message);

    // Set the color of the message element
    messageElement.addClass('text-' + color + '-400');

    // Show popup message
    $('#popup-text').text(message);
    $('#popup-message').removeClass('hidden').addClass('flex text-' + color + '-400');
    setTimeout(function() {
        $('#popup-message').removeClass('flex').addClass('hidden');
    }, 5000); // Hide after 5 seconds
}

</script>