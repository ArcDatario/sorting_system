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