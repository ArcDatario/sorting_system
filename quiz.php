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

    <script>
     const quizData = [
    {
        question: "Which sorting algorithm works by repeatedly selecting the smallest element from the unsorted portion and moving it to the sorted portion?",
        options: ["Bubble Sort", "Insertion Sort", "Selection Sort", "Quick Sort"],
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
        options: ["Quick Sort", "Heap Sort", "Radix Sort", "Merge Sort"],
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
        options: ["Bubble Sort", "Quick Sort", "Insertion Sort", "Counting Sort"],
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
        options: ["Radix Sort", "Tree Sort", "Bucket Sort", "Counting Sort"],
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
        options: ["Heap Sort", "Bubble Sort", "Merge Sort", "Quick Sort"],
        answer: "Merge Sort",
        interactive: false
    },
    {
        question: "Perform manual Merge Sort by merging these two sorted halves:",
        interactive: true,
        type: "merge-sort",
        data: [[2, 5, 7], [1, 3, 9]],
        answer: [1, 2, 3, 5, 7, 9],
        algorithm: "Merge Sort"
    },
    {
        question: "Which sorting algorithm builds a binary heap and then repeatedly extracts the maximum element from the heap?",
        options: ["Tree Sort", "Heap Sort", "Quick Sort", "Merge Sort"],
        answer: "Heap Sort",
        interactive: false
    },
    {
        question: "Which sorting algorithm builds a binary heap and then repeatedly extracts the maximum element from the heap?",
        options: ["Merge Sort", "Selection Sort", "Heap Sort", "Quick Sort"],
        answer: "Heap Sort",
        interactive: false
    },
    {
        question: "Which sorting algorithm works by distributing elements into buckets and then sorting the buckets individually?",
        options: ["Radix Sort", "Tree Sort", "Bucket Sort", "Counting Sort"],
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
        options: ["Counting Sort", "Quick Sort", "Radix Sort", "Merge Sort"],
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
        options: ["Heap Sort", "Tree Sort", "Quick Sort", "Merge Sort"],
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
        options: ["Bubble Sort", "Counting Sort", "Selection Sort", "Insertion Sort"],
        answer: "Insertion Sort",
        interactive: false
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
let quizInProgress = false;

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

    // Mark quiz as in progress
    quizInProgress = true;

    // Add a warning before the user refreshes or leaves the page
    window.addEventListener('beforeunload', function(event) {
        if (quizInProgress) {
            event.preventDefault();
            event.returnValue = "Are you sure you want to reload the page? This quiz will not be saved.";
        }
    });

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
        currentInteractiveData = question.type === 'merge-sort' ? [...question.data] : [...question.data];
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
        case 'merge-sort':
            renderMergeSort(container, question);
            break;
    }
    
    interactiveContainer.appendChild(container);
}

// Render manual merge sort interactive
function renderMergeSort(container, question) {
    const mergeContainer = document.createElement('div');
    mergeContainer.className = 'merge-sort-container';
    
    // Create left and right arrays
    const leftArray = document.createElement('div');
    leftArray.className = 'merge-array left-array';
    leftArray.innerHTML = '<h3>Left Array</h3>';
    
    const rightArray = document.createElement('div');
    rightArray.className = 'merge-array right-array';
    rightArray.innerHTML = '<h3>Right Array</h3>';
    
    // Create merged array
    const mergedArray = document.createElement('div');
    mergedArray.className = 'merge-array merged-array';
    mergedArray.innerHTML = '<h3>Merged Array</h3>';
    
    // Create buttons for selecting elements
    const leftElements = document.createElement('div');
    leftElements.className = 'merge-elements';
    question.data[0].forEach((num, index) => {
        const element = document.createElement('div');
        element.className = 'merge-element';
        element.textContent = num;
        element.dataset.value = num;
        element.dataset.array = 'left';
        element.addEventListener('click', () => selectMergeElement(element));
        leftElements.appendChild(element);
    });
    
    const rightElements = document.createElement('div');
    rightElements.className = 'merge-elements';
    question.data[1].forEach((num, index) => {
        const element = document.createElement('div');
        element.className = 'merge-element';
        element.textContent = num;
        element.dataset.value = num;
        element.dataset.array = 'right';
        element.addEventListener('click', () => selectMergeElement(element));
        rightElements.appendChild(element);
    });
    
    // Add elements to arrays
    leftArray.appendChild(leftElements);
    rightArray.appendChild(rightElements);
    
    // Create arrays container
    const arraysContainer = document.createElement('div');
    arraysContainer.className = 'merge-arrays-container';
    arraysContainer.appendChild(leftArray);
    arraysContainer.appendChild(rightArray);
    
    // Add to main container
    mergeContainer.appendChild(arraysContainer);
    mergeContainer.appendChild(mergedArray);
    
    // Add instructions
    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    instructions.textContent = "Click elements from left or right array in order to merge them (smallest first)";
    
    // Add submit button
    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => checkInteractiveAnswer(question));
    
    // Add feedback element
    const feedback = document.createElement('div');
    feedback.id = 'sortFeedback';
    
    // Add all to container
    container.appendChild(instructions);
    container.appendChild(mergeContainer);
    container.appendChild(submitBtn);
    container.appendChild(feedback);
}

