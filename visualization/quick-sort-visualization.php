<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .quick-sort-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }
    .quick-sort-button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .quick-sort-button:hover {
        background-color: #2980b9;
    }
    .quick-sort-button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
    .quick-sort-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    .quick-sort-visualization {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }
    .quick-sort-array-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
    }
    .quick-sort-array-row {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 5px;
        position: relative;
    }
    .quick-sort-array-element {
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
    .quick-sort-normal { background-color: #3498db; }
    .quick-sort-pivot { background-color: #9b59b6; transform: scale(1.1); }
    .quick-sort-comparing { background-color: #e74c3c; }
    .quick-sort-swapping { background-color: #f39c12; transform: scale(1.1); }
    .quick-sort-sorted { background-color: #2ecc71; }
    .quick-sort-partition { background-color: #1abc9c; }
    .quick-sort-array-label {
        position: absolute;
        top: -20px;
        width: 100%;
        text-align: center;
        font-size: 11px;
        color: #7f8c8d;
    }
    .quick-sort-info-panel {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }
    .quick-sort-info-panel::-webkit-scrollbar {
        width: 8px;
    }
    .quick-sort-info-panel::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }
    .quick-sort-info-panel::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }
    .quick-sort-info-panel::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }
    .quick-sort-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }
    .quick-sort-step.active {
        font-weight: bold;
        color: #2c3e50;
    }
    .quick-sort-step.completed {
        color: #27ae60;
    }
    .quick-sort-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .quick-sort-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }
    .quick-sort-color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
    .quick-sort-status-text {
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
    }
    .quick-sort-partition-highlight {
        position: relative;
        margin-bottom: 30px;
    }
    .quick-sort-partition-highlight::after {
        content: "";
        position: absolute;
        bottom: -15px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #e74c3c;
    }
    .quick-sort-partition-label {
        position: absolute;
        bottom: -25px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 12px;
        color: #e74c3c;
        font-weight: bold;
    }
    .quick-sort-recursion-level {
        text-align: center;
        margin-bottom: 10px;
        font-size: 14px;
        color: #7f8c8d;
    }

    body.dark-mode .quick-sort-array-container {
        background-color: #333;
    }
    body.dark-mode .quick-sort-info-panel {
        background-color: var(--background);
        color: white;
    }
</style>

<main class="main-content quick-sort" id="quick-sort" style="display:none;">
    <h1>Quick Sort Visualization</h1>
    <div class="quick-sort-controls">
        <button id="quick-sort-generate-btn" class="quick-sort-button">Generate New Array</button>
        <button id="quick-sort-sort-btn" class="quick-sort-button">Start Quick Sort</button>
        <div class="quick-sort-slider-container">
            <label for="quick-sort-size-slider">Array Size:</label>
            <input type="range" id="quick-sort-size-slider" min="5" max="10" value="8">
            <span id="quick-sort-size-value">8</span>
        </div>
        <div class="quick-sort-slider-container">
            <label for="quick-sort-speed-slider">Speed:</label>
            <input type="range" id="quick-sort-speed-slider" min="1" max="10" value="3">
            <span id="quick-sort-speed-value">3</span>
        </div>
    </div>
    <div class="quick-sort-visualization">
        <div id="quick-sort-recursion-level" class="quick-sort-recursion-level"></div>
        <div id="quick-sort-status-text" class="quick-sort-status-text"></div>
        <div id="quick-sort-array-display" class="quick-sort-array-container"></div>
        <div id="quick-sort-info-panel" class="quick-sort-info-panel"></div>
    </div>
    <div class="quick-sort-legend">
        <div class="quick-sort-legend-item">
            <div class="quick-sort-color-box quick-sort-pivot"></div>
            <span>Pivot</span>
        </div>
        <div class="quick-sort-legend-item">
            <div class="quick-sort-color-box quick-sort-comparing"></div>
            <span>Comparing</span>
        </div>
        <div class="quick-sort-legend-item">
            <div class="quick-sort-color-box quick-sort-swapping"></div>
            <span>Swapping</span>
        </div>
        <div class="quick-sort-legend-item">
            <div class="quick-sort-color-box quick-sort-partition"></div>
            <span>Current Partition</span>
        </div>
        <div class="quick-sort-legend-item">
            <div class="quick-sort-color-box quick-sort-sorted"></div>
            <span>Sorted</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const quickSortSizeSlider = document.getElementById('quick-sort-size-slider');
        const quickSortSizeValue = document.getElementById('quick-sort-size-value');
        const quickSortArrayDisplay = document.getElementById('quick-sort-array-display');
        const quickSortGenerateBtn = document.getElementById('quick-sort-generate-btn');
        const quickSortSortBtn = document.getElementById('quick-sort-sort-btn');
        const quickSortSpeedSlider = document.getElementById('quick-sort-speed-slider');
        const quickSortSpeedValue = document.getElementById('quick-sort-speed-value');
        const quickSortStatusText = document.getElementById('quick-sort-status-text');
        const quickSortInfoPanel = document.getElementById('quick-sort-info-panel');
        const quickSortRecursionLevel = document.getElementById('quick-sort-recursion-level');

        // Variables
        let quickSortArray = [];
        let quickSortArraySize = parseInt(quickSortSizeSlider.value);
        let quickSortSpeed = parseInt(quickSortSpeedSlider.value);
        let quickSortAnimationSpeed = 1000 / quickSortSpeed;
        let quickSortIsSorting = false;
        let quickSortSteps = [];
        let quickSortCurrentStep = 0;
        let quickSortRecursionDepth = 0;

        // Initialize
        updateQuickSortSizeValue();
        updateQuickSortSpeedValue();
        generateQuickSortNewArray();

        // Event listeners
        quickSortGenerateBtn.addEventListener('click', generateQuickSortNewArray);
        quickSortSortBtn.addEventListener('click', startQuickSort);
        quickSortSizeSlider.addEventListener('input', updateQuickSortSizeValue);
        quickSortSpeedSlider.addEventListener('input', updateQuickSortSpeedValue);

        // Functions
        function updateQuickSortSizeValue() {
            quickSortArraySize = parseInt(quickSortSizeSlider.value);
            quickSortSizeValue.textContent = quickSortArraySize;
            generateQuickSortNewArray();
        }

        function updateQuickSortSpeedValue() {
            quickSortSpeed = parseInt(quickSortSpeedSlider.value);
            quickSortSpeedValue.textContent = quickSortSpeed;
            quickSortAnimationSpeed = 1000 / quickSortSpeed;
        }

        function generateQuickSortNewArray() {
            if (quickSortIsSorting) return;

            quickSortArray = [];
            for (let i = 0; i < quickSortArraySize; i++) {
                quickSortArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
            }

            renderQuickSortArray();
            quickSortInfoPanel.innerHTML = '';
            quickSortSteps = [];
            quickSortCurrentStep = 0;
            quickSortRecursionDepth = 0;
            quickSortStatusText.textContent = '';
            quickSortRecursionLevel.textContent = '';
        }

        function renderQuickSortArray(highlightRange = null) {
            quickSortArrayDisplay.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'quick-sort-array-row';

            quickSortArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'quick-sort-array-element quick-sort-normal';
                element.textContent = value;
                element.dataset.index = index;
                
                const label = document.createElement('div');
                label.className = 'quick-sort-array-label';
                label.textContent = `[${index}]`;
                element.appendChild(label);
                
                row.appendChild(element);
            });

            quickSortArrayDisplay.appendChild(row);

            // Add partition highlight if specified
            if (highlightRange && highlightRange.start !== highlightRange.end) {
                const highlight = document.createElement('div');
                highlight.className = 'quick-sort-partition-highlight';
                
                const boxes = Array.from(quickSortArrayDisplay.querySelectorAll('.quick-sort-array-element'));
                const startBox = boxes[highlightRange.start];
                const endBox = boxes[highlightRange.end];
                
                if (startBox && endBox) {
                    const startRect = startBox.getBoundingClientRect();
                    const endRect = endBox.getBoundingClientRect();
                    const containerRect = quickSortArrayDisplay.getBoundingClientRect();
                    
                    highlight.style.position = 'absolute';
                    highlight.style.left = `${startRect.left - containerRect.left}px`;
                    highlight.style.width = `${endRect.right - startRect.left}px`;
                    highlight.style.height = `${startRect.height}px`;
                    
                    const label = document.createElement('div');
                    label.className = 'quick-sort-partition-label';
                    label.textContent = `Partition ${highlightRange.start}-${highlightRange.end}`;
                    highlight.appendChild(label);
                    
                    quickSortArrayDisplay.appendChild(highlight);
                    highlight.style.zIndex = '-1';
                }
            }
        }

        function addQuickSortStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `quick-sort-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            quickSortInfoPanel.appendChild(step);
            quickSortSteps.push(step);

            // Auto-scroll to the latest step
            quickSortInfoPanel.scrollTop = quickSortInfoPanel.scrollHeight;
        }

        function updateQuickSortSteps(currentIndex) {
            quickSortSteps.forEach((step, index) => {
                step.className = 'quick-sort-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        function updateQuickSortStatus(text) {
            quickSortStatusText.textContent = text;
        }

        function updateQuickSortRecursionLevel(depth) {
            quickSortRecursionLevel.textContent = depth > 0 ? `Recursion Level: ${depth}` : '';
        }

        async function startQuickSort() {
            if (quickSortIsSorting) return;

            quickSortIsSorting = true;
            quickSortGenerateBtn.disabled = true;
            quickSortSortBtn.disabled = true;
            quickSortInfoPanel.innerHTML = '';
            quickSortSteps = [];
            quickSortCurrentStep = 0;
            quickSortRecursionDepth = 0;

            // Initial steps
            addQuickSortStep("Starting Quick Sort Algorithm", true);
            addQuickSortStep("Select a pivot element", false);
            addQuickSortStep("Partition the array around the pivot", false);
            addQuickSortStep("Recursively sort the sub-arrays", false);

            // Create a copy of the array to sort
            const sortingArray = [...quickSortArray];

            // Perform quick sort with visualization
            await quickSort(sortingArray, 0, sortingArray.length - 1);

            // Final visualization - all elements sorted
            await updateQuickSortVisualization(sortingArray, [], [], Array.from({length: sortingArray.length}, (_, i) => i));

            addQuickSortStep("Quick Sort completed! Array is now sorted", true);
            updateQuickSortSteps(quickSortSteps.length);
            updateQuickSortStatus("Sorting completed!");

            quickSortIsSorting = false;
            quickSortGenerateBtn.disabled = false;
            quickSortSortBtn.disabled = false;
        }

        async function quickSort(arr, low, high) {
            if (low < high) {
                quickSortRecursionDepth++;
                updateQuickSortRecursionLevel(quickSortRecursionDepth);
                
                addQuickSortStep(`Starting new partition from index ${low} to ${high}`, true);
                updateQuickSortSteps(1);
                await new Promise(resolve => setTimeout(resolve, quickSortAnimationSpeed));
                
                // Visualize the current partition range
                renderQuickSortArray({start: low, end: high});
                await new Promise(resolve => setTimeout(resolve, quickSortAnimationSpeed));
                
                // Find partition index
                const pi = await partition(arr, low, high);
                
                addQuickSortStep(`Partition complete. Pivot ${arr[pi]} is now at correct position (index ${pi})`, true);
                updateQuickSortSteps(2);
                
                // Mark pivot as sorted
                await updateQuickSortVisualization(arr, [], [], [pi], pi, {start: low, end: high});
                
                // Recursively sort elements before and after partition
                addQuickSortStep(`Recursively sorting left partition (${low} to ${pi-1})`, true);
                updateQuickSortSteps(3);
                await quickSort(arr, low, pi - 1);
                
                addQuickSortStep(`Recursively sorting right partition (${pi+1} to ${high})`, true);
                updateQuickSortSteps(3);
                await quickSort(arr, pi + 1, high);
                
                quickSortRecursionDepth--;
                updateQuickSortRecursionLevel(quickSortRecursionDepth);
            } else if (low === high) {
                // Single element is already sorted
                addQuickSortStep(`Single element at index ${low} is already sorted`, true);
                updateQuickSortSteps(1);
                await updateQuickSortVisualization(arr, [], [], [low], low);
            }
        }

        async function partition(arr, low, high) {
            // Choose the last element as pivot
            const pivot = arr[high];
            let i = low - 1; // Index of smaller element
            
            addQuickSortStep(`Selected pivot: ${pivot} (at index ${high})`, true);
            updateQuickSortSteps(1);
            await updateQuickSortVisualization(arr, [], [], [], high, {start: low, end: high});
            
            for (let j = low; j < high; j++) {
                addQuickSortStep(`Comparing element ${arr[j]} (index ${j}) with pivot ${pivot}`, true);
                updateQuickSortSteps(1);
                
                // Highlight elements being compared
                await updateQuickSortVisualization(arr, [j, high], [], [], high, {start: low, end: high});
                
                // If current element is smaller than the pivot
                if (arr[j] < pivot) {
                    i++; // Increment index of smaller element
                    
                    if (i !== j) {
                        addQuickSortStep(`${arr[j]} < ${pivot}, swapping with element at index ${i} (${arr[i]})`, true);
                        updateQuickSortSteps(1);
                        
                        // Highlight elements being swapped
                        await updateQuickSortVisualization(arr, [], [i, j], [], high, {start: low, end: high});
                        
                        // Swap arr[i] and arr[j]
                        [arr[i], arr[j]] = [arr[j], arr[i]];
                        
                        // Show the swap result
                        await updateQuickSortVisualization(arr, [], [i, j], [], high, {start: low, end: high});
                    } else {
                        addQuickSortStep(`${arr[j]} < ${pivot} but no swap needed (i = j = ${i})`, true);
                        updateQuickSortSteps(1);
                        await new Promise(resolve => setTimeout(resolve, quickSortAnimationSpeed));
                    }
                } else {
                    addQuickSortStep(`${arr[j]} >= ${pivot}, moving to next element`, true);
                    updateQuickSortSteps(1);
                    await new Promise(resolve => setTimeout(resolve, quickSortAnimationSpeed));
                }
            }
            
            // Swap the pivot element with the element at i+1
            addQuickSortStep(`Placing pivot ${pivot} in correct position at index ${i+1}`, true);
            updateQuickSortSteps(1);
            await updateQuickSortVisualization(arr, [], [i+1, high], [], high, {start: low, end: high});
            
            [arr[i+1], arr[high]] = [arr[high], arr[i+1]];
            
            // Show the final swap
            await updateQuickSortVisualization(arr, [], [i+1, high], [], i+1, {start: low, end: high});
            
            // Return the partition index
            return i + 1;
        }

        async function updateQuickSortVisualization(arr, comparingIndices = [], swappingIndices = [], sortedIndices = [], pivotIndex = -1, highlightRange = null) {
            const boxes = document.querySelectorAll('#quick-sort-array-display .quick-sort-array-element');
            
            // Clear any existing partition highlights
            const existingHighlights = document.querySelectorAll('.quick-sort-partition-highlight');
            existingHighlights.forEach(el => el.remove());
            
            // Add new partition highlight if specified
            if (highlightRange && highlightRange.start !== highlightRange.end) {
                const highlight = document.createElement('div');
                highlight.className = 'quick-sort-partition-highlight';
                
                const startBox = boxes[highlightRange.start];
                const endBox = boxes[highlightRange.end];
                const containerRect = quickSortArrayDisplay.getBoundingClientRect();
                const startRect = startBox.getBoundingClientRect();
                const endRect = endBox.getBoundingClientRect();
                
                highlight.style.position = 'absolute';
                highlight.style.left = `${startRect.left - containerRect.left}px`;
                highlight.style.width = `${endRect.right - startRect.left}px`;
                highlight.style.height = `${startRect.height}px`;
                
                const label = document.createElement('div');
                label.className = 'quick-sort-partition-label';
                label.textContent = `Partition ${highlightRange.start}-${highlightRange.end}`;
                highlight.appendChild(label);
                
                quickSortArrayDisplay.appendChild(highlight);
                highlight.style.zIndex = '-1';
            }
            
            arr.forEach((value, index) => {
                if (index >= boxes.length) return;
                
                const box = boxes[index];
                box.textContent = value;
                
                // Reset classes
                box.className = 'quick-sort-array-element';
                
                // Pivot has highest priority
                if (index === pivotIndex) {
                    box.classList.add('quick-sort-pivot');
                } 
                // Then sorted elements
                else if (sortedIndices.includes(index)) {
                    box.classList.add('quick-sort-sorted');
                }
                // Then swapping elements
                else if (swappingIndices.includes(index)) {
                    box.classList.add('quick-sort-swapping');
                }
                // Then comparing elements
                else if (comparingIndices.includes(index)) {
                    box.classList.add('quick-sort-comparing');
                }
                // Then partition elements
                else if (highlightRange && index >= highlightRange.start && index <= highlightRange.end) {
                    box.classList.add('quick-sort-partition');
                }
                // Default
                else {
                    box.classList.add('quick-sort-normal');
                }
            });
            
            // Add delay for animation
            await new Promise(resolve => setTimeout(resolve, quickSortAnimationSpeed));
        }
    });
</script>