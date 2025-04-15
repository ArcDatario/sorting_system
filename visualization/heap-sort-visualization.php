<style>
       
       h1 {
            text-align: center;
            color: #4ec9b0 !important;
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

        #heapsort-array-container {
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

        .heapsort-array-bar {
            width: 40px;
            background-color: #3498db;
            transition: height 0.3s, background-color 0.3s;
            border-radius: 3px 3px 0 0;
            position: relative;
        }

        .heapsort-array-bar.comparing {
            background-color: #e74c3c;
        }

        .heapsort-array-bar.swapping {
            background-color: #f39c12;
        }

        .heapsort-array-bar.sorted {
            background-color: #2ecc71;
        }

        .heapsort-array-bar.heap-node {
            background-color: #9b59b6;
        }

        .heapsort-array-bar-label {
            position: absolute;
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Adjust for centering */
    width: 100%;
    text-align: center;
    font-size: 12px;
    font-weight: bold;
    color: white; /* Ensure visibility inside the bar */
    pointer-events: none; /* Prevent interaction with the label */
        }

        #heapsort-heap-container {
            position: absolute;
            left: 35%;
            height: 300px;
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heapsort-heap-level {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-bottom: 40px;
        }

        .heapsort-heap-node {
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

        .heapsort-heap-node.comparing {
            background-color: #e74c3c;
        }

        .heapsort-heap-node.swapping {
            background-color: #f39c12;
        }

        .heapsort-heap-node.sorted {
            background-color: #2ecc71;
        }

        .heapsort-connection-line {
            position: absolute;
            background-color: #7f8c8d;
            height: 2px;
            transform-origin: 0 0;
            z-index: 1;
        }

        .heapsort-hidden {
            display: none;
        }

        .heapsort-legend {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .heapsort-legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
        }

        .heapsort-color-box {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }

        .heapsort-color-box.comparing {
            background-color: #e74c3c;
        }

        .heapsort-color-box.swapping {
            background-color: #f39c12;
        }

        .heapsort-color-box.sorted {
            background-color: #2ecc71;
        }

        .heapsort-color-box.heap-node {
            background-color: #9b59b6;
        }

        #heapsort-steps-container {
    margin-top: 350px;
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
#heapsort-steps-container::-webkit-scrollbar {
    width: 8px;
}

#heapsort-steps-container::-webkit-scrollbar-track {
    background: #f8f9fa;
    border-radius: 10px;
}

#heapsort-steps-container::-webkit-scrollbar-thumb {
    background-color: #4ec9b0;
    border-radius: 10px;
    border: 2px solid #f8f9fa;
}

#heapsort-steps-container::-webkit-scrollbar-thumb:hover {
    background-color: #3ab8a0;
}

        .heapsort-step {
            margin-bottom: 8px;
            font-size: 14px;
            line-height: 1.4;
        }

        .heapsort-step.active {
            font-weight: bold;
            color: #2c3e50;
        }

        .heapsort-step.completed {
            color: #27ae60;
        }
        body.dark-mode #heapsort-visualization {
        /* Set text color to white in dark mode */
    }
    body.dark-mode #heapsort-array-container {
        background-color: var(--background); /* Ensure steps text is also white */
    }
    body.dark-mode #heapsort-steps-container {
        background-color: var(--background);
        color: white;
    }
        
</style>