// Handle selection of merge sort elements
function selectMergeElement(element) {
    if (element.classList.contains('used')) return;
    
    const mergedArray = document.querySelector('.merged-array');
    const newElement = document.createElement('div');
    newElement.className = 'merge-element';
    newElement.textContent = element.textContent;
    newElement.dataset.value = element.dataset.value;
    mergedArray.appendChild(newElement);
    
    element.classList.add('used');
    
    // Check if all elements are used
    const allUsed = document.querySelectorAll('.merge-element:not(.used)').length === 0;
    if (allUsed) {
        checkIfSorted(selectedQuestions[currentQuestionIndex]);
    }
}

// Render bar sorting interactive

function renderBarSorting(container, question) {
    const sortingContainer = document.createElement('div');
    sortingContainer.className = 'sorting-container';

    const maxValue = Math.max(...question.data);
    const heightFactor = 150 / maxValue;

    // Local order for the current arrangement (with unique IDs for duplicates)
    let localOrder = currentInteractiveData.map((value, index) => ({
        value,
        uid: `${value}-${index}`
    }));

    // Helper to create a bar element
    function createBar(item) {
        const bar = document.createElement('div');
        bar.className = 'bar';
        bar.style.height = `${item.value * heightFactor}px`;
        bar.dataset.value = item.value;
        bar.dataset.uid = item.uid;

        const valueLabel = document.createElement('div');
        valueLabel.className = 'bar-value';
        valueLabel.textContent = item.value;

        bar.appendChild(valueLabel);
        return bar;
    }

    // Create bar elements
    let barElements = localOrder.map(createBar);

    // State
    let draggingIndex = null;
    let placeholderIndex = null;
    let isDragging = false;
    let dragOffsetX = 0;
    let dragStartX = 0;
    let dragElem = null;

    // Helper to render bars with placeholder
    function renderBars() {
        sortingContainer.innerHTML = '';
        localOrder.forEach((item, idx) => {
            if (placeholderIndex === idx) {
                const placeholder = document.createElement('div');
                placeholder.className = 'bar placeholder';
                placeholder.style.height = `${30}px`;
                placeholder.style.background = '#b3e5fc';
                placeholder.style.border = '2px dashed #2196F3';
                placeholder.style.opacity = '0.7';
                sortingContainer.appendChild(placeholder);
            }
            const bar = createBar(item);
            bar.style.transition = isDragging ? 'none' : 'transform 0.35s cubic-bezier(.22, .61, .36, 1), background-color 0.3s, height 0.3s';
            bar.addEventListener('pointerdown', (e) => {
                if (isDragging) return;
                isDragging = true;
                draggingIndex = idx;
                placeholderIndex = idx;
                dragElem = bar;
                dragStartX = e.clientX;
                dragOffsetX = e.clientX - bar.getBoundingClientRect().left;
                bar.classList.add('dragging');
                renderBars();
                document.addEventListener('pointermove', onPointerMove);
                document.addEventListener('pointerup', onPointerUp);
            });
            if (isDragging && idx === draggingIndex) {
                bar.classList.add('dragging');
                bar.style.zIndex = 10;
                bar.style.position = 'absolute';
                bar.style.pointerEvents = 'none';
                bar.style.left = `${dragStartX - dragOffsetX}px`;
                bar.style.top = `${sortingContainer.getBoundingClientRect().top}px`;
                bar.style.width = `${bar.offsetWidth}px`;
            }
            sortingContainer.appendChild(bar);
        });
        // If dragging to the end, show placeholder at the end
        if (placeholderIndex === localOrder.length) {
            const placeholder = document.createElement('div');
            placeholder.className = 'bar placeholder';
            placeholder.style.height = `${30}px`;
            placeholder.style.background = '#b3e5fc';
            placeholder.style.border = '2px dashed #2196F3';
            placeholder.style.opacity = '0.7';
            sortingContainer.appendChild(placeholder);
        }
        // Set container to relative for absolute dragging
        sortingContainer.style.position = isDragging ? 'relative' : '';
    }

    function onPointerMove(e) {
        if (!isDragging) return;
        // Move the dragged bar visually
        const bars = Array.from(sortingContainer.querySelectorAll('.bar:not(.placeholder)'));
        const containerRect = sortingContainer.getBoundingClientRect();
        const mouseX = e.clientX - containerRect.left;
        // Find the index where to insert the placeholder
        let newIndex = localOrder.length;
        let found = false;
        let accWidth = 0;
        for (let i = 0; i < bars.length; i++) {
            if (i === draggingIndex) continue;
            const barRect = bars[i].getBoundingClientRect();
            const barCenter = barRect.left + barRect.width / 2 - containerRect.left;
            if (mouseX < barCenter) {
                newIndex = i;
                found = true;
                break;
            }
        }
        // If dragging right and passing over own placeholder, adjust index
        if (newIndex > draggingIndex) newIndex--;
        if (newIndex !== placeholderIndex) {
            placeholderIndex = newIndex;
            renderBars();
        }
        // Move the dragged bar
        const draggingBar = sortingContainer.querySelector('.bar.dragging');
        if (draggingBar) {
            draggingBar.style.left = `${e.clientX - dragOffsetX - containerRect.left}px`;
        }
    }

    function onPointerUp(e) {
        if (!isDragging) return;
        // Move the dragged item in localOrder
        const [moved] = localOrder.splice(draggingIndex, 1);
        localOrder.splice(placeholderIndex, 0, moved);
        currentInteractiveData = localOrder.map(item => item.value);
        // Reset state
        isDragging = false;
        draggingIndex = null;
        placeholderIndex = null;
        dragElem = null;
        renderBars();
        document.removeEventListener('pointermove', onPointerMove);
        document.removeEventListener('pointerup', onPointerUp);
    }

    renderBars();

    // Add instructions, submit, feedback
    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    instructions.textContent = `Drag and drop bars to sort them (simulating ${question.algorithm})`;

    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => {
        currentInteractiveData = localOrder.map(item => item.value);
        checkInteractiveAnswer(question);
    });

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

