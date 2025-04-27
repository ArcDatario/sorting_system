
<?php
// No PHP logic needed; this is a pure HTML/JS/CSS visualization.
?>
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
    #tree-visualization {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #ecf0f1;
        border-radius: 8px;
        margin-bottom: 20px;
        min-height: 300px;
        position: relative;
    }
    #tree-diagram {
        position: relative;
        width: 100%;
        min-height: 350px;
        height: 400px;
        background: #ecf0f1;
        border-radius: 8px;
        overflow: visible;
    }
    .tree-node-abs {
        position: absolute;
        width: 50px;
        height: 50px;
        background-color: #3498db;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-size: 16px;
        transition: all 0.3s;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(44,62,80,0.08);
    }
    .tree-node-abs.highlight { background-color: #e74c3c; transform: scale(1.1); box-shadow: 0 0 10px rgba(231, 76, 60, 0.7);}
    .tree-node-abs.processed { background-color: #2ecc71; }
    .tree-node-abs.sorted { background-color: #9b59b6; }
    .tree-svg-connector {
        position: absolute;
        left: 0; top: 0;
        width: 100%; height: 100%;
        pointer-events: none;
        z-index: 1;
    }
    #tree-steps-container {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border-left: 4px solid #3498db;
        max-height: 200px;
        overflow-y: auto;
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
    .tree-color-circle {
        width: 16px;
        height: 16px;
        border-radius: 50%;
    }
    .tree-current-step {
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
    .sorted-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }
    .sorted-item {
        width: 40px;
        height: 40px;
        background-color: #9b59b6;
        border-radius: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
    }
</style>

<main class="main-content tree-sort" id="tree-sort" style="display:none;">
    <h1>Tree Sort Visualization</h1>
    <div id="tree-visualization">
        <div id="tree-diagram"></div>
        <div class="sorted-container" id="sorted-output"></div>
    </div>
    <div id="tree-array-container"></div>
    <div class="tree-current-step"></div>
    <div class="tree-controls">
        <button id="tree-sort-btn" class="tree-btn">Start Tree Sort</button>
        <button id="tree-prev-btn" class="tree-btn">Previous Step</button>
        <button id="tree-next-btn" class="tree-btn">Next Step</button>
    </div>
    <div id="tree-steps-container"></div>
    <div class="tree-legend">
        <div class="tree-legend-item">
            <div class="tree-color-circle" style="background-color: #e74c3c;"></div>
            <span>Current Node</span>
        </div>
        <div class="tree-legend-item">
            <div class="tree-color-circle" style="background-color: #2ecc71;"></div>
            <span>Processed Node</span>
        </div>
        <div class="tree-legend-item">
            <div class="tree-color-circle" style="background-color: #9b59b6;"></div>
            <span>Sorted Value</span>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // DOM elements
    const treeArrayContainer = document.getElementById('tree-array-container');
    const treeDiagram = document.getElementById('tree-diagram');
    const sortedOutput = document.getElementById('sorted-output');
    const treeStepsContainer = document.getElementById('tree-steps-container');
    const treeCurrentStepDiv = document.querySelector('.tree-current-step');
    const treeSortBtn = document.getElementById('tree-sort-btn');
    const treePrevBtn = document.getElementById('tree-prev-btn');
    const treeNextBtn = document.getElementById('tree-next-btn');

    // Fixed, balanced array for clean BST visualization
    // This array will produce a perfectly balanced BST:
    //         40
    //       /    \
    //     20      60
    //    / \     / \
    //  10  30  50  70
    let treeArray = [40, 20, 60, 10, 30, 50, 70];

    let treeStepSnapshots = [];
    let treeStepIndex = 0;
    let isTreeSorting = false;
    let treeAutoSortTimeout = null;
    let treeAnimationSpeed = 600;

    // Initialize
    precomputeTreeSortSteps();
    treeStepIndex = 0;
    renderTreeStepSnapshot(treeStepIndex);

    // Event listeners
    treeSortBtn.addEventListener('click', startTreeAutoSort);
    treePrevBtn.addEventListener('click', function() {
        stopTreeAutoSort();
        if (treeStepIndex > 0) {
            treeStepIndex--;
            renderTreeStepSnapshot(treeStepIndex);
        }
    });
    treeNextBtn.addEventListener('click', function() {
        stopTreeAutoSort();
        if (treeStepIndex < treeStepSnapshots.length - 1) {
            treeStepIndex++;
            renderTreeStepSnapshot(treeStepIndex);
        }
    });

    function renderTreeArray(arr = treeArray, highlightedIndex = -1) {
        treeArrayContainer.innerHTML = '';
        arr.forEach((value, index) => {
            const card = document.createElement('div');
            card.className = 'tree-node-abs';
            if (index === highlightedIndex) {
                card.classList.add('highlight');
            }
            card.textContent = value;
            card.style.position = 'static';
            card.style.margin = '0 8px';
            treeArrayContainer.appendChild(card);
        });
    }

    // --- Render tree nodes horizontally in sorted (in-order) order ---
    function renderTree(treeData) {
        treeDiagram.innerHTML = '';
        if (!treeData || !treeData.root) return;

        // 1. Get in-order traversal of nodes (sorted order)
        let inOrderNodes = [];
        function inOrder(node, depth = 0, parent = null) {
            if (!node) return;
            inOrder(node.left, depth + 1, node);
            inOrderNodes.push({ node, depth, parent });
            inOrder(node.right, depth + 1, node);
        }
        inOrder(treeData.root);

        // 2. Assign x/y positions: x by in-order index, y by depth
        const nodeSize = 50;
        const hSpacing = 80;
        const vSpacing = 90;
        let diagramWidth = treeDiagram.offsetWidth || 600;
        let totalNodes = inOrderNodes.length;
        let leftMargin = (diagramWidth - (totalNodes * hSpacing)) / 2;
        if (leftMargin < 0) leftMargin = 10;

        // Map node references to their positions for connector drawing
        let nodePosMap = new Map();
        inOrderNodes.forEach((entry, idx) => {
            let x = leftMargin + idx * hSpacing;
            let y = entry.depth * vSpacing + 30;
            entry.node._x = x;
            entry.node._y = y;
            nodePosMap.set(entry.node, { x, y });
        });

        // 3. Draw SVG connectors (parent to child)
        let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        svg.classList.add('tree-svg-connector');
        svg.setAttribute('width', diagramWidth);
        svg.setAttribute('height', (Math.max(...inOrderNodes.map(e => e.depth)) + 2) * vSpacing);
        svg.style.position = 'absolute';
        svg.style.left = '0';
        svg.style.top = '0';

        inOrderNodes.forEach(entry => {
            let { node, parent } = entry;
            if (parent) {
                let from = nodePosMap.get(parent);
                let to = nodePosMap.get(node);
                if (from && to) {
                    let line = document.createElementNS("http://www.w3.org/2000/svg", "line");
                    line.setAttribute('x1', from.x + nodeSize/2);
                    line.setAttribute('y1', from.y + nodeSize);
                    line.setAttribute('x2', to.x + nodeSize/2);
                    line.setAttribute('y2', to.y);
                    line.setAttribute('stroke', '#95a5a6');
                    line.setAttribute('stroke-width', '3');
                    svg.appendChild(line);
                }
            }
        });
        treeDiagram.appendChild(svg);

        // 4. Render nodes absolutely
        inOrderNodes.forEach(entry => {
            let node = entry.node;
            let div = document.createElement('div');
            div.className = 'tree-node-abs';
            if (node.status === 'current') div.classList.add('highlight');
            if (node.status === 'processed') div.classList.add('processed');
            if (node.status === 'sorted') div.classList.add('sorted');
            div.textContent = node.value;
            div.style.left = (node._x) + 'px';
            div.style.top = (node._y) + 'px';
            treeDiagram.appendChild(div);
        });
    }

    function renderSortedOutput(sortedValues = []) {
        sortedOutput.innerHTML = '';
        sortedValues.forEach(value => {
            const item = document.createElement('div');
            item.className = 'sorted-item';
            item.textContent = value;
            sortedOutput.appendChild(item);
        });
    }

    function addTreeStepSnapshot(arr, treeData, highlightedIndex, sortedValues, description) {
        treeStepSnapshots.push({
            arr: [...arr],
            treeData: JSON.parse(JSON.stringify(treeData)),
            highlightedIndex: highlightedIndex,
            sortedValues: [...sortedValues],
            description: description
        });
    }

    // Helper: Deep clone tree and mark sorted nodes by value
    function cloneTreeAndMarkSorted(tree, sortedValues) {
        function clone(node) {
            if (!node) return null;
            let newNode = {
                value: node.value,
                left: clone(node.left),
                right: clone(node.right),
                status: node.status || ''
            };
            if (sortedValues.includes(node.value)) {
                newNode.status = 'sorted';
            }
            return newNode;
        }
        return { root: clone(tree.root) };
    }

    function renderTreeStepSnapshot(idx) {
        const snap = treeStepSnapshots[idx];
        if (!snap) return;

        // For in-order traversal steps, mark sorted nodes
        let treeDataToRender = snap.treeData;
        if (snap.sortedValues && snap.sortedValues.length > 0) {
            treeDataToRender = cloneTreeAndMarkSorted(snap.treeData, snap.sortedValues);
        }

        renderTreeArray(snap.arr, snap.highlightedIndex);
        renderTree(treeDataToRender);
        renderSortedOutput(snap.sortedValues);

        // Update steps container
        treeStepsContainer.innerHTML = '';
        for (let i = 0; i <= idx; i++) {
            const s = treeStepSnapshots[i];
            const stepDiv = document.createElement('div');
            stepDiv.className = 'tree-step';
            if (i < idx) stepDiv.classList.add('completed');
            if (i === idx) stepDiv.classList.add('active');
            stepDiv.textContent = s.description;
            treeStepsContainer.appendChild(stepDiv);
        }
        treeStepsContainer.scrollTop = treeStepsContainer.scrollHeight;

        // Update current step display
        treeCurrentStepDiv.textContent = snap.description || '';

        // Update button states
        treePrevBtn.disabled = idx === 0;
        treeNextBtn.disabled = treeStepSnapshots.length === 0 || idx === treeStepSnapshots.length - 1;
    }

    function precomputeTreeSortSteps() {
        treeStepSnapshots = [];
        const arr = [...treeArray];

        // Initial steps
        addTreeStepSnapshot([...arr], {root: null}, -1, [], "Starting Tree Sort Algorithm");
        addTreeStepSnapshot([...arr], {root: null}, -1, [], "Building Binary Search Tree from the array");

        // Tree construction phase
        let tree = {root: null};

        for (let i = 0; i < arr.length; i++) {
            const value = arr[i];

            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [], `Processing element ${value} at index ${i}`);

            if (!tree.root) {
                tree.root = {value: value, left: null, right: null, status: 'current'};
                addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [], `Created root node with value ${value}`);
                tree.root.status = '';
            } else {
                let current = tree.root;
                current.status = 'current';
                addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [], `Starting at root node (${current.value})`);

                while (true) {
                    if (value < current.value) {
                        current.status = 'processed';
                        if (!current.left) {
                            current.left = {value: value, left: null, right: null, status: 'current'};
                            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [],
                                `${value} < ${current.value} - inserted as left child`);
                            current.left.status = '';
                            break;
                        } else {
                            current = current.left;
                            current.status = 'current';
                            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [],
                                `${value} < ${current.value} - moving to left child`);
                        }
                    } else {
                        current.status = 'processed';
                        if (!current.right) {
                            current.right = {value: value, left: null, right: null, status: 'current'};
                            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [],
                                `${value} >= ${current.value} - inserted as right child`);
                            current.right.status = '';
                            break;
                        } else {
                            current = current.right;
                            current.status = 'current';
                            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), i, [],
                                `${value} >= ${current.value} - moving to right child`);
                        }
                    }
                }
            }
        }

        addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, [], "Binary Search Tree construction complete");
        addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, [], "Beginning in-order traversal to produce sorted array");

        // In-order traversal phase
        let sortedValues = [];
        let stack = [];
        let current = tree.root;
        if (current) current.status = 'current';
        addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
            "Starting in-order traversal (Left-Root-Right)");

        // We'll use a map to track which nodes have been sorted by their value and occurrence index
        let valueCount = {};

        while (current || stack.length > 0) {
            // Reach the leftmost node
            while (current) {
                current.status = 'current';
                addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
                    `Moving to leftmost node (${current.value})`);
                current.status = 'processed';
                stack.push(current);
                current = current.left;
                if (current) {
                    current.status = 'current';
                    addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
                        "Moving to left child");
                }
            }

            current = stack.pop();
            current.status = 'current';
            addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
                `Processing node ${current.value} (visiting root after left subtree)`);

            sortedValues.push(current.value);

            // Mark sorted nodes for this snapshot
            let treeClone = JSON.parse(JSON.stringify(tree));
            valueCount = {};
            (function mark(node) {
                if (!node) return;
                let val = node.value;
                valueCount[val] = (valueCount[val] || 0) + 1;
                let sortedCount = sortedValues.filter(v => v === val).length;
                if (sortedCount >= valueCount[val]) node.status = 'sorted';
                mark(node.left);
                mark(node.right);
            })(treeClone.root);

            addTreeStepSnapshot([...arr], treeClone, -1, [...sortedValues],
                `Added ${current.value} to sorted array: [${sortedValues.join(', ')}]`);

            current = current.right;
            if (current) {
                current.status = 'current';
                addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
                    "Moving to right child");
            }
        }

        addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues, "In-order traversal complete");
        addTreeStepSnapshot([...arr], JSON.parse(JSON.stringify(tree)), -1, sortedValues,
            `Final sorted array: [${sortedValues.join(', ')}]`);
    }

    function startTreeAutoSort() {
        if (isTreeSorting) return;
        isTreeSorting = true;
        treeSortBtn.disabled = true;

        function playStep() {
            if (treeStepIndex < treeStepSnapshots.length - 1) {
                treeStepIndex++;
                renderTreeStepSnapshot(treeStepIndex);
                treeAutoSortTimeout = setTimeout(playStep, treeAnimationSpeed);
            } else {
                isTreeSorting = false;
                treeSortBtn.disabled = false;
            }
        }
        playStep();
    }
    function stopTreeAutoSort() {
        if (treeAutoSortTimeout) {
            clearTimeout(treeAutoSortTimeout);
            treeAutoSortTimeout = null;
        }
        isTreeSorting = false;
        treeSortBtn.disabled = false;
    }
    // Show the visualization (remove this if you control visibility elsewhere)
    document.getElementById('tree-sort').style.display = '';
});
</script>
