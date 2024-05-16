<?php

// Shuffle the array to get random questions
shuffle($questionsAndOptions);

// Take the first 10 questions
$randomQuestions = array_slice($questionsAndOptions, 0, 10);

// Save the random questions in the session variable
$_SESSION['randomQuestions'] = $randomQuestions;

// Check if the session variable is set before using it
if (isset($_SESSION['selectedOptions'])) {
} else {
}
?>



<div class="container mx-auto flex md:flex-col">
<ol id="sectionList" class="md:flex items-center w-full">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <li class="flex w-full items-center m-2 md:m-0 <?php if ($i === 1): ?>md:ml-10 <?php endif; ?><?php if ($i < 10): ?>md:after:content-[''] md:after:w-full md:after:h-1 md:after:border-b md:after:border-primary md:after:border-4 md:after:inline-block <?php endif; ?><?php if ($i < $currentSection): ?> completed-step<?php endif; ?>">
            <span class="flex text-tekst items-center justify-center w-10 h-10 bg-primary rounded-full lg:h-12 lg:w-12 shrink-0">
                <?php echo $i; ?>
            </span>
        </li>
    <?php endfor; ?>
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
    
    <div class="relative">
    <form method="post">
        <button class="absolute bottom-0 right-0 m-8 text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center" type="submit" onclick="checkAnswers()" name="view" value="lobby">Lõpeta</button>
        <button class="absolute bottom-0 left-0 m-8 text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center" id="backBtn" type="button" onclick="navigateSection('back')">Eelmine küsimus</button>
        <button class="absolute bottom-0 right-0 m-8 text-tekst bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center" id="nextBtn" type="button" onclick="navigateSection('next')">Järgmine küsimus</button>
        <!-- Add this button after the "Next" button -->

    </form>
    </div>
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
  var goToLobbyButton = document.querySelector('button[name="view"]');
  var nextButton = document.querySelector('button[id="nextBtn"]');
  var backButton = document.querySelector('button[id="backBtn"]');
  var spans = document.querySelectorAll('#sectionList li span');
    spans.forEach(function (span) {
        span.classList.remove('ring-4', 'ring-green-300', 'outline-none');
    });

  // Check if the selected number is within the array bounds
  if (number >= 1 && number <= <?php echo count($questionsAndOptions); ?>) {
        var currentQuestion = <?php echo json_encode($_SESSION['randomQuestions']); ?>[number - 1];
        var questionHTML = `<p class="text-3xl font-bold leading-7 text-tekst p-4 my-16 border-l rounded border-light shadow-shadBef py-4"> <span class="text-4xl font-semibold text-accent"> KÜSIMUS ${number}: <br></span> ${currentQuestion['question']}</p>`;
        var optionsHTML = '<div class="flex-col md:grid md:grid-cols-2 gap-4 md:gap-x-16 md:gap-y-8 mb-32 ">';

        for (var i = 0; i < currentQuestion['options'].length; i++) {
      var option = currentQuestion['options'][i];
      var checkboxId = 'option' + number + '-' + i;
      var isChecked = selectedOptions[checkboxId] ? 'checked' : '';


      optionsHTML += `<div>
                        <input type="checkbox" id="${checkboxId}" name="options[]" data-field="${checkboxId}" ${isChecked} class="hidden peer" required="">
                        <label for="${checkboxId}" class="text-center inline-flex items-center justify-between border-x rounded-lg mt-4 border-[#f8f8ff] w-full p-6 text-tekst bg-background  cursor-pointer shadow-shadBefWhite hover:shadow-shadBef peer-checked:shadow-shadAft peer-checked:border-accent dark:bg-gray-800 dark:hover:bg-gray-700">
                          <div class="block">
                            <div class="w-full text-base text-center">${option['text']}</div>
                          </div>
                        </label>
                      </div>`;
    }

    optionsHTML += '</div>';

    sectionContent.innerHTML = questionHTML + optionsHTML;

    // Add event listener to update selected options in the variable on checkbox change
    var checkboxes = document.querySelectorAll('input[name="options[]"]');
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        updateSelectedOptions(checkbox.id, checkbox.checked);
      });
    });

        // Show/Hide "Go to Lobby" button based on the current section
