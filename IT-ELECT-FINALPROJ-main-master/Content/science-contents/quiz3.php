<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATH QUIZ</title>
    <script src="../../js/courses.js"></script>
    <link rel="stylesheet" href="../../Content/css/style-courses.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <!-- QUIZZES -->
    <div class="overlay"></div>
        <div class="quiz-popup">
        <h1>MATHEMATICS QUIZ</h1>
        <form action="quiz_handler.php" method="post">
            <div class="options-container">
                <div>
                    <label for="question1">Question 1: Choose one option</label>
                    <div>
                        <input type="radio" id="q1OptionA" name="question1" value="a">
                        <label for="q1OptionA">Option A</label>
                    </div>
                    <div>
                        <input type="radio" id="q1OptionB" name="question1" value="b">
                        <label for="q1OptionB">Option B</label>
                    </div>
                    <div>
                        <input type="radio" id="q1OptionC" name="question1" value="c">
                        <label for="q1OptionC">Option C</label>
                    </div>
                </div>

                <div>
                    <label for="question2">Question 2: Choose one option</label>
                    <div>
                        <input type="radio" id="q2OptionA" name="question2" value="a">
                        <label for="q2OptionA">Option A</label>
                    </div>
                    <div>
                        <input type="radio" id="q2OptionB" name="question2" value="b">
                        <label for="q2OptionB">Option B</label>
                    </div>
                    <div>
                        <input type="radio" id="q2OptionC" name="question2" value="c">
                        <label for="q2OptionC">Option C</label>
                    </div>
                </div>

                <div>
                    <label for="question3">Question 3: Choose one option</label>
                    <div>
                        <input type="radio" id="q3OptionA" name="question3" value="a">
                        <label for="q3OptionA">Option A</label>
                    </div>
                    <div>
                        <input type="radio" id="q3OptionB" name="question3" value="b">
                        <label for="q3OptionB">Option B</label>
                    </div>
                    <div>
                        <input type="radio" id="q3OptionC" name="question3" value="c">
                        <label for="q3OptionC">Option C</label>
                    </div>
                </div>

                <div>
                    <label for="question4">Question 4: Choose one option</label>
                    <div>
                        <input type="radio" id="q4OptionA" name="question4" value="a">
                        <label for="q4OptionA">Option A</label>
                    </div>
                    <div>
                        <input type="radio" id="q4OptionB" name="question4" value="b">
                        <label for="q4OptionB">Option B</label>
                    </div>
                    <div>
                        <input type="radio" id="q4OptionC" name="question4" value="c">
                        <label for="q4OptionC">Option C</label>
                    </div>
                </div>

                <div>
                    <label for="question5">Question 5: Choose one option</label>
                    <div>
                        <input type="radio" id="q5OptionA" name="question5" value="a">
                        <label for="q5OptionA">Option A</label>
                    </div>
                    <div>
                        <input type="radio" id="q5OptionB" name="question5" value="b">
                        <label for="q5OptionB">Option B</label>
                    </div>
                    <div>
                        <input type="radio" id="q5OptionC" name="question5" value="c">
                        <label for="q5OptionC">Option C</label>
                    </div>
                </div>

                <!-- Input for the score -->
                <input type="hidden" id="score" name="score" value="0">

                <!-- Submit button -->
                <div class="submit-btn">
                    <button type="button" onclick="checkAnswers()">Submit</button>
                </div>
            </div>
        </form>
        </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelector('form').addEventListener('submit', function (event) {
  
                            event.preventDefault();

                            checkAnswers();
                        });
                    });

                    function checkAnswers() {
                        var correctAnswers = ['b', 'c', 'a', 'b', 'c'];
                        var score = 0;

                        for (var i = 1; i <= 5; i++) {
                            var selectedOption = document.querySelector('input[name="question' + i + '"]:checked');

                            if (selectedOption) {
                                if (selectedOption.value === correctAnswers[i - 1]) {
                                    score++;
                                }
                            }
                        }

                        if (score >= 3) {
                Swal.fire({
                    title: 'Congratulations!',
                    text: 'You have passed with a score of ' + score + '/5.',
                    icon: 'success'
                });
            } else {
                Swal.fire({
                    title: 'Sorry!',
                    text: 'You did not pass. Your score is ' + score + '/5. Please try again.',
                    icon: 'error'
                });
            }
                    }
</script>
</body>
</html>