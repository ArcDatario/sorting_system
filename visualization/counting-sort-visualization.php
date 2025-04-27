
<style>
    .counting-sort-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .counting-sort-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }
    .counting-sort-arrays {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 30px;
    }
    .counting-sort-array-box {
        flex: 1;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .counting-sort-array-title {
        margin: 0 0 15px 0;
        color: #3498db;
        text-align: center;
        font-size: 18px;
    }
    .counting-sort-elements {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
    }
    .counting-sort-element {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #3498db;
        color: white;
        border-radius: 6px;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .counting-sort-element.highlight {
        background-color: #e74c3c;
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(231, 76, 60, 0.5);
    }
    .counting-sort-element.zero {
        background-color: #ecf0f1;
        color: #95a5a6;
    }
    .counting-sort-controls {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    .counting-sort-button {
        padding: 10px 20px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }
    .counting-sort-button:hover {
        background-color: #2980b9;
    }
    .counting-sort-button:disabled {
        background-color: #bdc3c7;
        cursor: not-allowed;
    }
    .counting-sort-message {
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
    .counting-sort-info {
        margin-top: 30px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #3498db;
    }
    .counting-sort-info-title {
        margin: 0 0 10px 0;
        color: #2c3e50;
    }
    .counting-sort-description {
        margin: 0;
        line-height: 1.6;
    }
    .counting-sort-info-panel {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
        margin-bottom: 20px;
    }
    .counting-sort-info-panel::-webkit-scrollbar {
        width: 8px;
    }
    .counting-sort-info-panel::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }
    .counting-sort-info-panel::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }
    .counting-sort-info-panel::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }
    .counting-sort-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }
    .counting-sort-step.active {
        font-weight: bold;
        color: #2c3e50;
    }
    .counting-sort-step.completed {
        color: #27ae60;
    }

    /* Dark mode support */
    body.dark-mode .counting-sort-array-box,
    body.dark-mode .counting-sort-message,
    body.dark-mode .counting-sort-info,
    body.dark-mode .counting-sort-info-panel {
        background-color: #333;
        color: #fff;
    }
    body.dark-mode .counting-sort-element.zero {
        background-color: #444;
        color: #777;
    }
    body.dark-mode .counting-sort-step.active {
        color: #fff;
    }
