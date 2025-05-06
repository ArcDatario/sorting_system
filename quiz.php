<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Algorithms Quiz | SortArtOnline</title>
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css">
     
<link rel="stylesheet" href="assets/css/quiz.css">

</head>
<body>
<div class="loader-container">
  <div class="loader-spinner">
    <div class="sorting-bars"></div>
    <div class="loader-text">Loading</div>
  </div>
</div>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="learn">Learn</a></li>
            <li><a href="sort-visualization">Visualize</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="offline">Offline</a></li>
        </ul>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <div class="quiz-container" id="quizContainer">
            <div class="quiz-setup" id="quizSetup">
                <div class="quiz-header">
                    <h1 class="quiz-title">Sorting Algorithms Quiz</h1>
                    <p class="quiz-description">Test your knowledge of various sorting algorithms with this interactive quiz!</p>
                </div>
                <h2>How many questions would you like?</h2>
                <div class="quiz-setup-options">
                    <div class="quiz-setup-option" data-questions="10">10 Questions</div>
                    <div class="quiz-setup-option" data-questions="15">15 Questions</div>
                    <div class="quiz-setup-option" data-questions="20">20 Questions</div>
                </div>
                <button class="quiz-button" id="startQuizBtn">Start Quiz</button>
            </div>

            <div class="quiz-game" id="quizGame" style="display: none;">
                <div class="quiz-header">
                    <h1 class="quiz-title">Sorting Algorithms Quiz</h1>
                    <div class="quiz-progress">
                        <div class="quiz-progress-bar" id="quizProgressBar"></div>
                    </div>
                </div>
                <div class="quiz-question" id="quizQuestion"></div>
                <div id="interactiveContainer"></div>
                <div class="quiz-options" id="quizOptions"></div>
                <button class="quiz-button" id="nextQuestionBtn" disabled>Next Question</button>
            </div>

            <div class="quiz-result" id="quizResult">
                <h1 class="quiz-result-title" id="resultTitle">Quiz Completed!</h1>
                <div id="resultEmoji"></div>
                <div class="quiz-result-score" id="quizScore"></div>
                <p class="quiz-result-message" id="resultMessage"></p>
                <button class="quiz-button" id="restartQuizBtn">Take Another Quiz</button>
            </div>
        </div>
    </div>

    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>
    
     
        <script src="assets/js/spinner.js"></script>

    <script src="assets/js/quiz.js"></script>
    
    </script>

    <script>
          document.addEventListener('DOMContentLoaded', function() {
    // Check saved preference
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    
    // Apply saved mode
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
    
    // Set up toggle button
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            const isDark = document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', isDark);
        });
    }
});
    </script>

</body>
</html>