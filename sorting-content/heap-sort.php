<main class="main-content heap-sort" id="heap-sort" style="display:none;">
    <div class="article-header">
        <h1>Heap Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Heap Sort is a comparison-based sorting algorithm that uses a binary heap data structure. It divides its input into a sorted and an unsorted region, and it iteratively shrinks the unsorted region by extracting the largest element and moving it to the sorted region.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/MtQL_ll5KhQ" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Heap Sort Visualization</p>

        <h2>How Heap Sort Works?</h2>

       <!-- include visualization -->
        
        <h3>Step-by-Step Example (Sorting [4, 10, 3, 5, 1]):</h3>
        
        <h4>Step 1: Build Max Heap</h4>
        <ul>
            <li>Original array visualized as complete binary tree</li>
            <li>Heapify from last non-leaf node to root</li>
            <li>After heapify: [10, 5, 3, 4, 1]</li>
        </ul>
        
        <h4>Step 2: Extract Elements</h4>
        <ul>
            <li>Swap root (10) with last element (1)</li>
            <li>Heapify reduced heap [1, 5, 3, 4] → [5, 4, 3, 1]</li>
            <li>Swap root (5) with last element (1)</li>
            <li>Heapify [1, 4, 3] → [4, 1, 3]</li>
            <li>Continue until fully sorted</li>
            <li>Final sorted array: [1, 3, 4, 5, 10]</li>
        </ul>

        <div class="important-note">
            <strong>Performance Analysis:</strong>
            <ul>
                <li>Time Complexity: O(n log n) in all cases</li>
                <li>Space Complexity: O(1) (in-place)</li>
                <li>Not stable</li>
                <li>Guaranteed O(n log n) unlike QuickSort's worst case</li>
                <li>Slower in practice than well-implemented QuickSort</li>
            </ul>
        </div>

        <?php include "code-implementation/heapsort-ci.php"; ?>

        <h2>Optimization Techniques</h2>
        <h3>Bottom-Up Heap Construction</h3>
        <p>Builds the heap in O(n) time rather than O(n log n).</p>

        <h3>Ternary Heaps</h3>
        <p>Uses 3 children per node to reduce height and operations.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>When worst-case O(n log n) is required</li>
            <li>Embedded systems (predictable performance)</li>
            <li>As part of hybrid algorithms like Introsort</li>
            <li>Priority queue implementations</li>
            <li>Systems where memory is constrained (in-place)</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> While heap sort has the advantage of predictable O(n log n) performance and in-place operation, it tends to be slower in practice than quick sort due to poor cache performance (more random memory access patterns) and higher constant factors.
        </div>
    </div>
</main>