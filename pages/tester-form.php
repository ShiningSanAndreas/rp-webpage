<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Support - ShiningRP</title>
</head>


<body class="bg-background">
    <div class="ml-auto mb-6 lg:w-[70%] xl:w-[75%] 2xl:w-[85%] mx-auto">
        <div class="text-white mt-16 mb-6">
            <h2 class="text-3xl font-semibold">Support</h2>
        </div>
    </div>

    <?php
    // Check if the user has clicked "TAKE THE QUIZ" button
    $showQuiz = isset($_POST['takeQuiz']);

    if ($showQuiz) {
        // Dummy data for 10 questions using PHP array
        $questionsAndOptions = [
            [
                'question' => 'What is the capital of France?',
                'options' => [
                    ['text' => 'Paris', 'isCorrect' => true],
                    ['text' => 'London', 'isCorrect' => false],
                    ['text' => 'Berlin', 'isCorrect' => false],
                    ['text' => 'Madrid', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'Which planet is known as the Red Planet?',
                'options' => [
                    ['text' => 'Mars', 'isCorrect' => true],
                    ['text' => 'Jupiter', 'isCorrect' => false],
                    ['text' => 'Saturn', 'isCorrect' => false],
                    ['text' => 'Venus', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'What is the largest mammal?',
                'options' => [
                    ['text' => 'Elephant', 'isCorrect' => false],
                    ['text' => 'Blue Whale', 'isCorrect' => true],
                    ['text' => 'Giraffe', 'isCorrect' => false],
                    ['text' => 'Lion', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'Who wrote "Romeo and Juliet"?',
                'options' => [
                    ['text' => 'William Shakespeare', 'isCorrect' => true],
                    ['text' => 'Jane Austen', 'isCorrect' => false],
                    ['text' => 'Charles Dickens', 'isCorrect' => false],
                    ['text' => 'Mark Twain', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'In which year did the Titanic sink?',
                'options' => [
                    ['text' => '1912', 'isCorrect' => true],
                    ['text' => '1900', 'isCorrect' => false],
                    ['text' => '1925', 'isCorrect' => false],
                    ['text' => '1935', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'What is the square root of 144?',
                'options' => [
                    ['text' => '12', 'isCorrect' => true],
                    ['text' => '15', 'isCorrect' => false],
                    ['text' => '10', 'isCorrect' => false],
                    ['text' => '18', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'Which element has the chemical symbol "O"?',
                'options' => [
                    ['text' => 'Oxygen', 'isCorrect' => true],
                    ['text' => 'Gold', 'isCorrect' => false],
                    ['text' => 'Iron', 'isCorrect' => false],
                    ['text' => 'Carbon', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'What is the currency of Japan?',
                'options' => [
                    ['text' => 'Yen', 'isCorrect' => true],
                    ['text' => 'Dollar', 'isCorrect' => false],
                    ['text' => 'Euro', 'isCorrect' => false],
                    ['text' => 'Pound', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'Who painted the Mona Lisa?',
                'options' => [
                    ['text' => 'Leonardo da Vinci', 'isCorrect' => true],
                    ['text' => 'Vincent van Gogh', 'isCorrect' => false],
                    ['text' => 'Pablo Picasso', 'isCorrect' => false],
                    ['text' => 'Michelangelo', 'isCorrect' => false],
                ],
            ],
            [
                'question' => 'What is the main ingredient in guacamole?',
                'options' => [
                    ['text' => 'Avocado', 'isCorrect' => true],
                    ['text' => 'Tomato', 'isCorrect' => false],
                    ['text' => 'Onion', 'isCorrect' => false],
                    ['text' => 'Cilantro', 'isCorrect' => false],
                ],
            ],
        ];
        ?>
        <!-- component -->
        <div class="flex items-center justify-between text-base text-gray-600 dark:text-gray-400">
            <?php for ($i = 1; $i <= 10; $i++) : ?>
                <div class="flex items-center">
                    <a href="#" class="w-12 h-12 bg-indigo-400 rounded-full flex items-center justify-center text-white text-xl" onclick="showSection(<?php echo $i; ?>)">
                        <?php echo $i; ?>
                    </a>
                    <?php if ($i < 10) : ?>
                        <div class="h-1 w-32 bg-indigo-200 dark:bg-indigo-600"></div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>

        <div id="sectionContent">
            <p>Select a section to see the question and options.</p>
        </div>

        <button onclick="checkAnswers()">Check Answers</button>
        <div id="feedback"></div>

        <script>
            // Initialize an object to store selected options for each section
            var selectedOptions = {};

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
                        var isChecked = selectedOptions[checkboxId];
                        optionsHTML += '<li><input type="checkbox" id="' + checkboxId + '" name="options" ' +
                            (isChecked ? 'checked' : '') +
                            '><label for="' + checkboxId + '">' + option['text'] + '</label>' +
                            (option['isCorrect'] ? ' (Correct)' : '') +
                            '</li>';
                    }
                    optionsHTML += '</ul>';

                    sectionContent.innerHTML = questionHTML + optionsHTML;

                    // Add event listener to update selected options in the variable on checkbox change
                    var checkboxes = document.querySelectorAll('input[name="options"]');
                    checkboxes.forEach(function (checkbox) {
                        checkbox.addEventListener('change', function () {
                            updateSelectedOptions(number, checkbox.id);
                        });
                    });
                } else {
                    sectionContent.innerHTML = '<p>No question found for this section.</p>';
                }
            }

            function updateSelectedOptions(number, checkboxId) {
                selectedOptions[checkboxId] = !selectedOptions[checkboxId];
            }

            function checkAnswers() {
                var feedback = document.getElementById("feedback");
                var totalQuestions = <?php echo count($questionsAndOptions); ?>;
                var correctCount = 0;

                for (var i = 1; i <= totalQuestions; i++) {
                    var currentQuestion = <?php echo json_encode($questionsAndOptions); ?>[i - 1];
                    var selectedOptionsForQuestion = [];

                    for (var j = 0; j < currentQuestion['options'].length; j++) {
                        var checkboxId = 'option' + i + '-' + j;
                        if (selectedOptions[checkboxId]) {
                            selectedOptionsForQuestion.push(currentQuestion['options'][j]['text']);
                        }
                    }

                    var correctOptions = currentQuestion['options'].filter(option => option['isCorrect']).map(option => option['text']);
                    var isCorrect = arraysEqual(selectedOptionsForQuestion.sort(), correctOptions.sort());

                    if (isCorrect) {
                        correctCount++;
                    }
                }

                feedback.innerHTML = '<p>Correct Answers: ' + correctCount + ' out of ' + totalQuestions + '</p>';
            }

            // Function to compare arrays
            function arraysEqual(arr1, arr2) {
                if (arr1.length !== arr2.length) return false;
                for (var i = 0; i < arr1.length; i++) {
                    if (arr1[i] !== arr2[i]) return false;
                }
                return true;
            }
        </script>
    <?php } else { ?>
        <!-- Display "TAKE THE QUIZ" button if the user hasn't clicked it yet -->
        <form method="post">
            <button type="submit" name="takeQuiz">TAKE THE QUIZ</button>
        </form>
    <?php } ?>

    <?php include("./modules/footer.php") ?>

</body>

</html>
