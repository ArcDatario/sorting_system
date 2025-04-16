<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .merge-sort-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }
    .merge-sort-button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .merge-sort-button:hover {
        background-color: #2980b9;
    }
    .merge-sort-button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
    .merge-sort-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    .merge-sort-visualization {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }
    .merge-sort-array-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
    }
    .merge-sort-array-row {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 5px;
        position: relative;
    }
    .merge-sort-array-element {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-weight: bold;
        transition: all 0.3s;
    }
    .merge-sort-unsorted { background-color: #3498db; color: white; }
    .merge-sort-divided { background-color: #e74c3c; color: white; }
    .merge-sort-comparing { background-color: #f39c12; color: white; }
    .merge-sort-merging { background-color: #9b59b6; color: white; }
    .merge-sort-sorted { background-color: #2ecc71; color: white; }
    .merge-sort-info-panel {
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
.merge-sort-info-panel::-webkit-scrollbar {
    width: 8px;
}

.merge-sort-info-panel::-webkit-scrollbar-track {
    background: transparent;
    border-radius: 10px;
}

.merge-sort-info-panel::-webkit-scrollbar-thumb {
    background-color: #4ec9b0;
    border-radius: 10px;
    border: 2px solid transparent;
}

.merge-sort-info-panel::-webkit-scrollbar-thumb:hover {
    background-color: #3ab8a0;
}
    .merge-sort-step{
        margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.4;
    }

    .merge-sort-step.active {
            font-weight: bold;
            color: #2c3e50;
        }

        .merge-sort-step.completed {
            color: #27ae60;
        }
    .merge-sort-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .merge-sort-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }
    .merge-sort-color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
    .merge-sort-status-text {
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
    }


    body.dark-mode #merge-array-display {
        /* Set text color to white in dark mode */
    }
    body.dark-mode .merge-sort-array-container {
        background-color: #333; /* Ensure steps text is also white */
    }
    body.dark-mode .merge-sort-info-panel {
        background-color: var(--background);
        color: white;
    }
</style>

<main class="main-content merge-sort" id="merge-sort" style="display:block;">
    <h1>Merge Sort Visualization</h1>
    <div class="merge-sort-controls">
        <button id="merge-sort-generate-btn" class="merge-sort-button">Generate New Array</button>
        <button id="merge-sort-sort-btn" class="merge-sort-button">Start Merge Sort</button>
        <div class="merge-sort-slider-container">
            <label for="merge-sort-size-slider">Array Size:</label>
            <input type="range" id="merge-sort-size-slider" min="3" max="4" value="3">
            <span id="merge-sort-size-value">3</span>
        </div>
        <div class="merge-sort-slider-container">
            <label for="merge-sort-speed-slider">Speed:</label>
            <input type="range" id="merge-sort-speed-slider" min="1" max="10" value="5">
            <span id="merge-sort-speed-value">5</span>
        </div>
    </div>
    <div class="merge-sort-visualization">
        <div id="merge-sort-status-text" class="merge-sort-status-text"></div>
        <div id="merge-sort-array-display" class="merge-sort-array-container"></div>
        <div id="merge-sort-info-panel" class="merge-sort-info-panel"></div>
    </div>
    <div class="merge-sort-legend">
        <div class="merge-sort-legend-item">
            <div class="merge-sort-color-box merge-sort-unsorted"></div>
            <span>Unsorted</span>
        </div>
        <div class="merge-sort-legend-item">
            <div class="merge-sort-color-box merge-sort-divided"></div>
            <span>Divided</span>
        </div>
        <div class="merge-sort-legend-item">
            <div class="merge-sort-color-box merge-sort-comparing"></div>
            <span>Comparing</span>
        </div>
        <div class="merge-sort-legend-item">
            <div class="merge-sort-color-box merge-sort-merging"></div>
            <span>Merging</span>
        </div>
        <div class="merge-sort-legend-item">
            <div class="merge-sort-color-box merge-sort-sorted"></div>
            <span>Sorted</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const mergeSortSizeSlider = document.getElementById('merge-sort-size-slider');
        const mergeSortSizeValue = document.getElementById('merge-sort-size-value');
        const mergeSortArrayDisplay = document.getElementById('merge-sort-array-display');
        const mergeSortGenerateBtn = document.getElementById('merge-sort-generate-btn');
        const mergeSortSortBtn = document.getElementById('merge-sort-sort-btn');
        const mergeSortSpeedSlider = document.getElementById('merge-sort-speed-slider');
        const mergeSortSpeedValue = document.getElementById('merge-sort-speed-value');
        const mergeSortStatusText = document.getElementById('merge-sort-status-text');
        const mergeSortInfoPanel = document.getElementById('merge-sort-info-panel');

        // Variables
        let mergeSortArray = [];
        let mergeSortArraySize = parseInt(mergeSortSizeSlider.value);
        let mergeSortSpeed = parseInt(mergeSortSpeedSlider.value);
        let mergeSortAnimationSpeed = 1000 / mergeSortSpeed;
        let mergeSortIsSorting = false;
        let mergeSortSteps = [];
        let mergeSortCurrentStep = 0;
        let mergeSortVisualizationData = [];

        // Initialize
        updateMergeSortSizeValue();
        updateMergeSortSpeedValue();
        generateMergeSortNewArray();

        // Event listeners
        mergeSortGenerateBtn.addEventListener('click', generateMergeSortNewArray);
        mergeSortSortBtn.addEventListener('click', startMergeSort);
        mergeSortSizeSlider.addEventListener('input', updateMergeSortSizeValue);
        mergeSortSpeedSlider.addEventListener('input', updateMergeSortSpeedValue);

        // Functions
        function updateMergeSortSizeValue() {
            mergeSortArraySize = parseInt(mergeSortSizeSlider.value);
            mergeSortSizeValue.textContent = mergeSortArraySize;
            generateMergeSortNewArray();
        }

        function updateMergeSortSpeedValue() {
            mergeSortSpeed = parseInt(mergeSortSpeedSlider.value);
            mergeSortSpeedValue.textContent = mergeSortSpeed;
            mergeSortAnimationSpeed = 1000 / mergeSortSpeed;
        }

        function generateMergeSortNewArray() {
            if (mergeSortIsSorting) return;

            mergeSortArray = [];
            for (let i = 0; i < mergeSortArraySize; i++) {
                mergeSortArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
            }

            renderMergeSortInitialArray();
            mergeSortInfoPanel.innerHTML = '';
            mergeSortSteps = [];
            mergeSortCurrentStep = 0;
            mergeSortVisualizationData = [];
            mergeSortStatusText.textContent = '';
        }

        function renderMergeSortInitialArray() {
            mergeSortArrayDisplay.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'merge-sort-array-row';

            mergeSortArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'merge-sort-array-element merge-sort-unsorted';
                element.textContent = value;
                element.dataset.index = index;
                row.appendChild(element);
            });

            mergeSortArrayDisplay.appendChild(row);
        }

        function addMergeSortStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            mergeSortInfoPanel.appendChild(step);
            mergeSortSteps.push(step);

            // Auto-scroll to the latest step
            mergeSortInfoPanel.scrollTop = mergeSortInfoPanel.scrollHeight;
        }

        function updateMergeSortSteps(currentIndex) {
            mergeSortSteps.forEach((step, index) => {
                step.className = 'merge-sort-step'; // Reset class
                if (index < currentIndex) step.classList.add('completed'); // Mark as completed
                if (index === currentIndex) step.classList.add('active'); // Mark as active
            });
        }

        function updateMergeSortStatus(text) {
            mergeSortStatusText.textContent = text;
        }

        async function startMergeSort() {
            if (mergeSortIsSorting) return;

            mergeSortIsSorting = true;
            mergeSortGenerateBtn.disabled = true;
            mergeSortSortBtn.disabled = true;
            mergeSortInfoPanel.innerHTML = '';
            mergeSortSteps = [];
            mergeSortCurrentStep = 0;
            mergeSortVisualizationData = [];

            // Initial steps
            addMergeSortStep("Starting Merge Sort Algorithm", true);
            addMergeSortStep("Divide the array into two halves", false);
            addMergeSortStep("Recursively sort each half", false);
            addMergeSortStep("Merge the two sorted halves", false);

            // Create a copy of the array to sort
            const sortingArray = [...mergeSortArray];

            // Initialize visualization data with the initial array
            mergeSortVisualizationData.push({
                array: [...sortingArray],
                status: 'unsorted',
                level: 0,
                left: 0,
                right: sortingArray.length - 1
            });

            renderMergeSortVisualization();

            // Perform merge sort with visualization
            await mergeSort(sortingArray, 0, sortingArray.length - 1, 1);

            // Final step
            addMergeSortStep("Merge Sort completed!", false);
            updateMergeSortSteps(mergeSortSteps.length);
            updateMergeSortStatus("Sorting completed!");

            mergeSortIsSorting = false;
            mergeSortGenerateBtn.disabled = false;
            mergeSortSortBtn.disabled = false;
        }

        async function mergeSort(arr, left, right, level) {
            if (left < right) {
                const mid = Math.floor((left + right) / 2);

                // Visualize dividing
                updateMergeSortStatus(`Dividing subarray from index ${left} to ${right}`);
                addMergeSortStep(`Dividing subarray from index ${left} to ${right}`, true);
                updateMergeSortSteps(1);

                // Add visualization data for left and right halves
                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'divided',
                    level: level,
                    left: left,
                    right: right,
                    mid: mid
                });

                renderMergeSortVisualization();
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed * 2));

                // Recursively sort left and right halves
                await mergeSort(arr, left, mid, level + 1);
                await mergeSort(arr, mid + 1, right, level + 1);

                // Visualize merging
                updateMergeSortStatus(`Merging sorted subarrays from index ${left} to ${right}`);
                addMergeSortStep(`Merging sorted subarrays from index ${left} to ${right}`, true);
                updateMergeSortSteps(3);

                await merge(arr, left, mid, right, level);
            } else if (left === right) {
                // Base case - single element is already sorted
                updateMergeSortStatus(`Single element at index ${left} is already sorted`);
                addMergeSortStep(`Single element at index ${left} is already sorted`, true);
                updateMergeSortSteps(2);

                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'sorted',
                    level: level,
                    left: left,
                    right: right
                });

                renderMergeSortVisualization();
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed));
            }
        }

        async function merge(arr, left, mid, right, level) {
            let i = left;
            let j = mid + 1;
            let k = left;
            const tempArray = [...arr];

            while (i <= mid && j <= right) {
                // Highlight the elements being compared
                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'comparing',
                    level: level,
                    left: left,
                    right: right,
                    comparing: [i, j]
                });

                renderMergeSortVisualization();
                updateMergeSortStatus(`Comparing ${arr[i]} and ${arr[j]}`);
                addMergeSortStep(`Comparing elements ${arr[i]} and ${arr[j]}`, true);
                updateMergeSortSteps(2);
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed));

                if (arr[i] <= arr[j]) {
                    tempArray[k] = arr[i];
                    i++;
                } else {
                    tempArray[k] = arr[j];
                    j++;
                }
                k++;

                // Update the array with the merged elements
                for (let x = left; x < k; x++) {
                    arr[x] = tempArray[x];
                }

                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'merging',
                    level: level,
                    left: left,
                    right: right,
                    merged: left
                });

                renderMergeSortVisualization();
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed));
            }

            // Copy remaining elements from left subarray
            while (i <= mid) {
                tempArray[k] = arr[i];
                arr[k] = tempArray[k];
                i++;
                k++;

                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'merging',
                    level: level,
                    left: left,
                    right: right,
                    merged: left
                });

                renderMergeSortVisualization();
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed / 2));
            }

            // Copy remaining elements from right subarray
            while (j <= right) {
                tempArray[k] = arr[j];
                arr[k] = tempArray[k];
                j++;
                k++;

                mergeSortVisualizationData.push({
                    array: [...arr],
                    status: 'merging',
                    level: level,
                    left: left,
                    right: right,
                    merged: left
                });

                renderMergeSortVisualization();
                await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed / 2));
            }

            // Mark the merged subarray as sorted
            mergeSortVisualizationData.push({
                array: [...arr],
                status: 'sorted',
                level: level,
                left: left,
                right: right
            });

            renderMergeSortVisualization();
            await new Promise(resolve => setTimeout(resolve, mergeSortAnimationSpeed));
        }

        function renderMergeSortVisualization() {
            if (mergeSortVisualizationData.length === 0) return;

            const currentState = mergeSortVisualizationData[mergeSortVisualizationData.length - 1];
            mergeSortArrayDisplay.innerHTML = '';

            const maxLevel = Math.max(...mergeSortVisualizationData.map(d => d.level));

            for (let level = 0; level <= maxLevel; level++) {
                const row = document.createElement('div');
                row.className = 'merge-sort-array-row';

                const segments = mergeSortVisualizationData.filter(d => d.level === level);
                let position = 0;

                segments.forEach(segment => {
                    while (position < segment.left) {
                        const spacer = document.createElement('div');
                        spacer.style.width = '40px';
                        spacer.style.visibility = 'hidden';
                        row.appendChild(spacer);
                        position++;
                    }

                    for (let i = segment.left; i <= segment.right; i++) {
                        const element = document.createElement('div');
                        element.className = 'merge-sort-array-element';

                        if (segment.status === 'unsorted') {
                            element.classList.add('merge-sort-unsorted');
                        } else if (segment.status === 'divided') {
                            element.classList.add('merge-sort-divided');
                        } else if (segment.status === 'comparing' &&
                            (i === segment.comparing[0] || i === segment.comparing[1])) {
                            element.classList.add('merge-sort-comparing');
                        } else if (segment.status === 'merging' && i >= segment.left && i < segment.left + (segment.right - segment.left + 1)) {
                            element.classList.add('merge-sort-merging');
                        } else if (segment.status === 'sorted') {
                            element.classList.add('merge-sort-sorted');
                        } else {
                            element.classList.add('merge-sort-unsorted');
                        }

                        element.textContent = segment.array[i];
                        row.appendChild(element);
                        position++;
                    }
                });

                mergeSortArrayDisplay.appendChild(row);
            }
        }
    });
</script>