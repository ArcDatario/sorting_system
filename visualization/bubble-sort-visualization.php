<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
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
        margin-top: 20px;
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
        margin: 10px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
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
</style>

<main class="main-content bubble-sort" id="bubble-sort" style="display:block;">
    <h1>Bubble Sort Visualization</h1>
    <div class="bubble-sort-controls">
        <button id="bubble-sort-generate-btn" class="bubble-sort-button">Generate New Array</button>
        <button id="bubble-sort-sort-btn" class="bubble-sort-button">Start Bubble Sort</button>
        <div class="bubble-sort-slider-container">
            <label for="bubble-sort-size-slider">Array Size:</label>
            <input type="range" id="bubble-sort-size-slider" min="5" max="15" value="8">
            <span id="bubble-sort-size-value">8</span>
        </div>
        <div class="bubble-sort-slider-container">
            <label for="bubble-sort-speed-slider">Speed:</label>
            <input type="range" id="bubble-sort-speed-slider" min="1" max="10" value="5">
            <span id="bubble-sort-speed-value">5</span>
        </div>
    </div>
    <div class="bubble-sort-visualization">
        <div id="bubble-sort-status-text" class="bubble-sort-status-text"></div>
        <div id="bubble-sort-pass-indicator" class="bubble-sort-pass-indicator"></div>
        
        <div class="bubble-sort-array-container">
            <div id="bubble-sort-array" class="bubble-sort-array-row"></div>
        </div>
        
        <div id="bubble-sort-info-panel" class="bubble-sort-info-panel"></div>
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
        const bubbleSortSpeedSlider = document.getElementById('bubble-sort-speed-slider');
        const bubbleSortSpeedValue = document.getElementById('bubble-sort-speed-value');
        const bubbleSortStatusText = document.getElementById('bubble-sort-status-text');
        const bubbleSortInfoPanel = document.getElementById('bubble-sort-info-panel');
        const bubbleSortPassIndicator = document.getElementById('bubble-sort-pass-indicator');

        // Variables
        let bubbleSortArray = [];
        let bubbleSortArraySize = parseInt(bubbleSortSizeSlider.value);
        let bubbleSortSpeed = parseInt(bubbleSortSpeedSlider.value);
        let bubbleSortAnimationSpeed = 1000 / bubbleSortSpeed;
        let bubbleSortIsSorting = false;
        let bubbleSortSteps = [];
        let bubbleSortCurrentStep = 0;

        // Initialize
        updateBubbleSortSizeValue();
        updateBubbleSortSpeedValue();
        generateBubbleSortNewArray();

        // Event listeners
        bubbleSortGenerateBtn.addEventListener('click', generateBubbleSortNewArray);
        bubbleSortSortBtn.addEventListener('click', startBubbleSort);
        bubbleSortSizeSlider.addEventListener('input', updateBubbleSortSizeValue);
        bubbleSortSpeedSlider.addEventListener('input', updateBubbleSortSpeedValue);

        // Functions
        function updateBubbleSortSizeValue() {
            bubbleSortArraySize = parseInt(bubbleSortSizeSlider.value);
            bubbleSortSizeValue.textContent = bubbleSortArraySize;
            generateBubbleSortNewArray();
        }

        function updateBubbleSortSpeedValue() {
            bubbleSortSpeed = parseInt(bubbleSortSpeedSlider.value);
            bubbleSortSpeedValue.textContent = bubbleSortSpeed;
            bubbleSortAnimationSpeed = 1000 / bubbleSortSpeed;
        }

        function generateBubbleSortNewArray() {
            if (bubbleSortIsSorting) return;

            bubbleSortArray = [];
            const maxValue = 100;
            for (let i = 0; i < bubbleSortArraySize; i++) {
                bubbleSortArray.push(Math.floor(Math.random() * maxValue) + 1);
            }

            renderBubbleSortArray();
            bubbleSortInfoPanel.innerHTML = '';
            bubbleSortSteps = [];
            bubbleSortCurrentStep = 0;
            bubbleSortStatusText.textContent = '';
            bubbleSortPassIndicator.textContent = '';
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

        function addBubbleSortStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `bubble-sort-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            bubbleSortInfoPanel.appendChild(step);
            bubbleSortSteps.push(step);

            // Auto-scroll to the latest step
            bubbleSortInfoPanel.scrollTop = bubbleSortInfoPanel.scrollHeight;
        }

        function updateBubbleSortSteps(currentIndex) {
            bubbleSortSteps.forEach((step, index) => {
                step.className = 'bubble-sort-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        function updateBubbleSortStatus(text) {
            bubbleSortStatusText.textContent = text;
        }

        function updatePassIndicator(passNumber, totalPasses) {
            bubbleSortPassIndicator.textContent = `Pass ${passNumber} of ${totalPasses}`;
        }

        async function startBubbleSort() {
            if (bubbleSortIsSorting) return;

            bubbleSortIsSorting = true;
            bubbleSortGenerateBtn.disabled = true;
            bubbleSortSortBtn.disabled = true;
            bubbleSortInfoPanel.innerHTML = '';
            bubbleSortSteps = [];
            bubbleSortCurrentStep = 0;

            // Initial steps
            addBubbleSortStep("Starting Bubble Sort Algorithm", true);
            addBubbleSortStep("Bubble Sort works by repeatedly swapping adjacent elements if they are in the wrong order", false);
            addBubbleSortStep("Each pass through the list places the next largest element in its correct position", false);

            let n = bubbleSortArray.length;
            let totalPasses = n - 1;
            let swapped;
            
            for (let i = 0; i < n - 1; i++) {
                updatePassIndicator(i + 1, totalPasses);
                swapped = false;
                
                addBubbleSortStep(`Starting pass ${i + 1}: comparing adjacent elements`, true);
                updateBubbleSortSteps(3 + i * 2);
                
                for (let j = 0; j < n - i - 1; j++) {
                    // Highlight the two elements being compared
                    addBubbleSortStep(`Comparing elements at indices ${j} (${bubbleSortArray[j]}) and ${j + 1} (${bubbleSortArray[j + 1]})`, true);
                    renderBubbleSortArray([j, j + 1], Array.from({length: i}, (_, idx) => n - 1 - idx));
                    await new Promise(resolve => setTimeout(resolve, bubbleSortAnimationSpeed / 2));
                    
                    if (bubbleSortArray[j] > bubbleSortArray[j + 1]) {
                        // Swap the elements
                        addBubbleSortStep(`${bubbleSortArray[j]} > ${bubbleSortArray[j + 1]} - swapping elements`, true);
                        
                        // Show swap animation
                        renderBubbleSortArray([], Array.from({length: i}, (_, idx) => n - 1 - idx), [j, j + 1]);
                        await new Promise(resolve => setTimeout(resolve, bubbleSortAnimationSpeed / 2));
                        
                        // Perform the swap
                        [bubbleSortArray[j], bubbleSortArray[j + 1]] = [bubbleSortArray[j + 1], bubbleSortArray[j]];
                        swapped = true;
                        
                        // Show array after swap
                        renderBubbleSortArray([], Array.from({length: i}, (_, idx) => n - 1 - idx));
                        await new Promise(resolve => setTimeout(resolve, bubbleSortAnimationSpeed));
                    } else {
                        addBubbleSortStep(`${bubbleSortArray[j]} ≤ ${bubbleSortArray[j + 1]} - no swap needed`, true);
                        await new Promise(resolve => setTimeout(resolve, bubbleSortAnimationSpeed));
                    }
                }
                
                // Mark the last element as sorted after each pass
                addBubbleSortStep(`Pass ${i + 1} complete. Element at position ${n - i - 1} (${bubbleSortArray[n - i - 1]}) is now in its final position`, true);
                renderBubbleSortArray([], Array.from({length: i + 1}, (_, idx) => n - 1 - idx));
                await new Promise(resolve => setTimeout(resolve, bubbleSortAnimationSpeed));
                
                if (!swapped) {
                    addBubbleSortStep("No swaps occurred in this pass - array is now sorted", true);
                    break;
                }
            }

            // Final step
            addBubbleSortStep("Bubble Sort completed! Array is now sorted", true);
            updateBubbleSortStatus("Sorting completed!");
            updatePassIndicator(totalPasses, totalPasses);
            
            // Show final sorted array
            renderBubbleSortArray([], Array.from({length: bubbleSortArray.length}, (_, idx) => idx));

            bubbleSortIsSorting = false;
            bubbleSortGenerateBtn.disabled = false;
            bubbleSortSortBtn.disabled = false;
        }
    });
</script>