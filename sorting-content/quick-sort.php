<main class="main-content quick-sort" id="quick-sort" style="display:none;">
    <div class="article-header">
        <h1>Quick Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Quick Sort is a highly efficient divide-and-conquer sorting algorithm that works by selecting a 'pivot' element and partitioning the array around the pivot, placing smaller elements before it and larger elements after it. The algorithm then recursively sorts the subarrays.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Hoixgm4-P4M" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Quick Sort Visualization</p>

        <h2>How Quick Sort Works?</h2>
        
        <!-- include visualization -->
         

        <h3>Detailed Example (Sorting [10, 80, 30, 90, 40, 50, 70]):</h3>
        
        <h4>First Partition (Pivot = 70):</h4>
        <ul>
            <li>Initialize: i = -1, j = 0, pivot = 70</li>
            <li>10 < 70 → swap arr[0] with arr[0] → i=0 → [10, 80, 30, 90, 40, 50, 70]</li>
            <li>80 > 70 → no swap</li>
            <li>30 < 70 → swap arr[1] with arr[2] → i=1 → [10, 30, 80, 90, 40, 50, 70]</li>
            <li>90 > 70 → no swap</li>
            <li>40 < 70 → swap arr[2] with arr[4] → i=2 → [10, 30, 40, 90, 80, 50, 70]</li>
            <li>50 < 70 → swap arr[3] with arr[5] → i=3 → [10, 30, 40, 50, 80, 90, 70]</li>
            <li>Final swap: pivot with arr[i+1] → [10, 30, 40, 50, 70, 90, 80]</li>
        </ul>

        <h4>Recursive Calls:</h4>
        <ul>
            <li>Left subarray [10, 30, 40, 50]</li>
            <li>Right subarray [90, 80]</li>
            <li>Repeat process until fully sorted</li>
        </ul>

        <div class="important-note">
            <strong>Performance Characteristics:</strong>
            <ul>
                <li>Average Time Complexity: O(n log n)</li>
                <li>Worst Case: O(n²) (rare with good pivot selection)</li>
                <li>Space Complexity: O(log n) (stack space for recursion)</li>
                <li>Not stable but in-place</li>
                <li>Cache-efficient due to sequential memory access</li>
            </ul>
        </div>

        <?php include "code-implementation/quicksort-ci.php"; ?>

        <h2>Optimization Techniques</h2>
        <h3>Pivot Selection Strategies</h3>
        <ul>
            <li><strong>Median-of-Three:</strong> Choose median of first, middle, and last elements</li>
            <li><strong>Randomized QuickSort:</strong> Random pivot avoids worst-case scenarios</li>
            <li><strong>Introsort:</strong> Hybrid that switches to heapsort for bad cases</li>
        </ul>

        <h3>Three-Way Partitioning</h3>
        <p>Special handling for arrays with many duplicate keys (Dutch National Flag problem).</p>

        <h3>Tail Recursion Optimization</h3>
        <p>Reduces worst-case stack space to O(log n).</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Default sorting algorithm in many languages (C qsort, Java primitives)</li>
            <li>When average performance matters more than worst-case</li>
            <li>In-memory sorting of large arrays</li>
            <li>Used in hybrid algorithms like Introsort</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> QuickSort is generally preferred over MergeSort for sorting arrays due to better cache performance and in-place operation, though it's not stable and has O(n²) worst-case (mitigated by proper pivot selection).
        </div>
    </div>
</main>