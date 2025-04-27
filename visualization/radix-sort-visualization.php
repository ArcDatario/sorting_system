
<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .radix-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
        justify-content: center;
    }

    .radix-btn {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .radix-btn:hover {
        background-color: #2980b9;
    }

    .radix-btn:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }

    .radix-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    #radix-array-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 15px;
        padding: 20px;
        background-color: #ecf0f1;
        border-radius: 8px;
        margin-bottom: 20px;
        min-height: 200px;
    }

    .radix-card {
        width: 60px;
        height: 80px;
        background-color: #3498db;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .radix-card.current-digit {
        background-color: #e74c3c;
        transform: scale(1.05);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .radix-card.sorted {
        background-color: #2ecc71;
        transform: scale(1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .radix-card.moving {
        background-color: #9b59b6;
        transform: translateY(-20px);
    }

    .radix-card-index {
        position: absolute;
        top: -20px;
        font-size: 12px;
        color: #2c3e50;
    }

    .radix-buckets-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .radix-bucket {
        min-width: 80px;
        min-height: 150px;
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .radix-bucket-header {
        font-weight: bold;
        margin-bottom: 10px;
        color: #2c3e50;
    }

    .radix-bucket-content {
        display: flex;
        flex-direction: column;
        gap: 5px;
        width: 100%;
    }

    .radix-bucket-item {
        background-color: #3498db;
        color: white;
        padding: 5px;
        border-radius: 4px;
        text-align: center;
        transition: all 0.3s;
    }

    .radix-bucket-item.current {
        background-color: #e74c3c;
        transform: scale(1.05);
    }

    #radix-steps-container {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }

    #radix-steps-container::-webkit-scrollbar {
        width: 8px;
    }

    #radix-steps-container::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    #radix-steps-container::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }

    #radix-steps-container::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }

    .radix-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }

    .radix-step.active {
        font-weight: bold;
        color: #2c3e50;
    }

    .radix-step.completed {
        color: #27ae60;
    }

    .radix-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .radix-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }

    .radix-color-box {
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    .radix-color-box.current-digit {
        background-color: #e74c3c;
    }

    .radix-color-box.sorted {
        background-color: #2ecc71;
    }

    .radix-color-box.moving {
        background-color: #9b59b6;
    }

    .radix-digit-highlight {
        font-weight: bold;
        color: #e74c3c;
    }

    .radix-move-animation {
        animation: moveAnimation 0.5s ease-in-out;
    }

    @keyframes moveAnimation {
        0% { transform: translateY(0); }
        50% { transform: translateY(-30px); }
        100% { transform: translateY(0); }
    }

    body.dark-mode #radix-array-container {
        background-color: #333;
    }
    body.dark-mode #radix-steps-container {
        background-color: var(--background);
        color: white;
    }
    body.dark-mode .radix-card-index {
        color: #ecf0f1;
    }
    body.dark-mode .radix-bucket {
        background-color: #444;
    }
    body.dark-mode .radix-bucket-header {
        color: #ecf0f1;
    }
    .radix-current-step{
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
<main class="main-content radix-sort" id="radix-sort" style="display:none;">
    <h1>Radix Sort Visualization</h1>
    
    <div id="radix-visualization">
        <div id="radix-array-container"></div>

        <div class="radix-current-step"></div>

        <div class="radix-controls">
        <button id="radix-generate-btn">Generate New Array</button>
        <button id="radix-sort-btn">Radix Sort</button>
        <button id="radix-prev-btn">Prev</button>
        <button id="radix-next-btn">Next</button>

        <div class="radix-slider-container">
            <label for="radix-size-slider">Array Size:</label>
            <input type="range" id="radix-size-slider" min="4" max="7" value="4">
            <span id="radix-size-value">8</span>
        </div>
        <div class="radix-slider-container">
            <label for="radix-speed-slider">Speed:</label>
            <input type="range" id="radix-speed-slider" min="1" max="10" value="1">
            <span id="radix-speed-value">1</span>
        </div>
    </div>
        <div class="radix-buckets-container" id="radix-buckets-container"></div>
        <div id="radix-steps-container"></div>
    </div>
    <div class="radix-legend">
        <div class="radix-legend-item">
            <div class="radix-color-box current-digit"></div>
            <span>Current Digit</span>
        </div>
        <div class="radix-legend-item">
            <div class="radix-color-box sorted"></div>
            <span>Sorted</span>
        </div>
        <div class="radix-legend-item">
            <div class="radix-color-box moving"></div>
            <span>Moving</span>
        </div>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const radixArrayContainer = document.getElementById('radix-array-container');
    const radixBucketsContainer = document.getElementById('radix-buckets-container');
    const radixStepsContainer = document.getElementById('radix-steps-container');
    const radixCurrentStepDiv = document.querySelector('.radix-current-step');
    const radixGenerateBtn = document.getElementById('radix-generate-btn');
    const radixSortBtn = document.getElementById('radix-sort-btn');
    // Add these two buttons to your HTML controls!
    let radixPrevBtn = document.getElementById('radix-prev-btn');
    let radixNextBtn = document.getElementById('radix-next-btn');
    const radixSizeSlider = document.getElementById('radix-size-slider');
    const radixSizeValue = document.getElementById('radix-size-value');
    const radixSpeedSlider = document.getElementById('radix-speed-slider');
    const radixSpeedValue = document.getElementById('radix-speed-value');

    // Variables
    let radixArray = [];
    let radixArraySize = parseInt(radixSizeSlider.value);
    let radixSortSpeed = parseInt(radixSpeedSlider.value);
    let radixAnimationSpeed = 1000 / radixSortSpeed;
    let radixStepSnapshots = [];
    let radixStepIndex = 0;
    let isRadixSorting = false;
    let radixAutoSortTimeout = null;

    // Add Prev/Next buttons if not present
    function ensurePrevNextButtons() {
        if (!radixPrevBtn || !radixNextBtn) {
            const controls = document.querySelector('.radix-controls');
            radixPrevBtn = document.createElement('button');
            radixPrevBtn.id = 'radix-prev-btn';
            radixPrevBtn.textContent = 'Prev';
            radixNextBtn = document.createElement('button');
            radixNextBtn.id = 'radix-next-btn';
            radixNextBtn.textContent = 'Next';
            controls.insertBefore(radixPrevBtn, controls.children[2]);
            controls.insertBefore(radixNextBtn, controls.children[3]);
        }
    }
    ensurePrevNextButtons();

    // Initialize
    updateRadixSizeValue();
    updateRadixSpeedValue();
    generateNewRadixArray();

    // Event listeners
    radixGenerateBtn.addEventListener('click', generateNewRadixArray);
    radixSortBtn.addEventListener('click', startRadixAutoSort);
    radixPrevBtn.addEventListener('click', function() {
        stopRadixAutoSort();
        if (radixStepIndex > 0) {
            radixStepIndex--;
            renderRadixStepSnapshot(radixStepIndex);
        }
    });
    radixNextBtn.addEventListener('click', function() {
        stopRadixAutoSort();
        if (radixStepIndex < radixStepSnapshots.length - 1) {
            radixStepIndex++;
            renderRadixStepSnapshot(radixStepIndex);
        }
    });
    radixSizeSlider.addEventListener('input', updateRadixSizeValue);
    radixSpeedSlider.addEventListener('input', updateRadixSpeedValue);

    // Functions
    function updateRadixSizeValue() {
        radixArraySize = parseInt(radixSizeSlider.value);
        radixSizeValue.textContent = radixArraySize;
        generateNewRadixArray();
    }

    function updateRadixSpeedValue() {
        radixSortSpeed = parseInt(radixSpeedSlider.value);
        radixSpeedValue.textContent = radixSortSpeed;
        radixAnimationSpeed = 1000 / radixSortSpeed;
    }

    function generateNewRadixArray() {
        stopRadixAutoSort();
        radixArray = [];
        for (let i = 0; i < radixArraySize; i++) {
            radixArray.push(Math.floor(Math.random() * 900) + 100); // 3-digit numbers (100-999)
        }
        radixStepSnapshots = [];
        radixStepIndex = 0;
        precomputeRadixSortSteps();
        renderRadixStepSnapshot(radixStepIndex);
    }

    function renderRadixArray(arr = radixArray, highlightIndices = [], sortedIndices = []) {
        radixArrayContainer.innerHTML = '';
        arr.forEach((value, index) => {
            const card = document.createElement('div');
            card.className = 'radix-card';
            card.textContent = value;
            card.setAttribute('data-index', index);
            if (highlightIndices.includes(index)) card.classList.add('current-digit');
            if (sortedIndices.includes(index)) card.classList.add('sorted');
            const indexLabel = document.createElement('div');
            indexLabel.className = 'radix-card-index';
            indexLabel.textContent = `[${index}]`;
            card.appendChild(indexLabel);
            radixArrayContainer.appendChild(card);
        });
    }

    function renderBuckets(buckets, currentDigit) {
        radixBucketsContainer.innerHTML = '';
        for (let i = 0; i < 10; i++) {
            const bucket = document.createElement('div');
            bucket.className = 'radix-bucket';
            const header = document.createElement('div');
            header.className = 'radix-bucket-header';
            header.textContent = `Digit ${currentDigit}: ${i}`;
            bucket.appendChild(header);
            const content = document.createElement('div');
            content.className = 'radix-bucket-content';
            if (buckets[i]) {
                buckets[i].forEach(num => {
                    const item = document.createElement('div');
                    item.className = 'radix-bucket-item';
                    item.textContent = num;
                    content.appendChild(item);
                });
            }
            bucket.appendChild(content);
            radixBucketsContainer.appendChild(bucket);
        }
    }

    function addRadixStepSnapshot(arr, buckets, highlightIndices, sortedIndices, description) {
        radixStepSnapshots.push({
            arr: [...arr],
            buckets: buckets ? buckets.map(b => [...b]) : null,
            highlightIndices: [...highlightIndices],
            sortedIndices: [...sortedIndices],
            description: description
        });
    }

    function renderRadixStepSnapshot(idx) {
        const snap = radixStepSnapshots[idx];
        if (!snap) return;
        renderRadixArray(snap.arr, snap.highlightIndices, snap.sortedIndices);
        if (snap.buckets) {
            renderBuckets(snap.buckets, snap.currentDigit || 0);
        } else {
            radixBucketsContainer.innerHTML = '';
        }

        // Show only previous and current steps in #radix-steps-container
        radixStepsContainer.innerHTML = '';
        for (let i = 0; i <= idx; i++) {
            const s = radixStepSnapshots[i];
            const stepDiv = document.createElement('div');
            stepDiv.className = 'radix-step';
            if (i < idx) stepDiv.classList.add('completed');
            if (i === idx) stepDiv.classList.add('active');
            stepDiv.textContent = s.description;
            radixStepsContainer.appendChild(stepDiv);
        }
        // Auto-scroll to bottom so latest step is visible
        radixStepsContainer.scrollTop = radixStepsContainer.scrollHeight;

        // Show only the current step in .radix-current-step
        radixCurrentStepDiv.textContent = snap.description || '';

        // Prev/Next are only disabled at the ends
        radixPrevBtn.disabled = idx === 0;
        radixNextBtn.disabled = radixStepSnapshots.length === 0 || idx === radixStepSnapshots.length - 1;
    }

    function precomputeRadixSortSteps() {
        radixStepSnapshots = [];
        // Initial steps
        addRadixStepSnapshot([...radixArray], null, [], [], "Starting Radix Sort Algorithm");
        addRadixStepSnapshot([...radixArray], null, [], [], "Find the maximum number to know number of digits");
        addRadixStepSnapshot([...radixArray], null, [], [], "For each digit position, from least to most significant:");
        addRadixStepSnapshot([...radixArray], null, [], [], "- Distribute numbers into buckets based on current digit");
        addRadixStepSnapshot([...radixArray], null, [], [], "- Collect numbers from buckets in order");
        addRadixStepSnapshot([...radixArray], null, [], [], "Repeat until all digit positions are processed");

        const arr = [...radixArray];
        const maxNum = Math.max(...arr);
        const maxDigits = maxNum.toString().length;
        addRadixStepSnapshot([...arr], null, [], [], `Maximum number is ${maxNum} with ${maxDigits} digits`);

        for (let digitPos = 0; digitPos < maxDigits; digitPos++) {
            addRadixStepSnapshot([...arr], null, [], [], `Processing digit at position ${digitPos} (${digitPos === 0 ? 'least' : digitPos === maxDigits-1 ? 'most' : ''} significant)`);
            // Create 10 buckets (0-9)
            const buckets = Array.from({ length: 10 }, () => []);
            // Distribute numbers into buckets based on current digit
            addRadixStepSnapshot([...arr], buckets, [], [], `Distributing numbers into buckets based on digit at position ${digitPos}`);
            for (let i = 0; i < arr.length; i++) {
                const num = arr[i];
                const digit = getDigit(num, digitPos);
                addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [i], [], `Number ${num} goes to bucket ${digit} (digit at position ${digitPos} is ${digit})`);
                buckets[digit].push(num);
                addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [i], [], `Placed ${num} in bucket ${digit}`);
            }
            // Collect numbers from buckets in order
            addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [], [], `Collecting numbers from buckets in order (0 to 9)`);
            let index = 0;
            for (let bucketNum = 0; bucketNum < 10; bucketNum++) {
                if (buckets[bucketNum].length > 0) {
                    addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [], [], `Processing bucket ${bucketNum} with ${buckets[bucketNum].length} items`);
                    for (let num of buckets[bucketNum]) {
                        addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [], [], `Moving ${num} to position ${index} in the array`);
                        arr[index] = num;
                        index++;
                        addRadixStepSnapshot([...arr], buckets.map(b => [...b]), [], [], `Array now: ${arr.join(', ')}`);
                    }
                }
            }
            addRadixStepSnapshot([...arr], null, [], [], `Pass ${digitPos + 1} complete. Array after processing digit at position ${digitPos}: ${arr.join(', ')}`);
        }
        // Final visualization - all elements sorted
        addRadixStepSnapshot([...arr], null, [], Array.from({length: arr.length}, (_, i) => i), "All digit positions processed - array is now sorted");
        addRadixStepSnapshot([...arr], null, [], Array.from({length: arr.length}, (_, i) => i), "Radix Sort completed!");
    }

    function getDigit(num, pos) {
        return Math.floor(Math.abs(num) / Math.pow(10, pos)) % 10;
    }

    function startRadixAutoSort() {
        if (isRadixSorting) return;
        isRadixSorting = true;
        radixGenerateBtn.disabled = true;
        radixSortBtn.disabled = true;
        function playStep() {
            if (radixStepIndex < radixStepSnapshots.length - 1) {
                radixStepIndex++;
                renderRadixStepSnapshot(radixStepIndex);
                radixAutoSortTimeout = setTimeout(playStep, radixAnimationSpeed);
            } else {
                isRadixSorting = false;
                radixGenerateBtn.disabled = false;
                radixSortBtn.disabled = false;
            }
        }
        playStep();
    }

    function stopRadixAutoSort() {
        if (radixAutoSortTimeout) {
            clearTimeout(radixAutoSortTimeout);
            radixAutoSortTimeout = null;
        }
        isRadixSorting = false;
        radixGenerateBtn.disabled = false;
        radixSortBtn.disabled = false;
    }
});
</script>
