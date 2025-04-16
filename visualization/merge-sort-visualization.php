<style>
    .merge-sort-container {
        max-width: 800px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
    }
    .controls {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 20px 0;
        flex-wrap: wrap;
    }
    button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
    }
    .visualization {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }
    .array-container {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        padding: 15px;
        background-color: #f5f5f5;
        border-radius: 4px;
        min-height: 60px;
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
    .status {
        text-align: center;
        font-weight: bold;
        color: #2c3e50;
        min-height: 24px;
    }
    .steps {
        margin-top: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 4px;
        max-height: 200px;
        overflow-y: auto;
    }
    .legend {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
</style>

<div class="merge-sort-container">
    <h1>Merge Sort Visualization</h1>
    
    <div class="controls">
        <button id="generate-btn">Generate New Array</button>
        <button id="sort-btn">Start Sorting</button>
        <div class="slider-container">
            <label for="size-slider">Size:</label>
            <input type="range" id="size-slider" min="4" max="20" value="8">
            <span id="size-value">8</span>
        </div>
        <div class="slider-container">
            <label for="speed-slider">Speed:</label>
            <input type="range" id="speed-slider" min="1" max="10" value="5">
            <span id="speed-value">5</span>
        </div>
    </div>
    
    <div class="visualization">
        <div id="status" class="status">Ready to sort</div>
        <div id="array-display" class="array-container"></div>
        <div id="steps" class="steps"></div>
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
        const arrayDisplay = document.getElementById('array-display');
        const generateBtn = document.getElementById('generate-btn');
        const sortBtn = document.getElementById('sort-btn');
        const speedSlider = document.getElementById('speed-slider');
        const speedValue = document.getElementById('speed-value');
        const statusElement = document.getElementById('status');
        const stepsElement = document.getElementById('steps');
        
        // Variables
        let array = [];
        let arraySize = parseInt(sizeSlider.value);
        let speed = parseInt(speedSlider.value);
        let animationSpeed = 1000 / speed;
        let isSorting = false;
        
        // Initialize
        updateSizeValue();
        updateSpeedValue();
        generateNewArray();
        
        // Event listeners
        generateBtn.addEventListener('click', generateNewArray);
        sortBtn.addEventListener('click', startSort);
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
            
            renderArray(array, 'unsorted');
            stepsElement.innerHTML = '';
            statusElement.textContent = 'Ready to sort';
        }
        
        function renderArray(arr, state, highlights = []) {
            arrayDisplay.innerHTML = '';
            
            arr.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = 'array-element';
                
                if (highlights.includes(index)) {
                    element.classList.add('comparing');
                } else if (state === 'divided') {
                    element.classList.add('divided');
                } else if (state === 'merging') {
                    element.classList.add('merging');
                } else if (state === 'sorted') {
                    element.classList.add('sorted');
                } else {
                    element.classList.add('unsorted');
                }
                
                element.textContent = value;
                arrayDisplay.appendChild(element);
            });
        }
        
        function addStep(description) {
            const step = document.createElement('div');
            step.textContent = description;
            stepsElement.appendChild(step);
            stepsElement.scrollTop = stepsElement.scrollHeight;
        }
        
        function updateStatus(text) {
            statusElement.textContent = text;
        }
        
        async function startSort() {
            if (isSorting) return;
            
            isSorting = true;
            generateBtn.disabled = true;
            sortBtn.disabled = true;
            stepsElement.innerHTML = '';
            
            addStep("Starting Merge Sort");
            
            // Create a copy of the array to sort
            const sortingArray = [...array];
            
            // Initial render
            renderArray(sortingArray, 'unsorted');
            await delay(animationSpeed);
            
            await mergeSort(sortingArray, 0, sortingArray.length - 1);
            
            // Final render
            renderArray(sortingArray, 'sorted');
            addStep("Merge Sort completed!");
            updateStatus("Sorting completed!");
            
            isSorting = false;
            generateBtn.disabled = false;
            sortBtn.disabled = false;
        }
        
        async function mergeSort(arr, left, right) {
            if (left < right) {
                const mid = Math.floor((left + right) / 2);
                
                // Visualize dividing
                updateStatus(`Dividing from index ${left} to ${right}`);
                addStep(`Dividing: [${arr.slice(left, right + 1).join(', ')}]`);
                renderArray(arr, 'divided');
                await delay(animationSpeed);
                
                // Recursively sort left and right halves
                await mergeSort(arr, left, mid);
                await mergeSort(arr, mid + 1, right);
                
                // Visualize merging
                updateStatus(`Merging sorted halves from ${left} to ${right}`);
                addStep(`Merging: [${arr.slice(left, mid + 1).join(', ')}] and [${arr.slice(mid + 1, right + 1).join(', ')}]`);
                
                await merge(arr, left, mid, right);
            }
        }
        
        async function merge(arr, left, mid, right) {
            let i = left;
            let j = mid + 1;
            let temp = [];
            
            // Create a copy of the current subarray for comparison visualization
            const originalSubarray = arr.slice(left, right + 1);
            
            while (i <= mid && j <= right) {
                // Highlight the elements being compared
                updateStatus(`Comparing ${arr[i]} and ${arr[j]}`);
                addStep(`Comparing: ${arr[i]} and ${arr[j]}`);
                
                // Create a new array with highlights for visualization
                const displayArray = [...arr];
                renderArray(displayArray, 'merging', [i, j]);
                await delay(animationSpeed);
                
                if (arr[i] <= arr[j]) {
                    temp.push(arr[i++]);
                } else {
                    temp.push(arr[j++]);
                }
            }
            
            // Copy remaining elements
            while (i <= mid) temp.push(arr[i++]);
            while (j <= right) temp.push(arr[j++]);
            
            // Copy back to original array
            for (let k = 0; k < temp.length; k++) {
                arr[left + k] = temp[k];
                
                // Visualize each merge step
                updateStatus(`Inserting ${temp[k]} at position ${left + k}`);
                renderArray(arr, 'merging', [left + k]);
                await delay(animationSpeed / 2);
            }
            
            // Show the merged subarray as sorted
            updateStatus(`Subarray from ${left} to ${right} is now sorted`);
            addStep(`Merged result: [${arr.slice(left, right + 1).join(', ')}]`);
            renderArray(arr, 'sorted');
            await delay(animationSpeed);
        }
        
        function delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
    });
</script>