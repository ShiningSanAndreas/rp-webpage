<!-- quiz.php -->
<?php 
session_start(); // Start the session

// Check if the session variable is set before using it
if (isset($_SESSION['selectedOptions'])) {
    echo json_encode($_SESSION['selectedOptions']);
} else {
    echo 'Session variable not set.';
}
?>



<div class="container mx-auto border">
<ol id="sectionList" class="flex items-center w-full">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <li class="flex w-full items-center <?php if ($i < 10): ?>after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700<?php endif; ?>" onclick="showSection(<?php echo $i; ?>)">
                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <?php echo $i; ?>
                </span>
            </li>
        <?php endfor; ?>
    </ol>
    </ol>



    <div id="sectionContent" class="m-8">
        <!-- Initially, show options for question 1 -->
        <script>
            // Call the showSection function for question 1 immediately after the page loads
            document.addEventListener("DOMContentLoaded", function () {
                showSection(1);
            });
        </script>
    </div>

    <form method="post">
        <button type="submit" name="view" value="lobby">Go to Lobby</button>
        <button type="button" onclick="navigateSection('back')">Back</button>
        <button type="button" onclick="navigateSection('next')">Next</button>
    </form>
</div>

<script>
    // Initialize the current section number and selected options
    var currentSection = 1;
    var selectedOptions = {};

    // Function to navigate between sections
    function navigateSection(direction) {
        if (direction === 'back' && currentSection > 1) {
            currentSection--;
        } else if (direction === 'next' && currentSection < <?php echo count($questionsAndOptions); ?>) {
            currentSection++;
        }

        // Call the showSection function for the updated section
        showSection(currentSection);
    }

    function showSection(number) {
        var sectionContent = document.getElementById("sectionContent");

        // Check if the selected number is within the array bounds
        if (number >= 1 && number <= <?php echo count($questionsAndOptions); ?>) {
            var currentQuestion = <?php echo json_encode($questionsAndOptions); ?>[number - 1];
            var questionHTML = '<p>' + currentQuestion['question'] + '</p>';
            var optionsHTML = '<ul>';
            
            for (var i = 0; i < currentQuestion['options'].length; i++) {
                var option = currentQuestion['options'][i];
                var checkboxId = 'option' + number + '-' + i;
                var isChecked = selectedOptions[checkboxId] ? 'checked' : '';

                optionsHTML += '<li>';
                optionsHTML += '<input type="checkbox" id="' + checkboxId + '" name="options[]" data-field="' + checkboxId + '" ' + isChecked + '>';
                optionsHTML += '<label for="' + checkboxId + '">' + option['text'] + (option['isCorrect'] ? ' (Correct)' : '') + '</label>';
                optionsHTML += '</li>';
            }

            optionsHTML += '</ul>';

            sectionContent.innerHTML = questionHTML + optionsHTML;

            // Add event listener to update selected options in the variable on checkbox change
            var checkboxes = document.querySelectorAll('input[name="options[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    updateSelectedOptions(checkbox.id, checkbox.checked);
                });
            });
        } else {
            sectionContent.innerHTML = '<p>No question found for this section.</p>';
        }
    }

    function updateSelectedOptions(checkboxId, isChecked) {
        selectedOptions[checkboxId] = isChecked;
        console.log(selectedOptions);

        // AJAX call to update server-side variable
        var xhr = new XMLHttpRequest();
        xhr.open('POST', './modules/savequiz.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        // Convert the selectedOptions object to JSON and send it in the request
        var selectedOptionsJSON = JSON.stringify(selectedOptions);
        var data = 'selectedOptions=' + encodeURIComponent(selectedOptionsJSON);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log('Server variable updated successfully.');
                } else {
                    console.error('Error updating server variable:', response.message);
                }
            }
        };

        xhr.send(data);
    }
</script>
