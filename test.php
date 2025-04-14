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
        /* Additional styles for interactive elements */
        .sorting-container {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            height: 200px;
            margin: 20px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 8px;
        }
        
        .bar {
            width: 30px;
            margin: 0 2px;
            background-color: #4CAF50;
            transition: height 0.3s, background-color 0.3s;
            position: relative;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        
        .bar-value {
            position: absolute;
            bottom: -25px;
            font-size: 12px;
            color: #333;
        }
        
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 8px;
            min-height: 100px;
        }
        
        .sortable-box {
            width: 50px;
            height: 50px;
            background-color: #2196F3;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 4px;
            cursor: grab;
            user-select: none;
            transition: transform 0.2s;
        }
        
        .sortable-box.dragging {
            opacity: 0.8;
            transform: scale(1.05);
            cursor: grabbing;
        }
        
        .number-container {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 8px;
            min-height: 60px;
        }
        
        .sortable-number {
            padding: 8px 15px;
            background-color: #FF9800;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            user-select: none;
            transition: transform 0.2s;
        }
        
        .sortable-number.selected {
            background-color: #F44336;
            transform: scale(1.1);
        }
        
        .interactive-instructions {
            margin: 10px 0;
            font-style: italic;
            color: #666;
        }
        
        .submit-sort-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        .submit-sort-btn:hover {
            background-color: #45a049;
        }
        
        .sort-feedback {
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
            display: none;
        }
        
        .correct-feedback {
            background-color: #dff0d8;
            color: #3c763d;
        }
        
        .incorrect-feedback {
            background-color: #f2dede;
            color: #a94442;
        }
        
        /* Dark mode adjustments */
        .dark-mode .sorting-container,
        .dark-mode .box-container,
        .dark-mode .number-container {
            background-color: #333;
        }
        
        .dark-mode .bar-value {
            color: #eee;
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

    <script>
        // Quiz Data
        const quizData = [
            {
                question: "Which sorting algorithm works by repeatedly selecting the smallest element from the unsorted portion and moving it to the sorted portion?",
                options: ["Insertion Sort", "Selection Sort", "Bubble Sort", "Quick Sort"],
                answer: "Selection Sort",
                interactive: false
            },
            {
                question: "Arrange these bars in ascending order using the Selection Sort method:",
                interactive: true,
                type: "bars",
                data: [5, 2, 9, 3, 7],
                answer: [2, 3, 5, 7, 9],
                algorithm: "Selection Sort"
            },
            {
                question: "Which sorting algorithm has an average time complexity of O(n log n) and works by dividing the array into two halves, sorting them recursively, and then merging them?",
                options: ["Heap Sort", "Merge Sort", "Quick Sort", "Radix Sort"],
                answer: "Merge Sort",
                interactive: false
            },
            {
                question: "Sort these numbers using Merge Sort (drag to arrange):",
                interactive: true,
                type: "boxes",
                data: [8, 3, 5, 1, 9],
                answer: [1, 3, 5, 8, 9],
                algorithm: "Merge Sort"
            },
            {
                question: "Which sorting algorithm is known for its partitioning process and average-case time complexity of O(n log n)?",
                options: ["Quick Sort", "Bubble Sort", "Insertion Sort", "Counting Sort"],
                answer: "Quick Sort",
                interactive: false
            },
            {
                question: "Arrange these numbers in order as Quick Sort would (select pivot and partition):",
                interactive: true,
                type: "numbers",
                data: [6, 2, 8, 4, 5],
                answer: [2, 4, 5, 6, 8],
                algorithm: "Quick Sort"
            },
            {
                question: "Which sorting algorithm is not comparison-based and works by counting the number of objects that have distinct key values?",
                options: ["Radix Sort", "Counting Sort", "Bucket Sort", "Tree Sort"],
                answer: "Counting Sort",
                interactive: false
            },
            {
                question: "Sort these bars using Bubble Sort (click adjacent bars to swap):",
                interactive: true,
                type: "bubble-bars",
                data: [4, 1, 6, 3, 8],
                answer: [1, 3, 4, 6, 8],
                algorithm: "Bubble Sort"
            },
            {
                question: "Which sorting algorithm is particularly efficient for sorting linked lists?",
                options: ["Merge Sort", "Heap Sort", "Quick Sort", "Bubble Sort"],
                answer: "Merge Sort",
                interactive: false
            },
            {
                question: "Arrange these boxes in ascending order using Insertion Sort:",
                interactive: true,
                type: "insertion-boxes",
                data: [7, 2, 5, 9, 3],
                answer: [2, 3, 5, 7, 9],
                algorithm: "Insertion Sort"
            },
            {
                question: "Which sorting algorithm builds a binary heap and then repeatedly extracts the maximum element from the heap?",
                options: ["Heap Sort", "Tree Sort", "Quick Sort", "Merge Sort"],
                answer: "Heap Sort",
                interactive: false
            },
            {
                question: "Sort these numbers using Heap Sort (click to build max heap):",
                interactive: true,
                type: "heap-numbers",
                data: [4, 10, 3, 5, 1],
                answer: [1, 3, 4, 5, 10],
                algorithm: "Heap Sort"
            },
            {
                question: "Which sorting algorithm works by distributing elements into buckets and then sorting the buckets individually?",
                options: ["Bucket Sort", "Radix Sort", "Counting Sort", "Tree Sort"],
                answer: "Bucket Sort",
                interactive: false
            },
            {
                question: "Arrange these bars in ascending order (simulating Bucket Sort):",
                interactive: true,
                type: "bucket-bars",
                data: [12, 6, 18, 3, 9],
                answer: [3, 6, 9, 12, 18],
                algorithm: "Bucket Sort"
            },
            {
                question: "Which sorting algorithm is particularly efficient for sorting numbers with a fixed number of digits?",
                options: ["Radix Sort", "Counting Sort", "Quick Sort", "Merge Sort"],
                answer: "Radix Sort",
                interactive: false
            },
            {
                question: "Sort these numbers using Radix Sort (sort by digits from right to left):",
                interactive: true,
                type: "radix-numbers",
                data: [170, 45, 75, 90, 802, 24, 2, 66],
                answer: [2, 24, 45, 66, 75, 90, 170, 802],
                algorithm: "Radix Sort"
            },
            {
                question: "Which sorting algorithm works by building a binary search tree from the elements and then performing an in-order traversal?",
                options: ["Tree Sort", "Heap Sort", "Quick Sort", "Merge Sort"],
                answer: "Tree Sort",
                interactive: false
            },
            {
                question: "Arrange these boxes to simulate building a binary search tree:",
                interactive: true,
                type: "tree-boxes",
                data: [6, 2, 8, 1, 4, 7, 9],
                answer: [1, 2, 4, 6, 7, 8, 9],
                algorithm: "Tree Sort"
            },
            {
                question: "Which sorting algorithm is often used as the base case for smaller subarrays in more complex algorithms like Quick Sort?",
                options: ["Insertion Sort", "Bubble Sort", "Selection Sort", "Counting Sort"],
                answer: "Insertion Sort",
                interactive: false
            },
            {
                question: "Sort these bars using Insertion Sort (click to insert in correct position):",
                interactive: true,
                type: "insertion-bars",
                data: [5, 2, 9, 1, 6],
                answer: [1, 2, 5, 6, 9],
                algorithm: "Insertion Sort"
            }
        ];

        // DOM Elements
      const quizSetup = document.getElementById('quizSetup');
const quizGame = document.getElementById('quizGame');
const quizResult = document.getElementById('quizResult');
const quizQuestion = document.getElementById('quizQuestion');
const interactiveContainer = document.getElementById('interactiveContainer');
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
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navLinks = document.getElementById('navLinks');

// Quiz Variables
let currentQuestionIndex = 0;
let score = 0;
let selectedQuestions = [];
let totalQuestions = 0;
let selectedOption = null;
let currentInteractiveData = [];
let isSortingComplete = false;

// Event Listeners
startQuizBtn.addEventListener('click', startQuiz);
nextQuestionBtn.addEventListener('click', nextQuestion);
restartQuizBtn.addEventListener('click', restartQuiz);
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
    interactiveContainer.innerHTML = '';
    isSortingComplete = false;
    
    if (question.interactive) {
        currentInteractiveData = [...question.data];
        renderInteractiveElement(question);
    } else {
        question.options.forEach(option => {
            const optionElement = document.createElement('div');
            optionElement.classList.add('quiz-option');
            optionElement.textContent = option;
            optionElement.addEventListener('click', () => selectOption(option, optionElement));
            quizOptions.appendChild(optionElement);
        });
    }
    
    // Update progress
    const progress = ((currentQuestionIndex) / selectedQuestions.length) * 100;
    quizProgressBar.style.width = `${progress}%`;
    
    nextQuestionBtn.disabled = true;
}