// Check if the array is sorted (for interactive questions)
function checkIfSorted(question) {
    let isCorrect = false;
    
    if (question.type === 'merge-sort') {
        const mergedElements = document.querySelectorAll('.merged-array .merge-element');
        const mergedValues = Array.from(mergedElements).map(el => parseInt(el.dataset.value));
        isCorrect = JSON.stringify(mergedValues) === JSON.stringify(question.answer);
    } else {
        const bars = document.querySelectorAll('.bar');
        const sortedData = Array.from(bars).map(bar => parseInt(bar.dataset.value));
        isCorrect = JSON.stringify(sortedData) === JSON.stringify(question.answer);
    }

    const feedback = document.getElementById('sortFeedback');
    if (isCorrect) {
        isSortingComplete = true;
        nextQuestionBtn.disabled = false;

        feedback.className = 'sort-feedback correct-feedback';
        feedback.textContent = 'Correct! The items are properly sorted.';
        feedback.style.display = 'block';
    } else {
        feedback.className = 'sort-feedback incorrect-feedback';
        feedback.textContent = 'Not quite right. Keep trying!';
        feedback.style.display = 'block';
    }
}


function renderBoxSorting(container, question) {
    const boxContainer = document.createElement('div');
    boxContainer.className = 'box-container';

    // Local order for the current arrangement (with unique IDs for duplicates)
    let localOrder = currentInteractiveData.map((value, index) => ({
        value,
        uid: `${value}-${index}`
    }));

    // Helper to create a box element
    function createBox(item) {
        const box = document.createElement('div');
        box.className = 'sortable-box';
        box.textContent = item.value;
        box.dataset.value = item.value;
        box.dataset.uid = item.uid;
        box.draggable = true;
        return box;
    }

    // Create box elements
    let boxElements = localOrder.map(createBox);

    // Create placeholder
    const placeholder = document.createElement('div');
    placeholder.className = 'sortable-box placeholder';
    placeholder.innerHTML = '&nbsp;';

    // State
    let draggingElem = null;
    let draggingUid = null;

    // Drag events
    boxElements.forEach((box) => {
        box.addEventListener('dragstart', (e) => {
            draggingElem = box;
            draggingUid = box.dataset.uid;
            box.classList.add('dragging');
            // Insert placeholder after the dragged box
            boxContainer.insertBefore(placeholder, box.nextSibling);
            setTimeout(() => {
                box.style.display = 'none';
            }, 0);
        });

        box.addEventListener('dragend', () => {
            box.classList.remove('dragging');
            box.style.display = '';
            if (placeholder.parentNode) placeholder.parentNode.removeChild(placeholder);
            draggingElem = null;
            draggingUid = null;
        });
    });

    // Dragover logic
    boxContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        if (!draggingElem) return;

        // Find the box we're hovering over
        const boxes = Array.from(boxContainer.querySelectorAll('.sortable-box:not(.dragging):not(.placeholder)'));
        let insertBefore = null;
        for (let box of boxes) {
            const rect = box.getBoundingClientRect();
            if (e.clientX < rect.left + rect.width / 2) {
                insertBefore = box;
                break;
            }
        }
        // Only move placeholder if its position would change
        if (insertBefore !== placeholder) {
            boxContainer.insertBefore(placeholder, insertBefore);
        }
    });

    // Drop logic
    boxContainer.addEventListener('drop', (e) => {
        e.preventDefault();
        if (!draggingElem) return;

        // Find new index for placeholder
        const newIndex = Array.from(boxContainer.children).indexOf(placeholder);

        // Remove placeholder and show dragged box
        if (placeholder.parentNode) placeholder.parentNode.removeChild(placeholder);
        draggingElem.classList.remove('dragging');
        draggingElem.style.display = '';

        // Move the dragged box to the new position in the DOM
        boxContainer.insertBefore(draggingElem, boxContainer.children[newIndex]);

        // Update localOrder based on new DOM order using data-uid
        const newOrder = Array.from(boxContainer.querySelectorAll('.sortable-box')).map(box => ({
            value: parseInt(box.dataset.value),
            uid: box.dataset.uid
        }));
        localOrder = [...newOrder];
        currentInteractiveData = localOrder.map(item => item.value);

        draggingElem = null;
        draggingUid = null;
    });

    // Initial render
    boxElements.forEach(box => boxContainer.appendChild(box));

    // Add instructions, submit, feedback
    const instructions = document.createElement('p');
    instructions.className = 'interactive-instructions';
    instructions.textContent = `Drag and drop boxes to sort them (simulating ${question.algorithm})`;

    const submitBtn = document.createElement('button');
    submitBtn.className = 'submit-sort-btn';
    submitBtn.textContent = 'Submit Answer';
    submitBtn.addEventListener('click', () => {
        currentInteractiveData = localOrder.map(item => item.value);
        checkInteractiveAnswer(question);
    });

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

