<!-- quiz.php -->

<div class="container mx-auto border">
    <div class="flex items-center justify-between text-base text-gray-600 dark:text-gray-400">
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <div class="flex items-center">
                <a href="#" class="w-12 h-12 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 rounded-full flex items-center justify-center text-white text-xl" onclick="showSection(<?php echo $i; ?>)">
                    <?php echo $i; ?>
                </a>
            </div>
        <?php endfor; ?>
    </div>

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
        // You can add an AJAX call here to update the session variable in PHP without a page refresh.
    }
</script>