// Render interactive sorting element based on question type
function renderInteractiveElement(question) {
    const container = document.createElement('div');
    
    switch(question.type) {
        case 'bars':
        case 'bubble-bars':
        case 'insertion-bars':
        case 'bucket-bars':
            renderBarSorting(container, question);
            break;
        case 'boxes':
        case 'insertion-boxes':
        case 'tree-boxes':
            renderBoxSorting(container, question);
            break;
        case 'numbers':
        case 'heap-numbers':
        case 'radix-numbers':
            renderNumberSorting(container, question);
            break;
    }
    
    interactiveContainer.appendChild(container);
}

// Render bar sorting interactive
function renderBarSorting(container, question) {
    const sortingContainer = document.createElement('div');
    sortingContainer.className = 'sorting-container';

    const maxValue = Math.max(...question.data);
    const heightFactor = 150 / maxValue;

    currentInteractiveData.forEach((value, index) => {
        const bar = document.createElement('div');
        bar.className = 'bar';
        bar.style.height = `${value * heightFactor}px`;
        bar.dataset.value = value;
        bar.dataset.index = index;
        bar.draggable = true; // Enable dragging

        const valueLabel = document.createElement('div');
        valueLabel.className = 'bar-value';
        valueLabel.textContent = value;

        bar.appendChild(valueLabel);
        sortingContainer.appendChild(bar);

        // Add drag event listeners
        bar.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', index);
            bar.classList.add('dragging');
        });

        bar.addEventListener('dragend', () => {
            bar.classList.remove('dragging');
            updateBarDataArray(sortingContainer, question); // Update data after drag ends
        });
    });

    sortingContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        const draggingBar = document.querySelector('.dragging');
        const afterElement = getDragAfterElement(sortingContainer, e.clientX);

        if (afterElement) {
            sortingContainer.insertBefore(draggingBar, afterElement);
        } else {
            sortingContainer.appendChild(draggingBar);
        }
    });

    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    instructions.textContent = `Drag and drop bars to sort them (simulating ${question.algorithm})`;

    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => checkInteractiveAnswer(question));

    const feedback = document.createElement('div');
    feedback.id = 'sortFeedback';

    container.appendChild(instructions);
    container.appendChild(sortingContainer);
    container.appendChild(submitBtn);
    container.appendChild(feedback);
}

