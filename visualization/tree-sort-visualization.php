<style>
    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .tree-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        align-items: center;
        justify-content: center;
    }

    .tree-btn {
        padding: 8px 16px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .tree-btn:hover {
        background-color: #2980b9;
    }

    .tree-btn:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }

    .tree-slider-container {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    #tree-array-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 15px;
        padding: 20px;
        background-color: #ecf0f1;
        border-radius: 8px;
        margin-bottom: 20px;
        min-height: 100px;
    }

    .tree-node {
        width: 50px;
        height: 50px;
        background-color: #3498db;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
        margin: 10px;
    }

    .tree-node.current {
        background-color: #e74c3c;
        transform: scale(1.1);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    .tree-node.visited {
        background-color: #2ecc71;
    }

    .tree-node.sorted {
        background-color: #2ecc71;
    }

    .tree-node.highlight {
        background-color: #9b59b6;
    }

    .tree-node-index {
        position: absolute;
        top: -20px;
        font-size: 12px;
        color: #2c3e50;
    }

    #tree-visualization {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    #tree-canvas {
        background-color: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    #tree-steps-container {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #4ec9b0 #f8f9fa;
    }

    #tree-steps-container::-webkit-scrollbar {
        width: 8px;
    }

    #tree-steps-container::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 10px;
    }

    #tree-steps-container::-webkit-scrollbar-thumb {
        background-color: #4ec9b0;
        border-radius: 10px;
        border: 2px solid transparent;
    }

    #tree-steps-container::-webkit-scrollbar-thumb:hover {
        background-color: #3ab8a0;
    }

    .tree-step {
        margin-bottom: 8px;
        font-size: 14px;
        line-height: 1.4;
    }

    .tree-step.active {
        font-weight: bold;
        color: #2c3e50;
    }

    .tree-step.completed {
        color: #27ae60;
    }

    .tree-legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .tree-legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
    }

    .tree-color-box {
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }

    .tree-color-box.current {
        background-color: #e74c3c;
    }

    .tree-color-box.visited {
        background-color: #2ecc71;
    }

    .tree-color-box.highlight {
        background-color: #9b59b6;
    }

    .tree-connection {
        stroke: #3498db;
        stroke-width: 2;
    }

    .tree-connection.highlight {
        stroke: #9b59b6;
        stroke-width: 3;
    }

    body.dark-mode #tree-array-container {
        background-color: #333;
    }
    body.dark-mode #tree-steps-container {
        background-color: var(--background);
        color: white;
    }
    body.dark-mode .tree-node-index {
        color: #ecf0f1;
    }
    body.dark-mode #tree-canvas {
        background-color: #444;
    }
</style>

