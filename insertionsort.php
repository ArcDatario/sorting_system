<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion Sort Visualization</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .insertion-container {
            max-width: 800px;
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
            top: -25px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }

        #insertion-steps-container {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #3498db;
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
    </style>

</head>
<body>
    <div class="insertion-container">
        <h1>Insertion Sort Visualization</h1>
        <div class="insertion-controls">
            <button id="insertion-generate-btn">Generate New Array</button>
            <button id="insertion-sort-btn">Insertion Sort</button>
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
        <div id="insertion-visualization">
            <div id="insertion-array-container"></div>
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
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const insertionArrayContainer = document.getElementById('insertion-array-container');
            const insertionStepsContainer = document.getElementById('insertion-steps-container');
            const insertionGenerateBtn = document.getElementById('insertion-generate-btn');
            const insertionSortBtn = document.getElementById('insertion-sort-btn');
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
            let insertionSteps = [];
            let currentInsertionStep = 0;

            // Initialize
            updateInsertionSizeValue();
            updateInsertionSpeedValue();
            generateNewInsertionArray();

            // Event listeners
            insertionGenerateBtn.addEventListener('click', generateNewInsertionArray);
            insertionSortBtn.addEventListener('click', startInsertionSort);
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
                if (isInsertionSorting) return;
                
                insertionArray = [];
                for (let i = 0; i < insertionArraySize; i++) {
                    insertionArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                renderInsertionArray();
                insertionStepsContainer.innerHTML = '';
                insertionSteps = [];
                currentInsertionStep = 0;
            }

            function renderInsertionArray() {
                insertionArrayContainer.innerHTML = '';
                const maxValue = Math.max(...insertionArray, 1);
                
                insertionArray.forEach((value, index) => {
                    const bar = document.createElement('div');
                    bar.className = 'insertion-bar';
                    bar.style.height = `${(value / maxValue) * 100}%`;
                    
                    const label = document.createElement('div');
                    label.className = 'insertion-bar-label';
                    label.textContent = value;
                    
                    bar.appendChild(label);
                    bar.setAttribute('data-index', index);
                    insertionArrayContainer.appendChild(bar);
                });
            }

            function addInsertionStep(description, isActive = false) {
                const step = document.createElement('div');
                step.className = `insertion-step ${isActive ? 'active' : ''}`;
                step.textContent = description;
                insertionStepsContainer.appendChild(step);
                insertionSteps.push(step);
                
                // Auto-scroll to the latest step
                insertionStepsContainer.scrollTop = insertionStepsContainer.scrollHeight;
            }

            function updateInsertionSteps(currentIndex) {
                insertionSteps.forEach((step, index) => {
                    step.className = 'insertion-step';
                    if (index < currentIndex) step.classList.add('completed');
                    if (index === currentIndex) step.classList.add('active');
                });
            }

            async function startInsertionSort() {
                if (isInsertionSorting) return;
                
                isInsertionSorting = true;
                insertionGenerateBtn.disabled = true;
                insertionSortBtn.disabled = true;
                insertionStepsContainer.innerHTML = '';
                insertionSteps = [];
                currentInsertionStep = 0;
                
                // Initial steps
                addInsertionStep("Starting Insertion Sort Algorithm", true);
                addInsertionStep("Assume first element is already sorted");
                addInsertionStep("Pick next element and insert it into the correct position in sorted part");
                addInsertionStep("Repeat until all elements are sorted");
                
                // Create a copy of the array to sort
                const sortingArray = [...insertionArray];
                
                // Perform insertion sort with visualization
                await insertionSort(sortingArray);
                
                addInsertionStep("Insertion Sort completed!", false);
                updateInsertionSteps(insertionSteps.length);
                
                isInsertionSorting = false;
                insertionGenerateBtn.disabled = false;
                insertionSortBtn.disabled = false;
            }

            async function insertionSort(arr) {
                const n = arr.length;
                let sortedIndices = [];
                
                // First element is considered sorted
                sortedIndices.push(0);
                await updateInsertionVisualization(arr, [], [], sortedIndices, 0);
                addInsertionStep("Element at index 0 is considered sorted", true);
                updateInsertionSteps(1);
                await new Promise(resolve => setTimeout(resolve, insertionAnimationSpeed));
                
                for (let i = 1; i < n; i++) {
                    addInsertionStep(`Processing element at index ${i} (value: ${arr[i]})`, true);
                    updateInsertionSteps(2);
                    
                    // Highlight current element
                    await updateInsertionVisualization(arr, [], [], sortedIndices, i);
                    
                    let j = i - 1;
                    const currentValue = arr[i];
                    
                    // Find the correct position for current element
                    while (j >= 0 && arr[j] > currentValue) {
                        addInsertionStep(`Comparing ${currentValue} with ${arr[j]} at index ${j}`, true);
                        updateInsertionSteps(2);
                        await updateInsertionVisualization(arr, [j, i], [], sortedIndices, i);
                        
                        addInsertionStep(`Shifting ${arr[j]} to the right`, true);
                        updateInsertionSteps(2);
                        
                        // Shift element to the right
                        arr[j + 1] = arr[j];
                        await updateInsertionVisualization(arr, [], [j], sortedIndices, i);
                        
                        j--;
                    }
                    
                    // Insert the current element in its correct position
                    arr[j + 1] = currentValue;
                    sortedIndices.push(j + 1);
                    
                    addInsertionStep(`Inserted ${currentValue} at correct position (index ${j + 1})`, true);
                    updateInsertionSteps(2);
                    await updateInsertionVisualization(arr, [], [], sortedIndices, -1);
                }
                
                // Final visualization - all elements sorted
                await updateInsertionVisualization(arr, [], [], Array.from({length: n}, (_, i) => i));
                
                addInsertionStep("Array is now completely sorted", true);
                updateInsertionSteps(3);
                
                // Update the original array
                insertionArray = [...arr];
            }

            async function updateInsertionVisualization(arr, comparingIndices = [], shiftingIndices = [], sortedIndices = [], currentIndex = -1) {
                // Update array visualization
                const bars = document.querySelectorAll('.insertion-bar');
                const maxValue = Math.max(...arr, 1);
                
                arr.forEach((value, index) => {
                    const bar = bars[index];
                    bar.style.height = `${(value / maxValue) * 80}%`;
                    bar.querySelector('.insertion-bar-label').textContent = value;
                    
                    // Reset classes
                    bar.className = 'insertion-bar';
                    
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
                });
                
                // Add delay for animation
                await new Promise(resolve => setTimeout(resolve, insertionAnimationSpeed));
            }
        });
    </script>
</body>
</html>