</style>
<main class=" main-content counting-sort" id="counting-sort" style="display:none;">
    <h2 class="counting-sort-title">Counting Sort Visualization</h2>
    
    <div class="counting-sort-arrays">
        <div class="counting-sort-array-box" id="counting-sort-original-box">
            <h3 class="counting-sort-array-title">Original Array</h3>
            <div class="counting-sort-elements" id="counting-sort-original-array"></div>
        </div>
        
        <div class="counting-sort-array-box" id="counting-sort-count-box">
            <h3 class="counting-sort-array-title">Count Array</h3>
            <div class="counting-sort-elements" id="counting-sort-count-array"></div>
        </div>
        
        <div class="counting-sort-array-box" id="counting-sort-output-box">
            <h3 class="counting-sort-array-title">Output Array</h3>
            <div class="counting-sort-elements" id="counting-sort-output-array"></div>
        </div>
    </div>
    
    <div class="counting-sort-message" id="counting-sort-message"></div>
    
    <div class="counting-sort-controls">
        <button class="counting-sort-button" id="counting-sort-prev-btn" disabled>Previous Step</button>
        <button class="counting-sort-button" id="counting-sort-next-btn">Next Step</button>
        <button class="counting-sort-button" id="counting-sort-reset-btn">Reset</button>
    </div>
    
    <div id="counting-sort-info-panel" class="counting-sort-info-panel"></div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const originalArrayEl = document.getElementById('counting-sort-original-array');
        const countArrayEl = document.getElementById('counting-sort-count-array');
        const outputArrayEl = document.getElementById('counting-sort-output-array');
        const messageEl = document.getElementById('counting-sort-message');
        const prevBtn = document.getElementById('counting-sort-prev-btn');
        const nextBtn = document.getElementById('counting-sort-next-btn');
        const resetBtn = document.getElementById('counting-sort-reset-btn');
        const infoPanel = document.getElementById('counting-sort-info-panel');
        
        // Algorithm variables
        let inputArray = [4, 2, 2, 8, 3, 3, 1];
        let minValue = Math.min(...inputArray);
        let maxValue = Math.max(...inputArray);
        let range = maxValue - minValue + 1;
        let countArray = new Array(range).fill(0);
        let outputArray = [];
        let algorithmSteps = [];
        let currentStepIndex = 0;
        let infoStepDescriptions = [];
        let stepToInfoIndex = []; // Map each algorithm step to its infoStepDescriptions index (or -1)
        
        // Initialize the visualization
        initializeCountingSort();
        
        // Event listeners
        prevBtn.addEventListener('click', goToPreviousStep);
        nextBtn.addEventListener('click', goToNextStep);
        resetBtn.addEventListener('click', resetCountingSort);
        
        function initializeCountingSort() {
            // Clear any existing steps
            algorithmSteps = [];
            infoStepDescriptions = [];
            stepToInfoIndex = [];
            currentStepIndex = 0;
            infoPanel.innerHTML = '';
            
            // Generate the counting sort steps
            generateCountingSortSteps();
            
            // Render the initial state
            renderCurrentStep();
            
            // Update button states
            updateControlButtons();
        }
        
        function generateCountingSortSteps() {
            // Record initial state
            recordStep("Initial arrays", { type: 'none', index: -1 }, "Starting Counting Sort Algorithm");
            addInfoStepDescription("Step 1: Initialize count array with zeros");
            addInfoStepDescription("Step 2: Count occurrences of each number");
            addInfoStepDescription("Step 3: Build output array using counts");
            
            // Step 1: Count occurrences of each number
            recordStep("Counting occurrences of each number in input array", { type: 'none', index: -1 }, "Counting occurrences of each number in input array");
            
            for (let i = 0; i < inputArray.length; i++) {
                const value = inputArray[i];
                recordStep(`Processing original[${i}] = ${value}`, { type: 'input', index: i }, `Found ${value} at index ${i}, incrementing count[${value - minValue}]`);
                
                countArray[value - minValue]++;
                recordStep(`Incremented count for ${value} (count[${value - minValue}] = ${countArray[value - minValue]})`, 
                          { type: 'count', index: value - minValue }, `Count for ${value} is now ${countArray[value - minValue]}`);
            }
            
            // Step 2: Build output array directly from countArray
            recordStep("Building output array using counts", { type: 'none', index: -1 }, "Building output array using counts");
            
            for (let value = minValue; value <= maxValue; value++) {
                const count = countArray[value - minValue];
                recordStep(`Found ${count} occurrences of ${value}`, { type: 'count', index: value - minValue }, `Found ${count} occurrences of ${value}`);
                
                for (let k = 0; k < count; k++) {
                    recordStep(`Adding ${value} to output array`, { type: 'output', index: outputArray.length }, `Adding ${value} to output array at position ${outputArray.length}`);
                    
                    outputArray.push(value);
                    recordStep(`Added ${value} to output[${outputArray.length - 1}]`, 
                              { type: 'output', index: outputArray.length - 1 }, `Output array now has ${value} at position ${outputArray.length - 1}`);
                }
            }
            
            // Record final state
            recordStep("Counting sort completed!", { type: 'none', index: -1 }, "Counting Sort completed! Array is now sorted");
        }
        
        function recordStep(message, highlight, infoDescription) {
            algorithmSteps.push({
                message,
                inputArray: [...inputArray],
                countArray: [...countArray],
                outputArray: [...outputArray],
                highlight,
                infoDescription: infoDescription || ""
            });
            // Map this step to the infoStepDescriptions index (or -1 if none)
            if (infoDescription) {
                addInfoStepDescription(infoDescription);
                stepToInfoIndex.push(infoStepDescriptions.length - 1);
            } else {
                stepToInfoIndex.push(-1);
            }
        }
        
        function addInfoStepDescription(description) {
            infoStepDescriptions.push(description);
        }
        
        function renderCurrentStep() {
            const step = algorithmSteps[currentStepIndex];
            
            // Render original array
            originalArrayEl.innerHTML = step.inputArray.map((value, index) => {
                const classes = ['counting-sort-element'];
                if (step.highlight.type === 'input' && step.highlight.index === index) {
                    classes.push('highlight');
                }
                return `<div class="${classes.join(' ')}">${value}</div>`;
            }).join('');
            
            // Render count array
            countArrayEl.innerHTML = step.countArray.map((count, index) => {
                const classes = ['counting-sort-element'];
                if (step.highlight.type === 'count' && step.highlight.index === index) {
                    classes.push('highlight');
                }
                if (count === 0) {
                    classes.push('zero');
                }
                return `<div class="${classes.join(' ')}">${index + minValue}:${count}</div>`;
            }).join('');
            
            // Render output array
            outputArrayEl.innerHTML = step.outputArray.map((value, index) => {
                const classes = ['counting-sort-element'];
                if (step.highlight.type === 'output' && step.highlight.index === index) {
                    classes.push('highlight');
                }
                return `<div class="${classes.join(' ')}">${value}</div>`;
            }).join('');
            
            // Update message
            messageEl.textContent = step.message;
            
            // Update info panel steps (accumulate all up to current, and highlight only the info step that matches the current step)
            renderInfoPanel();
        }
        
        function renderInfoPanel() {
            infoPanel.innerHTML = '';
            // Find the highest infoStepDescriptions index reached so far
            let maxInfoIndex = -1;
            for (let i = 0; i <= currentStepIndex; i++) {
                if (stepToInfoIndex[i] > maxInfoIndex) {
                    maxInfoIndex = stepToInfoIndex[i];
                }
            }
            // Find the info step index that matches the current step
            let currentInfoIndex = stepToInfoIndex[currentStepIndex];

            // Show all info steps up to maxInfoIndex
            for (let idx = 0; idx <= maxInfoIndex; idx++) {
                const div = document.createElement('div');
                div.className = (idx === currentInfoIndex) ? 'counting-sort-step active' : 'counting-sort-step completed';
                div.textContent = infoStepDescriptions[idx];
                infoPanel.appendChild(div);
            }
            // --- Auto-scroll to the highlighted step ---
            setTimeout(() => {
                const activeStep = infoPanel.querySelector('.counting-sort-step.active');
                if (activeStep) {
                    activeStep.scrollIntoView({ behavior: "smooth", block: "nearest" });
                } else {
                    infoPanel.scrollTop = infoPanel.scrollHeight;
                }
            }, 0);
        }
        
        function goToPreviousStep() {
            if (currentStepIndex > 0) {
                currentStepIndex--;
                renderCurrentStep();
                updateControlButtons();
            }
        }
        
        function goToNextStep() {
            if (currentStepIndex < algorithmSteps.length - 1) {
                currentStepIndex++;
                renderCurrentStep();
                updateControlButtons();
            }
        }
        
        function resetCountingSort() {
            // Reset algorithm variables
            countArray = new Array(range).fill(0);
            outputArray = [];
            
            // Reinitialize
            initializeCountingSort();
        }
        
        function updateControlButtons() {
            prevBtn.disabled = currentStepIndex === 0;
            nextBtn.disabled = currentStepIndex === algorithmSteps.length - 1;
        }
    });
</script>
