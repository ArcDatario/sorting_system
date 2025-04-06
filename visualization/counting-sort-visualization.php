<div class="algorithm-description">
    <p>Watch Counting Sort in action with these colorful, animated bars!</p>
</div>

<!-- Visualization -->
<div class="visualization">
    <div class="graph-scroll-container">
        <div class="graph-container" id="counting-graph-container"></div>
    </div>
    <p id="counting-status" style="font-size: 12.5px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Ready to sort! Click start to begin</p>
    <div class="controls">
        <button class="btn toggle-btn" id="toggle-mode-btn">🔴 OFF</button>
        <button class="btn" id="counting-start-btn" disabled>🎬 Start Sorting</button>
        <button class="btn btn-secondary" id="counting-reset-btn">🔄 New Array</button>
        <button class="btn btn-secondary" id="counting-prev-btn" disabled>⏮️</button>
        <button class="btn btn-secondary" id="counting-next-btn" disabled>⏭️</button>
        
        <div class="control-group">
            <span class="speed-control">
                <label>⏱️ Speed: <span id="speed-value">Medium</span></label>
                <input type="range" id="counting-speed" min="100" max="1500" value="800">
            </span>
        </div>
        
        <div class="control-group">
            <span class="elements-control">
                <label>📊 Elements: <span id="elements-value">10</span></label>
                <input type="range" id="elements-count" min="5" max="20" value="10">
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
    minValue: 1,  // Counting sort works better with positive integers starting from 1
    maxValue: 20, // Smaller range for better visualization of counting array
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
    manualStepMode: false,
    countingArray: [],  // For counting sort visualization
    outputArray: [],    // For counting sort visualization
    currentPhase: 'counting' // 'counting', 'accumulating', 'placing'
};

