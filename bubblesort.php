<div class="algorithm-description">
    <p>Watch the algorithm in action with these colorful, animated bars!</p>
</div>

<!-- Visualization -->
<div class="visualization">
    <div class="graph-scroll-container">
        <div class="graph-container" id="bubble-graph-container"></div>
    </div>
    <p id="selection-status" style="font-size: 12.5px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ready to sort! Click start to begin</p>
    <div class="controls">
        <button class="btn toggle-btn" id="bubble-toggle-mode-btn">🔴 OFF</button>
        <button class="btn" id="bubble-start-btn" disabled>🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="bubble-reset-btn">🔄 New Array</button>
        <button class="btn btn-secondary" id="bubble-prev-btn" disabled>⏮️</button>
        <button class="btn btn-secondary" id="bubble-next-btn" disabled>⏭️</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="speed-value">Medium</span></label>
                <input type="range" id="bubble-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="elements-value">10</span></label>
                <input type="range" id="bubble-elements-count" min="5" max="20" value="10">
            </span>
        </div>
    </div>
</div>

<script>
    // Configuration - Responsive settings
const CONFIG = {
    mobileBreakpoint: 768,
    desktopBarWidth: 30,
    mobileBarWidth: 18,
    barGap: 6,
    maxBars: 50,
    minValue: 10,
    maxValue: 100,
    heightScale: 2.2,
    animationDuration: 0.5
};

// State management
let state = {
    array: [],
    sorting: false,
    speed: 800,
    maxElements: 10,
    currentStep: 0,
    steps: [],
    isPaused: false,
    algorithmState: null,
    completed: false,
    interactiveMode: false,
    manualStepMode: false
};

// Algorithm state structure
function createAlgorithmState() {
    return {
        i: 0,
        j: 1,
        minIndex: 0,
        comparisons: 0,
        swaps: 0,
        n: state.array.length,
        arr: [...state.array],
        phase: 'find-min',
        sortedUpTo: -1
    };
}

// Helper functions
function isMobileView() {
    return window.innerWidth <= CONFIG.mobileBreakpoint;
}

function getCurrentBarWidth(elementCount) {
    const baseWidth = isMobileView() ? CONFIG.mobileBarWidth : CONFIG.desktopBarWidth;
    const maxBarWidth = isMobileView() ? 25 : 35;
    const minBarWidth = isMobileView() ? 8 : 10;
    return Math.max(minBarWidth, maxBarWidth - (elementCount - 10));
}

const COLORS = {
    default: '#3a86ff',
    compare: '#ff006e',
    min: '#8338ec',
    sorted: '#06d6a0',
    swap: '#ffbe0b'
};

function adjustBarWidth(elementCount) {
    CONFIG.barWidth = getCurrentBarWidth(elementCount);
}

function generateNewArray(size) {
    state.completed = false;
    state.steps = []; // Clear previous steps
    state.currentStep = 0; // Reset step counter
    state.algorithmState = null; // Clear previous algorithm state
    state.sorting = false; // Reset sorting state
    state.isPaused = false; // Reset pause state
    state.manualStepMode = false; // Reset manual step mode

    adjustBarWidth(size);

    // Generate unique random values
    const range = Array.from({ length: CONFIG.maxValue - CONFIG.minValue + 1 }, (_, i) => i + CONFIG.minValue);
    const shuffledRange = range.sort(() => Math.random() - 0.5); // Shuffle the range
    const newArray = shuffledRange.slice(0, size); // Take the first `size` elements

    if (state.array.length === 0) {
        state.array = newArray;
        renderGraph();
        return;
    }

    const startArray = [...state.array];
    const startTime = performance.now();

    function animate(timestamp) {
        const elapsed = timestamp - startTime;
        const progress = Math.min(elapsed / (state.speed * 2), 1);

        state.array = newArray.map((val, i) => {
            const startVal = i < startArray.length ? startArray[i] : CONFIG.minValue;
            return startVal + (val - startVal) * progress;
        });

        renderGraph();

        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            state.array = newArray;
            renderGraph();
        }
    }

    requestAnimationFrame(animate);
}

function renderGraph(highlight = {}, sortedUpTo = -1) {
    const container = document.getElementById('bubble-graph-container');
    container.innerHTML = '';
    adjustBarWidth(state.array.length);
    container.style.width = `${calculateGraphWidth(state.array.length)}px`;
    container.style.transition = `width ${CONFIG.animationDuration}s ease-out`;

    state.array.forEach((value, index) => {
        const bar = document.createElement('div');
        bar.className = 'graph-bar';
        bar.style.width = `${CONFIG.barWidth}px`;
        bar.style.height = `${value * CONFIG.heightScale}px`;
        bar.style.transition = `all ${CONFIG.animationDuration}s cubic-bezier(0.65, 0, 0.35, 1)`;
        bar.style.backgroundColor = state.completed ? COLORS.sorted : COLORS.default;

        if (!state.completed) {
            if (index <= sortedUpTo) bar.style.backgroundColor = COLORS.sorted;
            if (index === highlight.minIndex) {
                bar.style.backgroundColor = COLORS.min;
                bar.style.transform = 'scaleY(1.05)';
            }
            if (highlight.compareIndices?.includes(index)) {
                bar.style.backgroundColor = COLORS.compare;
                bar.style.transform = 'translateY(-5px)';
            }
            if (index === highlight.swapIndex) {
                bar.style.backgroundColor = COLORS.swap;
                bar.style.transform = 'translateY(-15px)';
            }
        }

        const label = document.createElement('div');
        label.className = 'bar-label';
        label.textContent = Math.round(value);
        bar.appendChild(label);

        container.appendChild(bar);
    });
}

