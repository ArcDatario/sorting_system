<div class="algorithm-description">
    <p>Watch Insertion Sort in action with this step-by-step visualization!</p>
</div>

<!-- Visualization -->
<div class="visualization">
    <div class="sorting-container" id="insertion-sort-container">
        <div class="array-section">
            <h3>Array Visualization</h3>
            <div class="array" id="insertion-sort-array"></div>
        </div>
        <div class="key-section">
            <h3>Current Key</h3>
            <div class="key-value" id="insertion-sort-key"></div>
        </div>
    </div>
    
    <p id="insertion-sort-status" style="font-size: 12.5px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ready to sort! Click start to begin</p>
    
    <div class="controls">
        <button class="btn toggle-btn" id="insertion-sort-toggle-btn">🔴 OFF</button>
        <button class="btn" id="insertion-sort-start-btn" disabled>🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="insertion-sort-reset-btn">🔄 New Array</button>
        <button class="btn btn-secondary" id="insertion-sort-prev-btn" disabled>⏮️</button>
        <button class="btn btn-secondary" id="insertion-sort-next-btn" disabled>⏭️</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="insertion-sort-speed-value">Medium</span></label>
                <input type="range" id="insertion-sort-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="insertion-sort-elements-value">5</span></label>
                <input type="range" id="insertion-sort-elements-count" min="5" max="10" value="5">
            </span>
        </div>
    </div>
</div>

<style>
.sorting-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 15px;
    background: #f5f5f5;
    border-radius: 8px;
    margin-bottom: 15px;
}

