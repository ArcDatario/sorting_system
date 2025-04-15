<style>
    .bucket-sort-container {
        max-width: 1000px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
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
        gap: 15px;
    }
    .phase {
        margin-bottom: 5px;
        font-weight: bold;
        color: #2c3e50;
    }
    .array {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        padding: 10px;
        background-color: #ecf0f1;
        border-radius: 4px;
        min-height: 50px;
    }
    .element {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-weight: bold;
        transition: all 0.3s;
        color: white;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        position: relative;
    }
    .normal { background-color: #3498db; }
    .current { background-color: #e74c3c; transform: scale(1.1); }
    .in-bucket { background-color: #f39c12; }
    .sorted { background-color: #2ecc71; }
    .bucket { background-color: #9b59b6; }
    .index {
        position: absolute;
        top: -15px;
        font-size: 10px;
        color: #7f8c8d;
    }
    .buckets-container {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    .bucket-group {
        flex: 1;
        min-width: 150px;
    }
    .bucket-title {
        font-weight: bold;
        margin-bottom: 5px;
        color: #2c3e50;
    }
    .bucket-elements {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
        min-height: 50px;
        border: 1px dashed #9b59b6;
    }
    .info-panel {
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 3px solid #3498db;
        max-height: 150px;
        overflow-y: auto;
        font-size: 14px;
        line-height: 1.4;
    }
    .step {
        margin-bottom: 5px;
        padding: 3px 0;
    }
    .step.active {
        font-weight: bold;
        color: #2c3e50;
        background-color: #e3f2fd;
    }
    .step.completed {
        color: #27ae60;
    }
    .status {
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
        color: #3498db;
        min-height: 20px;
    }
    .legend {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 15px;
        flex-wrap: wrap;
    }
    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
    }
    .color-box {
        width: 15px;
        height: 15px;
        border-radius: 3px;
    }
    .arrow {
        text-align: center;
        font-size: 20px;
        color: #7f8c8d;
        margin: 5px 0;
    }
</style>

<div class="bucket-sort-container">
    <h1>Bucket Sort Visualization</h1>
    
    <div class="controls">
        <button id="generate-btn">New Array</button>
        <button id="sort-btn">Start Sort</button>
        <div class="slider-container">
            <label for="size-slider">Size:</label>
            <input type="range" id="size-slider" min="5" max="10" value="6">
            <span id="size-value">10</span>
        </div>
        <div class="slider-container">
            <label for="speed-slider">Speed:</label>
            <input type="range" id="speed-slider" min="1" max="10" value="2">
            <span id="speed-value">2</span>
        </div>
    </div>
    
    <div class="status" id="status"></div>
    
    <div class="visualization">
        <div class="phase">Input Array</div>
        <div id="input-array" class="array"></div>
        
        <div class="arrow">↓</div>
        
        <div class="phase">Scatter: Distribute to Buckets</div>
        <div id="buckets" class="buckets-container"></div>
        
        <div class="arrow">↓</div>
        
        <div class="phase">Sort Individual Buckets</div>
        <div id="sorted-buckets" class="buckets-container"></div>
        
        <div class="arrow">↓</div>
        
        <div class="phase">Gather: Final Sorted Array</div>
        <div id="output-array" class="array"></div>
        
        <div class="info-panel" id="info-panel"></div>
    </div>
    
    <div class="legend">
        <div class="legend-item">
            <div class="color-box current"></div>
            <span>Current</span>
        </div>
        <div class="legend-item">
            <div class="color-box in-bucket"></div>
            <span>In Bucket</span>
        </div>
        <div class="legend-item">
            <div class="color-box bucket"></div>
            <span>Bucket</span>
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
        const inputArray = document.getElementById('input-array');
        const buckets = document.getElementById('buckets');
        const sortedBuckets = document.getElementById('sorted-buckets');
        const outputArray = document.getElementById('output-array');
        const generateBtn = document.getElementById('generate-btn');
        const sortBtn = document.getElementById('sort-btn');
        const speedSlider = document.getElementById('speed-slider');
        const speedValue = document.getElementById('speed-value');
        const status = document.getElementById('status');
        const infoPanel = document.getElementById('info-panel');

        // Variables
        let array = [];
        let arraySize = parseInt(sizeSlider.value);
        let speed = parseInt(speedSlider.value);
        let animationSpeed = 1000 / speed;
        let isSorting = false;
        let steps = [];
        let currentStep = 0;
        const maxValue = 100;
        const numBuckets = 5;
        const bucketSize = maxValue / numBuckets;

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
                array.push(Math.floor(Math.random() * maxValue) + 1);
            }

            renderInputArray();
            buckets.innerHTML = '';
            sortedBuckets.innerHTML = '';
            outputArray.innerHTML = '';
            infoPanel.innerHTML = '';
            steps = [];
            currentStep = 0;
            status.textContent = '';
        }

        function renderInputArray(highlightIndex = -1) {
            inputArray.innerHTML = '';

            array.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = `element ${index === highlightIndex ? 'current' : 'normal'}`;
                element.textContent = value;
                
                const indexLabel = document.createElement('div');
                indexLabel.className = 'index';
                indexLabel.textContent = index;
                element.appendChild(indexLabel);
                
                inputArray.appendChild(element);
            });
        }

        function getBucketRangeText(bucketIndex) {
            const lower = Math.floor(bucketIndex * bucketSize);
            const upper = Math.floor((bucketIndex + 1) * bucketSize);
            // Special case for last bucket to include maxValue
            if (bucketIndex === numBuckets - 1) {
                return `Bucket ${bucketIndex} (${lower}-${upper})`;
            }
            return `Bucket ${bucketIndex} (${lower}-${upper - 1})`;
        }

        function getBucketIndex(value) {
            // Special case for max value to go in last bucket
            if (value === maxValue) return numBuckets - 1;
            return Math.floor((value - 1) / bucketSize);
        }

        function renderBuckets(bucketsData, highlightValue = null) {
            buckets.innerHTML = '';

            for (let i = 0; i < numBuckets; i++) {
                const bucketGroup = document.createElement('div');
                bucketGroup.className = 'bucket-group';
                
                const title = document.createElement('div');
                title.className = 'bucket-title';
                title.textContent = getBucketRangeText(i);
                
                const elements = document.createElement('div');
                elements.className = 'bucket-elements';
                
                if (bucketsData[i] && bucketsData[i].length > 0) {
                    bucketsData[i].forEach(value => {
                        const element = document.createElement('div');
                        element.className = `element ${value === highlightValue ? 'current' : 'in-bucket'}`;
                        element.textContent = value;
                        elements.appendChild(element);
                    });
                } else {
                    const emptyText = document.createElement('div');
                    emptyText.textContent = 'Empty';
                    emptyText.style.color = '#7f8c8d';
                    elements.appendChild(emptyText);
                }
                
                bucketGroup.appendChild(title);
                bucketGroup.appendChild(elements);
                buckets.appendChild(bucketGroup);
            }
        }

        function renderSortedBuckets(sortedBucketsData) {
            sortedBuckets.innerHTML = '';

            for (let i = 0; i < numBuckets; i++) {
                const bucketGroup = document.createElement('div');
                bucketGroup.className = 'bucket-group';
                
                const title = document.createElement('div');
                title.className = 'bucket-title';
                title.textContent = `Bucket ${i} (Sorted)`;
                
                const elements = document.createElement('div');
                elements.className = 'bucket-elements';
                
                if (sortedBucketsData[i] && sortedBucketsData[i].length > 0) {
                    sortedBucketsData[i].forEach(value => {
                        const element = document.createElement('div');
                        element.className = 'element sorted';
                        element.textContent = value;
                        elements.appendChild(element);
                    });
                } else {
                    const emptyText = document.createElement('div');
                    emptyText.textContent = 'Empty';
                    emptyText.style.color = '#7f8c8d';
                    elements.appendChild(emptyText);
                }
                
                bucketGroup.appendChild(title);
                bucketGroup.appendChild(elements);
                sortedBuckets.appendChild(bucketGroup);
            }
        }

        function renderOutputArray(outputArrayData, highlightIndex = -1) {
            outputArray.innerHTML = '';

            outputArrayData.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = `element ${index === highlightIndex ? 'current' : 'sorted'}`;
                element.textContent = value;
                
                const indexLabel = document.createElement('div');
                indexLabel.className = 'index';
                indexLabel.textContent = index;
                element.appendChild(indexLabel);
                
                outputArray.appendChild(element);
            });
        }

        function addStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            infoPanel.appendChild(step);
            steps.push(step);
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
            status.textContent = text;
        }

        async function startSort() {
            if (isSorting) return;

            isSorting = true;
            generateBtn.disabled = true;
            sortBtn.disabled = true;
            infoPanel.innerHTML = '';
            steps = [];
            currentStep = 0;

            // Initialize buckets
            const bucketsData = Array.from({ length: numBuckets }, () => []);
            const sortedBucketsData = Array.from({ length: numBuckets }, () => []);
            const finalArray = [];

            // Initial steps
            addStep("Starting Bucket Sort", true);
            addStep("1. Create empty buckets", false);
            addStep("2. Scatter: Distribute elements into buckets", false);
            addStep("3. Sort each bucket", false);
            addStep("4. Gather: Concatenate sorted buckets", false);

            // Step 1: Show empty buckets
            addStep(`Created ${numBuckets} empty buckets`, true);
            updateSteps(1);
            renderBuckets(bucketsData);
            await new Promise(resolve => setTimeout(resolve, animationSpeed));

            // Step 2: Distribute elements into buckets
            addStep("Distributing elements into buckets", true);
            updateSteps(2);
            
            for (let i = 0; i < array.length; i++) {
                const value = array[i];
                const bucketIndex = getBucketIndex(value);
                
                addStep(`Placing ${value} into ${getBucketRangeText(bucketIndex)}`, true);
                
                renderInputArray(i);
                bucketsData[bucketIndex].push(value);
                renderBuckets(bucketsData, value);
                
                await new Promise(resolve => setTimeout(resolve, animationSpeed));
            }

            // Step 3: Sort each bucket
            addStep("Sorting each bucket", true);
            updateSteps(3);
            
            for (let i = 0; i < bucketsData.length; i++) {
                if (bucketsData[i].length > 0) {
                    addStep(`Sorting Bucket ${i} (${bucketsData[i].length} elements)`, true);
                    
                    sortedBucketsData[i] = [...bucketsData[i]].sort((a, b) => a - b);
                    renderSortedBuckets(sortedBucketsData);
                    
                    await new Promise(resolve => setTimeout(resolve, animationSpeed * 2));
                }
            }

            // Step 4: Concatenate all sorted buckets
            addStep("Building final sorted array", true);
            updateSteps(4);
            
            let outputIndex = 0;
            for (let i = 0; i < sortedBucketsData.length; i++) {
                if (sortedBucketsData[i].length > 0) {
                    for (let j = 0; j < sortedBucketsData[i].length; j++) {
                        const value = sortedBucketsData[i][j];
                        finalArray.push(value);
                        
                        addStep(`Added ${value} from Bucket ${i} to position ${outputIndex}`, true);
                        
                        renderOutputArray(finalArray, outputIndex);
                        await new Promise(resolve => setTimeout(resolve, animationSpeed));
                        
                        outputIndex++;
                    }
                }
            }

            // Final step
            addStep("Bucket Sort completed!", true);
            updateSteps(5);
            updateStatus("Sorting completed!");
            
            renderOutputArray(finalArray);

            isSorting = false;
            generateBtn.disabled = false;
            sortBtn.disabled = false;
        }
    });
</script>