<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counting Sort Visualization</title>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.5;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .table-container {
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow-x: auto;
            margin-bottom: 20px;
            max-height: 400px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f1f3f5;
            position: sticky;
            top: 0;
            font-weight: 600;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .highlight {
            background-color: #e6f7ff;
        }

        .controls {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        button {
            padding: 8px 16px;
            background: #4a6bdf;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background 0.2s;
        }

        button:hover {
            background: #3a5bd9;
        }

        button:disabled {
            background: #b1b7d0;
            cursor: not-allowed;
        }

        #prev {
            background: #6c757d;
        }

        #prev:hover {
            background: #5a6268;
        }

        #generate {
            background: #28a745;
        }

        #generate:hover {
            background: #218838;
        }

        #auto {
            background: #fd7e14;
        }

        #auto:hover {
            background: #e36209;
        }

        .array-display {
            display: flex;
            gap: 4px;
        }

        .array-item {
            padding: 4px 8px;
            background: #e9ecef;
            border-radius: 3px;
            min-width: 24px;
            text-align: center;
            font-size: 13px;
        }

        .array-item.highlight {
            background: #4a6bdf;
            color: white;
            font-weight: bold;
        }

        #explanation {
            padding: 12px 16px;
            background: white;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            font-size: 14px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            th, td {
                padding: 8px 10px;
                font-size: 13px;
            }
            
            button {
                padding: 6px 12px;
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="controls">
            <button id="generate">Generate</button>
            <button id="prev" disabled>Previous</button>
            <button id="step">Next</button>
            <button id="auto">Auto</button>
        </div>

        <div class="table-container">
            <table id="counting-table">
                <thead>
                    <tr>
                        <th>Step</th>
                        <th>Action</th>
                        <th>Input</th>
                        <th>Count</th>
                        <th>Output</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div id="explanation">Click "Generate" to create a new array, then use "Next" to step through the algorithm.</div>
    </div>

    <script>
        const config = {
            size: 6,
            min: 1,
            max: 5
        };

        let state = {
            input: [],
            count: [],
            output: [],
            step: 0,
            steps: [],
            auto: false,
            intervalId: null
        };

        function init() {
            generate();
            
            document.getElementById('generate').addEventListener('click', generate);
            document.getElementById('step').addEventListener('click', nextStep);
            document.getElementById('prev').addEventListener('click', prevStep);
            document.getElementById('auto').addEventListener('click', toggleAuto);
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') nextStep();
                if (e.key === 'ArrowLeft') prevStep();
                if (e.key === ' ') toggleAuto();
            });
        }

        function generate() {
            if (state.auto) toggleAuto();
            
            state.input = Array.from({length: config.size}, () => 
                Math.floor(Math.random() * config.max) + config.min
            );
            state.count = new Array(config.max + 1).fill(0);
            state.output = [];
            state.step = 0;
            state.steps = [];
            buildSteps();
            renderTable();
            updateExplanation("Generated new array. Click 'Next' to begin.");
            updateButtons();
        }

        function buildSteps() {
            // Initial state
            state.steps.unshift({
                action: "Initial state",
                input: [...state.input],
                count: [...state.count],
                output: [],
                explanation: "Starting counting sort algorithm"
            });
            
            // Counting phase
            const count = [...state.count];
            for (let i = 0; i < state.input.length; i++) {
                const num = state.input[i];
                count[num]++;
                state.steps.unshift({
                    action: `Count ${num}`,
                    input: [...state.input],
                    highlightInput: i,
                    count: [...count],
                    highlightCount: num,
                    output: [],
                    explanation: `Increment count[${num}] to ${count[num]}`
                });
            }
            
            // Accumulating phase
            for (let i = config.min + 1; i <= config.max; i++) {
                count[i] += count[i - 1];
                state.steps.unshift({
                    action: `Accumulate ${i}`,
                    input: [...state.input],
                    count: [...count],
                    highlightCount: i,
                    output: [],
                    explanation: `Add count[${i-1}] to count[${i}] = ${count[i]}`
                });
            }
            
            // Building output
            const output = new Array(state.input.length).fill(null);
            const tempCount = [...count];
            for (let i = state.input.length - 1; i >= 0; i--) {
                const num = state.input[i];
                const pos = tempCount[num] - 1;
                output[pos] = num;
                tempCount[num]--;
                state.steps.unshift({
                    action: `Place ${num}`,
                    input: [...state.input],
                    highlightInput: i,
                    count: [...count],
                    highlightCount: num,
                    output: [...output],
                    highlightOutput: pos,
                    explanation: `Place ${num} at output[${pos}]`
                });
            }
            
            // Final state
            state.steps.unshift({
                action: "Completed",
                input: [...output],
                count: [...count],
                output: [...output],
                explanation: "Counting sort complete! Array is now sorted."
            });
        }

        function renderTable() {
            const tbody = document.querySelector('#counting-table tbody');
            tbody.innerHTML = '';
            
            // Always show the current step at the top (reversed order)
            const startIdx = Math.max(0, state.steps.length - state.step - 1);
            const endIdx = state.steps.length;
            
            for (let i = startIdx; i < endIdx; i++) {
                const step = state.steps[i];
                const row = document.createElement('tr');
                if (i === startIdx) row.classList.add('highlight');
                
                row.innerHTML = `
                    <td>${state.steps.length - 1 - i}</td>
                    <td>${step.action}</td>
                    <td>${renderArray(step.input, step.highlightInput)}</td>
                    <td>${renderCount(step.count, step.highlightCount)}</td>
                    <td>${renderArray(step.output, step.highlightOutput)}</td>
                `;
                
                tbody.appendChild(row);
            }
        }

        function renderArray(arr, highlightIdx) {
            if (!arr.length) return '';
            return `
                <div class="array-display">
                    ${arr.map((num, i) => `
                        <div class="array-item ${i === highlightIdx ? 'highlight' : ''}">${num}</div>
                    `).join('')}
                </div>
            `;
        }

        function renderCount(count, highlightIdx) {
            let html = '<div class="array-display">';
            for (let i = config.min; i <= config.max; i++) {
                html += `
                    <div class="array-item ${i === highlightIdx ? 'highlight' : ''}">
                        ${i}:${count[i]}
                    </div>
                `;
            }
            html += '</div>';
            return html;
        }

        function updateExplanation(text) {
            document.getElementById('explanation').textContent = text;
        }

        function nextStep() {
            if (state.step < state.steps.length - 1) {
                state.step++;
                renderTable();
                updateExplanation(state.steps[state.steps.length - 1 - state.step].explanation);
                updateButtons();
            }
            
            if (state.step === state.steps.length - 1 && state.auto) {
                toggleAuto();
            }
        }

        function prevStep() {
            if (state.step > 0) {
                state.step--;
                renderTable();
                updateExplanation(state.steps[state.steps.length - 1 - state.step].explanation);
                updateButtons();
            }
        }

        function toggleAuto() {
            state.auto = !state.auto;
            const autoBtn = document.getElementById('auto');
            
            if (state.auto) {
                autoBtn.textContent = 'Stop';
                autoBtn.style.background = '#dc3545';
                state.intervalId = setInterval(() => {
                    if (state.step < state.steps.length - 1) {
                        nextStep();
                    } else {
                        toggleAuto();
                    }
                }, 800);
            } else {
                autoBtn.textContent = 'Auto';
                autoBtn.style.background = '#fd7e14';
                clearInterval(state.intervalId);
            }
            
            updateButtons();
        }

        function updateButtons() {
            document.getElementById('prev').disabled = state.step === 0;
            document.getElementById('step').disabled = state.step === state.steps.length - 1 || state.auto;
        }

        document.addEventListener('DOMContentLoaded', init);
    </script>
</body>
</html>