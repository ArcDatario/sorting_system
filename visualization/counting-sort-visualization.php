<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .counting-sort-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }
    .counting-sort-button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .counting-sort-button:hover {
        background-color: #2980b9;
    }
    .counting-sort-button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
    .counting-sort-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    .counting-sort-visualization {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 20px;
    }
    .counting-sort-array-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
    }
    .counting-sort-array-row {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 5px;
    }
    .counting-sort-array-element {
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
    .counting-sort-normal { background-color: #3498db; }
    .counting-sort-current { background-color: #e74c3c; transform: scale(1.1); }
    .counting-sort-counted { background-color: #f39c12; }
    .counting-sort-sorted { background-color: #2ecc71; }
    .counting-sort-count-array { background-color: #9b59b6; }
    .counting-sort-array-label {
        position: absolute;
        top: -20px;
        width: 100%;
        text-align: center;
        font-size: 11px;
        color: #7f8c8d;
    }
    .counting-sort-info-panel {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }
    .counting-sort-info-panel::-webkit-scrollbar {
        width: 8px;
    }
    .counting-sort-info-panel::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }
    .counting-sort-info-panel::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }
    .counting-sort-info-panel::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }
    .counting-sort-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }
    .counting-sort-step.active {
        font-weight: bold;
        color: #2c3e50;
    }
    .counting-sort-step.completed {
        color: #27ae60;
    }
    .counting-sort-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .counting-sort-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }
    .counting-sort-color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
    .counting-sort-status-text {
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
    }
    .counting-sort-count-array-container {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }
    .counting-sort-count-element {
        width: 50px;
        height: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-weight: bold;
        background-color: #9b59b6;
        color: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .counting-sort-count-label {
        font-size: 10px;
        margin-top: 2px;
    }
    .counting-sort-count-value {
        font-size: 16px;
    }
    .counting-sort-phase-title {
        text-align: center;
        font-weight: bold;
        margin: 10px 0;
        color: #2c3e50;
    }
    .counting-sort-visual-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .counting-sort-arrow {
        font-size: 24px;
        color: #7f8c8d;
        padding: 0 10px;
    }

    body.dark-mode .counting-sort-array-container {
        background-color: #333;
    }
    body.dark-mode .counting-sort-info-panel {
        background-color: var(--background);
        color: white;
    }
</style>

<main class="main-content counting-sort" id="counting-sort" style="display:block;">
    <h1>Counting Sort Visualization</h1>
    <div class="counting-sort-controls">
        <button id="counting-sort-generate-btn" class="counting-sort-button">Generate New Array</button>
        <button id="counting-sort-sort-btn" class="counting-sort-button">Start Counting Sort</button>
        <div class="counting-sort-slider-container">
            <label for="counting-sort-size-slider">Array Size:</label>
            <input type="range" id="counting-sort-size-slider" min="3" max="6" value="4">
            <span id="counting-sort-size-value">8</span>
        </div>
        <div class="counting-sort-slider-container">
            <label for="counting-sort-speed-slider">Speed:</label>
            <input type="range" id="counting-sort-speed-slider" min="1" max="10" value="2">
            <span id="counting-sort-speed-value">2</span>
        </div>
    </div>
    <div class="counting-sort-visualization">
        <div id="counting-sort-status-text" class="counting-sort-status-text"></div>
        
        <div class="counting-sort-phase-title">Input Array</div>
        <div id="counting-sort-input-array" class="counting-sort-array-container"></div>
        
        <div class="counting-sort-phase-title">Count Array</div>
        <div id="counting-sort-count-array" class="counting-sort-count-array-container"></div>
        
        <div class="counting-sort-phase-title">Prefix Sum (Count Array after accumulation)</div>
        <div id="counting-sort-prefix-array" class="counting-sort-count-array-container"></div>
        
        <div class="counting-sort-phase-title">Output Array (Building)</div>
        <div id="counting-sort-output-array" class="counting-sort-array-container"></div>
        
        <div id="counting-sort-info-panel" class="counting-sort-info-panel"></div>
    </div>
    <div class="counting-sort-legend">
        <div class="counting-sort-legend-item">
            <div class="counting-sort-color-box counting-sort-current"></div>
            <span>Current Element</span>
        </div>
        <div class="counting-sort-legend-item">
            <div class="counting-sort-color-box counting-sort-counted"></div>
            <span>Counted</span>
        </div>
        <div class="counting-sort-legend-item">
            <div class="counting-sort-color-box counting-sort-count-array"></div>
            <span>Count Array</span>
        </div>
        <div class="counting-sort-legend-item">
            <div class="counting-sort-color-box counting-sort-sorted"></div>
            <span>Sorted</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const countingSortSizeSlider = document.getElementById('counting-sort-size-slider');
        const countingSortSizeValue = document.getElementById('counting-sort-size-value');
        const countingSortInputArray = document.getElementById('counting-sort-input-array');
        const countingSortCountArray = document.getElementById('counting-sort-count-array');
        const countingSortPrefixArray = document.getElementById('counting-sort-prefix-array');
        const countingSortOutputArray = document.getElementById('counting-sort-output-array');
        const countingSortGenerateBtn = document.getElementById('counting-sort-generate-btn');
        const countingSortSortBtn = document.getElementById('counting-sort-sort-btn');
        const countingSortSpeedSlider = document.getElementById('counting-sort-speed-slider');
        const countingSortSpeedValue = document.getElementById('counting-sort-speed-value');
        const countingSortStatusText = document.getElementById('counting-sort-status-text');
        const countingSortInfoPanel = document.getElementById('counting-sort-info-panel');

        // Variables
        let countingSortArray = [];
        let countingSortArraySize = parseInt(countingSortSizeSlider.value);
        let countingSortSpeed = parseInt(countingSortSpeedSlider.value);
        let countingSortAnimationSpeed = 1000 / countingSortSpeed;
        let countingSortIsSorting = false;
        let countingSortSteps = [];
        let countingSortCurrentStep = 0;
        let countingSortMaxValue = 15; // Maximum value in the array (for count array size)
        let countArray = [];
        let prefixArray = [];
        let outputArray = [];

        // Initialize
        updateCountingSortSizeValue();
        updateCountingSortSpeedValue();
        generateCountingSortNewArray();

        // Event listeners
        countingSortGenerateBtn.addEventListener('click', generateCountingSortNewArray);
        countingSortSortBtn.addEventListener('click', startCountingSort);
        countingSortSizeSlider.addEventListener('input', updateCountingSortSizeValue);
        countingSortSpeedSlider.addEventListener('input', updateCountingSortSpeedValue);

        // Functions
        function updateCountingSortSizeValue() {
            countingSortArraySize = parseInt(countingSortSizeSlider.value);
            countingSortSizeValue.textContent = countingSortArraySize;
            generateCountingSortNewArray();
        }

        function updateCountingSortSpeedValue() {
            countingSortSpeed = parseInt(countingSortSpeedSlider.value);
            countingSortSpeedValue.textContent = countingSortSpeed;
            countingSortAnimationSpeed = 1000 / countingSortSpeed;
        }

        function generateCountingSortNewArray() {
            if (countingSortIsSorting) return;

            countingSortArray = [];
            for (let i = 0; i < countingSortArraySize; i++) {
                countingSortArray.push(Math.floor(Math.random() * countingSortMaxValue) + 1); // Values between 1-countingSortMaxValue
            }

            renderCountingSortInputArray();
            countingSortCountArray.innerHTML = '';
            countingSortPrefixArray.innerHTML = '';
            countingSortOutputArray.innerHTML = '';
            countingSortInfoPanel.innerHTML = '';
            countingSortSteps = [];
            countingSortCurrentStep = 0;
            countingSortStatusText.textContent = '';
        }

        function renderCountingSortInputArray(highlightIndex = -1) {
            countingSortInputArray.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'counting-sort-array-row';

            countingSortArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = `counting-sort-array-element ${index === highlightIndex ? 'counting-sort-current' : 'counting-sort-normal'}`;
                element.textContent = value;
                element.dataset.index = index;
                
                const label = document.createElement('div');
                label.className = 'counting-sort-array-label';
                label.textContent = `[${index}]`;
                element.appendChild(label);
                
                row.appendChild(element);
            });

            countingSortInputArray.appendChild(row);
        }

        function renderCountingSortCountArray(countArray, highlightIndex = -1) {
            countingSortCountArray.innerHTML = '';

            for (let i = 0; i <= countingSortMaxValue; i++) {
                const element = document.createElement('div');
                element.className = 'counting-sort-count-element';
                if (i === highlightIndex) {
                    element.style.transform = 'scale(1.1)';
                    element.style.backgroundColor = '#e74c3c';
                }
                
                const label = document.createElement('div');
                label.className = 'counting-sort-count-label';
                label.textContent = i;
                
                const value = document.createElement('div');
                value.className = 'counting-sort-count-value';
                value.textContent = countArray[i] || 0;
                
                element.appendChild(label);
                element.appendChild(value);
                countingSortCountArray.appendChild(element);
            }
        }

        function renderCountingSortPrefixArray(prefixArray, highlightIndex = -1) {
            countingSortPrefixArray.innerHTML = '';

            for (let i = 0; i <= countingSortMaxValue; i++) {
                const element = document.createElement('div');
                element.className = 'counting-sort-count-element';
                if (i === highlightIndex) {
                    element.style.transform = 'scale(1.1)';
                    element.style.backgroundColor = '#e74c3c';
                }
                
                const label = document.createElement('div');
                label.className = 'counting-sort-count-label';
                label.textContent = i;
                
                const value = document.createElement('div');
                value.className = 'counting-sort-count-value';
                value.textContent = prefixArray[i] || 0;
                
                element.appendChild(label);
                element.appendChild(value);
                countingSortPrefixArray.appendChild(element);
            }
        }

        function renderCountingSortOutputArray(outputArray, highlightIndex = -1, sortedIndices = []) {
            countingSortOutputArray.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'counting-sort-array-row';

            outputArray.forEach((value, index) => {
                const element = document.createElement('div');
                let className = 'counting-sort-array-element';
                
                if (index === highlightIndex) {
                    className += ' counting-sort-current';
                } else if (sortedIndices.includes(index)) {
                    className += ' counting-sort-sorted';
                } else if (value !== undefined) {
                    className += ' counting-sort-counted';
                } else {
                    className += ' counting-sort-normal';
                }
                
                element.className = className;
                element.textContent = value !== undefined ? value : '';
                element.dataset.index = index;
                
                const label = document.createElement('div');
                label.className = 'counting-sort-array-label';
                label.textContent = `[${index}]`;
                element.appendChild(label);
                
                row.appendChild(element);
            });

            countingSortOutputArray.appendChild(row);
        }

        function addCountingSortStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `counting-sort-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            countingSortInfoPanel.appendChild(step);
            countingSortSteps.push(step);

            // Auto-scroll to the latest step
            countingSortInfoPanel.scrollTop = countingSortInfoPanel.scrollHeight;
        }

        function updateCountingSortSteps(currentIndex) {
            countingSortSteps.forEach((step, index) => {
                step.className = 'counting-sort-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        function updateCountingSortStatus(text) {
            countingSortStatusText.textContent = text;
        }

        async function startCountingSort() {
            if (countingSortIsSorting) return;

            countingSortIsSorting = true;
            countingSortGenerateBtn.disabled = true;
            countingSortSortBtn.disabled = true;
            countingSortInfoPanel.innerHTML = '';
            countingSortSteps = [];
            countingSortCurrentStep = 0;

            // Initialize count array
            countArray = new Array(countingSortMaxValue + 1).fill(0);
            prefixArray = new Array(countingSortMaxValue + 1).fill(0);
            outputArray = new Array(countingSortArray.length);

            // Initial steps
            addCountingSortStep("Starting Counting Sort Algorithm", true);
            addCountingSortStep("Step 1: Initialize count array with zeros", false);
            addCountingSortStep("Step 2: Count occurrences of each number", false);
            addCountingSortStep("Step 3: Compute prefix sums (cumulative counts)", false);
            addCountingSortStep("Step 4: Build output array using prefix sums", false);
            addCountingSortStep("Step 5: Copy output back to original array", false);

            // Step 1: Show initialized count array
            addCountingSortStep("Count array initialized with zeros", true);
            updateCountingSortSteps(1);
            renderCountingSortCountArray(countArray);
            await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));

            // Step 2: Count occurrences
            addCountingSortStep("Counting occurrences of each number in input array", true);
            updateCountingSortSteps(2);
            
            for (let i = 0; i < countingSortArray.length; i++) {
                const value = countingSortArray[i];
                addCountingSortStep(`Found ${value} at index ${i}, incrementing count[${value}]`, true);
                
                // Highlight current element in input array
                renderCountingSortInputArray(i);
                
                // Update count array
                countArray[value]++;
                renderCountingSortCountArray(countArray, value);
                
                await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
            }

            // Step 3: Compute prefix sums
            addCountingSortStep("Computing prefix sums (cumulative counts)", true);
            updateCountingSortSteps(3);
            
            prefixArray[0] = countArray[0];
            addCountingSortStep(`prefix[0] = count[0] = ${prefixArray[0]}`, true);
            renderCountingSortPrefixArray(prefixArray, 0);
            await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
            
            for (let i = 1; i <= countingSortMaxValue; i++) {
                prefixArray[i] = prefixArray[i - 1] + countArray[i];
                addCountingSortStep(`prefix[${i}] = prefix[${i-1}] + count[${i}] = ${prefixArray[i]}`, true);
                renderCountingSortPrefixArray(prefixArray, i);
                await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
            }

            // Step 4: Build output array
            addCountingSortStep("Building output array using prefix sums", true);
            updateCountingSortSteps(4);
            
            for (let i = countingSortArray.length - 1; i >= 0; i--) {
                const value = countingSortArray[i];
                const position = prefixArray[value] - 1;
                
                addCountingSortStep(`Placing ${value} from input[${i}] at output[${position}]`, true);
                
                // Highlight current element in input array
                renderCountingSortInputArray(i);
                
                // Highlight position in prefix array
                renderCountingSortPrefixArray(prefixArray, value);
                
                // Update output array
                outputArray[position] = value;
                prefixArray[value]--;
                
                // Show the output array being built
                renderCountingSortOutputArray(outputArray, position, []);
                
                await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
                
                // Mark this position as sorted
                renderCountingSortOutputArray(outputArray, -1, [position]);
                await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
            }

            // Step 5: Copy back to original array
            addCountingSortStep("Copying sorted output back to original array", true);
            updateCountingSortSteps(5);
            
            for (let i = 0; i < outputArray.length; i++) {
                countingSortArray[i] = outputArray[i];
                addCountingSortStep(`Copying ${outputArray[i]} from output[${i}] to input[${i}]`, true);
                
                renderCountingSortInputArray();
                renderCountingSortOutputArray(outputArray, -1, Array.from({length: i+1}, (_, idx) => idx));
                await new Promise(resolve => setTimeout(resolve, countingSortAnimationSpeed));
            }

            // Final step
            addCountingSortStep("Counting Sort completed! Array is now sorted", true);
            updateCountingSortSteps(6);
            updateCountingSortStatus("Sorting completed!");
            
            // Show final sorted array
            renderCountingSortInputArray();
            renderCountingSortOutputArray(outputArray, -1, Array.from({length: outputArray.length}, (_, idx) => idx));

            countingSortIsSorting = false;
            countingSortGenerateBtn.disabled = false;
            countingSortSortBtn.disabled = false;
        }
    });
</script>