if (number === 10) {
    goToLobbyButton.style.display = 'inline-block';
    nextButton.style.display = 'none';
} else {
    goToLobbyButton.style.display = 'none';
    nextButton.style.display = 'inline-block';
}

// Show/Hide "Back" button based on the current section
if (number === 1) {
    backButton.style.display = 'none';
} else {
    backButton.style.display = 'inline-block';
}
    } else {
        sectionContent.innerHTML = '<p>No question found for this section.</p>';
    }

    // Loop through all steps and add the completed-step class if the step is completed
    var steps = document.querySelectorAll('#sectionList li');
    for (var i = 0; i < steps.length; i++) {
        var li = steps[i];
        var span = li.querySelector('span');

        if (i + 1 < number) {
            li.classList.remove('after:border-primary');
            li.classList.add('after:border-green-400');
            span.classList.remove('bg-primary');
            span.classList.add('bg-gradient-to-r', 'from-green-400', 'via-green-500', 'to-green-600', 'hover:bg-gradient-to-br');

            span.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-white"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';

        } else {
            li.classList.remove('after:border-green-400');
            li.classList.add('after:border-primary');
            span.classList.remove('bg-gradient-to-r', 'from-green-400', 'via-green-500', 'to-green-600', 'hover:bg-gradient-to-br');
            span.classList.add('bg-primary');

            if (i + 1 === number) {
                // Add red border to the span of the currently active step
                span.classList.add('ring-4', 'ring-green-300', 'outline-none');
            } else {
                span.classList.remove('ring-4', 'ring-green-300', 'outline-none');
            }

            

            span.innerHTML = i + 1; // Show the number when not completed
        }

        // Update line width for completed steps
        if (li.classList.contains('completed-step')) {
            var percentage = (i + 1) * (100 / steps.length);
            var line = li.querySelector('li.completed-step:after');
        }
    }
}



    function updateSelectedOptions(checkboxId, isChecked) {
        selectedOptions[checkboxId] = isChecked;

        // AJAX call to update server-side variable
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'pages/modules/savequiz.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        // Convert the selectedOptions object to JSON and send it in the request
        var selectedOptionsJSON = JSON.stringify(selectedOptions);
        var data = 'selectedOptions=' + encodeURIComponent(selectedOptionsJSON);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                } else {
                }
            }
        };

        xhr.send(data);
    }
    function checkAnswers() {
    var totalQuestions = <?php echo count($questionsAndOptions); ?>;
    var correctAnswers = 0;
    var incorrectQuestions = [];

    // Iterate through the selected options and compare with correct answers for each question
    for (var i = 0; i < totalQuestions; i++) {
        var currentQuestion = <?php echo json_encode($_SESSION['randomQuestions']); ?>[i];
        var allCorrectOptionsSelected = true;
        var anyIncorrectOptionSelected = false;

        for (var j = 0; j < currentQuestion['options'].length; j++) {
            var option = currentQuestion['options'][j];
            var checkboxId = 'option' + (i + 1) + '-' + j;

            // Check if the option is correct and selected, or incorrect and not selected
            if ((option['isCorrect'] && !selectedOptions[checkboxId]) ||
                (!option['isCorrect'] && selectedOptions[checkboxId])) {
                allCorrectOptionsSelected = false;

                if (!option['isCorrect'] && selectedOptions[checkboxId]) {
                    anyIncorrectOptionSelected = true;
                }

                break; // Break the loop if any correct option is not selected or any incorrect option is selected
            }
        }

        if (allCorrectOptionsSelected && !anyIncorrectOptionSelected) {
            correctAnswers++;
        } else {
            incorrectQuestions.push(currentQuestion['question']);
        }
    }

    // Make an AJAX call to save_results.php
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'pages/modules/savequizresult.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    var data = 'correctAnswers=' + encodeURIComponent(correctAnswers) +
               '&incorrectQuestions=' + encodeURIComponent(JSON.stringify(incorrectQuestions));

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
            } else {
            }
        }
    };

    xhr.send(data);

    // Display the result with information about incorrect questions
    var resultMessage = 'You got ' + correctAnswers + ' out of ' + totalQuestions + ' correct answers.';
    if (incorrectQuestions.length > 0) {
        resultMessage += '\n\nIncorrectly answered questions:\n' + incorrectQuestions.join('\n');
    }
}


</script>