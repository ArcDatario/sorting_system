<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Sort Visualization</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .tree-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

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
            height: 200px;
            align-items: flex-end;
            justify-content: center;
            gap: 2px;
            padding: 10px;
            background-color: #ecf0f1;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .tree-bar {
            height: 80%;
            width: 40px;
            background-color: #3498db;
            transition: height 0.3s, background-color 0.3s;
            border-radius: 3px 3px 0 0;
            position: relative;
        }

        .tree-bar.comparing {
            background-color: #e74c3c;
        }

        .tree-bar.inserted {
            background-color: #2ecc71;
        }

        .tree-bar.current {
            background-color: #9b59b6;
        }

        .tree-bar-label {
            position: absolute;
            top: -25px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }

        #tree-steps-container {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border-left: 4px solid #3498db;
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
            border-radius: 3px;
        }

        .tree-color-box.comparing {
            background-color: #e74c3c;
        }

        .tree-color-box.inserted {
            background-color: #2ecc71;
        }

        .tree-color-box.current {
            background-color: #9b59b6;
        }

        /* Tree visualization */
        #tree-visualization {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
            min-height: 300px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            position: relative;
            overflow: visible;
        }

        .tree-level {
            display: flex;
            justify-content: center;
            width: 100%;
            position: relative;
            min-height: 100px;
        }

        .tree-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 20px;
            position: relative;
            z-index: 2;
        }

        .tree-value {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.3s;
            position: relative;
        }

        .tree-value.comparing {
            background-color: #e74c3c;
        }

        .tree-value.inserted {
            background-color: #2ecc71;
        }

        .tree-value.current {
            background-color: #9b59b6;
        }

        .tree-connector {
            position: absolute;
            background-color: #95a5a6;
            z-index: 1;
        }

        .tree-horizontal-connector {
            height: 2px;
            width: 40px;
            top: 20px;
        }

        .tree-vertical-connector {
            width: 2px;
            height: 50px;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
        }

        .tree-children {
            display: flex;
            position: relative;
            margin-top: 50px;
        }

        .tree-left-child {
            position: relative;
            margin-right: 40px;
        }

        .tree-right-child {
            position: relative;
            margin-left: 40px;
        }
    </style>