// Algorithm state structure
function createAlgorithmState() {
    return {
        i: 0,
        j: 0,
        k: 0,
        count: new Array(CONFIG.maxValue + 1).fill(0),
        output: new Array(state.array.length).fill(0),
        comparisons: 0,
        operations: 0,
        n: state.array.length,
        arr: [...state.array],
        phase: 'counting',
        maxValue: CONFIG.maxValue
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
    active: '#ff006e',
    counting: '#8338ec',
    sorted: '#06d6a0',
    processed: '#ffbe0b',
    output: '#118ab2'
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
    state.currentPhase = 'counting'; // Reset phase

    adjustBarWidth(size);

    // Generate random values within our range (1 to maxValue)
    const newArray = Array.from({length: size}, () => 
        Math.floor(Math.random() * CONFIG.maxValue) + 1
    );

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

function renderGraph(highlight = {}, phase = 'counting') {
    const container = document.getElementById('counting-graph-container');
    container.innerHTML = '';
    adjustBarWidth(state.array.length);
    container.style.width = `${calculateGraphWidth(state.array.length)}px`;
    container.style.transition = `width ${CONFIG.animationDuration}s ease-out`;

    // Render main array
    state.array.forEach((value, index) => {
        const bar = document.createElement('div');
        bar.className = 'graph-bar';
        bar.style.width = `${CONFIG.barWidth}px`;
        bar.style.height = `${value * CONFIG.heightScale}px`;
        bar.style.transition = `all ${CONFIG.animationDuration}s cubic-bezier(0.65, 0, 0.35, 1)`;
        bar.style.backgroundColor = state.completed ? COLORS.sorted : COLORS.default;

        if (!state.completed) {
            if (phase === 'placing' && index < state.algorithmState?.output.length) {
                bar.style.backgroundColor = COLORS.output;
            }
            if (index === highlight.currentIndex) {
                bar.style.backgroundColor = COLORS.active;
                bar.style.transform = 'translateY(-5px)';
            }
            if (highlight.processedIndices?.includes(index)) {
                bar.style.backgroundColor = COLORS.processed;
            }
        }

        const label = document.createElement('div');
        label.className = 'bar-label';
        label.textContent = Math.round(value);
        bar.appendChild(label);

        container.appendChild(bar);
    });

    // If we're in the counting phase and have algorithm state, show counting array
    if (state.algorithmState && phase === 'counting') {
        const countContainer = document.createElement('div');
        countContainer.className = 'count-array-container';
        countContainer.style.marginTop = '20px';
        countContainer.style.display = 'flex';
        countContainer.style.justifyContent = 'center';
        countContainer.style.gap = '10px';

        for (let i = 1; i <= CONFIG.maxValue; i++) {
            const countBar = document.createElement('div');
            countBar.className = 'count-bar';
            countBar.style.width = `${CONFIG.barWidth}px`;
            countBar.style.height = `${state.algorithmState.count[i] * 20}px`;
            countBar.style.backgroundColor = i === highlight.currentValue ? COLORS.counting : '#888';
            
            const countLabel = document.createElement('div');
            countLabel.className = 'count-label';
            countLabel.textContent = i;
            countBar.appendChild(countLabel);
            
            const countValue = document.createElement('div');
            countValue.className = 'count-value';
            countValue.textContent = state.algorithmState.count[i];
            countBar.appendChild(countValue);
            
            countContainer.appendChild(countBar);
        }

        container.appendChild(countContainer);
    }
}

function calculateGraphWidth(elementCount) {
    return (CONFIG.barWidth * elementCount) + (CONFIG.barGap * (elementCount - 1));
}

// Setup event listeners
function setupEventListeners() {
    // Toggle button
    document.getElementById('toggle-mode-btn').addEventListener('click', function() {
        state.interactiveMode = !state.interactiveMode;
        if (state.interactiveMode) {
            this.textContent = '🟢 ON';
            this.classList.add('active');
            document.getElementById('elements-count').disabled = true;
            document.getElementById('counting-reset-btn').disabled = true;
            document.getElementById('counting-start-btn').disabled = false;
            updateControls();
        } else {
            this.textContent = '🔴 OFF';
            this.classList.remove('active');
            document.getElementById('elements-count').disabled = false;
            document.getElementById('counting-reset-btn').disabled = false;
            document.getElementById('counting-start-btn').disabled = true;
            document.getElementById('counting-prev-btn').disabled = true;
            document.getElementById('counting-next-btn').disabled = true;
            state.manualStepMode = false;
        }
    });

    document.getElementById('counting-speed').addEventListener('input', function() {
        state.speed = 1600 - this.value;
        CONFIG.animationDuration = state.speed / 1600;
        document.getElementById('speed-value').textContent =
            this.value < 500 ? 'Slow' :
            this.value < 1000 ? 'Medium' : 'Fast';
    });

    document.getElementById('elements-count').addEventListener('input', function() {
        state.maxElements = parseInt(this.value);
        document.getElementById('elements-value').textContent = state.maxElements;
        if (!state.sorting) generateNewArray(state.maxElements);
    });

    document.getElementById('counting-reset-btn').addEventListener('click', function() {
        if (!state.sorting) {
            generateNewArray(state.maxElements);
            updateStatus('New array generated! Ready to sort');
        }
    });

    document.getElementById('counting-start-btn').addEventListener('click', function() {
        if (!state.interactiveMode) return;
        
        if (state.completed) {
            countingSortVisualization();
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
            countingSortVisualization();
        }
    });

    document.getElementById('counting-prev-btn').addEventListener('click', function() {
        if (!state.interactiveMode) return;
        if (state.currentStep > 0) {
            state.currentStep--;
            loadStep(state.currentStep);
        }
    });

    document.getElementById('counting-next-btn').addEventListener('click', async function() {
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
function saveCurrentStep(highlight, phase, status) {
    state.steps.push({
        array: [...state.array],
        highlight: {...highlight},
        phase,
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
    state.currentPhase = step.phase || 'counting';
    renderGraph(step.highlight, state.currentPhase);
    updateStatus(step.status || `Step ${stepIndex + 1}/${state.steps.length}`);
    updateControls();
    await delay(state.speed / 2);
}

// Counting sort implementation
async function executeNextStep() {
    if (!state.algorithmState || state.completed) return;
    
    const s = state.algorithmState;
    let highlight = {};
    let status = '';
    let stepCompleted = false;
    let currentPhase = state.currentPhase;

    switch (s.phase) {
        case 'counting':
            if (s.i < s.n) {
                const value = s.arr[s.i];
                s.count[value]++;
                s.operations++;
                status = `Counting value ${value} (Count[${value}] = ${s.count[value]})`;
                highlight = { currentIndex: s.i, currentValue: value };
                s.i++;
                
                if (s.i >= s.n) {
                    s.phase = 'accumulating';
                    currentPhase = 'accumulating';
                    status = 'Counting phase complete. Starting accumulation...';
                }
            }
            break;

        case 'accumulating':
            if (s.j <= s.maxValue) {
                if (s.j > 1) {
                    s.count[s.j] += s.count[s.j - 1];
                }
                s.operations++;
                status = `Accumulating counts (Count[${s.j}] = ${s.count[s.j]})`;
                highlight = { currentValue: s.j };
                s.j++;
                
                if (s.j > s.maxValue) {
                    s.phase = 'placing';
                    currentPhase = 'placing';
                    s.i = s.n - 1; // Start from the end for stable sort
                    status = 'Accumulation complete. Starting placement...';
                }
            }
            break;

        case 'placing':
            if (s.i >= 0) {
                const value = s.arr[s.i];
                s.output[s.count[value] - 1] = value;
                s.count[value]--;
                s.operations++;
                status = `Placing ${value} at position ${s.count[value]}`;
                highlight = { currentIndex: s.i, processedIndices: [s.count[value]] };
                s.i--;
                
                if (s.i < 0) {
                    s.phase = 'done';
                    status = `Sorting complete! Total operations: ${s.operations}`;
                    stepCompleted = true;
                }
            }
            break;

        case 'done':
            // Update the main array with the sorted output
            for (let i = 0; i < s.n; i++) {
                s.arr[i] = s.output[i];
            }
            state.array = [...s.arr];
            state.completed = true;
            stepCompleted = true;
            status = `Sorting complete! Total operations: ${s.operations}`;
            break;
    }

    state.currentPhase = currentPhase;
    saveCurrentStep(highlight, currentPhase, status);
    renderGraph(highlight, currentPhase);
    updateStatus(status);
    updateControls();
    await delay(state.speed);

    if (state.completed) {
        state.sorting = false;
        document.getElementById('counting-start-btn').textContent = '🎬 Start Sorting';
    }
}

// Sorting functions with animations
async function countingSortVisualization() {
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
    state.currentPhase = 'counting';
    document.getElementById('counting-start-btn').textContent = '⏸️ Pause';
    updateControls();

    while (!state.completed && !state.isPaused) {
        await executeNextStep();
    }

    if (state.completed) {
        state.sorting = false;
        document.getElementById('counting-start-btn').textContent = '🎬 Start Sorting';
    }
    updateControls();
}

async function continueSorting() {
    state.isPaused = false;
    state.manualStepMode = false;
    updateControls();
    while (!state.completed && !state.isPaused) {
        await executeNextStep();
    }
    if (state.completed) {
        state.sorting = false;
        document.getElementById('counting-start-btn').textContent = '🎬 Start Sorting';
    }
    updateControls();
}

// Helper functions
function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function updateStatus(text) {
    document.getElementById('counting-status').innerHTML = text;
}

function updateControls() {
    if (!state.interactiveMode) {
        document.getElementById('counting-start-btn').disabled = true;
        document.getElementById('counting-prev-btn').disabled = true;
        document.getElementById('counting-next-btn').disabled = true;
        return;
    }

    const startBtn = document.getElementById('counting-start-btn');
    const prevBtn = document.getElementById('counting-prev-btn');
    const nextBtn = document.getElementById('counting-next-btn');
    
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
    document.getElementById('elements-count').value = 10;
    document.getElementById('elements-value').textContent = 10;
    
    generateNewArray(10);
    setupEventListeners();
    document.getElementById('counting-start-btn').disabled = true;
    document.getElementById('counting-prev-btn').disabled = true;
    document.getElementById('counting-next-btn').disabled = true;
}

init();
</script>