function calculateGraphWidth(elementCount) {
    return (CONFIG.barWidth * elementCount) + (CONFIG.barGap * (elementCount - 1));
}

// Setup event listeners
function setupEventListeners() {
    // Toggle button
    document.getElementById('bubble-toggle-mode-btn').addEventListener('click', function() {
        state.interactiveMode = !state.interactiveMode;
        if (state.interactiveMode) {
            this.textContent = '🟢 ON';
            this.classList.add('active');
            document.getElementById('bubble-elements-count').disabled = true;
            document.getElementById('bubble-reset-btn').disabled = true;
            document.getElementById('bubble-start-btn').disabled = false;
            updateControls();
        } else {
            this.textContent = '🔴 OFF';
            this.classList.remove('active');
            document.getElementById('bubble-elements-count').disabled = false;
            document.getElementById('bubble-reset-btn').disabled = false;
            document.getElementById('bubble-start-btn').disabled = true;
            document.getElementById('bubble-prev-btn').disabled = true;
            document.getElementById('bubble-next-btn').disabled = true;
            state.manualStepMode = false;
        }
    });

    document.getElementById('bubble-speed').addEventListener('input', function() {
        state.speed = 1600 - this.value;
        CONFIG.animationDuration = state.speed / 1600;
        document.getElementById('speed-value').textContent =
            this.value < 500 ? 'Slow' :
            this.value < 1000 ? 'Medium' : 'Fast';
    });

    document.getElementById('bubble-elements-count').addEventListener('input', function() {
        state.maxElements = parseInt(this.value);
        document.getElementById('elements-value').textContent = state.maxElements;
        if (!state.sorting) generateNewArray(state.maxElements);
    });

    document.getElementById('bubble-reset-btn').addEventListener('click', function() {
        if (!state.sorting) {
            generateNewArray(state.maxElements);
            updateStatus('New array generated! Ready to sort');
        }
    });

    document.getElementById('bubble-start-btn').addEventListener('click', function() {
        if (!state.interactiveMode) return;
        
        if (state.completed) {
            selectionSortVisualization();
            return;
        }
        
        if (state.sorting && !state.isPaused) {
            state.isPaused = true;
            this.textContent = '▶️ Resume';
            updateStatus('⏸️ Sorting paused');
            updateControls();
        } else if (state.sorting && state.isPaused) {
            state.isPaused = false;
            state.manualStepMode = false;
            this.textContent = '⏸️ Pause';
            updateStatus('▶️ Resuming sorting...');
            continueSorting();
        } else {
            selectionSortVisualization();
        }
    });

    document.getElementById('bubble-prev-btn').addEventListener('click', function() {
        if (!state.interactiveMode) return;
        if (state.currentStep > 0) {
            state.currentStep--;
            loadStep(state.currentStep);
        }
    });

    document.getElementById('bubble-next-btn').addEventListener('click', async function() {
        if (!state.interactiveMode) return;
        if (state.completed) return;
        
        // Enable manual step mode
        state.manualStepMode = true;
        state.isPaused = true;
        
        if (!state.algorithmState || state.steps.length === 0) {
            // First click - initialize sorting
            state.sorting = true;
            state.algorithmState = createAlgorithmState();
            state.steps = [];
            state.currentStep = 0;
            updateControls();
        }
        
        await executeNextStep();
        updateControls();
    });
}

// Step management with animations
function saveCurrentStep(highlight, sortedUpTo, status) {
    state.steps.push({
        array: [...state.array],
        highlight: {...highlight},
        sortedUpTo,
        status,
        algorithmState: {...state.algorithmState}
    });
    state.currentStep = state.steps.length - 1;
}

async function loadStep(stepIndex) {
    const step = state.steps[stepIndex];
    state.array = [...step.array];
    state.algorithmState = {...step.algorithmState};
    state.completed = (state.algorithmState.phase === 'done');
    renderGraph(step.highlight, step.sortedUpTo);
    updateStatus(step.status || `Step ${stepIndex + 1}/${state.steps.length}`);
    updateControls();
    await delay(state.speed / 2);
}

