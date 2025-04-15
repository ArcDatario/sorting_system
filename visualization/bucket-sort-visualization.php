<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .bucket-sort-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }
    .bucket-sort-button {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .bucket-sort-button:hover {
        background-color: #2980b9;
    }
    .bucket-sort-button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }
    .bucket-sort-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    .bucket-sort-visualization {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 20px;
    }
    .bucket-sort-array-container {
        display: flex;
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
    }
    .bucket-sort-array-row {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-bottom: 5px;
    }
    .bucket-sort-array-element {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-weight: bold;
        transition: all 0.3s;
        color: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        position: relative;
    }
    .bucket-sort-normal { background-color: #3498db; }
    .bucket-sort-current { background-color: #e74c3c; transform: scale(1.1); }
    .bucket-sort-in-bucket { background-color: #f39c12; }
    .bucket-sort-sorted { background-color: #2ecc71; }
    .bucket-sort-bucket { background-color: #9b59b6; }
    .bucket-sort-array-label {
        position: absolute;
        top: -20px;
        width: 100%;
        text-align: center;
        font-size: 11px;
        color: #7f8c8d;
    }
    .bucket-sort-info-panel {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }
    .bucket-sort-info-panel::-webkit-scrollbar {
        width: 8px;
    }
    .bucket-sort-info-panel::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }
    .bucket-sort-info-panel::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }
    .bucket-sort-info-panel::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }
    .bucket-sort-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }
    .bucket-sort-step.active {
        font-weight: bold;
        color: #2c3e50;
    }
    .bucket-sort-step.completed {
        color: #27ae60;
    }
    .bucket-sort-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    .bucket-sort-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }
    .bucket-sort-color-box {
        width: 20px;
        height: 20px;
        border-radius: 4px;
    }
    .bucket-sort-status-text {
        text-align: center;
        margin: 10px 0;
        font-weight: bold;
        color: #4ec9b0;
        min-height: 24px;
    }
    .bucket-sort-buckets-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
    }
    .bucket-sort-bucket-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }
    .bucket-sort-bucket-title {
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 5px;
    }
    .bucket-sort-bucket-elements {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        min-height: 70px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
        border: 2px dashed #9b59b6;
    }
    .bucket-sort-phase-title {
        text-align: center;
        font-weight: bold;
        margin: 10px 0;
        color: #2c3e50;
    }
    .bucket-sort-visual-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .bucket-sort-arrow {
        font-size: 24px;
        color: #7f8c8d;
        padding: 0 10px;
    }

    body.dark-mode .bucket-sort-array-container {
        background-color: #333;
    }
    body.dark-mode .bucket-sort-info-panel {
        background-color: var(--background);
        color: white;
    }
    body.dark-mode .bucket-sort-bucket-elements {
        background-color: #444;
    }
</style>

