<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Sort Visualization (Box Style)</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 900px;
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
            align-items: center;
            justify-content: center;
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
        .array-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 4px;
            margin-bottom: 20px;
            justify-content: center;
            min-height: 120px;
        }
        .array-box {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            border-radius: 4px;
            transition: all 0.3s;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .array-box.normal {
            background-color: #3498db;
        }
        .array-box.pivot {
            background-color: #9b59b6;
            transform: scale(1.1);
        }
        .array-box.comparing {
            background-color: #e74c3c;
        }
        .array-box.swapping {
            background-color: #f39c12;
            transform: scale(1.1);
        }
        .array-box.sorted {
            background-color: #2ecc71;
        }
        .array-box.partition {
            background-color: #1abc9c;
        }
        .array-box-label {
            position: absolute;
            top: -20px;
            width: 100%;
            text-align: center;
            font-size: 11px;
            color: #7f8c8d;
        }
        .steps-container {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #3498db;
            max-height: 200px;
            overflow-y: auto;
        }
        .step {
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.4;
        }
        .step.active {
            font-weight: bold;
            color: #2c3e50;
        }
        .step.completed {
            color: #27ae60;
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
            border-radius: 3px;
        }
        .partition-highlight {
            position: relative;
            margin-bottom: 30px;
        }
        .partition-highlight::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #e74c3c;
        }
        .partition-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: #e74c3c;
            font-weight: bold;
        }
        .recursion-level {
            text-align: center;
            margin-bottom: 10px;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quick Sort Visualization (Box Style)</h1>
        <div class="controls">
            <button id="generate-btn">Generate New Array</button>
            <button id="sort-btn">Quick Sort</button>
            <div class="slider-container">
                <label for="size-slider">Array Size:</label>
                <input type="range" id="size-slider" min="5" max="10" value="8">
                <span id="size-value">8</span>
            </div>
            <div class="slider-container">
                <label for="speed-slider">Speed:</label>
                <input type="range" id="speed-slider" min="1" max="10" value="1">
                <span id="speed-value">1</span>
            </div>
        </div>
        <div id="visualization">
            <div class="recursion-level" id="recursion-level"></div>
            <div class="array-container" id="array-container"></div>
            <div class="steps-container" id="steps-container"></div>
        </div>
        <div class="legend">
            <div class="legend-item">
                <div class="color-box" style="background-color: #9b59b6;"></div>
                <span>Pivot</span>
            </div>
            <div class="legend-item">
                <div class="color-box" style="background-color: #e74c3c;"></div>
                <span>Comparing</span>
            </div>
            <div class="legend-item">
                <div class="color-box" style="background-color: #f39c12;"></div>
                <span>Swapping</span>
            </div>
            <div class="legend-item">
                <div class="color-box" style="background-color: #1abc9c;"></div>
                <span>Current Partition</span>
            </div>
            <div class="legend-item">
                <div class="color-box" style="background-color: #2ecc71;"></div>
                <span>Sorted</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const arrayContainer = document.getElementById('array-container');
            const stepsContainer = document.getElementById('steps-container');
            const generateBtn = document.getElementById('generate-btn');
            const sortBtn = document.getElementById('sort-btn');
            const sizeSlider = document.getElementById('size-slider');
            const sizeValue = document.getElementById('size-value');
            const speedSlider = document.getElementById('speed-slider');
            const speedValue = document.getElementById('speed-value');
            const recursionLevelDisplay = document.getElementById('recursion-level');

            // Variables
            let array = [];
            let arraySize = parseInt(sizeSlider.value);
            let sortSpeed = parseInt(speedSlider.value);
            let isSorting = false;
            let animationSpeed = 1000 / sortSpeed;
            let steps = [];
            let currentStep = 0;
            let recursionLevel = 0;

            // Initialize
            updateSizeValue();
            updateSpeedValue();
            generateNewArray();

            // Event listeners
            generateBtn.addEventListener('click', generateNewArray);
            sortBtn.addEventListener('click', startQuickSort);
            sizeSlider.addEventListener('input', updateSizeValue);
            speedSlider.addEventListener('input', updateSpeedValue);

            // Functions
            function updateSizeValue() {
                arraySize = parseInt(sizeSlider.value);
                sizeValue.textContent = arraySize;
                generateNewArray();
            }

            function updateSpeedValue() {
                sortSpeed = parseInt(speedSlider.value);
                speedValue.textContent = sortSpeed;
                animationSpeed = 1000 / sortSpeed;
            }

            function generateNewArray() {
                if (isSorting) return;
                
                array = [];
                for (let i = 0; i < arraySize; i++) {
                    array.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                renderArray();
                stepsContainer.innerHTML = '';
                steps = [];
                currentStep = 0;
                recursionLevel = 0;
                recursionLevelDisplay.textContent = '';
            }

            function renderArray(highlightRange = null) {
                arrayContainer.innerHTML = '';
                
                // Clear any existing partition highlights
                const existingHighlights = document.querySelectorAll('.partition-highlight');
                existingHighlights.forEach(el => el.remove());
                
                array.forEach((value, index) => {
                    const box = document.createElement('div');
                    box.className = 'array-box normal';
                    box.textContent = value;
                    box.setAttribute('data-index', index);
                    
                    const label = document.createElement('div');
                    label.className = 'array-box-label';
                    label.textContent = `[${index}]`;
                    box.appendChild(label);
                    
                    arrayContainer.appendChild(box);
                });
                
                // Add partition highlight if specified
                if (highlightRange && highlightRange.start !== highlightRange.end) {
                    const boxes = Array.from(arrayContainer.children);
                    const startBox = boxes[highlightRange.start];
                    const endBox = boxes[highlightRange.end];
                    
                    if (startBox && endBox) {
                        const highlight = document.createElement('div');
                        highlight.className = 'partition-highlight';
                        
                        const startRect = startBox.getBoundingClientRect();
                        const endRect = endBox.getBoundingClientRect();
                        const containerRect = arrayContainer.getBoundingClientRect();
                        
                        highlight.style.position = 'absolute';
                        highlight.style.left = `${startRect.left - containerRect.left}px`;
                        highlight.style.width = `${endRect.right - startRect.left}px`;
                        highlight.style.height = `${startRect.height}px`;
                        
                        const label = document.createElement('div');
                        label.className = 'partition-label';
                        label.textContent = `Partition ${highlightRange.start}-${highlightRange.end}`;
                        highlight.appendChild(label);
                        
                        arrayContainer.appendChild(highlight);
                        
                        // Move the highlight behind the boxes
                        highlight.style.zIndex = '-1';
                    }
                }
            }

            function addStep(description, isActive = false) {
                const step = document.createElement('div');
                step.className = `step ${isActive ? 'active' : ''}`;
                step.textContent = description;
                stepsContainer.appendChild(step);
                steps.push(step);
                
                // Auto-scroll to the latest step
                stepsContainer.scrollTop = stepsContainer.scrollHeight;
            }

            function updateSteps(currentIndex) {
                steps.forEach((step, index) => {
                    step.className = 'step';
                    if (index < currentIndex) step.classList.add('completed');
                    if (index === currentIndex) step.classList.add('active');
                });
            }

            async function startQuickSort() {
                if (isSorting) return;
                
                isSorting = true;
                generateBtn.disabled = true;
                sortBtn.disabled = true;
                stepsContainer.innerHTML = '';
                steps = [];
                currentStep = 0;
                recursionLevel = 0;
                
                // Initial steps
                addStep("Starting Quick Sort Algorithm", true);
                addStep("Select a pivot element", false);
                addStep("Partition the array around the pivot", false);
                addStep("Recursively sort the sub-arrays", false);
                
                // Create a copy of the array to sort
                const sortingArray = [...array];
                
                // Perform quick sort with visualization
                await quickSort(sortingArray, 0, sortingArray.length - 1);
                
                // Final visualization - all elements sorted
                await updateVisualization(sortingArray, [], [], Array.from({length: sortingArray.length}, (_, i) => i));
                
                addStep("Quick Sort completed! Array is now sorted", true);
                updateSteps(steps.length);
                
                isSorting = false;
                generateBtn.disabled = false;
                sortBtn.disabled = false;
                
                // Update the original array
                array = [...sortingArray];
            }

            async function quickSort(arr, low, high) {
                if (low < high) {
                    recursionLevel++;
                    recursionLevelDisplay.textContent = `Recursion Level: ${recursionLevel}`;
                    
                    addStep(`Starting new partition from index ${low} to ${high}`, true);
                    updateSteps(1);
                    await new Promise(resolve => setTimeout(resolve, animationSpeed));
                    
                    // Visualize the current partition range
                    renderArray({start: low, end: high});
                    await new Promise(resolve => setTimeout(resolve, animationSpeed));
                    
                    // Find partition index
                    const pi = await partition(arr, low, high);
                    
                    addStep(`Partition complete. Pivot ${arr[pi]} is now at correct position (index ${pi})`, true);
                    updateSteps(2);
                    
                    // Mark pivot as sorted
                    await updateVisualization(arr, [], [], [pi], -1, {start: low, end: high});
                    
                    // Recursively sort elements before and after partition
                    addStep(`Recursively sorting left partition (${low} to ${pi-1})`, true);
                    updateSteps(3);
                    await quickSort(arr, low, pi - 1);
                    
                    addStep(`Recursively sorting right partition (${pi+1} to ${high})`, true);
                    updateSteps(3);
                    await quickSort(arr, pi + 1, high);
                    
                    recursionLevel--;
                    recursionLevelDisplay.textContent = recursionLevel > 0 ? `Recursion Level: ${recursionLevel}` : '';
                } else if (low === high) {
                    // Single element is already sorted
                    addStep(`Single element at index ${low} is already sorted`, true);
                    updateSteps(1);
                    await updateVisualization(arr, [], [], [low], -1);
                }
            }

            async function partition(arr, low, high) {
                // Choose the last element as pivot
                const pivot = arr[high];
                let i = low - 1; // Index of smaller element
                
                addStep(`Selected pivot: ${pivot} (at index ${high})`, true);
                updateSteps(1);
                await updateVisualization(arr, [], [], [], high, {start: low, end: high});
                
                for (let j = low; j < high; j++) {
                    addStep(`Comparing element ${arr[j]} (index ${j}) with pivot ${pivot}`, true);
                    updateSteps(1);
                    
                    // Highlight elements being compared
                    await updateVisualization(arr, [j, high], [], [], high, {start: low, end: high});
                    
                    // If current element is smaller than the pivot
                    if (arr[j] < pivot) {
                        i++; // Increment index of smaller element
                        
                        if (i !== j) {
                            addStep(`${arr[j]} < ${pivot}, swapping with element at index ${i} (${arr[i]})`, true);
                            updateSteps(1);
                            
                            // Highlight elements being swapped
                            await updateVisualization(arr, [], [i, j], [], high, {start: low, end: high});
                            
                            // Swap arr[i] and arr[j]
                            [arr[i], arr[j]] = [arr[j], arr[i]];
                            
                            // Show the swap result
                            await updateVisualization(arr, [], [i, j], [], high, {start: low, end: high});
                        } else {
                            addStep(`${arr[j]} < ${pivot} but no swap needed (i = j = ${i})`, true);
                            updateSteps(1);
                            await new Promise(resolve => setTimeout(resolve, animationSpeed));
                        }
                    } else {
                        addStep(`${arr[j]} >= ${pivot}, moving to next element`, true);
                        updateSteps(1);
                        await new Promise(resolve => setTimeout(resolve, animationSpeed));
                    }
                }
                
                // Swap the pivot element with the element at i+1
                addStep(`Placing pivot ${pivot} in correct position at index ${i+1}`, true);
                updateSteps(1);
                await updateVisualization(arr, [], [i+1, high], [], high, {start: low, end: high});
                
                [arr[i+1], arr[high]] = [arr[high], arr[i+1]];
                
                // Show the final swap
                await updateVisualization(arr, [], [i+1, high], [], -1, {start: low, end: high});
                
                // Return the partition index
                return i + 1;
            }

            async function updateVisualization(arr, comparingIndices = [], swappingIndices = [], sortedIndices = [], pivotIndex = -1, highlightRange = null) {
                // Update array visualization
                const boxes = document.querySelectorAll('.array-box');
                
                // Clear any existing partition highlights
                const existingHighlights = document.querySelectorAll('.partition-highlight');
                existingHighlights.forEach(el => el.remove());
                
                // Add new partition highlight if specified
                if (highlightRange && highlightRange.start !== highlightRange.end) {
                    const highlight = document.createElement('div');
                    highlight.className = 'partition-highlight';
                    
                    const startBox = boxes[highlightRange.start];
                    const endBox = boxes[highlightRange.end];
                    const containerRect = arrayContainer.getBoundingClientRect();
                    const startRect = startBox.getBoundingClientRect();
                    const endRect = endBox.getBoundingClientRect();
                    
                    highlight.style.position = 'absolute';
                    highlight.style.left = `${startRect.left - containerRect.left}px`;
                    highlight.style.width = `${endRect.right - startRect.left}px`;
                    highlight.style.height = `${startRect.height}px`;
                    
                    const label = document.createElement('div');
                    label.className = 'partition-label';
                    label.textContent = `Partition ${highlightRange.start}-${highlightRange.end}`;
                    highlight.appendChild(label);
                    
                    arrayContainer.appendChild(highlight);
                    highlight.style.zIndex = '-1';
                }
                
                arr.forEach((value, index) => {
                    const box = boxes[index];
                    box.textContent = value;
                    
                    // Reset classes
                    box.className = 'array-box';
                    
                    // Add appropriate classes
                    if (comparingIndices.includes(index)) {
                        box.classList.add('comparing');
                    } else if (swappingIndices.includes(index)) {
                        box.classList.add('swapping');
                    } else if (sortedIndices.includes(index)) {
                        box.classList.add('sorted');
                    } else if (highlightRange && index >= highlightRange.start && index <= highlightRange.end) {
                        box.classList.add('partition');
                    } else {
                        box.classList.add('normal');
                    }
                    
                    if (index === pivotIndex) {
                        box.classList.add('pivot');
                    }
                });
                
                // Add delay for animation
                await new Promise(resolve => setTimeout(resolve, animationSpeed));
            }
        });
    </script>
</body>
</html>