<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle AJAX request to save values into session variables
    if (isset($_POST['randomQuestions']) && isset($_POST['selectedOptions'])) {
        // Decode the JSON strings into arrays
        $randomQuestions = json_decode($_POST['randomQuestions'], true);
        $selectedOptions = json_decode($_POST['selectedOptions'], true);
        // ALUMISEGA TOOTAB ULEMISEGA WTF IS GOIN ON
        // $randomQuestions = [
        //     [
        //         "question" => "Mis on Powergaming Shining San Andreas serveris?",
        //         "options" => [
        //             ["text" => "Teha midagi, mis pole päriselus võimalik", "isCorrect" => true],
        //             ["text" => "Rollimängida realistlikult", "isCorrect" => false],
        //             ["text" => "Osaleda seaduslikus tegevuses", "isCorrect" => false],
        //             ["text" => "Loomulikult suhtlemine teiste mängijatega", "isCorrect" => false]
        //         ]
        //     ],
        //     [
        //         "question" => "Mis on keelatud Shining San Andreas serveris CK/PK reeglite järgi?",
        //         "options" => [
        //             ["text" => "CK tegemine ilma mõjuva põhjuseta", "isCorrect" => true],
        //             ["text" => "PK tegemine pärast põhjalikku analüüsi", "isCorrect" => false],
        //             ["text" => "CK tegemine grupeeringu liikmena põhjusega", "isCorrect" => false],
        //             ["text" => "PK tegemine ilma analüüsita", "isCorrect" => true]
        //         ]
        //     ],
        // ];
        // $selectedOptions = [
        //     "option1-0" => true,
        //     "option2-0" => true,
        //     "option2-3" => true,
        // ];        

        // Make here logic which check if selected options are correct. In order to get question correct ALL options must be correct and correct only.
        // Option1-3 means question 1, option 3. The false ones are not always selected.
        // expected output right now is 1 correct answer out of 2 questions.
       $correctOptions = [];

       // Loop through random questions to extract correct options
       foreach ($randomQuestions as $key => $question) {
           foreach ($question['options'] as $optionKey => $option) {
               // If the option is correct, add it to the correctOptions array
               if ($option['isCorrect']) {
                   $correctOptions['option' . ($key + 1) . '-' . $optionKey] = true;
               }
           }
       }
       $_SESSION['correctOptions'] = $correctOptions;
       // Check does all selected options with value true are correct
       // Initialize a variable to keep track of the number of correct answers

       $correctAnswers = 0;

       // Loop through random questions to check if selected options match correct options
       foreach ($randomQuestions as $key => $question) {
           // Initialize a flag to track if all selected options for this question are correct
           $selectedOptionsMatch = true;
       
           // Loop through options of the current question
           foreach ($question['options'] as $optionKey => $option) {
               $optionId = 'option' . ($key + 1) . '-' . $optionKey;
       
               // Check if the option is selected and is not correct
               if ($selectedOptions[$optionId] && !$option['isCorrect']) {
                   // If any selected option is incorrect, mark the match as false and break
                   $selectedOptionsMatch = false;
                   break;
               }
       
               // Check if the option is correct but not selected
               if ($option['isCorrect'] && !$selectedOptions[$optionId]) {
                   // If any correct option is not selected, mark the match as false and break
                   $selectedOptionsMatch = false;
                   break;
               }
           }
       
           // If all selected options for this question are correct, increment the correctAnswers count
           if ($selectedOptionsMatch) {
               $correctAnswers++;
           }
       }

// Save the result into session variable
$_SESSION['quizResult2'] = [
    'correctAnswers' => $correctAnswers,
    'totalQuestions' => count($randomQuestions)
];

exit; // Exit to prevent further output



        
        


        // Save the result into session variable
        $_SESSION['quizResult2'] = [
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'correctOptions' => $correctOptions,
            'selectedOptions' => $selectedOptions
        ];
        
        exit; // Exit to prevent further output
    }
}
?>
