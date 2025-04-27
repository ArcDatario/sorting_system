<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 2px;
    }
    .bubble-sort-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }
    .bubble-sort-button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .bubble-sort-button:hover {
        background-color: #2980b9;
    }
    .bubble-sort-button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
    .bubble-sort-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    .bubble-sort-visualization {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 2px;
    }
    .bubble-sort-array-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
    }
    .bubble-sort-array-row {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 5px;
    }
    .bubble-sort-array-element {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-weight: bold;
        transition: all 0.3s;
        color: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        position: relative;
    }
    .bubble-sort-normal { background-color: #3498db; }
    .bubble-sort-current { background-color: #e74c3c; transform: scale(1.1); }
    .bubble-sort-compared { background-color: #f39c12; }
    .bubble-sort-sorted { background-color: #2ecc71; }
    .bubble-sort-swapped { background-color: #9b59b6; }
    .bubble-sort-array-label {
        position: absolute;
        top: -20px;
        width: 100%;
        text-align: center;
        font-size: 11px;
        color: #7f8c8d;
    }
    .bubble-sort-info-panel {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }
    .bubble-sort-info-panel::-webkit-scrollbar {
        width: 8px;
    }
    .bubble-sort-info-panel::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }
    .bubble-sort-info-panel::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }
    .bubble-sort-info-panel::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }
    .bubble-sort-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }
    .bubble-sort-step.active {
        font-weight: bold;
        color: #2c3e50;
    }
    .bubble-sort-step.completed {
        color: #27ae60;
    }
    .bubble-sort-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .bubble-sort-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }
    .bubble-sort-color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
    .bubble-sort-status-text {
        text-align: center;
        margin: 2px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
        display:none;
    }
    .bubble-sort-pass-indicator {
        text-align: center;
        font-weight: bold;
        margin: 10px 0;
        color: #2c3e50;
    }

    body.dark-mode .bubble-sort-array-container {
        background-color: #333;
    }
    body.dark-mode .bubble-sort-info-panel {
        background-color: var(--background);
        color: white;
    }
    .bubble-current-steps{
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: black;
        min-height: 30px;
        margin: 20px 0;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 6px;
    }
</style>