// Accurate selection sort implementation
async function executeNextStep() {
    if (!state.algorithmState || state.completed) return;
    
    const s = state.algorithmState;
    let highlight = {};
    let status = '';
    let stepCompleted = false;

    switch (s.phase) {
        case 'find-min':
            if (s.j < s.n) {
                s.comparisons++;
                status = `Comparing ${s.arr[s.j]} < ${s.arr[s.minIndex]}? (Comparisons: ${s.comparisons})`;
                highlight = { minIndex: s.minIndex, compareIndices: [s.j] };
                
                if (s.arr[s.j] < s.arr[s.minIndex]) {
                    s.minIndex = s.j;
                    status = `New minimum found: ${s.arr[s.minIndex]}`;
                }
                s.j++;
            } else {
                if (s.minIndex !== s.i) {
                    s.phase = 'swap';
                    [s.arr[s.i], s.arr[s.minIndex]] = [s.arr[s.minIndex], s.arr[s.i]];
                    s.swaps++;
                    status = `Swapping elements (Swaps: ${s.swaps})`;
                    highlight = { swapIndex: s.i, minIndex: s.minIndex };
                } else {
                    s.sortedUpTo = s.i;
                    s.i++;
                    s.minIndex = s.i;
                    s.j = s.i + 1;
                    status = `Pass ${s.i + 1} completed`;
                    
                    if (s.i >= s.n - 1) {
                        s.phase = 'done';
                    }
                }
            }
            break;

        case 'swap':
            s.sortedUpTo = s.i;
            s.i++;
            s.minIndex = s.i;
            s.j = s.i + 1;
            status = `Pass ${s.i + 1} completed`;
            
            if (s.i >= s.n - 1) {
                s.phase = 'done';
            } else {
                s.phase = 'find-min';
            }
            break;

        case 'done':
            status = `Sorting complete! Comparisons: ${s.comparisons}, Swaps: ${s.swaps}`;
            s.sortedUpTo = s.n - 1;
            state.completed = true;
            stepCompleted = true;
            break;
    }

    state.array = [...s.arr];
    saveCurrentStep(highlight, s.sortedUpTo, status);
    renderGraph(highlight, s.sortedUpTo);
    updateStatus(status);
    updateControls();
    await delay(state.speed);

    if (state.completed) {
        state.sorting = false;
        document.getElementById('bubble-start-btn').textContent = '🎬 Start Sorting';
    }
}

// Sorting functions with animations
async function selectionSortVisualization() {
    if (!state.interactiveMode) return;
    
    if (state.completed) {
        state.completed = false;
        generateNewArray(state.maxElements);
        await delay(state.speed);
    }
    
    state.sorting = true;
    state.isPaused = false;
    state.manualStepMode = false;
    state.algorithmState = createAlgorithmState();
    state.steps = [];
    state.currentStep = 0;
    document.getElementById('bubble-start-btn').textContent = '⏸️ Pause';
    updateControls();

    while (!state.completed && !state.isPaused) {  // Changed condition to check !state.completed
        await executeNextStep();
    }

    if (state.completed) {
        state.sorting = false;
        document.getElementById('bubble-start-btn').textContent = '🎬 Start Sorting';
    }
    updateControls();
}

async function continueSorting() {
    state.isPaused = false;
    state.manualStepMode = false;
    updateControls();
    while (!state.completed && !state.isPaused) {  // Changed condition to check !state.completed
        await executeNextStep();
    }
    if (state.completed) {
        state.sorting = false;
        document.getElementById('bubble-start-btn').textContent = '🎬 Start Sorting';
    }
    updateControls();
}

// Helper functions
function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function updateStatus(text) {
    document.getElementById('selection-status').innerHTML = text;
}

function updateControls() {
    if (!state.interactiveMode) {
        document.getElementById('bubble-start-btn').disabled = true;
        document.getElementById('bubble-prev-btn').disabled = true;
        document.getElementById('bubble-next-btn').disabled = true;
        return;
    }

    const startBtn = document.getElementById('bubble-start-btn');
    const prevBtn = document.getElementById('bubble-prev-btn');
    const nextBtn = document.getElementById('bubble-next-btn');
    
    startBtn.disabled = false;
    
    // Enable prev button if there are previous steps
    prevBtn.disabled = state.currentStep <= 0 || state.steps.length === 0;
    
    // Enable next button unless sorting is running automatically
    nextBtn.disabled = state.completed || (state.sorting && !state.isPaused);
    
    if (state.completed) {
        startBtn.textContent = '🎬 Start Sorting';
    } else if (state.isPaused) {
        startBtn.textContent = '▶️ Resume';
        if (state.manualStepMode) {
            startBtn.textContent = '▶️ Continue Auto';
        }
    } else if (state.sorting) {
        startBtn.textContent = '⏸️ Pause';
    }
}

// Initialize
function init() {
    // Set default elements to 10
    document.getElementById('bubble-elements-count').value = 10;
    document.getElementById('elements-value').textContent = 10;
    
    generateNewArray(10);
    setupEventListeners();
    document.getElementById('bubble-start-btn').disabled = true;
    document.getElementById('bubble-prev-btn').disabled = true;
    document.getElementById('bubble-next-btn').disabled = true;
}

init();
</script>