
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

    .quick-current-steps{
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
<main class="main-content quick-sort" id="quick-sort" style="display:none;">
    <h1>Quick Sort Visualization</h1>
   
    <div class="quick-sort-visualization">
        <div id="quick-sort-recursion-level" class="quick-sort-recursion-level"></div>
        <div id="quick-sort-status-text" class="quick-sort-status-text"></div>
        <div id="quick-sort-array-display" class="quick-sort-array-container"></div>

        <div class="quick-current-steps"></div>

        <div class="quick-sort-controls">
            <button id="quick-sort-generate-btn" class="quick-sort-button">Generate New Array</button>
            <button id="quick-sort-sort-btn" class="quick-sort-button">Auto Sort</button>
            <button id="quick-sort-prev-btn" class="quick-sort-button">Prev</button>
            <button id="quick-sort-next-btn" class="quick-sort-button">Next</button>
            <div class="quick-sort-slider-container">
                <label for="quick-sort-size-slider">Array Size:</label>
                <input type="range" id="quick-sort-size-slider" min="5" max="10" value="8">
                <span id="quick-sort-size-value">8</span>
            </div>
            <div class="quick-sort-slider-container">
                <label for="quick-sort-speed-slider">Speed:</label>
                <input type="range" id="quick-sort-speed-slider" min="1" max="10" value="1">
                <span id="quick-sort-speed-value">1</span>
            </div>
        </div>

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
    const quickSortPrevBtn = document.getElementById('quick-sort-prev-btn');
    const quickSortNextBtn = document.getElementById('quick-sort-next-btn');
    const quickSortSpeedSlider = document.getElementById('quick-sort-speed-slider');
    const quickSortSpeedValue = document.getElementById('quick-sort-speed-value');
    const quickSortStatusText = document.getElementById('quick-sort-status-text');
    const quickSortInfoPanel = document.getElementById('quick-sort-info-panel');
    const quickSortRecursionLevel = document.getElementById('quick-sort-recursion-level');
    const quickCurrentSteps = document.querySelector('.quick-current-steps');

    // Variables
    let quickSortArray = [];
    let quickSortArraySize = parseInt(quickSortSizeSlider.value);
    let quickSortSpeed = parseInt(quickSortSpeedSlider.value);
    let quickSortAnimationSpeed = 1000 / quickSortSpeed;
    let quickSortIsSorting = false;
    let quickSortSteps = [];
    let quickSortCurrentStep = 0;
    let quickSortRecursionDepth = 0;

    // Step-by-step variables
    let stepList = [];
    let stepIndex = 0;
    let autoSortActive = false;
    let autoSortTimeout = null;

    // Step structure: { array: [...], comparing: [...], swapping: [...], sorted: [...], pivot: index, description: string, recursionDepth: int }

    // Initialize
    updateQuickSortSizeValue();
    updateQuickSortSpeedValue();
    generateQuickSortNewArray();

    // Event listeners
    quickSortGenerateBtn.addEventListener('click', generateQuickSortNewArray);
    quickSortSortBtn.addEventListener('click', startAutoSort);
    quickSortPrevBtn.addEventListener('click', prevStep);
    quickSortNextBtn.addEventListener('click', nextStep);
    quickSortSizeSlider.addEventListener('input', updateQuickSortSizeValue);
    quickSortSpeedSlider.addEventListener('input', updateQuickSortSpeedValue);

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
        stopAutoSort();
        quickSortArray = [];
        for (let i = 0; i < quickSortArraySize; i++) {
            quickSortArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
        }
        renderQuickSortArray(quickSortArray);
        quickSortInfoPanel.innerHTML = '';
        quickSortSteps = [];
        quickSortCurrentStep = 0;
        quickSortRecursionDepth = 0;
        quickSortStatusText.textContent = '';
        quickSortRecursionLevel.textContent = '';
        quickCurrentSteps.textContent = '';
        stepList = [];
        stepIndex = 0;
        quickSortIsSorting = false;
        autoSortActive = false;
        quickSortSortBtn.disabled = false;
    }

    function renderQuickSortArray(arr, comparingIndices = [], swappingIndices = [], sortedIndices = [], pivotIndex = -1) {
        quickSortArrayDisplay.innerHTML = '';
        const row = document.createElement('div');
        row.className = 'quick-sort-array-row';

        arr.forEach((value, index) => {
            const element = document.createElement('div');
            element.className = 'quick-sort-array-element quick-sort-normal';
            element.textContent = value;
            element.dataset.index = index;

            const label = document.createElement('div');
            label.className = 'quick-sort-array-label';
            label.textContent = `[${index}]`;
            element.appendChild(label);

            // Coloring
            if (index === pivotIndex) {
                element.classList.add('quick-sort-pivot');
            } else if (sortedIndices && sortedIndices.includes(index)) {
                element.classList.add('quick-sort-sorted');
            } else if (swappingIndices && swappingIndices.includes(index)) {
                element.classList.add('quick-sort-swapping');
            } else if (comparingIndices && comparingIndices.includes(index)) {
                element.classList.add('quick-sort-comparing');
            } else {
                element.classList.add('quick-sort-normal');
            }

            row.appendChild(element);
        });

        quickSortArrayDisplay.appendChild(row);
    }

    // Step recording logic
    function recordStep({arr, comparing = [], swapping = [], sorted = [], pivot = -1, description = '', recursionDepth = 0}) {
        // Deep copy array for step
        stepList.push({
            array: arr.slice(),
            comparing: comparing.slice(),
            swapping: swapping.slice(),
            sorted: sorted.slice(),
            pivot,
            description,
            recursionDepth
        });
    }

    // Step-by-step navigation
    function showStep(idx) {
        if (idx < 0 || idx >= stepList.length) return;
        const step = stepList[idx];
        renderQuickSortArray(step.array, step.comparing, step.swapping, step.sorted, step.pivot);
        quickSortRecursionLevel.textContent = step.recursionDepth > 0 ? `Recursion Level: ${step.recursionDepth}` : '';
        quickCurrentSteps.textContent = step.description || '';
        // Info panel: show all steps up to current
        quickSortInfoPanel.innerHTML = '';
        for (let i = 0; i <= idx; i++) {
            const div = document.createElement('div');
            div.className = 'quick-sort-step' + (i === idx ? ' active' : '');
            div.textContent = stepList[i].description;
            quickSortInfoPanel.appendChild(div);
        }
        stepIndex = idx;
        // Restore auto-scroll to latest step
        quickSortInfoPanel.scrollTop = quickSortInfoPanel.scrollHeight;
    }

    function nextStep() {
        stopAutoSort();
        if (stepIndex < stepList.length - 1) {
            showStep(stepIndex + 1);
        }
    }

    function prevStep() {
        stopAutoSort();
        if (stepIndex > 0) {
            showStep(stepIndex - 1);
        }
    }

    function stopAutoSort() {
        autoSortActive = false;
        if (autoSortTimeout) {
            clearTimeout(autoSortTimeout);
            autoSortTimeout = null;
        }
        quickSortIsSorting = false;
        quickSortSortBtn.disabled = false;
    }

    function startAutoSort() {
        if (quickSortIsSorting || autoSortActive) return;
        if (stepList.length === 0) {
            // Generate steps if not yet generated
            prepareStepsForQuickSort();
        }
        autoSortActive = true;
        quickSortIsSorting = true;
        quickSortSortBtn.disabled = true;
        autoSortStep();
    }

    function autoSortStep() {
        if (!autoSortActive) return;
        if (stepIndex < stepList.length - 1) {
            showStep(stepIndex + 1);
            autoSortTimeout = setTimeout(autoSortStep, quickSortAnimationSpeed);
        } else {
            stopAutoSort();
        }
    }

    // Prepare all steps for quick sort
    function prepareStepsForQuickSort() {
        stepList = [];
        let arr = quickSortArray.slice();
        let sortedIndices = [];
        let recursionDepth = 0;

        function* quickSortGenerator(arr, low, high, depth) {
            if (low < high) {
                recursionDepth = depth;
                yield {
                    arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: -1,
                    description: `Starting new partition from index ${low} to ${high}`,
                    recursionDepth: depth
                };

                // Partition
                let piGen = partitionGenerator(arr, low, high, depth);
                let piResult;
                while (!(piResult = piGen.next()).done) {
                    yield piResult.value;
                }
                let pi = piResult.value;

                sortedIndices.push(pi);

                yield {
                    arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: pi,
                    description: `Partition complete. Pivot ${arr[pi]} is now at correct position (index ${pi})`,
                    recursionDepth: depth
                };

                // Left
                yield* quickSortGenerator(arr, low, pi - 1, depth + 1);

                // Right
                yield* quickSortGenerator(arr, pi + 1, high, depth + 1);
            } else if (low === high) {
                recursionDepth = depth;
                sortedIndices.push(low);
                yield {
                    arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: low,
                    description: `Single element at index ${low} is already sorted`,
                    recursionDepth: depth
                };
            }
        }

        function* partitionGenerator(arr, low, high, depth) {
            let pivot = arr[high];
            let i = low - 1;
            yield {
                arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: high,
                description: `Selected pivot: ${pivot} (at index ${high})`,
                recursionDepth: depth
            };
            for (let j = low; j < high; j++) {
                yield {
                    arr, comparing: [j, high], swapping: [], sorted: sortedIndices.slice(), pivot: high,
                    description: `Comparing element ${arr[j]} (index ${j}) with pivot ${pivot}`,
                    recursionDepth: depth
                };
                if (arr[j] < pivot) {
                    i++;
                    if (i !== j) {
                        yield {
                            arr, comparing: [], swapping: [i, j], sorted: sortedIndices.slice(), pivot: high,
                            description: `${arr[j]} < ${pivot}, swapping with element at index ${i} (${arr[i]})`,
                            recursionDepth: depth
                        };
                        [arr[i], arr[j]] = [arr[j], arr[i]];
                        yield {
                            arr, comparing: [], swapping: [i, j], sorted: sortedIndices.slice(), pivot: high,
                            description: `Swapped: ${arr[i]} and ${arr[j]}`,
                            recursionDepth: depth
                        };
                    } else {
                        yield {
                            arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: high,
                            description: `${arr[j]} < ${pivot} but no swap needed (i = j = ${i})`,
                            recursionDepth: depth
                        };
                    }
                } else {
                    yield {
                        arr, comparing: [], swapping: [], sorted: sortedIndices.slice(), pivot: high,
                        description: `${arr[j]} >= ${pivot}, moving to next element`,
                        recursionDepth: depth
                    };
                }
            }
            yield {
                arr, comparing: [], swapping: [i+1, high], sorted: sortedIndices.slice(), pivot: high,
                description: `Placing pivot ${pivot} in correct position at index ${i+1}`,
                recursionDepth: depth
            };
            [arr[i+1], arr[high]] = [arr[high], arr[i+1]];
            yield {
                arr, comparing: [], swapping: [i+1, high], sorted: sortedIndices.slice(), pivot: i+1,
                description: `Swapped pivot ${pivot} to index ${i+1}`,
                recursionDepth: depth
            };
            return i+1;
        }

        // Initial step
        recordStep({
            arr: arr,
            comparing: [],
            swapping: [],
            sorted: [],
            pivot: -1,
            description: "Starting Quick Sort Algorithm",
            recursionDepth: 0
        });

        // Generate all steps
        let gen = quickSortGenerator(arr, 0, arr.length - 1, 1);
        for (let step of gen) {
            recordStep(step);
        }

        // Final step
        recordStep({
            arr: arr,
            comparing: [],
            swapping: [],
            sorted: Array.from({length: arr.length}, (_, i) => i),
            pivot: -1,
            description: "Quick Sort completed! Array is now sorted",
            recursionDepth: 0
        });

        stepIndex = 0;
        showStep(0);
    }

    // When Next/Prev is clicked before any sorting, generate steps
    quickSortNextBtn.addEventListener('click', function() {
        if (stepList.length === 0) {
            prepareStepsForQuickSort();
        }
    });
    quickSortPrevBtn.addEventListener('click', function() {
        if (stepList.length === 0) {
            prepareStepsForQuickSort();
        }
    });

    // When Auto Sort is clicked before any sorting, generate steps
    quickSortSortBtn.addEventListener('click', function() {
        if (stepList.length === 0) {
            prepareStepsForQuickSort();
        }
    });

});
</script>