<main class="main-content heap-sort" id="heap-sort" style="display:block;">
        <h1>Heap Sort Visualization</h1>
        <div class="controls">
            <button id="heapsort-generate-btn">Generate New Array</button>
            <button id="heapsort-sort-btn">Heap Sort</button>
            <div class="slider-container">
                <label for="heapsort-size-slider">Array Size:</label>
                <input type="range" id="heapsort-size-slider" min="5" max="7" value="5">
                <span id="heapsort-size-value">5</span>
            </div>
            <div class="slider-container">
                <label for="heapsort-speed-slider">Speed:</label>
                <input type="range" id="heapsort-speed-slider" min="1" max="10" value="5">
                <span id="heapsort-speed-value">5</span>
            </div>
        </div>
        <div id="heapsort-visualization">
            <div id="heapsort-array-container"></div>
            <div id="heapsort-heap-container" class="heapsort-hidden"></div>
            <div id="heapsort-steps-container"></div>
        </div>
        <div class="heapsort-legend">
            <div class="heapsort-legend-item">
                <div class="heapsort-color-box comparing"></div>
                <span>Comparing</span>
            </div>
            <div class="heapsort-legend-item">
                <div class="heapsort-color-box swapping"></div>
                <span>Swapping</span>
            </div>
            <div class="heapsort-legend-item">
                <div class="heapsort-color-box sorted"></div>
                <span>Sorted</span>
            </div>
            <div class="heapsort-legend-item">
                <div class="heapsort-color-box heap-node"></div>
                <span>Heap Node</span>
            </div>
        </div>

    </main>


    <script>
           document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const heapsortArrayContainer = document.getElementById('heapsort-array-container');
            const heapsortHeapContainer = document.getElementById('heapsort-heap-container');
            const heapsortStepsContainer = document.getElementById('heapsort-steps-container');
            const heapsortGenerateBtn = document.getElementById('heapsort-generate-btn');
            const heapsortSortBtn = document.getElementById('heapsort-sort-btn');
            const heapsortSizeSlider = document.getElementById('heapsort-size-slider');
            const heapsortSizeValue = document.getElementById('heapsort-size-value');
            const heapsortSpeedSlider = document.getElementById('heapsort-speed-slider');
            const heapsortSpeedValue = document.getElementById('heapsort-speed-value');

            // Variables
            let heapsortArray = [];
            let heapsortArraySize = parseInt(heapsortSizeSlider.value);
            let heapsortSpeed = parseInt(heapsortSpeedSlider.value);
            let heapsortIsSorting = false;
            let heapsortAnimationSpeed = 1000 / heapsortSpeed;
            let heapsortSteps = [];
            let heapsortCurrentStep = 0;

            // Initialize
            heapsortUpdateSizeValue();
            heapsortUpdateSpeedValue();
            heapsortGenerateNewArray();

            // Event listeners
            heapsortGenerateBtn.addEventListener('click', heapsortGenerateNewArray);
            heapsortSortBtn.addEventListener('click', heapsortStartHeapSort);
            heapsortSizeSlider.addEventListener('input', heapsortUpdateSizeValue);
            heapsortSpeedSlider.addEventListener('input', heapsortUpdateSpeedValue);

            // Functions
            function heapsortUpdateSizeValue() {
                heapsortArraySize = parseInt(heapsortSizeSlider.value);
                heapsortSizeValue.textContent = heapsortArraySize;
                heapsortGenerateNewArray();
            }

            function heapsortUpdateSpeedValue() {
                heapsortSpeed = parseInt(heapsortSpeedSlider.value);
                heapsortSpeedValue.textContent = heapsortSpeed;
                heapsortAnimationSpeed = 1000 / heapsortSpeed;
            }

            function heapsortGenerateNewArray() {
                if (heapsortIsSorting) return;
                
                heapsortArray = [];
                for (let i = 0; i < heapsortArraySize; i++) {
                    heapsortArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                heapsortRenderArray();
                heapsortHeapContainer.classList.add('heapsort-hidden');
                heapsortStepsContainer.innerHTML = '';
                heapsortSteps = [];
                heapsortCurrentStep = 0;
            }

            function heapsortRenderArray() {
                heapsortArrayContainer.innerHTML = '';
                const maxValue = Math.max(...heapsortArray, 1);
                
                heapsortArray.forEach((value, index) => {
                    const bar = document.createElement('div');
                    bar.className = 'heapsort-array-bar';
                    bar.style.height = `${(value / maxValue) * 100}%`;
                    
                    const label = document.createElement('div');
                    label.className = 'heapsort-array-bar-label';
                    label.textContent = value;
                    
                    bar.appendChild(label);
                    bar.setAttribute('data-index', index);
                    heapsortArrayContainer.appendChild(bar);
                });
            }

            function heapsortRenderHeap(heapArray, highlightedIndices = [], swapIndices = [], sortedIndices = []) {
                heapsortHeapContainer.innerHTML = '';
                heapsortHeapContainer.classList.remove('heapsort-hidden');
                
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
                    levelDiv.className = 'heapsort-heap-level';
                    levelDiv.style.marginTop = level === 0 ? '0' : '40px';
                    
                    for (let i = levelStart; i < levelEnd; i++) {
                        const node = document.createElement('div');
                        node.className = 'heapsort-heap-node';
                        
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
                    
                    heapsortHeapContainer.appendChild(levelDiv);
                }
                
                // Draw connections between nodes
                for (let i = 0; i < heapArray.length; i++) {
                    const leftChild = 2 * i + 1;
                    const rightChild = 2 * i + 2;
                    
                    if (leftChild < heapArray.length && nodePositions[i] && nodePositions[leftChild]) {
                        heapsortDrawConnection(nodePositions[i], nodePositions[leftChild], 'left');
                    }
                    
                    if (rightChild < heapArray.length && nodePositions[i] && nodePositions[rightChild]) {
                        heapsortDrawConnection(nodePositions[i], nodePositions[rightChild], 'right');
                    }
                }
            }

            function heapsortDrawConnection(from, to, direction) {
                const line = document.createElement('div');
                line.className = 'heapsort-connection-line';
                
                const length = Math.sqrt(Math.pow(to.x - from.x, 2) + Math.pow(to.y - from.y, 2));
                const angle = Math.atan2(to.y - from.y, to.x - from.x) * 180 / Math.PI;
                
                line.style.width = `${length}px`;
                line.style.left = `${from.x}px`;
                line.style.top = `${from.y}px`;
                line.style.transform = `rotate(${angle}deg)`;
                
                heapsortHeapContainer.appendChild(line);
            }

            function heapsortAddStep(description, isActive = false) {
                const step = document.createElement('div');
                step.className = `heapsort-step ${isActive ? 'active' : ''}`;
                step.textContent = description;
                heapsortStepsContainer.appendChild(step);
                heapsortSteps.push(step);
                
                // Auto-scroll to the latest step
                heapsortStepsContainer.scrollTop = heapsortStepsContainer.scrollHeight;
            }

            function heapsortUpdateSteps(currentIndex) {
                heapsortSteps.forEach((step, index) => {
                    step.className = 'heapsort-step';
                    if (index < currentIndex) step.classList.add('completed');
                    if (index === currentIndex) step.classList.add('active');
                });
            }

            async function heapsortStartHeapSort() {
                if (heapsortIsSorting) return;
                
                heapsortIsSorting = true;
                heapsortGenerateBtn.disabled = true;
                heapsortSortBtn.disabled = true;
                heapsortStepsContainer.innerHTML = '';
                heapsortSteps = [];
                heapsortCurrentStep = 0;
                
                // Initial steps
                heapsortAddStep("Starting Heap Sort Algorithm", true);
                heapsortAddStep("Building Max Heap from the array");
                heapsortAddStep("After building max heap, the largest element is at the root");
                heapsortAddStep("We will repeatedly extract the largest element and rebuild the heap");
                
                // Create a copy of the array to sort
                const sortingArray = [...heapsortArray];
                
                // Perform heap sort with visualization
                await heapsortHeapSort(sortingArray);
                
                heapsortAddStep("Heap Sort completed!", false);
                heapsortUpdateSteps(heapsortSteps.length);
                
                heapsortIsSorting = false;
                heapsortGenerateBtn.disabled = false;
                heapsortSortBtn.disabled = false;
            }

            async function heapsortHeapSort(arr) {
                const n = arr.length;
                let sortedIndices = [];
                
                // Build max heap
                heapsortAddStep("Building max heap...", true);
                heapsortUpdateSteps(1);
                await new Promise(resolve => setTimeout(resolve, heapsortAnimationSpeed));
                
                for (let i = Math.floor(n / 2) - 1; i >= 0; i--) {
                    heapsortAddStep(`Heapifying subtree rooted at index ${i}`, true);
                    heapsortUpdateSteps(1);
                    await heapsortHeapify(arr, n, i, sortedIndices);
                }
                
                heapsortAddStep("Max heap built successfully", true);
                heapsortUpdateSteps(2);
                await new Promise(resolve => setTimeout(resolve, heapsortAnimationSpeed));
                
                // Heap sort
                for (let i = n - 1; i > 0; i--) {
                    heapsortAddStep(`Moving root element (${arr[0]}) to end at position ${i}`, true);
                    heapsortUpdateSteps(3);
                    
                    // Move current root to end
                    await heapsortSwap(arr, 0, i);
                    sortedIndices.push(i);
                    
                    heapsortAddStep(`Heapifying the reduced heap (size ${i})`, true);
                    heapsortUpdateSteps(3);
                    
                    // Heapify the reduced heap
                    await heapsortHeapify(arr, i, 0, sortedIndices);
                }
                
                sortedIndices.push(0);
                
                // Final visualization
                await heapsortUpdateVisualization(arr, [], [], sortedIndices);
                
                heapsortAddStep("Array is now completely sorted", true);
                heapsortUpdateSteps(4);
                
                // Update the original array
                heapsortArray = [...arr];
            }

            async function heapsortHeapify(arr, n, i, sortedIndices) {
                let largest = i;
                const left = 2 * i + 1;
                const right = 2 * i + 2;
                
                // Compare with left child
                if (left < n) {
                    heapsortAddStep(`Comparing parent (${arr[i]}) with left child (${arr[left]})`, true);
                    heapsortUpdateSteps(1);
                    await heapsortUpdateVisualization(arr, [i, left], [], sortedIndices);
                    
                    if (arr[left] > arr[largest]) {
                        largest = left;
                        heapsortAddStep(`Left child is larger (${arr[left]} > ${arr[i]})`, true);
                        heapsortUpdateSteps(1);
                    }
                }
                
                // Compare with right child
                if (right < n) {
                    heapsortAddStep(`Comparing parent (${arr[i]}) with right child (${arr[right]})`, true);
                    heapsortUpdateSteps(1);
                    await heapsortUpdateVisualization(arr, [i, right], [], sortedIndices);
                    
                    if (arr[right] > arr[largest]) {
                        largest = right;
                        heapsortAddStep(`Right child is larger (${arr[right]} > ${arr[i]})`, true);
                        heapsortUpdateSteps(1);
                    }
                }
                
                // If largest is not root
                if (largest !== i) {
                    heapsortAddStep(`Swapping parent (${arr[i]}) with larger child (${arr[largest]})`, true);
                    heapsortUpdateSteps(1);
                    await heapsortSwap(arr, i, largest);
                    
                    heapsortAddStep(`Recursively heapifying affected subtree`, true);
                    heapsortUpdateSteps(1);
                    await heapsortHeapify(arr, n, largest, sortedIndices);
                } else {
                    heapsortAddStep(`Subtree rooted at index ${i} satisfies heap property`, true);
                    heapsortUpdateSteps(1);
                }
            }

            async function heapsortSwap(arr, i, j) {
                await heapsortUpdateVisualization(arr, [i, j], [i, j]);
                
                const temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
                
                heapsortAddStep(`Swapped elements at indices ${i} and ${j}`, true);
                heapsortUpdateSteps(1);
                
                await heapsortUpdateVisualization(arr, [], [i, j]);
            }

            async function heapsortUpdateVisualization(arr, highlightedIndices = [], swapIndices = [], sortedIndices = []) {
                // Update array visualization
                const bars = document.querySelectorAll('.heapsort-array-bar');
                const maxValue = Math.max(...arr, 1);
                
                arr.forEach((value, index) => {
                    const bar = bars[index];
                    bar.style.height = `${(value / maxValue) * 100}%`;
                    bar.querySelector('.heapsort-array-bar-label').textContent = value;
                    
                    // Reset classes
                    bar.className = 'heapsort-array-bar';
                    
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
                heapsortRenderHeap(arr, highlightedIndices, swapIndices, sortedIndices);
                
                // Add delay for animation
                await new Promise(resolve => setTimeout(resolve, heapsortAnimationSpeed));
            }
        });
    </script>