<main class="main-content bubble-sort" id="bubble-sort" style="display:block;">
    <h1>Bubble Sort Visualization</h1>
    
    <div class="bubble-sort-visualization">
        <div id="bubble-sort-status-text" class="bubble-sort-status-text"></div>
        <div id="bubble-sort-pass-indicator" class="bubble-sort-pass-indicator"></div>
      
        <div class="bubble-sort-array-container">
            <div id="bubble-sort-array" class="bubble-sort-array-row"></div>
        </div>

        <div class="bubble-current-steps"></div>
        
        <div class="bubble-sort-controls">
            <button id="bubble-sort-generate-btn" class="bubble-sort-button">New Array</button>
            <button id="bubble-sort-sort-btn" class="bubble-sort-button">Start Auto Sort</button>
            <button id="bubble-sort-prev-btn" class="bubble-sort-button">Previous Step</button>
            <button id="bubble-sort-next-btn" class="bubble-sort-button">Next Step</button>
            <div class="bubble-sort-slider-container">
                <label for="bubble-sort-size-slider">Array Size:</label>
                <input type="range" id="bubble-sort-size-slider" min="5" max="15" value="8">
                <span id="bubble-sort-size-value">8</span>
            </div>
            <div class="bubble-sort-slider-container">
                <label for="bubble-sort-speed-slider">Speed:</label>
                <input type="range" id="bubble-sort-speed-slider" min="1" max="10" value="1">
                <span id="bubble-sort-speed-value">1</span>
            </div>
        </div>

        <div id="bubble-sort-info-panel" class="bubble-sort-info-panel" style="max-height:200px;overflow-y:auto;"></div>
    </div>
    <div class="bubble-sort-legend">
        <div class="bubble-sort-legend-item">
            <div class="bubble-sort-color-box bubble-sort-current"></div>
            <span>Current Element</span>
        </div>
        <div class="bubble-sort-legend-item">
            <div class="bubble-sort-color-box bubble-sort-compared"></div>
            <span>Being Compared</span>
        </div>
        <div class="bubble-sort-legend-item">
            <div class="bubble-sort-color-box bubble-sort-swapped"></div>
            <span>Being Swapped</span>
        </div>
        <div class="bubble-sort-legend-item">
            <div class="bubble-sort-color-box bubble-sort-sorted"></div>
            <span>Sorted</span>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const bubbleSortSizeSlider = document.getElementById('bubble-sort-size-slider');
    const bubbleSortSizeValue = document.getElementById('bubble-sort-size-value');
    const bubbleSortArrayContainer = document.getElementById('bubble-sort-array');
    const bubbleSortGenerateBtn = document.getElementById('bubble-sort-generate-btn');
    const bubbleSortSortBtn = document.getElementById('bubble-sort-sort-btn');
    const bubbleSortPrevBtn = document.getElementById('bubble-sort-prev-btn');
    const bubbleSortNextBtn = document.getElementById('bubble-sort-next-btn');
    const bubbleSortSpeedSlider = document.getElementById('bubble-sort-speed-slider');
    const bubbleSortSpeedValue = document.getElementById('bubble-sort-speed-value');
    const bubbleSortStatusText = document.getElementById('bubble-sort-status-text');
    const bubbleSortInfoPanel = document.getElementById('bubble-sort-info-panel');
    const bubbleSortPassIndicator = document.getElementById('bubble-sort-pass-indicator');
    const bubbleSortCurrentStepsElement = document.querySelector('.bubble-current-steps');

    // Variables
    let bubbleSortArray = [];
    let bubbleSortArraySize = parseInt(bubbleSortSizeSlider.value);
    let bubbleSortSpeed = parseInt(bubbleSortSpeedSlider.value);
    let bubbleSortAnimationSpeed = 1000 / bubbleSortSpeed;
    let bubbleSortIsSorting = false;
    let bubbleSortSteps = [];
    let bubbleSortCurrentStep = 0;
    let bubbleSortStepDetails = [];
    let bubbleSortAutoSortInterval = null;
    let bubbleSortCurrentPass = 0;
    let bubbleSortCurrentComparison = 0;
    let bubbleSortSortedIndices = [];
    let bubbleSortTotalPasses = 0;

    // Initialize
    updateBubbleSortSizeValue();
    updateBubbleSortSpeedValue();
    generateBubbleSortNewArray();

    // Event listeners
    bubbleSortGenerateBtn.addEventListener('click', function() {
        generateBubbleSortNewArray();
        // After generating new array, also precompute steps for navigation
        precomputeBubbleSortSteps();
        renderBubbleSortStep(0);
    });
    bubbleSortSortBtn.addEventListener('click', toggleBubbleSortAutoSort);
    bubbleSortPrevBtn.addEventListener('click', function() {
        if (bubbleSortStepDetails.length === 0) precomputeBubbleSortSteps();
        goToPreviousBubbleSortStep();
    });
    bubbleSortNextBtn.addEventListener('click', function() {
        if (bubbleSortStepDetails.length === 0) precomputeBubbleSortSteps();
        goToNextBubbleSortStep();
    });
    bubbleSortSizeSlider.addEventListener('input', function() {
        updateBubbleSortSizeValue();
        generateBubbleSortNewArray();
        precomputeBubbleSortSteps();
        renderBubbleSortStep(0);
    });
    bubbleSortSpeedSlider.addEventListener('input', updateBubbleSortSpeedValue);

    // Functions
    function updateBubbleSortSizeValue() {
        bubbleSortArraySize = parseInt(bubbleSortSizeSlider.value);
        bubbleSortSizeValue.textContent = bubbleSortArraySize;
    }

    function updateBubbleSortSpeedValue() {
        bubbleSortSpeed = parseInt(bubbleSortSpeedSlider.value);
        bubbleSortSpeedValue.textContent = bubbleSortSpeed;
        bubbleSortAnimationSpeed = 1000 / bubbleSortSpeed;
    }

    function generateBubbleSortNewArray() {
        stopBubbleSortAutoSort();
        
        bubbleSortArray = [];
        const maxValue = 100;
        for (let i = 0; i < bubbleSortArraySize; i++) {
            bubbleSortArray.push(Math.floor(Math.random() * maxValue) + 1);
        }

        renderBubbleSortArray();
        bubbleSortInfoPanel.innerHTML = '';
        bubbleSortSteps = [];
        bubbleSortStepDetails = [];
        bubbleSortCurrentStep = 0;
        bubbleSortCurrentPass = 0;
        bubbleSortCurrentComparison = 0;
        bubbleSortSortedIndices = [];
        bubbleSortStatusText.textContent = '';
        bubbleSortPassIndicator.textContent = '';
        if (bubbleSortCurrentStepsElement) bubbleSortCurrentStepsElement.textContent = '';
        
        // Enable/disable buttons appropriately
        bubbleSortPrevBtn.disabled = true;
        bubbleSortNextBtn.disabled = false;
        bubbleSortSortBtn.disabled = false;
        bubbleSortSortBtn.textContent = "Start Auto Sort";
    }

    function renderBubbleSortArray(highlightIndices = [], sortedIndices = [], swappedIndices = []) {
        bubbleSortArrayContainer.innerHTML = '';

        bubbleSortArray.forEach((value, index) => {
            const element = document.createElement('div');
            let className = 'bubble-sort-array-element';
            
            if (highlightIndices.includes(index)) {
                className += ' bubble-sort-current';
            } else if (swappedIndices.includes(index)) {
                className += ' bubble-sort-swapped';
            } else if (sortedIndices.includes(index)) {
                className += ' bubble-sort-sorted';
            } else {
                className += ' bubble-sort-normal';
            }
            
            element.className = className;
            element.textContent = value;
            element.dataset.index = index;
            
            const label = document.createElement('div');
            label.className = 'bubble-sort-array-label';
            label.textContent = `[${index}]`;
            element.appendChild(label);
            
            bubbleSortArrayContainer.appendChild(element);
        });
    }

    function addBubbleSortStep(description, arrayState, highlightIndices, sortedIndices, swappedIndices, passNumber, comparisonNumber) {
        bubbleSortStepDetails.push({
            description: description,
            arrayState: [...arrayState],
            highlightIndices: [...highlightIndices],
            sortedIndices: [...sortedIndices],
            swappedIndices: [...swappedIndices],
            passNumber: passNumber,
            comparisonNumber: comparisonNumber
        });
    }

    function renderBubbleSortStep(stepIndex) {
        if (bubbleSortStepDetails.length === 0) return;
        const step = bubbleSortStepDetails[stepIndex];
        bubbleSortArray = [...step.arrayState];
        renderBubbleSortArray(step.highlightIndices, step.sortedIndices, step.swappedIndices);
        bubbleSortInfoPanel.innerHTML = '';
        let activeStepDiv = null;
        for (let i = 0; i <= stepIndex; i++) {
            const s = bubbleSortStepDetails[i];
            const div = document.createElement('div');
            div.className = 'bubble-sort-step' + (i === stepIndex ? ' active' : '');
            div.textContent = s.description;
            if (i === stepIndex) activeStepDiv = div;
            bubbleSortInfoPanel.appendChild(div);
        }
        if (bubbleSortCurrentStepsElement) {
            bubbleSortCurrentStepsElement.textContent = step.description;
        }
        bubbleSortCurrentStep = stepIndex;
        // Update pass indicator if this step was part of a pass
        if (bubbleSortTotalPasses > 0) {
            updatePassIndicator(step.passNumber, bubbleSortTotalPasses);
        }
        // Update button states
        bubbleSortPrevBtn.disabled = (stepIndex === 0);
        bubbleSortNextBtn.disabled = (stepIndex === bubbleSortStepDetails.length - 1);

        // --- Auto-scroll the info panel to the active step ---
        if (activeStepDiv) {
            // Scroll so the active step is visible in the info panel
            // Use scrollIntoView with options for smooth scrolling and nearest block
            activeStepDiv.scrollIntoView({ behavior: "smooth", block: "nearest" });
        }
    }

    function goToPreviousBubbleSortStep() {
        if (bubbleSortCurrentStep <= 0) return;
        stopBubbleSortAutoSort();
        renderBubbleSortStep(bubbleSortCurrentStep - 1);
    }

    function goToNextBubbleSortStep() {
        if (bubbleSortCurrentStep >= bubbleSortStepDetails.length - 1) return;
        stopBubbleSortAutoSort();
        renderBubbleSortStep(bubbleSortCurrentStep + 1);
    }

    function stopBubbleSortAutoSort() {
        if (bubbleSortAutoSortInterval) {
            clearInterval(bubbleSortAutoSortInterval);
            bubbleSortAutoSortInterval = null;
        }
        bubbleSortIsSorting = false;
        bubbleSortSortBtn.textContent = "Start Auto Sort";
        bubbleSortGenerateBtn.disabled = false;
    }

    function toggleBubbleSortAutoSort() {
        if (bubbleSortStepDetails.length === 0) precomputeBubbleSortSteps();
        if (bubbleSortIsSorting) {
            stopBubbleSortAutoSort();
            return;
        }
        // If we're at the end of the steps, reset to beginning
        if (bubbleSortCurrentStep >= bubbleSortStepDetails.length - 1) {
            renderBubbleSortStep(0);
        }
        bubbleSortIsSorting = true;
        bubbleSortSortBtn.textContent = "Stop Auto Sort";
        bubbleSortGenerateBtn.disabled = true;
        bubbleSortPrevBtn.disabled = true;
        bubbleSortNextBtn.disabled = true;

        bubbleSortAutoSortInterval = setInterval(() => {
            if (bubbleSortCurrentStep < bubbleSortStepDetails.length - 1) {
                renderBubbleSortStep(bubbleSortCurrentStep + 1);
            } else {
                stopBubbleSortAutoSort();
                bubbleSortPrevBtn.disabled = false;
                bubbleSortNextBtn.disabled = true;
            }
        }, bubbleSortAnimationSpeed);
    }

    function updateBubbleSortStatus(text) {
        bubbleSortStatusText.textContent = text;
    }

    function updatePassIndicator(passNumber, totalPasses) {
        bubbleSortPassIndicator.textContent = `Pass ${passNumber} of ${totalPasses}`;
    }

    // Precompute all steps for navigation and auto sort
    function precomputeBubbleSortSteps() {
        bubbleSortStepDetails = [];
        let arr = [...bubbleSortArray];
        let n = arr.length;
        let sortedIndices = [];
        let totalPasses = n - 1;
        bubbleSortTotalPasses = totalPasses;

        addBubbleSortStep("Starting Bubble Sort Algorithm", arr, [], [], [], 0, 0);
        addBubbleSortStep("Bubble Sort works by repeatedly swapping adjacent elements if they are in the wrong order", arr, [], [], [], 0, 0);
        addBubbleSortStep("Each pass through the list places the next largest element in its correct position", arr, [], [], [], 0, 0);

        for (let i = 0; i < n - 1; i++) {
            let swapped = false;
            let passSortedIndices = Array.from({length: i}, (_, idx) => n - 1 - idx);
            addBubbleSortStep(`Starting pass ${i + 1}: comparing adjacent elements`, arr, [], passSortedIndices, [], i + 1, 0);
            for (let j = 0; j < n - i - 1; j++) {
                addBubbleSortStep(`Comparing elements at indices ${j} (${arr[j]}) and ${j + 1} (${arr[j + 1]})`, arr, [j, j + 1], passSortedIndices, [], i + 1, j);
                if (arr[j] > arr[j + 1]) {
                    addBubbleSortStep(`${arr[j]} > ${arr[j + 1]} - swapping elements`, arr, [], passSortedIndices, [j, j + 1], i + 1, j);
                    // Swap
                    [arr[j], arr[j + 1]] = [arr[j + 1], arr[j]];
                    swapped = true;
                    addBubbleSortStep(`Swapped: ${arr[j]} and ${arr[j + 1]}`, arr, [], passSortedIndices, [], i + 1, j);
                } else {
                    addBubbleSortStep(`${arr[j]} ≤ ${arr[j + 1]} - no swap needed`, arr, [], passSortedIndices, [], i + 1, j);
                }
            }
            let sortedIndicesAfter = Array.from({length: i + 1}, (_, idx) => n - 1 - idx);
            addBubbleSortStep(`Pass ${i + 1} complete. Element at position ${n - i - 1} (${arr[n - i - 1]}) is now in its final position`, arr, [], sortedIndicesAfter, [], i + 1, 0);
            if (!swapped) {
                addBubbleSortStep("No swaps occurred in this pass - array is now sorted", arr, [], sortedIndicesAfter, [], i + 1, 0);
                break;
            }
        }
        addBubbleSortStep("Bubble Sort completed! Array is now sorted", arr, [], Array.from({length: n}, (_, idx) => idx), [], totalPasses, 0);
    }

    // On page load, precompute steps and show first step
    precomputeBubbleSortSteps();
    renderBubbleSortStep(0);
});
</script>

