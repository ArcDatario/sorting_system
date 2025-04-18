<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .selection-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
        justify-content: center;
    }

    .selection-btn {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .selection-btn:hover {
        background-color: #2980b9;
    }

    .selection-btn:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }

    .selection-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    #selection-array-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 15px;
        padding: 20px;
        background-color: #ecf0f1;
        border-radius: 8px;
        margin-bottom: 20px;
        min-height: 200px;
    }

    .selection-card {
        width: 60px;
        height: 80px;
        background-color: #3498db;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .selection-card.comparing {
        background-color: #e74c3c;
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .selection-card.minimum {
        background-color: #f39c12;
        transform: scale(1.1);
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
    }

    .selection-card.sorted {
        background-color: #2ecc71;
        transform: scale(1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .selection-card.swapping {
        background-color: #9b59b6;
        transform: translateY(-20px);
    }

    .selection-card-index {
        position: absolute;
        top: -20px;
        font-size: 12px;
        color: #2c3e50;
    }

    #selection-steps-container {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }

    #selection-steps-container::-webkit-scrollbar {
        width: 8px;
    }

    #selection-steps-container::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    #selection-steps-container::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }

    #selection-steps-container::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }

    .selection-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }

    .selection-step.active {
        font-weight: bold;
        color: #2c3e50;
    }

    .selection-step.completed {
        color: #27ae60;
    }

    .selection-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .selection-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }

    .selection-color-box {
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    .selection-color-box.comparing {
        background-color: #e74c3c;
    }

    .selection-color-box.minimum {
        background-color: #f39c12;
    }

    .selection-color-box.sorted {
        background-color: #2ecc71;
    }

    .selection-color-box.swapping {
        background-color: #9b59b6;
    }

    .selection-swap-animation {
        animation: swapAnimation 0.5s ease-in-out;
    }

    @keyframes swapAnimation {
        0% { transform: translateY(0); }
        50% { transform: translateY(-30px); }
        100% { transform: translateY(0); }
    }

    body.dark-mode #selection-array-container {
        background-color: #333;
    }
    body.dark-mode #selection-steps-container {
        background-color: var(--background);
        color: white;
    }
    body.dark-mode .selection-card-index {
        color: #ecf0f1;
    }
</style>

