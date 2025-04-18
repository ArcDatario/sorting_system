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
        min-width: 100px;
        min-height: 150px;
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 10px;
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
</style>

<main class="main-content radix-sort" id="radix-sort" style="display:none;">
    <h1>Radix Sort Visualization</h1>
    <div class="radix-controls">
        <button id="radix-generate-btn">Generate New Array</button>
        <button id="radix-sort-btn">Radix Sort</button>
        <div class="radix-slider-container">
            <label for="radix-size-slider">Array Size:</label>
            <input type="range" id="radix-size-slider" min="4" max="7" value="4">
            <span id="radix-size-value">8</span>
        </div>
        <div class="radix-slider-container">
            <label for="radix-speed-slider">Speed:</label>
            <input type="range" id="radix-speed-slider" min="1" max="10" value="3">
            <span id="radix-speed-value">3</span>
        </div>
    </div>
    <div id="radix-visualization">
        <div id="radix-array-container"></div>
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
        const radixGenerateBtn = document.getElementById('radix-generate-btn');
        const radixSortBtn = document.getElementById('radix-sort-btn');
        const radixSizeSlider = document.getElementById('radix-size-slider');
        const radixSizeValue = document.getElementById('radix-size-value');
        const radixSpeedSlider = document.getElementById('radix-speed-slider');
        const radixSpeedValue = document.getElementById('radix-speed-value');

        // Variables
        let radixArray = [];
        let radixArraySize = parseInt(radixSizeSlider.value);
        let radixSortSpeed = parseInt(radixSpeedSlider.value);
        let isRadixSorting = false;
        let radixAnimationSpeed = 1000 / radixSortSpeed;
        let radixSteps = [];
        let currentRadixStep = 0;

        // Initialize
        updateRadixSizeValue();
        updateRadixSpeedValue();
        generateNewRadixArray();

        // Event listeners
        radixGenerateBtn.addEventListener('click', generateNewRadixArray);
        radixSortBtn.addEventListener('click', startRadixSort);
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
            if (isRadixSorting) return;
            
            radixArray = [];
            for (let i = 0; i < radixArraySize; i++) {
                radixArray.push(Math.floor(Math.random() * 900) + 100); // 3-digit numbers (100-999)
            }
            
            renderRadixArray();
            radixBucketsContainer.innerHTML = '';
            radixStepsContainer.innerHTML = '';
            radixSteps = [];
            currentRadixStep = 0;
        }

        function renderRadixArray() {
            radixArrayContainer.innerHTML = '';
            
            radixArray.forEach((value, index) => {
                const card = document.createElement('div');
                card.className = 'radix-card';
                card.textContent = value;
                card.setAttribute('data-index', index);
                
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

        function highlightDigit(number, digitPos) {
            const str = number.toString();
            if (digitPos >= str.length) return '0';
            
            const digit = str[str.length - 1 - digitPos];
            return str.substring(0, str.length - 1 - digitPos) + 
                   `<span class="radix-digit-highlight">${digit}</span>` + 
                   str.substring(str.length - digitPos);
        }

        function addRadixStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `radix-step ${isActive ? 'active' : ''}`;
            step.innerHTML = description;
            radixStepsContainer.appendChild(step);
            radixSteps.push(step);
            
            // Auto-scroll to the latest step
            radixStepsContainer.scrollTop = radixStepsContainer.scrollHeight;
        }

        function updateRadixSteps(currentIndex) {
            radixSteps.forEach((step, index) => {
                step.className = 'radix-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        async function startRadixSort() {
            if (isRadixSorting) return;
            
            isRadixSorting = true;
            radixGenerateBtn.disabled = true;
            radixSortBtn.disabled = true;
            radixStepsContainer.innerHTML = '';
            radixSteps = [];
            currentRadixStep = 0;
            
            // Initial steps
            addRadixStep("Starting Radix Sort Algorithm", true);
            addRadixStep("Find the maximum number to know number of digits");
            addRadixStep("For each digit position, from least to most significant:");
            addRadixStep("&nbsp;&nbsp;- Distribute numbers into buckets based on current digit");
            addRadixStep("&nbsp;&nbsp;- Collect numbers from buckets in order");
            addRadixStep("Repeat until all digit positions are processed");
            
            // Create a copy of the array to sort
            const sortingArray = [...radixArray];
            
            // Perform radix sort with visualization
            await radixSort(sortingArray);
            
            addRadixStep("Radix Sort completed!", false);
            updateRadixSteps(radixSteps.length);
            
            isRadixSorting = false;
            radixGenerateBtn.disabled = false;
            radixSortBtn.disabled = false;
        }

        async function radixSort(arr) {
            // Get maximum number to know number of digits
            const maxNum = Math.max(...arr);
            const maxDigits = maxNum.toString().length;
            
            addRadixStep(`Maximum number is ${maxNum} with ${maxDigits} digits`, true);
            updateRadixSteps(1);
            await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
            
            for (let digitPos = 0; digitPos < maxDigits; digitPos++) {
                addRadixStep(`Processing digit at position ${digitPos} (${digitPos === 0 ? 'least' : digitPos === maxDigits-1 ? 'most' : ''} significant)`, true);
                updateRadixSteps(2);
                
                // Create 10 buckets (0-9)
                const buckets = Array.from({ length: 10 }, () => []);
                
                // Distribute numbers into buckets based on current digit
                addRadixStep(`Distributing numbers into buckets based on digit at position ${digitPos}`, true);
                updateRadixSteps(3);
                
                for (let i = 0; i < arr.length; i++) {
                    const num = arr[i];
                    const digit = getDigit(num, digitPos);
                    
                    // Highlight current digit in the number
                    const cards = document.querySelectorAll('.radix-card');
                    cards[i].innerHTML = highlightDigit(num, digitPos) + 
                                        `<div class="radix-card-index">[${i}]</div>`;
                    cards[i].classList.add('current-digit');
                    
                    addRadixStep(`Number ${num} goes to bucket ${digit} (digit at position ${digitPos} is ${digit})`, true);
                    updateRadixSteps(3);
                    
                    await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
                    
                    // Add to bucket
                    buckets[digit].push(num);
                    
                    // Update buckets visualization
                    renderBuckets(buckets, digitPos);
                    
                    // Highlight the bucket item being added
                    const bucketItems = document.querySelectorAll(`.radix-bucket:nth-child(${digit + 1}) .radix-bucket-item`);
                    if (bucketItems.length > 0) {
                        bucketItems[bucketItems.length - 1].classList.add('current');
                    }
                    
                    await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
                    
                    // Remove highlight
                    cards[i].classList.remove('current-digit');
                    if (bucketItems.length > 0) {
                        bucketItems[bucketItems.length - 1].classList.remove('current');
                    }
                }
                
                // Collect numbers from buckets in order
                addRadixStep(`Collecting numbers from buckets in order (0 to 9)`, true);
                updateRadixSteps(4);
                
                let index = 0;
                for (let bucketNum = 0; bucketNum < 10; bucketNum++) {
                    if (buckets[bucketNum].length > 0) {
                        addRadixStep(`Processing bucket ${bucketNum} with ${buckets[bucketNum].length} items`, true);
                        updateRadixSteps(4);
                        
                        for (let num of buckets[bucketNum]) {
                            // Find the card in the original array that matches this number
                            // (This is simplified for visualization - in actual radix sort, we'd reconstruct the array)
                            const cardIndex = arr.indexOf(num);
                            if (cardIndex !== -1) {
                                const card = document.querySelector(`.radix-card[data-index="${cardIndex}"]`);
                                card.classList.add('moving');
                                card.innerHTML = num + `<div class="radix-card-index">[${index}]</div>`;
                                
                                addRadixStep(`Moving ${num} to position ${index} in the array`, true);
                                updateRadixSteps(4);
                                
                                await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
                                
                                card.classList.remove('moving');
                                card.classList.add('radix-move-animation');
                                await new Promise(resolve => setTimeout(resolve, 500));
                                card.classList.remove('radix-move-animation');
                            }
                            
                            arr[index] = num;
                            index++;
                        }
                    }
                }
                
                // Update array visualization
                renderRadixArray();
                await updateRadixVisualization(arr, digitPos + 1);
                
                addRadixStep(`Pass ${digitPos + 1} complete. Array after processing digit at position ${digitPos}: ${arr.join(', ')}`, true);
                updateRadixSteps(5);
                
                await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
            }
            
            // Final visualization - all elements sorted
            await updateRadixVisualization(arr, maxDigits, true);
            
            addRadixStep("All digit positions processed - array is now sorted", true);
            updateRadixSteps(6);
            
            // Update the original array
            radixArray = [...arr];
        }

        function getDigit(num, pos) {
            return Math.floor(Math.abs(num) / Math.pow(10, pos)) % 10;
        }

        async function updateRadixVisualization(arr, digitPos, allSorted = false) {
            // Update array visualization
            const cards = document.querySelectorAll('.radix-card');
            
            arr.forEach((value, index) => {
                const card = cards[index];
                card.innerHTML = value + `<div class="radix-card-index">[${index}]</div>`;
                
                // Reset classes
                card.className = 'radix-card';
                
                // Add appropriate classes
                if (allSorted) {
                    card.classList.add('sorted');
                }
            });
            
            // Add delay for animation
            await new Promise(resolve => setTimeout(resolve, radixAnimationSpeed));
        }
    });
</script>