<style>
      h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .insertion-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
            justify-content: center;
        }

        .insertion-btn {
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .insertion-btn:hover {
            background-color: #2980b9;
        }

        .insertion-btn:disabled {
            background-color: #95a5a6;
            cursor: not-allowed;
        }

        .insertion-slider-container {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        #insertion-array-container {
            display: flex;
            height: 250px;
            align-items: flex-end;
            justify-content: center;
            gap: 2px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .insertion-bar {
            height: 80%;
            width: 40px;
            background-color: #3498db;
            transition: height 0.3s, background-color 0.3s;
            border-radius: 3px 3px 0 0;
            position: relative;
        }

        .insertion-bar.comparing {
            background-color: #e74c3c;
        }

        .insertion-bar.shifting {
            background-color: #f39c12;
        }

        .insertion-bar.sorted {
            background-color: #2ecc71;
        }

        .insertion-bar.current {
            background-color: #9b59b6;
        }

        .insertion-bar-label {
            position: absolute;
        top: 50%; /* Center vertically */
        left: 50%; /* Center horizontally */
        transform: translate(-50%, -50%); /* Adjust for centering */
        width: 100%;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        color: white; /* Ensure visibility inside the bar */
        pointer-events: none; /* Prevent interaction */
    }
        

        #insertion-steps-container {
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid #3498db;
    max-height: 200px;
    overflow-y: auto;
    
    /* Modern scrollbar styling */
    scrollbar-width: thin;
    scrollbar-color: #4ec9b0 #f8f9fa;
}

/* For WebKit browsers (Chrome, Safari, Edge) */
#insertion-steps-container::-webkit-scrollbar {
    width: 8px;
}

#insertion-steps-container::-webkit-scrollbar-track {
    background: transparent;
    border-radius: 10px;
}

#insertion-steps-container::-webkit-scrollbar-thumb {
    background-color: #4ec9b0;
    border-radius: 10px;
    border: 2px solid transparent;
}

