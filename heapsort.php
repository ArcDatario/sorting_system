<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heap Sort Visualization</title>
    
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px;
    color: #333;
}

.container {
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

#array-container {
    display: flex;
    height: 200px;
    align-items: flex-end;
    justify-content: center;
    gap: 2px;
    padding: 10px;
    background-color: #ecf0f1;
    border-radius: 4px;
    margin-bottom: 20px;
}

.array-bar {
    width: 40px;
    background-color: #3498db;
    transition: height 0.3s, background-color 0.3s;
    border-radius: 3px 3px 0 0;
    position: relative;
}

.array-bar.comparing {
    background-color: #e74c3c;
}

.array-bar.swapping {
    background-color: #f39c12;
}

.array-bar.sorted {
    background-color: #2ecc71;
}

.array-bar.heap-node {
    background-color: #9b59b6;
}

.array-bar-label {
    position: absolute;
    top: -25px;
    width: 100%;
    text-align: center;
    font-size: 12px;
    font-weight: bold;
}

#heap-container {
    position: relative;
    height: 300px;
    margin: 20px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.heap-level {
    display: flex;
    justify-content: center;
    gap: 60px;
    margin-bottom: 40px;
}

.heap-node {
    width: 40px;
    height: 40px;
    background-color: #9b59b6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    position: relative;
    z-index: 2;
}

.heap-node.comparing {
    background-color: #e74c3c;
}

.heap-node.swapping {
    background-color: #f39c12;
}

.heap-node.sorted {
    background-color: #2ecc71;
}

.connection-line {
    position: absolute;
    background-color: #7f8c8d;
    height: 2px;
    transform-origin: 0 0;
    z-index: 1;
}