// Helper function to get the element after which the dragged element should be placed
function getDragAfterElement(container, x) {
    const draggableElements = [...container.querySelectorAll('.bar:not(.dragging)')];

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = x - box.left - box.width / 2;

        if (offset < 0 && offset > closest.offset) {
            return { offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

// Helper function to update the data array after bar rearrangement
function updateBarDataArray(sortingContainer, question) {
    const bars = Array.from(sortingContainer.children);
    currentInteractiveData = bars.map(bar => parseInt(bar.dataset.value));
}

// Check interactive answer
function checkInteractiveAnswer(question) {
    const isCorrect = JSON.stringify(currentInteractiveData) === JSON.stringify(question.answer);

    const feedback = document.getElementById('sortFeedback');
    if (isCorrect) {
        feedback.className = 'sort-feedback correct-feedback';
        feedback.textContent = 'Correct! The items are properly sorted.';
        score++;
    } else {
        feedback.className = 'sort-feedback incorrect-feedback';
        feedback.textContent = `Incorrect. The correct order should be: ${question.answer.join(', ')}`;

        // Highlight incorrect bars
        const bars = document.querySelectorAll('.bar');
        bars.forEach((bar, index) => {
            if (parseInt(bar.dataset.value) !== question.answer[index]) {
                bar.style.backgroundColor = '#f44336';
            } else {
                bar.style.backgroundColor = '#4CAF50';
            }
        });
    }

    feedback.style.display = 'block';
    nextQuestionBtn.disabled = false;
    isSortingComplete = true;
}

// Render box sorting interactive
function renderBoxSorting(container, question) {
    const boxContainer = document.createElement('div');
    boxContainer.className = 'box-container';
    
    currentInteractiveData.forEach((value, index) => {
        const box = document.createElement('div');
        box.className = 'sortable-box';
        box.textContent = value;
        box.dataset.value = value;
        box.draggable = true;
        
        box.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', index);
            box.classList.add('dragging');
        });
        
        box.addEventListener('dragend', () => {
            box.classList.remove('dragging');
            // After drag ends, update the data array based on new positions
            updateBoxDataArray(boxContainer, question);
        });
        
        boxContainer.appendChild(box);
    });
    
    boxContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        const draggingBox = document.querySelector('.dragging');
        const afterElement = getDragAfterElement(boxContainer, e.clientX, e.clientY);
        
        if (afterElement) {
            boxContainer.insertBefore(draggingBox, afterElement);
        } else {
            boxContainer.appendChild(draggingBox);
        }
    });
    
    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    instructions.textContent = `Drag and drop boxes to sort them (simulating ${question.algorithm})`;
    
    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => checkInteractiveAnswer(question));
    
    const feedback = document.createElement('div');
    feedback.id = 'sortFeedback';
    
    container.appendChild(instructions);
    container.appendChild(boxContainer);
    container.appendChild(submitBtn);
    container.appendChild(feedback);
}