#insertion-steps-container::-webkit-scrollbar-thumb:hover {
    background-color: #3ab8a0;
}

        .insertion-step {
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.4;
        }

        .insertion-step.active {
            font-weight: bold;
            color: #2c3e50;
        }

        .insertion-step.completed {
            color: #27ae60;
        }

        .insertion-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .insertion-legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        .insertion-color-box {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }

        .insertion-color-box.comparing {
            background-color: #e74c3c;
        }

        .insertion-color-box.shifting {
            background-color: #f39c12;
        }

        .insertion-color-box.sorted {
            background-color: #2ecc71;
        }

        .insertion-color-box.current {
            background-color: #9b59b6;
        }


        body.dark-mode #insertion-array-container {
        background-color: #333;
    }
    body.dark-mode #insertion-steps-container {
        background-color: var(--background);
        color: white;
    }
    .insertion-current-step{
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
<main class="main-content insertion-sort" id="insertion-sort" style="display:none;">
<h1>Insertion Sort Visualization</h1>
        
        <div id="insertion-visualization">
            <div id="insertion-array-container"></div>

            <div class="insertion-current-step"></div>

            <div class="insertion-controls">
            <button id="insertion-generate-btn">Generate New Array</button>
            <button id="insertion-sort-btn">Insertion Sort</button>
            <button id="insertion-prev-btn" disabled>Prev</button>
            <button id="insertion-next-btn" disabled>Next</button>
            <div class="insertion-slider-container">
                <label for="insertion-size-slider">Array Size:</label>
                <input type="range" id="insertion-size-slider" min="5" max="15" value="8">
                <span id="insertion-size-value">8</span>
            </div>
            <div class="insertion-slider-container">
                <label for="insertion-speed-slider">Speed:</label>
                <input type="range" id="insertion-speed-slider" min="1" max="10" value="1">
                <span id="insertion-speed-value">1</span>
            </div>
        </div>

            <div id="insertion-steps-container"></div>
        </div>
        <div class="insertion-legend">
            <div class="insertion-legend-item">
                <div class="insertion-color-box comparing"></div>
                <span>Comparing</span>
            </div>
            <div class="insertion-legend-item">
                <div class="insertion-color-box shifting"></div>
                <span>Shifting</span>
            </div>
            <div class="insertion-legend-item">
                <div class="insertion-color-box sorted"></div>
                <span>Sorted</span>
            </div>
            <div class="insertion-legend-item">
                <div class="insertion-color-box current"></div>
                <span>Current Element</span>
            </div>
        </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const insertionArrayContainer = document.getElementById('insertion-array-container');
    const insertionStepsContainer = document.getElementById('insertion-steps-container');
    const insertionCurrentStepDiv = document.querySelector('.insertion-current-step');
    const insertionGenerateBtn = document.getElementById('insertion-generate-btn');
    const insertionSortBtn = document.getElementById('insertion-sort-btn');
    const insertionPrevBtn = document.getElementById('insertion-prev-btn');
    const insertionNextBtn = document.getElementById('insertion-next-btn');
    const insertionSizeSlider = document.getElementById('insertion-size-slider');
    const insertionSizeValue = document.getElementById('insertion-size-value');
    const insertionSpeedSlider = document.getElementById('insertion-speed-slider');
    const insertionSpeedValue = document.getElementById('insertion-speed-value');

    // Variables
    let insertionArray = [];
    let insertionArraySize = parseInt(insertionSizeSlider.value);
    let insertionSortSpeed = parseInt(insertionSpeedSlider.value);
    let isInsertionSorting = false;
    let insertionAnimationSpeed = 1000 / insertionSortSpeed;

    // Step navigation variables
    let insertionStepSnapshots = [];
    let insertionStepIndex = 0;
    let insertionAutoSortTimeout = null;

    // Initialize
    updateInsertionSizeValue();
    updateInsertionSpeedValue();
    generateNewInsertionArray();

    // Event listeners
    insertionGenerateBtn.addEventListener('click', generateNewInsertionArray);
    insertionSortBtn.addEventListener('click', startInsertionAutoSort);
    insertionPrevBtn.addEventListener('click', function() {
        stopInsertionAutoSort();
        if (insertionStepIndex > 0) {
            insertionStepIndex--;
            renderInsertionStepSnapshot(insertionStepIndex);
        }
    });
    insertionNextBtn.addEventListener('click', function() {
        stopInsertionAutoSort();
        if (insertionStepIndex < insertionStepSnapshots.length - 1) {
            insertionStepIndex++;
            renderInsertionStepSnapshot(insertionStepIndex);
        }
    });
    insertionSizeSlider.addEventListener('input', updateInsertionSizeValue);
    insertionSpeedSlider.addEventListener('input', updateInsertionSpeedValue);

    // Functions
    function updateInsertionSizeValue() {
        insertionArraySize = parseInt(insertionSizeSlider.value);
        insertionSizeValue.textContent = insertionArraySize;
        generateNewInsertionArray();
    }

    function updateInsertionSpeedValue() {
        insertionSortSpeed = parseInt(insertionSpeedSlider.value);
        insertionSpeedValue.textContent = insertionSortSpeed;
        insertionAnimationSpeed = 1000 / insertionSortSpeed;
    }

    function generateNewInsertionArray() {
        stopInsertionAutoSort();
        if (isInsertionSorting) return;
        insertionArray = [];
        for (let i = 0; i < insertionArraySize; i++) {
            insertionArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
        }
        precomputeInsertionSortSteps();
        insertionStepIndex = 0;
        renderInsertionStepSnapshot(insertionStepIndex);
    }

    function renderInsertionArray(arr = insertionArray, comparingIndices = [], shiftingIndices = [], sortedIndices = [], currentIndex = -1) {
        insertionArrayContainer.innerHTML = '';
        const maxValue = Math.max(...arr, 1);

        arr.forEach((value, index) => {
            const bar = document.createElement('div');
            bar.className = 'insertion-bar';
            bar.style.height = `${(value / maxValue) * 100}%`;

            const label = document.createElement('div');
            label.className = 'insertion-bar-label';
            label.textContent = value;

            bar.appendChild(label);
            bar.setAttribute('data-index', index);

            // Add appropriate classes
            if (comparingIndices.includes(index)) {
                bar.classList.add('comparing');
            } else if (shiftingIndices.includes(index)) {
                bar.classList.add('shifting');
            } else if (sortedIndices.includes(index)) {
                bar.classList.add('sorted');
            }
            if (index === currentIndex) {
                bar.classList.add('current');
            }

            insertionArrayContainer.appendChild(bar);
        });
    }

    function addInsertionStepSnapshot(arr, comparingIndices, shiftingIndices, sortedIndices, currentIndex, description) {
        insertionStepSnapshots.push({
            arr: [...arr],
            comparingIndices: [...comparingIndices],
            shiftingIndices: [...shiftingIndices],
            sortedIndices: [...sortedIndices],
            currentIndex: currentIndex,
            description: description
        });
    }

    function renderInsertionStepSnapshot(idx) {
    const snap = insertionStepSnapshots[idx];
    if (!snap) return;
    renderInsertionArray(snap.arr, snap.comparingIndices, snap.shiftingIndices, snap.sortedIndices, snap.currentIndex);

    // Show only previous and current steps in #insertion-steps-container
    insertionStepsContainer.innerHTML = '';
    for (let i = 0; i <= idx; i++) {
        const s = insertionStepSnapshots[i];
        const stepDiv = document.createElement('div');
        stepDiv.className = 'insertion-step';
        if (i < idx) stepDiv.classList.add('completed');
        if (i === idx) stepDiv.classList.add('active');
        stepDiv.textContent = s.description;
        insertionStepsContainer.appendChild(stepDiv);
    }

    // Auto-scroll to bottom so latest step is visible
    insertionStepsContainer.scrollTop = insertionStepsContainer.scrollHeight;

    // Show only the current step in .insertion-current-step
    insertionCurrentStepDiv.textContent = snap.description || '';

    // Prev/Next are only disabled at the ends
    insertionPrevBtn.disabled = idx === 0;
    insertionNextBtn.disabled = insertionStepSnapshots.length === 0 || idx === insertionStepSnapshots.length - 1;
}


    function precomputeInsertionSortSteps() {
        insertionStepSnapshots = [];
        // Initial steps
        addInsertionStepSnapshot([...insertionArray], [], [], [], -1, "Starting Insertion Sort Algorithm");
        addInsertionStepSnapshot([...insertionArray], [], [], [], -1, "Assume first element is already sorted");
        addInsertionStepSnapshot([...insertionArray], [], [], [], -1, "Pick next element and insert it into the correct position in sorted part");
        addInsertionStepSnapshot([...insertionArray], [], [], [], -1, "Repeat until all elements are sorted");

        // Create a copy of the array to sort
        const sortingArray = [...insertionArray];
        const n = sortingArray.length;
        let sortedIndices = [0];

        // First element is considered sorted
        addInsertionStepSnapshot([...sortingArray], [], [], [0], 0, "Element at index 0 is considered sorted");

        for (let i = 1; i < n; i++) {
            addInsertionStepSnapshot([...sortingArray], [], [], sortedIndices, i, `Processing element at index ${i} (value: ${sortingArray[i]})`);
            let j = i - 1;
            const currentValue = sortingArray[i];

            while (j >= 0 && sortingArray[j] > currentValue) {
                addInsertionStepSnapshot([...sortingArray], [j, i], [], sortedIndices, i, `Comparing ${currentValue} with ${sortingArray[j]} at index ${j}`);
                addInsertionStepSnapshot([...sortingArray], [], [j], sortedIndices, i, `Shifting ${sortingArray[j]} to the right`);
                sortingArray[j + 1] = sortingArray[j];
                j--;
            }
            sortingArray[j + 1] = currentValue;
            sortedIndices.push(j + 1);
            addInsertionStepSnapshot([...sortingArray], [], [], sortedIndices, -1, `Inserted ${currentValue} at correct position (index ${j + 1})`);
        }

        // Final visualization - all elements sorted
        addInsertionStepSnapshot([...sortingArray], [], [], Array.from({length: n}, (_, i) => i), -1, "Array is now completely sorted");
        addInsertionStepSnapshot([...sortingArray], [], [], Array.from({length: n}, (_, i) => i), -1, "Insertion Sort completed!");
    }

    function startInsertionAutoSort() {
        if (isInsertionSorting) return;
        isInsertionSorting = true;
        insertionGenerateBtn.disabled = true;
        insertionSortBtn.disabled = true;

        function playStep() {
            if (insertionStepIndex < insertionStepSnapshots.length - 1) {
                insertionStepIndex++;
                renderInsertionStepSnapshot(insertionStepIndex);
                insertionAutoSortTimeout = setTimeout(playStep, insertionAnimationSpeed);
            } else {
                isInsertionSorting = false;
                insertionGenerateBtn.disabled = false;
                insertionSortBtn.disabled = false;
            }
        }
        playStep();
    }

    function stopInsertionAutoSort() {
        if (insertionAutoSortTimeout) {
            clearTimeout(insertionAutoSortTimeout);
            insertionAutoSortTimeout = null;
        }
        isInsertionSorting = false;
        insertionGenerateBtn.disabled = false;
        insertionSortBtn.disabled = false;
    }
});
</script>

