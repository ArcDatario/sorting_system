<main class="main-content counting-sort" id="counting-sort" style="display:none;">
    <div class="article-header">
        <h1>Counting Sort Algorithm</h1>
        <!-- breadcrumb same as above -->
    </div>

    <div class="article-content">
        <p>Counting Sort is a non-comparison based integer sorting algorithm that works by counting the number of objects having distinct key values, then calculating the positions of each key in the output sequence. It operates in O(n + k) time where k is the range of input.</p>

        <div class="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/7zuGmKfUt7s" frameborder="0" allowfullscreen></iframe>
        </div>
        <p class="video-caption">Video: Counting Sort Visualization</p>

        <h2>How Counting Sort Works?</h2>
        
        <br><br>
                <?php include "button.php";?>

<br><br>

        <h3>Step-by-Step Example (Sorting [4, 2, 2, 8, 3, 3, 1]):</h3>
        
        <h4>Step 1: Find Maximum Value (8)</h4>
        
        <h4>Step 2: Initialize Count Array</h4>
        <ul>
            <li>Create array of size 9 (max+1) initialized to 0</li>
        </ul>
        
        <h4>Step 3: Store Counts</h4>
        <ul>
            <li>Count of 1: 1</li>
            <li>Count of 2: 2</li>
            <li>Count of 3: 2</li>
            <li>Count of 4: 1</li>
            <li>Count of 8: 1</li>
            <li>Count array: [0, 1, 2, 2, 1, 0, 0, 0, 1]</li>
        </ul>

        <h4>Step 4: Cumulative Count</h4>
        <ul>
            <li>Transform count to cumulative: [0, 1, 3, 5, 6, 6, 6, 6, 7]</li>
        </ul>

        <h4>Step 5: Build Output Array</h4>
        <ul>
            <li>Place elements in sorted order using cumulative counts</li>
            <li>Final sorted array: [1, 2, 2, 3, 3, 4, 8]</li>
        </ul>

        <div class="important-note">
            <strong>Key Characteristics:</strong>
            <ul>
                <li>Time Complexity: O(n + k) where k is range of input</li>
                <li>Space Complexity: O(n + k)</li>
                <li>Stable (can be implemented as unstable)</li>
                <li>Not comparison-based</li>
                <li>Only works for non-negative integers (or with modification)</li>
            </ul>
        </div>

        <?php include "code-implementation/countingsort-ci.php"; ?>

        <h2>Variations</h2>
        <h3>Negative Number Handling</h3>
        <p>Shift all numbers by minimum value to handle negative integers.</p>

        <h3>In-Place Counting Sort</h3>
        <p>Modification that reduces space complexity but is more complex.</p>

        <h2>Practical Applications</h2>
        <ul>
            <li>Sorting numbers with small range (e.g., ages, test scores)</li>
            <li>As a subroutine in Radix Sort</li>
            <li>Histogram generation</li>
            <li>Frequency counting problems</li>
        </ul>

        <div class="important-note">
            <strong>Note:</strong> Counting sort is extremely fast when the range of input data (k) is not significantly greater than the number of objects (n). However, it becomes impractical when k is very large compared to n.
        </div>
    </div>
</main>