<div class="algorithm-description">
    <p>Watch Counting Sort in action with this step-by-step visualization!</p>
</div>

<!-- Visualization -->
<div class="visualization">
    <div class="counting-container" id="counting-sort-container">
        <div class="input-section">
            <h3>Input Array</h3>
            <div class="input-array" id="counting-input-array"></div>
        </div>
        <div class="counting-section">
            <h3>Counting Process</h3>
            <div class="count-array" id="counting-count-array"></div>
        </div>
        <div class="output-section">
            <h3>Output Array</h3>
            <div class="output-array" id="counting-output-array"></div>
        </div>
    </div>
    
    <p id="counting-sort-status" style="font-size: 12.5px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ready to sort! Click start to begin</p>
    
    <div class="controls">
        <button class="btn toggle-btn" id="counting-sort-toggle-btn">🔴 OFF</button>
        <button class="btn" id="counting-sort-start-btn" disabled>🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="counting-sort-reset-btn">🔄 New Array</button>
        <button class="btn btn-secondary" id="counting-sort-prev-btn" disabled>⏮️</button>
        <button class="btn btn-secondary" id="counting-sort-next-btn" disabled>⏭️</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="counting-sort-speed-value">Medium</span></label>
                <input type="range" id="counting-sort-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="counting-sort-elements-value">5</span></label>
                <input type="range" id="counting-sort-elements-count" min="5" max="10" value="5">
            </span>
        </div>
    </div>
</div>

<style>
.counting-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 15px;
    background: #f5f5f5;
    border-radius: 8px;
    margin-bottom: 15px;
}

