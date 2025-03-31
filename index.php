<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/sort-icon.png" type="image/png">
    <title>Bubble Sort Algorithm | SortArtOnline</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">
            Sort<span>Art</span>Online
        </div>
        <button class="mobile-menu-btn" id="mobileMenuBtn">☰</button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#">Home</a></li>
            <li><a href="#">Learn</a></li>
            <li><a href="#">Quiz</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Offline</a></li>
        </ul>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Main Content -->
        <main class="main-content">
            <div class="article-header">
                <h1>Bubble Sort Algorithm</h1>
                <div class="breadcrumb">
                    <a href="#">Home</a>
                    <span>/</span>
                    <a href="#">Learn</a>
                    <span>/</span>
                    <a href="#">Sorting Algorithms</a>
                    <span>/</span>
                    <span>Bubble Sort</span>
                </div>
            </div>

            <div class="article-content">
                <p>Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in the wrong order. This algorithm is not suitable for large data sets as its average and worst-case time complexity is quite high.</p>

                <h2>How Bubble Sort Works?</h2>
                <p>Consider an array <code>arr[] = {5, 1, 4, 2, 8}</code></p>

                <h3>First Pass:</h3>
                <ul>
                    <li><strong>( 5 1 4 2 8 ) → ( 1 5 4 2 8 )</strong>, Here, algorithm compares the first two elements, and swaps since 5 > 1.</li>
                    <li><strong>( 1 5 4 2 8 ) → ( 1 4 5 2 8 )</strong>, Swap since 5 > 4</li>
                    <li><strong>( 1 4 5 2 8 ) → ( 1 4 2 5 8 )</strong>, Swap since 5 > 2</li>
                    <li><strong>( 1 4 2 5 8 ) → ( 1 4 2 5 8 )</strong>, Now, since these elements are already in order (8 > 5), algorithm does not swap them.</li>
                </ul>

                <h3>Second Pass:</h3>
                <ul>
                    <li><strong>( 1 4 2 5 8 ) → ( 1 4 2 5 8 )</strong></li>
                    <li><strong>( 1 4 2 5 8 ) → ( 1 2 4 5 8 )</strong>, Swap since 4 > 2</li>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                </ul>

                <p>Now, the array is already sorted, but our algorithm does not know if it is completed. The algorithm needs one whole pass without any swap to know it is sorted.</p>

                <h3>Third Pass:</h3>
                <ul>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                    <li><strong>( 1 2 4 5 8 ) → ( 1 2 4 5 8 )</strong></li>
                </ul>

                <div class="important-note">
                    <strong>Note:</strong> Bubble sort is not a practical sorting algorithm when n is large. It will not be efficient in the case of a reverse-ordered collection.
                </div>

               
                <!-- code implementaion start -->

                <?php include "includes/bubblesort-ci.php"; ?>


                <!-- code implementation end -->

               

        <?php include "visualization/bubble-sort-visualization.php";?>

        </main>

        <!-- Sidebar -->
        <?php include "includes/aside.php";?>
    </div>

    <!-- Footer -->
   
   

    <!-- Dark Mode Toggle -->
    <button class="dark-mode-toggle" id="darkModeToggle">🌓</button>

    <script src="assets/js/script.js"></script>
       
    <script>
        // Configuration - Adjust these as needed
        const CONFIG = {
            barWidth: 30,       // Default pixel width for each bar
            barGap: 6,          // Fixed gap between bars
            maxBars: 50,        // Maximum number of bars
            minValue: 10,       // Minimum bar height value
            maxValue: 100,      // Maximum bar height value
            heightScale: 2.2    // Vertical scaling factor
        };

        // Vibrant color palette
        const COLORS = {
            default: '#3a86ff',
            compare: '#ff006e',
            min: '#8338ec',
            sorted: '#06d6a0',
            swap: '#ffbe0b'
        };

        // State management
        let state = {
            array: [],
            sorting: false,
            speed: 800,
            maxElements: 10 // Default value
        };

        // Function to dynamically adjust barWidth based on the number of elements
        function adjustBarWidth(elementCount) {
            const maxBarWidth = 35; // Maximum bar width
            const minBarWidth = 10; // Minimum bar width
            const maxElements = CONFIG.maxBars;

            // Calculate barWidth based on the number of elements
            CONFIG.barWidth = Math.max(
                minBarWidth,
                maxBarWidth - (elementCount - 10) // Reduce barWidth as elements increase
            );
        }

        // Generate new random array
        function generateNewArray(size) {
            adjustBarWidth(size); // Adjust barWidth dynamically
            state.array = Array.from({ length: size }, () =>
                Math.floor(Math.random() * (CONFIG.maxValue - CONFIG.minValue + 1)) + CONFIG.minValue
            );
            renderGraph();
        }

        // Render the graph visualization
        function renderGraph(highlight = {}, sortedUpTo = -1) {
            const container = document.getElementById('selection-graph-container');
            container.innerHTML = '';
            container.style.width = `${calculateGraphWidth(state.array.length)}px`;

            state.array.forEach((value, index) => {
                const bar = document.createElement('div');
                bar.className = 'graph-bar';
                bar.style.width = `${CONFIG.barWidth}px`;
                bar.style.height = `${value * CONFIG.heightScale}px`;
                bar.style.backgroundColor = COLORS.default;

                // Apply state-based styling
                if (index <= sortedUpTo) {
                    bar.style.backgroundColor = COLORS.sorted;
                    bar.classList.add('sorted');
                }
                if (index === highlight.minIndex) {
                    bar.style.backgroundColor = COLORS.min;
                    bar.classList.add('pulse');
                }
                if (highlight.compareIndices?.includes(index)) {
                    bar.style.backgroundColor = COLORS.compare;
                    bar.classList.add('wiggle');
                }
                if (index === highlight.swapIndex) {
                    bar.style.backgroundColor = COLORS.swap;
                    bar.classList.add('jump');
                }

                // Add value label
                const label = document.createElement('div');
                label.className = 'bar-label';
                label.textContent = value;
                bar.appendChild(label);

                container.appendChild(bar);
            });
        }

        // Calculate total graph width
        function calculateGraphWidth(elementCount) {
            return (CONFIG.barWidth * elementCount) + (CONFIG.barGap * (elementCount - 1));
        }

        // Initialize the visualization
        function init() {
            generateNewArray(state.maxElements);
            setupEventListeners();
        }

        // Setup event listeners
        function setupEventListeners() {
            // Speed control
            document.getElementById('selection-speed').addEventListener('input', function () {
                state.speed = 1600 - this.value;
                document.getElementById('speed-value').textContent =
                    this.value < 500 ? 'Fast' :
                    this.value < 1000 ? 'Medium' : 'Slow';
            });

            // Elements control
            document.getElementById('elements-count').addEventListener('input', function () {
                const count = parseInt(this.value);
                state.maxElements = count;
                document.getElementById('elements-value').textContent = count;
                if (!state.sorting) {
                    generateNewArray(count);
                }
            });

            // Reset button
            document.getElementById('selection-reset-btn').addEventListener('click', function () {
                if (!state.sorting) {
                    generateNewArray(state.maxElements);
                    updateStatus('New array generated! Ready to sort');
                }
            });

            // Start button
            document.getElementById('selection-start-btn').addEventListener('click', selectionSortVisualization);
        }

        // Selection Sort Algorithm Visualization
        async function selectionSortVisualization() {
            if (state.sorting) return;
            state.sorting = true;
            disableControls(true);

            let comparisons = 0;
            let swaps = 0;
            const arr = [...state.array];
            const n = arr.length;

            for (let i = 0; i < n - 1; i++) {
                let min_idx = i;

                // Show current minimum candidate
                renderGraph({ minIndex: min_idx }, i - 1);
                updateStatus(`🔍 Finding minimum starting at index ${i}`);
                await delay(state.speed / 2);

                for (let j = i + 1; j < n; j++) {
                    comparisons++;

                    // Highlight comparison
                    renderGraph({
                        minIndex: min_idx,
                        compareIndices: [j]
                    }, i - 1);
                    updateStatus(`🔎 Comparing ${arr[j]} < ${arr[min_idx]}? (Comparisons: ${comparisons})`);
                    await delay(state.speed / 2);

                    if (arr[j] < arr[min_idx]) {
                        min_idx = j;
                        // Show new minimum
                        renderGraph({ minIndex: min_idx }, i - 1);
                        updateStatus(`✨ New minimum found: ${arr[min_idx]}`);
                        await delay(state.speed / 2);
                    }
                }

                // Perform swap if needed
                if (min_idx !== i) {
                    swaps++;
                    [arr[i], arr[min_idx]] = [arr[min_idx], arr[i]];

                    // Animate swap
                    renderGraph({
                        swapIndex: i,
                        minIndex: min_idx
                    }, i - 1);
                    updateStatus(`🔄 Swapping elements (Swaps: ${swaps})`);
                    await delay(state.speed);
                }

                // Update state and render
                state.array = [...arr];
                renderGraph({}, i);
                await delay(state.speed / 3);
            }

            // Final render
            renderGraph({}, n - 1);
            updateStatus(`🎉 Sorting complete! Comparisons: ${comparisons}, Swaps: ${swaps}`);
            state.sorting = false;
            disableControls(false);
        }

        // Helper functions
        function delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        function updateStatus(text) {
            document.getElementById('selection-status').innerHTML = text;
        }

        function disableControls(disabled) {
            document.getElementById('selection-start-btn').disabled = disabled;
            document.getElementById('selection-reset-btn').disabled = disabled;
            document.getElementById('elements-count').disabled = disabled;
            document.getElementById('selection-speed').disabled = disabled;
        }

        // Initialize the visualization
        init();
    </script>
   
</body>
</html>