<main class="main-content selection-sort" id="selection-sort" style="display:none;">
    <h1>Selection Sort Visualization</h1>
    <div class="selection-controls">
        <button id="selection-generate-btn">Generate New Array</button>
        <button id="selection-sort-btn">Selection Sort</button>
        <div class="selection-slider-container">
            <label for="selection-size-slider">Array Size:</label>
            <input type="range" id="selection-size-slider" min="5" max="15" value="8">
            <span id="selection-size-value">8</span>
        </div>
        <div class="selection-slider-container">
            <label for="selection-speed-slider">Speed:</label>
            <input type="range" id="selection-speed-slider" min="1" max="10" value="5">
            <span id="selection-speed-value">5</span>
        </div>
    </div>
    <div id="selection-visualization">
        <div id="selection-array-container"></div>
        <div id="selection-steps-container"></div>
    </div>
    <div class="selection-legend">
        <div class="selection-legend-item">
            <div class="selection-color-box comparing"></div>
            <span>Comparing</span>
        </div>
        <div class="selection-legend-item">
            <div class="selection-color-box minimum"></div>
            <span>Current Minimum</span>
        </div>
        <div class="selection-legend-item">
            <div class="selection-color-box sorted"></div>
            <span>Sorted</span>
        </div>
        <div class="selection-legend-item">
            <div class="selection-color-box swapping"></div>
            <span>Swapping</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const selectionArrayContainer = document.getElementById('selection-array-container');
        const selectionStepsContainer = document.getElementById('selection-steps-container');
        const selectionGenerateBtn = document.getElementById('selection-generate-btn');
        const selectionSortBtn = document.getElementById('selection-sort-btn');
        const selectionSizeSlider = document.getElementById('selection-size-slider');
        const selectionSizeValue = document.getElementById('selection-size-value');
        const selectionSpeedSlider = document.getElementById('selection-speed-slider');
        const selectionSpeedValue = document.getElementById('selection-speed-value');

        // Variables
        let selectionArray = [];
        let selectionArraySize = parseInt(selectionSizeSlider.value);
        let selectionSortSpeed = parseInt(selectionSpeedSlider.value);
        let isSelectionSorting = false;
        let selectionAnimationSpeed = 1000 / selectionSortSpeed;
        let selectionSteps = [];
        let currentSelectionStep = 0;

        // Initialize
        updateSelectionSizeValue();
        updateSelectionSpeedValue();
        generateNewSelectionArray();

        // Event listeners
        selectionGenerateBtn.addEventListener('click', generateNewSelectionArray);
        selectionSortBtn.addEventListener('click', startSelectionSort);
        selectionSizeSlider.addEventListener('input', updateSelectionSizeValue);
        selectionSpeedSlider.addEventListener('input', updateSelectionSpeedValue);

        // Functions
        function updateSelectionSizeValue() {
            selectionArraySize = parseInt(selectionSizeSlider.value);
            selectionSizeValue.textContent = selectionArraySize;
            generateNewSelectionArray();
        }

        function updateSelectionSpeedValue() {
            selectionSortSpeed = parseInt(selectionSpeedSlider.value);
            selectionSpeedValue.textContent = selectionSortSpeed;
            selectionAnimationSpeed = 1000 / selectionSortSpeed;
        }

        function generateNewSelectionArray() {
            if (isSelectionSorting) return;
            
            selectionArray = [];
            for (let i = 0; i < selectionArraySize; i++) {
                selectionArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
            }
            
            renderSelectionArray();
            selectionStepsContainer.innerHTML = '';
            selectionSteps = [];
            currentSelectionStep = 0;
        }

        function renderSelectionArray() {
            selectionArrayContainer.innerHTML = '';
            
            selectionArray.forEach((value, index) => {
                const card = document.createElement('div');
                card.className = 'selection-card';
                card.textContent = value;
                card.setAttribute('data-index', index);
                
                const indexLabel = document.createElement('div');
                indexLabel.className = 'selection-card-index';
                indexLabel.textContent = `[${index}]`;
                
                card.appendChild(indexLabel);
                selectionArrayContainer.appendChild(card);
            });
        }

        function addSelectionStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `selection-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            selectionStepsContainer.appendChild(step);
            selectionSteps.push(step);
            
            // Auto-scroll to the latest step
            selectionStepsContainer.scrollTop = selectionStepsContainer.scrollHeight;
        }

        function updateSelectionSteps(currentIndex) {
            selectionSteps.forEach((step, index) => {
                step.className = 'selection-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        async function startSelectionSort() {
            if (isSelectionSorting) return;
            
            isSelectionSorting = true;
            selectionGenerateBtn.disabled = true;
            selectionSortBtn.disabled = true;
            selectionStepsContainer.innerHTML = '';
            selectionSteps = [];
            currentSelectionStep = 0;
            
            // Initial steps
            addSelectionStep("Starting Selection Sort Algorithm", true);
            addSelectionStep("Find the minimum element in the unsorted part of the array");
            addSelectionStep("Swap it with the first unsorted element");
            addSelectionStep("Repeat until the array is sorted");
            
            // Create a copy of the array to sort
            const sortingArray = [...selectionArray];
            
            // Perform selection sort with visualization
            await selectionSort(sortingArray);
            
            addSelectionStep("Selection Sort completed!", false);
            updateSelectionSteps(selectionSteps.length);
            
            isSelectionSorting = false;
            selectionGenerateBtn.disabled = false;
            selectionSortBtn.disabled = false;
        }

        async function selectionSort(arr) {
            const n = arr.length;
            let sortedIndices = [];
            
            for (let i = 0; i < n - 1; i++) {
                addSelectionStep(`Starting pass ${i + 1}: Finding minimum in unsorted portion`, true);
                updateSelectionSteps(1);
                
                // Assume current index is minimum
                let minIndex = i;
                await updateSelectionVisualization(arr, [], minIndex, sortedIndices);
                
                addSelectionStep(`Assuming element at index ${i} (${arr[i]}) is the minimum`, true);
                updateSelectionSteps(1);
                await new Promise(resolve => setTimeout(resolve, selectionAnimationSpeed));
                
                // Find the minimum in the unsorted part
                for (let j = i + 1; j < n; j++) {
                    addSelectionStep(`Comparing ${arr[j]} at index ${j} with current minimum ${arr[minIndex]}`, true);
                    updateSelectionSteps(1);
                    
                    // Highlight comparison
                    await updateSelectionVisualization(arr, [j, minIndex], minIndex, sortedIndices);
                    
                    if (arr[j] < arr[minIndex]) {
                        minIndex = j;
                        addSelectionStep(`New minimum found: ${arr[minIndex]} at index ${minIndex}`, true);
                        updateSelectionSteps(1);
                        await updateSelectionVisualization(arr, [], minIndex, sortedIndices);
                    }
                }
                
                // If we found a different minimum, swap them
                if (minIndex !== i) {
                    addSelectionStep(`Swapping ${arr[i]} with minimum ${arr[minIndex]}`, true);
                    updateSelectionSteps(2);
                    
                    // Highlight swap
                    await updateSelectionVisualization(arr, [], minIndex, sortedIndices, [i, minIndex]);
                    
                    // Perform the swap
                    [arr[i], arr[minIndex]] = [arr[minIndex], arr[i]];
                    
                    // Animate the swap
                    await animateSwap(i, minIndex);
                    
                    addSelectionStep(`Swap complete: ${arr[i]} is now at index ${i}`, true);
                    updateSelectionSteps(2);
                } else {
                    addSelectionStep(`No swap needed - ${arr[i]} is already the minimum`, true);
                    updateSelectionSteps(2);
                }
                
                // Mark this position as sorted
                sortedIndices.push(i);
                await updateSelectionVisualization(arr, [], -1, sortedIndices);
            }
            
            // The last element is automatically sorted
            sortedIndices.push(n - 1);
            
            // Final visualization - all elements sorted
            await updateSelectionVisualization(arr, [], -1, sortedIndices);
            
            addSelectionStep("Array is now completely sorted", true);
            updateSelectionSteps(3);
            
            // Update the original array
            selectionArray = [...arr];
        }

        async function updateSelectionVisualization(arr, comparingIndices = [], minIndex = -1, sortedIndices = [], swapIndices = []) {
            // Update array visualization
            const cards = document.querySelectorAll('.selection-card');
            
            arr.forEach((value, index) => {
                const card = cards[index];
                card.textContent = value;
                
                // Reset classes
                card.className = 'selection-card';
                
                // Add appropriate classes
                if (comparingIndices.includes(index)) {
                    card.classList.add('comparing');
                } else if (index === minIndex) {
                    card.classList.add('minimum');
                } else if (sortedIndices.includes(index)) {
                    card.classList.add('sorted');
                }
                
                if (swapIndices.includes(index)) {
                    card.classList.add('swapping');
                }
            });
            
            // Add delay for animation
            await new Promise(resolve => setTimeout(resolve, selectionAnimationSpeed));
        }

        async function animateSwap(index1, index2) {
            const cards = document.querySelectorAll('.selection-card');
            const card1 = cards[index1];
            const card2 = cards[index2];
            
            // Add swap animation class
            card1.classList.add('selection-swap-animation');
            card2.classList.add('selection-swap-animation');
            
            // Wait for animation to complete
            await new Promise(resolve => setTimeout(resolve, 500));
            
            // Remove animation class
            card1.classList.remove('selection-swap-animation');
            card2.classList.remove('selection-swap-animation');
        }
    });
</script>