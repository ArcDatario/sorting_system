<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting Algorithms Quiz | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        :root {
           
            --highlight-color: #ffeb3b;
            --correct-color: #4CAF50;
            --incorrect-color: #F44336;
            --transition: all 0.3s ease;
        }

        
    

        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 70vh;
        }

        /* Quiz Styles */
        .quiz-container {
            width: 100%;
            max-width: 800px;
            background: var(--background);
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .quiz-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .quiz-title {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .quiz-description {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .quiz-progress {
            height: 6px;
            background-color: var(--border-color);
            border-radius: 3px;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .quiz-progress-bar {
            height: 100%;
            background-color: var(--primary-color);
            width: 0%;
            transition: width 0.5s ease;
        }

        .quiz-question {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .quiz-options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .quiz-option {
            padding: 1rem;
            background-color: var(--background);
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }

        .quiz-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(44, 138, 138, 0.1);
        }

        .quiz-option.correct {
            border-color: var(--correct-color);
            background-color: rgba(76, 175, 80, 0.1);
        }

        .quiz-option.incorrect {
            border-color: var(--incorrect-color);
            background-color: rgba(244, 67, 54, 0.1);
        }

        .quiz-option input {
            margin-right: 1rem;
        }

        .quiz-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: var(--transition);
            display: block;
            margin: 0 auto;
        }

        .quiz-button:hover {
            background-color: var(--dark-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-button:disabled {
            background-color: var(--border-color);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .quiz-setup {
            text-align: center;
        }

        .quiz-setup-options {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }

        .quiz-setup-option {
            padding: 1rem 2rem;
            background-color: var(--background);
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
        }

        .quiz-setup-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quiz-setup-option.selected {
            border-color: var(--primary-color);
            background-color: rgba(44, 138, 138, 0.1);
        }

        .quiz-result {
            text-align: center;
            padding: 2rem;
            display: none;
        }

        .quiz-result-title {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .quiz-result-score {
            font-size: 3rem;
            font-weight: bold;
            margin: 1rem 0;
            color: var(--text-color);
        }

        .quiz-result-message {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--text-light);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            border-radius: 50%;
            animation: fall 5s linear infinite;
            opacity: 0;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .sad-face {
            font-size: 5rem;
            margin: 1rem 0;
            animation: shake 0.5s ease-in-out infinite alternate;
        }

        @keyframes shake {
            0% {
                transform: translateX(-5px);
            }
            100% {
                transform: translateX(5px);
            }
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
           

            .quiz-container {
                padding: 1.5rem;
            }

            .quiz-setup-options {
                flex-direction: column;
                align-items: center;
            }

            .quiz-setup-option {
                width: 100%;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="home">Home</a></li>
            <li><a href="#">Learn</a></li>
            <li><a href="quiz">Quiz</a></li>
            <li><a href="#">About</a></li>
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

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/quiz.js"></script>

</body>
</html>