<main class="main-content tree-sort" id="tree-sort" style="display:block;">
    <h1>Tree Sort Visualization</h1>
    <div class="tree-controls">
        <button id="tree-generate-btn">Generate New Array</button>
        <button id="tree-sort-btn">Tree Sort</button>
        <div class="tree-slider-container">
            <label for="tree-size-slider">Array Size:</label>
            <input type="range" id="tree-size-slider" min="3" max="3" value="3">
            <span id="tree-size-value">3</span>
        </div>
        <div class="tree-slider-container">
            <label for="tree-speed-slider">Speed:</label>
            <input type="range" id="tree-speed-slider" min="1" max="10" value="2">
            <span id="tree-speed-value">3</span>
        </div>
    </div>
    <div id="tree-visualization">
        <div id="tree-array-container"></div>
        <svg id="tree-canvas" width="600" height="300"></svg>
        <div id="tree-steps-container"></div>
    </div>
    <div class="tree-legend">
        <div class="tree-legend-item">
            <div class="tree-color-box current"></div>
            <span>Current Node</span>
        </div>
        <div class="tree-legend-item">
            <div class="tree-color-box visited"></div>
            <span>Visited/Processed</span>
        </div>
        <div class="tree-legend-item">
            <div class="tree-color-box highlight"></div>
            <span>Highlighted Path</span>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM elements
        const treeArrayContainer = document.getElementById('tree-array-container');
        const treeCanvas = document.getElementById('tree-canvas');
        const treeStepsContainer = document.getElementById('tree-steps-container');
        const treeGenerateBtn = document.getElementById('tree-generate-btn');
        const treeSortBtn = document.getElementById('tree-sort-btn');
        const treeSizeSlider = document.getElementById('tree-size-slider');
        const treeSizeValue = document.getElementById('tree-size-value');
        const treeSpeedSlider = document.getElementById('tree-speed-slider');
        const treeSpeedValue = document.getElementById('tree-speed-value');

        // Variables
        let treeArray = [];
        let treeArraySize = parseInt(treeSizeSlider.value);
        let treeSortSpeed = parseInt(treeSpeedSlider.value);
        let isTreeSorting = false;
        let treeAnimationSpeed = 1000 / treeSortSpeed;
        let treeSteps = [];
        let currentTreeStep = 0;
        let sortedArray = [];

        // Initialize
        updateTreeSizeValue();
        updateTreeSpeedValue();
        generateNewTreeArray();

        // Event listeners
        treeGenerateBtn.addEventListener('click', generateNewTreeArray);
        treeSortBtn.addEventListener('click', startTreeSort);
        treeSizeSlider.addEventListener('input', updateTreeSizeValue);
        treeSpeedSlider.addEventListener('input', updateTreeSpeedValue);

        // Functions
        function updateTreeSizeValue() {
            treeArraySize = parseInt(treeSizeSlider.value);
            treeSizeValue.textContent = treeArraySize;
            generateNewTreeArray();
        }

        function updateTreeSpeedValue() {
            treeSortSpeed = parseInt(treeSpeedSlider.value);
            treeSpeedValue.textContent = treeSortSpeed;
            treeAnimationSpeed = 1000 / treeSortSpeed;
        }

        function generateNewTreeArray() {
            if (isTreeSorting) return;
            
            treeArray = [];
            for (let i = 0; i < treeArraySize; i++) {
                treeArray.push(Math.floor(Math.random() * 90) + 10); // 2-digit numbers (10-99)
            }
            
            renderTreeArray();
            clearTreeCanvas();
            treeStepsContainer.innerHTML = '';
            treeSteps = [];
            currentTreeStep = 0;
            sortedArray = [];
        }

        function renderTreeArray() {
            treeArrayContainer.innerHTML = '';
            
            treeArray.forEach((value, index) => {
                const node = document.createElement('div');
                node.className = 'tree-node';
                node.textContent = value;
                node.setAttribute('data-index', index);
                
                const indexLabel = document.createElement('div');
                indexLabel.className = 'tree-node-index';
                indexLabel.textContent = `[${index}]`;
                
                node.appendChild(indexLabel);
                treeArrayContainer.appendChild(node);
            });
        }

        function clearTreeCanvas() {
            treeCanvas.innerHTML = '';
        }

        function drawTreeNode(node, x, y, level, isHighlighted = false) {
            const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
            circle.setAttribute("cx", x);
            circle.setAttribute("cy", y);
            circle.setAttribute("r", 20);
            circle.setAttribute("fill", isHighlighted ? "#9b59b6" : "#3498db");
            circle.setAttribute("class", isHighlighted ? "tree-node highlight" : "tree-node");
            
            const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
            text.setAttribute("x", x);
            text.setAttribute("y", y + 5);
            text.setAttribute("text-anchor", "middle");
            text.setAttribute("fill", "white");
            text.setAttribute("font-weight", "bold");
            text.textContent = node.value;
            
            treeCanvas.appendChild(circle);
            treeCanvas.appendChild(text);
            
            return {x, y, element: circle};
        }

        function drawTreeConnection(x1, y1, x2, y2, isHighlighted = false) {
            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute("x1", x1);
            line.setAttribute("y1", y1 + 20);
            line.setAttribute("x2", x2);
            line.setAttribute("y2", y2 - 20);
            line.setAttribute("stroke", isHighlighted ? "#9b59b6" : "#3498db");
            line.setAttribute("stroke-width", isHighlighted ? 3 : 2);
            line.setAttribute("class", isHighlighted ? "tree-connection highlight" : "tree-connection");
            treeCanvas.appendChild(line);
        }

        function visualizeTree(root, x = 300, y = 50, level = 0, parentX = null, parentY = null, highlightPath = []) {
            if (!root) return;

            const isHighlighted = highlightPath.includes(root.value);
            
            // Draw connection to parent first (so it's behind the node)
            if (parentX !== null && parentY !== null) {
                drawTreeConnection(parentX, parentY, x, y, isHighlighted);
            }
            
            // Draw the node
            const nodePos = drawTreeNode(root, x, y, level, isHighlighted);
            
            // Calculate horizontal spacing based on level
            const horizontalSpacing = 200 / (level + 1);
            
            // Visualize left and right subtrees
            if (root.left) {
                visualizeTree(root.left, x - horizontalSpacing, y + 60, level + 1, x, y, highlightPath);
            }
            if (root.right) {
                visualizeTree(root.right, x + horizontalSpacing, y + 60, level + 1, x, y, highlightPath);
            }
        }

        function addTreeStep(description, isActive = false) {
            const step = document.createElement('div');
            step.className = `tree-step ${isActive ? 'active' : ''}`;
            step.textContent = description;
            treeStepsContainer.appendChild(step);
            treeSteps.push(step);
            
            // Auto-scroll to the latest step
            treeStepsContainer.scrollTop = treeStepsContainer.scrollHeight;
        }

        function updateTreeSteps(currentIndex) {
            treeSteps.forEach((step, index) => {
                step.className = 'tree-step';
                if (index < currentIndex) step.classList.add('completed');
                if (index === currentIndex) step.classList.add('active');
            });
        }

        async function startTreeSort() {
            if (isTreeSorting) return;
            
            isTreeSorting = true;
            treeGenerateBtn.disabled = true;
            treeSortBtn.disabled = true;
            treeStepsContainer.innerHTML = '';
            treeSteps = [];
            currentTreeStep = 0;
            sortedArray = [];
            
            // Initial steps
            addTreeStep("Starting Tree Sort Algorithm", true);
            addTreeStep("1. Build a Binary Search Tree from the array elements");
            addTreeStep("2. Perform in-order traversal of the BST to get sorted array");
            
            // Create a copy of the array to sort
            const sortingArray = [...treeArray];
            
            // Perform tree sort with visualization
            await treeSort(sortingArray);
            
            addTreeStep("Tree Sort completed! Sorted array: " + sortedArray.join(', '), false);
            updateTreeSteps(treeSteps.length);
            
            isTreeSorting = false;
            treeGenerateBtn.disabled = false;
            treeSortBtn.disabled = false;
        }

        // Binary Search Tree Node
        class TreeNode {
            constructor(value) {
                this.value = value;
                this.left = null;
                this.right = null;
            }
        }

        async function treeSort(arr) {
            addTreeStep("Building Binary Search Tree...", true);
            updateTreeSteps(1);
            
            // Build BST
            let root = null;
            let highlightPath = [];
            
            for (let i = 0; i < arr.length; i++) {
                const num = arr[i];
                highlightPath = [];
                
                // Highlight current array element being inserted
                const nodes = document.querySelectorAll('.tree-node');
                nodes[i].classList.add('current');
                
                addTreeStep(`Inserting element ${num} into BST`, true);
                updateTreeSteps(1);
                
                await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                
                // Insert into BST
                root = await insertIntoBST(root, num, highlightPath);
                
                // Visualize the BST with highlight path
                clearTreeCanvas();
                visualizeTree(root, 300, 50, 0, null, null, highlightPath);
                
                await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                
                // Remove highlight
                nodes[i].classList.remove('current');
            }
            
            addTreeStep("BST construction complete. Now performing in-order traversal...", true);
            updateTreeSteps(2);
            
            // Perform in-order traversal to get sorted array
            await inOrderTraversal(root);
            
            return sortedArray;
        }

        async function insertIntoBST(node, value, highlightPath) {
            if (!node) {
                highlightPath.push(value);
                addTreeStep(`Creating new node with value ${value}`, true);
                updateTreeSteps(1);
                return new TreeNode(value);
            }
            
            highlightPath.push(node.value);
            
            // Highlight current node being compared
            addTreeStep(`Comparing ${value} with node ${node.value}`, true);
            updateTreeSteps(1);
            
            await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
            
            if (value < node.value) {
                addTreeStep(`${value} < ${node.value} - moving to left subtree`, true);
                updateTreeSteps(1);
                node.left = await insertIntoBST(node.left, value, highlightPath);
            } else {
                addTreeStep(`${value} >= ${node.value} - moving to right subtree`, true);
                updateTreeSteps(1);
                node.right = await insertIntoBST(node.right, value, highlightPath);
            }
            
            return node;
        }

        async function inOrderTraversal(node) {
            if (!node) return;
            
            // Highlight current node
            addTreeStep(`Visiting node ${node.value} (in-order traversal)`, true);
            updateTreeSteps(2);
            
            // Visualize the node being visited
            clearTreeCanvas();
            visualizeTree(node, 300, 50, 0, null, null, [node.value]);
            
            await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
            
            // Traverse left subtree
            await inOrderTraversal(node.left);
            
            // Process current node (add to sorted array)
            sortedArray.push(node.value);
            addTreeStep(`Adding ${node.value} to sorted array: [${sortedArray.join(', ')}]`, true);
            updateTreeSteps(2);
            
            // Update array visualization
            updateSortedArrayVisualization(sortedArray);
            
            await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
            
            // Traverse right subtree
            await inOrderTraversal(node.right);
        }

        function updateSortedArrayVisualization(sortedArr) {
            const nodes = document.querySelectorAll('.tree-node');
            
            sortedArr.forEach((value, index) => {
                const originalIndex = treeArray.indexOf(value);
                if (originalIndex !== -1) {
                    const node = nodes[originalIndex];
                    node.textContent = value;
                    node.innerHTML = value + `<div class="tree-node-index">[${index}]</div>`;
                    node.classList.add('sorted');
                }
            });
        }
    });
</script>