.input-section, .counting-section, .output-section {
    background: white;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.input-array, .count-array, .output-array {
    display: flex;
    flex-wrap: wrap;
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

.array-element.count {
    background: #8338ec;
}

.array-element.index {
    font-size: 0.7em;
    position: absolute;
    top: -15px;
    color: #333;
}

.count-cell {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
}

.count-value {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    background: #8338ec;
    color: white;
    font-weight: bold;
    transition: all 0.3s ease;
}

.count-value.active {
    background: #ff006e;
    transform: scale(1.1);
    box-shadow: 0 0 10px rgba(255, 0, 110, 0.7);
}

.count-label {
    font-size: 0.7em;
    color: #555;
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
    
    .count-value {
        width: 30px;
        height: 30px;
        font-size: 0.8em;
    }
}
</style>

<script>
// Counting Sort Configuration
const COUNTING_SORT_CONFIG = {
    minValue: 1,
    maxValue: 10, // Values will range from 1 to 10
    animationDuration: 0.5
};

// Counting Sort State management
let countingSortState = {
    array: [],
    countingArray: [],
    outputArray: [],
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
function createCountingSortState() {
    return {
        phase: 'counting',
        currentIndex: 0,
        currentValue: 0,
        count: Array(COUNTING_SORT_CONFIG.maxValue + 1).fill(0), // Array from 0 to maxValue
        output: Array(countingSortState.array.length).fill(null),
        comparisons: 0,
        placements: 0
    };
}

// Helper functions
function countingSortDelay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function generateCountingSortArray(size) {
    if (size <= 0) {
        updateCountingSortStatus('Array size must be greater than 0.');
        return;
    }
    countingSortState.completed = false;
    countingSortState.steps = [];
    countingSortState.currentStep = 0;
    countingSortState.algorithmState = null;
    countingSortState.sorting = false;
    countingSortState.isPaused = false;
    countingSortState.manualStepMode = false;

    // Generate array with random values strictly between 1 and 10
    countingSortState.array = Array.from({ length: size }, () => Math.floor(Math.random() * 10) + 1);

    // Initialize counting array (indices 0 to maxValue)
    countingSortState.countingArray = Array(COUNTING_SORT_CONFIG.maxValue + 1).fill(0);
    countingSortState.outputArray = Array(countingSortState.array.length).fill(null);

    renderCountingSortVisualization();
    updateCountingSortStatus('New array generated! Ready to sort');
}

function resetCountingSortState() {
    countingSortState = {
        array: [],
        countingArray: [],
        outputArray: [],
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
    renderCountingSortVisualization();
    updateCountingSortStatus('State reset. Ready to sort.');
}

function renderCountingSortVisualization(highlight = {}) {
    const inputContainer = document.getElementById('counting-input-array');
    const countContainer = document.getElementById('counting-count-array');
    const outputContainer = document.getElementById('counting-output-array');
    
    // Render input array
    inputContainer.innerHTML = '';
    countingSortState.array.forEach((value, index) => {
        const element = document.createElement('div');
        element.className = 'array-element';
        if (highlight.inputIndex === index) element.classList.add('active');
        if (highlight.sortedIndices && highlight.sortedIndices.includes(index)) element.classList.add('sorted');
        element.textContent = value;
        
        const indexLabel = document.createElement('div');
        indexLabel.className = 'index';
        indexLabel.textContent = index;
        element.appendChild(indexLabel);
        
        inputContainer.appendChild(element);
    });
    
    // Render counting array (only show indices from minValue to maxValue)
    countContainer.innerHTML = '';
    for (let i = COUNTING_SORT_CONFIG.minValue; i <= COUNTING_SORT_CONFIG.maxValue; i++) {
        const cell = document.createElement('div');
        cell.className = 'count-cell';
        
        const valueElement = document.createElement('div');
        valueElement.className = 'count-value';
        if (highlight.countIndex === i) valueElement.classList.add('active');
        valueElement.textContent = countingSortState.countingArray[i];
        
        const label = document.createElement('div');
        label.className = 'count-label';
        label.textContent = i;
        
        cell.appendChild(valueElement);
        cell.appendChild(label);
        countContainer.appendChild(cell);
    }
    
    // Render output array
    outputContainer.innerHTML = '';
    countingSortState.outputArray.forEach((value, index) => {
        const element = document.createElement('div');
        element.className = 'array-element';
        if (value !== null) element.classList.add('sorted');
        if (highlight.outputIndex === index) element.classList.add('active');
        element.textContent = value !== null ? value : '';
        
        const indexLabel = document.createElement('div');
        indexLabel.className = 'index';
        indexLabel.textContent = index;
        element.appendChild(indexLabel);
        
        outputContainer.appendChild(element);
    });
}

function updateCountingSortStatus(text) {
    document.getElementById('counting-sort-status').innerHTML = text;
}

function saveCountingSortStep(highlight, status) {
    countingSortState.steps.push({
        array: [...countingSortState.array],
        countingArray: [...countingSortState.countingArray],
        outputArray: [...countingSortState.outputArray],
        highlight: {...highlight},
        status,
        algorithmState: {...countingSortState.algorithmState}
    });
    countingSortState.currentStep = countingSortState.steps.length - 1;
}

async function loadCountingSortStep(stepIndex) {
    const step = countingSortState.steps[stepIndex];
    countingSortState.array = [...step.array];
    countingSortState.countingArray = [...step.countingArray];
    countingSortState.outputArray = [...step.outputArray];
    countingSortState.algorithmState = {...step.algorithmState};
    countingSortState.completed = (countingSortState.algorithmState.phase === 'done');
    renderCountingSortVisualization(step.highlight);
    updateCountingSortStatus(step.status || `Step ${stepIndex + 1}/${countingSortState.steps.length}`);
    updateCountingSortControls();
    await countingSortDelay(countingSortState.speed / 2);
}

// Counting sort implementation
async function executeCountingSortStep() {
    if (!countingSortState.algorithmState || countingSortState.completed) return;
    
    const s = countingSortState.algorithmState;
    let highlight = {};
    let status = '';
    let stepCompleted = false;

    switch (s.phase) {
        case 'counting':
            if (s.currentIndex < countingSortState.array.length) {
                const value = countingSortState.array[s.currentIndex];
                s.count[value]++;
                countingSortState.countingArray = [...s.count];
                
                status = `Counting occurrence of ${value} (Index ${s.currentIndex})`;
                highlight = {
                    inputIndex: s.currentIndex,
                    countIndex: value
                };
                
                s.currentIndex++;
                if (s.currentIndex >= countingSortState.array.length) {
                    s.phase = 'cumulative';
                    s.currentIndex = COUNTING_SORT_CONFIG.minValue; // Start from minValue
                    status = 'Counting phase complete. Moving to cumulative sum.';
                }
            }
            break;
            
        case 'cumulative':
            if (s.currentIndex <= COUNTING_SORT_CONFIG.maxValue) {
                if (s.currentIndex > COUNTING_SORT_CONFIG.minValue) {
                    s.count[s.currentIndex] += s.count[s.currentIndex - 1];
                    countingSortState.countingArray = [...s.count];
                }
                
                status = `Calculating cumulative count for value ${s.currentIndex}`;
                highlight = {
                    countIndex: s.currentIndex
                };
                
                s.currentIndex++;
                if (s.currentIndex > COUNTING_SORT_CONFIG.maxValue) {
                    s.phase = 'placing';
                    s.currentIndex = countingSortState.array.length - 1;
                    status = 'Cumulative phase complete. Starting placement.';
                }
            }
            break;
            
        case 'placing':
            if (s.currentIndex >= 0) {
                const value = countingSortState.array[s.currentIndex];
                const outputIndex = s.count[value] - 1;
                s.output[outputIndex] = value;
                s.count[value]--;
                countingSortState.outputArray = [...s.output];
                countingSortState.countingArray = [...s.count];
                s.placements++;
                
                status = `Placing ${value} at position ${outputIndex} in output array`;
                highlight = {
                    inputIndex: s.currentIndex,
                    countIndex: value,
                    outputIndex: outputIndex
                };
                
                s.currentIndex--;
                if (s.currentIndex < 0) {
                    s.phase = 'done';
                    countingSortState.array = [...s.output];
                    status = `Sorting complete! ${s.placements} placements made.`;
                }
            }
            break;
            
        case 'done':
            countingSortState.completed = true;
            stepCompleted = true;
            highlight = {
                sortedIndices: Array.from({length: countingSortState.array.length}, (_, i) => i)
            };
            break;
    }

    saveCountingSortStep(highlight, status);
    renderCountingSortVisualization(highlight);
    updateCountingSortStatus(status);
    updateCountingSortControls();
    await countingSortDelay(countingSortState.speed);

    if (countingSortState.completed) {
        countingSortState.sorting = false;
        document.getElementById('counting-sort-start-btn').textContent = '🎬 Start Sorting';
    }
}

// Sorting control functions
async function countingSortVisualization() {
    if (!countingSortState.interactiveMode) return;
    
    if (countingSortState.completed) {
        countingSortState.completed = false;
        generateCountingSortArray(countingSortState.maxElements);
        await countingSortDelay(countingSortState.speed);
    }
    
    countingSortState.sorting = true;
    countingSortState.isPaused = false;
    countingSortState.manualStepMode = false;
    countingSortState.algorithmState = createCountingSortState();
    countingSortState.steps = [];
    countingSortState.currentStep = 0;
    document.getElementById('counting-sort-start-btn').textContent = '⏸️ Pause';
    updateCountingSortControls();

    while (!countingSortState.completed && !countingSortState.isPaused) {
        await executeCountingSortStep();
    }

    if (countingSortState.completed) {
        countingSortState.sorting = false;
        document.getElementById('counting-sort-start-btn').textContent = '🎬 Start Sorting';
    }
    updateCountingSortControls();
}

async function continueCountingSort() {
    countingSortState.isPaused = false;
    countingSortState.manualStepMode = false;
    updateCountingSortControls();
    while (!countingSortState.completed && !countingSortState.isPaused) {
        await executeCountingSortStep();
    }
    if (countingSortState.completed) {
        countingSortState.sorting = false;
        document.getElementById('counting-sort-start-btn').textContent = '🎬 Start Sorting';
    }
    updateCountingSortControls();
}

function updateCountingSortControls() {
    if (!countingSortState.interactiveMode) {
        document.getElementById('counting-sort-start-btn').disabled = true;
        document.getElementById('counting-sort-prev-btn').disabled = true;
        document.getElementById('counting-sort-next-btn').disabled = true;
        return;
    }

    const startBtn = document.getElementById('counting-sort-start-btn');
    const prevBtn = document.getElementById('counting-sort-prev-btn');
    const nextBtn = document.getElementById('counting-sort-next-btn');
    
    startBtn.disabled = false;
    prevBtn.disabled = countingSortState.currentStep <= 0 || countingSortState.steps.length === 0;
    nextBtn.disabled = countingSortState.completed || (countingSortState.sorting && !countingSortState.isPaused);
    
    if (countingSortState.completed) {
        startBtn.textContent = '🎬 Start Sorting';
    } else if (countingSortState.isPaused) {
        startBtn.textContent = '▶️ Resume';
        if (countingSortState.manualStepMode) {
            startBtn.textContent = '▶️ Continue Auto';
        }
    } else if (countingSortState.sorting) {
        startBtn.textContent = '⏸️ Pause';
    }
}

// Setup event listeners
function setupCountingSortEventListeners() {
    // Toggle button
    document.getElementById('counting-sort-toggle-btn').addEventListener('click', function() {
        countingSortState.interactiveMode = !countingSortState.interactiveMode;
        if (countingSortState.interactiveMode) {
            this.textContent = '🟢 ON';
            this.classList.add('active');
            document.getElementById('counting-sort-elements-count').disabled = true;
            document.getElementById('counting-sort-reset-btn').disabled = true;
            document.getElementById('counting-sort-start-btn').disabled = false;
            updateCountingSortControls();
        } else {
            this.textContent = '🔴 OFF';
            this.classList.remove('active');
            document.getElementById('counting-sort-elements-count').disabled = false;
            document.getElementById('counting-sort-reset-btn').disabled = false;
            document.getElementById('counting-sort-start-btn').disabled = true;
            document.getElementById('counting-sort-prev-btn').disabled = true;
            document.getElementById('counting-sort-next-btn').disabled = true;
            countingSortState.manualStepMode = false;
        }
    });

    document.getElementById('counting-sort-speed').addEventListener('input', function() {
        countingSortState.speed = 1600 - this.value;
        COUNTING_SORT_CONFIG.animationDuration = countingSortState.speed / 1600;
        document.getElementById('counting-sort-speed-value').textContent =
            this.value < 500 ? 'Slow' :
            this.value < 1000 ? 'Medium' : 'Fast';
    });

    document.getElementById('counting-sort-elements-count').addEventListener('input', function() {
        countingSortState.maxElements = parseInt(this.value);
        document.getElementById('counting-sort-elements-value').textContent = countingSortState.maxElements;
        if (!countingSortState.sorting) generateCountingSortArray(countingSortState.maxElements);
    });

    document.getElementById('counting-sort-reset-btn').addEventListener('click', function() {
        if (!countingSortState.sorting) {
            generateCountingSortArray(countingSortState.maxElements);
        }
    });

    document.getElementById('counting-sort-start-btn').addEventListener('click', function() {
        if (!countingSortState.interactiveMode) return;
        
        if (countingSortState.completed) {
            countingSortVisualization();
            return;
        }
        
        if (countingSortState.sorting && !countingSortState.isPaused) {
            countingSortState.isPaused = true;
            this.textContent = '▶️ Resume';
            updateCountingSortStatus('⏸️ Sorting paused');
            updateCountingSortControls();
        } else if (countingSortState.sorting && countingSortState.isPaused) {
            countingSortState.isPaused = false;
        } else {
            countingSortVisualization();
        }
    });

    document.getElementById('counting-sort-prev-btn').addEventListener('click', function() {
        if (!countingSortState.interactiveMode) return;
        if (countingSortState.currentStep > 0) {
            countingSortState.currentStep--;
            loadCountingSortStep(countingSortState.currentStep);
        }
    });

    document.getElementById('counting-sort-next-btn').addEventListener('click', async function() {
        if (!countingSortState.interactiveMode) return;
        if (countingSortState.completed) return;
        
        countingSortState.manualStepMode = true;
        countingSortState.isPaused = true;
        
        if (!countingSortState.algorithmState || countingSortState.steps.length === 0) {
            countingSortState.sorting = true;
            countingSortState.algorithmState = createCountingSortState();
            countingSortState.steps = [];
            countingSortState.currentStep = 0;
            updateCountingSortControls();
        }
        
        await executeCountingSortStep();
        updateCountingSortControls();
    });
}

// Initialize
function initCountingSort() {
    document.getElementById('counting-sort-elements-count').value = 5;
    document.getElementById('counting-sort-elements-value').textContent = 5;
    
    generateCountingSortArray(5);
    setupCountingSortEventListeners();
    document.getElementById('counting-sort-start-btn').disabled = true;
    document.getElementById('counting-sort-prev-btn').disabled = true;
    document.getElementById('counting-sort-next-btn').disabled = true;
}

initCountingSort();
</script>