.array-section, .key-section {
    background: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.array {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
    min-height: 60px;
    align-items: center;
}

.key-value {
    display: flex;
    gap: 10px;
    margin-top: 10px;
    min-height: 60px;
    align-items: center;
}

.array-element {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    background: #3a86ff;
    color: white;
    font-weight: bold;
    transition: all 0.3s ease;
    position: relative;
}

.array-element.active {
    background: #ff006e;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(255, 0, 110, 0.7);
    z-index: 1;
}

.array-element.sorted {
    background: #06d6a0;
}

.array-element.comparing {
    background: #8338ec;
}

.array-element.key {
    background: #ffbe0b;
}

.array-element.index {
    font-size: 0.7em;
    position: absolute;
    top: -15px;
    color: #333;
}

.controls {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 15px;
}

.btn {
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    background: #3a86ff;
    color: white;
    cursor: pointer;
    transition: all 0.2s;
}

.btn:hover {
    background: #2667d5;
}

.btn:disabled {
    background: #cccccc;
    cursor: not-allowed;
}

.btn-secondary {
    background: #6c757d;
}

.btn-secondary:hover {
    background: #5a6268;
}

.toggle-btn.active {
    background: #28a745;
}

.control-group {
    display: flex;
    align-items: center;
    gap: 10px;
}

.speed-control, .elements-control {
    display: flex;
    align-items: center;
    gap: 5px;
}

input[type="range"] {
    width: 100px;
}

@media (max-width: 768px) {
    .controls {
        flex-direction: column;
    }
    
    .array-element {
        width: 30px;
        height: 30px;
        font-size: 0.8em;
    }
}
</style>

<script>
// Insertion Sort Configuration
const INSERTION_SORT_CONFIG = {
    minValue: 1,
    maxValue: 10, // Values will range from 1 to 10
    animationDuration: 0.5
};

// Insertion Sort State management
let insertionSortState = {
    array: [],
    sorting: false,
    speed: 800,
    maxElements: 5, // Default to 5 elements
    currentStep: 0,
    steps: [],
    isPaused: false,
    algorithmState: null,
    completed: false,
    interactiveMode: false,
    manualStepMode: false
};

// Algorithm state structure
function createInsertionSortState() {
    return {
        currentIndex: 1, // Start with second element
        key: null,
        comparingIndex: null,
        sortedUpTo: 0, // First element is considered sorted
        comparisons: 0,
        shifts: 0
    };
}

// Helper functions
function insertionSortDelay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function generateInsertionSortArray(size) {
    if (size <= 0) {
        updateInsertionSortStatus('Array size must be greater than 0.');
        return;
    }
    insertionSortState.completed = false;
    insertionSortState.steps = [];
    insertionSortState.currentStep = 0;
    insertionSortState.algorithmState = null;
    insertionSortState.sorting = false;
    insertionSortState.isPaused = false;
    insertionSortState.manualStepMode = false;

    // Generate array with random values strictly between 1 and 10
    insertionSortState.array = Array.from({ length: size }, () => Math.floor(Math.random() * 10) + 1);

    renderInsertionSortVisualization();
    updateInsertionSortStatus('New array generated! Ready to sort');
}

function resetInsertionSortState() {
    insertionSortState = {
        array: [],
        sorting: false,
        speed: 800,
        maxElements: 5,
        currentStep: 0,
        steps: [],
        isPaused: false,
        algorithmState: null,
        completed: false,
        interactiveMode: false,
        manualStepMode: false
    };
    renderInsertionSortVisualization();
    updateInsertionSortStatus('State reset. Ready to sort.');
}

function renderInsertionSortVisualization(highlight = {}) {
    const arrayContainer = document.getElementById('insertion-sort-array');
    const keyContainer = document.getElementById('insertion-sort-key');
    
    // Render array
    arrayContainer.innerHTML = '';
    insertionSortState.array.forEach((value, index) => {
        const element = document.createElement('div');
        element.className = 'array-element';
        
        // Apply classes based on highlight state
        if (highlight.keyIndex === index) element.classList.add('key');
        if (highlight.comparingIndex === index) element.classList.add('comparing');
        if (index <= (highlight.sortedUpTo !== undefined ? highlight.sortedUpTo : -1)) element.classList.add('sorted');
        
        element.textContent = value;
        
        const indexLabel = document.createElement('div');
        indexLabel.className = 'index';
        indexLabel.textContent = index;
        element.appendChild(indexLabel);
        
        arrayContainer.appendChild(element);
    });
    
    // Render key
    keyContainer.innerHTML = '';
    if (highlight.key !== undefined && highlight.key !== null) {
        const keyElement = document.createElement('div');
        keyElement.className = 'array-element key';
        
        // Ensure the full key value is displayed
        keyElement.textContent = highlight.key.toString(); // Convert to string to avoid truncation
        keyContainer.appendChild(keyElement);
    }
}

function updateInsertionSortStatus(text) {
    document.getElementById('insertion-sort-status').innerHTML = text;
}

function saveInsertionSortStep(highlight, status) {
    insertionSortState.steps.push({
        array: [...insertionSortState.array],
        highlight: {...highlight},
        status,
        algorithmState: {...insertionSortState.algorithmState}
    });
    insertionSortState.currentStep = insertionSortState.steps.length - 1;
}

async function loadInsertionSortStep(stepIndex) {
    const step = insertionSortState.steps[stepIndex];
    insertionSortState.array = [...step.array];
    insertionSortState.algorithmState = {...step.algorithmState};
    insertionSortState.completed = (insertionSortState.algorithmState.currentIndex >= insertionSortState.array.length);
    renderInsertionSortVisualization(step.highlight);
    updateInsertionSortStatus(step.status || `Step ${stepIndex + 1}/${insertionSortState.steps.length}`);
    updateInsertionSortControls();
    await insertionSortDelay(insertionSortState.speed / 2);
}

// Insertion sort implementation
async function executeInsertionSortStep() {
    if (!insertionSortState.algorithmState || insertionSortState.completed) return;
    
    const s = insertionSortState.algorithmState;
    let highlight = {};
    let status = '';
    let stepCompleted = false;

    if (s.key === null) {
        // Start of new iteration - pick the key
        s.key = insertionSortState.array[s.currentIndex];
        highlight = {
            key: s.key,
            keyIndex: s.currentIndex,
            sortedUpTo: s.sortedUpTo
        };
        status = `Selected key: ${s.key} at position ${s.currentIndex}`;
        s.comparingIndex = s.currentIndex - 1;
    } else {
        // We're in the middle of an iteration
        if (s.comparingIndex >= 0 && insertionSortState.array[s.comparingIndex] > s.key) {
            // Shift element to the right
            insertionSortState.array[s.comparingIndex + 1] = insertionSortState.array[s.comparingIndex];
            s.shifts++;
            
            highlight = {
                key: s.key,
                comparingIndex: s.comparingIndex,
                sortedUpTo: s.sortedUpTo
            };
            status = `Comparing ${s.key} with ${insertionSortState.array[s.comparingIndex]} at position ${s.comparingIndex} - shifting right`;
            
            s.comparingIndex--;
            s.comparisons++;
        } else {
            // Found the position to insert the key
            insertionSortState.array[s.comparingIndex + 1] = s.key;
            s.sortedUpTo = s.currentIndex;
            
            highlight = {
                key: null,
                sortedUpTo: s.sortedUpTo
            };
            status = `Inserted ${s.key} at position ${s.comparingIndex + 1}`;
            
            s.currentIndex++;
            s.key = null;
            
            if (s.currentIndex >= insertionSortState.array.length) {
                insertionSortState.completed = true;
                highlight.sortedUpTo = insertionSortState.array.length - 1;
                status = `Sorting complete! ${s.comparisons} comparisons and ${s.shifts} shifts made.`;
            } else {
                status += ` - Moving to next element at position ${s.currentIndex}`;
            }
        }
    }

    saveInsertionSortStep(highlight, status);
    renderInsertionSortVisualization(highlight);
    updateInsertionSortStatus(status);
    updateInsertionSortControls();
    await insertionSortDelay(insertionSortState.speed);

    if (insertionSortState.completed) {
        insertionSortState.sorting = false;
        document.getElementById('insertion-sort-start-btn').textContent = '🎬 Start Sorting';
    }
}

// Sorting control functions
async function insertionSortVisualization() {
    if (!insertionSortState.interactiveMode) return;
    
    if (insertionSortState.completed) {
        insertionSortState.completed = false;
        generateInsertionSortArray(insertionSortState.maxElements);
        await insertionSortDelay(insertionSortState.speed);
    }
    
    insertionSortState.sorting = true;
    insertionSortState.isPaused = false;
    insertionSortState.manualStepMode = false;
    insertionSortState.algorithmState = createInsertionSortState();
    insertionSortState.steps = [];
    insertionSortState.currentStep = 0;
    document.getElementById('insertion-sort-start-btn').textContent = '⏸️ Pause';
    updateInsertionSortControls();

    while (!insertionSortState.completed && !insertionSortState.isPaused) {
        await executeInsertionSortStep();
    }

    if (insertionSortState.completed) {
        insertionSortState.sorting = false;
        document.getElementById('insertion-sort-start-btn').textContent = '🎬 Start Sorting';
    }
    updateInsertionSortControls();
}

async function continueInsertionSort() {
    insertionSortState.isPaused = false;
    insertionSortState.manualStepMode = false;
    updateInsertionSortControls();
    while (!insertionSortState.completed && !insertionSortState.isPaused) {
        await executeInsertionSortStep();
    }
    if (insertionSortState.completed) {
        insertionSortState.sorting = false;
        document.getElementById('insertion-sort-start-btn').textContent = '🎬 Start Sorting';
    }
    updateInsertionSortControls();
}

function updateInsertionSortControls() {
    if (!insertionSortState.interactiveMode) {
        document.getElementById('insertion-sort-start-btn').disabled = true;
        document.getElementById('insertion-sort-prev-btn').disabled = true;
        document.getElementById('insertion-sort-next-btn').disabled = true;
        return;
    }

    const startBtn = document.getElementById('insertion-sort-start-btn');
    const prevBtn = document.getElementById('insertion-sort-prev-btn');
    const nextBtn = document.getElementById('insertion-sort-next-btn');
    
    startBtn.disabled = false;
    prevBtn.disabled = insertionSortState.currentStep <= 0 || insertionSortState.steps.length === 0;
    nextBtn.disabled = insertionSortState.completed || (insertionSortState.sorting && !insertionSortState.isPaused);
    
    if (insertionSortState.completed) {
        startBtn.textContent = '🎬 Start Sorting';
    } else if (insertionSortState.isPaused) {
        startBtn.textContent = '▶️ Resume';
        if (insertionSortState.manualStepMode) {
            startBtn.textContent = '▶️ Continue Auto';
        }
    } else if (insertionSortState.sorting) {
        startBtn.textContent = '⏸️ Pause';
    }
}

// Setup event listeners
function setupInsertionSortEventListeners() {
    // Toggle button
    document.getElementById('insertion-sort-toggle-btn').addEventListener('click', function() {
        insertionSortState.interactiveMode = !insertionSortState.interactiveMode;
        if (insertionSortState.interactiveMode) {
            this.textContent = '🟢 ON';
            this.classList.add('active');
            document.getElementById('insertion-sort-elements-count').disabled = true;
            document.getElementById('insertion-sort-reset-btn').disabled = true;
            document.getElementById('insertion-sort-start-btn').disabled = false;
            updateInsertionSortControls();
        } else {
            this.textContent = '🔴 OFF';
            this.classList.remove('active');
            document.getElementById('insertion-sort-elements-count').disabled = false;
            document.getElementById('insertion-sort-reset-btn').disabled = false;
            document.getElementById('insertion-sort-start-btn').disabled = true;
            document.getElementById('insertion-sort-prev-btn').disabled = true;
            document.getElementById('insertion-sort-next-btn').disabled = true;
            insertionSortState.manualStepMode = false;
        }
    });

    document.getElementById('insertion-sort-speed').addEventListener('input', function() {
        insertionSortState.speed = 1600 - this.value;
        INSERTION_SORT_CONFIG.animationDuration = insertionSortState.speed / 1600;
        document.getElementById('insertion-sort-speed-value').textContent =
            this.value < 500 ? 'Slow' :
            this.value < 1000 ? 'Medium' : 'Fast';
    });

    document.getElementById('insertion-sort-elements-count').addEventListener('input', function() {
        insertionSortState.maxElements = parseInt(this.value);
        document.getElementById('insertion-sort-elements-value').textContent = insertionSortState.maxElements;
        if (!insertionSortState.sorting) generateInsertionSortArray(insertionSortState.maxElements);
    });

    document.getElementById('insertion-sort-reset-btn').addEventListener('click', function() {
        if (!insertionSortState.sorting) {
            generateInsertionSortArray(insertionSortState.maxElements);
        }
    });

    document.getElementById('insertion-sort-start-btn').addEventListener('click', function() {
        if (!insertionSortState.interactiveMode) return;
        
        if (insertionSortState.completed) {
            insertionSortVisualization();
            return;
        }
        
        if (insertionSortState.sorting && !insertionSortState.isPaused) {
            insertionSortState.isPaused = true;
            this.textContent = '▶️ Resume';
            updateInsertionSortStatus('⏸️ Sorting paused');
            updateInsertionSortControls();
        } else if (insertionSortState.sorting && insertionSortState.isPaused) {
            insertionSortState.isPaused = false;
        } else {
            insertionSortVisualization();
        }
    });

    document.getElementById('insertion-sort-prev-btn').addEventListener('click', function() {
        if (!insertionSortState.interactiveMode) return;
        if (insertionSortState.currentStep > 0) {
            insertionSortState.currentStep--;
            loadInsertionSortStep(insertionSortState.currentStep);
        }
    });

    document.getElementById('insertion-sort-next-btn').addEventListener('click', async function() {
        if (!insertionSortState.interactiveMode) return;
        if (insertionSortState.completed) return;
        
        insertionSortState.manualStepMode = true;
        insertionSortState.isPaused = true;
        
        if (!insertionSortState.algorithmState || insertionSortState.steps.length === 0) {
            insertionSortState.sorting = true;
            insertionSortState.algorithmState = createInsertionSortState();
            insertionSortState.steps = [];
            insertionSortState.currentStep = 0;
            updateInsertionSortControls();
        }
        
        await executeInsertionSortStep();
        updateInsertionSortControls();
    });
}

// Initialize
function initInsertionSort() {
    document.getElementById('insertion-sort-elements-count').value = 5;
    document.getElementById('insertion-sort-elements-value').textContent = 5;
    
    generateInsertionSortArray(5);
    setupInsertionSortEventListeners();
    document.getElementById('insertion-sort-start-btn').disabled = true;
    document.getElementById('insertion-sort-prev-btn').disabled = true;
    document.getElementById('insertion-sort-next-btn').disabled = true;
}

initInsertionSort();
</script>