// Helper function for drag and drop
function getDragAfterElement(container, x, y) {
    const draggableElements = [...container.querySelectorAll('.sortable-box:not(.dragging)')];
    
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offsetX = x - box.left - box.width / 2;
        const offsetY = y - box.top - box.height / 2;
        const distance = Math.sqrt(offsetX * offsetX + offsetY * offsetY);
        
        if (distance < 50) {
            return { element: child, distance: distance };
        } else {
            return closest;
        }
    }, { element: null, distance: Number.POSITIVE_INFINITY }).element;
}

// Helper function to update data array after box rearrangement
function updateBoxDataArray(boxContainer, question) {
    const boxes = Array.from(boxContainer.children);
    const newData = boxes.map(box => parseInt(box.dataset.value));
    currentInteractiveData = newData;
    checkIfSorted(question); // Check if the new arrangement is correct
}

// Render number sorting interactive
function renderNumberSorting(container, question) {
    const numberContainer = document.createElement('div');
    numberContainer.className = 'number-container';
    
    currentInteractiveData.forEach((value, index) => {
        const number = document.createElement('div');
        number.className = 'sortable-number';
        number.textContent = value;
        number.dataset.value = value;
        number.dataset.index = index;
        
        if (question.type === 'heap-numbers') {
            // For heap sort, implement actual heap building logic
            number.addEventListener('click', () => {
                const clickedIndex = parseInt(number.dataset.index);
                // Simple heapify logic - swap with parent if larger
                const parentIndex = Math.floor((clickedIndex - 1) / 2);
                if (parentIndex >= 0 && currentInteractiveData[clickedIndex] > currentInteractiveData[parentIndex]) {
                    // Swap with parent
                    [currentInteractiveData[parentIndex], currentInteractiveData[clickedIndex]] = 
                        [currentInteractiveData[clickedIndex], currentInteractiveData[parentIndex]];
                    renderInteractiveElement(question);
                }
            });
        } else if (question.type === 'radix-numbers') {
            // For radix sort, implement digit-based sorting
            number.addEventListener('click', () => {
                const clickedValue = parseInt(number.dataset.value);
                // Simple radix simulation - move to front if has smaller digits
                const clickedIndex = currentInteractiveData.indexOf(clickedValue);
                if (clickedIndex > 0) {
                    currentInteractiveData.splice(clickedIndex, 1);
                    currentInteractiveData.unshift(clickedValue);
                    renderInteractiveElement(question);
                }
            });
        } else {
            // For quick sort, implement pivot selection and partitioning
            number.addEventListener('click', () => {
                const pivotValue = parseInt(number.dataset.value);
                // Simple partitioning - move smaller to left, larger to right
                const smaller = currentInteractiveData.filter(x => x < pivotValue);
                const larger = currentInteractiveData.filter(x => x > pivotValue);
                currentInteractiveData = [...smaller, pivotValue, ...larger];
                renderInteractiveElement(question);
            });
        }
        
        numberContainer.appendChild(number);
    });
    
    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    
    if (question.type === 'heap-numbers') {
        instructions.textContent = "Click numbers to build a max heap (simulating Heap Sort)";
    } else if (question.type === 'radix-numbers') {
        instructions.textContent = "Click numbers to sort by digits (simulating Radix Sort)";
    } else {
        instructions.textContent = "Click a pivot number to partition (simulating Quick Sort)";
    }
    
    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => checkInteractiveAnswer(question));
    
    const feedback = document.createElement('div');
    feedback.id = 'sortFeedback';
    
    container.appendChild(instructions);
    container.appendChild(numberContainer);
    container.appendChild(submitBtn);
    container.appendChild(feedback);
}