.hidden {
    display: none;
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

.color-box.comparing {
    background-color: #e74c3c;
}

.color-box.swapping {
    background-color: #f39c12;
}

.color-box.sorted {
    background-color: #2ecc71;
}

.color-box.heap-node {
    background-color: #9b59b6;
}

#steps-container {
    margin-top: 20px;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 5px;
    border-left: 4px solid #3498db;
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
    </style>

</head>
<body>
    <div class="container">
    <main class="main-content heap-sort" id="heap-sort" style="display:block;">
        <h1>Heap Sort Visualization</h1>

        <div class="controls">
            <button id="generate-btn">Generate New Array</button>
            <button id="sort-btn">Heap Sort</button>
            <div class="slider-container">
                <label for="size-slider">Array Size:</label>
                <input type="range" id="size-slider" min="5" max="10" value="5">
                <span id="size-value">5</span>
            </div>
            <div class="slider-container">
                <label for="speed-slider">Speed:</label>
                <input type="range" id="speed-slider" min="1" max="10" value="5">
                <span id="speed-value">5</span>
            </div>
        </div>
        <div id="visualization">
            <div id="array-container"></div>
            <div id="heap-container" class="hidden"></div>
            <div id="steps-container"></div>
        </div>
        <div class="legend">
            <div class="legend-item">
                <div class="color-box comparing"></div>
                <span>Comparing</span>
            </div>
            <div class="legend-item">
                <div class="color-box swapping"></div>
                <span>Swapping</span>
            </div>
            <div class="legend-item">
                <div class="color-box sorted"></div>
                <span>Sorted</span>
            </div>
            <div class="legend-item">
                <div class="color-box heap-node"></div>
                <span>Heap Node</span>
            </div>
        </div>
</main>
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const arrayContainer = document.getElementById('array-container');
    const heapContainer = document.getElementById('heap-container');
    const stepsContainer = document.getElementById('steps-container');
    const generateBtn = document.getElementById('generate-btn');
    const sortBtn = document.getElementById('sort-btn');
    const sizeSlider = document.getElementById('size-slider');
    const sizeValue = document.getElementById('size-value');
    const speedSlider = document.getElementById('speed-slider');
    const speedValue = document.getElementById('speed-value');

    // Variables
    let array = [];
    let arraySize = parseInt(sizeSlider.value);
    let sortSpeed = parseInt(speedSlider.value);
    let isSorting = false;
    let animationSpeed = 1000 / sortSpeed;
    let steps = [];
    let currentStep = 0;

    // Initialize
    updateSizeValue();
    updateSpeedValue();
    generateNewArray();

    // Event listeners
    generateBtn.addEventListener('click', generateNewArray);
    sortBtn.addEventListener('click', startHeapSort);
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
        heapContainer.classList.add('hidden');
        stepsContainer.innerHTML = '';
        steps = [];
        currentStep = 0;
    }

    function renderArray() {
        arrayContainer.innerHTML = '';
        const maxValue = Math.max(...array, 1);
        
        array.forEach((value, index) => {
            const bar = document.createElement('div');
            bar.className = 'array-bar';
            bar.style.height = `${(value / maxValue) * 100}%`;
            
            const label = document.createElement('div');
            label.className = 'array-bar-label';
            label.textContent = value;
            
            bar.appendChild(label);
            bar.setAttribute('data-index', index);
            arrayContainer.appendChild(bar);
        });
    }

    function renderHeap(heapArray, highlightedIndices = [], swapIndices = [], sortedIndices = []) {
        heapContainer.innerHTML = '';
        heapContainer.classList.remove('hidden');
        
        if (heapArray.length === 0) return;
        
        // Calculate heap levels
        const levels = Math.ceil(Math.log2(heapArray.length + 1));
        const nodePositions = [];
        const nodeSize = 40;
        const levelHeight = 80;
        
        // Create heap levels and nodes
        for (let level = 0; level < levels; level++) {
            const levelStart = Math.pow(2, level) - 1;
            const levelEnd = Math.min(Math.pow(2, level + 1) - 1, heapArray.length);
            const nodesInLevel = levelEnd - levelStart;
            
            const levelDiv = document.createElement('div');
            levelDiv.className = 'heap-level';
            levelDiv.style.marginTop = level === 0 ? '0' : '40px';
            
            for (let i = levelStart; i < levelEnd; i++) {
                const node = document.createElement('div');
                node.className = 'heap-node';
                
                if (highlightedIndices.includes(i)) {
                    node.classList.add('comparing');
                } else if (swapIndices.includes(i)) {
                    node.classList.add('swapping');
                } else if (sortedIndices.includes(i)) {
                    node.classList.add('sorted');
                }
                
                node.textContent = heapArray[i];
                node.setAttribute('data-index', i);
                
                // Calculate position
                const levelWidth = Math.pow(2, levels - level - 1) * (nodeSize + 60);
                const posX = (i - levelStart) * levelWidth + (levelWidth / 2) - (nodeSize / 2);
                const posY = level * levelHeight;
                
                node.style.left = `${posX}px`;
                node.style.top = `${posY}px`;
                node.style.position = 'absolute';
                
                nodePositions[i] = { x: posX + nodeSize / 2, y: posY + nodeSize / 2 };
                
                levelDiv.appendChild(node);
            }
            
            heapContainer.appendChild(levelDiv);
        }
        
        // Draw connections between nodes
        for (let i = 0; i < heapArray.length; i++) {
            const leftChild = 2 * i + 1;
            const rightChild = 2 * i + 2;
            
            if (leftChild < heapArray.length && nodePositions[i] && nodePositions[leftChild]) {
                drawConnection(nodePositions[i], nodePositions[leftChild], 'left');
            }
            
            if (rightChild < heapArray.length && nodePositions[i] && nodePositions[rightChild]) {
                drawConnection(nodePositions[i], nodePositions[rightChild], 'right');
            }
        }
    }

    function drawConnection(from, to, direction) {
        const line = document.createElement('div');
        line.className = 'connection-line';
        
        const length = Math.sqrt(Math.pow(to.x - from.x, 2) + Math.pow(to.y - from.y, 2));
        const angle = Math.atan2(to.y - from.y, to.x - from.x) * 180 / Math.PI;
        
        line.style.width = `${length}px`;
        line.style.left = `${from.x}px`;
        line.style.top = `${from.y}px`;
        line.style.transform = `rotate(${angle}deg)`;
        
        heapContainer.appendChild(line);
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

    async function startHeapSort() {
        if (isSorting) return;
        
        isSorting = true;
        generateBtn.disabled = true;
        sortBtn.disabled = true;
        stepsContainer.innerHTML = '';
        steps = [];
        currentStep = 0;
        
        // Initial steps
        addStep("Starting Heap Sort Algorithm", true);
        addStep("Building Max Heap from the array");
        addStep("After building max heap, the largest element is at the root");
        addStep("We will repeatedly extract the largest element and rebuild the heap");
        
        // Create a copy of the array to sort
        const sortingArray = [...array];
        
        // Perform heap sort with visualization
        await heapSort(sortingArray);
        
        addStep("Heap Sort completed!", false);
        updateSteps(steps.length);
        
        isSorting = false;
        generateBtn.disabled = false;
        sortBtn.disabled = false;
    }

    async function heapSort(arr) {
        const n = arr.length;
        let sortedIndices = [];
        
        // Build max heap
        addStep("Building max heap...", true);
        updateSteps(1);
        await new Promise(resolve => setTimeout(resolve, animationSpeed));
        
        for (let i = Math.floor(n / 2) - 1; i >= 0; i--) {
            addStep(`Heapifying subtree rooted at index ${i}`, true);
            updateSteps(1);
            await heapify(arr, n, i, sortedIndices);
        }
        
        addStep("Max heap built successfully", true);
        updateSteps(2);
        await new Promise(resolve => setTimeout(resolve, animationSpeed));
        
        // Heap sort
        for (let i = n - 1; i > 0; i--) {
            addStep(`Moving root element (${arr[0]}) to end at position ${i}`, true);
            updateSteps(3);
            
            // Move current root to end
            await swap(arr, 0, i);
            sortedIndices.push(i);
            
            addStep(`Heapifying the reduced heap (size ${i})`, true);
            updateSteps(3);
            
            // Heapify the reduced heap
            await heapify(arr, i, 0, sortedIndices);
        }
        
        sortedIndices.push(0);
        
        // Final visualization
        await updateVisualization(arr, [], [], sortedIndices);
        
        addStep("Array is now completely sorted", true);
        updateSteps(4);
        
        // Update the original array
        array = [...arr];
    }

    async function heapify(arr, n, i, sortedIndices) {
        let largest = i;
        const left = 2 * i + 1;
        const right = 2 * i + 2;
        
        // Compare with left child
        if (left < n) {
            addStep(`Comparing parent (${arr[i]}) with left child (${arr[left]})`, true);
            updateSteps(1);
            await updateVisualization(arr, [i, left], [], sortedIndices);
            
            if (arr[left] > arr[largest]) {
                largest = left;
                addStep(`Left child is larger (${arr[left]} > ${arr[i]})`, true);
                updateSteps(1);
            }
        }
        
        // Compare with right child
        if (right < n) {
            addStep(`Comparing parent (${arr[i]}) with right child (${arr[right]})`, true);
            updateSteps(1);
            await updateVisualization(arr, [i, right], [], sortedIndices);
            
            if (arr[right] > arr[largest]) {
                largest = right;
                addStep(`Right child is larger (${arr[right]} > ${arr[i]})`, true);
                updateSteps(1);
            }
        }
        
        // If largest is not root
        if (largest !== i) {
            addStep(`Swapping parent (${arr[i]}) with larger child (${arr[largest]})`, true);
            updateSteps(1);
            await swap(arr, i, largest);
            
            addStep(`Recursively heapifying affected subtree`, true);
            updateSteps(1);
            await heapify(arr, n, largest, sortedIndices);
        } else {
            addStep(`Subtree rooted at index ${i} satisfies heap property`, true);
            updateSteps(1);
        }
    }

    async function swap(arr, i, j) {
        await updateVisualization(arr, [i, j], [i, j]);
        
        const temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
        
        addStep(`Swapped elements at indices ${i} and ${j}`, true);
        updateSteps(1);
        
        await updateVisualization(arr, [], [i, j]);
    }

    async function updateVisualization(arr, highlightedIndices = [], swapIndices = [], sortedIndices = []) {
        // Update array visualization
        const bars = document.querySelectorAll('.array-bar');
        const maxValue = Math.max(...arr, 1);
        
        arr.forEach((value, index) => {
            const bar = bars[index];
            bar.style.height = `${(value / maxValue) * 100}%`;
            bar.querySelector('.array-bar-label').textContent = value;
            
            // Reset classes
            bar.className = 'array-bar';
            
            // Add appropriate classes
            if (highlightedIndices.includes(index)) {
                bar.classList.add('comparing');
            } else if (swapIndices.includes(index)) {
                bar.classList.add('swapping');
            } else if (sortedIndices.includes(index)) {
                bar.classList.add('sorted');
            }
        });
        
        // Update heap visualization
        renderHeap(arr, highlightedIndices, swapIndices, sortedIndices);
        
        // Add delay for animation
        await new Promise(resolve => setTimeout(resolve, animationSpeed));
    }
});
    </script>

</body>
</html>