</head>
<body>
    <div class="tree-container">
        <h1>Tree Sort Visualization</h1>
        <div class="tree-controls">
            <button id="tree-generate-btn">Generate New Array</button>
            <button id="tree-sort-btn">Tree Sort</button>
            <div class="tree-slider-container">
                <label for="tree-size-slider">Array Size:</label>
                <input type="range" id="tree-size-slider" min="5" max="15" value="8">
                <span id="tree-size-value">8</span>
            </div>
            <div class="tree-slider-container">
                <label for="tree-speed-slider">Speed:</label>
                <input type="range" id="tree-speed-slider" min="1" max="10" value="1">
                <span id="tree-speed-value">1</span>
            </div>
        </div>
        <div id="tree-visualization">
            <!-- Tree will be rendered here dynamically -->
        </div>
        <div id="tree-array-container"></div>
        <div id="tree-steps-container"></div>
        <div class="tree-legend">
            <div class="tree-legend-item">
                <div class="tree-color-box comparing"></div>
                <span>Comparing</span>
            </div>
            <div class="tree-legend-item">
                <div class="tree-color-box inserted"></div>
                <span>Inserted</span>
            </div>
            <div class="tree-legend-item">
                <div class="tree-color-box current"></div>
                <span>Current Element</span>
            </div>
        </div>
    </div>
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const treeArrayContainer = document.getElementById('tree-array-container');
            const treeVisualization = document.getElementById('tree-visualization');
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
            let treeRoot = null;

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
                    treeArray.push(Math.floor(Math.random() * 90) + 10); // Values between 10-100
                }
                
                renderTreeArray();
                treeVisualization.innerHTML = '';
                treeStepsContainer.innerHTML = '';
                treeSteps = [];
                currentTreeStep = 0;
                treeRoot = null;
            }

            function renderTreeArray() {
                treeArrayContainer.innerHTML = '';
                const maxValue = Math.max(...treeArray, 1);
                
                treeArray.forEach((value, index) => {
                    const bar = document.createElement('div');
                    bar.className = 'tree-bar';
                    bar.style.height = `${(value / maxValue) * 80}%`;
                    
                    const label = document.createElement('div');
                    label.className = 'tree-bar-label';
                    label.textContent = value;
                    
                    bar.appendChild(label);
                    bar.setAttribute('data-index', index);
                    treeArrayContainer.appendChild(bar);
                });
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

            // Binary Search Tree Node
            class TreeNode {
                constructor(value) {
                    this.value = value;
                    this.left = null;
                    this.right = null;
                    this.parent = null;
                    this.level = 0;
                    this.position = 0;
                    this.element = null;
                }
            }

            // Function to render the BST
            function renderTree(root) {
                treeVisualization.innerHTML = '';
                if (!root) return;

                // Calculate node positions
                calculatePositions(root);

                // Create level containers
                const maxLevel = getMaxLevel(root);
                for (let level = 0; level <= maxLevel; level++) {
                    const levelContainer = document.createElement('div');
                    levelContainer.className = 'tree-level';
                    levelContainer.style.minHeight = level === 0 ? '50px' : '100px';
                    treeVisualization.appendChild(levelContainer);
                }

                // Render nodes
                renderTreeNode(root);
            }

            function calculatePositions(node, index = 0, level = 0, parentPos = 0) {
                if (!node) return index;
                
                node.level = level;
                
                // Calculate positions for left subtree
                index = calculatePositions(node.left, index, level + 1, index);
                
                // Set current node position
                node.position = index;
                index++;
                
                // Calculate positions for right subtree
                index = calculatePositions(node.right, index, level + 1, index);
                
                return index;
            }

            function getMaxLevel(node) {
                if (!node) return -1;
                return Math.max(node.level, getMaxLevel(node.left), getMaxLevel(node.right));
            }

            function renderTreeNode(node) {
                if (!node) return;

                const levelContainer = treeVisualization.children[node.level];
                
                const nodeElement = document.createElement('div');
                nodeElement.className = 'tree-node';
                node.element = nodeElement;

                const valueElement = document.createElement('div');
                valueElement.className = 'tree-value';
                valueElement.textContent = node.value;
                node.valueElement = valueElement;

                nodeElement.appendChild(valueElement);
                levelContainer.appendChild(nodeElement);

                // Position the node
                const levelNodes = levelContainer.querySelectorAll('.tree-node');
                const nodeIndex = Array.from(levelNodes).indexOf(nodeElement);
                nodeElement.style.order = node.position;

                // Add connectors if not root
                if (node.level > 0) {
                    // Vertical connector
                    const verticalConnector = document.createElement('div');
                    verticalConnector.className = 'tree-connector tree-vertical-connector';
                    nodeElement.appendChild(verticalConnector);

                    // Horizontal connector
                    const horizontalConnector = document.createElement('div');
                    horizontalConnector.className = 'tree-connector tree-horizontal-connector';
                    
                    if (node === node.parent.left) {
                        horizontalConnector.style.right = '20px';
                    } else {
                        horizontalConnector.style.left = '20px';
                    }
                    
                    nodeElement.appendChild(horizontalConnector);
                }

                // Render children
                if (node.left || node.right) {
                    const childrenContainer = document.createElement('div');
                    childrenContainer.className = 'tree-children';
                    nodeElement.appendChild(childrenContainer);

                    if (node.left) {
                        node.left.parent = node;
                        const leftChild = renderTreeNode(node.left);
                    }
                    
                    if (node.right) {
                        node.right.parent = node;
                        const rightChild = renderTreeNode(node.right);
                    }
                }
            }

            // Function to update tree visualization
            function updateTreeVisualization(node, action = null) {
                if (!node || !node.valueElement) return;

                // Reset all node colors first
                document.querySelectorAll('.tree-value').forEach(el => {
                    el.className = 'tree-value';
                });

                // Apply appropriate color based on action
                switch (action) {
                    case 'comparing':
                        node.valueElement.classList.add('comparing');
                        break;
                    case 'inserted':
                        node.valueElement.classList.add('inserted');
                        break;
                    case 'current':
                        node.valueElement.classList.add('current');
                        break;
                }
            }

            async function startTreeSort() {
                if (isTreeSorting) return;
                
                isTreeSorting = true;
                treeGenerateBtn.disabled = true;
                treeSortBtn.disabled = true;
                treeStepsContainer.innerHTML = '';
                treeSteps = [];
                currentTreeStep = 0;
                treeVisualization.innerHTML = '';
                treeRoot = null;
                
                // Initial steps
                addTreeStep("Starting Tree Sort Algorithm", true);
                addTreeStep("Building Binary Search Tree from array elements");
                addTreeStep("Performing in-order traversal to get sorted array");
                
                // Create a copy of the array to sort
                const sortingArray = [...treeArray];
                
                // Perform tree sort with visualization
                await treeSort(sortingArray);
                
                addTreeStep("Tree Sort completed! Array is now sorted", false);
                updateTreeSteps(treeSteps.length);
                
                isTreeSorting = false;
                treeGenerateBtn.disabled = false;
                treeSortBtn.disabled = false;
            }

            async function treeSort(arr) {
                // Build BST
                addTreeStep("Starting to build Binary Search Tree", true);
                updateTreeSteps(1);
                
                for (let i = 0; i < arr.length; i++) {
                    addTreeStep(`Inserting element ${arr[i]} into BST`, true);
                    updateTreeSteps(1);
                    
                    // Highlight current element in array
                    await updateArrayVisualization(arr, i, 'current');
                    
                    // Insert into BST
                    treeRoot = await insertIntoBST(treeRoot, arr[i]);
                    
                    // Re-render tree after insertion
                    renderTree(treeRoot);
                    
                    // Highlight inserted node
                    const insertedNode = findNode(treeRoot, arr[i]);
                    if (insertedNode) {
                        updateTreeVisualization(insertedNode, 'inserted');
                    }
                    
                    await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                }
                
                addTreeStep("BST construction complete. Starting in-order traversal", true);
                updateTreeSteps(2);
                
                // Perform in-order traversal to get sorted array
                const sortedArray = [];
                await inOrderTraversal(treeRoot, sortedArray);
                
                // Update original array with sorted values
                for (let i = 0; i < arr.length; i++) {
                    arr[i] = sortedArray[i];
                    await updateArrayVisualization(arr, -1);
                    await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed / 2));
                }
                
                addTreeStep("In-order traversal complete. Array is now sorted", true);
                updateTreeSteps(3);
            }

            async function insertIntoBST(root, value) {
                if (!root) {
                    addTreeStep(`Creating new node with value ${value}`, true);
                    updateTreeSteps(1);
                    return new TreeNode(value);
                }
                
                // Highlight current node being compared
                updateTreeVisualization(root, 'comparing');
                addTreeStep(`Comparing ${value} with node value ${root.value}`, true);
                updateTreeSteps(1);
                await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                
                if (value < root.value) {
                    addTreeStep(`${value} < ${root.value}, moving to left subtree`, true);
                    updateTreeSteps(1);
                    root.left = await insertIntoBST(root.left, value);
                    if (root.left) root.left.parent = root;
                } else {
                    addTreeStep(`${value} >= ${root.value}, moving to right subtree`, true);
                    updateTreeSteps(1);
                    root.right = await insertIntoBST(root.right, value);
                    if (root.right) root.right.parent = root;
                }
                
                return root;
            }

            async function inOrderTraversal(node, result) {
                if (!node) return;
                
                // Traverse left subtree
                if (node.left) {
                    addTreeStep(`Moving to left child of ${node.value}`, true);
                    updateTreeSteps(2);
                    updateTreeVisualization(node, 'comparing');
                    await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                    await inOrderTraversal(node.left, result);
                }
                
                // Process current node
                addTreeStep(`Visiting node ${node.value} (adding to sorted array)`, true);
                updateTreeSteps(2);
                updateTreeVisualization(node, 'inserted');
                result.push(node.value);
                await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                
                // Traverse right subtree
                if (node.right) {
                    addTreeStep(`Moving to right child of ${node.value}`, true);
                    updateTreeSteps(2);
                    updateTreeVisualization(node, 'comparing');
                    await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed));
                    await inOrderTraversal(node.right, result);
                }
            }

            function findNode(root, value) {
                if (!root) return null;
                if (root.value === value) return root;
                if (value < root.value) return findNode(root.left, value);
                return findNode(root.right, value);
            }

            async function updateArrayVisualization(arr, currentIndex = -1, action = null) {
                // Update array visualization
                const bars = document.querySelectorAll('.tree-bar');
                const maxValue = Math.max(...arr, 1);
                
                arr.forEach((value, index) => {
                    const bar = bars[index];
                    bar.style.height = `${(value / maxValue) * 80}%`;
                    bar.querySelector('.tree-bar-label').textContent = value;
                    
                    // Reset classes
                    bar.className = 'tree-bar';
                    
                    // Add appropriate classes
                    if (index === currentIndex) {
                        bar.classList.add(action || 'current');
                    }
                });
                
                // Add delay for animation
                await new Promise(resolve => setTimeout(resolve, treeAnimationSpeed / 2));
            }
        });
    </script>
</body>
</html>