<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="../styles/output.css" rel="stylesheet" />
    <title>Support - ShiningRP</title>
</head>

<?php include("./modules/navbar.php") ?>

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
            // ... (similar structure for other questions)
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

        <!-- Display "Check Answers" button if it hasn't been clicked yet -->
        <form id="quizForm" method="post">
            <button type="button" onclick="checkAnswers()" name="checkAnswers">Check Answers</button>
        </form>

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
                var form = document.getElementById("quizForm");
                alert("xd");
                form.submit();
            }
        </script>

    <?php } else { ?>
        <?php
        // Check if the hidden input field is set, indicating that "Check Answers" button has been clicked
        if (isset($_POST['checkAnswers']) && $_POST['checkAnswers'] === 'true') {
            // Calculate and display the score
            $correctCount = 0;

            for ($i = 1; $i <= count($questionsAndOptions); $i++) {
                $currentQuestion = $questionsAndOptions[$i - 1];
                $selectedOptionsForQuestion = [];

                for ($j = 0; $j < count($currentQuestion['options']); $j++) {
                    $checkboxId = 'option' . $i . '-' . $j;
                    if (isset($_POST[$checkboxId])) {
                        $selectedOptionsForQuestion[] = $currentQuestion['options'][$j]['text'];
                    }
                }

                $correctOptions = array_column(array_filter($currentQuestion['options'], function ($option) {
                    return $option['isCorrect'];
                }), 'text');

                $isCorrect = count(array_diff($selectedOptionsForQuestion, $correctOptions)) === 0
                    && count(array_diff($correctOptions, $selectedOptionsForQuestion)) === 0;

                if ($isCorrect) {
                    $correctCount++;
                }
            }
        ?>

            <!-- Display the score and "Take the Quiz Again" button -->
            <div id="feedback">
                <p>Correct Answers: <?php echo $correctCount; ?> out of <?php echo count($questionsAndOptions); ?></p>
            </div>
            <form method="post">
                <button type="submit" name="takeQuiz">Take the Quiz Again</button>
            </form>
        <?php } ?>
    <?php } ?>

    <?php include("./modules/footer.php") ?>

</body>

</html>
