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
    .bucket-current-step{
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: black;
        min-height: 30px;
        margin: 20px 0;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 6px;
    }
</style>
<main class="main-content bucket-sort" id="bucket-sort" style="display:none;">
    <h1>Bucket Sort Visualization</h1>
   
    <div class="status" id="bucket-status"></div>
    <div class="visualization">
        <div class="phase">Input Array</div>
        <div id="bucket-input-array" class="array"></div>
        <div class="arrow">↓</div>

        <div class="bucket-current-step"></div>

    <div class="controls">
        <button id="bucket-generate-btn">New Array</button>
        <button id="bucket-sort-btn">Start Sort</button>
        <span class="bucket-step-nav-group" style="margin:0 1em;">
            <button id="bucket-prev-btn">Previous Step</button>
            <button id="bucket-next-btn">Next Step</button>
        </span>
        <div class="slider-container">
            <label for="bucket-size-slider">Size:</label>
            <input type="range" id="bucket-size-slider" min="5" max="10" value="6">
            <span id="bucket-size-value">10</span>
        </div>
        <div class="slider-container">
            <label for="bucket-speed-slider">Speed:</label>
            <input type="range" id="bucket-speed-slider" min="1" max="10" value="2">
            <span id="bucket-speed-value">2</span>
        </div>
    </div>
        <div class="phase">Scatter: Distribute to Buckets</div>
        <div id="bucket-buckets" class="buckets-container"></div>
        <div class="arrow">↓</div>
        <div class="phase">Sort Individual Buckets</div>
        <div id="bucket-sorted-buckets" class="buckets-container"></div>
        <div class="arrow">↓</div>
        <div class="phase">Gather: Final Sorted Array</div>
        <div id="bucket-output-array" class="array"></div>
        <div class="info-panel" id="bucket-info-panel"></div>
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
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const bucketSizeSlider = document.getElementById('bucket-size-slider');
    const bucketSizeValue = document.getElementById('bucket-size-value');
    const bucketInputArray = document.getElementById('bucket-input-array');
    const bucketBuckets = document.getElementById('bucket-buckets');
    const bucketSortedBuckets = document.getElementById('bucket-sorted-buckets');
    const bucketOutputArray = document.getElementById('bucket-output-array');
    const bucketGenerateBtn = document.getElementById('bucket-generate-btn');
    const bucketSortBtn = document.getElementById('bucket-sort-btn');
    const bucketPrevBtn = document.getElementById('bucket-prev-btn');
    const bucketNextBtn = document.getElementById('bucket-next-btn');
    const bucketSpeedSlider = document.getElementById('bucket-speed-slider');
    const bucketSpeedValue = document.getElementById('bucket-speed-value');
    const bucketStatus = document.getElementById('bucket-status');
    const bucketInfoPanel = document.getElementById('bucket-info-panel');

    // Variables
    let bucketArray = [];
    let bucketArraySize = parseInt(bucketSizeSlider.value);
    let bucketSpeed = parseInt(bucketSpeedSlider.value);
    let bucketAnimationSpeed = 1000 / bucketSpeed;
    let bucketIsSorting = false;
    let bucketMaxValue = 100;
    let bucketNumBuckets = 5;
    let bucketBucketSize = bucketMaxValue / bucketNumBuckets;

    // Step navigation variables
    let bucketStepRecords = [];
    let bucketCurrentStep = 0;

    // Initialize
    updateBucketSizeValue();
    updateBucketSpeedValue();
    generateBucketNewArray();

    // Event listeners
    bucketGenerateBtn.addEventListener('click', function() {
        generateBucketNewArray();
        precomputeBucketSortSteps();
        renderBucketStep(0);
    });
    bucketSortBtn.addEventListener('click', function() {
        precomputeBucketSortSteps();
        autoPlayBucketSort();
    });
    bucketPrevBtn.addEventListener('click', function() {
        if (bucketStepRecords.length > 0 && bucketCurrentStep > 0) {
            renderBucketStep(bucketCurrentStep - 1);
        }
    });
    bucketNextBtn.addEventListener('click', function() {
        if (bucketStepRecords.length > 0 && bucketCurrentStep < bucketStepRecords.length - 1) {
            renderBucketStep(bucketCurrentStep + 1);
        }
    });
    bucketSizeSlider.addEventListener('input', function() {
        updateBucketSizeValue();
        generateBucketNewArray();
        precomputeBucketSortSteps();
        renderBucketStep(0);
    });
    bucketSpeedSlider.addEventListener('input', updateBucketSpeedValue);

    // Functions
    function updateBucketSizeValue() {
        bucketArraySize = parseInt(bucketSizeSlider.value);
        bucketSizeValue.textContent = bucketArraySize;
    }

    function updateBucketSpeedValue() {
        bucketSpeed = parseInt(bucketSpeedSlider.value);
        bucketSpeedValue.textContent = bucketSpeed;
        bucketAnimationSpeed = 1000 / bucketSpeed;
    }

    function generateBucketNewArray() {
        bucketArray = [];
        for (let i = 0; i < bucketArraySize; i++) {
            bucketArray.push(Math.floor(Math.random() * bucketMaxValue) + 1);
        }
        renderBucketInputArray();
        bucketBuckets.innerHTML = '';
        bucketSortedBuckets.innerHTML = '';
        bucketOutputArray.innerHTML = '';
        bucketInfoPanel.innerHTML = '';
        bucketStepRecords = [];
        bucketCurrentStep = 0;
        bucketStatus.textContent = '';
        bucketPrevBtn.disabled = true;
        bucketNextBtn.disabled = false;
        bucketSortBtn.disabled = false;
        bucketSortBtn.textContent = "Start Sort";
    }

    function renderBucketInputArray(highlightIndex = -1, arr = null) {
        bucketInputArray.innerHTML = '';
        const arrayToRender = arr || bucketArray;
        arrayToRender.forEach((value, index) => {
            const element = document.createElement('div');
            element.className = `element ${index === highlightIndex ? 'current' : 'normal'}`;
            element.textContent = value;

            const indexLabel = document.createElement('div');
            indexLabel.className = 'index';
            indexLabel.textContent = index;
            element.appendChild(indexLabel);

            bucketInputArray.appendChild(element);
        });
    }

    function getBucketRangeText(bucketIndex) {
        const lower = Math.floor(bucketIndex * bucketBucketSize);
        const upper = Math.floor((bucketIndex + 1) * bucketBucketSize);
        if (bucketIndex === bucketNumBuckets - 1) {
            return `Bucket ${bucketIndex} (${lower}-${upper})`;
        }
        return `Bucket ${bucketIndex} (${lower}-${upper - 1})`;
    }

    function getBucketIndex(value) {
        if (value === bucketMaxValue) return bucketNumBuckets - 1;
        return Math.floor((value - 1) / bucketBucketSize);
    }

    function renderBucketBuckets(bucketsData, highlightValue = null) {
        bucketBuckets.innerHTML = '';
        for (let i = 0; i < bucketNumBuckets; i++) {
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
            bucketBuckets.appendChild(bucketGroup);
        }
    }

    function renderBucketSortedBuckets(sortedBucketsData) {
        bucketSortedBuckets.innerHTML = '';
        for (let i = 0; i < bucketNumBuckets; i++) {
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
            bucketSortedBuckets.appendChild(bucketGroup);
        }
    }

    function renderBucketOutputArray(outputArrayData, highlightIndex = -1) {
        bucketOutputArray.innerHTML = '';
        outputArrayData.forEach((value, index) => {
            const element = document.createElement('div');
            element.className = `element ${index === highlightIndex ? 'current' : 'sorted'}`;
            element.textContent = value;

            const indexLabel = document.createElement('div');
            indexLabel.className = 'index';
            indexLabel.textContent = index;
            element.appendChild(indexLabel);

            bucketOutputArray.appendChild(element);
        });
    }

    // --- Step Recording and Navigation ---
    function recordBucketStep(state) {
        // Deep copy all relevant state
        bucketStepRecords.push(JSON.parse(JSON.stringify(state)));
    }

  

    function renderBucketStep(idx) {
    if (!bucketStepRecords[idx]) return;
    const state = bucketStepRecords[idx];
    // Restore all UI
    renderBucketInputArray(state.inputHighlight, state.inputArray);
    renderBucketBuckets(state.buckets, state.bucketHighlightValue);
    renderBucketSortedBuckets(state.sortedBuckets);
    renderBucketOutputArray(state.outputArray, state.outputHighlight);
    bucketInfoPanel.innerHTML = '';
    state.steps.forEach((desc, i) => {
        const div = document.createElement('div');
        div.className = 'step' + (i === state.currentStep ? ' active' : '');
        div.textContent = desc;
        bucketInfoPanel.appendChild(div);
    });
    // (Auto-scroll removed)
    bucketStatus.textContent = state.statusText || '';
    bucketCurrentStep = idx;
    // Button states
    bucketPrevBtn.disabled = (idx === 0);
    bucketNextBtn.disabled = (idx === bucketStepRecords.length - 1);

    // Display the current step description in .bucket-current-step
    document.querySelector('.bucket-current-step').textContent = state.steps[state.currentStep] || '';
}



    function precomputeBucketSortSteps() {
        bucketStepRecords = [];
        let arr = [...bucketArray];
        let bucketsData = Array.from({ length: bucketNumBuckets }, () => []);
        let sortedBucketsData = Array.from({ length: bucketNumBuckets }, () => []);
        let finalArray = [];
        let stepsDesc = [];
        let statusText = "";

        function pushStep(desc, {
            inputHighlight = -1,
            inputArray = arr,
            buckets = bucketsData,
            bucketHighlightValue = null,
            sortedBuckets = sortedBucketsData,
            outputArray = finalArray,
            outputHighlight = -1,
            status = ""
        } = {}) {
            stepsDesc.push(desc);
            recordBucketStep({
                inputHighlight,
                inputArray: [...inputArray],
                buckets: buckets.map(b => [...b]),
                bucketHighlightValue,
                sortedBuckets: sortedBuckets.map(b => [...b]),
                outputArray: [...outputArray],
                outputHighlight,
                steps: [...stepsDesc],
                currentStep: stepsDesc.length - 1,
                statusText: status
            });
        }

        pushStep("Starting Bucket Sort");
        pushStep("1. Create empty buckets");
        pushStep("2. Scatter: Distribute elements into buckets");
        pushStep("3. Sort each bucket");
        pushStep("4. Gather: Concatenate sorted buckets");

        // Step 1: Show empty buckets
        pushStep(`Created ${bucketNumBuckets} empty buckets`);

        // Step 2: Distribute elements into buckets
        for (let i = 0; i < arr.length; i++) {
            const value = arr[i];
            const bucketIndex = getBucketIndex(value);
            pushStep(`Placing ${value} into ${getBucketRangeText(bucketIndex)}`, {
                inputHighlight: i,
                buckets: bucketsData,
                bucketHighlightValue: value
            });
            bucketsData[bucketIndex].push(value);
        }

        // Step 3: Sort each bucket
        for (let i = 0; i < bucketsData.length; i++) {
            if (bucketsData[i].length > 0) {
                pushStep(`Sorting Bucket ${i} (${bucketsData[i].length} elements)`);
                sortedBucketsData[i] = [...bucketsData[i]].sort((a, b) => a - b);
            }
        }

        // Step 4: Concatenate all sorted buckets
        let outputIndex = 0;
        for (let i = 0; i < sortedBucketsData.length; i++) {
            if (sortedBucketsData[i].length > 0) {
                for (let j = 0; j < sortedBucketsData[i].length; j++) {
                    const value = sortedBucketsData[i][j];
                    finalArray.push(value);
                    pushStep(`Added ${value} from Bucket ${i} to position ${outputIndex}`, {
                        outputArray: finalArray,
                        outputHighlight: outputIndex
                    });
                    outputIndex++;
                }
            }
        }

        // Final step
        pushStep("Bucket Sort completed!", {
            outputArray: finalArray
        });
    }

    // Auto-play for Start Sort button
    let bucketAutoPlayInterval = null;
    function autoPlayBucketSort() {
        if (bucketStepRecords.length === 0) precomputeBucketSortSteps();
        if (bucketAutoPlayInterval) {
            clearInterval(bucketAutoPlayInterval);
            bucketAutoPlayInterval = null;
            bucketSortBtn.textContent = "Start Sort";
            bucketGenerateBtn.disabled = false;
            bucketPrevBtn.disabled = false;
            bucketNextBtn.disabled = false;
            return;
        }
        // If we're at the end, reset to beginning
        if (bucketCurrentStep >= bucketStepRecords.length - 1) {
            renderBucketStep(0);
        }
        bucketSortBtn.textContent = "Stop Sort";
        bucketGenerateBtn.disabled = true;
        bucketPrevBtn.disabled = true;
        bucketNextBtn.disabled = true;
        bucketAutoPlayInterval = setInterval(() => {
            if (bucketCurrentStep < bucketStepRecords.length - 1) {
                renderBucketStep(bucketCurrentStep + 1);
            } else {
                clearInterval(bucketAutoPlayInterval);
                bucketAutoPlayInterval = null;
                bucketSortBtn.textContent = "Start Sort";
                bucketGenerateBtn.disabled = false;
                bucketPrevBtn.disabled = false;
                bucketNextBtn.disabled = true;
            }
        }, bucketAnimationSpeed);
    }

    // On page load, precompute steps and show first step
    precomputeBucketSortSteps();
    renderBucketStep(0);
});
</script>
