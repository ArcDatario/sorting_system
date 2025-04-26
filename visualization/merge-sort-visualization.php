<style>
        .merge-sort-visualizer {
            max-width: 800px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }
        .merge-sort-title {
            text-align: center;
            color: #2c3e50;
        }
        .merge-sort-controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .merge-sort-btn {
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .merge-sort-btn:hover {
            background-color: #2980b9;
        }
        .merge-sort-btn:disabled {
            background-color: #95a5a6;
            cursor: not-allowed;
        }
        .merge-sort-slider-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .merge-sort-visualization {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        .merge-sort-tree {
           
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-direction: column;
            gap: 20px;
            padding: 15px;
            background-color: #f5f5f5;
            border-radius: 4px;
            min-height: 60px;
        }
        .merge-sort-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
           margin: 0 20px;
        }
        .merge-sort-values {
            display: flex;
            gap: 5px;
        }
        .merge-sort-bubble {
            padding: 10px;
            border-radius: 8px;
            background: #3498db;
            color: white;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            min-width: 30px;
            text-align: center;
            transition: all 0.3s;
        }
        .merge-sort-status {
            text-align: center;
            font-weight: bold;
            color: #2c3e50;
            min-height: 24px;
        }
        .merge-sort-steps {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 4px;
            max-height: 200px;
            overflow-y: auto;
        }
        .merge-sort-children {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        
        /* State classes */
        .merge-sort-unsorted { background-color: #3498db; }
        .merge-sort-divided { background-color: #e74c3c; }
        .merge-sort-comparing { background-color: #f39c12; }
        .merge-sort-merging { background-color: #9b59b6; }
        .merge-sort-sorted { background-color: #2ecc71; }
        
        .merge-sort-legend {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .merge-sort-legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .merge-sort-color-box {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }
        body.dark-mode #merge-sort-tree {
        background-color: #333;
    }
    body.dark-mode #merge-sort-steps {
        background-color: var(--background);
        color: white;
    }
    </style>
<main class="main-content  merge-sort" id="merge-sort" style="display:none;">
<h1 class="merge-sort-title">Merge Sort Tree Visualization</h1>
        
        <div class="merge-sort-controls">
            <button id="merge-sort-generate-btn" class="merge-sort-btn">Generate New Array</button>
            <button id="merge-sort-prev-btn" class="merge-sort-btn" disabled>Previous Step</button>
            <button id="merge-sort-next-btn" class="merge-sort-btn">Next Step</button>
            <button id="merge-sort-auto-btn" class="merge-sort-btn">Auto Sort</button>
            <div class="merge-sort-slider-container">
                <label for="merge-sort-size-slider">Size:</label>
                <input type="range" id="merge-sort-size-slider" min="4" max="12" value="8">
                <span id="merge-sort-size-value">8</span>
            </div>
        </div>
        
        <div class="merge-sort-visualization">
            <div id="merge-sort-status" class="merge-sort-status">Ready to start</div>
            <div id="merge-sort-tree" class="merge-sort-tree"></div>
            <div id="merge-sort-steps" class="merge-sort-steps"></div>
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
            const mergeSortTreeContainer = document.getElementById('merge-sort-tree');
            const mergeSortGenerateBtn = document.getElementById('merge-sort-generate-btn');
            const mergeSortPrevBtn = document.getElementById('merge-sort-prev-btn');
            const mergeSortNextBtn = document.getElementById('merge-sort-next-btn');
            const mergeSortAutoBtn = document.getElementById('merge-sort-auto-btn');
            const mergeSortStatusElement = document.getElementById('merge-sort-status');
            const mergeSortStepsElement = document.getElementById('merge-sort-steps');
            
            // Merge Sort specific variables
            let mergeSortArray = [];
            let mergeSortArraySize = parseInt(mergeSortSizeSlider.value);
            let mergeSortSteps = [];
            let mergeSortCurrentStep = 0;
            let mergeSortNodeElements = [];
            let mergeSortNodeContainers = [];
            let mergeSortHistory = [];
            let autoSortInterval = null;
            let autoSortSpeed = 1000; // Default speed in milliseconds
            
            // Initialize
            updateMergeSortSizeValue();
            generateNewMergeSortArray();
            
            // Event listeners
            mergeSortGenerateBtn.addEventListener('click', generateNewMergeSortArray);
            mergeSortPrevBtn.addEventListener('click', previousMergeSortStep);
            mergeSortNextBtn.addEventListener('click', nextMergeSortStep);
            mergeSortAutoBtn.addEventListener('click', toggleAutoSort);
            mergeSortSizeSlider.addEventListener('input', updateMergeSortSizeValue);
            
            // Functions
            function updateMergeSortSizeValue() {
                mergeSortArraySize = parseInt(mergeSortSizeSlider.value);
                mergeSortSizeValue.textContent = mergeSortArraySize;
                generateNewMergeSortArray();
            }
            
            function generateNewMergeSortArray() {
                // Stop auto sort if running
                stopAutoSort();
                
                mergeSortArray = [];
                for (let i = 0; i < mergeSortArraySize; i++) {
                    mergeSortArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                resetMergeSortVisualization();
                buildMergeSortTreeStructure();
            }
            
            function resetMergeSortVisualization() {
                // Stop auto sort if running
                stopAutoSort();
                
                mergeSortSteps = [];
                mergeSortCurrentStep = 0;
                mergeSortNodeElements = [];
                mergeSortNodeContainers = [];
                mergeSortTreeContainer.innerHTML = '';
                mergeSortStepsElement.innerHTML = '';
                mergeSortStatusElement.textContent = 'Ready to start';
                mergeSortNextBtn.disabled = false;
                mergeSortPrevBtn.disabled = true;
                mergeSortAutoBtn.textContent = 'Auto Sort';
                mergeSortHistory = [];
            }
            
            function buildMergeSortTreeStructure() {
                const treeData = buildMergeSortTree(mergeSortArray, 0, mergeSortArray.length - 1);
                const renderedTree = renderMergeSortTree(treeData, mergeSortNodeContainers);
                mergeSortTreeContainer.appendChild(renderedTree);
                generateMergeSortSteps(mergeSortArray.slice(), 0, mergeSortArray.length - 1);
            }
            
            function buildMergeSortTree(arr, start, end) {
                if (start === end) {
                    return {
                        value: [arr[start]],
                        left: null,
                        right: null,
                        range: [start, end],
                    };
                }
                const mid = Math.floor((start + end) / 2);
                const left = buildMergeSortTree(arr, start, mid);
                const right = buildMergeSortTree(arr, mid + 1, end);
                const combined = arr.slice(start, end + 1);
                return { value: combined, left, right, range: [start, end] };
            }
            
            function renderMergeSortTree(node, nodeList = []) {
                const div = document.createElement('div');
                div.className = 'merge-sort-node';
    
                const valueContainer = document.createElement('div');
                valueContainer.className = 'merge-sort-values';
                valueContainer.dataset.range = node.range.join('-');
                nodeList.push({ range: node.range, container: valueContainer, node });
                mergeSortNodeContainers.push({
                    range: node.range,
                    container: valueContainer,
                });
    
                node.value.forEach((num) => {
                    const bubble = document.createElement('div');
                    bubble.className = 'merge-sort-bubble merge-sort-unsorted';
                    bubble.textContent = num;
                    valueContainer.appendChild(bubble);
                    mergeSortNodeElements.push(bubble);
                });
    
                div.appendChild(valueContainer);
    
                if (node.left || node.right) {
                    const children = document.createElement('div');
                    children.className = 'merge-sort-children';
                    if (node.left) children.appendChild(renderMergeSortTree(node.left, nodeList));
                    if (node.right) children.appendChild(renderMergeSortTree(node.right, nodeList));
                    div.appendChild(children);
                }
    
                return div;
            }
            
            function findMergeSortContainer(range) {
                return mergeSortNodeContainers.find(
                    (r) => r.range[0] === range[0] && r.range[1] === range[1]
                );
            }
            
            function generateMergeSortSteps(arr, start, end) {
                if (start === end) return;
    
                const mid = Math.floor((start + end) / 2);
                generateMergeSortSteps(arr, start, mid);
                generateMergeSortSteps(arr, mid + 1, end);
    
                let i = start,
                    j = mid + 1,
                    temp = [];
                const original = arr.slice(start, end + 1);
                const container = findMergeSortContainer([start, end]);
    
                // Add step for dividing
                mergeSortSteps.push({
                    type: `Dividing array from index ${start} to ${end}`,
                    subarrays: [
                        { container: container.container, start: 0, end: original.length - 1 }
                    ],
                    state: 'divided'
                });
    
                while (i <= mid && j <= end) {
                    const leftContainer = findMergeSortContainer([start, mid]);
                    const rightContainer = findMergeSortContainer([mid + 1, end]);
    
                    let leftIndex = i - leftContainer.range[0];
                    let rightIndex = j - rightContainer.range[0];
    
                    mergeSortSteps.push({
                        type: `Comparing ${arr[i]} and ${arr[j]}`,
                        subarrays: [
                            {
                                container: leftContainer.container,
                                start: leftIndex,
                                end: leftIndex,
                                state: 'comparing'
                            },
                            {
                                container: rightContainer.container,
                                start: rightIndex,
                                end: rightIndex,
                                state: 'comparing'
                            }
                        ]
                    });
    
                    if (arr[i] <= arr[j]) {
                        temp.push(arr[i++]);
                    } else {
                        temp.push(arr[j++]);
                    }
    
                    mergeSortSteps.push({
                        type: `Placing ${temp[temp.length - 1]} in merged array`,
                        subarrays: [
                            {
                                container: container.container,
                                start: 0,
                                end: temp.length - 1,
                                state: 'merging',
                                newValues: [...temp]
                            }
                        ]
                    });
                }
    
                while (i <= mid) {
                    temp.push(arr[i++]);
                    mergeSortSteps.push({
                        type: `Placing remaining element ${temp[temp.length - 1]}`,
                        subarrays: [
                            {
                                container: container.container,
                                start: 0,
                                end: temp.length - 1,
                                state: 'merging',
                                newValues: [...temp]
                            }
                        ]
                    });
                }
    
                while (j <= end) {
                    temp.push(arr[j++]);
                    mergeSortSteps.push({
                        type: `Placing remaining element ${temp[temp.length - 1]}`,
                        subarrays: [
                            {
                                container: container.container,
                                start: 0,
                                end: temp.length - 1,
                                state: 'merging',
                                newValues: [...temp]
                            }
                        ]
                    });
                }
    
                for (let k = start; k <= end; k++) {
                    arr[k] = temp[k - start];
                }
    
                mergeSortSteps.push({
                    type: `Subarray from ${start} to ${end} is now sorted`,
                    subarrays: [
                        { 
                            container: container.container, 
                            start: 0, 
                            end: temp.length - 1,
                            state: 'sorted',
                            newValues: [...temp]
                        }
                    ]
                });
            }
            
            function nextMergeSortStep() {
                if (mergeSortCurrentStep >= mergeSortSteps.length) {
                    mergeSortStatusElement.textContent = "Merge Sort completed!";
                    mergeSortNextBtn.disabled = true;
                    stopAutoSort();
                    return;
                }
                
                // Save current state to history before moving forward
                saveMergeSortStateToHistory();
                
                applyMergeSortStep(mergeSortSteps[mergeSortCurrentStep]);
                mergeSortCurrentStep++;
                
                // Update button states
                mergeSortPrevBtn.disabled = mergeSortCurrentStep === 0;
                mergeSortNextBtn.disabled = mergeSortCurrentStep >= mergeSortSteps.length;
            }
            
            function previousMergeSortStep() {
                if (mergeSortCurrentStep <= 0) return;
                
                mergeSortCurrentStep--;
                restoreMergeSortStateFromHistory();
                
                // Update button states
                mergeSortPrevBtn.disabled = mergeSortCurrentStep === 0;
                mergeSortNextBtn.disabled = false;
            }
            
            function toggleAutoSort() {
                if (autoSortInterval) {
                    stopAutoSort();
                } else {
                    startAutoSort();
                }
            }
            
            function startAutoSort() {
                // If we're at the end, reset to beginning
                if (mergeSortCurrentStep >= mergeSortSteps.length) {
                    resetMergeSortVisualization();
                    buildMergeSortTreeStructure();
                }
                
                mergeSortAutoBtn.textContent = 'Stop Auto Sort';
                mergeSortNextBtn.disabled = true;
                mergeSortPrevBtn.disabled = true;
                mergeSortGenerateBtn.disabled = true;
                
                autoSortInterval = setInterval(() => {
                    nextMergeSortStep();
                    
                    // Stop when we reach the end
                    if (mergeSortCurrentStep >= mergeSortSteps.length) {
                        stopAutoSort();
                    }
                }, autoSortSpeed);
            }
            
            function stopAutoSort() {
                if (autoSortInterval) {
                    clearInterval(autoSortInterval);
                    autoSortInterval = null;
                }
                
                mergeSortAutoBtn.textContent = 'Auto Sort';
                mergeSortNextBtn.disabled = mergeSortCurrentStep >= mergeSortSteps.length;
                mergeSortPrevBtn.disabled = mergeSortCurrentStep === 0;
                mergeSortGenerateBtn.disabled = false;
            }
            
            function saveMergeSortStateToHistory() {
                const currentState = {
                    stepIndex: mergeSortCurrentStep,
                    elements: []
                };
                
                // Save all bubble states and values
                mergeSortNodeElements.forEach((bubble, index) => {
                    currentState.elements.push({
                        className: bubble.className,
                        textContent: bubble.textContent
                    });
                });
                
                mergeSortHistory.push(currentState);
            }
            
            function restoreMergeSortStateFromHistory() {
                if (mergeSortHistory.length === 0) return;
                
                // Find the state in history that matches our step index
                let stateToRestore = null;
                for (let i = mergeSortHistory.length - 1; i >= 0; i--) {
                    if (mergeSortHistory[i].stepIndex === mergeSortCurrentStep - 1) {
                        stateToRestore = mergeSortHistory[i];
                        break;
                    }
                }
                
                if (!stateToRestore) return;
                
                // Restore bubble states and values
                stateToRestore.elements.forEach((elementState, index) => {
                    if (mergeSortNodeElements[index]) {
                        mergeSortNodeElements[index].className = elementState.className;
                        mergeSortNodeElements[index].textContent = elementState.textContent;
                    }
                });
                
                // Restore status and steps
                if (mergeSortCurrentStep > 0) {
                    mergeSortStatusElement.textContent = mergeSortSteps[mergeSortCurrentStep - 1].type;
                } else {
                    mergeSortStatusElement.textContent = 'Ready to start';
                }
                
                // Rebuild steps list up to current step
                mergeSortStepsElement.innerHTML = '';
                for (let i = 0; i < mergeSortCurrentStep; i++) {
                    addMergeSortStep(mergeSortSteps[i].type);
                }
            }
            
            function applyMergeSortStep(step) {
                // Reset all bubbles to unsorted state first
                mergeSortNodeElements.forEach(bubble => {
                    bubble.className = 'merge-sort-bubble merge-sort-unsorted';
                });
    
                mergeSortStatusElement.textContent = step.type;
                addMergeSortStep(step.type);
    
                step.subarrays.forEach(sub => {
                    if (sub.newValues) {
                        // Update values if needed
                        for (let i = sub.start; i <= sub.end; i++) {
                            if (sub.container.children[i]) {
                                sub.container.children[i].textContent = sub.newValues[i];
                            }
                        }
                    }
                    
                    // Apply state classes
                    for (let i = sub.start; i <= sub.end; i++) {
                        if (sub.container.children[i]) {
                            sub.container.children[i].className = `merge-sort-bubble merge-sort-${sub.state || 'unsorted'}`;
                        }
                    }
                });
            }
            
            function addMergeSortStep(description) {
                const step = document.createElement('div');
                step.textContent = description;
                mergeSortStepsElement.appendChild(step);
                mergeSortStepsElement.scrollTop = mergeSortStepsElement.scrollHeight;
            }
        });
    </script>