// Check interactive answer
function checkInteractiveAnswer(question) {
    // Get the current order of elements
    let currentOrder;
    if (question.type.includes('bars')) {
        const bars = document.querySelectorAll('.bar');
        currentOrder = Array.from(bars).map(bar => parseInt(bar.dataset.value));
    } else if (question.type.includes('boxes')) {
        const boxes = document.querySelectorAll('.sortable-box');
        currentOrder = Array.from(boxes).map(box => parseInt(box.dataset.value));
    } else if (question.type.includes('numbers')) {
        currentOrder = [...currentInteractiveData];
    } else if (question.type === 'merge-sort') {
        const mergedElements = document.querySelectorAll('.merged-array .merge-element');
        currentOrder = Array.from(mergedElements).map(el => parseInt(el.dataset.value));
    }

    const isCorrect = JSON.stringify(currentOrder) === JSON.stringify(question.answer);
    
    const feedback = document.getElementById('sortFeedback');
    if (isCorrect) {
        feedback.className = 'sort-feedback correct-feedback';
        feedback.textContent = 'Correct! The items are properly sorted.';
        score++;
        
        // Highlight correct answer in green
        if (question.type.includes('bars')) {
            const bars = document.querySelectorAll('.bar');
            bars.forEach(bar => {
                bar.style.backgroundColor = '#4CAF50';
            });
        } else if (question.type.includes('boxes')) {
            const boxes = document.querySelectorAll('.sortable-box');
            boxes.forEach(box => {
                box.style.backgroundColor = '#4CAF50';
            });
        } else if (question.type === 'merge-sort') {
            const elements = document.querySelectorAll('.merge-element');
            elements.forEach(el => {
                el.style.backgroundColor = '#4CAF50';
            });
        }
    } else {
        feedback.className = 'sort-feedback incorrect-feedback';
        feedback.textContent = `Incorrect. The correct order should be: ${question.answer.join(', ')}`;
        
        // Highlight correct answer
        if (question.type.includes('bars')) {
            const bars = document.querySelectorAll('.bar');
            bars.forEach((bar, index) => {
                const value = parseInt(bar.dataset.value);
                if (value !== question.answer[index]) {
                    bar.style.backgroundColor = '#f44336';
                } else {
                    bar.style.backgroundColor = '#4CAF50';
                }
            });
        } else if (question.type.includes('boxes')) {
            const boxes = document.querySelectorAll('.sortable-box');
            boxes.forEach((box, index) => {
                const value = parseInt(box.dataset.value);
                if (value !== question.answer[index]) {
                    box.style.backgroundColor = '#f44336';
                } else {
                    box.style.backgroundColor = '#4CAF50';
                }
            });
        } else if (question.type === 'merge-sort') {
            const mergedElements = document.querySelectorAll('.merged-array .merge-element');
            mergedElements.forEach((el, index) => {
                if (index >= question.answer.length || parseInt(el.dataset.value) !== question.answer[index]) {
                    el.style.backgroundColor = '#f44336';
                } else {
                    el.style.backgroundColor = '#4CAF50';
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