<main class="main-content bucket-sort" id="bucket-sort" style="display:block;">
    <h1>Bucket Sort Visualization</h1>
    <div class="bucket-sort-controls">
        <button id="bucket-sort-generate-btn" class="bucket-sort-button">Generate New Array</button>
        <button id="bucket-sort-sort-btn" class="bucket-sort-button">Start Bucket Sort</button>
        <div class="bucket-sort-slider-container">
            <label for="bucket-sort-size-slider">Array Size:</label>
            <input type="range" id="bucket-sort-size-slider" min="5" max="15" value="10">
            <span id="bucket-sort-size-value">10</span>
        </div>
        <div class="bucket-sort-slider-container">
            <label for="bucket-sort-speed-slider">Speed:</label>
            <input type="range" id="bucket-sort-speed-slider" min="1" max="10" value="5">
            <span id="bucket-sort-speed-value">5</span>
        </div>
    </div>
    <div class="bucket-sort-visualization">
        <div id="bucket-sort-status-text" class="bucket-sort-status-text"></div>
        
        <div class="bucket-sort-phase-title">Input Array</div>
        <div id="bucket-sort-input-array" class="bucket-sort-array-container"></div>
        
        <div class="bucket-sort-phase-title">Buckets (Before Sorting)</div>
        <div id="bucket-sort-buckets" class="bucket-sort-buckets-container"></div>
        
        <div class="bucket-sort-phase-title">Buckets (After Sorting)</div>
        <div id="bucket-sort-sorted-buckets" class="bucket-sort-buckets-container"></div>
        
        <div class="bucket-sort-phase-title">Output Array</div>
        <div id="bucket-sort-output-array" class="bucket-sort-array-container"></div>
        
        <div id="bucket-sort-info-panel" class="bucket-sort-info-panel"></div>
    </div>
    <div class="bucket-sort-legend">
        <div class="bucket-sort-legend-item">
            <div class="bucket-sort-color-box bucket-sort-current"></div>
            <span>Current Element</span>
        </div>
        <div class="bucket-sort-legend-item">
            <div class="bucket-sort-color-box bucket-sort-in-bucket"></div>
            <span>In Bucket</span>
        </div>
        <div class="bucket-sort-legend-item">
            <div class="bucket-sort-color-box bucket-sort-bucket"></div>
            <span>Bucket</span>
        </div>
        <div class="bucket-sort-legend-item">
            <div class="bucket-sort-color-box bucket-sort-sorted"></div>
            <span>Sorted</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const bucketSortSizeSlider = document.getElementById('bucket-sort-size-slider');
        const bucketSortSizeValue = document.getElementById('bucket-sort-size-value');
        const bucketSortInputArray = document.getElementById('bucket-sort-input-array');
        const bucketSortBuckets = document.getElementById('bucket-sort-buckets');
        const bucketSortSortedBuckets = document.getElementById('bucket-sort-sorted-buckets');
        const bucketSortOutputArray = document.getElementById('bucket-sort-output-array');
        const bucketSortGenerateBtn = document.getElementById('bucket-sort-generate-btn');
        const bucketSortSortBtn = document.getElementById('bucket-sort-sort-btn');
        const bucketSortSpeedSlider = document.getElementById('bucket-sort-speed-slider');
        const bucketSortSpeedValue = document.getElementById('bucket-sort-speed-value');
        const bucketSortStatusText = document.getElementById('bucket-sort-status-text');
        const bucketSortInfoPanel = document.getElementById('bucket-sort-info-panel');

        // Variables
        let bucketSortArray = [];
        let bucketSortArraySize = parseInt(bucketSortSizeSlider.value);
        let bucketSortSpeed = parseInt(bucketSortSpeedSlider.value);
        let bucketSortAnimationSpeed = 1000 / bucketSortSpeed;
        let bucketSortIsSorting = false;
        let bucketSortSteps = [];
        let bucketSortCurrentStep = 0;
        let bucketSortMaxValue = 100; // Maximum value in the array
        let buckets = [];
        let sortedBuckets = [];
        let outputArray = [];
        const numBuckets = 5; // Number of buckets to use

        // Initialize
        updateBucketSortSizeValue();
        updateBucketSortSpeedValue();
        generateBucketSortNewArray();

        // Event listeners
        bucketSortGenerateBtn.addEventListener('click', generateBucketSortNewArray);
        bucketSortSortBtn.addEventListener('click', startBucketSort);
        bucketSortSizeSlider.addEventListener('input', updateBucketSortSizeValue);
        bucketSortSpeedSlider.addEventListener('input', updateBucketSortSpeedValue);

        // Functions
        function updateBucketSortSizeValue() {
            bucketSortArraySize = parseInt(bucketSortSizeSlider.value);
            bucketSortSizeValue.textContent = bucketSortArraySize;
            generateBucketSortNewArray();
        }

        function updateBucketSortSpeedValue() {
            bucketSortSpeed = parseInt(bucketSortSpeedSlider.value);
            bucketSortSpeedValue.textContent = bucketSortSpeed;
            bucketSortAnimationSpeed = 1000 / bucketSortSpeed;
        }

        function generateBucketSortNewArray() {
            if (bucketSortIsSorting) return;

            bucketSortArray = [];
            for (let i = 0; i < bucketSortArraySize; i++) {
                bucketSortArray.push(Math.floor(Math.random() * bucketSortMaxValue) + 1); // Values between 1-bucketSortMaxValue
            }

            renderBucketSortInputArray();
            bucketSortBuckets.innerHTML = '';
            bucketSortSortedBuckets.innerHTML = '';
            bucketSortOutputArray.innerHTML = '';
            bucketSortInfoPanel.innerHTML = '';
            bucketSortSteps = [];
            bucketSortCurrentStep = 0;
            bucketSortStatusText.textContent = '';
        }

        function renderBucketSortInputArray(highlightIndex = -1) {
            bucketSortInputArray.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'bucket-sort-array-row';

            bucketSortArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = `bucket-sort-array-element ${index === highlightIndex ? 'bucket-sort-current' : 'bucket-sort-normal'}`;
                element.textContent = value;
                element.dataset.index = index;
                
                const label = document.createElement('div');
                label.className = 'bucket-sort-array-label';
                label.textContent = `[${index}]`;
                element.appendChild(label);
                
                row.appendChild(element);
            });

            bucketSortInputArray.appendChild(row);
        }

        function renderBucketSortBuckets(buckets, highlightValue = null) {
            bucketSortBuckets.innerHTML = '';

            for (let i = 0; i < buckets.length; i++) {
                const bucketContainer = document.createElement('div');
                bucketContainer.className = 'bucket-sort-bucket-container';
                
                const title = document.createElement('div');
                title.className = 'bucket-sort-bucket-title';
                title.textContent = `Bucket ${i} (Range: ${Math.floor(i * (bucketSortMaxValue / numBuckets))}-${Math.floor((i + 1) * (bucketSortMaxValue / numBuckets))})`;
                
                const elements = document.createElement('div');
                elements.className = 'bucket-sort-bucket-elements';
                
                if (buckets[i] && buckets[i].length > 0) {
                    buckets[i].forEach(value => {
                        const element = document.createElement('div');
                        element.className = `bucket-sort-array-element ${value === highlightValue ? 'bucket-sort-current' : 'bucket-sort-in-bucket'}`;
                        element.textContent = value;
                        elements.appendChild(element);
                    });
                } else {
                    const emptyText = document.createElement('div');
                    emptyText.textContent = 'Empty';
                    emptyText.style.color = '#7f8c8d';
                    elements.appendChild(emptyText);
                }
                
                bucketContainer.appendChild(title);
                bucketContainer.appendChild(elements);
                bucketSortBuckets.appendChild(bucketContainer);
            }
        }

        function renderBucketSortSortedBuckets(sortedBuckets) {
            bucketSortSortedBuckets.innerHTML = '';

            for (let i = 0; i < sortedBuckets.length; i++) {
                const bucketContainer = document.createElement('div');
                bucketContainer.className = 'bucket-sort-bucket-container';
                
                const title = document.createElement('div');
                title.className = 'bucket-sort-bucket-title';
                title.textContent = `Bucket ${i} (Sorted)`;
                
                const elements = document.createElement('div');
                elements.className = 'bucket-sort-bucket-elements';
                
                if (sortedBuckets[i] && sortedBuckets[i].length > 0) {
                    sortedBuckets[i].forEach(value => {
                        const element = document.createElement('div');
                        element.className = 'bucket-sort-array-element bucket-sort-sorted';
                        element.textContent = value;
                        elements.appendChild(element);
                    });
                } else {
                    const emptyText = document.createElement('div');
                    emptyText.textContent = 'Empty';
                    emptyText.style.color = '#7f8c8d';
                    elements.appendChild(emptyText);
                }
                
                bucketContainer.appendChild(title);
                bucketContainer.appendChild(elements);
                bucketSortSortedBuckets.appendChild(bucketContainer);
            }
        }

        function renderBucketSortOutputArray(outputArray, highlightIndex = -1) {
            bucketSortOutputArray.innerHTML = '';

            const row = document.createElement('div');
            row.className = 'bucket-sort-array-row';

            outputArray.forEach((value, index) => {
                const element = document.createElement('div');
                element.className = `bucket-sort-array-element ${index === highlightIndex ? 'bucket-sort-current' : 'bucket-sort-sorted'}`;
                element.textContent = value;
                element.dataset.index = index;
                
                const label = document.createElement('div');
                label.className = 'bucket-sort-array-label';
                label.textContent = `[${index}]`;
                element.appendChild(label);
                
                row.appendChild(element);
            });

            bucketSortOutputArray.appendChild(row);
        }

        function addBucketSortStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `bucket-sort-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            bucketSortInfoPanel.appendChild(step);
            bucketSortSteps.push(step);

            // Auto-scroll to the latest step
            bucketSortInfoPanel.scrollTop = bucketSortInfoPanel.scrollHeight;
        }

        function updateBucketSortSteps(currentIndex) {
            bucketSortSteps.forEach((step, index) => {
                step.className = 'bucket-sort-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        function updateBucketSortStatus(text) {
            bucketSortStatusText.textContent = text;
        }

        async function startBucketSort() {
            if (bucketSortIsSorting) return;

            bucketSortIsSorting = true;
            bucketSortGenerateBtn.disabled = true;
            bucketSortSortBtn.disabled = true;
            bucketSortInfoPanel.innerHTML = '';
            bucketSortSteps = [];
            bucketSortCurrentStep = 0;

            // Initialize buckets
            buckets = Array.from({ length: numBuckets }, () => []);
            sortedBuckets = Array.from({ length: numBuckets }, () => []);
            outputArray = [];

            // Initial steps
            addBucketSortStep("Starting Bucket Sort Algorithm", true);
            addBucketSortStep("Step 1: Create empty buckets", false);
            addBucketSortStep("Step 2: Scatter: Distribute elements into buckets based on their range", false);
            addBucketSortStep("Step 3: Sort each bucket individually", false);
            addBucketSortStep("Step 4: Gather: Concatenate all sorted buckets", false);

            // Step 1: Show empty buckets
            addBucketSortStep(`Created ${numBuckets} empty buckets`, true);
            updateBucketSortSteps(1);
            renderBucketSortBuckets(buckets);
            await new Promise(resolve => setTimeout(resolve, bucketSortAnimationSpeed));

            // Step 2: Distribute elements into buckets
            addBucketSortStep("Distributing elements into appropriate buckets", true);
            updateBucketSortSteps(2);
            
            for (let i = 0; i < bucketSortArray.length; i++) {
                const value = bucketSortArray[i];
                const bucketIndex = Math.floor((value / bucketSortMaxValue) * (numBuckets - 1));
                
                addBucketSortStep(`Placing ${value} into Bucket ${bucketIndex}`, true);
                
                // Highlight current element in input array
                renderBucketSortInputArray(i);
                
                // Add to bucket
                buckets[bucketIndex].push(value);
                renderBucketSortBuckets(buckets, value);
                
                await new Promise(resolve => setTimeout(resolve, bucketSortAnimationSpeed));
            }

            // Step 3: Sort each bucket
            addBucketSortStep("Sorting each bucket individually", true);
            updateBucketSortSteps(3);
            
            for (let i = 0; i < buckets.length; i++) {
                if (buckets[i].length > 0) {
                    addBucketSortStep(`Sorting Bucket ${i} (${buckets[i].length} elements)`, true);
                    
                    // Copy the bucket and sort it
                    sortedBuckets[i] = [...buckets[i]].sort((a, b) => a - b);
                    renderBucketSortSortedBuckets(sortedBuckets);
                    
                    await new Promise(resolve => setTimeout(resolve, bucketSortAnimationSpeed * 2));
                }
            }

            // Step 4: Concatenate all sorted buckets
            addBucketSortStep("Concatenating all sorted buckets into final array", true);
            updateBucketSortSteps(4);
            
            let outputIndex = 0;
            for (let i = 0; i < sortedBuckets.length; i++) {
                if (sortedBuckets[i].length > 0) {
                    for (let j = 0; j < sortedBuckets[i].length; j++) {
                        const value = sortedBuckets[i][j];
                        outputArray.push(value);
                        
                        addBucketSortStep(`Adding ${value} from Bucket ${i} to output array at position ${outputIndex}`, true);
                        
                        renderBucketSortOutputArray(outputArray, outputIndex);
                        await new Promise(resolve => setTimeout(resolve, bucketSortAnimationSpeed));
                        
                        outputIndex++;
                    }
                }
            }

            // Final step
            addBucketSortStep("Bucket Sort completed! Array is now sorted", true);
            updateBucketSortSteps(5);
            updateBucketSortStatus("Sorting completed!");
            
            // Show final sorted array
            renderBucketSortOutputArray(outputArray);

            bucketSortIsSorting = false;
            bucketSortGenerateBtn.disabled = false;
            bucketSortSortBtn.disabled = false;
        }
    });
</script>