// Check if the array is sorted (for interactive questions)
function checkIfSorted(question) {
    const isCorrect = JSON.stringify(currentInteractiveData) === JSON.stringify(question.answer);
    if (isCorrect) {
        isSortingComplete = true;
        nextQuestionBtn.disabled = false;
        
        const feedback = document.getElementById('sortFeedback');
        feedback.className = 'sort-feedback correct-feedback';
        feedback.textContent = 'Correct! The items are properly sorted.';
        feedback.style.display = 'block';
    } else {
        const feedback = document.getElementById('sortFeedback');
        feedback.className = 'sort-feedback incorrect-feedback';
        feedback.textContent = 'Not quite right. Keep trying!';
        feedback.style.display = 'block';
    }
}

// Check interactive answer
function checkInteractiveAnswer(question) {
    const isCorrect = JSON.stringify(currentInteractiveData) === JSON.stringify(question.answer);
    
    const feedback = document.getElementById('sortFeedback');
    if (isCorrect) {
        feedback.className = 'sort-feedback correct-feedback';
        feedback.textContent = 'Correct! The items are properly sorted.';
        score++;
    } else {
        feedback.className = 'sort-feedback incorrect-feedback';
        feedback.textContent = `Incorrect. The correct order should be: ${question.answer.join(', ')}`;
        
        // Highlight correct answer
        if (question.type.includes('bars')) {
            const bars = document.querySelectorAll('.bar');
            bars.forEach((bar, index) => {
                if (parseInt(bar.dataset.value) !== question.answer[index]) {
                    bar.style.backgroundColor = '#f44336';
                }
            });
        } else if (question.type.includes('boxes')) {
            const boxes = document.querySelectorAll('.sortable-box');
            boxes.forEach((box, index) => {
                if (parseInt(box.dataset.value) !== question.answer[index]) {
                    box.style.backgroundColor = '#f44336';
                }
            });
        }
    }
    
    feedback.style.display = 'block';
    nextQuestionBtn.disabled = false;
    isSortingComplete = true;
}

// Select an option (for non-interactive questions)
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
    isSortingComplete = false;
    
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
    </script>
</body>
</html>