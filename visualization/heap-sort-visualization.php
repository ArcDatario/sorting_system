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
        .heap-current-steps{
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

<!-- ... keep your <style> as is ... -->

<main class="main-content heap-sort" id="heap-sort" style="display:none;">
    <h1>Heap Sort Visualization</h1>
    
    <div id="heapsort-visualization">
        <div id="heapsort-array-container"></div>

        <div class="heap-current-steps"></div>

        <div class="controls">
        <button id="heapsort-generate-btn">Generate New Array</button>
        <button id="heapsort-sort-btn">Heap Sort</button>
        <button id="heapsort-prev-btn">Previous Step</button>
        <button id="heapsort-next-btn">Next Step</button>
        <div class="slider-container">
            <label for="heapsort-size-slider">Array Size:</label>
            <input type="range" id="heapsort-size-slider" min="5" max="7" value="5">
            <span id="heapsort-size-value">5</span>
        </div>
        <div class="slider-container">
            <label for="heapsort-speed-slider">Speed:</label>
            <input type="range" id="heapsort-speed-slider" min="1" max="10" value="1">
            <span id="heapsort-speed-value">1</span>
        </div>
    </div>
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
    const heapCurrentStepsDiv = document.querySelector('.heap-current-steps'); // <-- cache this
    const heapsortGenerateBtn = document.getElementById('heapsort-generate-btn');
    const heapsortSortBtn = document.getElementById('heapsort-sort-btn');
    const heapsortPrevBtn = document.getElementById('heapsort-prev-btn');
    const heapsortNextBtn = document.getElementById('heapsort-next-btn');
    const heapsortSizeSlider = document.getElementById('heapsort-size-slider');
    const heapsortSizeValue = document.getElementById('heapsort-size-value');
    const heapsortSpeedSlider = document.getElementById('heapsort-speed-slider');
    const heapsortSpeedValue = document.getElementById('heapsort-speed-value');

    // Variables
    let heapsortArray = [];
    let heapsortArraySize = parseInt(heapsortSizeSlider.value);
    let heapsortSpeed = parseInt(heapsortSpeedSlider.value);
    let heapsortAnimationSpeed = 1000 / heapsortSpeed;
    let heapsortSortingSteps = [];
    let heapsortCurrentSortingStep = 0;
    let heapsortIsSorting = false;
    let heapsortAutoSortTimeout = null;

    // Initialize
    heapsortUpdateSizeValue();
    heapsortUpdateSpeedValue();
    heapsortGenerateNewArray();

    // Event listeners
    heapsortGenerateBtn.addEventListener('click', heapsortGenerateNewArray);
    heapsortSortBtn.addEventListener('click', heapsortAutoSort);
    heapsortSizeSlider.addEventListener('input', heapsortUpdateSizeValue);
    heapsortSpeedSlider.addEventListener('input', heapsortUpdateSpeedValue);
    heapsortPrevBtn.addEventListener('click', function() {
        if (heapsortCurrentSortingStep > 0) {
            heapsortStopAutoSort();
            heapsortCurrentSortingStep--;
            heapsortRenderStep(heapsortCurrentSortingStep);
        }
    });
    heapsortNextBtn.addEventListener('click', function() {
        if (heapsortCurrentSortingStep < heapsortSortingSteps.length - 1) {
            heapsortStopAutoSort();
            heapsortCurrentSortingStep++;
            heapsortRenderStep(heapsortCurrentSortingStep);
        }
    });

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
        heapsortStopAutoSort();
        heapsortArray = [];
        for (let i = 0; i < heapsortArraySize; i++) {
            heapsortArray.push(Math.floor(Math.random() * 90) + 10);
        }
        heapsortSortingSteps = [];
        heapsortCurrentSortingStep = 0;
        heapsortHeapContainer.classList.add('heapsort-hidden');
        heapsortPrecomputeSteps();
        heapsortRenderStep(0);
        heapsortPrevBtn.disabled = true;
        heapsortNextBtn.disabled = heapsortSortingSteps.length <= 1;
        heapsortSortBtn.disabled = false;
    }

    function heapsortRenderArray(arr, highlighted = [], swapping = [], sorted = []) {
        heapsortArrayContainer.innerHTML = '';
        const maxValue = Math.max(...arr, 1);
        arr.forEach((value, idx) => {
            const bar = document.createElement('div');
            bar.className = 'heapsort-array-bar';
            bar.style.height = `${(value / maxValue) * 100}%`;
            const label = document.createElement('div');
            label.className = 'heapsort-array-bar-label';
            label.textContent = value;
            bar.appendChild(label);
            bar.setAttribute('data-index', idx);
            if (highlighted.includes(idx)) bar.classList.add('comparing');
            else if (swapping.includes(idx)) bar.classList.add('swapping');
            else if (sorted.includes(idx)) bar.classList.add('sorted');
            heapsortArrayContainer.appendChild(bar);
        });
    }

    function heapsortRenderHeap(arr, highlighted = [], swapping = [], sorted = []) {
        heapsortHeapContainer.innerHTML = '';
        heapsortHeapContainer.classList.remove('heapsort-hidden');
        if (arr.length === 0) return;
        const levels = Math.ceil(Math.log2(arr.length + 1));
        const nodeSize = 40;
        const levelHeight = 80;
        const nodePositions = [];
        for (let level = 0; level < levels; level++) {
            const levelStart = Math.pow(2, level) - 1;
            const levelEnd = Math.min(Math.pow(2, level + 1) - 1, arr.length);
            const levelDiv = document.createElement('div');
            levelDiv.className = 'heapsort-heap-level';
            levelDiv.style.marginTop = level === 0 ? '0' : '40px';
            for (let i = levelStart; i < levelEnd; i++) {
                const node = document.createElement('div');
                node.className = 'heapsort-heap-node';
                if (highlighted.includes(i)) node.classList.add('comparing');
                else if (swapping.includes(i)) node.classList.add('swapping');
                else if (sorted.includes(i)) node.classList.add('sorted');
                node.textContent = arr[i];
                node.setAttribute('data-index', i);
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
        // Draw connections
        for (let i = 0; i < arr.length; i++) {
            const leftChild = 2 * i + 1;
            const rightChild = 2 * i + 2;
            if (leftChild < arr.length && nodePositions[i] && nodePositions[leftChild]) {
                heapsortDrawConnection(nodePositions[i], nodePositions[leftChild]);
            }
            if (rightChild < arr.length && nodePositions[i] && nodePositions[rightChild]) {
                heapsortDrawConnection(nodePositions[i], nodePositions[rightChild]);
            }
        }
    }

    function heapsortDrawConnection(from, to) {
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

    // Render all steps in info panel, highlight current, and show current step in .heap-current-steps
    
function heapsortRenderStep(idx) {
    const step = heapsortSortingSteps[idx];
    if (!step) return;
    heapsortRenderArray(step.arr, step.highlighted, step.swapping, step.sorted);
    heapsortRenderHeap(step.arr, step.highlighted, step.swapping, step.sorted);

    // Show only previous and current steps in #heapsort-steps-container
    heapsortStepsContainer.innerHTML = '';
    for (let i = 0; i <= idx; i++) {
        const s = heapsortSortingSteps[i];
        const stepDiv = document.createElement('div');
        stepDiv.className = 'heapsort-step';
        if (i < idx) stepDiv.classList.add('completed');
        if (i === idx) stepDiv.classList.add('active');
        stepDiv.textContent = s.description;
        heapsortStepsContainer.appendChild(stepDiv);
    }

    // Display only the current step description in .heap-current-steps
    if (heapCurrentStepsDiv) {
        heapCurrentStepsDiv.textContent = step.description || '';
    }

    heapsortPrevBtn.disabled = idx === 0;
    heapsortNextBtn.disabled = idx === heapsortSortingSteps.length - 1;
}



    function heapsortPrecomputeSteps() {
        // Precompute all steps for the current array
        heapsortSortingSteps = [];
        const arr = [...heapsortArray];
        let sortedIndices = [];
        // Build max heap
        heapsortAddStep(arr, [], [], sortedIndices, "Building max heap...");
        for (let i = Math.floor(arr.length / 2) - 1; i >= 0; i--) {
            heapsortAddStep(arr, [i], [], sortedIndices, `Heapifying subtree rooted at index ${i}`);
            heapsortHeapify(arr, arr.length, i, sortedIndices);
        }
        heapsortAddStep(arr, [], [], sortedIndices, "Max heap built successfully.");
        // Heap sort
        for (let i = arr.length - 1; i > 0; i--) {
            heapsortAddStep(arr, [0, i], [0, i], sortedIndices, `Moving root (${arr[0]}) to end at position ${i}`);
            swap(arr, 0, i);
            sortedIndices = [...sortedIndices, i];
            heapsortAddStep(arr, [0], [], sortedIndices, `Heapifying reduced heap (size ${i})`);
            heapsortHeapify(arr, i, 0, sortedIndices);
        }
        sortedIndices = Array.from({length: arr.length}, (_, i) => i);
        heapsortAddStep(arr, [], [], sortedIndices, "Array is now completely sorted.");
    }

    function heapsortAddStep(arr, highlighted, swapping, sorted, description) {
        heapsortSortingSteps.push({
            arr: [...arr],
            highlighted: [...highlighted],
            swapping: [...swapping],
            sorted: [...sorted],
            description
        });
    }

    function heapsortHeapify(arr, n, i, sortedIndices) {
        let largest = i;
        const left = 2 * i + 1;
        const right = 2 * i + 2;
        if (left < n) {
            heapsortAddStep(arr, [i, left], [], sortedIndices, `Comparing parent (${arr[i]}) with left child (${arr[left]})`);
            if (arr[left] > arr[largest]) {
                largest = left;
                heapsortAddStep(arr, [left], [], sortedIndices, `Left child is larger (${arr[left]} > ${arr[i]})`);
            }
        }
        if (right < n) {
            heapsortAddStep(arr, [i, right], [], sortedIndices, `Comparing parent (${arr[i]}) with right child (${arr[right]})`);
            if (arr[right] > arr[largest]) {
                largest = right;
                heapsortAddStep(arr, [right], [], sortedIndices, `Right child is larger (${arr[right]} > ${arr[i]})`);
            }
        }
        if (largest !== i) {
            heapsortAddStep(arr, [i, largest], [i, largest], sortedIndices, `Swapping parent (${arr[i]}) with larger child (${arr[largest]})`);
            swap(arr, i, largest);
            heapsortAddStep(arr, [largest], [], sortedIndices, `Recursively heapifying affected subtree`);
            heapsortHeapify(arr, n, largest, sortedIndices);
        } else {
            heapsortAddStep(arr, [i], [], sortedIndices, `Subtree rooted at index ${i} satisfies heap property`);
        }
    }

    function swap(arr, i, j) {
        const temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }

    // Auto-sort (play all steps with animation)
    function heapsortAutoSort() {
        if (heapsortIsSorting) {
            heapsortStopAutoSort();
            return;
        }
        heapsortIsSorting = true;
        heapsortSortBtn.disabled = true;
        heapsortGenerateBtn.disabled = true;
        heapsortPrevBtn.disabled = true;
        heapsortNextBtn.disabled = true;
        heapsortCurrentSortingStep = 0;
        function playStep() {
            heapsortRenderStep(heapsortCurrentSortingStep);
            if (heapsortCurrentSortingStep < heapsortSortingSteps.length - 1) {
                heapsortCurrentSortingStep++;
                heapsortAutoSortTimeout = setTimeout(playStep, heapsortAnimationSpeed);
            } else {
                heapsortIsSorting = false;
                heapsortSortBtn.disabled = false;
                heapsortGenerateBtn.disabled = false;
                heapsortPrevBtn.disabled = false;
                heapsortNextBtn.disabled = false;
            }
        }
        playStep();
    }

    function heapsortStopAutoSort() {
        if (heapsortAutoSortTimeout) {
            clearTimeout(heapsortAutoSortTimeout);
            heapsortAutoSortTimeout = null;
        }
        heapsortIsSorting = false;
        heapsortSortBtn.disabled = false;
        heapsortGenerateBtn.disabled = false;
        heapsortPrevBtn.disabled = heapsortCurrentSortingStep === 0;
        heapsortNextBtn.disabled = heapsortCurrentSortingStep === heapsortSortingSteps.length - 1;
    }
});
</script>
