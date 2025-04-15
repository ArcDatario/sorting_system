<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merge Sort Visualization</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .controls {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            justify-content: center;
            align-items: center;
        }
        button {
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        button:disabled {
            background-color: #95a5a6;
            cursor: not-allowed;
        }
        .slider-container {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }
        .visualization {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        .array-container {
            display: flex;
            flex-direction: column;
            gap: 5px;
            padding: 15px;
            background-color: #ecf0f1;
            border-radius: 4px;
        }
        .array-row {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 5px;
            position: relative;
        }
        .array-element {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .unsorted { background-color: #3498db; color: white; }
        .divided { background-color: #e74c3c; color: white; }
        .comparing { background-color: #f39c12; color: white; }
        .merging { background-color: #9b59b6; color: white; }
        .sorted { background-color: #2ecc71; color: white; }
        .connector {
            position: absolute;
            height: 20px;
            width: 2px;
            background-color: #95a5a6;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .horizontal-connector {
            position: absolute;
            height: 2px;
            background-color: #95a5a6;
            top: -20px;
        }
        .info-panel {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #3498db;
            max-height: 200px; /* Set the maximum height */
            overflow-y: auto;  /* Enable vertical scrolling */
        }
        .legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }
        .color-box {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }
        .status-text {
            text-align: center;
            margin: 10px 0;
            font-weight: bold;
            color: #2c3e50;
            min-height: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Merge Sort Visualization</h1>
        <div class="controls">
            <button id="generate-btn">Generate New Array</button>
            <button id="sort-btn">Start Merge Sort</button>
            <div class="slider-container">
                <label for="size-slider">Array Size:</label>
                <input type="range" id="size-slider" min="3" max="4" value="3">
                <span id="size-value">3</span>
            </div>
            <div class="slider-container">
                <label for="speed-slider">Speed:</label>
                <input type="range" id="speed-slider" min="1" max="10" value="5">
                <span id="speed-value">5</span>
            </div>
        </div>
        <div class="visualization">
            <div id="status-text" class="status-text"></div>
            <div id="array-display" class="array-container"></div>
            <div id="info-panel" class="info-panel"></div>
        </div>
        <div class="legend">
            <div class="legend-item">
                <div class="color-box unsorted"></div>
                <span>Unsorted</span>
            </div>
            <div class="legend-item">
                <div class="color-box divided"></div>
                <span>Divided</span>
            </div>
            <div class="legend-item">
                <div class="color-box comparing"></div>
                <span>Comparing</span>
            </div>
            <div class="legend-item">
                <div class="color-box merging"></div>
                <span>Merging</span>
            </div>
            <div class="legend-item">
                <div class="color-box sorted"></div>
                <span>Sorted</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const sizeSlider = document.getElementById('size-slider');
            const sizeValue = document.getElementById('size-value');

            // Variables
            let arraySize = 3; // Default array size set to 3

            // Initialize
            updateSizeValue();

            // Event listeners
            sizeSlider.addEventListener('input', updateSizeValue);

            // Functions
            function updateSizeValue() {
                arraySize = parseInt(sizeSlider.value);
                sizeValue.textContent = arraySize;
                generateNewArray();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const arrayDisplay = document.getElementById('array-display');
            const generateBtn = document.getElementById('generate-btn');
            const sortBtn = document.getElementById('sort-btn');
            const sizeSlider = document.getElementById('size-slider');
            const sizeValue = document.getElementById('size-value');
            const speedSlider = document.getElementById('speed-slider');
            const speedValue = document.getElementById('speed-value');
            const statusText = document.getElementById('status-text');
            const infoPanel = document.getElementById('info-panel');

            // Variables
            let array = [];
            let arraySize = parseInt(sizeSlider.value);
            let speed = parseInt(speedSlider.value);
            let animationSpeed = 1000 / speed;
            let isSorting = false;
            let steps = [];
            let currentStep = 0;
            let visualizationData = [];

            // Initialize
            updateSizeValue();
            updateSpeedValue();
            generateNewArray();

            // Event listeners
            generateBtn.addEventListener('click', generateNewArray);
            sortBtn.addEventListener('click', startMergeSort);
            sizeSlider.addEventListener('input', updateSizeValue);
            speedSlider.addEventListener('input', updateSpeedValue);

            // Functions
            function updateSizeValue() {
                arraySize = parseInt(sizeSlider.value);
                sizeValue.textContent = arraySize;
                generateNewArray();
            }

            function updateSpeedValue() {
                speed = parseInt(speedSlider.value);
                speedValue.textContent = speed;
                animationSpeed = 1000 / speed;
            }

            function generateNewArray() {
                if (isSorting) return;
                
                array = [];
                for (let i = 0; i < arraySize; i++) {
                    array.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                renderInitialArray();
                infoPanel.innerHTML = '';
                steps = [];
                currentStep = 0;
                visualizationData = [];
                statusText.textContent = '';
            }

            function renderInitialArray() {
                arrayDisplay.innerHTML = '';
                
                const row = document.createElement('div');
                row.className = 'array-row';
                
                array.forEach((value, index) => {
                    const element = document.createElement('div');
                    element.className = 'array-element unsorted';
                    element.textContent = value;
                    element.dataset.index = index;
                    row.appendChild(element);
                });
                
                arrayDisplay.appendChild(row);
            }

            function addStep(description, isActive = false) {
                const step = document.createElement('div');
                step.className = `step ${isActive ? 'active' : ''}`;
                step.textContent = description;
                infoPanel.appendChild(step);
                steps.push(step);
                
                // Auto-scroll to the latest step
                infoPanel.scrollTop = infoPanel.scrollHeight;
            }

            function updateSteps(currentIndex) {
                steps.forEach((step, index) => {
                    step.className = 'step';
                    if (index < currentIndex) step.classList.add('completed');
                    if (index === currentIndex) step.classList.add('active');
                });
            }

            function updateStatus(text) {
                statusText.textContent = text;
            }

            async function startMergeSort() {
                if (isSorting) return;
                
                isSorting = true;
                generateBtn.disabled = true;
                sortBtn.disabled = true;
                infoPanel.innerHTML = '';
                steps = [];
                currentStep = 0;
                visualizationData = [];
                
                // Initial steps
                addStep("Starting Merge Sort Algorithm", true);
                addStep("Divide the array into two halves", false);
                addStep("Recursively sort each half", false);
                addStep("Merge the two sorted halves", false);
                
                // Create a copy of the array to sort
                const sortingArray = [...array];
                
                // Initialize visualization data with the initial array
                visualizationData.push({
                    array: [...sortingArray],
                    status: 'unsorted',
                    level: 0,
                    left: 0,
                    right: sortingArray.length - 1
                });
                
                renderVisualization();
                
                // Perform merge sort with visualization
                await mergeSort(sortingArray, 0, sortingArray.length - 1, 1);
                
                // Final step
                addStep("Merge Sort completed!", false);
                updateSteps(steps.length);
                updateStatus("Sorting completed!");
                
                isSorting = false;
                generateBtn.disabled = false;
                sortBtn.disabled = false;
            }

            async function mergeSort(arr, left, right, level) {
                if (left < right) {
                    const mid = Math.floor((left + right) / 2);
                    
                    // Visualize dividing
                    updateStatus(`Dividing subarray from index ${left} to ${right}`);
                    addStep(`Dividing subarray from index ${left} to ${right}`, true);
                    updateSteps(1);
                    
                    // Add visualization data for left and right halves
                    visualizationData.push({
                        array: [...arr],
                        status: 'divided',
                        level: level,
                        left: left,
                        right: right,
                        mid: mid
                    });
                    
                    renderVisualization();
                    await new Promise(resolve => setTimeout(resolve, animationSpeed * 2));
                    
                    // Recursively sort left and right halves
                    await mergeSort(arr, left, mid, level + 1);
                    await mergeSort(arr, mid + 1, right, level + 1);
                    
                    // Visualize merging
                    updateStatus(`Merging sorted subarrays from index ${left} to ${right}`);
                    addStep(`Merging sorted subarrays from index ${left} to ${right}`, true);
                    updateSteps(3);
                    
                    await merge(arr, left, mid, right, level);
                } else if (left === right) {
                    // Base case - single element is already sorted
                    updateStatus(`Single element at index ${left} is already sorted`);
                    addStep(`Single element at index ${left} is already sorted`, true);
                    updateSteps(2);
                    
                    visualizationData.push({
                        array: [...arr],
                        status: 'sorted',
                        level: level,
                        left: left,
                        right: right
                    });
                    
                    renderVisualization();
                    await new Promise(resolve => setTimeout(resolve, animationSpeed));
                }
            }

            async function merge(arr, left, mid, right, level) {
                let i = left;
                let j = mid + 1;
                let k = left;
                const tempArray = [...arr];
                
                while (i <= mid && j <= right) {
                    // Highlight the elements being compared
                    visualizationData.push({
                        array: [...arr],
                        status: 'comparing',
                        level: level,
                        left: left,
                        right: right,
                        comparing: [i, j]
                    });
                    
                    renderVisualization();
                    updateStatus(`Comparing ${arr[i]} and ${arr[j]}`);
                    addStep(`Comparing elements ${arr[i]} and ${arr[j]}`, true);
                    updateSteps(2);
                    await new Promise(resolve => setTimeout(resolve, animationSpeed));
                    
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
                    
                    visualizationData.push({
                        array: [...arr],
                        status: 'merging',
                        level: level,
                        left: left,
                        right: right,
                        merged: left
                    });
                    
                    renderVisualization();
                    await new Promise(resolve => setTimeout(resolve, animationSpeed));
                }
                
                // Copy remaining elements from left subarray
                while (i <= mid) {
                    tempArray[k] = arr[i];
                    arr[k] = tempArray[k];
                    i++;
                    k++;
                    
                    visualizationData.push({
                        array: [...arr],
                        status: 'merging',
                        level: level,
                        left: left,
                        right: right,
                        merged: left
                    });
                    
                    renderVisualization();
                    await new Promise(resolve => setTimeout(resolve, animationSpeed / 2));
                }
                
                // Copy remaining elements from right subarray
                while (j <= right) {
                    tempArray[k] = arr[j];
                    arr[k] = tempArray[k];
                    j++;
                    k++;
                    
                    visualizationData.push({
                        array: [...arr],
                        status: 'merging',
                        level: level,
                        left: left,
                        right: right,
                        merged: left
                    });
                    
                    renderVisualization();
                    await new Promise(resolve => setTimeout(resolve, animationSpeed / 2));
                }
                
                // Mark the merged subarray as sorted
                visualizationData.push({
                    array: [...arr],
                    status: 'sorted',
                    level: level,
                    left: left,
                    right: right
                });
                
                renderVisualization();
                await new Promise(resolve => setTimeout(resolve, animationSpeed));
            }

            function renderVisualization() {
                if (visualizationData.length === 0) return;

                const currentState = visualizationData[visualizationData.length - 1];
                arrayDisplay.innerHTML = '';

                const maxLevel = Math.max(...visualizationData.map(d => d.level));

                for (let level = 0; level <= maxLevel; level++) {
                    const row = document.createElement('div');
                    row.className = 'array-row';

                    const segments = visualizationData.filter(d => d.level === level);
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
                            element.className = 'array-element';

                            if (segment.status === 'unsorted') {
                                element.classList.add('unsorted');
                            } else if (segment.status === 'divided') {
                                element.classList.add('divided');
                            } else if (segment.status === 'comparing' &&
                                (i === segment.comparing[0] || i === segment.comparing[1])) {
                                element.classList.add('comparing');
                            } else if (segment.status === 'merging' && i >= segment.left && i < segment.left + (segment.right - segment.left + 1)) {
                                element.classList.add('merging');
                            } else if (segment.status === 'sorted') {
                                element.classList.add('sorted');
                            } else {
                                element.classList.add('unsorted');
                            }

                            element.textContent = segment.array[i];
                            row.appendChild(element);
                            position++;
                        }
                    });

                    arrayDisplay.appendChild(row);
                }
            }
        });
    </script>
</body>
</html>