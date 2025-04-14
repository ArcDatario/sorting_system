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

    <script>
       // Quiz Data
 const quizData = [
    {
        question: "Which sorting algorithm works by repeatedly selecting the smallest element from the unsorted portion and moving it to the sorted portion?",
        options: ["Insertion Sort", "Selection Sort", "Bubble Sort", "Quick Sort"],
        answer: "Selection Sort"
    },
    {
        question: "Which sorting algorithm has an average time complexity of O(n log n) and works by dividing the array into two halves, sorting them recursively, and then merging them?",
        options: ["Heap Sort", "Merge Sort", "Quick Sort", "Radix Sort"],
        answer: "Merge Sort"
    },
    {
        question: "Which sorting algorithm is known for its partitioning process and average-case time complexity of O(n log n)?",
        options: ["Quick Sort", "Bubble Sort", "Insertion Sort", "Counting Sort"],
        answer: "Quick Sort"
    },
    {
        question: "Which sorting algorithm is not comparison-based and works by counting the number of objects that have distinct key values?",
        options: ["Radix Sort", "Counting Sort", "Bucket Sort", "Tree Sort"],
        answer: "Counting Sort"
    },
    {
        question: "Which sorting algorithm is particularly efficient for sorting linked lists?",
        options: ["Merge Sort", "Heap Sort", "Quick Sort", "Bubble Sort"],
        answer: "Merge Sort"
    },
    {
        question: "Which sorting algorithm builds a binary heap and then repeatedly extracts the maximum element from the heap?",
        options: ["Heap Sort", "Tree Sort", "Quick Sort", "Merge Sort"],
        answer: "Heap Sort"
    },
    {
        question: "Which sorting algorithm works by distributing elements into buckets and then sorting the buckets individually?",
        options: ["Bucket Sort", "Radix Sort", "Counting Sort", "Tree Sort"],
        answer: "Bucket Sort"
    },
    {
        question: "Which sorting algorithm is particularly efficient for sorting numbers with a fixed number of digits?",
        options: ["Radix Sort", "Counting Sort", "Quick Sort", "Merge Sort"],
        answer: "Radix Sort"
    },
    {
        question: "Which sorting algorithm works by building a binary search tree from the elements and then performing an in-order traversal?",
        options: ["Tree Sort", "Heap Sort", "Quick Sort", "Merge Sort"],
        answer: "Tree Sort"
    },
    {
        question: "Which sorting algorithm is often used as the base case for smaller subarrays in more complex algorithms like Quick Sort?",
        options: ["Insertion Sort", "Bubble Sort", "Selection Sort", "Counting Sort"],
        answer: "Insertion Sort"
    },
    {
        question: "Which sorting algorithm has a worst-case time complexity of O(n²) but can be optimized to stop early if the list is already sorted?",
        options: ["Bubble Sort", "Selection Sort", "Insertion Sort", "Quick Sort"],
        answer: "Bubble Sort"
    },
    {
        question: "Which sorting algorithm is an in-place sorting algorithm but not stable?",
        options: ["Heap Sort", "Merge Sort", "Bubble Sort", "Insertion Sort"],
        answer: "Heap Sort"
    },
    {
        question: "Which sorting algorithm is often used when the range of input data is not significantly greater than the number of items to be sorted?",
        options: ["Counting Sort", "Radix Sort", "Bucket Sort", "Tree Sort"],
        answer: "Counting Sort"
    },
    {
        question: "Which sorting algorithm is not suitable for large datasets due to its O(n²) time complexity but is efficient for nearly sorted data?",
        options: ["Insertion Sort", "Selection Sort", "Bubble Sort", "Quick Sort"],
        answer: "Insertion Sort"
    },
    {
        question: "Which sorting algorithm is based on the 'divide and conquer' approach but has a worst-case time complexity of O(n²)?",
        options: ["Quick Sort", "Merge Sort", "Heap Sort", "Radix Sort"],
        answer: "Quick Sort"
    },
    {
        question: "Which sorting algorithm would be most efficient for sorting a deck of cards in your hand?",
        options: ["Insertion Sort", "Merge Sort", "Quick Sort", "Heap Sort"],
        answer: "Insertion Sort"
    },
    {
        question: "Which sorting algorithm is not an in-place sorting algorithm?",
        options: ["Merge Sort", "Quick Sort", "Heap Sort", "Insertion Sort"],
        answer: "Merge Sort"
    },
    {
        question: "Which sorting algorithm is commonly used as the default sorting algorithm in many programming languages' standard libraries?",
        options: ["Quick Sort", "Merge Sort", "Heap Sort", "Tim Sort"],
        answer: "Tim Sort"
    },
    {
        question: "Which sorting algorithm is a hybrid sorting algorithm derived from Merge Sort and Insertion Sort?",
        options: ["Tim Sort", "Intro Sort", "Shell Sort", "Comb Sort"],
        answer: "Tim Sort"
    },
    {
        question: "Which sorting algorithm is particularly efficient when the input is uniformly distributed over a range?",
        options: ["Bucket Sort", "Radix Sort", "Counting Sort", "Tree Sort"],
        answer: "Bucket Sort"
    }
];

// DOM Elements
const quizSetup = document.getElementById('quizSetup');
const quizGame = document.getElementById('quizGame');
const quizResult = document.getElementById('quizResult');
const quizQuestion = document.getElementById('quizQuestion');
const quizOptions = document.getElementById('quizOptions');
const quizProgressBar = document.getElementById('quizProgressBar');
const nextQuestionBtn = document.getElementById('nextQuestionBtn');
const startQuizBtn = document.getElementById('startQuizBtn');
const restartQuizBtn = document.getElementById('restartQuizBtn');
const quizScore = document.getElementById('quizScore');
const resultTitle = document.getElementById('resultTitle');
const resultMessage = document.getElementById('resultMessage');
const resultEmoji = document.getElementById('resultEmoji');
const quizContainer = document.getElementById('quizContainer');
const darkModeToggle = document.getElementById('darkModeToggle');
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navLinks = document.getElementById('navLinks');

