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
    .selection-current-step{
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

<main class="main-content selection-sort" id="selection-sort" style="display:none;">
    <h1>Selection Sort Visualization</h1>
   
    <div id="selection-visualization">
        <div id="selection-array-container"></div>

        <div class="selection-current-step"></div>

        <div class="selection-controls">
        <button id="selection-generate-btn">Generate New Array</button>
        <button id="selection-sort-btn">Selection Sort</button>
        <button id="selection-prev-btn">Prev</button>
        <button id="selection-next-btn">Next</button>
        <div class="selection-slider-container">
            <label for="selection-size-slider">Array Size:</label>
            <input type="range" id="selection-size-slider" min="5" max="15" value="8">
            <span id="selection-size-value">8</span>
        </div>
        <div class="selection-slider-container">
            <label for="selection-speed-slider">Speed:</label>
            <input type="range" id="selection-speed-slider" min="1" max="10" value="1">
            <span id="selection-speed-value">1</span>
        </div>
    </div>

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
    const selectionCurrentStepDiv = document.querySelector('.selection-current-step');
    const selectionGenerateBtn = document.getElementById('selection-generate-btn');
    const selectionSortBtn = document.getElementById('selection-sort-btn');
    const selectionPrevBtn = document.getElementById('selection-prev-btn');
    const selectionNextBtn = document.getElementById('selection-next-btn');
    const selectionSizeSlider = document.getElementById('selection-size-slider');
    const selectionSizeValue = document.getElementById('selection-size-value');
    const selectionSpeedSlider = document.getElementById('selection-speed-slider');
    const selectionSpeedValue = document.getElementById('selection-speed-value');

    // Variables
    let selectionArray = [];
    let selectionArraySize = parseInt(selectionSizeSlider.value);
    let selectionSortSpeed = parseInt(selectionSpeedSlider.value);
    let selectionAnimationSpeed = 1000 / selectionSortSpeed;
    let selectionStepSnapshots = [];
    let selectionStepIndex = 0;
    let isSelectionSorting = false;
    let selectionAutoSortTimeout = null;

    // Initialize
    updateSelectionSizeValue();
    updateSelectionSpeedValue();
    generateNewSelectionArray();

    // Event listeners
    selectionGenerateBtn.addEventListener('click', generateNewSelectionArray);
    selectionSortBtn.addEventListener('click', startSelectionAutoSort);
    selectionPrevBtn.addEventListener('click', function() {
        stopSelectionAutoSort();
        if (selectionStepIndex > 0) {
            selectionStepIndex--;
            renderSelectionStepSnapshot(selectionStepIndex);
        }
    });
    selectionNextBtn.addEventListener('click', function() {
        stopSelectionAutoSort();
        if (selectionStepIndex < selectionStepSnapshots.length - 1) {
            selectionStepIndex++;
            renderSelectionStepSnapshot(selectionStepIndex);
        }
    });
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
        stopSelectionAutoSort();
        selectionArray = [];
        for (let i = 0; i < selectionArraySize; i++) {
            selectionArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
        }
        precomputeSelectionSortSteps();
        selectionStepIndex = 0;
        renderSelectionStepSnapshot(selectionStepIndex);
    }

    function renderSelectionArray(arr = selectionArray, comparingIndices = [], minIndex = -1, sortedIndices = [], swapIndices = []) {
        selectionArrayContainer.innerHTML = '';
        arr.forEach((value, index) => {
            const card = document.createElement('div');
            card.className = 'selection-card';
            card.textContent = value;
            card.setAttribute('data-index', index);

            const indexLabel = document.createElement('div');
            indexLabel.className = 'selection-card-index';
            indexLabel.textContent = `[${index}]`;

            card.appendChild(indexLabel);

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
            selectionArrayContainer.appendChild(card);
        });
    }

    function addSelectionStepSnapshot(arr, comparingIndices, minIndex, sortedIndices, swapIndices, description) {
        selectionStepSnapshots.push({
            arr: [...arr],
            comparingIndices: [...comparingIndices],
            minIndex: minIndex,
            sortedIndices: [...sortedIndices],
            swapIndices: [...swapIndices],
            description: description
        });
    }

    function renderSelectionStepSnapshot(idx) {
        const snap = selectionStepSnapshots[idx];
        if (!snap) return;
        renderSelectionArray(snap.arr, snap.comparingIndices, snap.minIndex, snap.sortedIndices, snap.swapIndices);

        // Show only previous and current steps in #selection-steps-container
        selectionStepsContainer.innerHTML = '';
        for (let i = 0; i <= idx; i++) {
            const s = selectionStepSnapshots[i];
            const stepDiv = document.createElement('div');
            stepDiv.className = 'selection-step';
            if (i < idx) stepDiv.classList.add('completed');
            if (i === idx) stepDiv.classList.add('active');
            stepDiv.textContent = s.description;
            selectionStepsContainer.appendChild(stepDiv);
        }
        // Auto-scroll to bottom so latest step is visible
        selectionStepsContainer.scrollTop = selectionStepsContainer.scrollHeight;

        // Show only the current step in .selection-current-step
        selectionCurrentStepDiv.textContent = snap.description || '';

        // Prev/Next are only disabled at the ends
        selectionPrevBtn.disabled = idx === 0;
        selectionNextBtn.disabled = selectionStepSnapshots.length === 0 || idx === selectionStepSnapshots.length - 1;
    }

    function precomputeSelectionSortSteps() {
        selectionStepSnapshots = [];
        // Initial steps
        addSelectionStepSnapshot([...selectionArray], [], -1, [], [], "Starting Selection Sort Algorithm");
        addSelectionStepSnapshot([...selectionArray], [], -1, [], [], "Find the minimum element in the unsorted part of the array");
        addSelectionStepSnapshot([...selectionArray], [], -1, [], [], "Swap it with the first unsorted element");
        addSelectionStepSnapshot([...selectionArray], [], -1, [], [], "Repeat until the array is sorted");

        const arr = [...selectionArray];
        const n = arr.length;
        let sortedIndices = [];

        for (let i = 0; i < n - 1; i++) {
            addSelectionStepSnapshot([...arr], [], i, sortedIndices, [], `Starting pass ${i + 1}: Finding minimum in unsorted portion`);
            let minIndex = i;

            addSelectionStepSnapshot([...arr], [], minIndex, sortedIndices, [], `Assuming element at index ${i} (${arr[i]}) is the minimum`);

            for (let j = i + 1; j < n; j++) {
                addSelectionStepSnapshot([...arr], [j, minIndex], minIndex, sortedIndices, [], `Comparing ${arr[j]} at index ${j} with current minimum ${arr[minIndex]}`);
                if (arr[j] < arr[minIndex]) {
                    minIndex = j;
                    addSelectionStepSnapshot([...arr], [], minIndex, sortedIndices, [], `New minimum found: ${arr[minIndex]} at index ${minIndex}`);
                }
            }

            if (minIndex !== i) {
                addSelectionStepSnapshot([...arr], [], minIndex, sortedIndices, [i, minIndex], `Swapping ${arr[i]} with minimum ${arr[minIndex]}`);
                [arr[i], arr[minIndex]] = [arr[minIndex], arr[i]];
                addSelectionStepSnapshot([...arr], [], minIndex, sortedIndices, [i, minIndex], `Swap complete: ${arr[i]} is now at index ${i}`);
            } else {
                addSelectionStepSnapshot([...arr], [], minIndex, sortedIndices, [], `No swap needed - ${arr[i]} is already the minimum`);
            }

            sortedIndices.push(i);
            addSelectionStepSnapshot([...arr], [], -1, sortedIndices, [], `Marked index ${i} as sorted`);
        }

        sortedIndices.push(n - 1);
        addSelectionStepSnapshot([...arr], [], -1, sortedIndices, [], "Array is now completely sorted");
        addSelectionStepSnapshot([...arr], [], -1, sortedIndices, [], "Selection Sort completed!");
    }

    function startSelectionAutoSort() {
        if (isSelectionSorting) return;
        isSelectionSorting = true;
        selectionGenerateBtn.disabled = true;
        selectionSortBtn.disabled = true;

        function playStep() {
            if (selectionStepIndex < selectionStepSnapshots.length - 1) {
                selectionStepIndex++;
                renderSelectionStepSnapshot(selectionStepIndex);
                selectionAutoSortTimeout = setTimeout(playStep, selectionAnimationSpeed);
            } else {
                isSelectionSorting = false;
                selectionGenerateBtn.disabled = false;
                selectionSortBtn.disabled = false;
            }
        }
        playStep();
    }

    function stopSelectionAutoSort() {
        if (selectionAutoSortTimeout) {
            clearTimeout(selectionAutoSortTimeout);
            selectionAutoSortTimeout = null;
        }
        isSelectionSorting = false;
        selectionGenerateBtn.disabled = false;
        selectionSortBtn.disabled = false;
    }
});
</script>