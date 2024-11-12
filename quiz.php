<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Algebra Quiz</title>
    <link rel="stylesheet" href="quiz.css">
    <link rel="icon" href="./images/graduation-cap.png">
</head>
<body>
    <div class="container">
        <h1>Algebra Quiz</h1>
        <div id="quiz-container">
            <div id="question-container">
                <h2 id="question"></h2>
                <div id="answer-options"></div>
                <button id="submit-btn">Submit</button>
                <p id="feedback"></p>
            </div>
            <div id="progress">
                <p>Question <span id="current-question">1</span> of <span id="total-questions"></span></p>
                <progress id="progress-bar" value="0" max="100"></progress>
            </div>
        </div>
        <div id="result" style="display: none;">
            <h2>Your Score: <span id="score"></span></h2>
            <button id="restart-btn">Restart Quiz</button>
        </div>
    </div>

    <script src="quiz.js"></script>
</body>
</html>