// Quiz Variables
let currentQuestionIndex = 0;
let score = 0;
let selectedQuestions = [];
let totalQuestions = 0;
let selectedOption = null;

// Event Listeners
startQuizBtn.addEventListener('click', startQuiz);
nextQuestionBtn.addEventListener('click', nextQuestion);
restartQuizBtn.addEventListener('click', restartQuiz);
darkModeToggle.addEventListener('click', toggleDarkMode);
mobileMenuBtn.addEventListener('click', toggleMobileMenu);

// Setup quiz options
document.querySelectorAll('.quiz-setup-option').forEach(option => {
    option.addEventListener('click', () => {
        document.querySelectorAll('.quiz-setup-option').forEach(opt => {
            opt.classList.remove('selected');
        });
        option.classList.add('selected');
        totalQuestions = parseInt(option.dataset.questions);
    });
});

// Initialize dark mode
function initDarkMode() {
    const darkModeEnabled = localStorage.getItem('darkMode') === 'true';
    if (darkModeEnabled) {
        document.body.classList.add('dark-mode');
    }
}

// Toggle dark mode
function toggleDarkMode() {
    const isDark = document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', isDark);
}

// Toggle mobile menu
function toggleMobileMenu() {
    navLinks.classList.toggle('active');
}

// Start the quiz
function startQuiz() {
    if (totalQuestions === 0) {
        alert('Please select the number of questions first!');
        return;
    }

    // Select random questions
    selectedQuestions = [...quizData].sort(() => 0.5 - Math.random()).slice(0, totalQuestions);
    
    quizSetup.style.display = 'none';
    quizGame.style.display = 'block';
    quizResult.style.display = 'none';
    
    currentQuestionIndex = 0;
    score = 0;
    
    showQuestion();
}

// Show current question
function showQuestion() {
    const question = selectedQuestions[currentQuestionIndex];
    quizQuestion.textContent = question.question;
    quizOptions.innerHTML = '';
    
    question.options.forEach(option => {
        const optionElement = document.createElement('div');
        optionElement.classList.add('quiz-option');
        optionElement.textContent = option;
        optionElement.addEventListener('click', () => selectOption(option, optionElement));
        quizOptions.appendChild(optionElement);
    });
    
    // Update progress
    const progress = ((currentQuestionIndex) / selectedQuestions.length) * 100;
    quizProgressBar.style.width = `${progress}%`;
    
    nextQuestionBtn.disabled = true;
}

// Select an option
function selectOption(selectedAnswer, optionElement) {
    if (selectedOption) return;
    
    selectedOption = selectedAnswer;
    
    // Highlight selected option
    optionElement.classList.add('selected');
    
    // Check if answer is correct
    const question = selectedQuestions[currentQuestionIndex];
    const isCorrect = selectedAnswer === question.answer;
    
    if (isCorrect) {
        optionElement.classList.add('correct');
        score++;
    } else {
        optionElement.classList.add('incorrect');
        // Highlight correct answer
        document.querySelectorAll('.quiz-option').forEach(opt => {
            if (opt.textContent === question.answer) {
                opt.classList.add('correct');
            }
        });
    }
    
    nextQuestionBtn.disabled = false;
}

// Move to next question
function nextQuestion() {
    currentQuestionIndex++;
    selectedOption = null;
    
    if (currentQuestionIndex < selectedQuestions.length) {
        showQuestion();
    } else {
        showResult();
    }
}

// Show quiz result
function showResult() {
    quizGame.style.display = 'none';
    quizResult.style.display = 'block';
    
    const percentage = Math.round((score / selectedQuestions.length) * 100);
    quizScore.textContent = `${score}/${selectedQuestions.length} (${percentage}%)`;
    
    if (percentage >= 80) {
        resultTitle.textContent = "Excellent Work!";
        resultMessage.textContent = "You have a strong understanding of sorting algorithms!";
        resultEmoji.innerHTML = "🎉";
        createConfetti();
    } else if (percentage >= 60) {
        resultTitle.textContent = "Good Job!";
        resultMessage.textContent = "You know quite a bit about sorting algorithms!";
        resultEmoji.innerHTML = "👍";
    } else {
        resultTitle.textContent = "Keep Learning!";
        resultMessage.textContent = "Review the sorting algorithms and try again!";
        resultEmoji.innerHTML = '<div class="sad-face">😢</div>';
    }
    
    // Add fade-in animation
    quizResult.classList.add('fade-in');
}

// Create confetti effect
function createConfetti() {
    const colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFEB3B', '#FFC107', '#FF9800', '#FF5722'];
    
    for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.classList.add('confetti');
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.left = `${Math.random() * 100}%`;
        confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
        confetti.style.animationDelay = `${Math.random() * 2}s`;
        quizContainer.appendChild(confetti);
    }
}

// Restart quiz
function restartQuiz() {
    // Remove confetti
    document.querySelectorAll('.confetti').forEach(el => el.remove());
    
    quizSetup.style.display = 'block';
    quizGame.style.display = 'none';
    quizResult.style.display = 'none';
    
    // Reset selected questions
    document.querySelectorAll('.quiz-setup-option').forEach(opt => {
        opt.classList.remove('selected');
    });
    totalQuestions = 0;
}

// Initialize
initDarkMode();
    </script>

</body>
</html>